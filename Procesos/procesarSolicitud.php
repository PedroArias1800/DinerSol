<?php
    include("../Config/conexion.php");

    if(isset($_REQUEST['correo'])){

        $correo = $_REQUEST['correo'];
        $hash = md5(rand(10, 1000));

        date_default_timezone_set('America/Panama'); //Colocar la zona horaria de Panamá
        $fecha = date('Y-m-d'); // Campo para ingresar la fecha actual.
        
        //Comprobar los minutos actuales para poder agregarle 15 minutos. 
        if(date('i') < 45){
            $fecha .= ' '.date('H').':'.(date('i') + 15);
        }else{
            if(date('H') < 22)
                $fecha .= ' '.(date('H') + 1).':'.((date('i') + 15)-60);
            else
                $fecha .= ' '.((date('H') + 1) - 24).':'.((date('i') + 15)-60);
        }

        //$resultado = $datos->query("SELECT nombre, apellido, hash FROM usuario WHERE email='$correo'");
        $sqlUpdate = $datos->exec("UPDATE usuario SET hash='$hash', fecha_hash='$fecha' WHERE email='$correo'");

        if($sqlUpdate){

            //$full_name = $row['nombre']. ' '. $row['apellido'];
    
            $text_message = 'Ingrese al siguiente enlace para cambiar su contraseña y recuperar el accesos a su cuenta.'.
                            '<br><a href="localhost/DinerSol/Secciones/cambiarContraseña.php?h='.$hash.'&e='.$correo.'">Cambiar Contraseña</a>';

            $to = $correo;
            $subject = "Cambiar Contraseña";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: DinerSol";
            $message  = '<html><body style="width: 100%; background-color:#ffffff;">
                        <table style="max-width:700px; border:0; background-color:#e0e0e0; display: flex; flex-direction: column; align-items: center;" width="100%" cellpadding="0" cellspacing="0">
                            <tr><td>
                                <table width="100%" cellpadding="0" cellspacing="0" style=" padding: 0 25%; background-color:#fff; font-family:Verdana, Geneva, sans-serif; border:0;">
                                    <thead>
                                        <tr height="80">
                                            <th colspan="4" style="background-color:#ffffff; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;">
                                                <img style="width: 120px; margin: 5px 0;" src="https://utp.ac.pa/documentos/2015/imagen/logo_utp_1_300.png">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" style="padding:15px; text-align:center;">
                                                <p style="font-size:23px;">DinerSol- Sistemas De Cafeterías UTP</p>
                                                <hr />
                                                <p style="font-size:20px;">Hola Estimado usuario</p>
                                                <p style="font-size:16px; font-family:Verdana, Geneva, sans-serif;">'.$text_message.'.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr style="display: flex; align-items: center; justify-content: center; background-color: #51034f; padding: 25px 10px; color: white;">
                                            <td>
                                                <img style="width: 90px; margin-right: 0rem; border-radius:50%;" src="https://yt3.ggpht.com/Y1L8TzdsdTe30KxXrueVXL8N5W9CL3JCR0oiFtlieiTJ4p24mMiDYRNHHuS9nPawWz1vEFO0BZY=s900-c-k-c0x00ffffff-no-rj" alt="UTP Logo">
                                            </td>
                                            <td>                            
                                                <p style="margin-left: 10px; font-weight: normal; font-size:.8rem;">
                                                    Universidad Tecnológica de Panamá - 2021<br>
                                                    Dirección: Avenida Universidad Tecnológica de Panamá, Vía Puente Centenario,<br>
                                                    Campus Metropolitano Víctor Levi Sasso.<br>
                                                    Teléfono. (507) 560-3000<br>
                                                    Correo electrónico: buzondesugerencias@utp.ac.pa<br>
                                                    311 Centro de Atención Ciudadana<br>
                                                    Políticas de Privacidad<br>
                                                </p>
                                            </td>
                                            <td>
                                            <div style="width: 130px; margin-left: 20px; border-right: 2px solid #ffffff;  font-weight: normal; font-size:.8rem;">
                                                    <a style="color: #ffffff;" href="">Matrícula UTP</a><br>
                                                    <a style="color: #ffffff;" href="">Correo UTP</a><br>
                                                    <a style="color: #ffffff;" href="">Biblioteca UTP</a><br>
                                                    <a style="color: #ffffff;" href="">Publicaciones</a><br>
                                                    <a style="color: #ffffff;" href="">Sala De Prensa</a><br>
                                                    <a style="color: #ffffff;" href="">Bolsa De Trabajo</a><br>
                                                    <a style="color: #ffffff;" href="">Acreditación</a><br>
                                                    <a style="color: #ffffff;" href="">Centro De Lenguas</a><br>
                                                </div>
                                            </td>
                                            <td>
                                            <div style="width: 130px; margin-left: 5px; font-weight: normal; font-size:.8rem;">
                                                    <a style="color: #ffffff;" href="">Mapa De Ubicación</a><br>
                                                    <a style="color: #ffffff;" href="">Mapa Del Sitio</a><br>
                                                    <a style="color: #ffffff;" href="">Directorio Telefónico</a><br>
                                                    <a style="color: #ffffff;" href="">Contáctenos</a><br>
                                                    <a style="color: #ffffff;" href="">Identidad Visual</a><br>
                                                </div>
                                            </td>                        
                                        </tr>
                                    </tfoot>
                                </table>
                            </td></tr>
                        </table>
                    </body></html>';

            if(mail($to, $subject, $message, $headers)){
                $msg='Revice el mensaje que le enviamos a su correo para poder cambiar su contraseña.';
                echo '<meta http-equiv="refresh" content="0; url=../Secciones/recuperarContraseña.php?msg='.$msg.'">';
            }
            else{
                $msg='Ocurrio un error al enviar el mensaje.';
                echo '<meta http-equiv="refresh" content="0; url=../Secciones/recuperarContraseña.php?error='.$msg.'">';
            }
        }else{
            $msg='No existe una cuenta asociada al correo ingresado.';
            echo '<meta http-equiv="refresh" content="8; url=../Secciones/recuperarContraseña.php?error='.$msg.'">';
        }
    }
?>