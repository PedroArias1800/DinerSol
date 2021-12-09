


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/atenderOrdenes.css">
    <link rel="stylesheet" href="../CSS/normalice.css">
    <link rel="stylesheet" href="../css/">
    <title>Atender Ordenes</title>
</head>
<body>

<div class="headerphp">
        <?php require('header.php'); 
        
        
        $consultarProductos = $datos->query("SELECT
        o.id_orden,
        c.nombre,
        u.nombre as nom_usuario,
        u.email,
        o.total,
        o.estado,
        o.created_at
        
        FROM orden o INNER JOIN cafeteria c ON o.id_cafeteria=c.id_cafeteria
        INNER JOIN usuario U ON o.id_usuario = U.id_usuario");
        
        
        ?>
    </div>
    <div class="headimg">
            <div class="TituloCompleto">
            <h1>Atender Ordenes</h1>
        </div>
        </div>

<div class="main">



 <?php  while($producto=$consultarProductos->fetch(PDO::FETCH_OBJ)) {  ?>
    <form action="../Procesos/adminAtenderOrdenes.php" method="POST">
<div class="ordenes">

<div class="order-nombre">
<h2>ID de la factura:</h2>
<input type="text" name="id_orden" id="" value="<?php echo $producto->id_orden; ?>" hidden>



<h2><?php echo $producto->id_orden; ?></H2>
</div>

<div class="order-code">
    <h4>Informacion de tu pedido</h4>
    <h3> <?php echo $producto->nom_usuario; ?> </h3>
</div>

<div class="order-pedido-info">


<div class="order-pedido">

    <label for="">ID del pedido:</label>
    <P>12121212121212</P>
</div>
<div class="facturado">
    <label for="">Facturado a:</label>
    <p><?php echo $producto->email; ?></p>
</div>
</div>
<div class="order-pedido-info2">
<div class="order-fecha">
    <label for="">Fecha del pedido:</label>
    <p><?php echo $producto->created_at; ?></p>
</div>
<div class="order-total">
   <p>Total
   <strong>5.50$</strong></p>
</div>
</div>
<button class="btn"><?php echo $producto->estado; ?> </button>
</div>
</form>

<?php } ?>
</div>


   
<?php require('footer.html'); ?>
    
</body>
</html>