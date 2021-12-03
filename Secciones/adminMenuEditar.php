<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Css/footerHeader.css">
        <link rel="stylesheet" href="../Css/paginaPrincipal.css">
        <link rel="stylesheet" href="../Css/drpdwn.css">
        <link rel="stylesheet" href="../Css/estadisticas.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="../Css/formHacerPedido.css">
        <title>Administración | Editar</title>
    </head>
    <body>
        <div class="header">
            <img src="https://yt3.ggpht.com/Y1L8TzdsdTe30KxXrueVXL8N5W9CL3JCR0oiFtlieiTJ4p24mMiDYRNHHuS9nPawWz1vEFO0BZY=s900-c-k-c0x00ffffff-no-rj" alt="UTP Logo" width="6%" height="6%">
            <div>
                <h3>Universidad Tecnológica De Panamá</h3>
                <h1>DinerSol - Sistema De Cafeterías UTP</h1>
            </div>
        </div>
        <div class="fotoUser">
            <!-- <h3>Aurelio Morales</h3> -->
            <div class="dropdown">
                <button class="dropbtn"><b>Aurelio Morales</b></button>
                <div class="dropdown-content">
                  <a href="perfilDeUsuario.html">Mi Perfil</a>
                  <a href="">Pedido</a>
                  <a href="../index.html">Cerrar Sesión</a>
                </div>
            </div>
            <img class="FPerfil" src="../Imagenes/user.png" alt="Foto De Perfil" width="3%" height="3%">
        </div>
        <nav>
            <a href="paginaPrincipal.html">Inicio</a>
            <a href="">Cafeterías</a>
            <a href="">Ayuda Estudiantil</a>
            <a href="">Historial De Compras</a>
            <a href="estadisticas.html">Estadísticas</a>
        </nav>
        <div class="TituloCompleto">
            <h1>Administrar El Menú - Editar</h1>
        </div>
        <div class="todo">
            <div class="hacerPedido">
                <div class="barraLateral">
                    <h2>Opciones</h2>
                    <a href="adminMenuAgregar.html">Agregar</a>
                    <a href="#">Editar</a>
                    <a href="adminMenuEliminar.html">Eliminar</a>
                    <a href="adminMenuInventario.php">Inventario</a><br>
                </div>
                <div class="otraBarra">
                    <h2>Agregar Al Menú</h2>
                    <img src="../Imagenes/arrozPescadoEnsalada.jpg" alt="Foto Del Producto" width="30%" height="30%"><br>
                    <input type="file" class="botones">
                    <div class="datosProductos">
                        <div class="datosProductos">
                            <h3>Cafetería:</h3>
                            <select>
                                <option value="1">Cafetería Central</option>
                                <option value="2">Cafetería Del Edificio 3</option>
                                <option value="3">Cafetería Del Edificio 1 - Planta Baja</option>
                                <option value="4">Cafetería Del Edificio 1 - Piso 2</option>
                            </select>
                        </div>
                        <div class="datosProductos">
                            <h3>Menú:</h3>
                            <select>
                                <option value="1">Arroz Con Pollo</option>
                                <option value="2">Macarrones</option>
                                <option value="3">Arroz Con Pescado</option>
                                <option value="4">Snicker</option>
                            </select>
                        </div>
                    </div>
                    <div class="datosProductos" style="margin-top: -4%;">
                        <div class="datosProductos">
                            <h3>Nombre:</h3>
                            <input type="text" placeholder="Nombre del producto" value="Arroz Con Pescado Y Ensalada">
                        </div>
                        <div class="datosProductos">
                            <h3>Cafetería:</h3>
                            <input type="text" placeholder="Nombre del producto" value="Cafetería Central">
                        </div>
                    </div>
                    <div class="datosProductos" style="margin-top: -4%;">
                        <div class="datosProductos">
                            <h3>Precio:</h3>
                            <input type="number" placeholder="Precio Del Producto" value="2.75" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" maxlength="99999.00" required>
                        </div>
                        <div class="datosProductos">
                            <h3>Cantidad:</h3>
                            <input type="number" placeholder="Cantidad De Productos" value="80" pattern="[0-9]+([\.,][0-9]+)?" step="1" maxlength="999999" required>
                        </div>
                    </div>
                    <div class="datosProductos" style="justify-content: center; margin-top: 2%; margin-bottom: -8%;">
                        <input type="submit" class="botones" value="Editar Producto">
                        <input type="reset" class="botones" value="Cancelar">
                    </div><br><br>
                </div>
            </div><br><hr><br>
        </div>
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
    </div>
        <script type="text/javascript" src="../JavaScript/complementos.js"></script>
    </body>
</html>