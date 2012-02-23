package servicios;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Collection;
import java.util.Date;

import javax.print.attribute.standard.DateTimeAtCompleted;

import com.mysql.jdbc.Statement;

import entidades.Notificacion;
import entidades.UsuarioParanoid;


public class ServiceMysql {

	/**
	 * 
	 * @param accionTomada  accion tomada por el sistema
	 * @param archivoSonido ruta al archivo de sonido, puede ser NULL
	 * @param IdRegla id de la regla que saltó
	 * @param fecha fecha de la notificacion
	 */
//	static void nuevaNotificacion(String accionTomada, String archivoSonido, int IdRegla, String fecha){
//		
//		try{
//		Statement s = (Statement) ConexionBase.getInstance().getConexion().createStatement();
//		String consulta;
//		
//		if (archivoSonido != null){
//			consulta = "INSERT INTO notificaciones (fecha, accion, masinfourl,regla_id) VALUES ('"+fecha+"','"+accionTomada+"','"+archivoSonido+"','"+IdRegla+"')";
//		}else {
//			consulta = "INSERT INTO notificaciones (fecha, accion, masinfourl,regla_id) VALUES ('"+fecha+"','"+accionTomada+"',NULL,'"+IdRegla+"')";
//		}
//		
//			s.executeUpdate(consulta);
//		} catch (SQLException e) {
//			// TODO Auto-generated catch block
//			System.out.println("no se ha podido agregar la nueva notificacion");
//			e.printStackTrace();
//		}
//	}
	
	
	public static Boolean nuevaNotificacion(Notificacion notif){
		
		try{
		Statement s = (Statement) ConexionBase.getInstance().getConexion().createStatement();
		String consulta;
		
		
		java.util.Date date = null;
		java.sql.Timestamp timeStamp = null;
		
		Calendar calendar=Calendar.getInstance();
		calendar.setTime(new Date());
		java.sql.Date dt = new java.sql.Date(calendar.getTimeInMillis());
		java.sql.Time sqlTime=new java.sql.Time(calendar.getTime().getTime());
		SimpleDateFormat simpleDateFormat = new SimpleDateFormat("yyyy-MM-dd hh:mm:ss");
		try {
			date = simpleDateFormat.parse(dt.toString()+" "+sqlTime.toString());
		} catch (ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		timeStamp = new java.sql.Timestamp(date.getTime());
		
		
		if (notif.hayQueGrabar() != null && notif.hayQueGrabar()){
			
			if (notif.getReglaIdAsociada() == 0){
				consulta = "INSERT INTO notificaciones (fecha, accion, masinfourl, regla_id, user_id, llamada) VALUES ('"+timeStamp+"','"+notif.getAccion()+"','"+
						notif.getMasinfourl()+"',NULL,'"+notif.getUserIdAsociado()+"','"+notif.getDatoLlamada()+"')";
			}else {
			consulta = "INSERT INTO notificaciones (fecha, accion, masinfourl, regla_id, user_id, llamada) VALUES ('"+timeStamp+"','"+notif.getAccion()+"','"+
					notif.getMasinfourl()+"','"+notif.getReglaIdAsociada()+"','"+notif.getUserIdAsociado()+"','"+notif.getDatoLlamada()+"')";
			}
		}else {
			consulta = "INSERT INTO notificaciones (fecha, accion, masinfourl,regla_id, user_id, llamada) VALUES ('"+timeStamp+"','"+notif.getAccion()+"',NULL,'"+notif.getReglaIdAsociada()+
					"','"+notif.getUserIdAsociado()+"','"+notif.getDatoLlamada()+"')";
		}
			System.out.println(consulta);
			s.executeUpdate(consulta);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			System.out.println("no se ha podido agregar la nueva notificacion");
			e.printStackTrace();
			return false;
		}
		return true;
	}
	
	
	
	static Boolean usuarioNotificacionActiva(){
		
		return true;
		
	}
	
	public static int getUserIdxExtension(String Extension){
		
		try {
			
			Statement s = (Statement) ConexionBase.getInstance().getConexion().createStatement();
			String consulta;
			
			consulta = "SELECT id FROM usuario_pbx WHERE extension = '"+Extension+"';";
			
			ResultSet rs = s.executeQuery(consulta);
			
			if (!rs.next()){
				return 0;
			}else{
				return rs.getInt("id");
			}

		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return 0;
		}
	}
	
	
	public static UsuarioParanoid getUsuarioxId (int id){
		
		try {
			
			Statement s = (Statement) ConexionBase.getInstance().getConexion().createStatement();
			String consulta;
			
			consulta = "SELECT * FROM sf_guard_user WHERE id = '"+id+"' AND is_active='1';";
			
			ResultSet rs = s.executeQuery(consulta);
			
			if (!rs.next()){
				return null;
			}
				
			UsuarioParanoid devolver;
						
			devolver = new UsuarioParanoid(
					rs.getString("first_name") +" "+rs.getString("last_name"),
					rs.getString("email_address"),
					rs.getBoolean("is_super_admin"),
					rs.getString("pbxuser_id"),
					rs.getBoolean("informaralertas"),
					rs.getString("telefono"));
			
			return devolver;

		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return null;
		}
	}
	
	
	public static Collection<UsuarioParanoid> getAdminUsers (){
		
		
		ArrayList<UsuarioParanoid> lista = new ArrayList<UsuarioParanoid>();
		
		try {
			
			Statement s = (Statement) ConexionBase.getInstance().getConexion().createStatement();
			String consulta;
			
			consulta = "SELECT * FROM sf_guard_user WHERE is_super_admin = '1' AND is_active='1';";
			
			ResultSet rs = s.executeQuery(consulta);

			while (rs.next()){
				
			UsuarioParanoid devolver;
						
			devolver = new UsuarioParanoid(
					rs.getString("first_name") +" "+rs.getString("last_name"),
					rs.getString("email_address"),
					rs.getBoolean("is_super_admin"),
					rs.getString("pbxuser_id"),
					rs.getBoolean("informaralertas"),
					rs.getString("telefono"));
			
			lista.add(devolver);
			}
			return lista;

		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return lista;
		}
	}
	
	
}
