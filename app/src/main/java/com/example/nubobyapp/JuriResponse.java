package com.example.nubobyapp;

import com.google.gson.annotations.SerializedName;

public class JuriResponse {

	@SerializedName("poinTec")
	private String poinTec;

	@SerializedName("nomor_juri")
	private String nomorJuri;

	@SerializedName("id_atlit")
	private String idAtlit;

	@SerializedName("tatami")
	private String tatami;

	@SerializedName("id")
	private String id;

	@SerializedName("id_turnamen")
	private String idTurnamen;

	@SerializedName("status")
	private String status;

	@SerializedName("poinAth")
	private String poinAth;

	public void setPoinTec(String poinTec){
		this.poinTec = poinTec;
	}

	public String getPoinTec(){
		return poinTec;
	}

	public void setNomorJuri(String nomorJuri){
		this.nomorJuri = nomorJuri;
	}

	public String getNomorJuri(){
		return nomorJuri;
	}

	public void setIdAtlit(String idAtlit){
		this.idAtlit = idAtlit;
	}

	public String getIdAtlit(){
		return idAtlit;
	}

	public void setTatami(String tatami){
		this.tatami = tatami;
	}

	public String getTatami(){
		return tatami;
	}

	public void setId(String id){
		this.id = id;
	}

	public String getId(){
		return id;
	}

	public void setIdTurnamen(String idTurnamen){
		this.idTurnamen = idTurnamen;
	}

	public String getIdTurnamen(){
		return idTurnamen;
	}

	public void setStatus(String status){
		this.status = status;
	}

	public String getStatus(){
		return status;
	}

	public void setPoinAth(String poinAth){
		this.poinAth = poinAth;
	}

	public String getPoinAth(){
		return poinAth;
	}

	@Override
 	public String toString(){
		return 
			"DataItem{" + 
			"poinTec = '" + poinTec + '\'' + 
			",nomor_juri = '" + nomorJuri + '\'' + 
			",id_atlit = '" + idAtlit + '\'' + 
			",tatami = '" + tatami + '\'' +
			",id = '" + id + '\'' + 
			",id_turnamen = '" + idTurnamen + '\'' + 
			",status = '" + status + '\'' + 
			",poinAth = '" + poinAth + '\'' + 
			"}";
		}
}