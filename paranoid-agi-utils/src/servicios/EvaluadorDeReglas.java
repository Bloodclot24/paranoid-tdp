package servicios;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Iterator;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;

import entidades.Llamada;
import entidades.Regla;



public class EvaluadorDeReglas {

	private Llamada llamada;
	
	
	private ArrayList<Regla> reglas;

	
	private void cargarReglas() {
		//Conexion a MYSQL y traer las reglas para el usuario
		int idUsuario = llamada.getIdUsuario();
		Connection conexion = ConexionBase.getInstance().getConexion();
		Statement s;
		Statement s1;
        try {
            s =(Statement) conexion.createStatement();
            s1 =(Statement) conexion.createStatement();
            String extension = Integer.toString(idUsuario);
            ResultSet rs = s.executeQuery (
            		"select r.*" +
                    " from sf_guard_user sgu" +
                    ", regla_perfil rp" +
                    ", regla r" +
                    ", usuario_pbx up" +
                    " where" +
                    " sgu.perfil_id=rp.perfil_id" +
                    " and rp.regla_id=r.id" +
                    " and sgu.pbxuser_id=up.id" +
                    " and up.extension='"+extension+"';"
                    );
            
            ResultSet rs1 = s1.executeQuery (
            		"select pref.*" +
            		" from" + 
            		" sf_guard_user sgu" +
            		", regla_perfil rp" +
            		", regla_prefijo rpref" +
            		", prefijo pref" +
            		", usuario_pbx up" +
            		" where" +
            		" sgu.perfil_id=rp.perfil_id" +
            		" and rp.regla_id=rpref.regla_id" +
            		" and rpref.prefijo_id=pref.id" +
            		" and sgu.pbxuser_id=up.id" +
            		" and up.extension='"+extension+"';"
            		);
            int idRegla;
            String tipo;
        	int horarioDesde = -1;
        	int horarioHasta = -1;
        	String[] diaSemana;
        	float costoMin = -1;
            String nombreRegla;
            int importante;
            String[] dias = { "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"}; 
        	//TODO ver que hacer si trae NULL
            while (rs.next()) {
            	idRegla = Integer.parseInt(rs.getString("id"));
            	importante = Integer.parseInt(rs.getString("importante"));
            	tipo = rs.getString("type");
            	nombreRegla = rs.getString("nombre");
            	
            	if(tipo.equals("costo_por_minuto"))
            		costoMin = Float.parseFloat(rs.getString("costomaximo"));
            	
            	if(tipo.equals("dias")) {
            		horarioDesde = Integer.parseInt(rs.getString("desde").substring(0, 2));
            		horarioHasta = Integer.parseInt(rs.getString("hasta").substring(0, 2));
            	}
            	
            	Regla regla = new Regla(idRegla, importante, tipo, nombreRegla, horarioDesde, horarioHasta, costoMin);
            	
            	if(tipo.equals("dias")) {
            		for (int i = 0; i < 7; i++) {
            			if(rs.getString(dias[i])!= null) {
            				regla.agregarDia(i);
            			}
            		}
            	}
            	
            	if(tipo.equals("destino")) {
            		while(rs1.next()){
            			regla.agregarDestino(rs1.getString("numero"));
            		}
            	}
            	
            	this.reglas.add(regla);
            }
            rs.close();
            s.close();
            
        }catch (SQLException ex) {
        	
        	ex.printStackTrace();
        	
            System.out.println("Hubo un problema al intentar obtener lo datos");
        }
		
		
	}
		
	public EvaluadorDeReglas(Llamada llamada) {
		this.llamada = llamada;
		this.reglas = new ArrayList<Regla>();
		cargarReglas();
	}
	
	public Regla evaluarReglas() {
		
		if (reglas == null){
			return null;
		}
		Iterator<Regla> it = reglas.iterator();
		boolean resultado = true;
		Regla regla = null;
		while(it.hasNext() && resultado) {
			regla = it.next();
			resultado = regla.evaluar(llamada);
		}
		if (resultado == true)
			regla = null;
		return regla;
	}
	
}
