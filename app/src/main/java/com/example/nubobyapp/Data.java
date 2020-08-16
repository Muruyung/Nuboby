package com.example.nubobyapp;

import com.google.gson.annotations.SerializedName;

public class Data{

	@SerializedName("poinTec")
	private String poinTec;

	@SerializedName("poinAth")
	private String poinAth;

	@SerializedName("id_atlit")
	private String id_atlit;

	public void setPoinTec(String poinTec){
		this.poinTec = poinTec;
	}

	public String getPoinTec(){
		return poinTec;
	}

	public void setPoinAth(String poinAth){
		this.poinAth = poinAth;
	}

	public String getPoinAth(){
		return poinAth;
	}

	public void setId_atlit(String id_atlit){
		this.id_atlit = id_atlit;
	}

	public String getId_atlit(){
		return id_atlit;
	}

	@Override
 	public String toString(){
		return 
			"Data{" + 
			"poinTec = '" + poinTec + '\'' + 
			",poinAth = '" + poinAth + '\'' +
			",id_atlit = '" + id_atlit + '\'' +
			"}";
		}
}