package entidades;

import java.util.ArrayList;
import java.util.Iterator;

public class Regla {

	private String nombre;
	private String tipo;
	private int horarioDesde;
	private int horarioHasta;
	private boolean[] diaSemana = {false, false, false, false, false, false, false};
	private float costoMin;
	private int idRegla;
	private int importante;
	private ArrayList<String> prefijos;
	
	public Regla(int idRegla, int importante, String tipo, String nombre, int horarioDeste, int horarioHasta, float costoMin) {
		this.nombre = nombre;
		this.tipo = tipo;
		this.horarioDesde = horarioDeste;
		this.horarioHasta = horarioHasta;
		this.importante = importante;
		this.idRegla = idRegla;
		this.costoMin = costoMin;
	}
	
	public String getNombre() {
		return this.nombre;
	}
	
	public int getHorarioDesde() {
		return this.horarioDesde;
	}
	
	public int getHorarioHasta() {
		return this.horarioHasta;
	}
	
	public boolean getDiaSemana(int numero) {
		return this.diaSemana[numero];
	}
	
	public float getCostoMinuto() {
		return this.costoMin;
	}

	public String getTipo() {
		return this.tipo;
	}
	
	public void agregarDia(int numero) {
		diaSemana[numero] = true;
	}

	public boolean evaluar(Llamada llamada) {
		boolean resultado = false;
		if(tipo.equals("dias")) {
			if(horarioDesde < llamada.getHora() && llamada.getHora() < horarioHasta && diaSemana[llamada.getDia()])
				resultado = true;
		}
		
		if(tipo.equals("llamadas_simultaneas")) {
			
		}
		
		if(tipo.equals("costo_por_minuto")) {
			if(llamada.getCostoMinuto() < costoMin)
				resultado = true;
		}
		
		if(tipo.equals("destino")) {
			Iterator<String> it = prefijos.iterator();
			String destino = llamada.getNumeroDestino();
			while(it.hasNext()){
				String pref = it.next();
				if(destino.matches("^\\" + pref +".*"))
					resultado = true;
			}	
		}
		
		return resultado;
	}

	public int getIdRegla() {
		return idRegla;
	}

	public int getImportante() {
		return importante;
	}
	
	public void agregarDestino(String prefijo) {
		this.prefijos.add(prefijo);
	}

}
