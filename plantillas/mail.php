<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form id="formulario" method="post" action="php/enviar.php" enctype="multipart/form-data">
                    <div class="campos">
                        <label>Para:</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="campos">
                        <label>Asunto:</label>
                        <input type="text" name="asunto">
                    </div>
                    <div class="campos">
                        <label>Mensaje:</label>
                        <textarea name="mensaje"></textarea>
                    </div>
 
                    <label>Imagen:</label>
                    <input type="file" name="hugo" id="imagen" />
 
                    <input id="submit" type="submit" name="enviar" value="Enviar mail">
                </form>
</body>
</html>

<?php
//Librerías para el envío de mail
include_once('/pgt/phpmailer/class.phpmailer.php');
include_once('/pgt/phpmailer/class.smtp.php');
 
//Recibir todos los parámetros del formulario
$para = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$archivo = $_FILES['hugo'];
 
//Este bloque es importante
$mail = new PHPMailer();
$mail->Host = "localhost";

 
//Nuestra cuenta
$mail->Username ='fernando.ricaurte@hotmail.com';
$mail->Password = 'depekk'; //Su password
 
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
            window.location="http://localhost/maillocal/index.php"
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
            window.location="http://localhost/maillocal/index.php"
         </script>';
}
?>