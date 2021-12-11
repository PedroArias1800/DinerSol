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
    private String cafeteria;

    public Usuario(int idU, String n, String a, String c,  int tU, String e, int iO, int tO, String es, String Ca){
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

    public int getTipoUsuario() {
        return tipoUsuario;
    }

    public String getEmail() {
        return email;
    }

 public int getId_orden() {
        return id_orden;
    }

  public int getTotalOrden() {
        return total_Orden;
    }
     public String getEstado() {
        return estado;
    }
 public String getCafeteria() {
        return cafeteria;
    }