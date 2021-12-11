package com.example.dinersolandroid;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.media.MediaPlayer;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.example.dinersolandroid.Clases.Usuario;
import com.example.dinersolandroid.Interfaces.ApiService;

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
    }

    public void IniciarSesion(View v){
        try {
            click.start();
            String user = txtUser.getText().toString();
            String pass = txtPass.getText().toString();

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
                                            usuario.getTelefono(),
                                            usuario.getFoto(),
                                            usuario.getTipoUsuario(),
                                            usuario.getEmail(),
                                            usuario.getPassword()
                                    );

                            Toast.makeText(getApplicationContext(),"Login Exitoso",Toast.LENGTH_LONG).show();

                            Intent i = new Intent(getApplicationContext(), MenuLoginActivity.class);

                            i.putExtra("Nombre", usuario.getNombre());
                            i.putExtra("Apellido", usuario.getApellido());
                            i.putExtra("Tipaje", usuario.getTipoUsuario());

                            startActivity(i);

                        }
                    }else {
                        Toast.makeText(getApplicationContext(),"Error Al Iniciar Sesión",Toast.LENGTH_LONG).show();
                    }
                }

                @Override
                public void onFailure(Call<Usuario> call, Throwable t) {
                    Toast.makeText(getApplicationContext(),"Error Al Iniciar Sesión",Toast.LENGTH_LONG).show();
                    int x = 1;
                }
            });
        }catch (Exception e){
            Toast.makeText(getApplicationContext(),"Error Al Iniciar Sesión",Toast.LENGTH_LONG).show();
            int x = 1;
        }
    }

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