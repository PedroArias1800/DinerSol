<?php

    include('../Config/conexion.php');
    include('../Clases/Usuario.php');
    
    if(isset($_GET['con'])){
        $con = $_GET['con'];

        $u = $_GET['u'];
        $p = md5($_GET['p']);

        $num_rows = 0;

        if($con == 'login'){

         $consulta = $datos->query("SELECT u.id_usuario, u.nombre, u.apellido, u.cedula, u.id_tipo, u.email, o.id_orden, o.total, o.estado, c.id_cafeteria
                                    FROM usuario u INNER JOIN orden o ON u.id_usuario = o.id_usuario
                                                   INNER JOIN cafeteria c ON c.id_cafeteria = o.id_cafeteria
                                    WHERE email='$u' AND password='$p'
                                    ORDER BY o.id_orden DESC
                                    LIMIT 1 ");       

            while($listadoUsuarios=$consulta->fetch(PDO::FETCH_OBJ)){
                $arr = array('id_usuario' => $listadoUsuarios->id_usuario, 'nombre' => $listadoUsuarios->nombre, 'apellido'=>$listadoUsuarios->apellido, 'cedula'=>$listadoUsuarios->cedula, 'id_tipo'=>$listadoUsuarios->id_tipo, 'email' => $listadoUsuarios->email, 'id_orden'=> $listadoUsuarios->id_orden, 'total'=>$listadoUsuarios->total, 'estado'=>$listadoUsuarios->estado, 'nomCaf'=>$listadoUsuarios->id_cafeteria);
                $num_rows = 1;
                echo json_encode($arr);
            }

            if($num_rows == 0){
                print json_encode(null);
            }
        }

        if($con == 'registrar'){   
            $data = json_decode(file_get_contents('php://input'), true);
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $cedula = $data['cedula'];
            $telefono = $data['telefono'];
            $foto = "user.png";
            $tipoUsuario = 5;
            $email = $data['email'];
            $password = md5($data['contra']);

            $user = new Usuario($nombre, $apellido, $cedula, $telefono, $foto, $tipoUsuario, $email, $password);
            $insertar = $datos->prepare("INSERT INTO usuario (nombre, apellido, cedula, telefono, foto, id_tipo, email, password) VALUES (:nombre, :apellido, :cedula, :telefono, :foto, :tipoUsuario, :email, :password)");

            try{
                $insertar->execute((array)$user);           
                print json_encode(1);

            } catch (PDOException $ex){
                print json_encode(0);
            }

        }

    }

?>