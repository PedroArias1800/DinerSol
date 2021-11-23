<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Perfil.css">
    <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
    <link rel="stylesheet" href="../Css/footerHeader.Css">
    <link rel="stylesheet" href="../Css/estadisticas.css">
    <link rel="stylesheet" href="../Css/drpdwn.css">
    <title>DinerSol | Perfil</title>
</head>
<body>
    
    <div class="headerphp">
        <?php require('header.php'); ?>
    </div>

    <div class="TituloCompleto">
        <h1>Actualizar Perfil</h1>
    </div>

    <!-- Seccion -->
    <section>
        <div class="contMain">
            <form class="contMain-form" action="#" method="post">
                <div class="contMain-form-menu flex-column">
                    <a href="#">General</a>
                    <!-- <a href="#">Correo</a> -->
                    <a href="#">Contraseña</a>
                    <a href="#">Solicitud</a>
                    <a href="../index.php">Cerrar Sesión</a>
                </div>
                <div class="contMain-form-contenido">
                    <h3>Editar General</h3>
                    <div class="_form-contenido-foto flex-column">
                        <img src="../Imagenes/user.png" alt="">
                        <div class="custom-input-file">
                            <input type="file" name="fotoPerfil" id="fotoPerfil" class="input-file" value="">
                            Subir Foto
                        </div>
                    </div>
                    <div class="_form-contenido-info">
                        <div class="campo flex-column">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="<?php echo $datosDelUsuario->nombre; ?>" disabled>
                        </div>
                        <div class="campo flex-column">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" value="<?php echo $datosDelUsuario->apellido; ?>" disabled>
                        </div>
                        <div class="campo flex-column">
                            <label for="correo">Correo</label>
                            <input type="text" name="correo" id="correo" value="<?php echo $datosDelUsuario->email; ?>" disabled>
                        </div>
                        <div class="campo flex-column">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" value="<?php echo $datosDelUsuario->telefono; ?>" require>
                        </div>                                                         
                    </div>
                    <div class="form-btn">
                        <input id="EdtGeneral" type="submit" value="Guadar Cambios">
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="contMain-form-contenido contraseña invisible">
                    <h3>Editar Contraseña</h3>
                    <div class="_form-contenido-info">
                        <div >
                            <p>Para cabiar la contraseña debe agregar su contraseña actual y lugo una nueva contraseña.</p> 
                        </div>
                        <div class="campo flex-column">
                            <label for="actual">Contraseña actual</label>
                            <input type="password" name="contraseñaA" id="actual" require>
                        </div>
                        <div class="campo flex-column">
                            <label for="nueva">Nueva contraseña</label>
                            <input type="password" name="contraseñaN" id="nueva" require>
                        </div>
                        <div class="campo flex-column">
                            <label for="nueva">Confirmar contraseña</label>
                            <input type="password" name="contraseñaNConfr" id="nuevaConfr" require>
                        </div>                                                        
                    </div>
                    <div class="form-btn">
                        <input id="EdtContrasña" type="submit" value="Confrimar Cambios">
                    </div>
                </div>

                 <!-- Solicitud -->
                 <div class="contMain-form-contenido solicitud invisible">
                    <h3>Solicitud</h3>
                    <div class="_form-contenido-info">
                        <div >
                            <p>¿Solicitar que se le verifique para ser añadido como?</p>
                        </div>
                        <div class="flex-column">
                            <label for="actual">Tipo de Usuario</label>
                            <div class="">
                                <input type="radio" name="tipo" id="tpEstudiante" value="Estudiante">
                                <label for="tpEstudiante">Estudiante</label>
                            </div>
                            <div class="">
                                <input type="radio" name="tipo" id="tpAdministrativo" value="Administrativo">
                                <label for="tpAdministrativo">Administrativo</label>
                            </div>                            
                        </div>                                                     
                    </div>
                    <div class="form-btn">
                        <input id="EdtSolicitud" type="submit" value="Eviar Solicitud">
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer
    <?php include("footer.html") ?> -->

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

</body>
</html>