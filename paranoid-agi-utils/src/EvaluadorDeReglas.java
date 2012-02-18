import java.util.ArrayList;
import java.util.Iterator;

import com.mysql.jdbc.Connection;



public class EvaluadorDeReglas {

	private Llamada llamada;
	
	
	private ArrayList<Regla> regla;

	
	private void cargarReglas() {
		//Conexion a MYSQL y traer las reglas para el usuario
		int idUsuario = llamada.getIdUsuario();
		Connection conexion = ConexionBase.getInstance().getConexion();
	}
		
	EvaluadorDeReglas(Llamada llamada) {
		this.llamada = llamada;
		cargarReglas();
	}
	
	public boolean evaluarReglas() {
		Iterator<Regla> it = regla.iterator();
		boolean flag = true;
		boolean resultado = true;
		while(it.hasNext() && flag) {
			Regla regla = (Regla) it.next();
			if (regla.evaluar(llamada) == false){
				flag = false;
				resultado = false;
			}	
		}
		return resultado;
	}
	
}
