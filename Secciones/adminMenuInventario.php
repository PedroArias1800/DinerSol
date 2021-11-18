<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Css/menu izquierda.css">
        <link rel="stylesheet" href="../Css/footerHeader.css">
        <link rel="stylesheet" href="../Css/paginaPrincipal.Css">
        <link rel="stylesheet" href="../Css/drpdwn.css">
        <link rel="stylesheet" href="../Css/estadisticas.css">
        <title>Administración | Inventario</title>
    </head>

      <?php require('header.php'); ?>

      <div class="TituloCompleto">
          <h1>Administración De Menús</h1>
      </div>
      <?php $consultarCafeterias = $datos->query("SELECT * FROM cafeteria"); ?>
      <div class="HacerPedido inventario">
        <h2 class="NombreCafeteria">Cafeterías:</h2>
        <select id="Cafeteria" name="Cafeteria" onChange="mostrarProductos()">
          <?php while($cafeteria = $consultarCafeterias->fetch(PDO::FETCH_OBJ)){ ?>
            <option value="<?php echo $cafeteria->id_cafeteria; ?>"><?php echo $cafeteria->nombre; ?></option>
          <?php } ?>
        </select>
      </div>
      <input type="text" value=1 id="Prueba">
      <div class="card">
        
        <?php   $consultarCombos = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, c.id_cafeteria
                                                  FROM producto p inner join menu m ON p.id_producto = m.id_producto
                                                      inner join cafeteria c ON m.id_cafeteria = c.id_cafeteria
                                                  WHERE p.tipo_producto = 'Combo'
                                                  ORDER BY c.id_cafeteria ASC, p.tipo_producto ASC"); ?>
        
        <table id="tablaCombo">
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
                <td class="tdEspecial"><input type="checkbox" onClick="cambiarEstado()" id="Estado" name="Estado" value="<?php echo $combo->Estado;?>"
                                                                          <?php if($combo->estado = 1) { ?> checked <?php } ?>><h4 id="h4Estado<?php echo $combo->id_producto; ?>">Habilitado</h4></td>
              </tr>
            <?php } } ?>
          </tbody>
        </table><br>
      </div>
      <div class="card">

        <?php $consultarComidas = $datos->query(" SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, c.id_cafeteria
                                                  FROM producto p inner join menu m ON p.id_producto = m.id_producto
                                                                  inner join cafeteria c ON m.id_cafeteria = c.id_cafeteria
                                                  WHERE p.tipo_producto = 'Comida'
                                                  ORDER BY c.id_cafeteria ASC, p.tipo_producto ASC"); ?>
        
        <table id="tablaComida">
          <thead>
            <tr>
              <th>Comidas</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody class="tBody">
          <?php while($Comida = $consultarComidas->fetch(PDO::FETCH_OBJ)){ 
              if ($Comida->tipo_producto == "Comida")?>
            <tr value="<?php echo $Comida->id_cafeteria; ?>">
              <td><?php echo $Comida->nombre; ?></td>
              <td><?php echo $Comida->costo; ?></td>
              <td><?php echo $Comida->inventario; ?></td>
              <td><img src="../Imagenes/<?php echo $Comida->foto; ?>" alt="Foto" width="20%" height="20%"></td>
              <td class="tdEspecial"><input type="checkbox" onClick="cambiarEstado()" id="Estado" name="Estado" value="<?php echo $Comida->Estado;?>"
                                                                         <?php if($Comida->estado = 1) { ?> checked <?php } ?>><h4 id="h4Estado<?php echo $Comida->id_producto; ?>">Habilitado</h4></td>
            </tr>
            <?php } ?>
          </tbody>
        </table><br>
      </div>
      <div class="card">

        <?php $consultarSnacks = $datos->query("SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, c.id_cafeteria
                                                FROM producto p inner join menu m ON p.id_producto = m.id_producto
                                                                inner join cafeteria c ON m.id_cafeteria = c.id_cafeteria
                                                WHERE p.tipo_producto = 'Snack'
                                                ORDER BY c.id_cafeteria ASC, p.tipo_producto ASC"); ?>

        <table id="tablaSnack">
          <thead>
            <tr>
              <th>Snacks</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody class="tBody">
            <?php while($Snack = $consultarSnacks->fetch(PDO::FETCH_OBJ)){ 
              if ($Snack->tipo_producto == "Snack"){ ?>
              <tr value="<?php echo $Snack->id_cafeteria; ?>">
                <td><?php echo $Snack->nombre; ?></td>
                <td><?php echo $Snack->costo; ?></td>
                <td><?php echo $Snack->inventario; ?></td>
                <td><img src="../Imagenes/<?php echo $Snack->foto; ?>" alt="Foto" width="20%" height="20%"></td>
                <td class="tdEspecial"><input type="checkbox" onClick="cambiarEstado()" id="Estado" name="Estado" value="<?php echo $Snack->Estado;?>"
                                                                          <?php if($Snack->estado = 1) { ?> checked <?php } ?>><h4 id="h4Estado<?php echo $Snack->id_producto; ?>">Habilitado</h4></td>
              </tr>
            <?php } } ?>
          </tbody>
        </table><br>
      </div>
      <div class="card">

        <?php $consultarRefrescos = $datos->query(" SELECT p.id_producto, p.tipo_producto, p.nombre, p.costo, p.foto, p.inventario, m.estado, c.id_cafeteria
                                                    FROM producto p inner join menu m ON p.id_producto = m.id_producto
                                                                    inner join cafeteria c ON m.id_cafeteria = c.id_cafeteria
                                                    WHERE p.tipo_producto = 'Refresco'
                                                    ORDER BY c.id_cafeteria ASC, p.tipo_producto ASC"); ?>

        <table id="tablaRefresco">
          <thead>
            <tr>
              <th>Refrescos</th>
              <th>Precio</th>
              <th>Cantidad Disponible</th>
              <th>Foto</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody class="tBody">
            <?php while($Refreco = $consultarRefrescos->fetch(PDO::FETCH_OBJ)){ 
              if ($Refreco->tipo_producto == "Refresco")?>
              <tr value="<?php echo $Refresco->id_cafeteria; ?>">
                <td><?php echo $Refreco->nombre; ?></td>
                <td><?php echo $Refreco->costo; ?></td>
                <td><?php echo $Refreco->inventario; ?></td>
                <td><img src="../Imagenes/<?php echo $Refresco->foto; ?>" alt="Foto" width="9%" height="9%"></td>
                <td class="tdEspecial"><input type="checkbox" onClick="cambiarEstado()" id="Estado" name="Estado" value="<?php echo $Refresco->Estado;?>"
                                                                          <?php if($Refresco->estado = 1) { ?> checked <?php } ?>><h4 id="h4Estado<?php echo $Refresco->id_producto; ?>">Habilitado</h4></td>
              </tr>
            <?php } ?>
          </tbody>
        </table><br>
      </div>
      <div class="datosProductos inventarioBotones">
        <button class="botones"><a href="paginaPrincipal.php">Cancelar</a></button>
        <input type="submit" class="botones" value="Guardar Cambios">
      </div><br><br>

      <?php require('footer.html'); ?>
      
      <script>

        var Cafeteria = document.getElementById('Cafeteria');
        var Combo = document.getElementById('tablaCombo');
        var Comida = document.getelementById('tablaComida');
        var Snack = document.getElementById('tablaSnack');
        var Refresco = document.getElementById('tablaRefresco');
        

        function cargarPantalla(){

        }

        function mostrarProductos(){

          var lista = document.getElementById('Cafeteria');
          var indiceSeleccionado = lista.selectedIndex
          var opcionSeleccionada = lista.options[indiceSeleccionado]
          var valorSeleccionado = opcionSeleccionada.value
          document.getElementById('Prueba').value = valorSeleccionado; 

          for (var i = 0, row; row = Combo.rows[i]; i++){
            if(row.value === Cafeteria.value){
              Combo.rows[i].style.display = 'inline';
            } else {
              Combo.rows[i].style.display = 'none';
            }
          }

          for (var i = 1, row; row = Comida.rows[i]; i++){
            if(row.value === Cafeteria.value){
              Comida.rows[i].style.display = 'inline';
            } else {
              Comida.rows[i].style.display = 'none';
            }
          }

          for (var i = 1, row; row = Snack.rows[i]; i++){
            if(row.value === Cafeteria.value){
              Snack.rows[i].style.display = 'inline';
            } else {
              Snack.rows[i].style.display = 'none';
            }
          }

          for (var i = 1, row; row = Refresco.rows[i]; i++){
            if(row.value === Cafeteria.value){
              Refresco.rows[i].style.display = 'inline';
            } else {
              Refresco.rows[i].style.display = 'none';
            }
          }

        }

      </script>
      <script type="text/javascript" src="../JavaScript/complementos.js"></script>
    </body>
</html>