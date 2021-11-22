<?php

    include('../Procesos/verificarUsuario.php');
    include('../Procesos/consultarUsuario.php');

?>
<html>
    <head>
        <title>Header</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Css/footerHeader.Css">
        <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
        <link rel="stylesheet" href="../CSS/reset.css">
    </head>
    <body>
        <div class="header">
            <div class="imagen">
            <img src="https://yt3.ggpht.com/Y1L8TzdsdTe30KxXrueVXL8N5W9CL3JCR0oiFtlieiTJ4p24mMiDYRNHHuS9nPawWz1vEFO0BZY=s900-c-k-c0x00ffffff-no-rj" alt="UTP Logo" width="8%" height="1%">
            <p>Universidad Teconologica de Panamá <br> <strong>DinerSol- Sistemas De cafeterías UTP</strong></p>
            </div>
         
       
    </body>

    <a class="ab" href="#paso-1">
                <div class="me ">
                    <div class="block-component">
                        <div class="author-card">
                          <img
                            class="author-img"
                            src="../Imagenes/<?php echo  $datosDelUsuario->foto; ?>"
                          />
                          <div>
                            <h2 class="author-h2">
                              <?php echo  $datosDelUsuario->nombre." ".$datosDelUsuario->apellido; ?>
                            </h2>
                            <h3 class="author-h3">
                            <?php echo  $datosDelUsuario->email; ?>  
                            </h3>
                          </div>
                        </div>
                      </div>
                </div>
            </a>

            </div>
          

    <nav>

    <div class="enlaces">
     <a href="paginaPrincipal.php" class="navEspecial">Inicio</a>
        <a href="">Cafeterías</a>
        <a href="">Ayuda Estudiantil</a>
        <a href="historialCompra.php">Historial De Compras</a>
        <?php if($datosDelUsuario->id_tipo == 1){ ?>
            <a href="estadisticas.php">Estadísticas</a>
        <?php } ?>  
           
   
    
    </div>

    </div>
    
   

    </nav>
   
<html>