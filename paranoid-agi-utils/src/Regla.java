public class Regla {

	private String regla;
	private int tipo;
	private int horarioDesde;
	private int horarioHasta;
	private String[] diaSemana;
	private float costoMin;
	private int idRegla;
	
	public String getRegla() {
		return this.regla;
	}
	
	public int getHorarioDesde() {
		return this.horarioDesde;
	}
	
	public int getHorarioHasta() {
		return this.horarioHasta;
	}
	
	public String[] getDiasSemana() {
		return this.diaSemana;
	}
	
	public float getCostoMinuto() {
		return this.costoMin;
	}

	public int getTipo() {
		return this.tipo;
	}

	public void setCostoMinuto(float costoMin) {
		this.costoMin = costoMin;
	}
	public void setTipo(int tipo) {
		this.tipo = tipo;
	}

	
	public void setDiaSemana(String[] diaSemana) {
		this.diaSemana = diaSemana;
	}

	public void setRegla(String regla) {
		this.regla = regla;
	}

	public void setHorarioDesde(int horarioDesde) {
		this.horarioDesde = horarioDesde;
	}

	public void setHorarioHasta(int horarioHasta) {
		this.horarioHasta = horarioHasta;
	}
	
	public boolean evaluar(Llamada llamada) {
		if(tipo == 1) {
			
		}
		return true;
	}

	public int getIdRegla() {
		return idRegla;
	}

	public void setIdRegla(int idRegla) {
		this.idRegla = idRegla;
	}

}
