package com.example.dinersolandroid;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.media.MediaPlayer;
import android.net.Uri;
import android.os.Bundle;
import android.text.Editable;
import android.view.View;
import android.widget.EditText;

import com.example.dinersolandroid.Clases.Usuario;
import com.example.dinersolandroid.Interfaces.ApiService;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RegistrarseActivity extends AppCompatActivity {

    MediaPlayer click;
    EditText nombre, apellido, cedula, telefono, email, pass1, pass2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registrarse);

        click = MediaPlayer.create(this, R.raw.click);

        InicializarControles();

    }

    public void InicializarControles(){
        nombre = (EditText)findViewById(R.id.TextInputNombre);
        apellido = (EditText)findViewById(R.id.TextInputApellido);
        cedula = (EditText)findViewById(R.id.TextInputCedula);
        telefono = (EditText)findViewById(R.id.TextInputTelefono);
        pass1 = (EditText)findViewById(R.id.TextInputpassword);
        pass2 = (EditText)findViewById(R.id.TextInputrepPassword);
    }

    public void RegistrarUsuario(View v){
        try {
            Usuario usuario = new Usuario(
                                        0,
                                        nombre.getText().toString(),
                                        apellido.getText().toString(),
                                        cedula.getText().toString(),
                                        0,
                                        "user.png",
                                        0,
                                        0,
                                        email.getText().toString(),
                                        //pass1.getText().toString()
                                        0 );

            Call<Integer> response = ApiService.getApiService().postRegistrarUsuario(usuario);
            response.enqueue(new Callback<Integer>() {
                @Override
                public void onResponse(Call<Integer> call, Response<Integer> response) {
                    if (response.isSuccessful()){
                        int x = 1;
                    }else{
                        int x = 1;
                    }
                }

                @Override
                public void onFailure(Call<Integer> call, Throwable t) {
                    int x = 1;
                }
            });

        }catch (Exception e){
            int x= 1;
        }
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