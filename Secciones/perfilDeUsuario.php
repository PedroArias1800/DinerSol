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


    
    <title>DinerSol | Perfil</title>
</head>
<body>
    
    <div class="headerphp">
        <?php require('header.php'); ?>
    </div>

   

    <!-- Seccion -->

    <!--Editar Perfil-->
    <div id="perfil" class="editar">
      <div class="usuarios usuarios--editar">
        <h2>Actualizar Usuario</h2>
      </div>
      <form action="../Procesos/actualizarPerfil.php" method="POST" enctype="multipart/form-data">
        <div class="block-component">
          <span class="outline">
            <img class="outline-img" src="../Imagenes/<?php echo  $datosDelUsuario->foto; ?>" />
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

          <p class="presForm" onclick="cambiarForm(1)">Cambiar Contraseña</p>
      </form>
    </div>

    <!--Cambiar Contraseña-->
    <div id="contraseña" class="editar invisible">
      <div class="usuarios usuarios--editar">
        <h2>Cambiar Contraseña</h2>
        <p>Para cambiar la contraseña primero debe ingresar la contraseña actual seguido de la nueva contraseña.</p>
      </div>
      <form action="../Procesos/actualizarContraseña.php" method="POST">
        
        <div class="user password">
          <span class="icon uil uil-lock-open-alt"></span>
          <input class="user  input-style" type="password" name="contraA" id="contraA" required placeholder="Contraseña actual">
        </div>
        <div class="container-password">
          <p class="error" id="errorPass1"></p>
          <div class="user password">
            <span class="icon uil uil-lock-alt"></span>
            <input class=" user input-style" type="password" name="contra1" id="contra1" required placeholder="Nueva contraseña">
          </div>
        </div>
        
        <div id="container-password">
          <p class="error" id="errorPass2"></p>
          <div class="user password">
            <span class="icon uil uil-lock-alt"></span>
            <input class=" user input-style" type="password" name="contra2" id="contra2" required placeholder="Confirmar contraseña">
          </div>
        </div>
        
        <div class="submit">
          <button type="submit">Actualizar</button>
        </div>

        <a class="presForm link" href="">¿Olvidaste tu contraseña?</a>
        <h3 class="presForm" onclick="cambiarForm(2)">Actualizar Perfil</h3>
      </form>
    </div>
   

    <br><hr><br>
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
            echo $datosDelUsuario->nombre;
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
</body>
</html>