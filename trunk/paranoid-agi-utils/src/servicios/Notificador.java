package servicios;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import org.asteriskjava.manager.AuthenticationFailedException;
import org.asteriskjava.manager.ManagerConnection;
import org.asteriskjava.manager.ManagerConnectionFactory;
import org.asteriskjava.manager.TimeoutException;
import org.asteriskjava.manager.action.CommandAction;
import org.asteriskjava.manager.response.CommandResponse;
import entidades.Notificacion;
import entidades.Regla;
import entidades.UsuarioParanoid;


public class Notificador {

	
	//private String rutaMutt="/usr/src/paranoid/mutconf";
	private String rutaMutt="/home/zeke/workspace/paranoid-agi-utils/mutconf";
	private String diripAsterisk = "192.168.1.10";
    private String nombreManager = "paranoid";
    private String passManager = "123456";

	private Notificacion nota;
	private UsuarioParanoid usuario;
	private Regla unregla;
	
	
	
	
	private Notificador(Notificacion nota, UsuarioParanoid usuario, Regla reglaquebrada) {
		super();
		this.nota = nota;
		this.usuario = usuario;
		this.unregla = reglaquebrada;
		
	}
	
	private Notificador(Notificacion nota, UsuarioParanoid usuario) {
		super();
		this.nota = nota;
		this.usuario = usuario;
		
	}


	public static Notificador getNotificador(Notificacion nota, UsuarioParanoid usuario){
		
		return new Notificador(nota, usuario);
	}
	
	public static Notificador getNotificador(Notificacion nota, UsuarioParanoid usuario, Regla reglaquebrada){
		
		return new Notificador(nota, usuario, reglaquebrada);
	}
	
	
	/**
	 * 
	 * si el usuario tiene habilitado el informe de alertas le manda un mail
	 * si lo que se quebró fue una regla importante se le envia tambien un mail
	 * 
	 */
	public Boolean Notificar(){
		if(usuario.getInformarAlertas()){
			try {
				this.EnviaMail();
			} catch (IOException e) {
				System.out.println("No se ha podido enviar el mail de notificacion");
				e.printStackTrace();
				return false;
			}
			
			if (this.unregla != null){
				
				if (this.unregla.getImportante() == 1){
					this.EnviaSms();
				}
			}
		}
		return true;
	}
	
	
	private void EnviaMail() throws IOException{
		
		String asunto ="Notificacion desde Paranoid";
		
		String Texto = "Se ha producido una alerta en Paranoid y tomado la siguiente accion: "+this.nota.getAccion()+"\n "; //mejorar con mas data del evento
		
		String destinatario = this.usuario.getMail();
		
		
		String comando="mutt -F "+rutaMutt+" -s \""+asunto+"\" \""+destinatario+"\" <<< \""+Texto+"\"";
		
		System.out.println(comando);
		
		Process proc = Runtime.getRuntime().exec(comando);
		
		System.out.println(proc.exitValue());

		
	}
	
	private void EnviaSms(){
	
	
		ManagerConnection managerConnection;
		String boardDefinition="b0"; //definicion estatica de la placa de salida
		
		ManagerConnectionFactory factory = new ManagerConnectionFactory(this.diripAsterisk,this.nombreManager,this.passManager);
		managerConnection = factory.createManagerConnection();
		
		CommandAction comando = new CommandAction();
		CommandResponse respuesta;

		String lineaComando = "khomp sms "+boardDefinition+" "+ this.usuario.getTelefono() +" "+ "PARANOID se ha producido una alerta que requiere su atencion";

		comando.setCommand(lineaComando);
		
		try {
			managerConnection.login();
			respuesta = (CommandResponse) managerConnection.sendAction(comando, 2000);
		} catch (Exception e) {
		}
		managerConnection.logoff();
		}
			
}
































