<!DOCTYPE html>
<html>
    <head>
        <title>Página Principal</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
        <link rel="stylesheet" href="../Css/footerHeader.Css">
        <link rel="stylesheet" href="../Css/drpdwn.css">
        <link rel="stylesheet" href="../Css/normalice.css">
        <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg" />
    </head>
    <body>

    <div class="headerphp">
        <?php require('header.php'); ?>
    </div>

        <div class="CafCentral" id="CafCentral">
            <h1 id="nameCafe" class="NomCafeteria">Cafetería Central</h1>   
            <img id="imgCafe" src="../Imagenes/CafeteriaCentral.jpg" alt="Cafetería Central" width="25%" height="25%">
            <h1 class="NomCafeteria">Turno Vespertino</h1>
        </div>
        <!-- <div class="CafEdi1PB" id="CafEdi1PB" style="display: none;">
            <h1 class="NomCafeteria">Cafetería Del Edificio 1 - Planta Baja</h1>   
            <img src="../Imagenes/CafeteriaEdi1PB.PNG" alt="Cafetería Central" width="25%" height="25%">
        </div>
        <div class="CafEdi1P2" id="CafEdi1P2" style="display: none;">
            <h1 class="NomCafeteria">Cafetería Del Edificio 1 - Piso 2</h1>   
            <img src="../Imagenes/CafeteriaEdi1P2.PNG" alt="Cafetería Central" width="25%" height="25%">
        </div> -->
        <div class="radios">
            <input type="radio" id="cafeteria1" name="cafet" onclick="Cual(1)" checked>
            <input type="radio" id="cafeteria2" name="cafet" onclick="Cual(2)">
            <input type="radio" id="cafeteria3" name="cafet" onclick="Cual(3)">
            <input type="radio" id="cafeteria4" name="cafet" onclick="Cual(4)">
        </div>

        <?php $idPedido = $datos->query("SELECT id_orden FROM orden
                                         WHERE id_usuario = 1 AND created_at = (SELECT MAX(created_at) FROM orden WHERE id_usuario = 1)"); ?>

        <div style="padding: 1.5%; display: flex; justify-content: space-around;">
            <?php while($pedido = $idPedido->fetch(PDO::FETCH_OBJ)){ ?>
            <h2 style="text-align: center;">Número identificador de su último pedido: <strong><?php echo $pedido->id_orden; ?></strong></h2>
            <?php } ?>
            <a href="" class="btnHacerPedido" style="margin: -0.5% 0 0 0;"><h2 style="color: white">Hacer Pedido</h2></a>
        </div>
        <main class="contenedor">

        <div class="parent">

        <div class="div1"> 
            <p>Combos Del Dia</p>
            <div class="combos">  

                <?php $consultarCombo = $datos->query("SELECT nombre_combo, COUNT(c.id_producto), c.costo, p.foto
                                                        FROM combo c INNER JOIN producto p ON c.id_producto=p.id_producto
                                                        WHERE p.tipo_producto = 'Comida'
                                                        GROUP BY nombre_combo
                                                        ORDER BY id_cafeteria ASC, id_combo ASC");

                    $combos = 0; $nombreCombo1 = ""; $nombreCombo2 = "";   ?>



                <div class="soloCuatro">
                    <?php while($combo = $consultarCombo->fetch(PDO::FETCH_OBJ)){ if($nombreCombo1 != $combo->nombre_combo){ $combos = $combos + 1; $nombreCombo1 = $combo->nombre_combo; ?>
                    <div class="card" value="<?php echo $combo->id_cafeteria?>">
                        <div>
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
                                <h4 class="comidas-titulo"><b><?php echo $combo->nombre_combo; ?></b></h4> 
                                <h4 class="Precio"><?php echo $combo->costo; ?></h4> 
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>

        <div class="div2" style="margin-left: 1%;">

        <p>Comidas</p>
            <div class="ComidasDeCafeterias">
                <div class="card">
                    <img src="../Imagenes/arrozConPollo.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                    <div class="ComidasMenu">
                        <h4 class="comidas-titulo"><b>Arroz Con Pollo</b></h4> 
                        <h4 class="Precio">$1.25</h4> 
                    </div>
                </div>
                <div class="card">
                    <img src="../Imagenes/Comida1.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                    <div class="ComidasMenu">
                        <h4 class="comidas-titulo"><b>Macarrones</b></h4> 
                        <h4 class="Precio">$1.25</h4> 
                    </div>
                </div>
                <div class="card">
                    <img src="../Imagenes/arrozPescadoEnsalada.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                    <div class="ComidasMenu">
                        <h4 class="comidas-titulo"><b>Arroz Con Pescado Y Ensalada</b></h4> 
                        <h4 class="Precio">$1.25</h4> 
                    </div>
                </div>
            </div>
            <div class="ComidasDeCafeterias">
                <div class="card">
                    <img src="../Imagenes/coditosConSalchicha.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                    <div class="ComidasMenu">
                        <h4 class="comidas-titulo"><b>Coditos Con Salchichas</b></h4> 
                        <h4 class="Precio">$1.25</h4> 
                    </div>
                </div>
                <div class="card">
                    <img src="../Imagenes/arrozConLentejasYCarne.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                    <div class="ComidasMenu">
                        <h4 class="comidas-titulo"><b>Arroz Con Lentejas Y Carne</b></h4> 
                        <h4 class="Precio">$1.25</h4> 
                    </div>
                </div>
                <div class="card">
                    <img src="../Imagenes/arrozConSalchichaGuisada.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                    <div class="ComidasMenu">
                        <h4 class="comidas-titulo"><b>Arroz Con Salchichas Guisadas</b></h4> 
                        <h4 class="Precio">$1.25</h4> 
                    </div>
                </div>
            </div>             
        </div>
        <div class="div3">
        <p>Snacks</p>
        <div class="ComidasDeCafeterias">
            <div class="card">
                <img src="../Imagenes/snickers.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                <div class="ComidasMenu">
                    <h4 class="comidas-titulo"><b>Snickers</b></h4> 
                    <h4 class="Precio">$1.25</h4> 
                </div>
            </div>
            <div class="card">
                <img src="../Imagenes/galletaSaltine.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                <div class="ComidasMenu">
                    <h4 class="h3Titulo"><b>Galleta Saltine</b></h4> 
                    <h4 class="Precio">$1.25</h4> 
                </div>
            </div>
            <div class="card">
                <img src="../Imagenes/galletaMaria.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                <div class="ComidasMenu">
                    <h4 class="comidas-titulo"><b>Galleta María</b></h4> 
                    <h4 class="comidas-titulo">$1.25</h4> 
                </div>
            </div>
        </div>        
    
    </div>
        <div class="div4">
        <p>Refrescos</p>
        <div class="ComidasDeCafeterias">
            <div class="card">
                <img src="../Imagenes/botellaDeAgua.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                <div class="ComidasMenu">
                    <h4 class="comidas-titulo"><b>Agua</b></h4> 
                    <h4 class="comidas-titulo">$0.75</h4> 
                </div>
            </div>
            <div class="card">
                <img src="../Imagenes/jugoDelMonte.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                <div class="ComidasMenu">
                    <h4 class="comidas-titulo"><b>Jugo Del Monte</b></h4> 
                    <h4 class="Precio">$1.50</h4> 
                </div>
            </div>
            <div class="card">
                <img src="../Imagenes/maltaVigor.png" class="FotoComida" alt="Comida1" width="65%" height="65%">
                <div class="ComidasMenu">
                    <h4 class="comidas-titulo"><b>Malta Vigor</b></h4> 
                    <h4 class="Precio">$1.00</h4> 
                </div>
            </div>
        </div>        
    </div>
        </div>

        </main>
        
        <?php require('footer.html'); ?>

        <script type="text/javascript" src="../JavaScript/complementos.js"></script>
        <script src="../JavaScript/app2.js"></script>
    </body>
</html>