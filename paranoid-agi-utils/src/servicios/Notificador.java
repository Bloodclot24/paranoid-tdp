package servicios;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

import entidades.Notificacion;
import entidades.Regla;
import entidades.UsuarioParanoid;


public class Notificador {

	
	//private String rutaMutt="/usr/src/paranoid/mutconf";
	private String rutaMutt="/home/zeke/workspace/paranoid-agi-utils/mutconf";

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
		
	}

	
}
