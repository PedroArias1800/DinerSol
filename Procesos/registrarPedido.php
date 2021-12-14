<?php

    include("verificarUsuario.php");
    include('../Config/conexion.php');
    include('../Clases/Producto.php');

    if((isset($_POST['Menu2']) && $_POST['Menu2'] != '') || (isset($_POST['Snack2']) && $_POST['Snack2'] != '') || (isset($_POST['Refresco2']) && $_POST['Refresco2'] != '')){

        if(isset($_POST['PTotal']) > 0.00){

            $idU = $_POST['id_usuario'];
            $idC = $_POST['Id_Cafeteria2'];
            $pTotal = $_POST['PTotal'];

            $query = "INSERT INTO orden (id_cafeteria, id_usuario, total, estado)
                      VALUES ('$idC', '$idU', '$pTotal', 'Pendiente')";

            $insertar = $datos->prepare($query);

            try{
                $insertar->execute();

                $idOrd = 0;
                $si = 0;

                $selectOrd = $datos->query("SELECT id_orden FROM orden ORDER BY id_orden DESC LIMIT 1");
                while($select = $selectOrd->fetch(PDO::FETCH_OBJ)){
                    $idOrd = $select->id_orden;
                }

                $query = "INSERT INTO contenido_orden (id_orden, id_producto)
                          VALUES ";

                if((isset($_POST['Menu2']) && $_POST['Menu2'] != '')){
                    $idComida = $_POST['Menu2'];
                    $sqlUpdate = $datos->exec("UPDATE producto SET inventario = inventario - 1 WHERE id_producto = '$idComida'");
                    $query = $query."('$idOrd', '$idComida')";
                    $si = 1;
                }
                if((isset($_POST['Snack2']) && $_POST['Snack2'] != '')){
                    $idSnack = $_POST['Snack2'];
                    $sqlUpdate = $datos->exec("UPDATE producto SET inventario = inventario - 1 WHERE id_producto = '$idSnack'");
                    if($si == 1){
                        $query = $query.", ('$idOrd', '$idSnack')";
                    } else {
                        $query = $query."('$idOrd', '$idSnack')";
                        $si = 0;
                    }
                }
                if((isset($_POST['Refresco2']) && $_POST['Refresco2'] != '')){
                    $idRefresco = $_POST['Refresco2'];
                    $sqlUpdate = $datos->exec("UPDATE producto SET inventario = inventario - 1 WHERE id_producto = '$idRefresco'");
                    if($si == 1){
                        $query = $query.", ('$idOrd', '$idRefresco')";
                    } else {
                        $query = $query."('$idOrd', '$idRefresco')";
                    }
                }

                $insertar = $datos->prepare($query);

                try{
                    $insertar->execute();

                    header("Location: ../Secciones/paginaPrincipal.php?exito=¡Tu pedido ya está siendo atendido!");
                    exit;

                }catch(PDOException $ex){
                    echo $ex;
                    header("Location: ../Secciones/hacerPedido.php?error=Se ha producto un error, inténtelo nuevamente...");
                    exit;
                }


            }catch(PDOException $ex){
                header("Location: ../Secciones/hacerPedido.php?error=Se ha producto un error, inténtelo nuevamente...");
                exit;
            }

        } else {
            header("Location: ../Secciones/hacerPedido.php?error=Se ha producto un error, inténtelo nuevamente...");
            exit;
        }

    } else {
        header("Location: ../Secciones/hacerPedido.php?error=Elige al menos 1 producto...");
        exit;
    }

?>