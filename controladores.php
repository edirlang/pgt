<?php
function indexAction(){
	require "plantillas/index.php";
}
function loginAction(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$usuario= $_POST['usuario'];
		$contrasena = $_POST['contrasena'];
		$usuario = ConsultarUsuario($usuario, $contrasena);
		
		if (isset($usuario['cedula'])) {
			header("Location: /pgt/index.php/Estudiantes");
			session_start();
			$_SESSION['usuario']=$usuario['cedula'];
			session_write_close();
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
		$estudiante = consultar_persona($codigo);
		$telefonos = consultar_telefono_persona($codigo);
		$correos = consultar_correos_persona($codigo);
		require "plantillas/Estudiante.php";
	}else{
		require "plantillas/Estudiantes.php";
	}
}

function profesor_Action(){


	if($_SERVER['REQUEST_METHOD']=='GET'){
		$codigo= $_GET['id'];
		$profesor = consultar_persona($codigo);
		$telefonos = consultar_telefono_persona($codigo);
		$correos = consultar_correos_persona($codigo);
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
		;
		if (isset($_POST['cod_proyecto'])) {
			$cod_proyecto = $_POST['cod_proyecto'];
			crear_Estudiante($codigo, $cedula, $nombre, $apellido, $cod_proyecto);
		}else{
			crear_Estudiante2($codigo, $cedula, $nombre, $apellido);
		}
		

		$telefonos = $_POST['Telefono'];
		$emails = $_POST['Email'];

		
		foreach ($telefonos as $telefono) {
			crear_Telefono_persona($cedula, $telefono);
		}
		foreach ($emails as $email) {
			crear_email_persona($cedula, $email);
		}
		if (isset($_POST['cod_proyecto'])) {
			header("Location: /pgt/index.php/Estudiantes");
		}
		
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
		
		$telefonos = $_POST['Telefono'];
		$emails = $_POST['Email'];

		crear_Profesor($cedula, $nombre, $apellido);
		foreach ($telefonos as $telefono) {
			crear_Telefono_persona($cedula, $telefono);
		}
		foreach ($emails as $email) {
			crear_email_persona($cedula, $email);
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
	
	$proyectos = proyectosView();
	$periodos = peridos();
	require "plantillas/Proyectos.php";
}

function ProyectosNuevoAction(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$titulo = $_POST['titulo'];
		$resumen = $_POST['resumen'];
		$fechaInicio = $_POST['fechaInicio'];
		$fechaAprovado = $_POST['fechaAprovacion'];
		$estado = "En Proceso";
		$director = $_POST['director'];
		$programas = $_POST['programa'];
        $nombre_a=$_FILES['archivo']['name'];
        $destino="archivo/".$nombre_a;
        $ubicacion_temp=$_FILES['archivo']['tmp_name']; 
        $estudiantes = $_POST['estudiantes'];
        move_uploaded_file($ubicacion_temp,$destino);

		$codigo = 0;
		$proyecto = ultima_fila("proyecto","cod_proyecto");
		if(isset($proyecto['cod_proyecto'])){
			
			$cod_actual = explode(".", $proyecto['cod_proyecto']);
			$codigo = '';
			if(date('m') < '06' ){
				$codigo = date('Y')."1";
			}else{
				$codigo = date('Y')."2";
			}

			if($cod_actual[0] == $codigo){
				$codigo = $codigo.".".($cod_actual[1]+1);
			}else{
				$codigo = $codigo."."."1";
			}
		}else{
			if(date('m') < '06' ){
				$codigo = date('Y')."1";
			}else{
				$codigo = date('Y')."2";
			}
			$codigo = $codigo."."."1";
		}

		crear_Proyecto($codigo, $titulo, $resumen, $fechaInicio, $fechaAprovado, $estado, $director, $destino);

		foreach ($programas as $programa) {
			$linea = explode(".", $programa);
			crear_linea_proyecto($linea[1] , $linea[0], $codigo);
		}
		foreach ($estudiantes as $estudiante) {
			$cod_estudiante = explode(".", $estudiante);
			CrearEstudianteProyecto($cod_estudiante[0], $codigo);
		}

		$_SERVER['REQUEST_METHOD']=='GET';
		header("Location: /pgt/index.php/Proyectos");
	}
	$programas = programa();
	$profesores = profesores();
	$estudiantes = estudiantes();
	require "plantillas/ProyectosNuevo.php";
}

function calificar_proyecto_action(){
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$jurado1 = $_POST['jurado1'];
		$jurado2 = $_POST['jurado2'];
		$calificacion1 = $_POST['calificacion1'];
		$calificacion2 = $_POST['calificacion2'];
		$cod_proyecto = $_POST['proyecto'];

		crear_jurado($jurado1, $cod_proyecto, $calificacion1);
		crear_jurado($jurado2, $cod_proyecto, $calificacion2);
		llamar_procedimiento("call CalificarProyecto('$cod_proyecto','$calificacion1','$calificacion2')");
		$estado;
		
		echo "<script> alert('Proyecto a sido evaliado, nuevo estado '".$estado."); </script>";
		header("Location: /pgt/index.php/Proyectos");
	}
	$proyectos = consultar_tabla2("proyecto","estado","Finalizado") ;
	require "plantillas/AgregarJurado.php";
}

