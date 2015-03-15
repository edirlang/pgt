<?php 
	/**
	* 
	*/
	require_once "/pgt/modelo/Estudiante.php";

	class EstudainteController
	{
		$estudiante = new Estudiante();
		public function EstudiantesAction(){
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
			}
			$proyectos = proyectos();
			$estudiantes = estudiantes();
			require "plantillas/Estudiantes.php";
		}
		public function EstudianteAction(){
			if($_SERVER['REQUEST_METHOD']=='GET'){
				$codigo= $_GET['id'];

				$estudiante = consultar_Estudiante($codigo);
				require "plantillas/Estudiante.php";
			}else{
				require "plantillas/Estudiantes.php";
			}
		}
	}
	?>