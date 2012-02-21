package entidades;
import java.sql.Date;


public class Notificacion {

	Date Fecha;
	String accion;
	String masinfourl;
	public int reglaIdAsociada;
	public int userIdAsociado;
	int estadoDeAlerta;
	Boolean grabar;
	Regla reglaAsociada;
	
	
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
		
		String Mensaje = "";
		
		switch (nivelDeAlerta) {
		case 3:
			Mensaje = "Se ha cortado la llamada y avisado inmediatamente al administrador";
			break;
		case 2:
			Mensaje = "Se ha cortado la llamada";
			break;
		case 1:
			Mensaje = "El comportamiento no es habitual para el usuario, se graba la conversación";
			break;
		default:
			break;

		}
		
		Notificacion not = new Notificacion(Mensaje);
		
		not.setEstadoDeAlerta(nivelDeAlerta);
		
		return not;
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

	public Regla getReglaAsociada() {
		return reglaAsociada;
	}

	public void setReglaAsociada(Regla reglaAsociada) {
		this.reglaAsociada = reglaAsociada;
	}
	
	
	
	
}
