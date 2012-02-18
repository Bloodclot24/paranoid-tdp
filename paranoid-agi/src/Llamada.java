import java.util.Calendar;


public class Llamada {
	
	private int idUsuario;
	private String destino;
	private String dia;
	private int diaEnum;
	private int hora;
	private int costoMin;
	
	private void obtenerFechaYHora() {
		Calendar calendario = Calendar.getInstance();
		this.diaEnum = calendario.get(Calendar.DAY_OF_WEEK);
		this.hora = calendario.get(Calendar.HOUR_OF_DAY);
	}
	
	Llamada(int idUsuario, String destino, int costoMin) {
		this.idUsuario = idUsuario;
		this.destino = destino;
		this.costoMin = costoMin;
		obtenerFechaYHora();
	}
	
	public String getDestino() {
		return this.destino;
	}
	
	public int getCostoMinuto() {
		return this.costoMin;
	}
	
	public String getDia() {
		return this.dia;
	}
	
	public int getIdUsuario() {
		return this.idUsuario;
	}
	
	public int getHora() {
		return this.hora;
	}
	
	public void setDestino(String destino) {
		this.destino = destino;
	}
	
	public void setDia(String dia) {
		this.dia = dia;
	}
	
	public void setCostoMinuto(int costoMin) {
		this.costoMin = costoMin;
	}
	
	public void setIdUsario(int idUsuario) {
		this.idUsuario = idUsuario;
	}
	
}
