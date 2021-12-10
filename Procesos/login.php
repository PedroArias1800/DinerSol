<?php

    session_start();
    include('../Config/conexion.php');

    //Login

    if(isset($_POST['email']) && isset($_POST['password'])){

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $iniciarSesion = $datos->query("SELECT id_usuario, id_tipo, hash FROM usuario WHERE email='$email' AND password='$password'"); 
        $iniciarSesion->setFetchMode(PDO::FETCH_ASSOC);

        $iniciarSesion->execute();
        $row = $iniciarSesion->fetch();

        if($iniciarSesion->rowCount() > 0){
            echo "Inicio de sessión exitoso";
            $_SESSION['ss']=true;
            $_SESSION['id_usuario']=$row["id_usuario"];
            $_SESSION['id_tipo']=$row['id_tipo'];

            if($row['hash'] != '')
                $datos->exec("UPDATE usuario SET hash='', fecha_hash= NULL WHERE email='$email'");

            header('Location: ../Secciones/paginaPrincipal.php?exito=¡Iniciaste sesión corretamente!');
            exit;
        } 
        else {
            header('Location: ../index.php?error=Datos erróneos, inténtalo nuevamente...');
            exit;
        }
    }
    else{
        echo '<meta http-equiv="refresh" content="0; url=../index.php?error=No se recibieron los datos">';
    }
?>