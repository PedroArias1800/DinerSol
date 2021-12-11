package com.example.dinersolandroid;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.media.MediaPlayer;
import android.os.Bundle;
import android.widget.TextView;

public class MenuLoginActivity extends AppCompatActivity {

    Intent i;
    MediaPlayer click;
    TextView txtNombre;

    private String Nombre, Apellido, Tipaje;
    private int Tipo;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_login);
        InicializarControles();

        click = MediaPlayer.create(this, R.raw.click);
    }

    public void InicializarControles(){

        Nombre = i.getStringExtra("Nombre");
        Apellido = i.getStringExtra("Apellido");
        Tipo = i.getIntExtra("Tipaje", 0);

        if(Tipo == 1){
            Tipaje="Administrador";
        } else if(Tipo == 2){
            Tipaje="Docente";
        } else if(Tipo == 3){
            Tipaje="Personal Administrativo";
        } else if(Tipo == 4){
            Tipaje="Estudiante";
        } else {
            Tipaje="Usuario Externo";
        }

        txtNombre = (TextView)findViewById(R.id.txtNombreLogin);
        txtNombre.setText(Tipaje+"\n"+Nombre);
    }
}