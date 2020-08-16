package com.example.nubobyapp;

import android.content.Context;
import android.content.Intent;
import android.view.animation.Animation;
import android.view.animation.Transformation;
import android.widget.ProgressBar;
import android.widget.TextView;

public class WelcomeAnimation extends Animation {
    private Context konteks;
    private ProgressBar progressBar;
    private TextView loading_Number;
    private float dari;
    private float sampai;

    public WelcomeAnimation(Context konteks, ProgressBar progressBar, TextView loading_Number, float dari, float sampai){
        this.konteks = konteks;
        this.progressBar = progressBar;
        this.loading_Number = loading_Number;
        this.dari = dari;
        this.sampai = sampai;
    }

    @Override
    protected void applyTransformation(float interpolatedTime, Transformation t){
        super.applyTransformation(interpolatedTime, t);
        float value = dari + (sampai - dari) * interpolatedTime;
        progressBar.setProgress((int)value);
        loading_Number.setText((int)value+" %");

        if(value == sampai){
            Intent intent = new Intent(konteks, TokenActivity.class);
            konteks.startActivities(new Intent[]{intent});
        }
    }
}

