package com.example.nubobyapp;

import android.annotation.SuppressLint;

import okhttp3.OkHttpClient;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

@SuppressLint("Registered")
public class RestClient{

    // TODO menginisiasi MainInterface
    private static MainInterface service;
    private static String sv_api;
    public static String api;

    public static MainInterface getService() {
        if (service == null || (!sv_api.equals(api) && !sv_api.equals(""))) {
            sv_api = api;
            // Membuat base URL
//            String BASE_URL = "http://nuboby.hostingerapp.com/service/";
            String BASE_URL = "http://"+api+".ngrok.io/nuboby_new/service/";

            OkHttpClient.Builder httpClient = new OkHttpClient.Builder();
            Retrofit.Builder builder = new Retrofit.Builder()
                    .baseUrl(BASE_URL)
                    .addConverterFactory(GsonConverterFactory.create());

            Retrofit retrofit = builder.client(httpClient.build()).build();

            service = retrofit.create(MainInterface.class);
        }
        return service;
    }
}
