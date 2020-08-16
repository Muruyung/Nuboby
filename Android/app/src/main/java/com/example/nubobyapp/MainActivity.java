package com.example.nubobyapp;

import android.os.Bundle;
import android.view.View;
import android.view.WindowManager;
import android.widget.ProgressBar;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    ProgressBar progressBar;
    TextView loading_Number;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
                WindowManager.LayoutParams.FLAG_FULLSCREEN);

        getWindow().getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_HIDE_NAVIGATION
                | View.SYSTEM_UI_FLAG_FULLSCREEN);

        progressBar = findViewById(R.id.progressBar);
        loading_Number = findViewById(R.id.loading_Number);

        progressBar.setMax(100);
        progressBar.setScaleY(3f);

        progressAnimation();
        if (getIntent().getBooleanExtra("EXIT", false)) {
            finish();
        }
    }

    public void progressAnimation(){
        WelcomeAnimation load = new WelcomeAnimation(this, progressBar, loading_Number, 0f, 100f);
        load.setDuration(3000);
        progressBar.setAnimation(load);
    }
}
