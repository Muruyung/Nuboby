package com.example.nubobyapp;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

public class nomor_pertandingan extends AppCompatActivity {
    private Toast comingsoon;
    private long backPressedtime;
    private Toast backToast;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_nomor_pertandingan);

        Button btnKata;
        Button btnKomite;

        btnKata = findViewById(R.id.btnKata);
        btnKomite = findViewById(R.id.btnKomite);

        btnKata.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });

        btnKomite.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                comingsoon = Toast.makeText(getBaseContext(),"Coming Soon..", Toast.LENGTH_SHORT);
                comingsoon.show();
            }
        });
    }

    public void openNextActivity(){
        Intent intent = new Intent(this, kelas_tanding.class);
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
        if (backPressedtime + 2000 > System.currentTimeMillis()){
            backToast.cancel();
            super.onBackPressed();
            Intent intent = new Intent(this, LoginActivity.class);
            startActivities(new Intent[]{intent});
        }else{
            backToast = Toast.makeText(getBaseContext(), "Press back again to logout", Toast.LENGTH_SHORT);
            backToast.show();
        }

        backPressedtime = System.currentTimeMillis();
//        if (cek == false){
//
//        }
    }
}
