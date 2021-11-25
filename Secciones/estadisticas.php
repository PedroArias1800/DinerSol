<!DOCTYPE html>
<html>
    <head>
        <title>Estadísticas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
        <link rel="stylesheet" href="../Css/footerHeader.Css">
        <link rel="stylesheet" href="../Css/estadisticas.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="../Css/drpdwn.css">
    </head>
    <body>
        
        <?php require('header.php'); ?>

        <div class="TituloCompleto">
            <h1>Estadísticas Generales</h1>
        </div>

        <?php

            if(isset($_POST['fecha']) && $_POST['fecha'] != "NULL"){
                $fechas = explode(" ", $_POST['fecha']);

                $consultarCombo = $datos->query("SELECT c.nombre_combo as nombre, COUNT(co.id_orden) AS cantidad, SUM(c.costo) as costo
                                                    FROM contenido_orden co INNER JOIN combo c ON co.id_combo=c.id_combo
                                                                            INNER JOIN orden o ON o.id_orden=co.id_orden
                                                    WHERE o.created_at BETWEEN '$fechas[0]' AND '$fechas[1]'
                                                    GROUP BY c.nombre_combo"); 

                $consultarMenu = $datos->query("SELECT p.nombre, COUNT(co.id_orden) AS cantidad, SUM(p.costo) as costo
                                                    FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                                            INNER JOIN orden o ON o.id_orden=co.id_orden
                                                    WHERE p.tipo_producto = 'Comida' AND o.created_at BETWEEN '$fechas[0]' AND '$fechas[1]'
                                                    GROUP BY p.nombre
                                                    ORDER BY p.tipo_producto ASC");

                $consultarSnack = $datos->query("SELECT p.nombre, COUNT(co.id_orden) AS cantidad, SUM(p.costo) as costo
                                                    FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                                            INNER JOIN orden o ON o.id_orden=co.id_orden
                                                    WHERE p.tipo_producto = 'Snack' AND o.created_at BETWEEN '$fechas[0]' AND '$fechas[1]'
                                                    GROUP BY p.nombre
                                                    ORDER BY p.tipo_producto ASC"); 

                $consultarRefresco = $datos->query("SELECT p.nombre, COUNT(co.id_orden) AS cantidad, SUM(p.costo) as costo
                                                        FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                                                INNER JOIN orden o ON o.id_orden=co.id_orden
                                                        WHERE p.tipo_producto = 'Refresco' AND o.created_at BETWEEN '$fechas[0]' AND '$fechas[1]'
                                                        GROUP BY p.nombre
                                                        ORDER BY p.tipo_producto ASC"); 

                $consultarUtencilio = $datos->query("SELECT p.nombre as nombre, p.inventario
                                                        FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                                                INNER JOIN orden o ON o.id_orden=co.id_orden
                                                        WHERE p.tipo_producto = 'Utencilio' AND o.created_at BETWEEN '$fechas[0]' AND '$fechas[1]'
                                                        ORDER BY p.id_producto"); 

                $consultarPedidos = $datos->query("SELECT t.nombre, COUNT(o.id_orden) AS cantidad
                                                    FROM usuario u INNER JOIN orden o ON u.id_usuario=o.id_usuario
                                                                    INNER JOIN tipo t ON u.id_tipo=t.id_tipo
                                                    WHERE o.created_at BETWEEN '$fechas[0]' AND '$fechas[1]'
                                                    GROUP BY t.nombre
                                                    ORDER BY t.id_tipo ASC");
            } else {

                $consultarCombo = $datos->query("SELECT c.nombre_combo as nombre, COUNT(co.id_orden) AS cantidad, SUM(c.costo) as costo
                                                    FROM contenido_orden co INNER JOIN combo c ON co.id_combo=c.id_combo
                                                    GROUP BY c.nombre_combo"); 

                $consultarMenu = $datos->query("SELECT p.nombre, COUNT(co.id_orden) AS cantidad, SUM(p.costo) as costo
                                                    FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                    WHERE p.tipo_producto = 'Comida'
                                                    GROUP BY p.nombre
                                                    ORDER BY p.tipo_producto ASC");

                $consultarSnack = $datos->query("SELECT p.nombre, COUNT(co.id_orden) AS cantidad, SUM(p.costo) as costo
                                                    FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                    WHERE p.tipo_producto = 'Snack'
                                                    GROUP BY p.nombre
                                                    ORDER BY p.tipo_producto ASC"); 

                $consultarRefresco = $datos->query("SELECT p.nombre, COUNT(co.id_orden) AS cantidad, SUM(p.costo) as costo
                                                        FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                        WHERE p.tipo_producto = 'Refresco'
                                                        GROUP BY p.nombre
                                                        ORDER BY p.tipo_producto ASC");
                                                        
                $consultarUtencilio = $datos->query("SELECT p.nombre as nombre, p.inventario
                                                        FROM producto p
                                                        WHERE p.tipo_producto = 'Utencilio'
                                                        ORDER BY p.id_producto"); 
                
                $consultarPedidos = $datos->query("SELECT t.nombre, COUNT(o.id_orden) AS cantidad
                                                    FROM usuario u INNER JOIN orden o ON u.id_usuario=o.id_usuario
                                                                    INNER JOIN tipo t ON u.id_tipo=t.id_tipo
                                                    GROUP BY t.nombre
                                                    ORDER BY t.id_tipo ASC");
            }

        ?>

        <div class="Campos">
            <h2>Buscar un periodo</h2>
            <form action="estadisticas.php" method="POST">
                <select name="fecha" id="fecha" style="margin: 0 0 0 -8%">
                    <option value="NULL">Desde El Inicio</option>
                    <?php 

                        $consultarPrimeraFecha = $datos->query("SELECT MIN(CAST(created_at AS DATE)) as minimo, MAX(CAST(created_at AS DATE)) as maximo FROM orden");
                        while($fecha = $consultarPrimeraFecha->fetch(PDO::FETCH_OBJ)){
                            $ultima = $fecha->maximo;
                            $primera = $fecha->minimo;

                            $primeraExplode = explode("-", $primera);
                            $ultimaExplode = explode("-", $ultima);

                            $seguir = true;

                            while($seguir){
                                if($primeraExplode[0] <= $ultimaExplode[0] AND $primeraExplode[1] <= $ultimaExplode[1]){ 
                                    if($primeraExplode[1] != 12){
                                        $primeraExplode[1] = $primeraExplode[1]+1;
                                    } else { 
                                        $primeraExplode[0] = $primeraExplode[0]+1;
                                        $primeraExplode[1] = 0;
                                    }
                                    $primera2 = $primeraExplode[0]."-".$primeraExplode[1]."-".$primeraExplode[2];
                    ?>
                        <option value="<?php echo $primera." ".$primera2?>">Del <?php echo $primera." hasta el ".$primera2; ?></option>
                    <?php $primera = $primera2; } else { $seguir = false; } } } ?>
                </select>
                <input type="submit" class="botones" value="Buscar" class="buscar">
                <button class="botones"><a  href="">Generar Reportes</a></button>
            </form>
        </div><hr>
        <div class="card tablasGrandes">
            <h2 class="TituloTabla">Ventas De Los Combos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Combos Vendidos</th>
                        <th>Cantidad De Pedidos</th>
                        <th>Ingreso Del Combo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $costoTotal = 0.00; ?>
                    <tr>
                        <?php while($combo = $consultarCombo->fetch(PDO::FETCH_OBJ)){ ?>
                        <td><?php echo $combo->nombre; ?></td>
                        <td><?php echo $combo->cantidad; ?></td>
                        <td><?php echo $combo->costo."$"; $costoTotal = $costoTotal + $combo->costo; ?></td>
                        <?php } ?>
                    </tr>
                    <tr class="Totales">
                        <td colspan="2">Totales</td>
                        <td><?php echo number_format($costoTotal, 2)."$"; ?></td>
                    </tr>
                </tbody>
            </table><br>
        </div>
        <div class="card tablasGrandes">
            <h2 class="TituloTabla">Ventas De Los Menús</h2>
            <table>
                <thead>
                    <tr>
                        <th>Menús Vendidos</th>
                        <th>Cantidad De Pedidos</th>
                        <th>Ingreso Del Menú</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $costoTotal = 0; ?>
                    <tr>
                        <?php while($menu = $consultarMenu->fetch(PDO::FETCH_OBJ)){ ?>
                        <td><?php echo $menu->nombre; ?></td>
                        <td><?php echo $menu->cantidad; ?></td>
                        <td><?php echo $menu->costo."$"; $costoTotal = $costoTotal + $menu->costo; ?></td>
                        <?php } ?>
                    </tr>
                    <tr class="Totales">
                        <td colspan="2">Totales</td>
                        <td><?php echo number_format($costoTotal, 2)."$"; ?></td>
                    </tr>
                </tbody>
            </table><br>
        </div>
        <div class="RefrescoSnack">
            <div class="card2">
                <h2 class="TituloTabla">Ventas De Los Snacks</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Snacks Vendidos</th>
                            <th>Cantidad De Pedidos</th>
                            <th>Ingreso De Los Snacks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $costoTotal = 0; ?>
                        <tr>
                            <?php while($snack = $consultarSnack->fetch(PDO::FETCH_OBJ)){ ?>
                            <td><?php echo $snack->nombre; ?></td>
                            <td><?php echo $snack->cantidad; ?></td>
                            <td><?php echo $snack->costo."$"; $costoTotal = $costoTotal + $snack->costo; ?></td>
                            <?php } ?>
                        </tr>
                        <tr class="Totales">
                            <td colspan="2">Totales</td>
                            <td><?php echo number_format($costoTotal, 2)."$"; ?></td>
                        </tr>
                    </tbody>
                </table><br>
            </div>
            <div class="card2">
                <h2 class="TituloTabla">Ventas De Los Refrescos</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Refrescos Vendidos</th>
                            <th>Cantidad De Pedidos</th>
                            <th>Ingreso De Los Refrescos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $costoTotal = 0; ?>
                        <tr>
                            <?php while($refresco = $consultarRefresco->fetch(PDO::FETCH_OBJ)){ ?>
                            <td><?php echo $refresco->nombre; ?></td>
                            <td><?php echo $refresco->cantidad; ?></td>
                            <td><?php echo $refresco->costo."$"; $costoTotal = $costoTotal + $refresco->costo; ?></td>
                            <?php } ?>
                        </tr>
                        <tr class="Totales">
                            <td colspan="2">Totales</td>
                            <td><?php echo number_format($costoTotal, 2)."$"; ?></td>
                        </tr>
                    </tbody>
                </table><br>
            </div>
        </div><br>

        <div class="RefrescoSnack">
            <div class="card2">
                <h2 class="TituloTabla">Estadísticas De Los Utencilios</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Utencilio</th>
                            <th>Cantidad En Inventario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($utencilio = $consultarUtencilio->fetch(PDO::FETCH_OBJ)){ ?>
                            <tr>
                                <td><?php echo $utencilio->nombre; ?></td>
                                <td><?php echo $utencilio->inventario; ?></td>
                            <tr>
                        <?php } ?>
                    </tbody>
                </table><br>
            </div>
            <div class="card2">
                <h2 class="TituloTabla">Estadísticas De Los Pedidos</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Tipo De Pedidos</th>
                            <th>Cantidad De Pedidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($pedido = $consultarPedidos->fetch(PDO::FETCH_OBJ)){ ?>
                            <tr>
                                <td><?php echo $pedido->nombre; ?></td>
                                <td><?php echo $pedido->cantidad; ?></td>
                            <tr>
                        <?php } ?>
                    </tbody>
                </table><br>
            </div>
        </div><br><hr>

        <div class="cafeteriasUTP">
            <h3 style="text-align: center; margin: 2% 0 2% 2%;">***Los resultados de las estadísticas están calculadas en base al <strong>tiempo de búsqueda escogido</strong>***</h3>
        </div>

        <?php require('footer.html'); ?>

    </body>
</html>