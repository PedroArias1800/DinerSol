<?php
    include("../Config/conexion.php");

    if(isset($_REQUEST['email'])){

        $email = $_POST['email'];
        $sqlUpdate = $datos->exec("UPDATE usuario SET hash='', fecha_hash= NULL WHERE email='$email'");
        
        if($sqlUpdate){
            echo '<meta http-equiv="refresh" content="0; url=../Secciones/cambiarContraseña.php">';
        }
        
        $smg = 'Ocurrio un error inesperado, si el error persiste porfavor comunicarse con el equipo de DinerSol UTP.';
        echo '<meta http-equiv="refresh" content="0; url=../Secciones/cambiarContraseña.php?msg='.$msg.'">';
    }else
        echo '<meta http-equiv="refresh" content="0; url=../Secciones/cambiarContraseña.php">';
?>