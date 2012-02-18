import java.util.HashMap;

import org.neuroph.core.NeuralNetwork;

public class RedNeuronal {

	double nivelDecision;
	HashMap redNeuronalUsuario;
	
	
	public RedNeuronal() {
		nivelDecision = 0.5;
		redNeuronalUsuario = new HashMap<String,String>();
		redNeuronalUsuario.put(0, "../condestino.nnet");
	}
	
	private double obtenerRangoCosto(float costo) {
		return 0;
	}
	
	public void setNivelDecision(float nuevoNivel) {
		if(nuevoNivel > 0 && nuevoNivel < 1)
			nivelDecision = nuevoNivel;
	}
	
	public boolean obtenerResultado(Llamada llamada) {
		NeuralNetwork nnet = NeuralNetwork.load(redNeuronalUsuario.get(llamada.getUsuario()));
		nnet.setInput(llamada.getHora()/24.0,
					llamada.getDestino()/4.0, 
					llamada.getDia()/7.0, 
					obtenerRangoCosto(llamada.getCosto()));
		nnet.calculate();
		return nnet.getOutput()[0] > nivelDecision;
	}
}
