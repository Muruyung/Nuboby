package com.example.nubobyapp;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import butterknife.BindView;
import butterknife.ButterKnife;
import butterknife.OnClick;

public class TokenActivity extends AppCompatActivity {

    private long backPressedTime;
    private Toast backToast;
    private boolean cek = false;
    @BindView(R.id.Token)
    EditText token;
    @BindView(R.id.btnToken)
    Button btnToken;

    SharedPreferences pref;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_token);
        ButterKnife.bind(this);

        pref = getSharedPreferences("user_details",MODE_PRIVATE);
//        if (pref.contains("Token") && pref.contains("Password")){
////            openNextActivity();
//            BodyLogin  bodyLogin =  new BodyLogin();
//            bodyLogin.setToken(pref.getString("Token", null));
//            bodyLogin.setPassword(pref.getString("Password", null));
//
//
//            RestClient.getService().postLogin(bodyLogin).enqueue(new Callback<TurnamenResponse>() {
//                // TODO method dibawah otomatis pada saat new Callback
//                @Override
//                public void onResponse(Call<TurnamenResponse> call, Response<TurnamenResponse> response) {
////                Toast.makeText(LoginActivity.this, response.body().getToken(), Toast.LENGTH_SHORT).show();
//                    if (response.body() != null) {
//                        openNextActivity();
//                    }
//                }
//
//                @Override
//                public void onFailure(Call<TurnamenResponse> call, Throwable t) {
////                backToast = Toast.makeText(getBaseContext(), "Username atau password salah", Toast.LENGTH_SHORT);
////                backToast.show();
//                }
//            });
//        }
    }

    @OnClick(R.id.btnToken)
    public void onViewClicked() {
        if (!token.getText().toString().equals("")){
            SharedPreferences.Editor edit = pref.edit();
            edit.putString("API", token.getText().toString());
            edit.apply();
            openNextActivity();
        }else{
            backToast = Toast.makeText(getBaseContext(), "Kolom tidak boleh kosong", Toast.LENGTH_SHORT);
            backToast.show();
        }
    }

    public void openNextActivity(){
        Intent intent = new Intent(this, LoginActivity.class);
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
            this.keluar();
            cek = true;
        }else{
            backToast = Toast.makeText(getBaseContext(), "Press back again to exit", Toast.LENGTH_SHORT);
            backToast.show();
        }

        if (!cek){
            backPressedTime = System.currentTimeMillis();
        }
    }

    private void keluar(){
        Intent intent = new Intent(getApplicationContext(), MainActivity.class);
        intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        intent.putExtra("EXIT", true);
        startActivity(intent);
//        stopService(intent);
//        finish();
//        System.exit(0);
    }
}
