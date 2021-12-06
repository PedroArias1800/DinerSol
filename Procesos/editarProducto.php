<?php

    include("verificarUsuario.php");
    include("../Config/conexion.php");

    if(isset($_POST['idProducto2']) && isset($_POST['nombreProducto2']) && isset($_POST['cafeteria2']) && isset($_POST['tipoProducto']) && isset($_POST['costo']) && isset($_POST['inventario'])){

        $idPro = $_POST['idProducto2'];
        $nombre = $_POST['nombreProducto2'];
        $cafeteria = $_POST['cafeteria2'];
        $tipo = $_POST['tipoProducto'];
        $costo = $_POST['costo'];
        $inventario = $_POST['inventario'];

        if($tipo == 'Comida')
            $foto = "comidaIcono.png";
        else if($tipo = 'Snack')
            $foto = "snackIcono.png";
        else if ($tipo == 'Refresco')
            $foto = "refrescoIcono.png";
        else
            $foto = "cubierto.png";

        if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ""){

            $temp = $_FILES['foto']['tmp_name'];
            $foto = $nombre.".png";
    
            move_uploaded_file($temp, '../Imagenes/'.$foto);
        
            $sqlUpdate = $datos->exec("UPDATE producto SET nombre = '$nombre', tipo_producto = '$tipo', costo = '$costo', foto = '$foto', inventario = '$inventario', id_cafeteria = '$cafeteria' WHERE id_producto='$idPro'");
            echo '<meta http-equiv="refresh" content="0; url=../Secciones/adminMenuEditar.php?exito=¡Se actualizó el producto correctamente!">';
            exit;

        } else {
            $sqlUpdate = $datos->exec("UPDATE producto SET nombre = '$nombre', tipo_producto = '$tipo', costo = '$costo', inventario = '$inventario', id_cafeteria = '$cafeteria' WHERE id_producto='$idPro'");
            echo '<meta http-equiv="refresh" content="0; url=../Secciones/adminMenuEditar.php?exito=¡Se actualizó el producto correctamente!">';
            exit;

        }

    }

    echo '<meta http-equiv="refresh" content="0; url=../Secciones/adminMenuEditar.php?error=No se puedo actualizar el producto...">';
    exit;

?>