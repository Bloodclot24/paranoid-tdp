
import org.asteriskjava.fastagi.AgiChannel;
import org.asteriskjava.fastagi.AgiException;
import org.asteriskjava.fastagi.AgiHangupException;
import org.asteriskjava.fastagi.AgiRequest;
import org.asteriskjava.fastagi.BaseAgiScript;

public class CallChecker extends BaseAgiScript {
	
	
		private String rutaSonidos="/var/www/paranoid/web/records/";
		private String Extensiondiscada;

	    public void service(AgiRequest request, AgiChannel channel) throws AgiException
	    {
	    	
	    	try {
	    	
	    	this.Extensiondiscada = request.getExtension();
	    	
	    	channel.answer();
	    	
	    	this.arrancaGrabar(channel, "superprueba");
	    	
	    	channel.exec("dial", "LOCAL/"+this.Extensiondiscada+"@llamadas");
	    	        
	        channel.hangup();
	        
	    	} catch (AgiHangupException ex){
	    		System.out.println("la llamada ha sido cortada");
	    		this.hangup(channel);
	    	}
	    	
	    }
	    
	    private void hangup(AgiChannel channel){
	    	
	    	try {
				channel.exec("StopMonitor");
			} catch (AgiException e) {
				// TODO Auto-generated catch block
				System.out.println("no se ha podido detener el monitor");
			}
	    	
	    }
	    
	    private void router(){
	    
	    	
	    }
	    
	    
	    private int checkReglas(){
	    	return 1;
	    }
	    
	    private int checkRed(){
	    	return 1;
	    }
	    
	    
	    
	    public void getPerfilUsuario(){
	    	
	    }
	    
	    public void arrancaGrabar(AgiChannel channel, String nombrearch){
	    	
	    	try {
	    		channel.streamFile("tt-weasels"); //le dice que va a estar siendo grabado
				channel.exec("MixMonitor", rutaSonidos+nombrearch+".wav,mb");
				
			} catch (AgiException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				System.out.println("no pude arrancar a grabar");
			}
	    	
	    }
	    
	    
	    
}
