<?php 
function conectar_base_datos(){
	$conexion = mysqli_connect("localhost","root","1994edi","pgt");
	if(!$conexion){
		die("Error no se logro conectar con la base de datos".mysqli_connect_error());
	}
	$conexion->query("SET NAMES 'utf8'");
	$conexion->query("SET CHARACTER SET utf8");

	return $conexion;
}

function cerrar_conexion_db($conexion){
	mysqli_close($conexion);
}

function cerrar_secion(){
	session_start();
	session_unset();
	session_destroy();
	header("Location: login");
}

function estudiantes(){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM Estudiantes";
	$resultado = mysqli_query($conexion,$consulta);

	$usuarios = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($usuarios, $fila);
	}
	cerrar_conexion_db($conexion);
	return $usuarios;
}

function proyectos(){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM Proyectos";
	$resultado = mysqli_query($conexion,$consulta);

	$usuarios = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($usuarios, $fila);
	}
	cerrar_conexion_db($conexion);
	return $usuarios;
}

function crear_Estudiante($codigo, $cedula, $nombre, $apellido, $proyecto){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO Estudiantes values('$codigo', '$cedula','$nombre','$apellido','$proyecto')";
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}

function consultar_Estudiante($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT *  from Estudiantes where codigo ='$codigo')";
	mysqli_query($conexion,$consulta);
	$estudiante = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$estudiante = $fila;
	}

	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	return $estudiante;
}

function crear_Proyecto($codigo, $titulo, $resumen, $fechainicio, $fechaaprovacion, $estado){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO Proyectos values('$codigo', '$titulo','$resumen','','$fechainicio','$fechaaprovacion','$estado')";
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function crear_Telefono_Estudiante($codigo, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO tel_estudiante values('$codigo', '$telefono')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function crear_Email_Estudiante($codigo, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO email_estudiante values('$codigo', '$telefono')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}