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
        <h2 style="text-align: center;">Número identificador de su último pedido: <strong>0012012</strong></h2>
        <main class="contenedor">

<div class="parent">
        <div class="div1"> 
<p>Combo del dia</p>
        <div class="combos">
          

            <?php $consultarCombo = $datos->query("SELECT nombre_combo, COUNT(c.id_producto), c.costo, p.foto
                                                    FROM combo c INNER JOIN producto p ON c.id_producto=p.id_producto
                                                    WHERE p.tipo_producto = 'Comida'
                                                    GROUP BY nombre_combo
                                                    ORDER BY id_cafeteria ASC, id_combo ASC");

                  $combos = 0; $nombreCombo1 = ""; $nombreCombo2 = "";   ?>



            <div class="ComidasDeCafeterias">
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
                            <h4 class="h3Titulo"><b><?php echo $combo->nombre_combo; ?></b></h4> 
                            <h4 class="Precio"><?php echo $combo->costo; ?></h4> 
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
        </div>

        
        <div class="div2">
        <p>Comidas</p>
        <div class="ComidasDeCafeterias">
                        <div class="card">
                            <img src="../Imagenes/arrozConPollo.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Arroz Con Pollo</b></h4> 
                                <h4 class="Precio">$1.25</h4> 
                            </div>
                        </div>
                        <div class="card">
                            <img src="../Imagenes/Comida1.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Macarrones</b></h4> 
                                <h4 class="Precio">$1.25</h4> 
                            </div>
                        </div>
                        <div class="card">
                            <img src="../Imagenes/arrozPescadoEnsalada.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Arroz Con Pescado Y Ensalada</b></h4> 
                                <h4 class="Precio">$1.25</h4> 
                            </div>
                        </div>
                    </div>
                    <div class="ComidasDeCafeterias">
                        <div class="card">
                            <img src="../Imagenes/coditosConSalchicha.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Coditos Con Salchichas</b></h4> 
                                <h4 class="Precio">$1.25</h4> 
                            </div>
                        </div>
                        <div class="card">
                            <img src="../Imagenes/arrozConLentejasYCarne.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Arroz Con Lentejas Y Carne</b></h4> 
                                <h4 class="Precio">$1.25</h4> 
                            </div>
                        </div>
                        <div class="card">
                            <img src="../Imagenes/arrozConSalchichaGuisada.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Arroz Con Salchichas Guisadas</b></h4> 
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
                                <h4 class="h3Titulo"><b>Snickers</b></h4> 
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
                                <h4 class="h3Titulo"><b>Galleta María</b></h4> 
                                <h4 class="Precio">$1.25</h4> 
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
                                <h4 class="h3Titulo"><b>Agua</b></h4> 
                                <h4 class="Precio">$0.75</h4> 
                            </div>
                        </div>
                        <div class="card">
                            <img src="../Imagenes/jugoDelMonte.jpg" class="FotoComida" alt="Comida1" width="65%" height="65%">
                            <div class="ComidasMenu">
                                <h4 class="h3Titulo"><b>Jugo Del Monte</b></h4> 
                                <h4 class="Precio">$1.50</h4> 
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
    
    </div>
        </div>

        </main>
        <div class="footer">
            <img src="https://yt3.ggpht.com/Y1L8TzdsdTe30KxXrueVXL8N5W9CL3JCR0oiFtlieiTJ4p24mMiDYRNHHuS9nPawWz1vEFO0BZY=s900-c-k-c0x00ffffff-no-rj" alt="UTP Logo" width="6%" height="6%">
            <h3>
                Universidad Tecnológica de Panamá - 2021<br>
                Dirección: Avenida Universidad Tecnológica de Panamá, Vía Puente Centenario,<br>
                Campus Metropolitano Víctor Levi Sasso.<br>
                Teléfono. (507) 560-3000<br>
                Correo electrónico: buzondesugerencias@utp.ac.pa<br>
                311 Centro de Atención Ciudadana<br>
                Políticas de Privacidad<br>
            </h3>
            <div class="footerP1">
                <a href="">Matrícula UTP</a><br>
                <a href="">Correo UTP</a><br>
                <a href="">Biblioteca UTP</a><br>
                <a href="">Publicaciones</a><br>
                <a href="">Sala De Prensa</a><br>
                <a href="">Bolsa De Trabajo</a><br>
                <a href="">Acreditación</a><br>
                <a href="">Centro De Lenguas</a><br>
            </div>
            <div class="footerP2">
                <a href="">Mapa De Ubicación</a><br>
                <a href="">Mapa Del Sitio</a><br>
                <a href="">Directorio Telefónico</a><br>
                <a href="">Contáctenos</a><br>
                <a href="">Identidad Visual</a><br>
            </div>
        </div>
        <script type="text/javascript" src="../JavaScript/complementos.js"></script>
        <script src="../JavaScript/"></script>
        <script src="../JavaScript/app2.js"></script>
    </body>
</html>