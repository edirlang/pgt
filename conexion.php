<?php 
	$cn = mysqli_connect("localhost","root","","pgt");
	if(!$cn){
		die("Error no se logro conectar con la base de datos".mysqli_connect_error());
	}
	header('Content-Type: text/html; charset=utf-8');
    $cn->query("SET NAMES 'utf8'");
    $cn->query("SET CHARACTER SET utf8");
	return $cn;


?>