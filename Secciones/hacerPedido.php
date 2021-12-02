<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/footerHeader.css">
    <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
    <link rel="stylesheet" href="../Css/drpdwn.css">
    <link rel="stylesheet" href="../Css/popup.css">
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

        var cero = 0.00;
        cero = parseFloat(cero).toFixed(2);
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

            var pComida = document.getElementById('pComida');
            var pSnack = document.getElementById('pSnack');
            var pRefresco = document.getElementById('pRefresco');

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

            document.formHacerPedido.Menu2.value = "";
            document.formHacerPedido.Snack2.value = "";
            document.formHacerPedido.Refresco2.value = "";

            document.getElementById('pTotal').innerHTML = "$"+cero;

            pComida.innerHTML = "$"+cero;
            pSnack.innerHTML = "$"+cero;
            pRefresco.innerHTML = "$"+cero;

            fotoDeComida.src = "../Imagenes/comidaIcono.png";
            fotoDeSnack.src = "../Imagenes/snackIcono.png";
            fotoDeRefresco.src = "../Imagenes/refrescoIcono.png";

            nombreDeComida.innerHTML = "Ninguno Por Ahora";
            nombreDeSnack.innerHTML = "Ninguno Por Ahora";
            nombreDeRefresco.innerHTML = "Ninguno Por Ahora";

        }	

        function SelectComida(){

            document.formHacerPedido.Menu2.value = document.proPedido.Menu.value;
            var sinComida = document.getElementById('sinComida');
            var pComida = document.getElementById('pComida');
            var menu = document.getElementById("Menu");
            var selected = menu.options[menu.selectedIndex].text;
            var seHizo = false;
            var precio = cero;

            sinComida.innerHTML = selected;

            for (x=0;x<n;x++) {

                if (selected == arrayNomProducto[x]){
                    pComida.innerHTML = "$"+parseFloat(arrayCostoProducto[x]).toFixed(2);
                    fotoDeComida.src = "../Imagenes/"+arrayFotoProducto[x];
                    nombreDeComida.innerHTML = arrayNomProducto[x];
                    seHizo = true;
                }

            }

            var pSnack = document.getElementById('pSnack');
            var pRefresco = document.getElementById('pRefresco');

            if(!seHizo){
                pComida.innerHTML = "$"+cero;
                fotoDeComida.src = "../Imagenes/comidaIcono.png";
                nombreDeComida.innerHTML = "Ninguno Por Ahora";
            }

            preComida = pComida.innerHTML.split("$");
            preComida = preComida[1];
            preSnack = pSnack.innerHTML.split("$");
            preSnack = preSnack[1];
            preRefresco = pRefresco.innerHTML.split("$");
            preRefresco = preRefresco[1];

            pTotal = parseFloat(preComida)+parseFloat(preSnack)+parseFloat(preRefresco);
            pTotal = parseFloat(pTotal).toFixed(2)
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
            var precio = cero;

            sinSnack.innerHTML = selected;

            for (x=0;x<n;x++) {

                if (selected == arrayNomProducto[x]){
                    pSnack.innerHTML = "$"+parseFloat(arrayCostoProducto[x]).toFixed(2);
                    fotoDeSnack.src = "../Imagenes/"+arrayFotoProducto[x];
                    nombreDeSnack.innerHTML = arrayNomProducto[x];
                    seHizo = true;
                }

            }

            var pComida = document.getElementById('pComida');
            var pRefresco = document.getElementById('pRefresco');

            if(!seHizo){
                pSnack.innerHTML = "$"+cero;
                fotoDeSnack.src = "../Imagenes/snackIcono.png";
                nombreDeSnack.innerHTML = "Ninguno Por Ahora";
            }

            preComida = pComida.innerHTML.split("$");
            preComida = preComida[1];
            preSnack = pSnack.innerHTML.split("$");
            preSnack = preSnack[1];
            preRefresco = pRefresco.innerHTML.split("$");
            preRefresco = preRefresco[1];

            pTotal = parseFloat(preComida)+parseFloat(preSnack)+parseFloat(preRefresco);
            pTotal = parseFloat(pTotal).toFixed(2)
            document.getElementById('pTotal').innerHTML = "$"+pTotal;

        }

        function SelectRefresco(){

            document.formHacerPedido.Refresco2.value = document.proPedido.Refresco.value;

            var sinRefresco = document.getElementById('sinRefresco');
            var pRefresco = document.getElementById('pRefresco');
            Number(pRefresco).toFixed(2);

            var refresco = document.getElementById("Refresco");
            var selected = refresco.options[refresco.selectedIndex].text;
            var seHizo = false;
            var precio = cero;

            sinRefresco.innerHTML = selected;

            for (x=0;x<n;x++) {

                if (selected == arrayNomProducto[x]){
                    pRefresco.innerHTML = "$"+parseFloat(arrayCostoProducto[x]).toFixed(2);
                    fotoDeRefresco.src = "../Imagenes/"+arrayFotoProducto[x];
                    nombreDeRefresco.innerHTML = arrayNomProducto[x];
                    seHizo = true;
                }

            }

            var pComida = document.getElementById('pComida');
            var pSnack = document.getElementById('pSnack');

            if(!seHizo){
                pRefresco.innerHTML = "$"+cero;
                fotoDeRefresco.src = "../Imagenes/refrescoIcono.png";
                nombreDeRefresco.innerHTML = "Ninguno Por Ahora";
            }

            preComida = pComida.innerHTML.split("$");
            preComida = preComida[1];
            preSnack = pSnack.innerHTML.split("$");
            preSnack = preSnack[1];
            preRefresco = pRefresco.innerHTML.split("$");
            preRefresco = preRefresco[1];

            pTotal = parseFloat(preComida)+parseFloat(preSnack)+parseFloat(preRefresco);
            pTotal = parseFloat(pTotal).toFixed(2)
            document.getElementById('pTotal').innerHTML = "$"+pTotal;

        }

        function pagar(x){
            if(pTotal>0.00){
                if(x==0){
                    document.querySelector('.popup-wrapperPagar').style.display = 'block';
                } else {
                    document.querySelector('.popup-wrapperPagar').style.display = 'none';
                    document.querySelector('.popup-wrapper').style.display = 'block';
                }
            }
        }
        function esconder(){
            document.querySelector('.popup-wrapperPagar').style.display = 'none';
            document.querySelector('.popup-wrapper').style.display = 'none';
        }

        function enviar(x){
            if(pTotal>0.00){
                return true;
            } else{
                window.location.href("paginaPrincipal.php");
            }
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
                                    <option value="">Ninguno Por Ahora</option>
                                </select>
                            </div>
                        </div>
                        <div class="formPedido">
                            <div>
                                <h3>Snacks:</h3>
                                <select name="Snack" id="Snack" onchange="SelectSnack()">
                                    <option value="">Ninguno Por Ahora</option>
                                </select>
                            </div>
                            <div>
                                <h3>Refrescos:</h3>
                                <select name="Refresco" id="Refresco" onchange="SelectRefresco()">
                                    <option value="">Ninguno Por Ahora</option>
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
                            <h2 class="proTitulo">Comida:</h2>
                            <img id="fotoDeComida" src="../Imagenes/comidaIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b id="nombreDeComida">Ninguno Por Ahora</b></h4>
                            </div>
                        </div>
                        <div class="card">
                            <h2 class="proTitulo">Snack:</h2>
                            <img id="fotoDeSnack" src="../Imagenes/snackIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b id="nombreDeSnack">Ninguno Por Ahora</b></h4>
                            </div>
                        </div>
                        <div class="card">
                            <h2 class="proTitulo">Refresco:</h2>
                            <img id="fotoDeRefresco" src="../Imagenes/refrescoIcono.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b id="nombreDeRefresco">Ninguno Por Ahora</b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="PagarCancelar" id="formHacerPedido">
                        <button class="botones"><a href="paginaPrincipal.php">Cancelar</a></button>
                        <button class="botones" onclick="pagar(0)"><a>Confirmar</a></button>
                    </div>
                    <div class="popup-wrapperPagar">
                        <div class="popupPagar">
                            <div class="popup-closePagar" onclick="esconder(0)">x</div>
                            <div class="popup-contentPagar">
                                <h3>Ingrese los datos de su tarjeta de crédito:</h3>

                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <div class="tarjetaIzquierda">
                                        <h4>Tarjetas De Crédito</h4>
                                        <div>
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Former_Visa_%28company%29_logo.svg/288px-Former_Visa_%28company%29_logo.svg.png" alt="Visa" width="5%" height="5%">
                                            <img src="https://logos-marcas.com/wp-content/uploads/2020/09/MasterCard-Logotipo-1979-1990.jpg" alt="Master Card" width="6%" height="6%">
                                        </div>
                                        <h5>Nombre Del Titular</h5>
                                        <i><input type="text" placeholder="Como aparece en la tarjeta"></i>
                                        <h5>Fecha De Expiración</h5>
                                        <div>
                                            <input type="number" min="01" max="12" placeholder="Mes">
                                            <input type="number" min="2021" max="2030" placeholder="Año">
                                        </div>
                                    </div>

                                    <div class="tarjetaIzquierda">
                                        <h4>Tarjetas De Crédito</h4>
                                        <div>
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Former_Visa_%28company%29_logo.svg/288px-Former_Visa_%28company%29_logo.svg.png" alt="Visa" width="5%" height="5%">
                                            <img src="https://logos-marcas.com/wp-content/uploads/2020/09/MasterCard-Logotipo-1979-1990.jpg" alt="Master Card" width="6%" height="6%">
                                        </div>
                                        <h5>Nombre Del Titular</h5>
                                        <i><input type="text" placeholder="Como aparece en la tarjeta"></i>
                                        <h5>Fecha De Expiración</h5>
                                        <div>
                                            <input type="number" min="01" max="12" placeholder="Mes">
                                            <input type="number" min="2021" max="2030" placeholder="Año">
                                        </div>
                                    </div>

                                </div>

                                <button class="botones" onclick="esconder(0)"><a>Cancelar</a></button>
                                <button class="botones" onclick="pagar(1)"><a>Confirmar</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="popup-wrapper">
                        <div class="popup">
                            <div class="popup-close" onclick="esconder(1)">x</div>
                            <form class="popup-content" name="formHacerPedido" action="../Procesos/ingresarPedido.php" method="POST" onsubmit="return enviar()">
                                <input type="hidden" value="" name="Menu2">
                                <input type="hidden" value="" name="Snack2">
                                <input type="hidden" value="" name="Refresco2">
                                <h3>¿Está seguro de hacer la compra?</h3>
                                <button class="botones confirmarCompra" onclick="esconder(1)"><a>No</a></button>
                                <input type="submit" onclick="enviar()" value="Sí" class="botones confirmarCompra">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <hr><br>
    </div>
    
    <?php require('footer.html'); ?>

    <script type="text/javascript" src="../JavaScript/complementos.js"></script>
</body>

</html>