package entidades;
import java.util.Calendar;

enum Destino {
	INTERNO, LOCAL, NACIONAL, INTERNACIONAL	
}

public class Llamada {
	
	private int idUsuario;
	private Destino destino;
	private int diaEnum;
	private int hora;
	private float costoMin;
	
	private void obtenerFechaYHora() {
		Calendar calendario = Calendar.getInstance();
		this.diaEnum = calendario.get(Calendar.DAY_OF_WEEK);
		this.hora = calendario.get(Calendar.HOUR_OF_DAY);
	}
	
	public Llamada(int idUsuario, String destino, float costoMin) {
		this.idUsuario = idUsuario;
		if(destino.length() == 3 || destino.length() == 4)
			this.destino = Destino.INTERNO;
		else if(destino.startsWith("00"))
			this.destino = Destino.INTERNACIONAL;
		else if(destino.startsWith("0"))
			this.destino = Destino.NACIONAL;
		else
			this.destino = Destino.LOCAL;
		this.costoMin = costoMin;
		obtenerFechaYHora();
	}
	
	public Destino getDestino() {
		return this.destino;
	}
	
	public float getCostoMinuto() {
		return this.costoMin;
	}
	
	public int getDia() {
		return this.diaEnum;
	}
	
	public int getIdUsuario() {
		return this.idUsuario;
	}
	
	public int getHora() {
		return this.hora;
	}
}
