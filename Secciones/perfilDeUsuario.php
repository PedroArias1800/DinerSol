<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Perfil.css">
    <link rel="stylesheet" href="../Css/footerHeader.Css">
    <link rel="stylesheet" href="../Css/estadisticas.css">
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/normalice.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg"/>

    <title>DinerSol | Perfil</title>
</head>
<body>
    
    <div class="headerphp">
        <?php require('header.php'); ?>
    </div>

    <!-- Seccion -->

    <!--Editar Perfil-->
    <div id="perfil" class="editar <?php if(isset($_GET['msg'])) echo 'invisible'?>">
      <div class="usuarios usuarios--editar">
        <h2>Actualizar Usuario</h2>
      </div>
      <form action="../Procesos/actualizarPerfil.php" method="POST" enctype="multipart/form-data">
        <div class="block-component">
          <span class="outline">
            <img class="outline-img" src="../Imagenes/FotosDePerfil/<?php echo  $datosDelUsuario->foto; ?>" />
          </span>
        </div>

        <div class="user username">
          <span class="icon uil uil-user"></span>
          <input class="user  input-style" type="text" name="nombre" id="nombre" value="<?php echo  $datosDelUsuario->nombre; ?>" required>
        </div>
        <div class="user username">
          <span class="icon uil uil-user"></span>
          <input class=" user input-style" type="text" name="apellido" id="apellido" value="<?php echo $datosDelUsuario->apellido;  ?>" required>
        </div>
        <div class="user username">
          <span class="icon uil uil-phone"></span>
          <input class=" user input-style" type="text" name="telefono" id="telefono" value="<?php echo $datosDelUsuario->telefono;  ?>" required>
        </div>
        <div class="user disable username">
          <span class="icon disable uil uil-envelope-edit"></span>
          <input class="user disable  input-style" type="email" name="correo" id="correo" value="<?php echo $datosDelUsuario->email; ?>" required disabled>
        </div>

        <input name="ftpd" type="hidden" value="<?php echo  $datosDelUsuario->foto ?>"> </input>
        <input name="foto" type="file" accept="image/*" />

        <div class="submit">
          <button type="submit">Actualizar</button>
        </div>

          <p class="presForm" onclick="CambiarForm(1)">Cambiar Contrase??a</p>
      </form>
    </div>

    <!--Cambiar Contrase??a-->
    <div id="contrase??a" class="editar <?php if(!(isset($_GET['msg']))) echo 'invisible'?>">
      <div class="usuarios usuarios--editar">
        <h2>Cambiar Contrase??a</h2>
        <p>Para cambiar la contrase??a primero debe ingresar la contrase??a actual seguido de la nueva contrase??a.</p>

        <p> <?php if(isset($_GET['msg'])) echo $_GET['msg'];?> </p>
      </div>
      <form action="../Procesos/actualizarContrase??a.php" method="POST" onsubmit="return ValidarEnvio()">
        
        <div class="user password">
          <span class="icon uil uil-lock-open-alt"></span>
          <input class="user  input-style" type="password" name="contraA" id="contraA" required placeholder="Contrase??a actual">
        </div>
        <div class="container-password">
          <div class="user password" id="containerPass1">
            <span class="icon uil uil-lock-alt"></span>
            <input class=" user input-style" type="password" name="contra1" id="contra1" required placeholder="Nueva contrase??a">
          </div>
          <p class="error" id="errorPass1"></p>
        </div>
        
        <div id="container-password">
          <div class="user password" id="containerPass2">
            <span class="icon uil uil-lock-alt"></span>
            <input class=" user input-style" type="password" name="contra2" id="contra2" required placeholder="Confirmar contrase??a">
          </div>
          <p class="error" id="errorPass2"></p>
        </div>
        
        <div class="submit">
          <button type="submit" id="btnContrase??a">Actualizar</button>
        </div>

        <h3 class="presForm link" href=""> <a href="">??Olvidaste tu contrase??a?</a></h3>
        <h3 class="presForm" onclick="CambiarForm(2)">Actualizar Perfil</h3>
      </form>
    </div>
   

    <br><hr><br>
    <div class="footer">
        <img src="https://yt3.ggpht.com/Y1L8TzdsdTe30KxXrueVXL8N5W9CL3JCR0oiFtlieiTJ4p24mMiDYRNHHuS9nPawWz1vEFO0BZY=s900-c-k-c0x00ffffff-no-rj" alt="UTP Logo" width="6%" height="6%">
        <h3>
            Universidad Tecnol??gica de Panam?? - 2021<br>
            Direcci??n: Avenida Universidad Tecnol??gica de Panam??, V??a Puente Centenario,<br>
            Campus Metropolitano V??ctor Levi Sasso.<br>
            Tel??fono. (507) 560-3000<br>
            Correo electr??nico: buzondesugerencias@utp.ac.pa<br>
            311 Centro de Atenci??n Ciudadana<br>
            Pol??ticas de Privacidad<br> 
            echo $datosDelUsuario->nombre;
        </h3>
        <div class="footerP1">
            <a href="">Matr??cula UTP</a><br>
            <a href="">Correo UTP</a><br>
            <a href="">Biblioteca UTP</a><br>
            <a href="">Publicaciones</a><br>
            <a href="">Sala De Prensa</a><br>
            <a href="">Bolsa De Trabajo</a><br>
            <a href="">Acreditaci??n</a><br>
            <a href="">Centro De Lenguas</a><br>
        </div>
        <div class="footerP2">
            <a href="">Mapa De Ubicaci??n</a><br>
            <a href="">Mapa Del Sitio</a><br>
            <a href="">Directorio Telef??nico</a><br>
            <a href="">Cont??ctenos</a><br>
            <a href="">Identidad Visual</a><br>
        </div>
    </div>

    <script type="text/javascript" src="../JavaScript/complementos.js"></script>
</body>
</html>