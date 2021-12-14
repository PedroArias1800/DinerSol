<?php

    include("verificarUsuario.php");
    include("../Config/conexion.php");

    if(isset($_POST['idProducto2']) && isset($_POST['cafeteria'])){

        $idPro = $_POST['idProducto2'];
        $idCaf = $_POST['cafeteria'];

        $sqlDelete = $datos->query("DELETE FROM producto WHERE id_producto = '$idPro' AND id_cafeteria = '$idCaf'");
        $sqlDelete = $datos->query("DELETE FROM menu WHERE id_producto = '$idPro' AND id_cafeteria = '$idCaf'");
        header("Location: ../Secciones/adminMenuEliminar.php?exito=¡Se eliminó el producto correctamente!");  
        exit;
    }

    header("Location: ../Secciones/adminMenuEliminar.php?error=Error, inténtelo nuevamente...");
    exit;

?>