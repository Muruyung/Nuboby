package com.example.nubobyapp;

import android.content.Context;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;

public class Session {
    private SharedPreferences prefs;

    public Session(Context cntx) {
        // TODO Auto-generated constructor stub
        prefs = PreferenceManager.getDefaultSharedPreferences(cntx);
    }

    public void setLogin(TurnamenResponse turnamen) {
        prefs.edit().putString("Nama_turnamen", turnamen.getNamaTurnamen()).apply();
        prefs.edit().putString("Token", turnamen.getToken()).apply();
        prefs.edit().putString("Password", turnamen.getPassword()).apply();
    }

    public String getNamaTurnamen() {
        return prefs.getString("Nama_turnamen","");
    }

    public String getToken() {
        return prefs.getString("Token","");
    }

    public String getPassword() {
        return prefs.getString("Password","");
    }
}
