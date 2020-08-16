package com.example.nubobyapp;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

public class nomor_kelas_tanding extends AppCompatActivity {
    private Button btnPerorangan;
    private Button btnBeregu;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_nomor_kelas_tanding);

        btnPerorangan = findViewById(R.id.btnPerorangan);
        btnPerorangan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });

        btnBeregu = findViewById(R.id.btnBeregu);
        btnBeregu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });
    }

    public void openNextActivity(){
        Intent intent = new Intent(this, putra_putri_tanding.class);
        this.startActivities(new Intent[]{intent});
    }
}
