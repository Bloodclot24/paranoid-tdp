package entidades;


public class UsuarioParanoid {

	private String nombre;
	private String mail;
	private Boolean superuser;
	private String extensionAsociada;
	private Boolean informarAlertas;
	private String telefono;
	

	
	public UsuarioParanoid(String nombre, String mail, Boolean superuser,
			String extensionAsociada, Boolean informarAlertas, String telefono) {
		super();
		this.nombre = nombre;
		this.mail = mail;
		this.superuser = superuser;
		this.extensionAsociada = extensionAsociada;
		this.informarAlertas = informarAlertas;
		this.telefono = telefono;
	}


	public String getNombre() {
		return nombre;
	}



	public String getMail() {
		return mail;
	}



	public Boolean getSuperuser() {
		return superuser;
	}



	public String getExtensionAsociada() {
		return extensionAsociada;
	}



	public Boolean getInformarAlertas() {
		return informarAlertas;
	}



	public String getTelefono() {
		return telefono;
	}
	
	
	
	
}
