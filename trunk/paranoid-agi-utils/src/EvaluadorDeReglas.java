import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Iterator;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;



public class EvaluadorDeReglas {

	private Llamada llamada;
	
	
	private ArrayList<Regla> reglas;

	
	private void cargarReglas() {
		//Conexion a MYSQL y traer las reglas para el usuario
		int idUsuario = llamada.getIdUsuario();
		Connection conexion = ConexionBase.getInstance().getConexion();
		Statement s;
        try {
            s =(Statement) conexion.createStatement();
            
            String extension = Integer.toString(idUsuario);
            ResultSet rs = s.executeQuery (
            		"select r.* " +
                    "from sf_guard_user sgu" +
                    ", regla_perfil rp" +
                    ", regla r" +
                    ", usuario_pbx up" +
                    "where" +
                    "sgu.perfil_id=rp.perfil_id" +
                    "and rp.regla_id=r.id" +
                    "and sgu.pbxuser_id=up.id" +
                    "and up.extension='"+extension+"'"
                    );
            
            int idRegla;
            String tipo;
        	int horarioDesde;
        	int horarioHasta;
        	String[] diaSemana;
        	float costoMin;
            String nombreRegla;
            int importante;
            String[] dias = { "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"}; 
        	//TODO ver que hacer si trae NULL
            while (rs.next()) {
            	idRegla = Integer.parseInt(rs.getString("id"));
            	importante = Integer.parseInt(rs.getString("importante"));
            	tipo = rs.getString("type");
            	nombreRegla = rs.getString("nombre");
            	horarioDesde = Integer.parseInt(rs.getString("desde"));
            	horarioHasta = Integer.parseInt(rs.getString("hasta"));
            	costoMin = Float.parseFloat(rs.getString("costomaximo"));
            	
            	Regla regla = new Regla(idRegla, importante, tipo, nombreRegla, horarioDesde, horarioHasta, costoMin);
            	
            	for (int i = 0; i < 7; i++) {
            		if(rs.getString(dias[i])!= null) {
            			regla.agregarDia(i);
            		}
            	}
            	
            	this.reglas.add(regla);
            }
            rs.close();
            s.close();
        }catch (SQLException ex) {
            System.out.println("Hubo un problema al intentar obtener lo datos");
        }
		
		
		
	}
		
	EvaluadorDeReglas(Llamada llamada) {
		this.llamada = llamada;
		cargarReglas();
	}
	
	public Regla evaluarReglas() {
		Iterator<Regla> it = reglas.iterator();
		boolean resultado = true;
		Regla regla = null;
		while(it.hasNext() && resultado) {
			regla = it.next();
			resultado = regla.evaluar(llamada);
		}
		if (resultado == true)
			regla = null;
		return regla;
	}
	
}
