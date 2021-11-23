<?php
    session_start();
    //Verificando si la sessión existe
    if(!isset($_SESSION['ss'])){
        header('Location: ../index.php');
    }

?>