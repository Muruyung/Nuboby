package com.example.nubobyapp;

import android.app.Dialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.NumberPicker;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ValuationActivity extends AppCompatActivity {

    private long backPressedtime;
    private Toast backToast;
    SharedPreferences pref; // Deklarasi session
    //private boolean cek = false;
    Dialog halaman;

    private int tec;
    private int ath;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_valuation);

        // Agar tampilan Fullscreen
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
                WindowManager.LayoutParams.FLAG_FULLSCREEN);

        pref = getSharedPreferences("user_details",MODE_PRIVATE); // Membuka session
        RestClient.api = pref.getString("API", null);

        // Mengganti data di tampilan dengan data dari API yang disimpan di session
        ((TextView)findViewById(R.id.judulTanding)).setText(pref.getString("NamaTurnamen",null));
        ((TextView)findViewById(R.id.klsTanding)).setText(pref.getString("Kelas",null));
        ((TextView)findViewById(R.id.isiNama)).setText(pref.getString("NamaAtlit",null));
        ((TextView)findViewById(R.id.isiRound)).setText(pref.getString("Ronde",null));
        ((TextView)findViewById(R.id.isiKontingen)).setText(pref.getString("Kontingen",null));
        ((TextView)findViewById(R.id.isiGroup)).setText(pref.getString("Bagan",null));

//        getWindow().getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_HIDE_NAVIGATION
//                | View.SYSTEM_UI_FLAG_FULLSCREEN);

        // Membuat Number Picker bernilai pecahan
        String[] pecahan = new String [26];
        double pecah = 50;
        double simpan = pecah/10;

        for(int i= 0;i<26;i++){
            pecahan[i] = Double.toString(simpan);
            pecah += 2;
            simpan = pecah/10;
        }
        NumberPicker picker1 = findViewById(R.id.tecValue);
        picker1.setMinValue(0);
        picker1.setMaxValue(25);
//        picker1.setWrapSelectorWheel(true);
//        picker1.setValue(10);
        picker1.setDisplayedValues(pecahan);
        picker1.setOnValueChangedListener((numberPicker, i, i1) -> tec = picker1.getValue());

        NumberPicker picker2 = findViewById(R.id.athValue);
        picker2.setMinValue(0);
        picker2.setMaxValue(25);
//        picker2.setWrapSelectorWheel(true);
//        picker2.setValue(10);
        picker2.setDisplayedValues(pecahan);
        picker2.setOnValueChangedListener((numberPicker, i, i1) -> ath = picker2.getValue());

        halaman = new Dialog(this);

        Button btnOk = findViewById(R.id.btnOk);
        Button btnReset = findViewById(R.id.btnReset);
        Button btnDis = findViewById(R.id.btnDis);

        btnOk.setOnClickListener(v -> bukaHalaman("ok", pecahan));

        btnReset.setOnClickListener(v -> reset());

        btnDis.setOnClickListener(v -> diskualifikasi());
    }

    public void reset(){
        Intent intent = new Intent(this, ValuationActivity.class);
        this.startActivities(new Intent[]{intent});
    }

    public void bukaHalaman(String hasil, String[] pecahan){
        Button btnBack;
        Button btnSubmit;
        halaman.setContentView(R.layout.pop_up_submit);
        btnSubmit = halaman.findViewById(R.id.btnSubmit);
        btnSubmit.setOnClickListener(v1 -> openNextActivity(hasil, pecahan));
        btnBack = halaman.findViewById(R.id.btnBack);
        btnBack.setOnClickListener(v12 -> halaman.dismiss());
        halaman.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        halaman.show();

    }

    public void openNextActivity(String hasil, String[] pecahan){
        // Set data untuk mengambil data juri dari API
        Where where = new Where();
        where.setId(pref.getString("IdJuri", null));

        Data data = new Data();
        if (hasil == "ok"){
            data.setPoinTec(pecahan[tec]);
            data.setPoinAth(pecahan[ath]);
        }else{
            data.setPoinTec("0.00");
            data.setPoinAth("0.00");
        }

        data.setId_atlit("0");

        BodyNilai bodyNilai =  new BodyNilai();
        bodyNilai.setWhere(where);
        bodyNilai.setData(data);

        // Memanggil data dari API
        RestClient.api = pref.getString("API", null);
        RestClient.getService().putNilai(bodyNilai).enqueue(new Callback<ResponseBody>() {
            // TODO method dibawah otomatis pada saat new Callback
            @Override
            public void onResponse(Call<ResponseBody> call, Response<ResponseBody> response) {
                if (response.isSuccessful()){
                    backToast = Toast.makeText(getBaseContext(), "Update Nilai Berhasil", Toast.LENGTH_SHORT);
                    backToast.show();
                    next();
                }else{
                    backToast = Toast.makeText(getBaseContext(), "Gagal Update Data", Toast.LENGTH_SHORT);
                    backToast.show();
                }
            }

            @Override
            public void onFailure(Call<ResponseBody> call, Throwable t) {
                backToast = Toast.makeText(getBaseContext(), "Koneksi Internet Bermasalah", Toast.LENGTH_SHORT);
                backToast.show();
            }
        });
    }

    public void diskualifikasi(){
        Where where = new Where();
        where.setId(pref.getString("IdJuri", null));

        Data data = new Data();
        data.setId_atlit("0");

        BodyNilai bodyNilai =  new BodyNilai();
        bodyNilai.setWhere(where);
        bodyNilai.setData(data);

        // Memanggil data dari API
        RestClient.api = pref.getString("API", null);
        RestClient.getService().putNilai(bodyNilai).enqueue(new Callback<ResponseBody>() {
            // TODO method dibawah otomatis pada saat new Callback
            @Override
            public void onResponse(Call<ResponseBody> call, Response<ResponseBody> response) {
                if (response.isSuccessful()){
                    backToast = Toast.makeText(getBaseContext(), "Update Nilai Berhasil", Toast.LENGTH_SHORT);
                    backToast.show();
                    next();
                }else{
                    backToast = Toast.makeText(getBaseContext(), "Gagal Menghapus Matkul", Toast.LENGTH_SHORT);
                    backToast.show();
                }
            }

            @Override
            public void onFailure(Call<ResponseBody> call, Throwable t) {
                backToast = Toast.makeText(getBaseContext(), "Koneksi Internet Bermasalah", Toast.LENGTH_SHORT);
                backToast.show();
            }
        });
    }

    public void next(){
        Intent intent = new Intent(this, successActivity.class);
        startActivities(new Intent[]{intent});
        finish();
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
        if (backPressedtime + 2000 > System.currentTimeMillis()){
            backToast.cancel();
            super.onBackPressed();
            Intent intent = new Intent(this, mulai_penilaian.class);
            startActivities(new Intent[]{intent});
            finish();
        }else{
            backToast = Toast.makeText(getBaseContext(), "Press back again to close valuation", Toast.LENGTH_SHORT);
            backToast.show();
        }

        backPressedtime = System.currentTimeMillis();
    }
}
