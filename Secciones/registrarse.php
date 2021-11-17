<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"/>
      <link rel="stylesheet" href="../css/registrarse.css">
      <link rel="stylesheet" href="../css/normalice.css">
      <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg" />
      <title>DinerSol | Registrarse</title>
    </head>
    <body>
       
        <div class="contenedor-estetica">

        <div class="imagen"></div>
        <div class="logear">

         <header>
            <!-- HEADER -->
        </header>

        <h2>Registrarse</h2>

        <div>
            <input type="button" class="btnRegistrarse botones" id="volver" value="Volver a Inicio" onclick="window.location.href='../index.html'">
        </div>
        <div class="todo">
            <nav>
                <a href="../index.php">Login</a>
                <a class="navEspecial" href="#">Registrarse</a>
                <a href="recuperarContraseña.php">Recuperar Contraseña</a>
            </nav>
            <p class="merror" style="color: #fc6e6e"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
            <p class="merror" style="color: ##51034f"><?php if(isset($_GET['exito'])) echo $_GET['exito']; ?></p>
            <form name="formRegistro" method="POST" action="../Procesos/registrarse.php" onSubmit="return ComprobarClave()">
                <div class="card"><br>
                    <h2>INGRESE SUS DATOS</h2>
                    <div>
                        <div class="Secciones">
                            <div class="item">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" placeholder="Ej: Aurelio" maxlength="50" required><br><br>
                            </div>
                            <div class="item item2">
                                <label for="apellido">Apellido:</label>
                                <input type="text" id="apellido" name="apellido" placeholder="Ej: Morales" maxlength="50" required><br><br>
                            </div>
                        </div>
                        <div class="Secciones">
                            <div class="item">
                                <label for="cedula">Cédula:</label>
                                <input type="text" id="cedula" name="cedula" placeholder="Ej: 1-111-1111" maxlength="15" required><br><br>
                            </div>
                            <div class="item item2">
                                <label for="correo">Correo:</label>
                                <input type="email" id="correo" name="email" placeholder="Ej: usuario@ejemplo.com" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" maxlength="200" required>
                            </div>
                        </div>
                        <div class="Secciones">
                            <div class="item">
                                <label for="telefono">Teléfono Personal:</label>
                                <input type="tel" id="telefono" name="telefono" placeholder="Ej: 1111-1111" pattern="[0-9]{4}-[0-9]{4}" required>
                            </div>
                        </div>
                        <div class="Secciones">
                            <div class="item">
                                <label for="contra1">Contraseña:</label>
                                <input type="password" id="contra1" name="contra1" placeholder="**********" maxlength="30" required>
                            </div>
                            <div class="item item2">
                                <label for="contra2">Repetir Contraseña:</label>
                                <input type="password" id="contra2" name="contra2" placeholder="**********" maxlength="30" required>
                            </div>
                        </div>
                        <div class="item" style="margin-top: -1%; margin-bottom: -1%;">
                            <input type="checkbox" onclick="Mostrar()"><h4>Mostrar Contraseñas</h4>
                        </div>
                    </div>
                    <!--
                    <div>
                        <p>
                            <?php
                                if(isset($_GET['msg']))
                                    echo $_GET['msg'];
                            ?>
                        </p>
                    </div>

        <form name="formRegistro" method="POST" action="../Procesos/registrarse.php" onSubmit="return ComprobarClave()">
           
        <div class="form">
            <div class="user username">
                <span class="icon uil uil-user"></span>
                <input class="user  input-style" type="email" name="nombre" id="" placeholder="Nombre" required>
              </div>
        
              <div class=" user password">
                <span class="icon uil uil-user"></span>
                <input class=" user input-style" type="text" name="apellido" id="" placeholder="Apellido" required>
              </div>
              <div class=" user password">
                <span class="icon uil-files-landscapes-alt"></span>
                <input class=" user input-style" type="text" name="cedula" id="" placeholder="Cedula" required>
              </div>
              <div class=" user password">
                <span class="icon uil uil-envelope-edit"></span>
                <input class=" user input-style" type="text" name="email" id="" placeholder="Correo" required>
              </div>
              <div class=" user password">
                <span class="icon uil uil-calling"></span>
                <input class=" user input-style" type="text" name="telefono" pattern="[0-9]{4}-[0-9]{4}" id="" placeholder="Telefono" required>
              </div>
              <div class=" user password">
                <span class="icon uil uil-lock-open-alt"></span>
                <input class=" user input-style" id="contra1" type="password" name="contra1" id="" placeholder="Contraseña" required>
              </div>
              <div class=" user password">
                <span class="icon uil uil-lock-open-alt"></span>
                <input class=" user input-style" id="contra2" type="password" name="contra2" id="" placeholder="Repetir Contraseña" required>
              </div>
              </div>
          
             <button class="submit" type="submit">Registrar</button>

             
           
   
        </form>
        <div class="block-component">
                    <div class="opacity-card">
                      <label
                        for="opacity-checkbox-input"
                        class="opacity-checkbox-label"
                      >
                        <input
                       
                        type="checkbox" 
                         onclick="Mostrar()"  
                          id="opacity-checkbox-input"
                          class="opacity-checkbox-input"
                        />
                        <span class="opacity-checkbox-background">
                          <i class="opacity-checkbox-icon uil uil-check"></i>
                        </span>
                        <div class="opacity-checkbox-text">
                          Contraseña ocultaa
                        </div>
                      </label>
                    </div>
                  </div>
                <br>

     
    </div>
</div>
        <footer>
            <!-- FOOTER -->
        </footer>
        <script type="text/javascript" src="../JavaScript/complementos.js"></script>
    </body>
</html>