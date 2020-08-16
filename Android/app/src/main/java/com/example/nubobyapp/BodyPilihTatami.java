package com.example.nubobyapp;

import com.google.gson.annotations.SerializedName;

public class BodyPilihTatami {

	@SerializedName("id_turnamen")
	private String idTurnamen;

	@SerializedName("nomor_juri")
	private String nomorJuri;

	@SerializedName("tatami")
	private String tatami;

	public void setIdTurnamen(String idTurnamen){
		this.idTurnamen = idTurnamen;
	}

	public String getIdTurnamen(){
		return idTurnamen;
	}

	public void setNomorJuri(String nomorJuri){
		this.nomorJuri = nomorJuri;
	}

	public String getNomorJuri(){
		return nomorJuri;
	}

	public void setTatami(String tatami){
		this.tatami = tatami;
	}

	public String getTatami(){
		return tatami;
	}

	@Override
 	public String toString(){
		return 
			"BodyPilihTatami{" +
				"id_turnamen = '" + idTurnamen + '\'' +
				",nomor_juri = '" + nomorJuri + '\'' +
				",tatami = '" + tatami + '\'' +
			"}";
		}
}