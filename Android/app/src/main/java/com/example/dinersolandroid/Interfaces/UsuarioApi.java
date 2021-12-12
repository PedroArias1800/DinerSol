package com.example.dinersolandroid.Interfaces;

import com.example.dinersolandroid.Clases.Usuario;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.POST;
import retrofit2.http.Query;

public interface UsuarioApi {

    @GET("api.php?con=login")
    Call<Usuario> getUsuarioLogin(@Query("u") String u, @Query("p") String p);

    @POST("api.php?con=registrarUsuario")
    Call<Integer> postRegistrarUsuario(@Body Usuario usuario);

}
