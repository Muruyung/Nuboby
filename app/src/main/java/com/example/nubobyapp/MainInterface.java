package com.example.nubobyapp;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.POST;
import retrofit2.http.PUT;

public interface MainInterface {
    // TODO Memasukkan Endpoint
    @POST("Login")
    Call<TurnamenResponse> postLogin(@Body BodyLogin bodyLogin);

    @POST("PilihTatami")
    Call<JuriResponse> postPilihTatami(@Body BodyPilihTatami bodyPilihTatami);

    @POST("PilihAtlit")
    Call<AtlitResponse> postPilihAtlit(@Body BodyAtlit bodyAtlit);

    @POST("PilihKelas")
    Call<JenisResponse> postPilihKelas(@Body BodyAtlit bodyAtlit);

    @PUT("Juri")
    Call<ResponseBody> putNilai(@Body BodyNilai bodyNilai);
}
