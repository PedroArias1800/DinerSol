<?php
    /*include('../Config/conexion.php');

    $nombre = $_REQUEST['nombre'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['telefono'];
    $tipo = $_REQUEST['tipo'];
    $numPedido = $_REQUEST['numPedido'];
    $fechaPedido = $_REQUEST['fechaPedido'];
    $pedido = var_dump($_REQUEST['pedido']);*/

    $to = $correo;
    $subject = "Datos de Pedido";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: DinerSol";
    $message  = '<html><body>
                    <div jslog="20277; u014N:xr6bB; 4:W251bGwsbnVsbCxbXV0.">
                        <div>
                            <div bgcolor="#ffffff" marginwidth="0" marginheight="0">
                                <center>
                                    <table width="563" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="563">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" align="right"><p target="_blank" ><img style="display:block" src="https://utp.ac.pa/documentos/2015/imagen/logo_utp_1_300.png" width="92" height="90" border="0"></p></td>
                                                                <td align="left">
                                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign="bottom">
                                                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                                                        <tbody><tr><td><table>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="bottom" align="left"><p style="text-decoration:none;font-family:'."'Arial Narrow'".',Arial,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;color:#51034f" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://dominospanama.com/pages/order/%23/locations/search/lang%3Des&amp;source=gmail&amp;ust=1638759140883000&amp;usg=AOvVaw18v0QCjjVuPXSCaktIn10Y">&nbsp;Diner Sol - UTP&nbsp;</p></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table></td></tr></tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td valign="top" align="left"><img style="display:block" src="https://ci6.googleusercontent.com/proxy/5ASOZd5VjJ-2vah3uwHcVqGHMTZC-XQWBrj5NYn3kq8pGUGjSQPz-nT8WJkKAPfDBjGTOi6mc6qXqPW-lBgsoTdTF-pCSJeq2FDZhll0bSst6cNM=s0-d-e1-ft#http://cache.dominos.com/nolo/email-assets/en/000102/images/x.gif" width="82" height="20" alt=""></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"><table cellpadding="0" cellspacing="0" width="563">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top"><img style="display:block" src="https://ci4.googleusercontent.com/proxy/rEjIfUeXPHLm7av7Dh6FGL8g8eB799to6bewiGYZqaWNWUiM48LKullShy_EpkEOUw=s0-d-e1-ft#http://images/email/spacer.gif" width="56" height="1" alt="" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlXQ.."></td>
                                                            <td valign="top"><img style="display:block" src="https://ci6.googleusercontent.com/proxy/5ASOZd5VjJ-2vah3uwHcVqGHMTZC-XQWBrj5NYn3kq8pGUGjSQPz-nT8WJkKAPfDBjGTOi6mc6qXqPW-lBgsoTdTF-pCSJeq2FDZhll0bSst6cNM=s0-d-e1-ft#http://cache.dominos.com/nolo/email-assets/en/000102/images/x.gif" width="494" height="15" alt="">
                                                                <table cellpadding="0" cellspacing="0" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="text-align:left"><font face="Arial, Helvetica, sans-serif" size="2" color="#000000" style="font-size:12px">Su orden fue realizada con exito, estos son los datos de su orden.<br>
                                                                                <br>
                                                                                Gracias por utilizar DinerSol UTP para realizar su pedido, si tiene algun problema con su orden, comuniquese con el equipo de <a href="https://localhost/Universidad/DinerSol/">DinerSol UTP.</a>
                                                                            </font></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 15px; border:4px solid #51034f; border-radius: 1%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding:15px;">
                                                                                                <font face="Arial, Helvetica, sans-serif" style="line-height:18px;">
                                                                                                    <font color="#9c1998" size="2" style="font-size:14px;"> Información del Cliente<br></font>
                                                                                                    <font color="#000000" size="2" style="font-size:12px">
                                                                                                        <strong>Nombre:</strong> Jordan Alvarado <br>
                                                                                                        <strong>Correo:</strong> jrdnja20.11@gmail.com <br>
                                                                                                        <strong>Cedula:</strong> 8-954-1826 <br>
                                                                                                        <strong>Teléfono:</strong> 507 6033-1211 <br>
                                                                                                        <strong>Tipo de Usuario:</strong> Estudiante
                                                                                                        <br>
                                                                                                        <br>
                                                                                                    </font>
                                                                                                    <font color="#9c1998" size="2" style="font-size:14px">Detalles de la Orden <br></font>
                                                                                                    <font color="#000000" size="2" style="font-size:12px">
                                                                                                        <strong>Orden:</strong> #000001 <br>
                                                                                                        <strong>Fecha:</strong> 04/12/2021 7:00PM 
                                                                                                        <br>
                                                                                                        <br>
                                                                                                        <strong>Datos de factura:</strong><br>
                                                                                                    </font>

                                                                                                    <table cellpadding="6" cellspacing="0" border="0" width="450">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td width="10%" bgcolor="51034f"><font face="Arial, Helvetica, sans-serif" size="1" color="#ffffff" style="line-height:18px;font-size:11px"><strong>Cantidad</strong></font></td>
                                                                                                                <td width="80%" bgcolor="51034f"><font face="Arial, Helvetica, sans-serif" size="1" color="#ffffff" style="line-height:18px;font-size:11px"><strong>Producto</strong></font></td>
                                                                                                                <td width="10%" bgcolor="51034f"><font face="Arial, Helvetica, sans-serif" size="1" color="#ffffff" style="line-height:18px;font-size:11px"><strong>Monto</strong></font></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td width="10%"><font face="Arial, Helvetica, sans-serif" size="1" color="#000000" style="line-height:18px;font-size:11px"><strong>1</strong></font></td>
                                                                                                                <td width="80%">
                                                                                                                    <table cellpadding="0" cellspacing="0" style="width:100%;font-family:Arial,Helvetica,sans-serif;font-size:11px">
                                                                                                                        <tbody>
                                                                                                                            <tr> <td style="font-weight:bold;padding-right:5px">Combo #1</td> </tr>
                                                                                                                            <tr>
                                                                                                                                <td colspan="2" style="padding-top:5px"> 
                                                                                                                                    <strong>Combo:</strong> Arroz con Pollo, Snicker, Botella de Agua. 
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                                <td width="10%" align="right"><font face="Arial, Helvetica, sans-serif" size="1" color="#ed232c" style="font-size:11px"><strong>$4.25</strong></font></td>
                                                                                                            </tr>                                      
                                                                                                            <tr>
                                                                                                                <td width="10%"><font face="Arial, Helvetica, sans-serif" size="1" color="#000000" style="line-height:18px;font-size:11px"><strong>1</strong></font></td>
                                                                                                                <td width="80%">
                                                                                                                    <table cellpadding="0" cellspacing="0" style="width:100%;font-family:Arial,Helvetica,sans-serif;font-size:11px">
                                                                                                                        <tbody>
                                                                                                                            <tr> <td style="font-weight:bold;padding-right:5px">Mini Pretzel</td> </tr>
                                                                                                                            <tr>
                                                                                                                                <td colspan="2" style="padding-top:5px">
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                                <td width="10%" align="right"><font face="Arial, Helvetica, sans-serif" size="1" color="#ed232c" style="font-size:11px"><strong>$0.75</strong></font></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <br>
                                                                                                    <br>
                                                                                                    <table width="450" cellpadding="2" cellspacing="0" border="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td width="60%"></td>
                                                                                                                <td align="right" width="27%"><font size="2" style="font-size:12px" color="#000000"><strong>Sub-Total:</strong></font></td>
                                                                                                                <td align="right"><font size="2" style="font-size:12px" color="#000000">$5.00</font></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td></td>
                                                                                                                <td colspan="2" align="right" style="padding-top:12px"><font size="3" color="#ed232c" style="font-size:18px"><strong>Total: 5.00</strong> </font></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>

                                                                                                    <font color="#9c1998" size="2" style="font-size:14px">Detalles del Pago <br></font>
                                                                                                    <font color="#000000" size="2" style="font-size:12px">
                                                                                                        <strong>Método de Pago:</strong> Tarjeta de Credito $5.00<br>
                                                                                                        <font size="1" style="font-size:11px">
                                                                                                            <em></em>
                                                                                                        </font>
                                                                                                    </font>
                                                                                                    <br>
                                                                                                </font>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                        </div>
                    </div>
                </body></html>';

    if(mail($to, $subject, $message, $headers)){
        $msg='Pedido exitoso, le fue enviado un correo con los detalles del pedido.';
        echo '<meta http-equiv="refresh" content="0; url=../Secciones/hacerPedido.php?msg='.$msg.'">';
    }
    else{
        $msg='Ocurrio un error al enviar el mensaje.';
        echo '<meta http-equiv="refresh" content="0; url=../Secciones/hacerPedido.php?error='.$msg.'">';
    }
?>