<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Css/footerHeader.css">
        <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="../Css/drpdwn.css">
        <link rel="stylesheet" href="../Css/estadisticas.css">
        <link rel="shortcut icon" href="../Imagenes/logoUTP.jpg"/>
        <title>Administración | Inventario</title>
    </head>

      <?php require('header.php'); 
        
        $consultarCombos = $datos->query("SELECT id_cafeteria, nombre_combo FROM combo");
    
        $consultarProductos = $datos->query("SELECT m.id_cafeteria, m.id_producto, p.nombre, p.tipo_producto, p.costo, p.foto, p.inventario, m.estado
                                                FROM menu m INNER JOIN producto p ON m.id_producto=p.id_producto
                                                WHERE p.inventario>0
                                                ORDER BY m.id_cafeteria ASC, p.tipo_producto ASC");
        
      ?>

      <script>

      var arrayIdCafeteria = new Array();
      var arrayIdProducto = new Array();
      var arrayNomProducto = new Array();
      var arrayTipoProducto = new Array();
      var arrayCostoProducto = new Array();
      var arrayFotoProducto = new Array();  
      var arrayInventarioProducto = new Array(); 
      var arrayEstadoProducto = new Array();

      var Comidas = document.getElementById('Comidas');
      var Snacks = document.getElementById('Snacks');
      var Refrescos = document.getElementById('Refrescos');

      <?php
      $n=0;
      while($producto=$consultarProductos->fetch(PDO::FETCH_OBJ))  {
          echo "arrayIdCafeteria[$n]=$producto->id_cafeteria;";
          echo "arrayIdProducto[$n]=$producto->id_producto;";
          echo "arrayNomProducto[$n]='$producto->nombre';";
          echo "arrayTipoProducto[$n]='$producto->tipo_producto';";
          echo "arrayCostoProducto[$n]=$producto->costo;";
          echo "arrayFotoProducto[$n]='$producto->foto';";
          echo "arrayInventarioProducto[$n]='$producto->inventario';";
          echo "arrayEstadoProducto[$n]='$producto->estado';";
          $n++;
          }
      ?>
      var n ="<?php echo $n; ?>"; //total de registros

      function mostrarProductos(){

        //Espacio para los combos


        //Espacio para los productos
        var valor=0;

        //asignamos a la variable valor el valor de la lista de menú seleccionado
        valor=document.Cafeterias.Cafeteria20.value;
        Comidas.innerHTML = ""; //Limpiamos la tabla de comidas
        Snacks.innerHTML = ""; //Limpiamos la tabla de snacks
        Refrescos.innerHTML = ""; //Limpiamos la tabla de refrescos

        for (x=0;x<n;x++) {

            if (valor == arrayIdCafeteria[x])
            {
                if(arrayTipoProducto[x] == 'Comida'){
                    Comidas.innerHTML = "<tr value="+arrayIdProducto[x]+"><th>"+arrayNomProducto[x]+"</th><th>"+arrayCostoProducto[x]+"</th><th>"+arrayInventarioProducto[x]+"</th><th>"+arrayFotoProducto[x]+"</th><th>"+arrayEstadoProducto[x]+"</th></tr>";
                } else if(arrayTipoProducto[x] == 'Snack'){
                    Snacks.innerHTML = "<tr value="+arrayIdProducto[x]+"><th>"+arrayNomProducto[x]+"</th><th>"+arrayCostoProducto[x]+"</th><th>"+arrayInventarioProducto[x]+"</th><th>"+arrayFotoProducto[x]+"</th><th>"+arrayEstadoProducto[x]+"</th></tr>";
                } else if(arrayTipoProducto[x] == 'Refresco'){
                    Refrescos.innerHTML = "<tr value="+arrayIdProducto[x]+"><th>"+arrayNomProducto[x]+"</th><th>"+arrayCostoProducto[x]+"</th><th>"+arrayInventarioProducto[x]+"</th><th>"+arrayFotoProducto[x]+"</th><th>"+arrayEstadoProducto[x]+"</th></tr>";
                } else {}
            }
        }

      }

      </script>

        <div class="headimg">
          <div class="TituloCompleto">
            <h1>Administracion De Menús</h1>
          </div>
        </div>

        <div class="cafeteriasUTP">
            <h3 style="text-align: center; margin: 2% 0 2% 2%;">Presione <strong>el botón de la disponibilidad</strong> para alternarlo entre <strong>Sí o No</strong></h3>
        </div><hr><br><br>

      <div class="container" id="Cafeterias">

      <div class="flex">

      <div class="tablasGrandes">
        
        <?php   $consultarCombos = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, c.id_cafeteria, c.nombre as nomCaf
                                                  FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                                  INNER JOIN cafeteria c ON m.id_cafeteria = c.id_cafeteria
                                                  WHERE p.tipo_producto = 'Combo'
                                                  ORDER BY c.id_cafeteria ASC, p.nombre ASC");
                           
                $consultarComida = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, m.id_cafeteria, c.nombre as nomCaf
                                                  FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                                  INNER JOIN cafeteria c ON m.id_cafeteria = c.id_cafeteria
                                                  WHERE p.tipo_producto = 'Comida'
                                                  ORDER BY m.id_cafeteria ASC, p.nombre ASC");

                $consultarSnack = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, m.id_cafeteria, c.nombre as nomCaf
                                                  FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                                  INNER JOIN cafeteria c ON m.id_cafeteria = c.id_cafeteria
                                                  WHERE p.tipo_producto = 'Snack'
                                                  ORDER BY m.id_cafeteria ASC, p.nombre ASC");

                $consultarRefresco = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, m.id_cafeteria, c.nombre as nomCaf
                                                  FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                                  INNER JOIN cafeteria c ON m.id_cafeteria = c.id_cafeteria
                                                  WHERE p.tipo_producto = 'Refresco'
                                                  ORDER BY m.id_cafeteria ASC, p.nombre ASC");
                                                  
        ?>
        
        <table class="styled-table"  id="tablaCombo">
          <thead>
            <tr>
              <th>Cafeteria</th>
              <th>Combos</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Disponible</th>
            </tr>
          </thead>
          <tbody class="tBody">
            <?php while($combo = $consultarCombos->fetch(PDO::FETCH_OBJ)){ 
              if ($combo->tipo_producto == "Comida"){ ?>
              <form action="../Procesos/actualizarMenu.php" method="POST">
                <tr>
                  <td><?php echo $combo->nomCaf; ?></td>
                  <td><?php echo $combo->nombre; ?></td>
                  <td><?php echo $combo->costo; ?></td>
                  <td><?php echo $combo->inventario; ?></td>
                  <td><img src="../Imagenes/<?php echo $snack->foto; ?>" alt="Foto" width="35%" height="35%"></td>
                  <td class="cambiarEstado"><input type="submit" value="<?php if($snack->estado == 1){ echo "Si"; } else { echo "No"; } ?>" <?php if($snack->inventario < 0){ ?> disabled <?php } ?>></td>
                </tr>
                <input type="hidden" value="<?php echo $snack->inventario; ?>" name="inventario">
                <input type="hidden" value="<?php echo $snack->id_producto; ?>" name="id_producto">
                <input type="hidden" value="<?php echo $snack->estado; ?>" name="estado">
                <input type="hidden" value="<?php echo $snack->id_cafeteria; ?>" name="id_cafeteria">
              </form>
            <?php } } ?>
          </tbody>
        </table><br>
      </div>
      <div class="tablasGrandes">
        <table class="styled-table" id="tablaComida">
          <thead>
            <tr>
              <th>Cafeteria</th>
              <th>Comidas</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Disponible</th>
            </tr>
          </thead>
          <tbody class="tBody" id="Comidas">
            <?php while($comida = $consultarComida->fetch(PDO::FETCH_OBJ)){ ?>
            <form action="../Procesos/actualizarMenu.php" method="POST">
              <tr>
                <td><?php echo $comida->nomCaf; ?></td>
                <td><?php echo $comida->nombre; ?></td>
                <td><?php echo $comida->costo; ?></td>
                <td><?php echo $comida->inventario; ?></td>
                <td><img src="../Imagenes/<?php echo $comida->foto; ?>" alt="Foto" width="35%" height="35%"></td>
                <td class="cambiarEstado"><input type="submit" value="<?php if($comida->estado == 1){ echo "Si"; } else { echo "No"; } ?>" <?php if($comida->inventario < 0){ ?> disabled <?php } ?>></td>
              </tr>
              <input type="hidden" value="<?php echo $comida->inventario; ?>" name="inventario">
              <input type="hidden" value="<?php echo $comida->id_producto; ?>" name="id_producto">
              <input type="hidden" value="<?php echo $comida->estado; ?>" name="estado">
              <input type="hidden" value="<?php echo $comida->id_cafeteria; ?>" name="id_cafeteria">
            </form>
            <?php } ?>
          </tbody>
        </table><br>
      </div>
      <div class="tablasGrandes">
        <table class="styled-table" id="tablaSnack">
          <thead>
            <tr>
              <th>Cafeteria</th>
              <th>Snacks</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Disponible</th>
            </tr>
          </thead>
          <tbody class="tBody" id="Snacks">
            <?php while($snack = $consultarSnack->fetch(PDO::FETCH_OBJ)){ ?>
            <form action="../Procesos/actualizarMenu.php" method="POST">
              <tr>
                <td><?php echo $snack->nomCaf; ?></td>
                <td><?php echo $snack->nombre; ?></td>
                <td><?php echo $snack->costo; ?></td>
                <td><?php echo $snack->inventario; ?></td>
                <td><img src="../Imagenes/<?php echo $snack->foto; ?>" alt="Foto" width="35%" height="35%"></td>
                <td class="cambiarEstado"><input type="submit" value="<?php if($snack->estado == 1){ echo "Si"; } else { echo "No"; } ?>" <?php if($snack->inventario < 0){ ?> disabled <?php } ?>></td>
              </tr>
              <input type="hidden" value="<?php echo $snack->inventario; ?>" name="inventario">
              <input type="hidden" value="<?php echo $snack->id_producto; ?>" name="id_producto">
              <input type="hidden" value="<?php echo $snack->estado; ?>" name="estado">
              <input type="hidden" value="<?php echo $snack->id_cafeteria; ?>" name="id_cafeteria">
            </form>
            <?php } ?>
          </tbody>
        </table><br>
      </div>
      <div class="tablasGrandes">
        <table class="styled-table" id="tablaRefresco">
          <thead>
            <tr>
              <th>Cafeteria</th>
              <th>Refrescos</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Disponible</th>
            </tr>
          </thead>
          <tbody class="tBody" id="Refrescos">
            <?php while($refresco = $consultarRefresco->fetch(PDO::FETCH_OBJ)){ ?>
            <form action="../Procesos/actualizarMenu.php" method="POST">
              <tr>
                <td><?php echo $refresco->nomCaf; ?></td>
                <td><?php echo $refresco->nombre; ?></td>
                <td><?php echo $refresco->costo; ?></td>
                <td><?php echo $refresco->inventario; ?></td>
                <td><img src="../Imagenes/<?php echo $refresco->foto; ?>" alt="Foto" width="35%" height="35%"></td>
                <td class="cambiarEstado"><input type="submit" value="<?php if($refresco->estado == 1){ echo "Si"; } else { echo "No"; } ?>" <?php if($refresco->inventario < 0){ ?> disabled <?php } ?>></td>
              </tr>
              <input type="hidden" value="<?php echo $refresco->inventario; ?>" name="inventario">
              <input type="hidden" value="<?php echo $refresco->id_producto; ?>" name="id_producto">
              <input type="hidden" value="<?php echo $refresco->estado; ?>" name="estado">
              <input type="hidden" value="<?php echo $refresco->id_cafeteria; ?>" name="id_cafeteria">
            </form>
            <?php } ?>
          </tbody>
        </table><br>
      </div>
      </div>
      </div><br><br>

      <?php require('footer.html');?>

      <script type="text/javascript" src="../JavaScript/complementos.js"></script>
    </body>
</html>