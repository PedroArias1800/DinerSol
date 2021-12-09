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
        <title>Administración | Editar</title>
    </head>
    <body>
        
        <?php require('header.php'); 

            $consultarCafeterias = $datos->query("SELECT * FROM cafeteria");
        
            $consultarProductos = $datos->query("SELECT * FROM producto ORDER BY id_producto, id_cafeteria, tipo_producto");
        
        ?>

        <script>

            //Para las cafeterias
            var arrayIdCaf = new Array();
            var arrayNomCaf = new Array();

            //Para los productos
            var arrayIdProducto = new Array();
            var arrayNomProducto = new Array();
            var arrayTipoProducto = new Array();
            var arrayCostoProducto = new Array();
            var arrayFotoProducto = new Array();
            var arrayInventarioProducto = new Array();
            var arrayIdCafeteria = new Array();

            <?php
            $c=0;
            while($caf=$consultarCafeterias->fetch(PDO::FETCH_OBJ)){
                echo "arrayIdCaf[$c]=$caf->id_cafeteria;";
                //echo "arrayIdCaf[$c]=$caf->nombre;";
                $c++;
            }

            $n=0;
            while($producto=$consultarProductos->fetch(PDO::FETCH_OBJ))  {
                echo "arrayIdCafeteria[$n]=$producto->id_cafeteria;";
                echo "arrayIdProducto[$n]=$producto->id_producto;";
                echo "arrayNomProducto[$n]='$producto->nombre';";
                echo "arrayTipoProducto[$n]='$producto->tipo_producto';";
                echo "arrayCostoProducto[$n]=$producto->costo;";
                echo "arrayFotoProducto[$n]='$producto->foto';";
                echo "arrayInventarioProducto[$n]='$producto->inventario';";
                $n++;
                }
            ?>
            
            var c ="<?php echo $c; ?>"; //Total de cafeterias
            var n ="<?php echo $n; ?>"; //Total de productos

            function mostrarNomPro(){

                document.getElementById('datosDelProducto').style.display = 'none';
                document.getElementById('imgProSelect').style.display = 'none';
                document.getElementById('fotoDeComida').style.display = 'flex';
                document.getElementById('tipoProducto').disabled = true;
                document.getElementById('foto').disabled = true;
                document.getElementById('precio').disabled = true;
                document.getElementById('cantidad').disabled = true;

                var valor=0;
                var nom=1;

                //asignamos a la variable valor el valor de la lista de menú seleccionado
                valor=document.proPedido.Cafeteria.value;
                document.proPedido.nombreProducto1.length=0;
                document.proPedido.nombreProducto1[0] = new Option("Selecciona un producto",0);
                document.proPedido.nombreProducto1[0].disabled = true;

                for (x=0;x<n;x++){
                    if(valor == arrayIdCafeteria[x]){ 
                        document.proPedido.nombreProducto1[nom] = new Option(arrayNomProducto[x],arrayIdProducto[x]);
                        nom=nom+1;
                    }
                }
            }

            function mostrarProductos(){

                document.getElementById('datosDelProducto').style.display = 'block';
                document.getElementById('fotoDeComida').style.display = 'none';
                document.getElementById('imgProSelect').style.display = 'flex';
                document.getElementById('tipoProducto').disabled = false;
                document.getElementById('foto').disabled = false;
                document.getElementById('precio').disabled = false;
                document.getElementById('cantidad').disabled = false;

                var valor=0;
                var nom=0;

                //asignamos a la variable valor el valor de la lista de producto seleccionado
                valor=document.proPedido.nombreProducto1.value;
                
                for (x=0;x<n;x++) {
                    if(valor == arrayIdProducto[x]){
                        document.proPedido.nombreProducto2.value = arrayNomProducto[x];
                        document.proPedido.idProducto2.value = arrayIdProducto[x];
                        document.proPedido.precio.value = parseFloat(arrayCostoProducto[x]).toFixed(2);
                        document.proPedido.cantidad.value = arrayInventarioProducto[x];
                        document.proPedido.imgProSelect2.src = "../Imagenes/"+arrayFotoProducto[x];
                    }
                    if(document.proPedido.Cafeteria2[x].value == arrayIdCafeteria[x]){
                        document.proPedido.Cafeteria2[x].selected = true;
                    }
                }
            }

        </script>

