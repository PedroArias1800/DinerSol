<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="Imagenes/logoUTP.jpg" />
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/normalice.css">
  <title>DinerSol | Iniciar Sesión</title>
</head>

<body>


  <div class="contenedor-estetica">

    <div class="imagen"></div>
    <div class="logear">
      <header class="headr">
        <div class="utp">
          <img src="imagenes/logo_utp_1_300.png" alt="">
        </div>
        <p>Universidad Tecnologica de Panamá</p>
      </header>
      <p style="font-size: x-large; color: white;">Sistema De Cafeterías UTP</p>
    
      <?php if(isset($_GET['error']) ){ ?>
      <div class="block-component">
        <div>
      
          <div class="stacked-alert stacked-alert--danger">
            <span class="stacked-alert-icon uil uil-times-square"></span>
            <span class="stacked-alert-text"> <?php if(isset($_GET['error'])) echo $_GET['error']; ?> </span>
          </div>
      
        </div>
      </div>
         
      <?php } ?>
      <?php if(isset($_GET['exito']) ){ ?>
      <div class="block-component">
        <div>
      
          <div class="stacked-alert stacked-alert--success">
                  <span class="stacked-alert-icon uil uil-check-circle"></span>
                  <span class="stacked-alert-text">  <?php if(isset($_GET['exito'])) echo $_GET['exito']; ?> </span>
                </div>
      
        </div>
      </div>
         
      <?php } ?>

      <h2>Login</h2>

      <form method="POST" action="Procesos/login.php">

        <div class="user username">
          <span class="icon uil uil-user"></span>
          <input class="user  input-style" type="email" name="email" id="" placeholder="Email" required>
        </div>

        <div class=" user password">
          <span class="icon uil uil-lock-open-alt"></span>
          <input class=" user input-style" type="password" name="password" id="contra1" placeholder="Password" required>
        </div>

        <div class="block-component">
          <div class="opacity-card">
            <label for="opacity-checkbox-input" class="opacity-checkbox-label">
              <input type="checkbox" onclick="Mostrar()" id="opacity-checkbox-input" class="opacity-checkbox-input" />
              <span class="opacity-checkbox-background">
                <i class="opacity-checkbox-icon uil uil-check"></i>
              </span>
              <div class="opacity-checkbox-text">
                Contraseña Oculta
              </div>
            </label>
          </div>
        </div>

        <div class="iniciar">
        <input type="submit" value="Iniciar Sesión"/><!-- Este boton es por mientras -->
        </div>
        <br>
        <div class="enlaces">
          <div class="contra-olv">
            <input type="button" id="recuperar" value="¿Olvidaste tu contraseña?" onclick="window.location.href='Secciones/recuperarContraseña.php'">
          </div>
        <div class="yet-olv">
        <a href="Secciones/registrarse.php">¿Aún no tienes una cuenta? Regístrate</a>     
      </form>
    </div>
  </div>


  
  <script type="text/javascript" src="JavaScript/complementos.js"></script>
</body>

</html>