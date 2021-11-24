<?php
    include("verificarUsuario.php");
    include("../Config/conexion.php");

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
        $msg = "La contraseña antigua que ingresaste es incorrecta, vuelve a intentarlo.";

    echo '<meta http-equiv="refresh" content="0; url=../Secciones/perfilDeUsuario.php?'.$msg.'">';
?>