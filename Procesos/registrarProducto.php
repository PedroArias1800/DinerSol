<?php

    include("verificarUsuario.php");
    include('../Config/conexion.php');
    include('../Clases/Producto.php');

    if(isset($_POST['nombre']) && isset($_POST['cafeteria']) && isset($_POST['tipoProducto']) && isset($_POST['costo']) && isset($_POST['inventario'])){

        $nombre = $_POST['nombre'];
        $cafeteria = $_POST['cafeteria'];
        $tipo = $_POST['tipoProducto'];
        $costo = $_POST['costo'];
        $inventario = $_POST['inventario'];
        $turno = $_POST['turno'];

        if($tipo == 'Comida')
            $foto = "comidaIcono.png";
        else if($tipo == 'Snack')
            $foto = "snackIcono.png";
        else if ($tipo == 'Refresco')
            $foto = "refrescoIcono.png";
        else
            $foto = "cubierto.png";

        echo $_FILES['foto'];

        if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ""){

            $temp = $_FILES['foto']['tmp_name'];
            $foto = $nombre.".png";
    
            move_uploaded_file($temp, '../Imagenes/'.$foto);

        }

        $query = "INSERT INTO producto (nombre, tipo_producto, costo, foto, inventario, id_cafeteria)
                    VALUES (:nombre, :tipo, :costo, :foto, :inventario, :id_cafeteria)";

        $producto = new Producto($nombre, $tipo, $costo, $foto, $inventario, $cafeteria);
        $insertar = $datos->prepare($query);

        //Control de excepciones
        try{
            $insertar->execute((array)$producto);

            $idPro = 0;

            $selectPro = $datos->query("SELECT id_producto FROM producto ORDER BY id_producto DESC LIMIT 1");
            while($select = $selectPro->fetch(PDO::FETCH_OBJ)){
                $idPro = $select->id_producto;
            }

            $query = "INSERT INTO menu (id_cafeteria, id_producto, id_combo, estado)
                      VALUES ('$cafeteria', '$idPro', NULL, 0)";

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
                    header("Location: ../Secciones/adminMenuAgregar.php?exito=¡Se ha registrado el producto exitosamente!");
                }catch(PDOException $ex){
                    header("Location: ../Secciones/adminMenuAgregar.php?error=No se ha podido agregar al Turno...");
                }


            } catch(PDOException $ex){
                header("Location: ../Secciones/adminMenuAgregar.php?error=No se ha podido agregar al Menu...");
            }

        } catch (PDOException $ex){
            if($ex->errorInfo[1] == 1062){
                header("Location: ../Secciones/adminMenuAgregar.php?error=Ya existe ese producto en esa cafeteria");
            } else {
                print($ex);
            }
        }
    } else {
        header("Location: ../Secciones/adminMenuAgregar.php?error=Error, inténtelo nuevamente...");
        exit;
    }

?>