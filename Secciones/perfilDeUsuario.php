<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Perfil.css">
    <title>DinerSol | Perfil</title>
</head>
<body>
    <!-- Header -->
    <?php include("header.html")?>

    <!-- Seccion -->
    <section>
        <div class="contMain">
            <form class="contMain-form" action="#" method="post">
                <div class="contMain-form-menu flex-column">
                    <a href="#">General</a>
                    <!-- <a href="#">Correo</a> -->
                    <a href="#">Contraseña</a>
                    <a href="#">Solicitud</a>
                    <a href="#">Cerrar Sesión</a>
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
                            <input type="text" name="nombre" id="nombre" placeholder="Kexy" disabled>
                        </div>
                        <div class="campo flex-column">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" placeholder="Rodríguez" disabled>
                        </div>
                        <div class="campo flex-column">
                            <label for="correo">Correo</label>
                            <input type="text" name="correo" id="correo" placeholder="kexy.rodriguez@utp.ac.pa" disabled>
                        </div>
                        <div class="campo flex-column">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" value="6000-0000" require>
                        </div>                                                         
                    </div>
                    <div class="form-btn">
                        <input type="submit" value="Guadar Cambios">
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <?php include("footer.html") ?>
</body>
</html>