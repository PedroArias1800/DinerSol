<?php
    include("../Config/conexion.php");

    if(isset($_REQUEST['hash']) && isset($_REQUEST['email']) && isset($_REQUEST['contra1'])){
        echo $_REQUEST['hash']. ' '.$_REQUEST['email']. ' '.$_REQUEST['contra1'];

        $newPass = md5($_POST['contra1']);
        $email = $_POST['email'];

        $sqlUpdate = $datos->exec("UPDATE usuario SET password='$newPass' WHERE email='$email'");

        if($sqlUpdate){
            $sqlUpdate = $datos->exec("UPDATE usuario SET hash='' WHERE email='$email'");
            $msg='<p>Cambio exitoso, regrese al inicio para acceder a su cuenta.</p>';
        }
        else
            $smg='Ocurrio un error inesperado.';
        echo '<meta http-equiv="refresh" content="5; url=../Secciones/cambiarContraseña.php?msg='.$msg.'">';
    }
    else{
        include("verificarUsuario.php");
    
        $id = $_SESSION['id_usuario'];

        $oldPass = md5($_POST['contraA']);
        $newPass = md5($_POST['contra1']);
        
        $resultado = $datos->query("SELECT id_usuario FROM usuario WHERE password='$oldPass'");
        $resultado->setFetchMode(PDO::FETCH_ASSOC);

        $resultado->execute();
        $row = $resultado->fetch();

        if($resultado->rowCount() > 0 && $row["id_usuario"] = $id){
            $sqlUpdate = $datos->exec("UPDATE usuario SET password = '$newPass' WHERE id_usuario='$id'");
            $msg = "La contraseña se actualizo de manera exitosa";
        }
        else
            $msg = "La contraseña actual ingresada es incorrecta, vuelve a intentarlo.";

        echo '<meta http-equiv="refresh" content="0; url=../Secciones/perfilDeUsuario.php?msg='.$msg.'">';
    }
?>