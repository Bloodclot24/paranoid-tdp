package core;

import java.sql.Date;

import org.asteriskjava.manager.event.PeerEntryEvent;

public class Peer {

	private String Extension;
	private String Tecnologia;
	private Boolean Conectado;
	private Date ultimoRegistro;
	
	
	public Peer(PeerEntryEvent mipeer) {
		
		this.Extension = mipeer.getObjectName();
        this.Tecnologia = mipeer.getChannelType();
        
        if (mipeer.getStatus() == null){
        	this.Conectado = false;
        }else{
        	this.Conectado = mipeer.getStatus().startsWith("OK");
        }
        
        if (mipeer.getTimestamp() == null){
        	this.ultimoRegistro = new Date(0);
        }else{
        	this.ultimoRegistro = new Date(0);
        }
	}


	public String getExtension() {
		return Extension;
	}


	public void setExtension(String extension) {
		Extension = extension;
	}


	public String getTecnologia() {
		return Tecnologia;
	}


	public void setTecnologia(String tecnologia) {
		Tecnologia = tecnologia;
	}


	public Date getUltimoRegistro() {
		return ultimoRegistro;
	}


	public void setUltimoRegistro(Date ultimoRegistro) {
		this.ultimoRegistro = ultimoRegistro;
	}


	public Boolean getConectadoBoolean() {
		return Conectado;
	}
	
	public int getConectadoNumero(){
		
		if (this.Conectado) return 1;
		else return 0;
	}


	public void setConectadoBoolean(Boolean conectado) {
		Conectado = conectado;
	}
	
	
	
	
}
