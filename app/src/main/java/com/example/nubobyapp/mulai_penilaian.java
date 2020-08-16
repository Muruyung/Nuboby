package com.example.nubobyapp;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.widget.Button;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import butterknife.BindView;
import butterknife.ButterKnife;
import butterknife.OnClick;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class mulai_penilaian extends AppCompatActivity {
    private Toast backToast;
    SharedPreferences pref;

    @BindView(R.id.btnMulai)
    Button btnMulai;

    Handler handler = new Handler();
    int apiDelayed = 5*100; //1 second=1000 milisecond
    Runnable runnable;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mulai_penilaian);
        ButterKnife.bind(this);

        pref = getSharedPreferences("user_details",MODE_PRIVATE);
        RestClient.api = pref.getString("API", null);
//        if (pref.contains("IdAtlit")){
//            openNextActivity();
//        }
        getDataJuri();
    }

    @Override
    protected void onResume() {
        super.onResume();

        handler.postDelayed( runnable = new Runnable() {
            public void run() {
                //do your function;
                getDataJuri();
                handler.postDelayed(runnable, apiDelayed);
            }
        }, apiDelayed); // so basically after your getHeroes(), from next time it will be 5 sec repeated
    }

    @Override
    protected void onPause() {
        super.onPause();
        handler.removeCallbacks(runnable); //stop handler when activity not visible
    }

    public void getDataJuri(){
        // Set data untuk mengambil data juri dari API
        BodyPilihTatami bodyPilihTatami =  new BodyPilihTatami();
        bodyPilihTatami.setIdTurnamen(pref.getString("IdTurnamen", null));
        bodyPilihTatami.setTatami(pref.getString("Tatami", null));
        bodyPilihTatami.setNomorJuri(pref.getString("NomorJuri", null));

        // Memanggil data dari API
//        RestClient.api = pref.getString("API", null);
        RestClient.getService().postPilihTatami(bodyPilihTatami).enqueue(new Callback<JuriResponse>() {
            // TODO method dibawah otomatis pada saat new Callback
            @Override
            public void onResponse(Call<JuriResponse> call, Response<JuriResponse> response) {
//                Toast.makeText(LoginActivity.this, response.body().getToken(), Toast.LENGTH_SHORT).show();
                SharedPreferences.Editor edit = pref.edit();
                assert response.body() != null;
                edit.putString("IdAtlit", response.body().getIdAtlit());
                edit.apply();
            }

            @Override
            public void onFailure(Call<JuriResponse> call, Throwable t) {
                backToast = Toast.makeText(getBaseContext(), "Tatami Tidak Tersedia", Toast.LENGTH_SHORT);
                backToast.show();
            }
        });
    }

    @OnClick(R.id.btnMulai)
    public void onViewClicked() {
//        BodyPilihTatami bodyPilihTatami =  new BodyPilihTatami();
//        bodyPilihTatami.setIdTurnamen(pref.getString("IdTurnamen", null));
//        bodyPilihTatami.setTatami(pref.getString("Tatami", null));
//        bodyPilihTatami.setNomorJuri(pref.getString("NomorJuri", null));
//
//        // Memanggil data dari API
////        RestClient.api = pref.getString("API", null);
//        RestClient.getService().postPilihTatami(bodyPilihTatami).enqueue(new Callback<JuriResponse>() {
//            // TODO method dibawah otomatis pada saat new Callback
//            @Override
//            public void onResponse(Call<JuriResponse> call, Response<JuriResponse> response) {
//                if (!response.body().getIdAtlit().equals("0")){
////                  Toast.makeText(LoginActivity.this, response.body().getToken(), Toast.LENGTH_SHORT).show();
//                    SharedPreferences.Editor edit = pref.edit();
//                    assert response.body() != null;
//                    edit.putString("IdAtlit", response.body().getIdAtlit());
//                    edit.apply();
////                    backToast = Toast.makeText(getBaseContext(), response.body().getIdAtlit() , Toast.LENGTH_SHORT);
////                    backToast.show();
//                } else{
//                    backToast = Toast.makeText(getBaseContext(), "Atlit Tidak Tersedia", Toast.LENGTH_SHORT);
//                    backToast.show();
//                }
//            }
//
//            @Override
//            public void onFailure(Call<JuriResponse> call, Throwable t) {
//                backToast = Toast.makeText(getBaseContext(), "Tatami Tidak Tersedia", Toast.LENGTH_SHORT);
//                backToast.show();
//            }
//        });
//
        BodyAtlit  bodyAtlit =  new BodyAtlit();
        bodyAtlit.setId(pref.getString("IdAtlit", null));

//        RestClient.api = pref.getString("API", null);
        RestClient.getService().postPilihAtlit(bodyAtlit).enqueue(new Callback<AtlitResponse>() {
            // TODO method dibawah otomatis pada saat new Callback
            @Override
            public void onResponse(Call<AtlitResponse> call, Response<AtlitResponse> response) {
//                Toast.makeText(LoginActivity.this, response.body().getToken(), Toast.LENGTH_SHORT).show();
                SharedPreferences.Editor edit = pref.edit();
                assert response.body() != null;
                edit.putString("NamaAtlit", response.body().getNamaAtlit());
                edit.putString("Kontingen", response.body().getKontingen());
                edit.putString("Bagan", response.body().getBagan());
                edit.apply();
                getKelas(response.body().getIdJenis());
//                openNextActivity();
            }

            @Override
            public void onFailure(Call<AtlitResponse> call, Throwable t) {
                backToast = Toast.makeText(getBaseContext(), "Atlit Tidak Tersedia", Toast.LENGTH_SHORT);
                backToast.show();
            }
        });
    }

    public void getKelas(String id){
        BodyAtlit  bodyAtlit =  new BodyAtlit();
        bodyAtlit.setId(id);

//        RestClient.api = pref.getString("API", null);
        RestClient.getService().postPilihKelas(bodyAtlit).enqueue(new Callback<JenisResponse>() {
            // TODO method dibawah otomatis pada saat new Callback
            @Override
            public void onResponse(Call<JenisResponse> call, Response<JenisResponse> response) {
//                Toast.makeText(LoginActivity.this, response.body().getToken(), Toast.LENGTH_SHORT).show();
                SharedPreferences.Editor edit = pref.edit();
                assert response.body() != null;
                edit.putString("Kelas", response.body().getKelas());
                edit.putString("Ronde", response.body().getRonde());
                edit.apply();
                openNextActivity();
            }

            @Override
            public void onFailure(Call<JenisResponse> call, Throwable t) {
                backToast = Toast.makeText(getBaseContext(), "Kelas Tidak Tersedia", Toast.LENGTH_SHORT);
                backToast.show();
            }
        });
    }

    public void openNextActivity(){
        Intent intent = new Intent(this, ValuationActivity.class);
        this.startActivities(new Intent[]{intent});
    }

    @Override
    public void onBackPressed(){
        SharedPreferences.Editor edit = pref.edit();
        edit.remove("IdJuri");
        edit.apply();

        Intent intent = new Intent(this, Pilih_Tatami.class);
        this.startActivities(new Intent[]{intent});
    }
}
