<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/footerHeader.css">
    <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
    <link rel="stylesheet" href="../Css/drpdwn.css">
    <link rel="stylesheet" href="../Css/estadisticas.css">
    <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <title>DinerSol | Hacer Pedido</title>
</head>

<body>

    <?php require('header.php');

        $consultarCafeteria = $datos->query("SELECT id_cafeteria, nombre FROM cafeteria");
    
        $consultarProductos = $datos->query("SELECT m.id_cafeteria, m.id_producto, p.nombre, p.tipo_producto, p.costo, p.foto
                                                FROM menu m INNER JOIN producto p ON m.id_producto=p.id_producto
                                                WHERE estado=1 AND p.inventario>0
                                                ORDER BY m.id_cafeteria ASC, p.tipo_producto ASC");

    ?>

    <script>

        var arrayIdCafeteria = new Array();
        var arrayIdProducto = new Array();
        var arrayNomProducto = new Array();
        var arrayTipoProducto = new Array();
        var arrayCostoProducto = new Array();
        var arrayFotoProducto = new Array();

        var i=1;
        var pTotal=0.00;
        parseFloat(pTotal).toFixed(2);
        // Inicializamos 3 arreglos con los datos de los Ids de las provincias y distritos; ademas, del nombre de los distritos
        <?php
        $n=0;
        while($producto=$consultarProductos->fetch(PDO::FETCH_OBJ))  {
            echo "arrayIdCafeteria[$n]=$producto->id_cafeteria;";
            echo "arrayIdProducto[$n]=$producto->id_producto;";
            echo "arrayNomProducto[$n]='$producto->nombre';";
            echo "arrayTipoProducto[$n]='$producto->tipo_producto';";
            echo "arrayCostoProducto[$n]=$producto->costo;";
            echo "arrayFotoProducto[$n]='$producto->foto';";
            $n++;
            }
        ?>
        var n ="<?php echo $n; ?>"; //total de registros

        function SelectCafeteria()
        {
            var valor=0;
            var comida=1;
            var snack=1;
            var refresco=1;

            //asignamos a la variable valor el valor de la lista de menú seleccionado
            valor=document.proPedido.Cafeteria.value;
            document.proPedido.Menu.length=1; //Limpiamos la lista de menu
            document.proPedido.Snack.length=1; //Limpiamos la lista de snack
            document.proPedido.Refresco.length=1; //Limpiamos la lista de refresco
            for (x=0;x<n;x++) {

                if (valor == arrayIdCafeteria[x])
                {
                    if(arrayTipoProducto[x] == 'Comida'){
                        document.proPedido.Menu[comida] = new Option(arrayNomProducto[x],arrayIdProducto[x]);
                        comida=comida+1;
                    } else if(arrayTipoProducto[x] == 'Snack'){
                        document.proPedido.Snack[snack] = new Option(arrayNomProducto[x],arrayIdProducto[x]);
                        snack=snack+1;
                    } else if(arrayTipoProducto[x] == 'Refresco'){
                        document.proPedido.Refresco[refresco] = new Option(arrayNomProducto[x],arrayIdProducto[x]);
                        refresco=refresco+1;
                    } else {}
                }
            }
        }	

        function SelectComida(){

            document.formHacerPedido.Menu2.value = document.proPedido.Menu.value;
            var sinComida = document.getElementById('sinComida');
            var pComida = document.getElementById('pComida');
            var menu = document.getElementById("Menu");
            var selected = menu.options[menu.selectedIndex].text;
            var seHizo = false;
            var precio = 0.00;

            sinComida.innerHTML = selected;

            for (x=0;x<n;x++) {

                if (selected == arrayNomProducto[x]){
                    pComida.innerHTML = "$"+arrayCostoProducto[x];
                    seHizo = true;
                }

            }

            if(!seHizo){
                pComida.innerHTML = "$"+0.00;
            }

            parseFloat(precio).toFixed(2);
            precioString = pComida.innerHTML.split("$");
            precio = precioString[1];
            pTotal = pTotal+precio;
            document.getElementById('pTotal').innerHTML = "$"+pTotal;

        }
        function SelectSnack(){

            document.formHacerPedido.Snack2.value = document.proPedido.Snack.value;
            var sinSnack = document.getElementById('sinSnack');
            var pSnack = document.getElementById('pSnack');
            Number(pSnack).toFixed(2);

            var snack = document.getElementById("Snack");
            var selected = snack.options[snack.selectedIndex].text;
            var seHizo = false;
            var precio = 0.00;

            sinSnack.innerHTML = selected;

            for (x=0;x<n;x++) {

                if (selected == arrayNomProducto[x]){
                    pSnack.innerHTML = "$"+arrayCostoProducto[x];
                    seHizo = true;
                }

            }

            if(!seHizo){
                pSnack.innerHTML = "$"+0.00;
            }

            parseFloat(precio).toFixed(2);
            precioString = pSnack.innerHTML.split("$");
            precio = precioString[1];
            pTotal = pTotal+precio;
            document.getElementById('pTotal').innerHTML = "$"+pTotal;
        }
        function SelectRefresco(){

            document.formHacerPedido.Refresco2.value = document.proPedido.Refresco.value;
        }

        </script>

    <div class="TituloCompleto">
        <h1>Hacer Pedidos</h1>
    </div><br>
        <div class="NoticiasMenu">
            <div class="Noticias" style="margin-left: 5%;">
                <div class="Snacks">
                    <div class="HacerPedido">
                        <h2 class="NombreCafeteria">Formulario Del Pedido:</h2>
                    </div>
                    <form name="proPedido" id="proPedido" enctype="multipart/form-data" class="OpcionesPedido" method="POST" action="">
                        <div class="formPedido">
                            <div>
                                <h3>Cafetería:</h3>
                                <select name="Cafeteria" id="Cafeteria" onchange="SelectCafeteria()">
                                    <option value="NULL" disabled selected>Selecciona Una Cafeteria</option>
                                    <?php while($cafeteria = $consultarCafeteria->fetch(PDO::FETCH_OBJ)){ ?>
                                        <option value="<?php echo $cafeteria->id_cafeteria; ?>"><?php echo $cafeteria->nombre; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <h3>Menú:</h3>
                                <select name="Menu" id="Menu" onchange="SelectComida()">
                                    <option value="NULL">Ninguno Por Ahora</option>
                                </select>
                            </div>
                        </div>
                        <div class="formPedido">
                            <div>
                                <h3>Snacks:</h3>
                                <select name="Snack" id="Snack" onchange="SelectSnack()">
                                    <option value="NULL">Ninguno Por Ahora</option>
                                </select>
                            </div>
                            <div>
                                <h3>Refrescos:</h3>
                                <select name="Refresco" id="Refresco" onchange="SelectRefresco()">
                                    <option value="NULL">Ninguno Por Ahora</option>
                                </select>
                            </div>
                        </div><br>
                        <table>
                            <thead>
                                <tr>
                                    <th>Artículos</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <tr>
                                    <td id="sinComida">Sin Comida</td>
                                    <td id="pComida">$0.00</td>
                                </tr>
                                <tr>
                                    <td id="sinSnack">Sin Snack</td>
                                    <td id="pSnack">$0.00</td>
                                </tr>
                                <tr>
                                    <td id="sinRefresco">Sin Refresco</td>
                                    <td id="pRefresco">$0.00</td>
                                </tr>
                                <tr class="Totales">
                                    <td>Total</td>
                                    <td id="pTotal">$0.00</td>
                                </tr>
                            </tbody>
                        </table><br>
                    </form>
                </div>
            </div>
            <div class="Menu">
                <div class="Central">
                    <div class="HacerPedido">
                        <h2 class="NombreCafeteria">Resumen Del Pedido:</h2>
                    </div>
                    <div class="ComidasDeCafeterias">
                        <div class="card">
                            <img src="../Imagenes/arrozConPollo.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Arroz Con Pollo</b></h4>
                                <h4 class="Precio">$1.25</h4>
                            </div>
                        </div>
                        <div class="card">
                            <img src="../Imagenes/snickers.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Snickers</b></h4> 
                                <h4 class="Precio">$1.25</h4> 
                            </div>
                        </div>
                        <div class="card">
                            <img src="../Imagenes/maltaVigor.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Malta Vigor</b></h4> 
                                <h4 class="Precio">$1.00</h4> 
                            </div>
                        </div>
                    </div>
                    <form class="PagarCancelar" name="formHacerPedido" id="formHacerPedido" onsubmit="confirmarCompra()">
                        <input type="hidden" value="" name="Menu2">
                        <input type="hidden" value="" name="Snack2">
                        <input type="hidden" value="" name="Refresco2">
                        <button class="botones"><a href="paginaPrincipal.php">Cancelar</a></button>
                        <button class="botones"><a href="">Confirmar</a></button>
                    </form>
                </div>
            </div>
        </div><br>
        <hr><br>
    </div>
    
    <?php require('footer.html'); ?>

    <script type="text/javascript" src="../JavaScript/complementos.js"></script>
</body>

</html>