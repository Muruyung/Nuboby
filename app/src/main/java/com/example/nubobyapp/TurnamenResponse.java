package com.example.nubobyapp;

import com.google.gson.annotations.SerializedName;

public class TurnamenResponse{

	@SerializedName("nama_turnamen")
	private String namaTurnamen;

	@SerializedName("jumlah_tatami")
	private String jumlahTatami;

	@SerializedName("password")
	private String password;

	@SerializedName("lokasi")
	private String lokasi;

	@SerializedName("jumlah_bagan")
	private String jumlahBagan;

	@SerializedName("terisi")
	private String terisi;

	@SerializedName("id")
	private String id;

	@SerializedName("token")
	private String token;

	@SerializedName("status")
	private String status;

	public void setNamaTurnamen(String namaTurnamen){
		this.namaTurnamen = namaTurnamen;
	}

	public String getNamaTurnamen(){
		return namaTurnamen;
	}

	public void setJumlahTatami(String jumlahTatami){
		this.jumlahTatami = jumlahTatami;
	}

	public String getJumlahTatami(){
		return jumlahTatami;
	}

	public void setPassword(String password){
		this.password = password;
	}

	public String getPassword(){
		return password;
	}

	public void setLokasi(String lokasi){
		this.lokasi = lokasi;
	}

	public String getLokasi(){
		return lokasi;
	}

	public void setJumlahBagan(String jumlahBagan){
		this.jumlahBagan = jumlahBagan;
	}

	public String getJumlahBagan(){
		return jumlahBagan;
	}

	public void setTerisi(String terisi){
		this.terisi = terisi;
	}

	public String getTerisi(){
		return terisi;
	}

	public void setId(String id){
		this.id = id;
	}

	public String getId(){
		return id;
	}

	public void setToken(String token){
		this.token = token;
	}

	public String getToken(){
		return token;
	}

	public void setStatus(String status){
		this.status = status;
	}

	public String getStatus(){
		return status;
	}

	@Override
 	public String toString(){
		return 
			"TurnamenResponse{" + 
			"nama_turnamen = '" + namaTurnamen + '\'' + 
			",jumlah_tatami = '" + jumlahTatami + '\'' +
			",password = '" + password + '\'' + 
			",lokasi = '" + lokasi + '\'' + 
			",jumlah_bagan = '" + jumlahBagan + '\'' + 
			",terisi = '" + terisi + '\'' + 
			",id = '" + id + '\'' + 
			",token = '" + token + '\'' + 
			",status = '" + status + '\'' + 
			"}";
		}
}