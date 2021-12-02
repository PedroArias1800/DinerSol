
    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="Imagenes/logoUTP.jpg" />
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/normalice.css">
  <title>DinerSol | Iniciar Sesión</title>
</head>

<body>


  <div class="contenedor-estetica">

    <div class="imagen"></div>
    <div class="logear">
    <header class="header">
        <div class="utp">
          <img src="../imagenes/logo_utp_1_300.png" alt="">
        </div>
        <p class="p">Universidad Tecnologica de Panampá </p>
      
      
      </header>
<div class="title">
<h2 class="h2">Recuperar contraseña</h2>
      <a class="cuenta" href="../index.php">  Cuenta</a>
</div>
 

    <form method="POST" action="../Procesos/procesarSolicitud.php" class="from--recuperar">
             
                        <div class="msg">
                            <h4>Ingresa tu correo electronico y te enviaremos un enlace para que puedas recuperar el acceso a tu cuenta.</h4>
                            <?php
                                if(isset($_GET['msg']))
                                    echo $_GET['smg'];
                                elseif(isset($_GET['error']))
                                    echo $_GET['error'];
                            ?>
                        </div>

                        <div class="user-recuperar">
                            <span class="icon uil uil-envelope-edit"></span>                        
                            <input type="email" id="correo" name="correo" placeholder="usuario@ejemplo.com" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" maxlength="200" required>
                            <!--<label id="lblTel" for="telefono" hidden>Teléfono:</label><br>
                            <input type="tel" id="telefono" name="telefono" placeholder="Ej: 1111-1111" pattern="[0-9]{4}-[0-9]{4}" hidden required>-->
                        </div>
                        <p class="p">El proceso de recuperación de contraseñas puede tardar unos minutos...</p>
                        <div class="item">
                            <input type="reset" class="botones" value="Vaciar">
                            <input type="submit" class="botones" value="Recuperar">
                        </div>
                  
                </div>
            </form>
    </div>
  </div>
  <footer>
    <!-- FOOTER -->
  </footer>
  <script type="text/javascript" src="JavaScript/complementos.js"></script>
</body>

</html>
</html>