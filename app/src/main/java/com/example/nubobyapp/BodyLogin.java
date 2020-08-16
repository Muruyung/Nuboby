package com.example.nubobyapp;

import com.google.gson.annotations.SerializedName;

public class BodyLogin{

	@SerializedName("password")
	private String password;

	@SerializedName("token")
	private String token;

	public void setPassword(String password){
		this.password = password;
	}

	public String getPassword(){
		return password;
	}

	public void setToken(String token){
		this.token = token;
	}

	public String getToken(){
		return token;
	}

	@Override
 	public String toString(){
		return 
			"BodyLogin{" +
				"password = '" + password + '\'' +
				",token = '" + token + '\'' +
			"}";
		}
}