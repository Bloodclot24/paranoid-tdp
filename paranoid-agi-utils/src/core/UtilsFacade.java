package core;
import java.sql.ResultSet;
import java.util.Calendar;

import org.asteriskjava.fastagi.AgiRequest;

import servicios.ConexionBase;
import servicios.EvaluadorDeReglas;
import servicios.Notificador;
import servicios.ServiceMysql;

import com.mysql.jdbc.Statement;

import entidades.Llamada;
import entidades.Notificacion;
import entidades.RedNeuronal;
import entidades.Regla;
import entidades.UsuarioParanoid;


public class UtilsFacade {

	/**
	 * 
	 * devuelve 3 si no pasa y hay que alertar inmediatamente - alerta roja
	 * devuelve 2 si no pasa y pero solo logueo - alerta naranja
	 * devuelve 1 si pasa pero hay que alertar - alerta amarilla
	 * devuelve 0 si pasa - no alerta
	 * 
	 * @param request
	 * @return
	 */
	public static Notificacion estadoDeAlerta(AgiRequest request){
		
    	Integer usuario = Integer.parseInt(request.getCallerIdNumber());
    	String destino = request.getExtension();
    	Float costo = encontrarCostoAdestino(destino);
    	
    	Llamada llamadaEnCuestion = new Llamada(usuario, destino, costo);
		
    	//evaluo regla
		EvaluadorDeReglas ev = new EvaluadorDeReglas(llamadaEnCuestion);
		Regla reglaMacheada = ev.evaluarReglas();
		
		if (reglaMacheada != null){
			if (reglaMacheada.getImportante() == 1){
				
				Notificacion not = generarAlerta(request, 3, reglaMacheada);   //regla macheada e importante
				
				return not;
			}else{
				Notificacion not = generarAlerta(request, 2, reglaMacheada);   //regla macheada pero no importante
				notificar(not, reglaMacheada);
				return not; 
			}
		}
		
		//evaluo red
		RedNeuronal red = new RedNeuronal();
		Boolean esnormal = red.esHabitual(llamadaEnCuestion);
		
		if (!esnormal){
			Notificacion alerta = generarAlerta(request, 1);
			GrabarLlamada(alerta);
			notificar(alerta, null);
			return alerta ;      //comportamiento anormal se graba la llamada
		}else{
			return generarAlerta(request, 0);     // todo ok, comportamiento normal
		}		
	}
	
	
	public static void notificar(Notificacion unanot, Regla reg){
		
		for (UsuarioParanoid unusuario : ServiceMysql.getAdminUsers()) {
		
			if (reg != null){
				Notificador.getNotificador(unanot, unusuario, reg);
			}else{
				Notificador.getNotificador(unanot, unusuario);
			}
		}	
	}
	
	
	private static Notificacion generarAlerta (AgiRequest request, int nivel){
		
		if (nivel == 0){
			return Notificacion.getNotificacionVerde();
		}
		
		Notificacion miNotificacion = Notificacion.getNotificacionDeAlerta(nivel);
		String usuarioExtension = request.getCallerIdNumber();
		miNotificacion.setUserIdAsociado(ServiceMysql.getUserIdxExtension(usuarioExtension));
		
		return miNotificacion;
		
	}
	
	
	private static Notificacion generarAlerta (AgiRequest request, int nivel, Regla reglaMacheada){
		
		if (nivel == 0){
			return Notificacion.getNotificacionVerde();
		}
		Notificacion miNotificacion = Notificacion.getNotificacionDeAlerta(nivel);
		miNotificacion.setReglaAsociada(reglaMacheada);
		miNotificacion.setReglaIdAsociada(reglaMacheada.getIdRegla());
		String usuarioExtension = request.getCallerIdNumber();
		miNotificacion.setUserIdAsociado(ServiceMysql.getUserIdxExtension(usuarioExtension));
		
		return miNotificacion;
		
	}
	
	
	
	
	/**
	 * 
	 * 
	 * 
	 * @param numerollamado
	 * @return
	 */
	
	public static float encontrarCostoAdestino(String numerollamado){
		
		try{
			Statement s = (Statement) ConexionBase.getInstance().getConexion().createStatement();
			String consulta;
			
			Boolean encontrado = false;
			int puntero = 1;
			
			while (!encontrado){
			
				String prefijo = numerollamado.substring(0, puntero);
				
				//la consulta puede traer 0, 1 ó n resultados, si trae 1 es el valor buscado
				// si trae cero entonces no existe el prefijo
				// si trae 2 o mas debo refinar el prefijo
				consulta = "SELECT COUNT(*) as cantidad FROM prefijo WHERE numero LIKE '"+prefijo+"'";
				
				ResultSet rs = s.executeQuery(consulta);
				rs.next();
				int cantidadEncontrada = rs.getInt("cantidad");
				
				switch (cantidadEncontrada) {
				case 0:
					System.out.println("el prefijo no se ha encontrado");
					return 0;
				case 1:
					encontrado = true;
					break;
				default:
					puntero +=1 ;
					break;
				}		
			}
			
			String prefijo = numerollamado.substring(0, puntero);
			
			consulta = "SELECT * FROM prefijo WHERE numero LIKE '"+prefijo+"'";
			
			ResultSet rs = s.executeQuery(consulta);
			
			rs.next();
			
			return rs.getFloat("costoporminuto");
			
			
			}catch (Exception e) {
				return 0;
				// TODO: handle exception
			}
		
	}
	
	public static void GrabarLlamada(Notificacion miNot){
		
		String rutaSonidos="/var/www/paranoid/web/records/";
		miNot.setGrabar(true);
		
		Calendar fecha = Calendar.getInstance();
		
		String nombreArch = fecha.get(Calendar.YEAR)+"-"+fecha.get(Calendar.MONTH)+"-"+fecha.get(Calendar.DAY_OF_MONTH)+"-"+
							fecha.get(Calendar.HOUR_OF_DAY)+"-"+fecha.get(Calendar.MINUTE)+"-"+fecha.get(Calendar.SECOND)+"-"+
							miNot.getUserIdAsociado()+".wav";
		miNot.setMasinfourl(rutaSonidos+nombreArch);
		
		
	}
	
	
}
