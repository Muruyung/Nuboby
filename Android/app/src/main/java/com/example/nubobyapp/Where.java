package com.example.nubobyapp;

import com.google.gson.annotations.SerializedName;

public class Where{

	@SerializedName("id")
	private String id;

	public void setId(String id){
		this.id = id;
	}

	public String getId(){
		return id;
	}

	@Override
 	public String toString(){
		return 
			"Where{" + 
				"id = '" + id + '\'' +
			"}";
		}
}