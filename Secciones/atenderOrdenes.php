


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/atenderOrdenes.css">
        <link rel="stylesheet" href="../CSS/normalice.css">
        <link rel="stylesheet" href="../css/">
        <title>Atender Ordenes</title>
        <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg"/>
    </head>
    <body>

    <div class="headerphp">
            <?php require('header.php'); 
            
                $consultarProductos = $datos->query("SELECT
                o.id_orden,
                c.nombre,
                CONCAT(u.nombre, ' ', u.apellido) as nom_usuario,
                u.email,
                o.total,
                o.estado,
                o.created_at
                
                FROM orden o INNER JOIN cafeteria c ON o.id_cafeteria=c.id_cafeteria
                            INNER JOIN usuario U ON o.id_usuario = U.id_usuario
                ORDER BY o.estado DESC, o.id_orden ASC");
            ?>

        </div>

        <div class="headimg">
            <div class="TituloCompleto">
                <h1>Atender Ordenes</h1>
            </div>
        </div>

        <div class="cafeteriasUTP">
            <h3 style="text-align: center; margin: 2% 0 2% 2%;">Presione <strong>el botón del estado</strong> para marcar un pedido como atendido</h3>
        </div><hr><br><br>

        <div class="main">

            <?php  while($producto=$consultarProductos->fetch(PDO::FETCH_OBJ)) {  ?>
            <form action="../Procesos/adminAtenderOrdenes.php" method="POST">
                <div class="ordenes" <?php if($producto->estado == "Atendido"){ ?> style="border: 2px solid #63c028;" <?php } ?>>
                    <div class="order-nombre">
                        <h2>ID de la factura:</h2>
                        <input type="text" name="id_orden" id="" value="<?php echo $producto->id_orden; ?>" hidden>
                        <h2><?php echo $producto->id_orden; ?></H2>
                    </div>

                    <div class="order-code">
                        <h4>Informacion de tu pedido</h4>
                        <h3> <?php echo $producto->nom_usuario; ?> </h3>
                    </div>

                    <div class="order-pedido-info">

                        <div class="order-pedido">
                            <label for="">Cafetería:</label>
                            <P><strong><?php echo $producto->nombre; ?></strong></P>
                        </div>
                        <div class="facturado">
                            <label for="">Facturado a:</label>
                            <p><?php echo $producto->email; ?></p>
                        </div>

                    </div>

                    <div class="order-pedido-info">

                        <?php

                            $cualEra = 0;
                            $idCom = 0;

                            $comboOProducto = $datos->query("SELECT id_producto, id_combo FROM contenido_orden WHERE id_orden = $producto->id_orden");
                            while($cual = $comboOProducto->fetch(PDO::FETCH_OBJ)){
                                if($cual->id_producto == "" && $cual->id_combo != ""){
                                    $cualEra = 1;
                                    $idCom = $cual->id_combo;
                                }
                            }

                            if($cualEra == 0){
                                $contenidoOrden = $datos->query("SELECT p.nombre FROM contenido_orden co 
                                                                        INNER JOIN producto p ON co.id_producto = p.id_producto
                                                                WHERE co.id_orden = $producto->id_orden
                                                                ORDER BY p.tipo_producto");
                            } else {
                                $nombreCombo = "";

                                $buscarNombre = $datos->query("SELECT c.nombre_combo FROM contenido_orden co 
                                                                        INNER JOIN combo c ON co.id_combo = c.id_combo
                                                                        INNER JOIN producto p ON c.id_producto = p.id_producto
                                                                WHERE co.id_orden = $producto->id_orden
                                                                ORDER BY p.tipo_producto");

                                while($nombre = $buscarNombre->fetch(PDO::FETCH_OBJ)){
                                    $nombreCombo = $nombre->nombre_combo;
                                }

                                $contenidoOrden = $datos->query("SELECT p.nombre FROM combo c
                                                                            INNER JOIN producto p ON c.id_producto = p.id_producto
                                                                WHERE c.nombre_combo = '$nombreCombo'
                                                                ORDER BY p.tipo_producto");
                            }

                        ?>

                        <div class="order-pedido">
                            <label for="">Contenido:</label>
                            <P style="display: flex;">
                                <?php while($con = $contenidoOrden->fetch(PDO::FETCH_OBJ)){ ?>
                                    <strong><?php echo $con->nombre; ?> .</strong>
                                <?php } ?>
                            <P>
                        </div>

                    </div>

                    <div class="order-pedido-info2">
                        <div class="order-fecha">
                            <label for="">Fecha del pedido:</label>
                            <p><?php echo $producto->created_at; ?></p>
                        </div>
                        <div class="order-total">
                            <p>Total
                            <strong><?php echo "$".$producto->total; ?></strong></p>
                        </div>
                    </div>
                    <button class="btn" <?php if($producto->estado == "Atendido"){ ?> style="background-color: #63c028;" disabled <?php } ?>><?php echo $producto->estado; ?> </button>
                </div>
            </form>
            <?php } ?>
        </div>
    
        <?php require('footer.html'); ?>
        
    </body>
</html>