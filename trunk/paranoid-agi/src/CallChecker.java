
import org.asteriskjava.fastagi.AgiChannel;
import org.asteriskjava.fastagi.AgiException;
import org.asteriskjava.fastagi.AgiRequest;
import org.asteriskjava.fastagi.BaseAgiScript;

import core.UtilsFacade;
import entidades.Notificacion;


public class CallChecker extends BaseAgiScript {
	
	
		private String Extensiondiscada;
		private AgiChannel canal;
		private AgiRequest dataCanal;
		private String sAvisoGrabando="grabada"; //sonido que avisa que se grabará la llamada
		private String sAvisoCorte="descartada";  //sonido que avisa que se va cortar la misma

		
		//TODO agregar en el CDR ok, fallidas, sospechosas
		 
		public CallChecker(){
			
		}
		
		
	    public void service(AgiRequest request, AgiChannel channel) throws AgiException
	    {
	    	
	    	this.canal = channel;
	    	this.dataCanal = request;
	    	
	    	Notificacion alerta = UtilsFacade.estadoDeAlerta(request); //consulta si salto alguna alerta
	    	
	    	/**
	    	 * 3 si no pasa y hay que alertar inmediatamente - alerta roja
	    	 * 2 si no pasa y pero solo logueo - alerta naranja
	    	 * 1 si pasa pero hay que alertar - alerta amarilla
	    	 * 0 si pasa - no alerta
	    	 */
	    	
	    	System.out.println("aca toy!");
	    	
	    	switch (alerta.getEstadoDeAlerta()) {
			case 3:
				this.agregaCDR("fallidas");
				this.cortarYavisar();
				break;
			case 2:
				this.agregaCDR("fallidas");
				this.cortarYavisar();
				break;
			case 1:
				this.agregaCDR("sospechosas");
				this.arrancaGrabar(alerta.getMasinfourl());
				this.llamar();
				break;
			case 0:
				this.agregaCDR("ok");
				System.out.println(this);
				this.llamar();
				break;

			default:
				break;
			}
	
	    }
	    
	    
	    /**
	     * llama a destino
	     */
	    private void llamar(){
	    	
	    	try {
	    		
	    		System.out.println(this.dataCanal);
	    		
	    		System.out.println(this.dataCanal.getExtension());
	    		
	    		System.out.println(canal);
	    		
				canal.exec("dial", "LOCAL/"+this.dataCanal.getExtension()+"@llamadas");
				canal.hangup();
			} catch (AgiException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
	    }
	    
	    private void agregaCDR(String mensaje){
	    	
	    	try {
				canal.setVariable("CDR(userfield)", mensaje);
			} catch (AgiException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				System.out.println("no se ha podido cargar la variable al canal");
			}	
	    }
	    
	    /**
	     * @param channel
	     */
	    private void cortarYavisar(){
	    	
	    	try {
	    		canal.streamFile(this.sAvisoCorte);   //aviso que le voy a cortar de sopeton
				this.cortar();
	    		
			} catch (AgiException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
	
	    }
	    
	    private void cortar(){
	    	
	    	try {
				canal.exec("StopMonitor");
				canal.hangup();
			} catch (AgiException e) {
				// TODO Auto-generated catch block
				System.out.println("no se ha podido detener el monitor");
			}
	    	
	    }
	    
	    
	    public void arrancaGrabar(String nombrearch){
	    	
	    	try {
	    		canal.answer();
	    		canal.exec("wait","0.5");
	    		canal.streamFile(this.sAvisoGrabando); //le dice que va a estar siendo grabado
	    		canal.exec("MixMonitor", nombrearch +",mb");
				
			} catch (AgiException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				System.out.println("no pude arrancar a grabar");
			}
	    	
	    }
	    
	    
	    
}
