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
    </head>
    <body>
        <div class="header">
            <img src="https://yt3.ggpht.com/Y1L8TzdsdTe30KxXrueVXL8N5W9CL3JCR0oiFtlieiTJ4p24mMiDYRNHHuS9nPawWz1vEFO0BZY=s900-c-k-c0x00ffffff-no-rj" alt="UTP Logo" width="6%" height="6%">
            <div>
                <h3>Universidad Tecnológica De Panamá</h3>
                <h1>DinerSol - Sistema De Cafeterías UTP</h1>
            </div>
        </div>
    </body>

    <div class="fotoUser">
        <div class="dropdown">
            <button class="dropbtn"><b><?php echo $datosDelUsuario->nombre." ".$datosDelUsuario->apellido; ?></b></button>
            <div class="dropdown-content">
                <a href="perfilDeUsuario.php">Mi Perfil</a>
                <a href="">Pedidos</a>
                <?php if($datosDelUsuario->id_tipo == 1){ ?>
                <a href="adminCrearCombos.php">Administrar Productos</a>
                <a href="adminMenuInventario.php">Administrar Menús</a>
                <?php } ?>
                <a href="../Procesos/logout.php">Cerrar Sesión</a>
            </div>
        </div>
        <img class="FPerfil" src="../Imagenes/user.png" alt="Foto De Perfil" width="3%" height="3%">
    </div>

    <nav>
        <a href="paginaPrincipal.php" class="navEspecial">Inicio</a>
        <a href="">Cafeterías</a>
        <a href="">Ayuda Estudiantil</a>
        <a href="historialCompra.php">Historial De Compras</a>
        <?php if($datosDelUsuario->id_tipo == 1){ ?>
            <a href="estadisticas.php">Estadísticas</a>
        <?php } ?>
    </nav>
<html>