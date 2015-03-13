<?php 
function conectar_base_datos (){
    $conexion=pg_connect("  host=localhost port=5432 dbname=pgt user=postgres password=1234 ");
    if(!$conexion){
        echo 'No se pudo conectar con la jodida BD';
    }
    return $conexion;
}
function cerrar_conexion_db($conexion){
    pg_close($conexion);
}

function cerrar_secion(){
	session_start();
	session_unset();
	session_destroy();
	header("Location: /pgt/index.php/login");
}

function ConsultarUsuario($cedula, $contrasena){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM usuario where cedula='$cedula' and contrasena='$contrasena'";
	$resultado = pg_query($conexion,$consulta);

	$usuario= array();

	while ($fila = pg_fetch_assoc($resultado)) {
		$usuario=$fila;
	}
	cerrar_conexion_db($conexion);
	return $usuario;
}

function estudiantes(){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM estudiante";
	$resultado = pg_query($conexion,$consulta);

	$usuarios = array();

	while ($fila = pg_fetch_assoc($resultado)) {
		array_push($usuarios, $fila);
	}
	cerrar_conexion_db($conexion);
	return $usuarios;
}

function crear_Estudiante($codigo, $cedula, $nombre, $apellido, $proyecto){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO estudiante values('$codigo', '$cedula','$apellido','$nombre','$proyecto')";
	pg_query($conexion,$consulta);
	echo pg_last_error($conexion);
	cerrar_conexion_db($conexion);
}

function consultar_Estudiante($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT *  from estudiante where codigo ='$codigo')";
	pg_query($conexion,$consulta);
	$estudiante = array();

	while ($fila = pg_fetch_assoc($resultado)) {
		$estudiante = $fila;
	}

	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	return $estudiante;
}

function crear_Telefono_Estudiante($codigo, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO estudiante_telefono values('$codigo', '$telefono')";
	echo pg_last_error($conexion);
	pg_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function crear_Email_Estudiante($codigo, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO estudiante_correo values('$codigo', '$telefono')";
	echo mysqli_error($conexion);
	pg_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function proyectos(){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM proyecto";
	$resultado = pg_query($conexion,$consulta);

	$usuarios = array();

	while ($fila = pg_fetch_assoc($resultado)) {
		array_push($usuarios, $fila);
	}
	cerrar_conexion_db($conexion);
	return $usuarios;
}

function crear_Proyecto($codigo, $titulo, $resumen, $fechainicio, $fechaaprovacion, $estado,$director){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO proyecto values('$codigo', '$titulo','$resumen','$estado','$fechainicio','$fechaaprovacion','$director')";
	echo pg_last_error($conexion);
	pg_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function profesores(){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM profesor";
	$resultado = pg_query($conexion,$consulta);

	$usuarios = array();

	while ($fila = pg_fetch_assoc($resultado)) {
		array_push($usuarios, $fila);
	}
	cerrar_conexion_db($conexion);
	return $usuarios;
}

function crear_Profesor($cedula, $nombre, $apellido, $cargo){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO profesor values('$cedula','$cargo','$nombre','$apellido')";
	pg_query($conexion,$consulta);
	echo pg_last_error($conexion);
	cerrar_conexion_db($conexion);
}

function consultar_Profesor($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT *  from profesor where cedula ='$codigo')";
	pg_query($conexion,$consulta);
	$estudiante = array();

	while ($fila = pg_fetch_assoc($resultado)) {
		$estudiante = $fila;
	}

	echo pg_last_error($conexion);
	cerrar_conexion_db($conexion);
	return $estudiante;
}

function crear_Telefono_Profesor($cedula, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO profesor_telefono values('$cedula', '$telefono')";
	echo pg_last_error($conexion);
	pg_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function crear_Email_Profesor($codigo, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO profesor_correo values('$cedula', '$telefono')";
	echo mysqli_error($conexion);
	pg_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function crear_director($cedula){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO director values('$cedula')";
	echo pg_last_error($conexion);
	pg_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}