import java.awt.List;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Collection;

import com.mysql.jdbc.Statement;


public class ServiceMysql {

	/**
	 * 
	 * @param accionTomada  accion tomada por el sistema
	 * @param archivoSonido ruta al archivo de sonido, puede ser NULL
	 * @param IdRegla id de la regla que saltó
	 * @param fecha fecha de la notificacion
	 */
	static void nuevaNotificacion(String accionTomada, String archivoSonido, int IdRegla, String fecha){
		
		try{
		Statement s = (Statement) ConexionBase.getInstance().getConexion().createStatement();
		String consulta;
		
		if (archivoSonido != null){
			consulta = "INSERT INTO notificaciones (fecha, accion, masinfourl,regla_id) VALUES ('"+fecha+"','"+accionTomada+"','"+archivoSonido+"','"+IdRegla+"')";
		}else {
			consulta = "INSERT INTO notificaciones (fecha, accion, masinfourl,regla_id) VALUES ('"+fecha+"','"+accionTomada+"',NULL,'"+IdRegla+"')";
		}
		
			s.executeUpdate(consulta);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			System.out.println("no se ha podido agregar la nueva notificacion");
			e.printStackTrace();
		}
	}
	
	static Boolean usuarioNotificacionActiva(){
		
		return true;
		
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
