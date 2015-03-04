<?php
function indexAction(){
	require "plantillas/index.php";
}
function loginAction(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$usuario= $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		header("Location: /pgt/index.php/Estudiantes");	
	}else{
		header("Location: /pgt/index.php/");
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
		require "plantillas/Estudiante.php";
	}else{
		require "plantillas/Estudiantes.php";
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

function ProyectosAction(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$codigo= $_POST['cod_proyecto'];
		$titulo = $_POST['titulo'];
		$resumen = $_POST['resumen'];
		$fechaInicio = $_POST['fechaInicio'];
		$fechaAprovado = $_POST['fechaAprovacion'];
		$estado = $_POST['estado'];
		crear_Proyecto($codigo, $titulo, $resumen, $fechaInicio, $fechaAprovado, $estado);

	}
	$proyectos = proyectos();
	require "plantillas/Proyectos.php";
}

function SalirAction(){
	require "plantillas/index.php";
}

?>