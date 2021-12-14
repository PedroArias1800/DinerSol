<?php

    include('../Config/conexion.php');
    include('../Clases/Usuario.php');

    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['cedula']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['contra1'])){

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $telefono = $_POST['telefono'];
        $foto = "user.png";
        $tipoUsuario = 5;
        $email = $_POST['email'];
        $password = md5($_POST['contra1']);

        $tipoEmail = explode("@", $email);
        if(strtolower($tipoEmail[1]) == "utp.ac.pa"){
            $tipoUsuario = 4;
        }

        $user = new Usuario($nombre, $apellido, $cedula, $telefono, $foto, $tipoUsuario, $email, $password);
        $insertar = $datos->prepare("INSERT INTO usuario (nombre, apellido, cedula, telefono, foto, id_tipo, email, password) VALUES (:nombre, :apellido, :cedula, :telefono, :foto, :tipoUsuario, :email, :password)");

        //Control de excepciones
        try{
            $insertar->execute((array)$user);
            header("Location: ../index.php?exito=¡Se ha registrado exitosamente!");
        } catch (PDOException $ex){
            if($ex->errorInfo[1] == 1062){
                header("Location: ../Secciones/registrarse.php?error=El correo ya está en uso, prueba con otro");
            } else {
                header("Location: ../Secciones/registrarse.php?error=Hubo un error...");
            }
        }
    } else {
        header("Location: ../Secciones/registrarse.php?error=No se recibieron los datos");
        exit;
    }

?>