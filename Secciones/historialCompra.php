<!DOCTYPE html>
<html>
    <head>
        <title>Historial De Compras</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
        <link rel="stylesheet" href="../Css/footerHeader.Css">
        <link rel="stylesheet" href="../Css/estadisticas.css">
        <link rel="stylesheet" href="../Css/drpdwn.css">
        <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg" />
    </head>
    <body>

        <?php 
            require('header.php'); 
            $ordenes = $datos->query("SELECT o.id_orden, c.nombre, o.created_at, o.total
                                        FROM orden o INNER JOIN cafeteria c ON o.id_cafeteria = c.id_cafeteria 
                                        WHERE id_usuario = ".$_SESSION['id_usuario']."
                                        ORDER BY o.id_cafeteria ASC");
                                        
            $pedidos = $datos->query("SELECT o.id_orden, p.tipo_producto, p.nombre, p.costo
                                        FROM orden o INNER JOIN cafeteria c ON o.id_cafeteria = c.id_cafeteria 
                                        INNER JOIN contenido_orden co ON co.id_orden = o.id_orden
                                        INNER JOIN producto p ON co.id_producto = p.id_producto
                                        WHERE id_usuario = ".$_SESSION['id_usuario']."
                                        ORDER BY o.id_cafeteria ASC, o.id_orden ASC, p.tipo_producto ASC");

            $costoTotal = 0;
        ?>

        <div class="TituloCompleto">
            <h1>Historial De Compras</h1>
        </div>
        <div class="card tablasGrandes">
            <h2 class="TituloTabla">Historial General</h2>
            <table>
                <thead>
                    <tr>
                        <th>Código Del Pedido</th>
                        <th>Cafetería</th>
                        <th>Fecha</th>
                        <th>Costo Del Pedido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($orden = $ordenes->fetch(PDO::FETCH_OBJ)){ ?>
                    <tr>
                        <td><?php echo $orden->id_orden; ?></td>
                        <td><?php echo $orden->nombre; ?></td>
                        <td><?php echo $orden->created_at; ?></td>
                        <td><?php echo $orden->total; $costoTotal = $costoTotal + $orden->total; ?></td>
                    </tr>
                    <?php } ?>
                    <tr class="Totales">
                        <td colspan="3">Costo Total De Los Pedidos</td>
                        <td><?php echo number_format($costoTotal, 2); ?></td>
                    </tr>
                </tbody>
            </table><br>
        </div>
        <div class="card tablasGrandes">
            <h2 class="TituloTabla">Detalles De Los Pedidos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Código Del Pedido</th>
                        <th>Tipo De Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $costoTotal = 0; while($pedido = $pedidos->fetch(PDO::FETCH_OBJ)){ ?>
                    <tr>
                        <td><?php echo $pedido->id_orden; ?></td>
                        <td><?php echo $pedido->tipo_producto; ?></td>
                        <td><?php echo $pedido->nombre; ?></td>
                        <td><?php echo $pedido->costo; $costoTotal = $costoTotal + $pedido->costo; ?></td>
                    </tr>
                    <?php } ?>
                    <tr class="Totales">
                        <td colspan="3">Costo Total De Los Pedidos</td>
                        <td><?php echo number_format($costoTotal, 2); ?></td>
                    </tr>
                </tbody>
            </table><br>
        </div>
        <h2 style="text-align: center; margin: 2% 0 2% 0;">¡Gracias Por Preferir Utilizar <strong>DinerSol</strong>, El Sistema De Cafeterías UTP!</h2>
        
        <?php require("footer.html"); ?>

    </body>
</html>