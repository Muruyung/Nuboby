package com.example.nubobyapp;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

public class putra_putri_tanding extends AppCompatActivity {
    private Button btnPutra;
    private Button btnPutri;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_putra_putri_tanding);

        btnPutra = findViewById(R.id.btnPutra);
        btnPutra.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });

        btnPutri = findViewById(R.id.btnPutri);
        btnPutri.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });
    }

    public void openNextActivity(){
        Intent intent = new Intent(this, baganActivity.class);
        this.startActivities(new Intent[]{intent});
        finish();
    }
}
