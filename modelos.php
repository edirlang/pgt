<?php 

require_once "config.php";

function cerrar_secion(){
	session_start();
	session_unset();
	session_destroy();
	header("Location: /pgt/index.php/login");
}

function ConsultarUsuario($cedula, $contrasena){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM usuario where cedula='$cedula' and contrasena='$contrasena'";
	$resultado = mysqli_query($conexion,$consulta);

	$usuario= array();

	echo mysqli_error($conexion);
	while ($fila = mysqli_fetch_assoc($resultado)) {
		$usuario=$fila;
	}
	cerrar_conexion_db($conexion);
	return $usuario;
}

function estudiantes(){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM estudiante";
	$resultado = mysqli_query($conexion,$consulta);

	$usuarios = array();
	echo mysqli_error($conexion);
	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($usuarios, $fila);
	}
	cerrar_conexion_db($conexion);
	return $usuarios;
}

function crear_Estudiante($codigo, $cedula, $nombre, $apellido, $proyecto){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO estudiante values('$codigo', '$cedula','$apellido','$nombre','$proyecto')";
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}

function consultar_Estudiante($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT *  from estudiante where cod_estudiante ='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$estudiante = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$estudiante = $fila;
	}

	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	return $estudiante;
}

function crear_Telefono_Estudiante($codigo, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO estudiante_telefono values('$codigo', '$telefono')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function crear_Email_Estudiante($codigo, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO estudiante_correo values('$codigo', '$telefono')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function consultar_Telefono_Estudiante($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT * FROM estudiante_telefono WHERE cod_estudiante='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$telefonos = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$telefonos[] = $fila;
	}
	cerrar_conexion_db($conexion);
	return $telefonos;
}

function consultar_correos_Estudiante($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT * FROM estudiante_correo WHERE cod_estudiante='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$correos = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$correos[] = $fila;
	}
	cerrar_conexion_db($conexion);
	return $correos;
}

function proyectos(){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM proyecto";
	$resultado = mysqli_query($conexion,$consulta);

	$usuarios = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($usuarios, $fila);
	}
	cerrar_conexion_db($conexion);
	return $usuarios;
}

function proyectosView(){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM proyectos";
	$resultado = mysqli_query($conexion,$consulta);

	$usuarios = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($usuarios, $fila);
	}
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	return $usuarios;
}


function ultima_fila($tabla, $campo){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM $tabla order by $campo desc limit 1";
	$resultado = mysqli_query($conexion,$consulta);

	$proyecto = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$proyecto = $fila;
	}
	cerrar_conexion_db($conexion);
	return $proyecto;
}

function crear_Proyecto($codigo, $titulo, $resumen, $fechainicio, $fechaaprovacion, $estado,$director , $destino){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO proyecto values('$codigo', '$titulo','$resumen','$estado','$fechainicio','$fechaaprovacion','$destino')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
	crear_director($director, $codigo);	
}

function crear_director($cedula, $cod_proyecto){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO profesor_proyecto values('$cod_proyecto','$cedula','director','')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function calificar_proyecto($codigo, $calificaion){
	$conexion = conectar_base_datos();
	$consulta  = "UPDATE proyecto set estado = '$calificaion' where cod_proyecto = '$codigo'";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function crear_jurado($cedula, $cod_proyecto, $calificacion){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO profesor_proyecto values('$cod_proyecto','$cedula','jurado','$calificacion')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}
function crear_linea_proyecto($linea, $programa, $cod_proyecto){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO linea_proyecto values('$linea','$cod_proyecto','$programa')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function profesores(){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM profesor";
	$resultado = mysqli_query($conexion,$consulta);

	$usuarios = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($usuarios, $fila);
	}
	cerrar_conexion_db($conexion);
	return $usuarios;
}

function crear_Profesor($cedula, $nombre, $apellido){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO profesor values('$cedula','$nombre','$apellido')";
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}

function consultar_Profesor($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT * FROM profesor WHERE cedula='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$correos = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$correos= $fila;
	}
	cerrar_conexion_db($conexion);
	return $correos;
}

function crear_Telefono_Profesor($cedula, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO profesor_telefono values('$cedula', '$telefono')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function crear_Email_Profesor($cedula, $emails){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO profesor_correo values('$cedula', '$emails')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}
function programa(){

	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM programa";
	$resultado = mysqli_query($conexion,$consulta);

	$programa = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($programa, $fila);
	}
	cerrar_conexion_db($conexion);
	return $programa;	
}



function consultar_Telefono_profesor($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT * FROM profesor_telefono WHERE cod_profesor='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$telefonos = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$telefonos[] = $fila;
	}
	cerrar_conexion_db($conexion);
	return $telefonos;
}

