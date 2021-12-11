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

    /*

    @GET("api.php?ep=juegos")
    Call<List<Juego>> getAllJuegos();

    @GET("api.php?ep=facultades")
    Call<List<Facultad>> getAllFacultades();

    @POST("api.php?ep=estudiantesSave")
    Call<Integer> postRegistrarEstudiante(@Body CVID_Estudiante estudiante);

    @POST("api.php?ep=partidaSave")
    Call<Integer> postRegistrarPartida(@Body PartidaRequest partida);

    @GET("api.php?ep=preguntas")
    Call<List<Preguntas>> getPreguntas(@Query("nid") int nid);

    @GET("api.php?ep=posiciones")
    Call<List<CVID_Tabla>> getAllTable(@Query("t") int n);

    @POST("api.php?ep=preguntaSave")
    Call<Integer> postRegistrarPregunta(@Body Preguntas preguntas);

    @GET("api.php?ep=preguntasID")
    Call<List<Respuestas>> getPreguntaByID(@Query("pid") int _pregId);

    @POST("api.php?ep=preguntaEdit")
    Call<Integer> postEditarPregunta(@Body Preguntas preguntas);*/
}
