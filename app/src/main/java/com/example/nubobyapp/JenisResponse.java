package com.example.nubobyapp;

import com.google.gson.annotations.SerializedName;

public class JenisResponse{

	@SerializedName("kelas")
	private String kelas;

	@SerializedName("ronde")
	private String ronde;

	@SerializedName("id")
	private String id;

	@SerializedName("id_turnamen")
	private String idTurnamen;

	public void setKelas(String kelas){
		this.kelas = kelas;
	}

	public String getKelas(){
		return kelas;
	}

	public void setRonde(String ronde){
		this.ronde = ronde;
	}

	public String getRonde(){
		return ronde;
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

	@Override
 	public String toString(){
		return 
			"JenisResponse{" + 
			"kelas = '" + kelas + '\'' + 
			",ronde = '" + ronde + '\'' + 
			",id = '" + id + '\'' + 
			",id_turnamen = '" + idTurnamen + '\'' + 
			"}";
		}
}