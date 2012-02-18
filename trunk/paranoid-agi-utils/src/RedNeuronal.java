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
		redNeuronalUsuario.put(0, "../condestino.nnet");
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
	
	public boolean obtenerResultado(Llamada llamada) {
		NeuralNetwork nnet = NeuralNetwork.load((String)redNeuronalUsuario.get(llamada.getIdUsuario()));
		nnet.setInput(llamada.getHora()/24.0,
					llamada.getDestino().ordinal()/4.0, 
					llamada.getDia()/7.0, 
					obtenerRangoCosto(llamada.getCostoMinuto()).ordinal()/4.0);
		nnet.calculate();
		return nnet.getOutput()[0] > nivelDecision;
	}
}
