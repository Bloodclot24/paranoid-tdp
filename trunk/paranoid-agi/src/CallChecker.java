
import org.asteriskjava.fastagi.AgiChannel;
import org.asteriskjava.fastagi.AgiException;
import org.asteriskjava.fastagi.AgiHangupException;
import org.asteriskjava.fastagi.AgiRequest;
import org.asteriskjava.fastagi.BaseAgiScript;

public class CallChecker extends BaseAgiScript {
	
	
		private String Extensiondiscada;
		private AgiChannel canal;
		private AgiRequest dataCanal;
		private String sAvisoGrabando="tt-weasels"; //sonido que avisa que se grabará la llamada
		private String sAvisoCorte="tt-weasels";  //sonido que avisa que se va cortar la misma

		
		//TODO agregar en el CDR ok, fallidas, sospechosas
		 
		
		
	    public void service(AgiRequest request, AgiChannel channel) throws AgiException
	    {
	    	
	    	this.canal = channel;
	    	
	    	Notificacion alerta = UtilsFacade.estadoDeAlerta(request); //consulta si salto alguna alerta
	    	
	    	/**
	    	 * 3 si no pasa y hay que alertar inmediatamente - alerta roja
	    	 * 2 si no pasa y pero solo logueo - alerta naranja
	    	 * 1 si pasa pero hay que alertar - alerta amarilla
	    	 * 0 si pasa - no alerta
	    	 */
	    	
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
	    	
	    	//same => n,Set(CDR(userfield)="llamada registrada paranoid")
	    			
	    			
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
	    		canal.streamFile(this.sAvisoGrabando); //le dice que va a estar siendo grabado
	    		canal.exec("MixMonitor", nombrearch +",mb");
				
			} catch (AgiException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				System.out.println("no pude arrancar a grabar");
			}
	    	
	    }
	    
	    
	    
}
