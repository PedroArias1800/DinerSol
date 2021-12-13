<!DOCTYPE html>
<html>
    <head>
        <title>Página Principal</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
        <link rel="stylesheet" href="../Css/footerHeader.Css">
        <link rel="stylesheet" href="../Css/drpdwn.css">
        <link rel="stylesheet" href="../Css/normalice.css">
        <link rel="stylesheet" href="../Css/popup.css">
        <link rel="stylesheet" href="../Css/flickity-docs.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg"/>
    </head>
    <body>

    <div class="headerphp">
        <?php require('header.php'); ?>
    </div>

      
        <!-- <div class="CafEdi1PB" id="CafEdi1PB" style="display: none;">
            <h1 class="NomCafeteria">Cafetería Del Edificio 1 - Planta Baja</h1>   
            <img src="../Imagenes/CafeteriaEdi1PB.PNG" alt="Cafetería Central" width="25%" height="25%">
        </div>
        <div class="CafEdi1P2" id="CafEdi1P2" style="display: none;">
            <h1 class="NomCafeteria">Cafetería Del Edificio 1 - Piso 2</h1>   
            <img src="../Imagenes/CafeteriaEdi1P2.PNG" alt="Cafetería Central" width="25%" height="25%">
        </div> -->

        <?php
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
        $difference = date_diff($variable, $variable1)->format("Difference => %Y years, %m months, %d days, %h hours, and %i minutes");?>

        <div class="gallery js-flickity carousel" data-flickity='{ "autoPlay": true, "fade": 1500 }'>
            <div class="divCarousel">
                <h1 class="pH1">Cafetería Central</h1>
                <img class="imga" src="../Imagenes/cafcentral.jpg" alt="Cafeteria Central">
                <h1 class="sH1">Turno:<br><?php echo $nomTurno;?></h1>
            </div>
            <div class="divCarousel">
                <h1 class="pH1">Cafetería FISC</h1>
            <img class="imga" src="../Imagenes/CafeteriaCentral.jpg" alt="Cafeteria FISC">
                <h1 class="sH1">Turno:<br><?php echo $nomTurno;?></h1>
            </div>
            <div class="divCarousel">
                <h1 class="pH1">Cafetería Edificio #1 P2</h1>
            <img class="imga" src="../Imagenes/CafeteriaEdi1P2.PNG" alt="Cafeteria Edificio #1 P2">
                <h1 class="sH1">Turno:<br><?php echo $nomTurno;?></h1>
            </div>
            <div class="divCarousel">
                <h1 class="pH1">Cafetería Edificio #1 PB</h1>
            <img class="imga" src="../Imagenes/CafeteriaEdi1PB.PNG" alt="Cafeteria Edificio #1 PB"> 
                <h1 class="sH1">Turno:<br><?php echo $nomTurno;?></h1>
            </div>
        </div>

        <div style="text-align: center; margin: 2% 0 -1% 0;">
            <p class="merror" style="color: #fc6e6e"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
            <p class="merror" style="color: #51034f"><?php if(isset($_GET['exito'])) echo $_GET['exito']; ?></p>
        </div>

        <?php $idPedido = $datos->query("SELECT id_orden, created_at FROM orden
                                         WHERE id_usuario = '$datosDelUsuario->id_usuario' AND created_at = (SELECT MAX(created_at) FROM orden WHERE id_usuario = '$datosDelUsuario->id_usuario')"); ?>

        <div class="pedido" style="padding: 1.5%; display: flex; justify-content: space-around;">
            <?php while($pedido = $idPedido->fetch(PDO::FETCH_OBJ)){ ?>
            <h2 class="h2">Número identificador de su último pedido: <strong><?php echo $pedido->id_orden; ?></strong></h2>
            <?php 
                $fecha = explode(" ",$pedido->created_at);
                if($fecha[0] == date("Y-m-d")){
                    if(($turno == 1 && $fecha[1] > '06:35:00' && $fecha[1] < '11:50:00') || ($turno == 2 && $fecha[1] > '11:50:00' && $fecha[1] < '17:35:00') || ($turno == 3 && $fecha[1] > '17:35:00' && $fecha[1] < '21:50:00') || $turno == 0){
                        $dejarComprar = "No";
                    }
                } 
            } ?>

            <button class="btnHacerPedido" onclick="window.location.href='hacerPedido.php'" <?php if($dejarComprar == "No"){ ?> disabled style="display: none;" <?php } ?>>Hacer Pedido <?php  echo $variable->format('H:i:s'); ?></button>
        
        </div>

        <?php if($dejarComprar == "No"){ ?>
            <div style="text-align: center; margin: 0 0 2% 0;">
                <p class="merror" style="color: #fc6e6e"><?php echo "No puede hacer más pedidos en lo que resta del turno" ?></p>
            </div> 
        <?php } ?>

        <main class="contenedor">

        <div class="parent">

        <div class="div1"> 
            <p>Combos Del Dia</p>
            <div class="combos">  

                <?php $consultarCombo = $datos->query("SELECT id_combo, nombre_combo, COUNT(c.id_producto), c.costo, p.foto, c.id_cafeteria, ca.nombre 
                                                        FROM combo c INNER JOIN producto p ON c.id_producto=p.id_producto
                                                                     INNER JOIN cafeteria ca ON c.id_cafeteria = ca.id_cafeteria
                                                        WHERE p.tipo_producto = 'Comida' AND c.inventario > 0
                                                        GROUP BY nombre_combo
                                                        ORDER BY id_cafeteria ASC, id_combo ASC");

                    $combos = 0; $nombreCombo1 = ""; $nombreCombo2 = ""; $precio = 0;  ?>

                <div class="soloCuatro verCombos">
                    <?php $hay = 0;
                        while($combo = $consultarCombo->fetch(PDO::FETCH_OBJ)){ if($nombreCombo1 != $combo->nombre_combo){ $combos = $combos + 1; $nombreCombo1 = $combo->nombre_combo; ?>
                    <div class="card" value="<?php echo $combo->id_cafeteria; ?>" name="ComboCaf<?php echo $combo->id_cafeteria; ?>">
                        <div>
                            <div class="verCombo">
                                <button value="<?php echo $combo->id_combo; ?>" onclick="pagar(0), idCombo(<?php echo $combo->id_combo;?>)"><a>Comprar</a></button>
                            </div>
                            <img src="../Imagenes/arrozConPollo.jpg" class="FotoComida" alt="Comida1" width="5%" height="5%">
                            <div style="display: flex; justify-content: space-between; margin-top: -33.8%; margin-left: 0.5%; width: 94.5%">
                                <?php 
                                        $consultarDatosCombo = $datos->query("SELECT p.foto
                                                                                FROM combo c INNER JOIN producto p ON c.id_producto=p.id_producto
                                                                                WHERE p.tipo_producto != 'Comida' AND c.nombre_combo='$nombreCombo1'
                                                                                ORDER BY c.id_cafeteria ASC, c.id_combo ASC, p.tipo_producto ASC");

                                while($datosCombo = $consultarDatosCombo->fetch(PDO::FETCH_OBJ)){ ?>
                                    <img  src="../Imagenes/<?php echo $datosCombo->foto; ?>" style="width: 30%; height: 30%; border-radius: 0px 15px 15px 15px;" class="FotoComida" alt="Comida1">   
                                <?php } ?>
                            </div>
                            <div class="ComidasMenu">
                                <h4 class="comidas-titulo" style="margin: 5% 0 0 -1%;"><b><?php echo $combo->nombre_combo; ?></b></h4> 
                                <?php if($_SESSION['id_tipo'] == 5){
                                    $precio = $combo->costo + ($combo->costo * 0.20);
                                } else if($_SESSION['id_tipo'] == 4){
                                    $precio = $combo->costo - ($combo->costo * 0.20);
                                } else {
                                    $precio = $combo->costo;
                                } ?>
                                <h4 class="Precio"><?php echo "$".number_format($precio, 2); ?></h4>
                                <h4 class="comidas-titulo" style="margin: -5% 0 2% -5%;"><b><?php echo $combo->nombre; ?></b></h4> 
                            </div>
                        </div>
                    </div>
                    <?php } $hay = 1; } 
                    if($hay == 0){ ?>
                        <div class="verCombos">
                            <h2>Actualmente no hay combos disponibles...</h2>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div><br>

        <form class="popup-wrapperPagar" onsubmit="return comprarSiempre()">
            <div class="popupPagar">
                <div class="popup-closePagar" onclick="esconder(0)">x</div>
                <div class="popup-contentPagar">
                    <h3>Ingrese los datos de su tarjeta de crédito:</h3>
                    <div class="divTarjetas">
                        <div class="divImg dI1">
                            <h4>Tarjetas De Crédito</h4>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Former_Visa_%28company%29_logo.svg/288px-Former_Visa_%28company%29_logo.svg.png" alt="Visa" width="15%" height="15%">
                            <img src="https://logos-marcas.com/wp-content/uploads/2020/09/MasterCard-Logotipo-1979-1990.jpg" alt="Master Card" width="15%" height="15%">
                        </div>
                        <div class="divImg dI2">
                            <h4>Tarjetas De Débito</h4>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Banesco_logo.gif" alt="Banesco" width="20%" height="20%">
                            <img src="https://www.bbva.com/wp-content/themes/coronita-bbvacom/assets/images/logos/bbva-logo-900x269.png" alt="BBVA" width="20%" height="20%">
                            <img src="https://pbs.twimg.com/media/Ddu5jJpVwAAvF3O.jpg" alt="Banco General" width="20%" height="20%">
                        </div>
                    </div>
                    <div class="datosTarjeta">
                        <div class="tarjetaIzquierda">
                            <h5>Nombre Del Titular</h5>
                            <i><input type="text" style="width: 100%;" placeholder="Como aparece en la tarjeta" required></i>
                            <h5>Fecha De Expiración</h5>
                            <div>
                                <input type="number" style="margin-right: 19%" min="01" step="1" max="12" placeholder="Mes" required>
                                <input type="number" style="margin-left: 19%" min="2021" step="1" max="2030" placeholder="Año" required>
                            </div>
                        </div>

                        <div class="tarjetaIzquierda">
                            <h5>Número De Tarjeta</h5>
                            <i><input type="password" style="width: 100%;" placeholder="XXXX-XXXX-XXXX-XXXX" required></i>
                            <h5>Código De Seguridad</h5>
                            <div style="display: flex; align-items: center;">
                                <input type="password" placeholder="3 dígitos" maxlength="3" required>
                                <img style="margin: 0 0 0 10%;" src="data:image/png;base64,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" alt="Ejemplo de tarjeta de crédito" width="30%" height="30%">
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
                <div class="popup-close" onclick="esconder(1)">x</div>
                <form class="popup-content" name="formComprarCombo" action="../Procesos/comprarCombo.php" method="POST" onsubmit="return comprarSiempre()">
                    <input type="hidden" value="" name="idDelCombo">
                    <h3>¿Está seguro de hacer la compra?</h3>
                    <button onclick="esconder(1), comprar(0)" class="botones confirmarCompra"><a>No</a></button>
                    <input type="submit" value="Sí" class="botones confirmarCompra" onclick="comprar(1)">
                </form>
            </div>
        </div>

        <div class="div2" style="margin-left: 1%;">
            <p>Comidas</p>
            <div class="ComidasDeCafeterias">

            <?php $consultarComidas = $datos->query("SELECT p.nombre, p.costo, p.foto, c.id_cafeteria, m.id_menu
                                                    FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                                    INNER JOIN cafeteria c ON c.id_cafeteria = m.id_cafeteria
                                                                    INNER JOIN menu_turno mt ON mt.id_menu = m.id_menu
                                                                    INNER JOIN turno t ON mt.id_turno = t.id_turno
                                                    WHERE p.tipo_producto = 'Comida' AND inventario > 0 AND m.estado = 1 AND t.id_turno = '$turno'
                                                    ORDER BY c.id_cafeteria ASC, p.id_producto ASC");
            ?>

                <div class="soloTres1">
                <?php $hay = 0;
                    while($comida = $consultarComidas->fetch(PDO::FETCH_OBJ)){ ?>
                    <div class="card" value="<?php echo $comida->id_cafeteria; ?>">
                        <img src="../Imagenes/<?php echo $comida->foto; ?>" class="FotoComida" alt="Comida1" width="65%" height="65%">
                        <div class="ComidasMenu">
                            <h4 class="comidas-titulo" style="margin: 5% 0 0 -1%;"><b><?php echo $comida->nombre; ?></b></h4> 
                            <?php if($_SESSION['id_tipo'] == 5){
                                    $precio = $comida->costo + ($comida->costo * 0.20);
                                } else if($_SESSION['id_tipo'] == 4){
                                    $precio = $comida->costo - ($comida->costo * 0.20);
                                } else {
                                    $precio = $comida->costo;
                                } ?>
                            <h4 class="Precio"><?php echo "$".number_format($precio, 2); ?></h4> 
                        </div>
                    </div>
                <?php $hay = 1; } 
                if($hay == 0){ ?>
                <div>
                    <h2 style="font-size: 1.5vw">Actualmente no hay comidas disponibles...</h2>
                </div>
                <?php } ?>
                </div>
            </div>            
        </div>
        <div class="div3">
            <p>Snacks</p>
            <div class="ComidasDeCafeterias">

                <?php $consultarSnacks = $datos->query("SELECT p.nombre, p.costo, p.foto, c.id_cafeteria, m.id_menu
                                                            FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                                            INNER JOIN cafeteria c ON c.id_cafeteria = m.id_cafeteria
                                                                    INNER JOIN menu_turno mt ON mt.id_menu = m.id_menu
                                                                    INNER JOIN turno t ON mt.id_turno = t.id_turno
                                                            WHERE p.tipo_producto = 'Snack' AND inventario > 0 AND m.estado = 1 AND t.id_turno = '$turno'
                                                            ORDER BY c.id_cafeteria ASC, p.id_producto ASC");
                ?>

                <div class="soloTres2">
                    <?php $hay = 0;
                        while($snack = $consultarSnacks->fetch(PDO::FETCH_OBJ)){ ?>
                    <div class="card" value="<?php echo $snack->id_cafeteria; ?>">
                        <img src="../Imagenes/<?php echo $snack->foto; ?>" class="FotoComida" alt="Comida1" width="65%" height="65%">
                        <div class="ComidasMenu">
                            <h4 class="comidas-titulo" style="margin: 5% 0 0 -1%;"><b><?php echo $snack->nombre; ?></b></h4> 
                            <?php if($_SESSION['id_tipo'] == 5){
                                    $precio = $snack->costo + ($snack->costo * 0.20);
                                } else if($_SESSION['id_tipo'] == 4){
                                    $precio = $snack->costo - ($snack->costo * 0.20);
                                } else {
                                    $precio = $snack->costo;
                                } ?>
                            <h4 class="Precio"><?php echo "$".number_format($precio, 2); ?></h4>
                        </div>
                    </div>
                <?php $hay = 1; } 
                if($hay == 0){ ?>
                <div>
                    <h2 style="font-size: 1.5vw">Actualmente no hay snacks disponibles...</h2>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <div class="div4">
        <p>Refrescos</p>
        <div class="ComidasDeCafeterias">

            <?php $consultarRefrescos = $datos->query("SELECT p.nombre, p.costo, p.foto, c.id_cafeteria, m.id_menu
                                                            FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                                            INNER JOIN cafeteria c ON c.id_cafeteria = m.id_cafeteria
                                                                    INNER JOIN menu_turno mt ON mt.id_menu = m.id_menu
                                                                    INNER JOIN turno t ON mt.id_turno = t.id_turno
                                                            WHERE p.tipo_producto = 'Refresco' AND inventario > 0 AND m.estado = 1 AND t.id_turno = '$turno'
                                                            ORDER BY c.id_cafeteria ASC, p.id_producto ASC");            
            ?>

            <div class="solo2">
                <?php $hay = 0;
                    while($refresco = $consultarRefrescos->fetch(PDO::FETCH_OBJ)){ ?>
                <div class="card" value="<?php echo $refresco->id_cafeteria; ?>">
                    <img src="../Imagenes/<?php echo $refresco->foto; ?>" class="FotoComida" alt="Comida1" width="65%" height="65%">
                    <div class="ComidasMenu">
                        <h4 class="comidas-titulo" style="margin: 5% 0 0 -1%;"><b><?php echo $refresco->nombre; ?></b></h4> 
                        <?php if($_SESSION['id_tipo'] == 5){
                                $precio = $refresco->costo + ($refresco->costo * 0.20);
                            } else if($_SESSION['id_tipo'] == 4){
                                $precio = $refresco->costo - ($refresco->costo * 0.20);
                            } else {
                                $precio = $refresco->costo;
                            } ?>
                        <h4 class="Precio"><?php echo "$".number_format($precio, 2); ?></h4> 
                    </div>
                </div>
                <?php $hay = 1; } 
                if($hay == 0){ ?>
                <div>
                    <h2 style="font-size: 1.5vw">Actualmente no hay refrescos disponibles...</h2>
                </div>
                <?php } ?>
            </div>
        </div>        
    </div>
        </div>

        </main>
        
        <?php require('footer.html'); ?>

        <script>

            var Compra = false;

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

            function idCombo(x){
                document.formComprarCombo.idDelCombo.value = x;
            }

        </script>
        
        <script type="text/javascript" src="../JavaScript/complementos.js"></script>
        <script src="../JavaScript/app2.js"></script>
        <script src="../JavaScript/flickity-docs.min.js"></script>
    </body>
</html>