<?php
    include("verificarUsuario.php");
    include("../Config/conexion.php");

    $id = $_SESSION['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $foto = 'user.png';

    if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ""){

        $temp = $_FILES['foto']['tmp_name'];
        $foto = $id.".png";

        move_uploaded_file($temp, '../Imagenes/FotosDePerfil/'.$foto);
        $sqlUpdate = $datos->exec("UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', foto = '$foto' WHERE id_usuario='$id'");
    } else {
        $sqlUpdate = $datos->exec("UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono' WHERE id_usuario='$id'");
    }


    echo '<meta http-equiv="refresh" content="0; url=../Secciones/perfilDeUsuario.php">';
?>