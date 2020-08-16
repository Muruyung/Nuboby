package com.example.nubobyapp;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import butterknife.BindView;
import butterknife.ButterKnife;
import butterknife.OnClick;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Pilih_Tatami extends AppCompatActivity {

    //private Toast comingsoon;
    private long backPressedTime;
    private Toast backToast;
    SharedPreferences pref;

    @BindView(R.id.pilihTatami)
    EditText tatami;
    @BindView(R.id.nomor_juri)
    Spinner nomor_juri;
    @BindView(R.id.btnKata)
    Button btnKata;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tatanami);
        ButterKnife.bind(this);

        pref = getSharedPreferences("user_details",MODE_PRIVATE);
        if (pref.contains("IdJuri")){
            openNextActivity();
        }
        RestClient.api = pref.getString("API", null);

//        Button btnKata;
        //Button btnKomite;

//        btnKata = findViewById(R.id.btnKata);
        //btnKomite = findViewById(R.id.btnKomite);
        //final Context context = this;

//        btnKata.setOnClickListener(v -> openNextActivity());

        /*btnKomite.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                comingsoon = Toast.makeText(getBaseContext(),"Coming Soon..", Toast.LENGTH_SHORT);
                comingsoon.show();
            }
        });*/
    }

    @OnClick(R.id.btnKata)
    public void onViewClicked() {
        if (!tatami.getText().toString().equals("")){
            // Set data untuk mengambil data juri dari API
            BodyPilihTatami bodyPilihTatami =  new BodyPilihTatami();
            bodyPilihTatami.setIdTurnamen(pref.getString("IdTurnamen", null));
            bodyPilihTatami.setTatami(tatami.getText().toString());
            bodyPilihTatami.setNomorJuri(nomor_juri.getSelectedItem().toString());

            // Memanggil data dari API
//            RestClient.api = pref.getString("API", null);
            RestClient.getService().postPilihTatami(bodyPilihTatami).enqueue(new Callback<JuriResponse>() {
                // TODO method dibawah otomatis pada saat new Callback
                @Override
                public void onResponse(Call<JuriResponse> call, Response<JuriResponse> response) {
//                Toast.makeText(LoginActivity.this, response.body().getToken(), Toast.LENGTH_SHORT).show();
                    SharedPreferences.Editor edit = pref.edit();
                    edit.putString("IdJuri", response.body().getId());
                    edit.putString("NomorJuri", response.body().getNomorJuri());
                    edit.putString("Tatami", response.body().getTatami());
                    edit.apply();
                    openNextActivity();
                }

                @Override
                public void onFailure(Call<JuriResponse> call, Throwable t) {
                    backToast = Toast.makeText(getBaseContext(), "Tatami Tidak Tersedia", Toast.LENGTH_SHORT);
                    backToast.show();
                }
            });
        }else{
            backToast = Toast.makeText(getBaseContext(), "Kolom tidak boleh kosong", Toast.LENGTH_SHORT);
            backToast.show();
        }
    }

    public void openNextActivity(){
        Intent intent = new Intent(this, mulai_penilaian.class);
        this.startActivities(new Intent[]{intent});
    }

    @Override
    public void onBackPressed() {

//        AlertDialog.Builder builder = new AlertDialog.Builder(LoginActivity.this);
//        builder.setTitle(R.string.app_name);
//        builder.setIcon(R.mipmap.ic_launcher);
//        builder.setMessage("Do you want to exit?")
//                .setCancelable(false)
//                .setPositiveButton("Yes", new DialogInterface.OnClickListener() {
//                    public void onClick(DialogInterface dialog, int id) {
//                        finish();
//                    }
//                })
//                .setNegativeButton("No", new DialogInterface.OnClickListener() {
//                    public void onClick(DialogInterface dialog, int id) {
//                        dialog.cancel();
//                    }
//                });
//        AlertDialog alert = builder.create();
//        alert.show();
        if (backPressedTime + 2000 > System.currentTimeMillis()){
            backToast.cancel();
            SharedPreferences.Editor edit = pref.edit();
            edit.remove("Token");
            edit.remove("Password");
            edit.apply();
            super.onBackPressed();
            Intent intent = new Intent(this, LoginActivity.class);
            startActivities(new Intent[]{intent});
        }else{
            backToast = Toast.makeText(getBaseContext(), "Press back again to logout", Toast.LENGTH_SHORT);
            backToast.show();
        }

        backPressedTime = System.currentTimeMillis();
//        if (cek == false){
//
//        }
    }
}