function buscar_jurado_action(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = $_POST['id'];
		$director = consultar_tabla($id,"persona_proyecto","cod_proyecto");
		$profesores = consultar_exepto2("persona","cedula",$director['cod_persona']);
		echo json_encode($profesores);
	}
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
		//header("Location: /pgt/index.php/Profesores");
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
		crear_linea($codigo, $nombre, $programa);
		header("Location: /pgt/index.php/Lineas");
	}
}

function consultar_lineas_programa_action(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$cod_programa= $_POST['cod_programa'];
		$lineas = consultar_tabla2('linea','cod_programa',$cod_programa);
		echo json_encode($lineas);
	}	
}
function consultar_lineas_action(){
	$lineas = all_date_table('linea');
	require "plantillas/lineas.php";

}
function consultar_linea_action(){
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$id=$_POST['id'];
		$json=json_encode(consultar_tabla($id,"linea","cod_linea"));
		echo $json;
	}

}
function eliminar_linea_action(){
	if($_SERVER['REQUEST_METHOD']=='GET'){
		$codigo=$_GET['id'];
		eliminar_linea($codigo);
		header("Location: /pgt/index.php/Lineas");
	}else{
		header("Location: /pgt/index.php/Lineas");
	}

}
function detalle_proyecto_action(){

	if($_SERVER['REQUEST_METHOD']=='GET'){
		$id=$_GET['id'];
		$proyecto_d=consultar_tabla($id,"proyecto","cod_proyecto");
		$director = consultar_tabla($id,"persona_proyecto","cod_proyecto");
        $profesores_n=consultar_exepto2("persona","cedula",$director['cod_persona']);
		$programa_proyecto_d=consultar_tabla($id,"linea_proyecto","cod_proyecto");
		$linea_d=consultar_tabla($programa_proyecto_d['cod_linea'],"linea","cod_linea");
		$programa_d=consultar_tabla($programa_proyecto_d['cod_programa'],"programa","cod_programa");
        $detalles_proyecto_director=buscar_proyecto_directo_nombre($id);
        $proyecto_d_jurado=consultar_tabla_jurado($id);
		require "plantillas/detalles_proyecto.php";
	}

}
function buscar_proyecto_profesor(){
	$id=$_GET['id'];
	$director_proyecto=buscar_proyecto_directo($id);
	require "plantillas/proyecto_profesor.php";
}

function calificar_proyecto_direcctor_action(){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$proyecto=$_POST['proyecto'];
		$director  =$_POST['director'];
		$calificacion = $_POST['calificacion'];
		llamar_procedimiento("call calificar_proyecto_director('$proyecto','$director','$calificacion')");
		echo "1";
		
	}	
}

function consultar_proyecto_estado_action()
{
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$estado = $_POST['estado'];
		$proyectos = ConsultarProyectoEstado($estado);
		$periodos = peridos();
		require "plantillas/Proyectos.php";
	}
}

function consultar_proyecto_ano_action()
{
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$an_buscar = $_POST['an_buscar'];
		$proyectos = ConsultarProyectoano($an_buscar);
		$periodos = peridos();
		
		require "plantillas/Proyectos.php";
	}
}

function consultar_proyecto_linea_action()
{
	if($_SERVER['REQUEST_METHOD']=='GET'){
		$linea = $_GET['id'];
		$proyectos = llamar_procedimiento_consulta("call ConsultarProyectosLinea('$linea')");
		require "plantillas/Proyectos2.php";
	}
}

function consultar_proyecto_programa_action()
{
	if($_SERVER['REQUEST_METHOD']=='GET'){
		$linea = $_GET['id'];
		$proyectos = llamar_procedimiento_consulta("call ConsultarProyectosPrograma('$linea')");
		require "plantillas/Proyectos2.php";
	}
}

function peridos(){
	$proyectos = proyectosView();
	$periodos = array();
	foreach ($proyectos as $proyecto) {
		$periodo = explode('.',$proyecto['cod_proyecto']);
		$aux = true;

		foreach ($periodos as $row) {
			if($row == $periodo[0]){
				$aux = false;		
			}
		}
		if($aux){
			array_push($periodos, $periodo[0]);	
		}	
	}
	return $periodos;
}
?>
