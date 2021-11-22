<!DOCTYPE html>
<html>
    <head>
        <title>Estadísticas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
        <link rel="stylesheet" href="../Css/footerHeader.Css">
        <link rel="stylesheet" href="../Css/estadisticas.css">
        <link rel="stylesheet" href="../Css/drpdwn.css">
    </head>
    <body>
        
        <?php require('header.php'); ?>

        <div class="TituloCompleto">
            <h1>Estadísticas Generales</h1>
        </div>
        <div class="Campos">
            <h2>Buscar un periodo</h2>
            <form action="" method="POST">
                <select name="fecha" id="fecha">
                    <option value="1">18/10/21 - 24/10/21</option> 
                    <option value="2">11/10/21 - 17/10/21</option>      
                    <option value="3">04/10/21 - 10/10/21</option>       
                    <option value="4">27/10/21 - 03/10/21</option>
                </select>
                <input type="submit" class="botones" value="Buscar" class="buscar">
                <button class="botones"><a  href="">Generar Reportes</a></button>
            </form>
        </div><hr>
        <div class="card" style="width: 94%; margin: 0 0 2% 3%">
            <h2 class="TituloTabla">Ventas De Los Combos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Combos Vendidos</th>
                        <th>Cantidad De Pedidos</th>
                        <th>Ingreso Del Combo</th>
                    </tr>
                </thead>
                <tbody><!-- Para controlar el tiempo de búsqueda: SELECT * FROM tabla WHERE fecha >= CAST('2018-11-26' AS datetime)-->
                    <?php $consultarCombo = $datos->query("SELECT c.nombre_combo as nombre, COUNT(co.id_orden) AS cantidad, SUM(c.costo) as costo
                                                            FROM contenido_orden co INNER JOIN combo c ON co.id_combo=c.id_combo
                                                            GROUP BY c.nombre_combo"); 
                        $costoTotal = 0.00;
                    ?>
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
        <div class="card" style="width: 94%; margin: 0 0 2% 3%">
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
                    <?php $consultarMenu = $datos->query("SELECT p.nombre, COUNT(co.id_orden) AS cantidad, SUM(p.costo) as costo
                                                            FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                            WHERE p.tipo_producto = 'Comida'
                                                            GROUP BY p.nombre
                                                            ORDER BY p.tipo_producto ASC"); 
                        $costoTotal = 0;
                    ?>
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
                        <?php $consultarSnack = $datos->query("SELECT p.nombre, COUNT(co.id_orden) AS cantidad, SUM(p.costo) as costo
                                                                FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                                WHERE p.tipo_producto = 'Snack'
                                                                GROUP BY p.nombre
                                                                ORDER BY p.tipo_producto ASC"); 
                            $costoTotal = 0;
                        ?>
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
                        <?php $consultarRefresco = $datos->query("SELECT p.nombre, COUNT(co.id_orden) AS cantidad, SUM(p.costo) as costo
                                                                FROM contenido_orden co INNER JOIN producto p ON co.id_producto=p.id_producto
                                                                WHERE p.tipo_producto = 'Refresco'
                                                                GROUP BY p.nombre
                                                                ORDER BY p.tipo_producto ASC"); 
                            $costoTotal = 0;
                        ?>
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
                        <?php $consultarUtencilio = $datos->query("SELECT p.nombre as nombre, p.inventario
                                                                    FROM producto p
                                                                    WHERE p.tipo_producto = 'Utencilio'
                                                                    ORDER BY p.id_producto"); 
                        ?>
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
                        <?php $consultarPedidos = $datos->query("SELECT t.nombre, COUNT(o.id_orden) AS cantidad
                                                                FROM usuario u INNER JOIN orden o ON u.id_usuario=o.id_usuario
                                                                                INNER JOIN tipo t ON u.id_tipo=t.id_tipo
                                                                GROUP BY t.nombre
                                                                ORDER BY t.id_tipo ASC"); 
                        ?>
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
        <h2 style="text-align: center; margin: 2% 0 2% 0;">***Los resultados de las estadísticas están calculadas en base al <strong>tiempo de búsqueda escogido</strong>***</h2>
        
        <?php require('footer.html'); ?>

    </body>
</html>