
import org.asteriskjava.fastagi.AgiChannel;
import org.asteriskjava.fastagi.AgiException;
import org.asteriskjava.fastagi.AgiRequest;
import org.asteriskjava.fastagi.BaseAgiScript;

public class CallChecker extends BaseAgiScript {

	    public void service(AgiRequest request, AgiChannel channel) throws AgiException
	    {
	    	
	    	channel.answer();
	    	
	    	//channel.exec(arg0);
	    	
	    	//channel.exec("dial", "LOCAL/43@tdproyectos");
	    	
	        channel.streamFile("tt-monkeys");        
	                
	        channel.hangup();
	    }
}
