
public class Notificador {

	
	private String rutaMutt="/usr/src/paranoid/mutconf";

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
	public void Notificar(){
		if(usuario.getInformarAlertas()){
			this.EnviaMail();
			
			if (this.unregla != null){
				
				if (this.unregla.getImportante() == 1){
					this.EnviaSms();
				}
			}
			
		}	
	}
	
	
	private void EnviaMail(){
		
		String asunto ="Notificacion desde Paranoid";
		
		String Texto = "Se ha producido una alerta en Paranoid y tomado la siguiente accion: "+this.nota.getAccion()+"\n "; //mejorar con mas data del evento
		
		String destinatario = this.usuario.getMail();
		
		
		String comando="mutt -F "+rutaMutt+" -s \""+asunto+"\" \""+destinatario+"\" <<< \""+Texto+"\"";
		
		try {
			Runtime.getRuntime().exec(comando);
			}
		catch (Exception err) {
			err.printStackTrace();
			}
		
		
	}
	
	private void EnviaSms(){
		
	}

	
}