<div class="headimg">
            <div class="TituloCompleto">
            <h1>Administrar El Menú - Editar Producto</h1>
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
                    <a href="adminCrearCombos.php">Crear Combo</a>
                    <a href="adminEditarCombos.php">Editar Combo</a>
                    <h2 style="margin: 3% 0 3% 0%;">Opciones De Productos</h2>
                    <a href="adminMenuAgregar.php">Agregar Producto</a>
                    <a href="adminMenuEditar.php">Editar Producto</a>
                    <a href="adminMenuEliminar.php">Eliminar Producto</a>
                    <a href="adminMenuInventario.php">Inventario</a><br>
                </div>
                <form method="POST" action="../Procesos/editarProducto.php" class="otraBarra" name="proPedido">
                    <div>
                        <h2>Editar Producto</h2>
                        <div class="datosProductos camposCrearEditar">
                            <h3 style="margin-left: 5%;">Cafeteria:</h3>
                            <?php $consultarCafeterias = $datos->query("SELECT * FROM cafeteria"); ?>
                            <select id="Cafeteria" name="cafeteria" onchange="mostrarNomPro()" required>
                                <option value="" disabled selected>Escoge la cafeteria</option>
                            <?php while($cafeteria = $consultarCafeterias->fetch(PDO::FETCH_OBJ)){ ?>
                                <option value="<?php echo $cafeteria->id_cafeteria; ?>"><?php echo $cafeteria->nombre; ?></option>
                            <?php } ?>
                            </select>
                            <h3 style="margin-left: 5%;">Producto:</h3>
                            <select name="nombreProducto1" id="nombreProducto1" onchange="mostrarProductos()" required>
                                <option value="" disabled selected>Escoge una cafeteria</option>
                            </select>
                        </div>
                        <div style="display: none;" id="datosDelProducto">
                            <h3>Datos del producto seleccionado: <b>Edite solo los campos que necesita</b></h3>
                            <div class="datosProductos camposCrearEditar">
                                <h3 style="margin-left: 5%;">Cafeteria:</h3>
                                <?php $consultarCafeterias = $datos->query("SELECT * FROM cafeteria"); ?>
                                <select id="Cafeteria2" name="cafeteria2">
                                <?php while($cafeteria = $consultarCafeterias->fetch(PDO::FETCH_OBJ)){ ?>
                                    <option value="<?php echo $cafeteria->id_cafeteria; ?>"><?php echo $cafeteria->nombre; ?></option>
                                <?php } ?>
                                </select>
                                <h3 style="margin-left: 5%;">Nombre:</h3>
                                <input type="text" name="nombreProducto2" id="nombreProducto2" placeholder="Nombre del producto" style="margin-right: 5%; background-color: white; color: black; border: 1px solid black;">
                                <input type="hidden" name="idProducto2" id="idProducto2">
                            </div>
                        </div>
                        <div class="datosProductos">
                            <div class="card" style="width: 100%; margin: 4% 2% 0 0;">
                                <h2 class="proTitulo">Foto Y Tipo De Producto:</h2>
                                <div id="fotoDeComida" style="display: flex; justify-content: center; align-items: center; margin: -4% 8% 8% 0;">
                                    <img src="../Imagenes/comidaIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                                    <img src="../Imagenes/snackIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                                    <img src="../Imagenes/refrescoIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                                    <img src="../Imagenes/cubiertos.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                                </div>
                                <div id="imgProSelect" style="display: flex; justify-content: center; align-items: center; margin: 0 0 9% 36%; display: none; width: 25%; height: 25%;">
                                    <img id="imgProSelect2" src="" class="FotoComida" alt="Comida1" width="30%" height="30%">
                                </div>
                                <?php $produ = $datos->query("SELECT DISTINCT tipo_producto FROM producto") ?>
                                <div class="ComidasMenu">
                                    <select name="tipoProducto" id="tipoProducto" style="width: 40%; margin: -7% 0 2% 26%;" class="selectPro" disabled required>
                                        <?php while($pro = $produ->fetch(PDO::FETCH_OBJ)){ ?>
                                            <option value="<?php echo $pro->tipo_producto; ?>"><?php  echo $pro->tipo_producto; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="datosProductos camposCrearEditar">
                            <div class="datosProductos">
                                <h3 style="margin-left: 5%;">Adjunte foto del producto:</h3>
                                <input name="foto" type="file" accept="image/*" id="foto" disabled/>
                            </div>
                        </div>
                        <div class="datosProductos camposCrearEditar">
                            <div class="datosProductos">
                                <h3 style="margin-left: 5%;">Precio:</h3>
                                <input type="number" id="precio" style="background-color: white; color: black; border: 1px solid black;" name="costo" placeholder="Precio Del Producto" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" maxlength="99999.00" disabled required>
                            </div>
                            <div class="datosProductos">
                                <h3 style="margin-left: 15%;">Cantidad:</h3>
                                <input type="number" id="cantidad" style="background-color: white; color: black; border: 1px solid black;" name="inventario" placeholder="Cantidad De Productos" pattern="[0-9]+([\.,][0-9]+)?" step="1" maxlength="999999" disabled required>
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