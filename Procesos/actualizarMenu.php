<?php
    include("verificarUsuario.php");
    include("../Config/conexion.php");

    if(isset($_POST['id_cafeteria']) && isset($_POST['id_producto'])){

        $idPro = $_POST['id_producto'];
        $idCaf = $_POST['id_cafeteria'];
        $estado = 0;

        if($_POST['estado'] == 0 && $_POST['inventario'] > 0){
            $estado = 1;
        }

        $sqlUpdate = $datos->exec("UPDATE menu SET estado = '$estado' WHERE id_producto='$idPro' AND id_cafeteria='$idCaf'");
        echo '<meta http-equiv="refresh" content="0; url=../Secciones/adminMenuInventario.php?exito=¡Se actualizó la producto correctamente!">';
        exit;

    } else if(isset($_POST['id_cafeteria']) && isset($_POST['id_combo'])){
        $idCom = $_POST['id_combo'];
        $idCaf = $_POST['id_cafeteria'];
        $estado = 0;

        if($_POST['estado'] == 0 && $_POST['inventario'] > 0){
            $estado = 1;
        }

        $sqlUpdate = $datos->exec("UPDATE menu SET estado = '$estado' WHERE id_combo='$idCom' AND id_cafeteria='$idCaf'");
        echo '<meta http-equiv="refresh" content="0; url=../Secciones/adminMenuInventario.php?exito=¡Se actualizó la producto correctamente!">';
        exit;
    }else{
        echo "No llegaron los datos";
        echo '<meta http-equiv="refresh" content="0; url=../Secciones/adminMenuInventario.php?error=Error, inténtelo nuevamente...">';
        exit;
    }

?>