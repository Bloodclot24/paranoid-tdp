package tests;

import static org.junit.Assert.*;

import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;

import entidades.Llamada;
import entidades.Notificacion;
import entidades.Regla;
import entidades.UsuarioParanoid;

import servicios.EvaluadorDeReglas;
import servicios.Notificador;
import servicios.ServiceMysql;

public class TestEvaluadorDeReglas {

	static EvaluadorDeReglas evalReg;
	
	static Llamada llamada;
	
	@BeforeClass
	public static void setUpBeforeClass() throws Exception {
		llamada = new Llamada(101,"01145022321",5);
		evalReg = new EvaluadorDeReglas(llamada);
	}

	@AfterClass
	public static void tearDownAfterClass() throws Exception {
	}

	@Test
	public void testNoFallaRegla() {
		//no anda hasta que no se pruebe en el server por el mutt
		Regla regla = evalReg.evaluarReglas();
		
		assertNull(regla);
	}
	
/*	@Test
	public void testGuardarAlerta() {
		
		//not.hayQueGrabar()
		not.reglaIdAsociada = 1;
		not.userIdAsociado = 1;
		
		not.setDatoLlamada("CallerId: 101 - exequiel , Numero Discado: 1569979353");
		
		assertTrue(ServiceMysql.nuevaNotificacion(not));
		
	}
*/	
	

}
