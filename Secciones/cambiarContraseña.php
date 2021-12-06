<?php
    include("../Config/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Css/footerHeader.css">
        <link rel="stylesheet" href="../Css/login.css">
        <link rel="stylesheet" href="../css/registrarse.css">
        <link rel="stylesheet" href="../css/normalice.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg" />
        <title>DinerSol | Cambiar Contraseña</title>
    </head>
    <body>
        <div class="header">
            <img src="https://yt3.ggpht.com/Y1L8TzdsdTe30KxXrueVXL8N5W9CL3JCR0oiFtlieiTJ4p24mMiDYRNHHuS9nPawWz1vEFO0BZY=s900-c-k-c0x00ffffff-no-rj" alt="UTP Logo" width="6%" height="6%">
            <div>
                <h3>Universidad Tecnológica De Panamá</h3>
                <h1>DinerSol - Sistema De Cafeterías UTP</h1>
            </div>
        </div>
        <div class="todo">
            <?php
                if(isset($_GET['h']) && isset($_GET['e'])){
                    $hash = $_REQUEST['h'];
                    $email = $_REQUEST['e'];
                    
                    date_default_timezone_set('America/Panama');
                    $limite = date('Y-m-d H:i:s');
            
                    $resultado = $datos->query("SELECT hash, fecha_hash FROM usuario WHERE email='$email'");
                    $resultado->setFetchMode(PDO::FETCH_ASSOC);

                    $resultado->execute();
                    $row = $resultado->fetch();

                    if($hash == $row['hash']){
                        if($limite < $row['fecha_hash']){
            ?>
                            <form method="POST" action="../Procesos/actualizarContraseña.php">
                                <div class="column">            
                                    <div class=" user password">
                                        <span class="icon uil uil-lock-open-alt"></span>
                                        <input class=" user input-style" id="contra1" type="password" name="contra1" placeholder="Contraseña" required>
                                    </div>
                                    <div class=" user password">
                                        <span class="icon uil uil-lock-open-alt"></span>
                                        <input class=" user input-style" id="contra2" type="password" name="contra2" placeholder="Repetir Contraseña" required>
                                    </div>
                                </div>
    
                                <input type="hidden" name="hash" value="<?php echo $hash ?>">
                                <input type="hidden" name="email" value="<?php echo $email ?>">
    
                                <button class="submit" type="submit">Confirmar</button>
                            </form>
            <?php
                        }else
                            echo '<meta http-equiv="refresh" content="0; url=../Procesos/eliminarHash.php?e='.$email.'">';
                    }else{
            ?>
                        <div class="caducado">
                            <p>Lo sentimos este enlace ya caduco.</p>;
                        </div>
            <?php
                    }
                }else{
            ?>
                        <div class="caducado">
            <?php
                            if(isset($_GET['msg']))
                                echo $_GET['msg'];
                            else
                                echo '<p>Lo sentimos este enlace ya caduco.</p>';
            ?>
                            <a href="../index.php">Volver al inicio</a>
                        </div>
            <?php
                }
            ?>
                    
                    
            
        </div><br>
        <footer>
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
        </footer>
        <script type="text/javascript" src="../JavaScript/complementos.js"></script>
    </body>
</html>