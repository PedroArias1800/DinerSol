package com.example.dinersolandroid.Clases;

public class Usuario {

    private int id_usuario;
    private String nombre;
    private String apellido;
    private String cedula;
    private int tipoUsuario;
    private String email;
    private int id_orden;
    private int total_Orden;
    private String estado;
    private int cafeteria;

    public Usuario(int idU, String n, String a, String c, int tU, String e, int iO, int tO, String es, int Ca) {
        id_usuario = idU;
        nombre = n;
        apellido = a;
        cedula = c;
        tipoUsuario = tU;
        email = e;
        id_orden = iO;
        total_Orden = tO;
        estado = es;
        cafeteria = Ca;
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

    public int getId_tipo() {
        return tipoUsuario;
    }

    public String getEmail() {
        return email;
    }

    public int getId_orden() {
        return id_orden;
    }

    public int getTotal() {
        return total_Orden;
    }

    public String getEstado() {
        return estado;
    }

    public int getCafeteria() {
        return cafeteria;
    }
}