function consultar_correos_profesor($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT * FROM profesor_correo WHERE cod_profesor='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$correos = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$correos[] = $fila;
	}
	cerrar_conexion_db($conexion);
	return $correos;
}

function eliminar_profesor($codigo){
	$conexion=conectar_base_datos();
	$consulta="DELETE FROM  profesor_correo WHERE  cod_profesor='$codigo'";
	$consulta1="DELETE FROM  profesor_telefono where cod_profesor='$codigo'";
	$consulta2="DELETE FROM  profesor WHERE  cedula='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$resultado1 = mysqli_query($conexion,$consulta1);
	$resultado2 = mysqli_query($conexion,$consulta2);
	cerrar_conexion_db($conexion);
}

function consultar_tabla($id,$table,$id_table){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM $table WHERE $id_table='$id'";
	$resultado = mysqli_query($conexion,$consulta);
	$programa = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$programa = $fila;
	}
	cerrar_conexion_db($conexion);
	return $programa;
}

function consultar_tabla2($table,$id_table, $id){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM $table WHERE $id_table='$id'";
	$resultado = mysqli_query($conexion,$consulta);
	$valores = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($valores, $fila);
	}
	cerrar_conexion_db($conexion);
	return $valores;
}

function consultar_exepto($tabla,$campo,$valor){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM $tabla WHERE $campo !='$valor'";
	$resultado = mysqli_query($conexion,$consulta);
	$valores = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($valores, $fila);
	}
	cerrar_conexion_db($conexion);
	return $valores;
}

function modificar_programa(){
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$conexion = conectar_base_datos();
		$cod_programa=$_POST['cod_programa'];
		$nom_programa=$_POST['nom_programa'];
		$consulta =  "UPDATE programa Set nom_programa='$nom_programa' where cod_programa='$cod_programa'"; 
		mysqli_query($conexion,$consulta);
		cerrar_conexion_db($conexion);
	}
}

function programa_ingreso($codigo, $nom){

	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO programa values('$codigo', '$nom')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}

function crear_linea($codigo, $nombre, $programa){

	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO linea values('$codigo', '$nombre','$programa')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}




function all_date_table($table){
 $conexion = conectar_base_datos();
$consulta="SELECT * FROM $table";
$resultado=mysqli_query($conexion,$consulta);
$date=array();
while ($file=mysqli_fetch_assoc($resultado)) {
  $date[]=$file;
}
return $date;
	cerrar_conexion_db($conexion);
}
function modificar_linea(){
if ($_SERVER['REQUEST_METHOD']=="POST") {
		$conexion = conectar_base_datos();
		$cod_linea=$_POST['cod_linea'];
		$nom_linea=$_POST['nom_linea'];
	    $cod_programa=$_POST['cod_programa'];
		$consulta =  "UPDATE linea Set nom_linea='$nom_linea', cod_programa='$cod_programa' where cod_linea='$cod_linea'"; 
		mysqli_query($conexion,$consulta);
		cerrar_conexion_db($conexion);
	}

}


function eliminar_linea($codigo){
	$conexion=conectar_base_datos();
	$consulta="DELETE FROM  linea WHERE  cod_linea='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	cerrar_conexion_db($conexion);
}


function buscar_proyecto_directo($id){

   	$conexion = conectar_base_datos();
	$consulta = "SELECT * from profesor_proyecto,proyecto where profesor_proyecto.cod_proyecto=proyecto.cod_proyecto AND cod_profesor='$id'";
	$resultado = mysqli_query($conexion,$consulta);
	$programa = array();
	while ($fila = mysqli_fetch_assoc($resultado)) {
		$programa[] = $fila;
	}
	cerrar_conexion_db($conexion);
	return $programa;
}
function  buscar_proyecto_directo_nombre($id){


   	$conexion = conectar_base_datos();
	$consulta = "SELECT nom_profesor,ape_profesor from profesor_proyecto,profesor where profesor_proyecto.cod_profesor=profesor.cedula AND cod_proyecto='$id'";
	$resultado = mysqli_query($conexion,$consulta);
	$programa = array();
	while ($fila = mysqli_fetch_assoc($resultado)) {
		$programa= $fila;
	}
	cerrar_conexion_db($conexion);
	return $programa;

}
//$consulta = "SELECT titulo from profesor_proyecto,proyecto where profesor_proyecto.cod_proyecto=proyecto.cod_proyecto AND cod_proyecto='$id'";