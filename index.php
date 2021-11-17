<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/normalice.css">
        <title>DinerSol | Iniciar Sesión</title>
    </head>
    <body>
       
        
        <div class="contenedor-estetica">

        <div class="imagen"></div>
        <div class="logear">

         <header>
         <div class="utp">
           <img src="imagenes/logo_utp_1_300.png" alt="">
         </div>
        </header>
       
      

        <h2>Login</h2>

    

        <form method="POST" action="">
           
            <div class="user username">
                <span class="icon uil uil-user"></span>
                <input class="user  input-style" type="email" name="correo" id="" placeholder="Email" required>
              </div>
        
              <div class=" user password">
                <span class="icon uil uil-lock-open-alt"></span>
                <input class=" user input-style" type="password" name="contraseña" id="" placeholder="Password" required>
              </div>
           
          
             

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
                          Contraseña oculta
                        </div>
                      </label>
                    </div>
                  </div>
                <br>
           
            <section class="Vaciar-ingresar">
                <div>
                    <input hidden type="reset" value="Vaciar">
                </div>
                <div>
                    <input hidden type="submit" value="Ingresar">
                </div>
                <br>
            </section>
        </form>
        <section>
            <div class="contra-olv">
                <input type="button" id="recuperar" value="¿Olvidaste tu contraseña?" onclick="window.location.href='Secciones/recuperarContraseña.html'">
            </div>
        </section>
    </div>
</div>
        <footer>
            <!-- FOOTER -->
        </footer>
        <script type="text/javascript" src="JavaScript/complementos.js"></script>
    </body>
</html>