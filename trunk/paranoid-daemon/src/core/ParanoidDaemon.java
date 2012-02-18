package core;

import java.io.IOException;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Collection;

import org.asteriskjava.manager.AuthenticationFailedException;
import org.asteriskjava.manager.ManagerConnection;
import org.asteriskjava.manager.ManagerConnectionFactory;
import org.asteriskjava.manager.ResponseEvents;
import org.asteriskjava.manager.TimeoutException;
import org.asteriskjava.manager.action.SipPeersAction;
import org.asteriskjava.manager.event.PeerEntryEvent;
import org.asteriskjava.manager.event.ResponseEvent;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;


public class ParanoidDaemon {

	    private ManagerConnection managerConnection;
	    private static long tiemposleep=20000;
	    static String baseNombre = "paranoid";
	    static String loginBase = "root";
	    static String passwordBase = "my123";
	    static String diripBase = "10.200.200.95";
	    static String url = "jdbc:mysql://"+diripBase+"/"+baseNombre;
	    static String diripAsterisk = "10.200.200.95";
	    static String nombreManager = "paranoid";
	    static String passManager = "123456";
	    Connection miconexion;
	    private Boolean firstTime=true; 

	    public ParanoidDaemon() throws IOException
	    {
	        ManagerConnectionFactory factory = new ManagerConnectionFactory(
	        		diripAsterisk, nombreManager, passManager);

	        this.managerConnection = factory.createManagerConnection();
	    }

	    public void run() throws IOException, AuthenticationFailedException,
	            TimeoutException
	    {
	        
	    	SipPeersAction sipshowpeers = new SipPeersAction();
	    	
	    	this.managerConnection.login();
	    	
	    	ResponseEvents respuesta = this.managerConnection.sendEventGeneratingAction(sipshowpeers);
	    	
	    	this.managerConnection.logoff();

	    	if (this.miconexion == null){
	    		this.inicializarConexionBase();
	    	}
	    	if (this.firstTime){
	    		this.inicializarBase(respuesta.getEvents());
	    		this.firstTime=false;
	    	}else {
	    		this.actualizarBase(respuesta.getEvents());
	    	}
	    	
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
	    

	    private void inicializarBase(Collection<ResponseEvent> listapeers){
	    
	    	Statement s;
	        try {
	            s =(Statement) this.miconexion.createStatement();
	            
	            for (ResponseEvent unpeer : listapeers) {

		        	 if (unpeer instanceof PeerEntryEvent){

		        	 PeerEntryEvent mipeer = (PeerEntryEvent)unpeer;
		        	 
		        	 	if (!this.verificarSiExiste(mipeer)) {
		        	 		this.creaNuevopeer(mipeer);
		        	 	}
		        	}
	            }
	            s.close();

	        } catch (SQLException ex) {
	            System.out.println("Hubo un problema al intentar obetener lo datos");
	        }
	    }
	    
	    
	    private void creaNuevopeer(PeerEntryEvent mipeer){
	    
	    	Statement s;
	        try {
	            s =(Statement) this.miconexion.createStatement();
	            
	            Peer nuevopeer = new Peer(mipeer);
	            
	            String query = "INSERT INTO usuario_pbx (extension,tecnologia,ultimo_registro,conectado) VALUES" +
    	 				" ('"+nuevopeer.getExtension()+"','"+nuevopeer.getTecnologia()+"','"+nuevopeer.getUltimoRegistro().toString()
    	 				+"','"+nuevopeer.getConectadoNumero()+"')";
	            
		        s.executeUpdate(query);

	        } catch (SQLException ex) {
	            System.out.println("Hubo un problema al intentar obetener lo datos");
	        }
	    }
	    
	    private boolean verificarSiExiste (PeerEntryEvent unpeer){
	    
	    	Statement s;
	        try {
	            s =(Statement) this.miconexion.createStatement();
	            
	            String extension = unpeer.getObjectName();
	            ResultSet rs = s.executeQuery ("select * from usuario_pbx where extension='"+extension+"'");
	            
	            if (rs.next()){
	            	return true;
	            }else{
	            	return false;
	            }
	        }catch (SQLException ex) {
	            System.out.println("Hubo un problema al intentar obetener lo datos");
	            return true;
	        }
	    }
	    
	    
	    private void actualizarBase(Collection<ResponseEvent> listapeers){    
	        
	        Statement s;
	        try {
	            s =(Statement) this.miconexion.createStatement();
	            
	            for (ResponseEvent unpeer : listapeers) {
		        	 
		        	 if (unpeer instanceof PeerEntryEvent){

		        	 PeerEntryEvent mipeer = (PeerEntryEvent)unpeer;
		        	 
		        	 if (!this.verificarSiExiste(mipeer)){
		        		 this.creaNuevopeer(mipeer);
		        	 }else{
		        	 
		        		 Peer nuevopeer = new Peer(mipeer);
		        		 
		        		 s.executeUpdate("UPDATE usuario_pbx SET conectado='"+nuevopeer.getConectadoNumero()+"' WHERE extension='"+nuevopeer.getExtension()+"'");
		        	 }
		        	 }
	            }
	           
	        } catch (SQLException ex) {
	            System.out.println("Hubo un problema al intentar obetener lo datos");
	        }

	    }
	    	
	    public static void main(String[] args) throws Exception
	    {
	        ParanoidDaemon conexionManager;
	        conexionManager = new ParanoidDaemon();
	        
	        while (true){
	        conexionManager.run();
	        Thread.sleep(tiemposleep);
	        }
	    }
}
