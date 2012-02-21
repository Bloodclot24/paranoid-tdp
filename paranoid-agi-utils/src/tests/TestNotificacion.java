package tests;

import static org.junit.Assert.*;

import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;

import entidades.Notificacion;
import entidades.UsuarioParanoid;

import servicios.Notificador;
import servicios.ServiceMysql;

public class TestNotificacion {

	static Notificacion not;
	
	static UsuarioParanoid us;
	
	@BeforeClass
	public static void setUpBeforeClass() throws Exception {
		not = Notificacion .getNotificacionDeAlerta(3);
		us = new UsuarioParanoid("exequiel", "exequiel.leite@gmail.com", true, "101", true, "1569979353");
	}

	@AfterClass
	public static void tearDownAfterClass() throws Exception {
	}

	@Test
	public void testNotificar() {
		//no anda hasta que no se pruebe en el server por el mutt
		Notificador notifier = Notificador.getNotificador(not, us);
		
		assertTrue(notifier.Notificar());
	}
	
	@Test
	public void testGuardarAlerta() {
		
		//not.hayQueGrabar()
		not.reglaIdAsociada = 1;
		not.userIdAsociado = 1;
		
		not.setDatoLlamada("CallerId: 101 - exequiel , Numero Discado: 1569979353");
		
		assertTrue(ServiceMysql.nuevaNotificacion(not));
		
	}
	
	

}
