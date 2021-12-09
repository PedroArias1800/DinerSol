<?php 

include("verificarUsuario.php");
include("../Config/conexion.php");



if(isset($_POST['id_orden'])){
    echo $idPro = $_POST['id_orden'];


    $atendido = "atendido";



    $sqlUpdate = $datos->exec("UPDATE orden SET estado = '$atendido' WHERE id_orden='$idPro'");
    echo '<meta http-equiv="refresh" content="0; url=../Secciones/atenderOrdenes.php?exito=¡Se actualizó el producto correctamente!">';
    exit;



}else{
    echo "No llegaron los datos";
}
?>