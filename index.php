<?php 
require_once "modelos.php";
require_once "controladores.php";
session_start();

$url = $_SERVER['REQUEST_URI'];
$uri = explode("?", $url);

	switch ($uri[0]) {
		case "/pgt/index.php/": case "/pgt/index.php":
			indexAction();
		break;
		case "/pgt/index.php/login":
			loginAction();
		break;
		case "/pgt/index.php/Estudiantes":
		EstudiantesAction();
		break;

		case "/pgt/index.php/Estudiante/nuevo":
			Estudiante_nuevo_Action();
		break;

		case "/pgt/index.php/Estudiante":
			EstudianteAction();
		break;
		
		case "/pgt/index.php/Proyectos":
		ProyectosAction();
		break;
		case "/pgt/index.php/Proyectos/nuevo":
			ProyectosNuevoAction();
		break;	

		case "/pgt/index.php/Profesor/nuevo":
			Profesor_nuevo_Action();
		break;

		case "/pgt/index.php/Profesores":
			ProfesoresAction();
		break;
		
		case "/pgt/index.php/salir":
			SalirAction();
		break;
	}

?>