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
			case "/pgt/index.php/modificar_proyecto":
			Modificar_Proyecto();
		break;

		case "/pgt/index.php/Profesores":
			ProfesoresAction();
		break;

		case "/pgt/index.php/profesor":
			profesor_Action();
		break;

		
		case "/pgt/index.php/salir":
			SalirAction();
		break;
			case "/pgt/index.php/programa":
			programa_Action();
		break;
       		case "/pgt/index.php/eliminar_profesor":
			eliminar_profesor_action();
		break;
        	case "/pgt/index.php/consultar_programa":
			consultar_prpgrama_action();
		break;
		case "/pgt/index.php/modificar_programa":
			modificar_programa();
		break;
			case "/pgt/index.php/modificar_estudiante":
		modificar_estudiante();
		break;
		case "/pgt/index.php/programa_ingreso":
			require "plantillas/programa_ingreso.php";
		break;
		case "/pgt/index.php/Programa_guardar":
			programa_ingreso_action();
		break;

		case "/pgt/index.php/linea_ingresar":
			ingresar_linea_action();
		break;

		case "/pgt/index.php/linea_guardar":
			crear_linea_action();
		break;

		case "/pgt/index.php/buscar_lineas_programa":
			consultar_lineas_programa_action();
		break;
		case "/pgt/index.php/Lineas":
			consultar_lineas_action();
		break;
		case "/pgt/index.php/consultar_linea":
			consultar_linea_action();
		break;
		case "/pgt/index.php/modificar_linea":
			modificar_linea();
		break;
		case "/pgt/index.php/eliminar_linea":
			eliminar_linea_action();
		break;
		case "/pgt/index.php/detalle_proyecto":
			detalle_proyecto_action();
		break;

		case "/pgt/index.php/AgregarJurado":
			calificar_proyecto_action();
		break;

		case "/pgt/index.php/buscar_jurado":
			buscar_jurado_action();
		break;
		
		case "/pgt/index.php/profesor_proyectos":
			buscar_proyecto_profesor();
		break;

		case "/pgt/index.php/director/calificarproyecto";
			calificar_proyecto_direcctor_action();
		break;

		case "/pgt/index.php/proyecto/consultar_estado";
			consultar_proyecto_estado_action();
		break;
		case "/pgt/index.php/proyecto/consultar_an";
			consultar_proyecto_ano_action();
		break;

		case "/pgt/index.php/proyecto/consultar_linea";
			consultar_proyecto_linea_action();
		break;

		case "/pgt/index.php/proyecto/consultar_programa";
			consultar_proyecto_programa_action();
		break;
	}

?>
