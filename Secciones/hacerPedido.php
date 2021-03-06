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

    // SE AGARRA LA FECHA DE PANAMA Y SE HACE UNA COMPARASION SI ES DESAYUNO, LA MISMA LOGICA PARA LAS OTRAS COMIDAS
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
    } else if($variable->format('H:i:s') > '11:50:00' && $variable->format('H:i:s') < '17:50:00'){
        $nomTurno = "Vespertino";
        $turno = 2;
    } else if($variable->format('H:i:s') > '17:50:00' && $variable->format('H:i:s') < '21:50:00'){
        $nomTurno = "Nocturno";
        $turno = 3;
    } else {}

    $to_compare = "2021-12-7 12:50:00";
    $variable1 = new DateTime($to_compare);
    $difference = date_diff($variable, $variable1)->format("Difference => %Y years, %m months, %d days, %h hours, and %i minutes");    

    $consultarCafeteria = $datos->query("SELECT id_cafeteria, nombre FROM cafeteria");

    $consultarProductos = $datos->query("SELECT m.id_cafeteria, m.id_producto, p.nombre, p.tipo_producto, p.costo, p.foto
                                                FROM menu m INNER JOIN producto p ON m.id_producto=p.id_producto
                                                            INNER JOIN menu_turno mt ON m.id_menu = mt.id_menu
                                                WHERE estado = 1 AND p.inventario > 0 AND mt.id_turno = $turno
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

        var env = 0;
        var Compra = false;

        var i = 1;
        var pTotal = 0.00;
        parseFloat(pTotal).toFixed(2);
        // Inicializamos 3 arreglos con los datos de los Ids de las provincias y distritos; ademas, del nombre de los distritos
        <?php
        $n = 0;
        while ($producto = $consultarProductos->fetch(PDO::FETCH_OBJ)) {
            echo "arrayIdCafeteria[$n]=$producto->id_cafeteria;";
            echo "arrayIdProducto[$n]=$producto->id_producto;";
            echo "arrayNomProducto[$n]='$producto->nombre';";
            echo "arrayTipoProducto[$n]='$producto->tipo_producto';";
            echo "arrayCostoProducto[$n]=$producto->costo;";
            echo "arrayFotoProducto[$n]='$producto->foto';";
            $n++;
        }
        ?>
        var n = "<?php echo $n; ?>"; //total de registros

        function SelectCafeteria() {
            var valor = 0;
            var comida = 1;
            var snack = 1;
            var refresco = 1;

            var pComida = document.getElementById('pComida');
            var pSnack = document.getElementById('pSnack');
            var pRefresco = document.getElementById('pRefresco');

            //asignamos a la variable valor el valor de la lista de men?? seleccionado
            valor = document.proPedido.Cafeteria.value;

            document.formHacerPedido.Id_Cafeteria2.value = document.proPedido.Cafeteria.value;

            document.proPedido.Menu.length = 1; //Limpiamos la lista de menu
            document.proPedido.Snack.length = 1; //Limpiamos la lista de snack
            document.proPedido.Refresco.length = 1; //Limpiamos la lista de refresco
            for (x = 0; x < n; x++) {

                if (valor == arrayIdCafeteria[x]) {
                    if (arrayTipoProducto[x] == 'Comida') {
                        document.proPedido.Menu[comida] = new Option(arrayNomProducto[x], arrayIdProducto[x]);
                        comida = comida + 1;
                    } else if (arrayTipoProducto[x] == 'Snack') {
                        document.proPedido.Snack[snack] = new Option(arrayNomProducto[x], arrayIdProducto[x]);
                        snack = snack + 1;
                    } else if (arrayTipoProducto[x] == 'Refresco') {
                        document.proPedido.Refresco[refresco] = new Option(arrayNomProducto[x], arrayIdProducto[x]);
                        refresco = refresco + 1;
                    } else {}
                }
            }

            document.formHacerPedido.Menu2.value = "";
            document.formHacerPedido.Snack2.value = "";
            document.formHacerPedido.Refresco2.value = "";

            document.getElementById('pTotal').innerHTML = "$" + cero;

            pComida.innerHTML = "$" + cero;
            pSnack.innerHTML = "$" + cero;
            pRefresco.innerHTML = "$" + cero;

            fotoDeComida.src = "../Imagenes/comidaIcono.png";
            fotoDeSnack.src = "../Imagenes/snackIcono.png";
            fotoDeRefresco.src = "../Imagenes/refrescoIcono.png";

            nombreDeComida.innerHTML = "Ninguno Por Ahora";
            nombreDeSnack.innerHTML = "Ninguno Por Ahora";
            nombreDeRefresco.innerHTML = "Ninguno Por Ahora";
            document.formHacerPedido.PTotal.value = 0.00;

        }

        function SelectComida() {

            document.formHacerPedido.Menu2.value = document.proPedido.Menu.value;
            var sinComida = document.getElementById('sinComida');
            var pComida = document.getElementById('pComida');
            var menu = document.getElementById("Menu");
            var selected = menu.options[menu.selectedIndex].text;
            var seHizo = false;
            var precio = cero;

            sinComida.innerHTML = selected;

            for (x = 0; x < n; x++) {

                if (selected == arrayNomProducto[x]) {
                    pComida.innerHTML = "$" + parseFloat(arrayCostoProducto[x]).toFixed(2);
                    fotoDeComida.src = "../Imagenes/" + arrayFotoProducto[x];
                    nombreDeComida.innerHTML = arrayNomProducto[x];
                    seHizo = true;
                }

            }

            var pSnack = document.getElementById('pSnack');
            var pRefresco = document.getElementById('pRefresco');

            if (!seHizo) {
                pComida.innerHTML = "$" + cero;
                fotoDeComida.src = "../Imagenes/comidaIcono.png";
                nombreDeComida.innerHTML = "Ninguno Por Ahora";
            }

            preComida = pComida.innerHTML.split("$");
            preComida = preComida[1];
            preSnack = pSnack.innerHTML.split("$");
            preSnack = preSnack[1];
            preRefresco = pRefresco.innerHTML.split("$");
            preRefresco = preRefresco[1];

            pTotal = parseFloat(preComida) + parseFloat(preSnack) + parseFloat(preRefresco);
            <?php if($_SESSION['id_tipo'] == 5){ ?>
                pTotal = pTotal + (pTotal * 0.20);
            <?php } else if($_SESSION['id_tipo'] == 4){ ?>
                pTotal = pTotal - (pTotal * 0.20);
            <?php } else {} ?>
            pTotal = parseFloat(pTotal).toFixed(2)
            document.getElementById('pTotal').innerHTML = "$" + pTotal;
            document.formHacerPedido.PTotal.value = pTotal;

        }

        function SelectSnack() {

            document.formHacerPedido.Snack2.value = document.proPedido.Snack.value;
            var sinSnack = document.getElementById('sinSnack');
            var pSnack = document.getElementById('pSnack');
            Number(pSnack).toFixed(2);

            var snack = document.getElementById("Snack");
            var selected = snack.options[snack.selectedIndex].text;
            var seHizo = false;
            var precio = cero;

            sinSnack.innerHTML = selected;

            for (x = 0; x < n; x++) {

                if (selected == arrayNomProducto[x]) {
                    pSnack.innerHTML = "$" + parseFloat(arrayCostoProducto[x]).toFixed(2);
                    fotoDeSnack.src = "../Imagenes/" + arrayFotoProducto[x];
                    nombreDeSnack.innerHTML = arrayNomProducto[x];
                    seHizo = true;
                }

            }

            var pComida = document.getElementById('pComida');
            var pRefresco = document.getElementById('pRefresco');

            if (!seHizo) {
                pSnack.innerHTML = "$" + cero;
                fotoDeSnack.src = "../Imagenes/snackIcono.png";
                nombreDeSnack.innerHTML = "Ninguno Por Ahora";
            }

            preComida = pComida.innerHTML.split("$");
            preComida = preComida[1];
            preSnack = pSnack.innerHTML.split("$");
            preSnack = preSnack[1];
            preRefresco = pRefresco.innerHTML.split("$");
            preRefresco = preRefresco[1];

            pTotal = parseFloat(preComida) + parseFloat(preSnack) + parseFloat(preRefresco);
            <?php if($_SESSION['id_tipo'] == 5){ ?>
                pTotal = pTotal + (pTotal * 0.20);
            <?php } else if($_SESSION['id_tipo'] == 4){ ?>
                pTotal = pTotal - (pTotal * 0.20);
            <?php } else {} ?>
            pTotal = parseFloat(pTotal).toFixed(2);
            document.getElementById('pTotal').innerHTML = "$" + pTotal;
            document.formHacerPedido.PTotal.value = pTotal;

        }

        function SelectRefresco() {

            document.formHacerPedido.Refresco2.value = document.proPedido.Refresco.value;

            var sinRefresco = document.getElementById('sinRefresco');
            var pRefresco = document.getElementById('pRefresco');
            Number(pRefresco).toFixed(2);

            var refresco = document.getElementById("Refresco");
            var selected = refresco.options[refresco.selectedIndex].text;
            var seHizo = false;
            var precio = cero;

            sinRefresco.innerHTML = selected;

            for (x = 0; x < n; x++) {

                if (selected == arrayNomProducto[x]) {
                    pRefresco.innerHTML = "$" + parseFloat(arrayCostoProducto[x]).toFixed(2);
                    fotoDeRefresco.src = "../Imagenes/" + arrayFotoProducto[x];
                    nombreDeRefresco.innerHTML = arrayNomProducto[x];
                    seHizo = true;
                }

            }

            var pComida = document.getElementById('pComida');
            var pSnack = document.getElementById('pSnack');

            if (!seHizo) {
                pRefresco.innerHTML = "$" + cero;
                fotoDeRefresco.src = "../Imagenes/refrescoIcono.png";
                nombreDeRefresco.innerHTML = "Ninguno Por Ahora";
            }

            preComida = pComida.innerHTML.split("$");
            preComida = preComida[1];
            preSnack = pSnack.innerHTML.split("$");
            preSnack = preSnack[1];
            preRefresco = pRefresco.innerHTML.split("$");
            preRefresco = preRefresco[1];

            pTotal = parseFloat(preComida) + parseFloat(preSnack) + parseFloat(preRefresco);
            <?php if($_SESSION['id_tipo'] == 5){ ?>
                pTotal = pTotal + (pTotal * 0.20);
            <?php } else if($_SESSION['id_tipo'] == 4){ ?>
                pTotal = pTotal - (pTotal * 0.20);
            <?php } else {} ?>
            pTotal = parseFloat(pTotal).toFixed(2)
            document.getElementById('pTotal').innerHTML = "$" + pTotal;
            document.formHacerPedido.PTotal.value = pTotal;

        }

        function pagar(x) {
            if(x==0){
                document.querySelector('.popup-wrapperPagar').style.display = 'block';
            } else {
                document.querySelector('.popup-wrapperPagar').style.display = 'none';
                document.querySelector('.popup-wrapper').style.display = 'block';
            }
        }

        function esconder(x) {
            if (x == 0) {
                document.querySelector('.popup-wrapperPagar').style.display = 'none';
            } else {
                document.querySelector('.popup-wrapper').style.display = 'none';
                document.querySelector('.popup-wrapperPagar').style.display = 'block';
            }
        }

        function comprar(x){
            if(x==1){
                Compra = true;
            }
        }

        function comprarSiempre(){
            return Compra;
        }

    </script>

    <div class="headimg">
        <div class="TituloCompleto">
            <h1>Cafeter??as UTP</h1>
        </div>

    </div>
    <div class="NoticiasMenu">
        <div class="Noticias" style="margin-left: 5%;">
            <div class="Snacks">
                <div class="HacerPedido hp">
                    <h2 class="NombreCafeteria">Formulario Del Pedido:</h2>
                </div>
                <form name="proPedido" id="proPedido" enctype="multipart/form-data" class="OpcionesPedido" method="POST" action="">
                    <div class="formPedido">
                        <div>
                            <h3>Cafeter??a:</h3>
                            <select name="Cafeteria" id="Cafeteria" onchange="SelectCafeteria()">
                                <option value="NULL" disabled selected>Selecciona Una Cafeteria</option>
                                <?php while ($cafeteria = $consultarCafeteria->fetch(PDO::FETCH_OBJ)) { ?>
                                    <option value="<?php echo $cafeteria->id_cafeteria; ?>"><?php echo $cafeteria->nombre; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <h3>Men??:</h3>
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
                    <table class="styled-table hacer-pedido"  >
                        <thead>
                            <tr>
                                <th>Art??culos</th>
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
                <div class="HacerPedido hp">
                    <h2 class="NombreCafeteria">Resumen Del Pedido:</h2>
                </div>
                <div class="ComidasDeCafeterias">
                    <div class="card">
                        <h2 class="proTitulo">Comida:</h2>
                        <img id="fotoDeComida" src="../Imagenes/comidaIcono.png" class="FotoComida imgComidas" alt="Comida1" width="65%" height="65%">
                        <div class="ComidasMenu">
                            <h4 class="h3Titulo"><b id="nombreDeComida">Ninguno Por Ahora</b></h4>
                        </div>
                    </div>
                    <div class="card">
                        <h2 class="proTitulo">Snack:</h2>
                        <img id="fotoDeSnack" src="../Imagenes/snackIcono.png" class="FotoComida imgComidas" alt="Comida1" width="65%" height="65%">
                        <div class="ComidasMenu">
                            <h4 class="h3Titulo"><b id="nombreDeSnack">Ninguno Por Ahora</b></h4>
                        </div>
                    </div>
                    <div class="card">
                        <h2 class="proTitulo">Refresco:</h2>
                        <img id="fotoDeRefresco" src="../Imagenes/refrescoIcono.png" class="FotoComida imgComidas" alt="Comida1" width="65%" height="65%">
                        <div class="ComidasMenu">
                            <h4 class="h3Titulo"><b id="nombreDeRefresco">Ninguno Por Ahora</b></h4>
                        </div>
                    </div>
                </div>
                <div class="PagarCancelar fhp" id="formHacerPedido">
                    <button class="botones"><a href="paginaPrincipal.php">Cancelar</a></button>
                    <button class="botones" onclick="pagar(0)"><a>Confirmar</a></button>
                </div>
                <form class="popup-wrapperPagar" onsubmit="return comprarSiempre()">
                    <div class="popupPagar">
                        <div style="margin: -0.15% -10% 0 0;" class="popup-closePagar" onclick="esconder(0)">x</div>
                        <div class="popup-contentPagar">
                            <h3>Ingrese los datos de su tarjeta de cr??dito:</h3>
                            <div class="divTarjetas">
                                <div class="divImg dI1">
                                    <h4>Tarjetas De Cr??dito</h4>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Former_Visa_%28company%29_logo.svg/288px-Former_Visa_%28company%29_logo.svg.png" alt="Visa" width="15%" height="15%">
                                    <img src="https://logos-marcas.com/wp-content/uploads/2020/09/MasterCard-Logotipo-1979-1990.jpg" alt="Master Card" width="15%" height="15%">
                                </div>
                                <div class="divImg dI2">
                                    <h4>Tarjetas De D??bito</h4>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Banesco_logo.gif" alt="Banesco" width="20%" height="20%">
                                    <img src="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/logos/bbva-logo-900x269.png" alt="BBVA" width="20%" height="20%">
                                    <img src="https://pbs.twimg.com/media/Ddu5jJpVwAAvF3O.jpg" alt="Banco General" width="20%" height="20%">
                                </div>
                            </div>
                            <div class="datosTarjeta">
                                <div class="tarjetaIzquierda">
                                    <h5>Nombre Del Titular</h5>
                                    <i><input type="text" style="width: 100%;" placeholder="Como aparece en la tarjeta" required></i>
                                    <h5>Fecha De Expiraci??n</h5>
                                    <div>
                                        <input type="number" style="margin-right: 19%" min="01" step="1" max="12" placeholder="Mes" required>
                                        <input type="number" style="margin-left: 19%" min="2021" step="1" max="2030" placeholder="A??o" required>
                                    </div>
                                </div>

                                <div class="tarjetaIzquierda">
                                    <h5>N??mero De Tarjeta</h5>
                                    <i><input type="password" style="width: 100%;" placeholder="XXXX-XXXX-XXXX-XXXX" required></i>
                                    <h5>C??digo De Seguridad</h5>
                                    <div style="display: flex; align-items: center;">
                                        <input type="password" placeholder="3 d??gitos" maxlength="3" required>
                                        <img style="margin: 0 0 0 10%;" src="data:image/png;base64,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" alt="Ejemplo de tarjeta de cr??dito" width="30%" height="30%">
                                    </div>
                                </div>

                            </div>
                            <button class="botones" onclick="esconder(0), comprar(0)"><a>Cancelar</a></button>
                            <button class="botones" onclick="pagar(1), comprar(0)"><a>Confirmar</a></button>
                        </div>
                    </div>
                </form>
                <div class="popup-wrapper">
                    <div class="popup">
                        <div style="margin: 1% -10% 0 0;" class="popup-close" onclick="esconder(1)">x</div>
                        <form class="popup-content fhp" name="formHacerPedido" action="../Procesos/registrarPedido.php" method="POST" onsubmit="return comprarSiempre()">
                            <input type="hidden" value="<?php echo $_SESSION['id_usuario']?>" name="id_usuario">
                            <input type="hidden" value="" name="Id_Cafeteria2">
                            <input type="hidden" value="" name="Menu2">
                            <input type="hidden" value="" name="Snack2">
                            <input type="hidden" value="" name="Refresco2">
                            <input type="hidden" value="" name="PTotal">
                            <h3>??Est?? seguro de hacer la compra?</h3>
                            <button onclick="esconder(1), comprar(0)" class="botones confirmarCompra"><a>No</a></button>
                            <input type="submit" value="S??" class="botones confirmarCompra" onclick="comprar(1)">
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