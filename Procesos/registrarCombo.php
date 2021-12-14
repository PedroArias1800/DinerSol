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
        $turno = $_POST['turno'];

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

            $idCom = 0;

            $selectCom = $datos->query("SELECT id_combo FROM combo 
                                        WHERE nombre_combo = '$nombre'
                                        ORDER BY id_combo ASC LIMIT 1");
            while($select = $selectCom->fetch(PDO::FETCH_OBJ)){
                $idCom = $select->id_combo;
            }

            $query = "INSERT INTO menu (id_cafeteria, id_producto, id_combo, estado)
                      VALUES ('$cafeteria', NULL, '$idCom', 0)";

            $insertar = $datos->prepare($query);

            try{
                $insertar->execute();

                $idMenu = 0;

                $selectMenu = $datos->query("SELECT id_menu FROM menu ORDER BY id_menu DESC LIMIT 1");
                while($select = $selectMenu->fetch(PDO::FETCH_OBJ)){
                    $idMenu = $select->id_menu;
                }
                
                $query = "INSERT INTO menu_turno (id_menu, id_turno)
                      VALUES ('$idMenu', '$turno')";

                $insertar = $datos->prepare($query);

                try{
                    $insertar->execute();
                    header("Location: ../Secciones/adminCrearCombos.php?exito=¡Se ha registrado el combo exitosamente!");
                }catch(PDOException $ex){
                    header("Location: ../Secciones/adminCrearCombos.php?error=Error, inténtelo nuevamente...");
                }
            }catch(PDOException $ex){
                header("Location: ../Secciones/adminCrearCombos.php?error=Error, inténtelo nuevamente...");
            }
        } catch (PDOException $ex){
            if($ex->errorInfo[1] == 1062){
                header("Location: ../Secciones/adminCrearCombos.php?error=Error, inténtelo nuevamente...");
            } else {
                print($ex);
            }
        }
    } else {
        header("Location: ../Secciones/adminCrearCombos.php?error=No se recibieron los datos");
        exit;
    }

?>