<?php

    include('../Config/conexion.php');
    //Consultando el usuario loggeado por el id
    $id = $_SESSION['id_usuario'];
    $resultado = $datos->query("SELECT id_usuario, nombre, apellido, telefono, foto, id_tipo, email FROM usuario WHERE id_usuario='$id'");
    $resultado->setFetchMode(PDO::FETCH_OBJ);

    $datosDelUsuario = $resultado->fetch();

?>