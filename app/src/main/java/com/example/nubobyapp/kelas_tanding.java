package com.example.nubobyapp;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

public class kelas_tanding extends AppCompatActivity {
    private Button btnSenior;
    private Button btnU21;
    private Button btnJunior;
    private Button btnKadet;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_kelas_tanding);

        btnSenior = findViewById(R.id.btnSenior);
        btnSenior.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });

        btnU21 = findViewById(R.id.btnU21);
        btnU21.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });

        btnJunior = findViewById(R.id.btnJunior);
        btnJunior.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });

        btnKadet = findViewById(R.id.btnKadet);
        btnKadet.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });
    }

    public void openNextActivity(){
        Intent intent = new Intent(this, nomor_kelas_tanding.class);
        this.startActivities(new Intent[]{intent});
    }
}
