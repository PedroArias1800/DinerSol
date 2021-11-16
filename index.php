<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Css/login.css">
        <link rel="stylesheet" href="Css/footerHeader.css">
        <title>DinerSol | Iniciar Sesión</title>
    </head>
    <body>
        <?php require('Secciones/header.html'); ?>
        <div>
            <input type="button" class="btnRegistrarse botones" id="registro" value="Registrarse" onclick="window.location.href='Secciones/registrarse.php'">
        </div>
        <div class="todo">
            <nav>
                <a href="#" class="navEspecial">Login</a>
                <a href="Secciones/registrarse.php">Registrarse</a>
                <a href="Secciones/recuperarContraseña.html">Recuperar Contraseña</a>
            </nav>
            <p class="merror" style="color: #fc6e6e"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
            <p class="merror" style="color: #51034f"><?php if(isset($_GET['exito'])) echo $_GET['exito']; ?></p>
            <div class="card"><br>
                <form method="POST" action="Secciones/paginaPrincipal.html">
                    <h2 id="t">INGRESE SUS DATOS</h2>
                    <div class="ComidasMenu">
                        <div class="item">
                            <label for="correo">Correo:</label><br>
                            <input type="email" id="correo" name="correo" placeholder="Ej: usuario@ejemplo.com" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" maxlength="200" required>
                        </div>
                        <div class="item">
                            <label for="contra1">Contraseña:</label><br>
                            <input type="password" id="contra1" name="contra1" placeholder="**********" maxlength="30" required>
                        </div>
                        <div class="item">
                            <input type="checkbox" onclick="Mostrar()">Mostrar Contraseña
                        </div>
                        <div class="item">
                            <input type="reset" class="botones" value="Vaciar">
                            <input type="submit" class="botones" value="Ingresar">
                        </div>
                    </div>
                </form>
                <div class="item">
                    <label for="recuperar" style="margin-top: 1.2%;">¿Olvidaste tu contraseña?</label><br>
                    <input type="button" class="botones" id="recuperar" value="Recuperar" onclick="window.location.href='Secciones/recuperarContraseña.html'">
                </div><br>
            </div>
        </div>
        
        <?php require('Secciones/footer.html'); ?>
        
        <script type="text/javascript" src="JavaScript/complementos.js"></script>
    </body>
</html>