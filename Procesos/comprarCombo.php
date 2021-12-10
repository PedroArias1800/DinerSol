<?php

    include("verificarUsuario.php");
    include('../Config/conexion.php');
    include('../Clases/Producto.php');

    if(isset($_POST['idDelCombo'])){

        $idU = $_SESSION['id_usuario'];
        $idCom = $_POST['idDelCombo'];
        $nombreCom  = "";
        $costo = 0;
        $inventario = 0;
        $idC = 0;

        $consultarCombo = $datos->query("SELECT nombre_combo, costo, inventario, id_cafeteria FROM combo WHERE id_combo = $idCom");
        while($combo = $consultarCombo->fetch(PDO::FETCH_OBJ)){
            $nombreCom = $combo->nombre_combo;
            $costo = $combo->costo;
            $inventario = ($combo->inventario)-1;
            $idC = $combo->id_cafeteria;
        }

        if($idU == 5){
            $costo = $costo + ($costo * 0.20);
        } else if($idU == 4){
            $costo = $costo - ($costo * 0.20);
        }

        $sqlUpdate = $datos->exec("UPDATE combo SET inventario = $inventario WHERE nombre_combo='$nombreCom'");

        $query = "INSERT INTO orden (id_cafeteria, id_usuario, total, estado)
                  VALUES ('$idC', '$idU', '$costo', 'Pendiente')";

        $insertar = $datos->prepare($query);

        try{
            $insertar->execute();

            $idOrd = 0;
            $si = 0;

            $selectOrd = $datos->query("SELECT id_orden FROM orden ORDER BY id_orden DESC LIMIT 1");
            while($select = $selectOrd->fetch(PDO::FETCH_OBJ)){
                $idOrd = $select->id_orden;
            }

            $query = "INSERT INTO contenido_orden (id_orden, id_combo)
                      VALUES ($idOrd, $idCom)";

            $insertar = $datos->prepare($query);

            try{
                $insertar->execute();
                header("Location: ../Secciones/paginaPrincipal.php?exito=¡Tu pedido ya está siendo atendido!");
                exit;

            }catch(PDOException $ex){
                echo $ex;
                header("Location: ../Secciones/paginaPrincipal.php?error=Se ha producto un error, inténtelo nuevamente...");
                exit;
            }

        } catch(PDOException $ex){
            header("Location: ../Secciones/paginaPrincipal.php?error=Se ha producto un error, inténtelo nuevamente...");
            exit;

        }

    }
    else{
        header("Location: ../Secciones/paginaPrincipal.php");
        exit;
    }

?>