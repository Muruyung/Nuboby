package com.example.nubobyapp;

import com.google.gson.annotations.SerializedName;

public class BodyNilai{

	@SerializedName("data")
	private Data data;

	@SerializedName("where")
	private Where where;

	public void setData(Data data){
		this.data = data;
	}

	public Data getData(){
		return data;
	}

	public void setWhere(Where where){
		this.where = where;
	}

	public Where getWhere(){
		return where;
	}

	@Override
 	public String toString(){
		return 
			"BodyNilai{" + 
				"data = '" + data + '\'' +
				",where = '" + where + '\'' +
			"}";
		}
}