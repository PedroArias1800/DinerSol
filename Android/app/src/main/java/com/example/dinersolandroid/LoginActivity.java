package com.example.dinersolandroid;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.media.MediaPlayer;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.example.dinersolandroid.Clases.Usuario;
import com.example.dinersolandroid.Interfaces.ApiService;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {

    EditText txtUser, txtPass;
    MediaPlayer click;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        inicializarVariables();

        click = MediaPlayer.create(this, R.raw.click);

    }

    private void inicializarVariables(){
        txtUser = (EditText)findViewById(R.id.txtUser);
        txtPass = (EditText)findViewById(R.id.txtPasss);
        //password = getMD5(txtPass.getText().toString());
    }

    public void IniciarSesion(View v){
        try {
            click.start();
            String user = txtUser.getText().toString();
            String pass = txtPass.getText().toString();

            //txtUser.setText(password);

            Call<Usuario> response = ApiService.getApiService().getUsuarioLogin(user,pass);
            response.enqueue(new Callback<Usuario>() {
                @Override
                public void onResponse(Call<Usuario> call, Response<Usuario> response) {
                    if (response.isSuccessful()){
                        Usuario usuario = response.body();
                        if (usuario != null){
                            Usuario user =
                                    new Usuario(
                                            usuario.getId_usuario(),
                                            usuario.getNombre(),
                                            usuario.getApellido(),
                                            usuario.getCedula(),
                                            usuario.getId_tipo(),
                                            usuario.getEmail(),
                                            usuario.getId_orden(),
                                            usuario.getTotal(),
                                            usuario.getEstado(),
                                            usuario.getCafeteria()
                                    );

                            Intent i = new Intent(getApplicationContext(), MenuLoginActivity.class);

                            i.putExtra("Nombre", usuario.getNombre());
                            i.putExtra("Apellido", usuario.getApellido());
                            i.putExtra("Tipaje", usuario.getId_tipo());

                            Toast.makeText(getApplicationContext(),i+" XXXX "+user.getNombre()+" "+user.getApellido(),Toast.LENGTH_LONG).show();

                            startActivity(i);

                        }
                    }else {
                        Toast.makeText(getApplicationContext(),"Error Al VVVVV Iniciar Sesión",Toast.LENGTH_LONG).show();
                    }
                }

                @Override
                public void onFailure(Call<Usuario> call, Throwable t) {
                    Toast.makeText(getApplicationContext(),"Error Al Iniciar Sesión",Toast.LENGTH_LONG).show();
                    int x = 1;
                }
            });
        }catch (Exception e){
            Toast.makeText(getApplicationContext(),"Error Al Iniciar Sesión "+e,Toast.LENGTH_LONG).show();
            int x = 1;
        }
    }
/*
    private String getMD5(final String s) {
        try{
            MessageDigest digest = java.security.MessageDigest.getInstance("MD5");
            digest.update(s.getBytes());
            byte messageDigest[] = digest.digest();
            StringBuilder hexString = new StringBuilder();
            for(int i = 0; i < messageDigest.length; i++){
                String h = Integer.toHexString(0xFF & messageDigest[i]);
                while(h.length() < 2){
                    h = "0" + h;
                }
                hexString.append(h);
            }
            return hexString.toString();
        }catch (NoSuchAlgorithmException e){
            Log.e("MD5", "md5() NoSuchAlgorithmException: " + e.getMessage());
        }
        return "";
    }*/

    public void Registrarse(View v){
        click.start();
        Intent i = new Intent(getApplicationContext(), RegistrarseActivity.class);
        i.putExtra("num", 1);
        startActivity(i);
    }

    public void RecuperarContraseña(View view) {
        click.start();
        startActivity(new Intent(getApplicationContext(), RecuperarContrasenaActivity.class));
    }

    public void Utp(View view) {
        click.start();
        Intent i = new Intent(Intent.ACTION_VIEW, Uri.parse("https://utp.ac.pa/"));
        startActivity(i);
    }

    public void UtpFisc(View view) {
        click.start();
        Intent i = new Intent(Intent.ACTION_VIEW, Uri.parse("https://fisc.utp.ac.pa/"));
        startActivity(i);
    }

}