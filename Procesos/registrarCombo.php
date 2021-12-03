<?php

    include('../Config/conexion.php');
    include('../Clases/Combo.php');

    if(isset($_POST['nombreCombo']) && isset($_POST['Cafeteria']) && isset($_POST['comida']) && isset($_POST['refresco']) && isset($_POST['snack']) && isset($_POST['costo']) && isset($_POST['cantidad'])){

        $nombre = $_POST['nombreCombo'];
        $comida = $_POST['comida'];
        $snack = $_POST['snack'];
        $refresco = $_POST['refresco'];
        $costo = $_POST['costo'];
        $cantidad = $_POST['cantidad'];
        $cafeteria = $_POST['Cafeteria'];

        if($snack == 0){
            $query = "INSERT INTO combo (nombre_combo, id_producto, costo, inventario, id_cafeteria)
                    VALUES (:nombre, :comida, :costo, :cantidad, :cafeteria), 
                            (:nombre, :refresco, :costo, :cantidad, :cafeteria)";
        } else {
            $query = "INSERT INTO combo (nombre_combo, id_producto, costo, inventario, id_cafeteria)
                    VALUES (:nombre, :comida, :costo, :cantidad, :cafeteria), 
                            (:nombre, :refresco, :costo, :cantidad, :cafeteria),
                            (:nombre, :snack, :costo, :cantidad, :cafeteria)";
        }

        $combo = new Combo($nombre, $comida, $snack, $refresco, $costo, $cantidad, $cafeteria);
        $insertar = $datos->prepare($query);

        //Control de excepciones
        try{
            $insertar->execute((array)$combo);
            header("Location: ../Secciones/adminCrearCombos.php?exito=¡Se ha registrado el combo exitosamente!");
        } catch (PDOException $ex){
            if($ex->errorInfo[1] == 1062){
                header("Location: ../Secciones/adminCrearCombos.php?error=El correo ya está en uso, prueba con otro");
            } else {
                print($ex);
            }
        }
    } else {
        header("Location: ../Secciones/adminCrearCombos.php?error=No se recibieron los datos");
        exit;
    }

?>