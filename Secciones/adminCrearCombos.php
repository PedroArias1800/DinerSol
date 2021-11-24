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
        <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg" />
        <title>Administración | Crear Combos</title>
    </head>
    <body>
        
        <?php require('header.php'); ?>

        <div class="TituloCompleto">
            <h1>Administrar El Menú - Crear Combo</h1>
        </div>
        <div style="text-align: center;">
            <p class="merror" style="color: #fc6e6e"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
            <p class="merror" style="color: #51034f"><?php if(isset($_GET['exito'])) echo $_GET['exito']; ?></p>
        </div>
        <div class="todo">
            <div class="hacerPedido" style="margin-bottom: 2%;">
                <div class="barraLateral">
                    <h2 style="margin: 0 0 3% 0;">Opciones De Combos</h2>
                    <a href="adminCrearCombos.php">Crear Combo</a>
                    <a href="adminEditarCombos.php">Editar Combo</a>
                    <h2 style="margin: 3% 0 3% 0%;">Opciones De Productos</h2>
                    <a href="adminMenuAgregar.html">Agregar Producto</a>
                    <a href="adminMenuEditar.html">Editar Producto</a>
                    <a href="adminMenuEditar.html">Eliminar Producto</a>
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
                            <select id="Cafeteria" name="Cafeteria" onChange="mostrarProductos()">
                            <?php while($cafeteria = $consultarCafeterias->fetch(PDO::FETCH_OBJ)){ ?>
                                <option value="<?php echo $cafeteria->id_cafeteria; ?>"><?php echo $cafeteria->nombre; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="datosProductos">
                            <div class="iconoProductos">
                                <h3>Comidas</h3>
                                <?php $Comidas = $datos->query("SELECT * FROM producto WHERE tipo_producto='Comida'") ?>
                                <img src="../Imagenes/comidaIcono.png" alt="Comida1" width="40%" height="40%" style="margin-top: -2%;"><br>
                                <select name="comida">
                                    <?php while($comida = $Comidas->fetch(PDO::FETCH_OBJ)){ ?>
                                        <option value="<?php echo $comida->id_producto ?>"><?php echo $comida->nombre; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="iconoProductos">
                                <h3>Snacks</h3>
                                <?php $Snacks = $datos->query("SELECT * FROM producto WHERE tipo_producto='Snack'") ?>
                                <img src="../Imagenes/snackIcono.png" alt="Comida1" width="40%" height="40%" style="margin-top: -2%;"><br>
                                <select name="snack">
                                    <option value="0">Ninguno</option>
                                    <?php while($snack = $Snacks->fetch(PDO::FETCH_OBJ)){ ?>
                                        <option value="<?php echo $snack->id_producto ?>"><?php echo $snack->nombre; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="iconoProductos">
                                <h3>Refrescos</h3>
                                <?php $Refrescos = $datos->query("SELECT * FROM producto WHERE tipo_producto='Refresco'") ?>
                                <img src="../Imagenes/refrescoIcono.png" alt="Comida1" width="40%" height="40%" style="margin-top: -2%;"><br>
                                <select name="refresco">
                                    <?php while($refresco = $Refrescos->fetch(PDO::FETCH_OBJ)){ ?>
                                        <option value="<?php echo $refresco->id_producto ?>"><?php echo $refresco->nombre; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="datosProductos camposCrearEditar">
                            <div class="datosProductos">
                                <h3 style="margin-left: 5%;">Precio:</h3>
                                <input type="number" style="background-color: white; color: black; border: 1px solid black;" name="costo" placeholder="Precio Del Producto" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" maxlength="99999.00" required>
                            </div>
                            <div class="datosProductos">
                                <h3 style="margin-left: 15%;">Cantidad:</h3>
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