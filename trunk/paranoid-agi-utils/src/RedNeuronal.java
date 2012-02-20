import java.util.HashMap;

import org.neuroph.core.NeuralNetwork;

enum Costo {
	CERO, BAJO, MEDIANO, ALTO	
}

public class RedNeuronal {

	double nivelDecision;
	HashMap redNeuronalUsuario;
	
	public RedNeuronal() {
		nivelDecision = 0.5;
		redNeuronalUsuario = new HashMap<String,String>();
		redNeuronalUsuario.put(0, "/home/karen/workspace/tdp/paranoid-tdp/paranoid-agi-utils/src/laboral.nnet");
		//redNeuronalUsuario.put(1, "/home/karen/workspace/tdp/paranoid-tdp/paranoid-agi-utils/src/laboralconalmuerzo.nnet");
	}
	
	private Costo obtenerRangoCosto(float costo) {
		if(costo == 0)
			return Costo.CERO;
		if(costo < 1)
			return Costo.BAJO;
		if(costo > 1 && costo < 5)
			return Costo.MEDIANO;
		if(costo > 5)
			return Costo.ALTO;
		return Costo.CERO;
	}
	
	public void setNivelDecision(float nuevoNivel) {
		if(nuevoNivel > 0 && nuevoNivel < 1)
			nivelDecision = nuevoNivel;
	}
	
	public boolean esHabitual(Llamada llamada) {
		NeuralNetwork nnet = NeuralNetwork.load((String)redNeuronalUsuario.get(llamada.getIdUsuario()));
		System.out.println("hora " + llamada.getHora() + " dia " + (llamada.getDia()-1) + " destino " + llamada.getDestino().ordinal() + " costo " + obtenerRangoCosto(llamada.getCostoMinuto()).ordinal());
		nnet.setInput(llamada.getHora()/23.0,
					(llamada.getDia()-1)/6.0, 
					llamada.getDestino().ordinal()/3.0, 
					obtenerRangoCosto(llamada.getCostoMinuto()).ordinal()/3.0);
		nnet.calculate();
		System.out.println(nnet.getOutput()[0]);
		return nnet.getOutput()[0] > nivelDecision;
	}
	
    public static void main(String args[]) {
    	
    	System.out.println("Red Neuronal entrenada para un perfil de usuario " +
    			"que realiza\nllamadas internas, locales y nacionales en horario laboral de 9 a 18 " +
    			"con un costo de entre 0 y 5 pesos");
       	
    	Llamada llamada = new Llamada(0, "180", 4);
    	RedNeuronal red = new RedNeuronal();
    	if(red.esHabitual(llamada))
    		System.out.println("normal");
    	else 
    		System.out.println("anormal\t\tX");
    }
}
