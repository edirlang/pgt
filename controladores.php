<?php
function indexAction(){
	require "plantillas/index.php";
}
function loginAction(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$usuario= $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$usuario = ConsultarUsuario($usuario, $contrasena);
		session_start();
		$_SESSION['usuario']=$usuario['cedula'];
		if (isset($usuario['cedula'])) {
			header("Location: /pgt/index.php/Estudiantes");
		}
		else{
			header("Location: /pgt/index.php/");
		}
	}else{
		require "plantillas/login.php";
	}
}

function EstudiantesAction(){
	$estudiantes = estudiantes();
	require "plantillas/Estudiantes.php";
}
function EstudianteAction(){
	if($_SERVER['REQUEST_METHOD']=='GET'){
		$codigo= $_GET['id'];
		$estudiante = consultar_Estudiante($codigo);
		$telefonos = consultar_Telefono_Estudiante($codigo);
		$correos = consultar_correos_Estudiante($codigo);
		require "plantillas/Estudiante.php";
	}else{
		require "plantillas/Estudiantes.php";
	}
}

function profesor_Action(){


		if($_SERVER['REQUEST_METHOD']=='GET'){
		$codigo= $_GET['id'];
        $profesor=consultar_Profesor($codigo);
		$telefonos = consultar_Telefono_profesor($codigo);
		$correos = consultar_correos_profesor($codigo);
		require "plantillas/Profesor.php";
	}else{
		require "plantillas/Profesores.php";
	}
}

function Estudiante_nuevo_Action(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$cedula= $_POST['Cedula'];
		$nombre = $_POST['Nombre'];
		$apellido = $_POST['Apellido'];
		$codigo = $_POST['Codigo'];
		$cod_proyecto = $_POST['cod_proyecto'];

		$telefonos = $_POST['Telefono'];
		$emails = $_POST['Email'];

		crear_Estudiante($codigo, $cedula, $nombre, $apellido, $cod_proyecto);
		foreach ($telefonos as $telefono) {
			crear_Telefono_Estudiante($codigo, $telefono);
		}
		foreach ($emails as $email) {
			crear_Email_Estudiante($codigo, $email);
		}
		header("Location: /pgt/index.php/Estudiantes");
	}else{
		$proyectos = proyectos();
		require "plantillas/nuevo_estudiante.php";
	}

}

function Profesor_nuevo_Action(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$cedula= $_POST['cedula'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cargo = $_POST['cargo'];
		
		$telefonos = $_POST['Telefono'];
		$emails = $_POST['Email'];

		crear_Profesor($cedula, $nombre, $apellido, $cargo);
		foreach ($telefonos as $telefono) {
			crear_Telefono_Profesor($cedula, $telefono);
		}
		foreach ($emails as $email) {
			crear_Email_Profesor($cedula, $email);
		}
		header("Location: /pgt/index.php/Profesores");
	}else{
		require "plantillas/CrearProfesor.php";
	}

}

function ProfesoresAction(){
	$profesores = profesores();
	require "plantillas/Profesores.php";
}

function ProyectosAction(){
	$proyectos = proyectos();
	require "plantillas/Proyectos.php";
}

function ProyectosNuevoAction(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$codigo= $_POST['cod_proyecto'];
		$titulo = $_POST['titulo'];
		$resumen = $_POST['resumen'];
		$fechaInicio = $_POST['fechaInicio'];
		$fechaAprovado = $_POST['fechaAprovacion'];
		$estado = $_POST['estado'];
		$director = $_POST['director'];
		$programa = $_POST['programa'];
		$linea = $_POST['linea'];
		//crear_director($director);
		crear_Proyecto($codigo, $titulo, $resumen, $fechaInicio, $fechaAprovado, $estado, $director);
		crear_linea_proyecto($linea, $programa, $codigo);
		header("Location: /pgt/index.php/Proyectos");
	}
	$programas = programa();
	$profesores = profesores();
	require "plantillas/ProyectosNuevo.php";
}

function SalirAction(){
	cerrar_secion();
	require "plantillas/index.php";
}


function programa_Action(){
    $programas=programa();
	require "plantillas/programa.php";
}

function eliminar_profesor_action(){

if($_SERVER['REQUEST_METHOD']=='GET'){
	      $codigo=$_GET['id'];
		eliminar_profesor($codigo);
	header("Location: /pgt/index.php/Profesores");
	}else{
		header("Location: /pgt/index.php/Profesores");
	}
}


function consultar_prpgrama_action(){
	if ($_SERVER['REQUEST_METHOD']=="POST") {
	$id=$_POST['id'];
	$json=json_encode(consultar_tabla($id,"programa","cod_programa"));
	echo $json;
}
}
function programa_ingreso_action() {

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$codigo= $_POST['cod_programa'];
		$nom = $_POST['nom_programa'];
		programa_ingreso($codigo, $nom);
		header("Location: /pgt/index.php/programa");
	}
}

function ingresar_linea_action() {
	$programas = programa();
	require "plantillas/linea_ingreso.php";
}

function crear_linea_action() {

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$codigo= $_POST['cod_linea'];
		$nombre = $_POST['nom_linea'];
		$programa = $_POST['programa'];
		programa_ingreso($codigo, $nom);
		crear_linea($codigo, $nombre, $programa);
		header("Location: /pgt/index.php/programa");
	}
}

function consultar_lineas_programa_action(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$cod_programa= $_POST['cod_programa'];
		$lineas = consultar_tabla2('linea','cod_programa',$cod_programa);
		echo json_encode($lineas);
	}	
}
?>