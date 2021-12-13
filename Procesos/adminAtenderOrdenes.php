<?php 

    include("verificarUsuario.php");
    include("../Config/conexion.php");

    if(isset($_POST['id_orden'])){
        echo $idPro = $_POST['id_orden'];

        $atendido = "Atendido";

        $sqlUpdate = $datos->exec("UPDATE orden SET estado = '$atendido' WHERE id_orden='$idPro'");
        header("Location: ../Secciones/atenderOrdenes.php?exito=¡Se atendió la orden $idPro correctamente!");
        exit;

    }else{
        echo "No llegaron los datos";
        echo '<meta http-equiv="refresh" content="0; url=../Secciones/atenderOrdenes.php?exito=Error, inténtelo nuevamente...">';
        exit;
    }
    
?>