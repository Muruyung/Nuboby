package com.example.nubobyapp;

import com.google.gson.annotations.SerializedName;

public class AtlitResponse{

	@SerializedName("hasil_menang")
	private String hasilMenang;

	@SerializedName("gender")
	private String gender;

	@SerializedName("id_jenis")
	private String idJenis;

	@SerializedName("kontingen")
	private String kontingen;

	@SerializedName("bagan")
	private String bagan;

	@SerializedName("poin_akhir")
	private String poinAkhir;

	@SerializedName("tatanami")
	private String tatanami;

	@SerializedName("id")
	private String id;

	@SerializedName("nama_atlit")
	private String namaAtlit;

	@SerializedName("id_turnamen")
	private String idTurnamen;

	public void setHasilMenang(String hasilMenang){
		this.hasilMenang = hasilMenang;
	}

	public String getHasilMenang(){
		return hasilMenang;
	}

	public void setGender(String gender){
		this.gender = gender;
	}

	public String getGender(){
		return gender;
	}

	public void setIdJenis(String idJenis){
		this.idJenis = idJenis;
	}

	public String getIdJenis(){
		return idJenis;
	}

	public void setKontingen(String kontingen){
		this.kontingen = kontingen;
	}

	public String getKontingen(){
		return kontingen;
	}

	public void setBagan(String bagan){
		this.bagan = bagan;
	}

	public String getBagan(){
		return bagan;
	}

	public void setPoinAkhir(String poinAkhir){
		this.poinAkhir = poinAkhir;
	}

	public String getPoinAkhir(){
		return poinAkhir;
	}

	public void setTatanami(String tatanami){
		this.tatanami = tatanami;
	}

	public String getTatanami(){
		return tatanami;
	}

	public void setId(String id){
		this.id = id;
	}

	public String getId(){
		return id;
	}

	public void setNamaAtlit(String namaAtlit){
		this.namaAtlit = namaAtlit;
	}

	public String getNamaAtlit(){
		return namaAtlit;
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
			"AtlitResponse{" + 
			"hasil_menang = '" + hasilMenang + '\'' + 
			",gender = '" + gender + '\'' + 
			",id_jenis = '" + idJenis + '\'' + 
			",kontingen = '" + kontingen + '\'' + 
			",bagan = '" + bagan + '\'' + 
			",poin_akhir = '" + poinAkhir + '\'' + 
			",tatanami = '" + tatanami + '\'' + 
			",id = '" + id + '\'' + 
			",nama_atlit = '" + namaAtlit + '\'' + 
			",id_turnamen = '" + idTurnamen + '\'' + 
			"}";
		}
}