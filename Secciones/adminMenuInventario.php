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

      <div class="TituloCompleto">
          <h1>Administración De Menús</h1>
      </div>
      <div class="container" id="Cafeterias">
      
      <?php $consultarCafeterias = $datos->query("SELECT * FROM cafeteria"); ?>
      <div class="HacerPedido inventario">
        <h2 class="NombreCafeteria">Cafeterías:</h2>
        <select id="Cafeteria20" name="Cafeteria" onchange="mostrarProductos()">
          <option value="" disabled selected>Selecciona Una Cafetería</option>
          <?php while($cafeteria = $consultarCafeterias->fetch(PDO::FETCH_OBJ)){ ?>
            <option value="<?php echo $cafeteria->id_cafeteria; ?>"><?php echo $cafeteria->nombre; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="flex">

      <div class=" tablasGrandes">
        
        <?php   $consultarCombos = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, c.id_cafeteria
                                                  FROM producto p inner join menu m ON p.id_producto = m.id_producto
                                                      inner join cafeteria c ON m.id_cafeteria = c.id_cafeteria
                                                  WHERE p.tipo_producto = 'Combo'
                                                  ORDER BY c.id_cafeteria ASC, p.tipo_producto ASC");
                           
                $consultarComida = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, m.id_cafeteria
                                                  FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                  WHERE p.tipo_producto = 'Comida'
                                                  ORDER BY m.id_cafeteria ASC, p.tipo_producto ASC");

                $consultarSnack = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, m.id_cafeteria
                                                  FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                  WHERE p.tipo_producto = 'Snack'
                                                  ORDER BY m.id_cafeteria ASC, p.tipo_producto ASC");

                $consultarRefresco = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, m.id_cafeteria
                                                  FROM producto p INNER JOIN menu m ON p.id_producto = m.id_producto
                                                  WHERE p.tipo_producto = 'Refresco'
                                                  ORDER BY m.id_cafeteria ASC, p.tipo_producto ASC");
                                                  
        ?>
        
        <table class="styled-table"  id="tablaCombo">
          <thead>
            <tr>
              <th>Combos</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody class="tBody">
            <?php while($combo = $consultarCombos->fetch(PDO::FETCH_OBJ)){ 
              if ($combo->tipo_producto == "Comida"){ ?>
              <tr value="<?php echo $combo->id_cafeteria; ?>">
                <td><?php echo $combo->nombre; ?></td>
                <td><?php echo $combo->costo; ?></td>
                <td><?php echo $combo->inventario; ?></td>
                <td><img src="../Imagenes/<?php echo $combo->foto; ?>" alt="Foto" width="20%" height="20%"></td>
                <td class="tdEspecial"><input class="habilitado" class="adminch" type="checkbox" onClick="cambiarEstado()" id="Estado" name="Estado" value="<?php echo $combo->Estado;?>"
                                                                          <?php if($combo->estado = 1) { ?> checked <?php } ?>><h4 id="h4Estado<?php echo $combo->id_producto; ?>">Habilitado</h4></td>
              </tr>
            <?php } } ?>
          </tbody>
        </table><br>
      </div>
      <div class=" tablasGrandes">
        <table class="styled-table" id="tablaComida">
          <thead>
            <tr>
              <th>Comidas</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Disponible</th>
            </tr>
          </thead>
          <tbody class="tBody" id="Comidas">
            <?php while($comida = $consultarComida->fetch(PDO::FETCH_OBJ)){ ?>
            <tr value="<?php echo $comida->id_cafeteria; ?>">
              <td><?php echo $comida->nombre; ?></td>
              <td><?php echo $comida->costo; ?></td>
              <td><?php echo $comida->inventario; ?></td>
              <td><img src="..Imagenes/<?php echo $comida->foto; ?>" alt="Foto" width="20%" height="20%"></td>
              <td><input type="checkbox" <?php if($comida->estado == 1){ ?> checked <?php } ?>></td>
            </tr>
            <?php } ?>
          </tbody>
        </table><br>
      </div>
      <div class=" tablasGrandes">
        <table class="styled-table" id="tablaSnack">
          <thead>
            <tr>
              <th>Snacks</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody class="tBody" id="Snacks">
            <?php while($snack = $consultarSnack->fetch(PDO::FETCH_OBJ)){ ?>
            <tr value="<?php echo $snack->id_cafeteria; ?>">
              <td><?php echo $snack->nombre; ?></td>
              <td><?php echo $snack->costo; ?></td>
              <td><?php echo $snack->inventario; ?></td>
              <td><img src="..Imagenes/<?php echo $snack->foto; ?>" alt="Foto" width="20%" height="20%"></td>
              <td><input type="checkbox" <?php if($snack->estado == 1){ ?> checked <?php } ?>></td>
            </tr>
            <?php } ?>
          </tbody>
        </table><br>
      </div>
      <div class=" tablasGrandes">
        <table class="styled-table" id="tablaRefresco">
          <thead>
            <tr>
              <th>Refrescos</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody class="tBody" id="Refrescos">
            <?php while($refresco = $consultarRefresco->fetch(PDO::FETCH_OBJ)){ ?>
            <tr value="<?php echo $refresco->id_cafeteria; ?>">
              <td><?php echo $refresco->nombre; ?></td>
              <td><?php echo $refresco->costo; ?></td>
              <td><?php echo $refresco->inventario; ?></td>
              <td><img src="..Imagenes/<?php echo $refresco->foto; ?>" alt="Foto" width="20%" height="20%"></td>
              <td><input type="checkbox" <?php if($refresco->estado == 1){ ?> checked <?php } ?>></td>
            </tr>
            <?php } ?>
          </tbody>
        </table><br>
      </div>
      </div>
      <div class="datosProductos inventarioBotones">
        <button class="botones"><a href="paginaPrincipal.php">Cancelar</a></button>
        <input type="submit" class="botones" value="Guardar Cambios">
      </div>
      </div>

      <?php require('footer.html');?>

      <script type="text/javascript" src="../JavaScript/complementos.js"></script>
    </body>
</html>