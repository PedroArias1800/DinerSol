package com.example.dinersolandroid.Clases;

public class Usuario {

    private int id_usuario;
    private String nombre;
    private String apellido;
    private String cedula;
    private String telefono;
    private String foto;
    private int tipoUsuario;
    private String email;
    private String password;

    public Usuario(int idU, String n, String a, String c, String t, String f, int tU, String e, String p){
        id_usuario = idU;
        nombre = n;
        apellido = a;
        cedula = c;
        telefono = t;
        foto = f;
        tipoUsuario = tU;
        email = e;
        password = p;
    }

    public int getId_usuario() {
        return id_usuario;
    }

    public String getNombre() {
        return nombre;
    }

    public String getApellido() {
        return apellido;
    }

    public String getCedula() {
        return cedula;
    }

    public String getTelefono() {
        return telefono;
    }

    public String getFoto() {
        return foto;
    }

    public int getTipoUsuario() {
        return tipoUsuario;
    }

    public String getEmail() {
        return email;
    }

    public String getPassword() {
        return password;
    }
}
