<?php

    include('../Config/conexion.php');
    include('../Clases/Usuario.php');

    if(isset($_GET['con'])){
        $con = $_GET['con'];

        if($con == 'login'){
            $u = $_GET['u'];
            $p = md5($_GET['p']);

            $fila = 0;

            $consultarUsuario = $datos->exec("SELECT * FROM usuario WHERE id_usuario = '$u' AND password = '$p'");
            while($usuario = $consultarUsuario->fetch(PDO::FETCH_OBJ)){
                $fila++;
            }
            if($fila != 0){
                print json_encode($consultarUsuario);
            } else {
                print json_encode(null);
            }
        }

        if($con == 'registrar'){   
            $data = json_decode(file_get_contents('php://input'), true);
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $cedula = $data['cedula'];
            $telefono = $data['telefono'];
            $foto = "user.png";
            $tipoUsuario = 5;
            $email = $data['email'];
            $password = md5($data['contra']);

            $user = new Usuario($nombre, $apellido, $cedula, $telefono, $foto, $tipoUsuario, $email, $password);
            $insertar = $datos->prepare("INSERT INTO usuario (nombre, apellido, cedula, telefono, foto, id_tipo, email, password) VALUES (:nombre, :apellido, :cedula, :telefono, :foto, :tipoUsuario, :email, :password)");

            try{
                $insertar->execute((array)$user);           
                print json_encode(1);

            } catch (PDOException $ex){
                print json_encode(0);
            }

        }


    }

?>