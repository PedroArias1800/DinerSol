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
            <img class="img" src="../Imagenes/utpOp.jpg" alt="UTP Logo" width="8%" height="1%">
            <p>Universidad Teconologica de Panamá <br> <strong>DinerSol- Sistemas De cafeterías UTP</strong></p> 
            </div>
         <div class="titulo">
           <h1>DinerSol</h1>
         </div>
       <div class="yo">
       <a class="ab" href="#paso-1">
          <div class="me">
                    <div class="block-component">
                        <div class="author-card">
                          <img
                            class="author-img"
                            src="../Imagenes/user.png<?php //echo  $datosDelUsuario->foto; ?>"
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
          
    <ul class="nav">   
      <li><a href="perfilDeUsuario.php">Mi Perfil</a></li> 
      <li><a href="historialCompra.php">Compras</a></li>
      <?php if($datosDelUsuario->id_usuario == 1){ ?>
        <li><a href="adminMenuInventario.php">Administrar Menus</a></li>
        <li><a href="adminCrearCombos.php">Administrar Productos</a></li>
      <?php } ?>
      <li><a href="../Procesos/logout.php">Cerrar Sesión</a></li>
    </ul>


            </div>
            <div class="enlaces">
     <a href="paginaPrincipal.php" class="navEspecial">Inicio</a>
        <a href="">Cafeterías</a>
        <a href="">Ayuda Estudiantil</a>
        <a href="historialCompra.php">Historial De Compras</a>
        <?php if($datosDelUsuario->id_tipo == 1){ ?>
            <a href="estadisticas.php">Estadísticas</a>
        <?php } ?>  
           
   
    
    </div>
          

    </body>
<html>