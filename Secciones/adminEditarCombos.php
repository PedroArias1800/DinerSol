<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Css/footerHeader.css">
        <link rel="stylesheet" href="../Css/paginaPrincipal.css">
        <link rel="stylesheet" href="../Css/drpdwn.css">
        <link rel="stylesheet" href="../Css/estadisticas.css">
        <link rel="stylesheet" href="../Css/formHacerPedido.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg" />
        <title>Administración | Editar Combos</title>
    </head>
    <body>
        
        <?php require('header.php'); 
        
            $consultarCafeteria = $datos->query("SELECT id_cafeteria, nombre FROM cafeteria");

            $consultarNomCombo = $datos->query("SELECT DISTINCT id_cafeteria, nombre_combo
                                                FROM combo
                                                ORDER BY id_cafeteria ASC, nombre_combo ASC");
        
            $consultarCombos = $datos->query("SELECT c.id_cafeteria, c.id_combo, c.nombre_combo, c.costo, c.inventario
                                                FROM combo c
                                                ORDER BY c.id_cafeteria ASC, c.nombre_combo ASC");
            
        ?>

        <script>

            //Para los nombre de los combos
            var arrayIdCafeteria = new Array();
            var arrayNomCombo1 = new Array();

            //Para los datos de los combos
            var arrayIdCombo = new Array();
            var arrayNomCombo2 = new Array();
            var arrayCostoCombo = new Array();
            var arrayInventarioCombo = new Array();

            <?php
                $n=0;
                while($combo=$consultarNomCombo->fetch(PDO::FETCH_OBJ))  {
                    echo "arrayIdCafeteria[$n]=$producto->id_cafeteria;";
                    echo "arrayNomCombo[$n]='$producto->nombre_combo';";
                    $n++;
                }
            ?>

            <?php
                $n=0;
                while($combo=$consultarCombos->fetch(PDO::FETCH_OBJ))  {
                    echo "arrayIdCafeteria[$n]=$producto->id_cafeteria;";
                    echo "arrayIdCombo[$n]=$producto->id_combo;";
                    echo "arrayNomCombo[$n]='$producto->nombre_combo';";
                    echo "arrayCostoCombo[$n]=$producto->costo;";
                    echo "arrayInventarioCombo[$n]='$producto->inventario';";
                    $n++;
                }
            ?>
            var n ="<?php echo $n; ?>"; //total de registros

            function SelectCafeteria()
            {
                var valor=0;
                var nom=0;

                var nombre = document.getElementById('nombre');

                //asignamos a la variable valor el valor de la lista de menú seleccionado
                valor=document.editCombo.Cafeteria.value;
                document.editCombo.nombre.length=0;
                for (x=0;x<n;x++) {
                    if (valor == arrayIdCafeteria[x])
                    {
                        document.editCombo.nombre[nom] = new Option(arrayNomCombo[x],arrayNomCombo[x]);
                        nom++;
                    }
                }
            }

        </script>

        <div class="TituloCompleto">
            <h1>Administrar El Menú - Editar Combo</h1>
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
                    <a href="adminMenuAgregar.php">Agregar Producto</a>
                    <a href="adminMenuEditar.php">Editar Producto</a>
                    <a href="adminMenuEditar.php">Eliminar Producto</a>
                    <a href="adminMenuInventario.php">Inventario</a><br>
                </div>
                <form method="POST" action="../Procesos/editarCombo.php" class="otraBarra" name="editCombo">
                    <div>
                        <h2>Editar Combo</h2>
                        <div class="datosProductos camposCrearEditar">
                            <h3 style="margin-left: 5%;">Cafeteria:</h3>
                            <?php $consultarCafeterias = $datos->query("SELECT * FROM cafeteria"); ?>
                            <select id="Cafeteria" name="Cafeteria"  onchange="SelectCafeteria()">
                                <option value="" disabled selected>Elige una cafetería</option>
                                <?php while($cafeteria = $consultarCafeteria->fetch(PDO::FETCH_OBJ)){ ?>
                                    <option value="<?php echo $cafeteria->id_cafeteria; ?>"><?php echo $cafeteria->nombre; ?></option>
                                <?php } ?>
                            </select>
                            <h3 style="margin-left: 5%;">Nombre:</h3>
                            <select name="nombre" id="nombre" onchange="SelectDatosCombo()">
                                <option value="" disabled selected>Selecciona Primero La Cafetería</option>
                            </select>
                        </div>
                        <div class="datosProductos">
                            <div class="card">
                                <h2 class="proTitulo">Comida:</h2>
                                <img id="fotoDeComida" src="../Imagenes/comidaIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                                <?php $Comidas = $datos->query("SELECT * FROM producto WHERE tipo_producto='Comida'") ?>
                                <div class="ComidasMenu">
                                    <select name="comida" class="selectPro">
                                        <?php while($comida = $Comidas->fetch(PDO::FETCH_OBJ)){ ?>
                                            <option value="<?php echo $comida->id_producto ?>"><?php echo $comida->nombre; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <h2 class="proTitulo">Snack:</h2>
                                <img id="fotoDeComida" src="../Imagenes/snackIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                                <?php $Snacks = $datos->query("SELECT * FROM producto WHERE tipo_producto='Snack'") ?>
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
                                <?php $Refrescos = $datos->query("SELECT * FROM producto WHERE tipo_producto='Refresco'") ?>
                                <div class="ComidasMenu">
                                    <select name="refresco" class="selectPro">
                                        <?php while($refresco = $Refrescos->fetch(PDO::FETCH_OBJ)){ ?>
                                            <option value="<?php echo $refresco->id_producto ?>"><?php echo $refresco->nombre; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
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