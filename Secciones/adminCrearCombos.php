<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Css/footerHeader.css">
        <link rel="stylesheet" href="../Css/paginaPrincipal.css">
        <link rel="stylesheet" href="../Css/drpdwn.css">
        <link rel="stylesheet" href="../Css/estadisticas.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="../Css/formHacerPedido.css">
        <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg"/>
        <title>Administración | Crear Combos</title>
    </head>
    <body>
        
        <?php require('header.php'); 

            date_default_timezone_set('America/Panama');
            $date_now = date("H:i:s");
            $variable = new DateTime($date_now);
            $nomTurno = "Fuera De Servicio";
            $turno = 0;
            $fechaPedido = 0;
            $dejarComprar = "Si";


            if($variable->format('H:i:s') > '06:35:00' && $variable->format('H:i:s') < '11:50:00'){
                $nomTurno = "Matutino";
                $turno = 1;
            } else if($variable->format('H:i:s') > '11:50:00' && $variable->format('H:i:s') < '17:35:00'){
                $nomTurno = "Vespertino";
                $turno = 2;
            } else if($variable->format('H:i:s') > '17:35:00' && $variable->format('H:i:s') < '21:50:00'){
                $nomTurno = "Nocturno";
                $turno = 3;
            } else {}
        
            $Comidas = $datos->query("SELECT * FROM producto p 
                                                INNER JOIN menu m ON p.id_producto = m.id_producto
                                                INNER JOIN menu_turno mt ON mt.id_menu = m.id_menu
                                        WHERE tipo_producto='Comida' AND mt.id_turno = $turno");

            $Snacks = $datos->query("SELECT * FROM producto p 
                                                INNER JOIN menu m ON p.id_producto = m.id_producto
                                                INNER JOIN menu_turno mt ON mt.id_menu = m.id_menu
                                        WHERE tipo_producto='Snack' AND mt.id_turno = $turno");
            $Refrescos = $datos->query("SELECT * FROM producto p 
                                                INNER JOIN menu m ON p.id_producto = m.id_producto
                                                INNER JOIN menu_turno mt ON mt.id_menu = m.id_menu
                                        WHERE tipo_producto='Refresco' AND mt.id_turno = $turno");
        
        ?>

        <div class="headimg">
            <div class="TituloCompleto">
            <h1>Administrar El Menú - Crear Combo</h1>
        </div>
        </div>
        <div style="text-align: center;">
            <p class="merror" style="color: #fc6e6e"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
            <p class="merror" style="color: #51034f"><?php if(isset($_GET['exito'])) echo $_GET['exito']; ?></p>
        </div>
        <div class="todo">
            <div class="hacerPedido" style="margin-bottom: 2%;">
                <div class="barraLateral">
                    <h2 style="margin: 0 0 3% 0;">Opciones De Combos</h2>
                    <a href="adminCrearCombos.php" style="animation: 1s infinite alternate resaltar;">Crear Combo</a>
                    <a href="adminEditarCombos.php">Editar Combo</a>
                    <h2 style="margin: 3% 0 3% 0%;">Opciones De Productos</h2>
                    <a href="adminMenuAgregar.php">Agregar Producto</a>
                    <a href="adminMenuEditar.php">Editar Producto</a>
                    <a href="adminMenuEliminar.php">Eliminar Producto</a>
                    <a href="adminMenuInventario.php">Inventario</a><br>
                </div>
                <form method="POST" action="../Procesos/registrarCombo.php" class="otraBarra">
                    <div>
                        <h2>Crear Combo</h2>
                        <div class="datosProductos camposCrearEditar">
                            <h3 style="margin-left: 5%;">Nombre:</h3>
                            <input type="text" name="nombreCombo" placeholder="Nombre del combo" style="margin-right: 5%; background-color: white; color: black; border: 1px solid black;">
                            <h3>Cafeteria:</h3>
                            <?php $consultarCafeterias = $datos->query("SELECT * FROM cafeteria"); ?>
                            <select id="Cafeteria" name="Cafeteria">
                            <?php while($cafeteria = $consultarCafeterias->fetch(PDO::FETCH_OBJ)){ ?>
                                <option value="<?php echo $cafeteria->id_cafeteria; ?>"><?php echo $cafeteria->nombre; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="datosProductos">
                            <div class="card">
                                <h2 class="proTitulo">Comida:</h2>
                                <img id="fotoDeComida" src="../Imagenes/comidaIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                                <div class="ComidasMenu">
                                    <select name="comida" class="selectPro">
                                        <option value="0">Ninguno</option>
                                        <?php while($comida = $Comidas->fetch(PDO::FETCH_OBJ)){ ?>
                                            <option value="<?php echo $comida->id_producto ?>"><?php echo $comida->nombre; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <h2 class="proTitulo">Snack:</h2>
                                <img id="fotoDeComida" src="../Imagenes/snackIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                                <div class="ComidasMenu">
                                    <select name="snack" class="selectPro">
                                        <option value="0">Ninguno</option>
                                        <?php while($snack = $Snacks->fetch(PDO::FETCH_OBJ)){ ?>
                                            <option value="<?php echo $snack->id_producto ?>"><?php echo $snack->nombre; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <h2 class="proTitulo">Refresco:</h2>
                                <img id="fotoDeComida" src="../Imagenes/refrescoIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                                <div class="ComidasMenu">
                                    <select name="refresco" class="selectPro">
                                        <option value="0">Ninguno</option>
                                        <?php while($refresco = $Refrescos->fetch(PDO::FETCH_OBJ)){ ?>
                                            <option value="<?php echo $refresco->id_producto ?>"><?php echo $refresco->nombre; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="camposCrearEditar">
                            <div class="datosProductos">
                                <h3 style="margin-left: 12%;">Precio:</h3>
                                <h3 style="margin-left: 20%;">Turno:</h3>
                                <h3 style="margin-left: 16%;">Cantidad:</h3>
                            </div>
                            <div class="datosProductos" style="margin-left: 3.5%;">
                                <input type="number" style="background-color: white; color: black; border: 1px solid black;" name="costo" placeholder="Precio Del Producto" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" maxlength="99999.00" required>
                                <select style="padding: 0 7% 0 7%; background-color: white; color: black; border: 1px solid black;" name="turno" required>
                                    <?php if($turno == 1) { ?>
                                        <option value="1">Matutino</option>
                                    <?php } else if($turno == 2){ ?>
                                        <option value="2">Vespertino</option>
                                    <?php } else if($turno == 3){ ?>
                                        <option value="3">Nocturno</option>
                                    <?php } else {}?>
                                </select>
                                <input type="number" style="background-color: white; color: black; border: 1px solid black;" name="cantidad" placeholder="Cantidad De Productos" pattern="[0-9]+([\.,][0-9]+)?" step="1" maxlength="999999" required>
                            </div>
                        </div>
                        <div class="datosProductos" style="justify-content: center; margin-top: 2%;">
                        <input type="reset" class="botones" value="Cancelar">    
                        <input type="submit" class="botones" value="Guardar Producto">
                    </div>
                </form>
            </div>
        </div>
        <?php require('footer.html'); ?>
        <script type="text/javascript" src="../JavaScript/complementos.js"></script>
    </body>
</html>