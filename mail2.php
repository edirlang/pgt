<?php
//Librerías para el envío de mail
include_once('phpmailer/class.phpmailer.php');
include_once('phpmailer/class.smtp.php');
 
//Recibir todos los parámetros del formulario
$para = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$archivo = $_FILES['hugo'];
 
//Este bloque es importante
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.hotmail.com";
$mail->Port = 465;
 
//Nuestra cuenta
$mail->Username ='f3rnando-21@hotmail.com';
$mail->Password = 'F1ricaurte'; //Su password
 
//Agregar destinatario
$mail->AddAddress($para);
$mail->Subject = $asunto;
$mail->Body = $mensaje;
//Para adjuntar archivo
$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
$mail->MsgHTML($mensaje);
 
//Avisar si fue enviado o no y dirigir al index
if($mail->Send())
{
    echo'<script type="text/javascript">
            alert("Enviado Correctamente");
            window.location="http://localhost/pgt/mail.php"
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
            window.location="http://localhost/pgt/mail.php"
         </script>';
}
?>