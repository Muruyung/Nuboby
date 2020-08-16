package com.example.nubobyapp;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

public class baganActivity extends AppCompatActivity {

    private Button baganA;
    private Button baganB;
    private Button baganC;
    private Button baganD;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_bagan);

        baganA = findViewById(R.id.btnBgnA);
        baganA.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });

        baganB = findViewById(R.id.btnBgnB);
        baganB.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });

        baganC = findViewById(R.id.btnBgnC);
        baganC.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });

        baganD = findViewById(R.id.btnBgnD);
        baganD.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openNextActivity();
            }
        });
    }

    public void openNextActivity(){
        Intent intent = new Intent(this, ValuationActivity.class);
        this.startActivities(new Intent[]{intent});
    }
}
