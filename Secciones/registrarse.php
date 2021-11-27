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
        <div class="titulo">
      <h1>Registrarse</h1>
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
                             Contraseña Oculta
                           </div>
                         </label>
                       </div>
                     </div>
                   <br>
   
        
       </div>
   </div>
            <!-- FOOTER -->
        </footer>
        <script type="text/javascript" src="../JavaScript/complementos.js"></script>
    </body>
</html>