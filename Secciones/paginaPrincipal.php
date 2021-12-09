<!DOCTYPE html>
<html>
    <head>
        <title>Página Principal</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
        <link rel="stylesheet" href="../Css/footerHeader.Css">
        <link rel="stylesheet" href="../Css/drpdwn.css">
        <link rel="stylesheet" href="../Css/normalice.css">
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

                <?php $consultarCombo = $datos->query("SELECT id_combo, nombre_combo, COUNT(c.id_producto), c.costo, p.foto, c.id_cafeteria
                                                        FROM combo c INNER JOIN producto p ON c.id_producto=p.id_producto
                                                        WHERE p.tipo_producto = 'Comida'
                                                        GROUP BY nombre_combo
                                                        ORDER BY id_cafeteria ASC, id_combo ASC");

                    $combos = 0; $nombreCombo1 = ""; $nombreCombo2 = "";   ?>

                <div class="soloCuatro verCombos">
                    <?php $hay = 0;
                        while($combo = $consultarCombo->fetch(PDO::FETCH_OBJ)){ if($nombreCombo1 != $combo->nombre_combo){ $combos = $combos + 1; $nombreCombo1 = $combo->nombre_combo; ?>
                    <div class="card" value="<?php echo $combo->id_cafeteria; ?>" name="ComboCaf<?php echo $combo->id_cafeteria; ?>">
                        <div>
                            <form class="verCombo" action="" method="POST">
                                <input type="hidden" value="<?php echo $combo->id_combo; ?>">
                                <input type="submit" value="Ver Combo">
                            </form>
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
                                <h4 class="Precio"><?php echo $combo->costo; ?></h4> 
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
                            <h4 class="comidas-titulo"><b><?php echo $comida->nombre; ?></b></h4> 
                            <h4 class="Precio"><?php echo $comida->costo; ?></h4> 
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
                            <h4 class="comidas-titulo"><b><?php echo $snack->nombre; ?></b></h4> 
                            <h4 class="Precio"><?php echo $snack->costo; ?></h4> 
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

            <div class="soloTres2">
                <?php $hay = 0;
                    while($refresco = $consultarRefrescos->fetch(PDO::FETCH_OBJ)){ ?>
                <div class="card" value="<?php echo $refresco->id_cafeteria; ?>">
                    <img src="../Imagenes/<?php echo $refresco->foto; ?>" class="FotoComida" alt="Comida1" width="65%" height="65%">
                    <div class="ComidasMenu">
                        <h4 class="comidas-titulo"><b><?php echo $refresco->nombre; ?></b></h4> 
                        <h4 class="comidas-titulo"><?php echo $refresco->costo; ?></h4> 
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
        
        <script type="text/javascript" src="../JavaScript/complementos.js"></script>
        <script src="../JavaScript/app2.js"></script>
        <script src="../JavaScript/flickity-docs.min.js"></script>
    </body>
</html>