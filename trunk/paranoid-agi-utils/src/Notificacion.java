import java.sql.Date;


public class Notificacion {

	Date Fecha;
	String accion;
	String masinfourl;
	int reglaIdAsociada;
	int userIdAsociado;
	int estadoDeAlerta;
	Boolean grabar;
	
	
	private Notificacion(String accionTomada) {
		super();
		this.accion = accionTomada;
		java.util.Date today = new java.util.Date();
		this.Fecha = new java.sql.Date(today.getTime());


	}
	
	private Notificacion(){
		this.estadoDeAlerta = 0;

	}
	
	public static Notificacion getNotificacionVerde(){
		return new Notificacion();
		
	}

	public static Notificacion getNotificacionDeAlerta(int nivelDeAlerta){
		
		String Mensaje;
		
		switch (nivelDeAlerta) {
		case 3:
			Mensaje = "Se ha violado una regla marcada como importante";
			return new Notificacion(Mensaje);

		case 2:
			Mensaje = "Se ha violado una regla no determinante";
			return new Notificacion(Mensaje);
			
		case 1:
			Mensaje = "La llamada no es normal para este usuario";
			return new Notificacion(Mensaje);

		default:
			return null;
		}
	}
	

	public Date getFecha() {
		return Fecha;
	}


	public void setFecha(Date fecha) {
		Fecha = fecha;
	}


	public String getAccion() {
		return accion;
	}


	public void setAccion(String accion) {
		this.accion = accion;
	}


	public String getMasinfourl() {
		return masinfourl;
	}


	public void setMasinfourl(String masinfourl) {
		this.masinfourl = masinfourl;
	}


	public int getReglaIdAsociada() {
		return reglaIdAsociada;
	}


	public void setReglaIdAsociada(int reglaIdAsociada) {
		this.reglaIdAsociada = reglaIdAsociada;
	}


	public int getUserIdAsociado() {
		return userIdAsociado;
	}


	public void setUserIdAsociado(int userIdAsociado) {
		this.userIdAsociado = userIdAsociado;
	}

	public int getEstadoDeAlerta() {
		return estadoDeAlerta;
	}

	public void setEstadoDeAlerta(int estadoDeAlerta) {
		this.estadoDeAlerta = estadoDeAlerta;
	}

	public Boolean hayQueGrabar() {
		return grabar;
	}

	public void setGrabar(Boolean grabar) {
		this.grabar = grabar;
	}
	
	
	
	
}
