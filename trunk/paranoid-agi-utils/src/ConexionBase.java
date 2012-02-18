import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Collection;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;


public class ConexionBase {
	
    static String baseNombre = "paranoid";
    static String loginBase = "root";
    static String passwordBase = "my123";
    static String diripBase = "10.200.200.95";
    static String url = "jdbc:mysql://"+diripBase+"/"+baseNombre;
    static String diripAsterisk = "10.200.200.95";
    static String nombreManager = "paranoid";
    static String passManager = "123456";
    private Connection miconexion;
    
    ConexionBase() {
    	this.miconexion = null;
    	inicializarConexionBase();
    	
    }
    
    private void inicializarConexionBase(){
	    
    	this.miconexion = null;
        try {
            Class.forName("com.mysql.jdbc.Connection");
            this.miconexion = (Connection) DriverManager.getConnection(url, loginBase, passwordBase);
            if (this.miconexion != null) {
                System.out.println("Conexión a base de datos "+url+" ... Ok");
            }
        }
        catch(SQLException ex) {
            System.out.println("Hubo un problema al intentar conectarse con la base de datos "+url);
        }
        catch(ClassNotFoundException ex) {
            System.out.println(ex);
        }
    }

	public Connection getConexion() {
		return this.miconexion;
	}
}
