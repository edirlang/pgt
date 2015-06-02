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
	$consulta = "SELECT * FROM persona where cod_persona != 'doc'";
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
	$consulta  = "INSERT INTO persona values( '$cedula','$codigo','$nombre','$apellido')";
	mysqli_query($conexion,$consulta);
	$consulta  = "INSERT INTO persona_proyecto values('$proyecto', '$cedula','estudiante','')";
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}


function crear_Estudiante2($codigo, $cedula, $nombre, $apellido){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO persona values('$cedula','$codigo','$nombre','$apellido')";
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}
function registros_telefono($id){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT * FROM persona_telefono  where cod_persona='$id'";
    $resultado = mysqli_query($conexion,$consulta);
    $reg = mysqli_num_rows(  $resultado); 
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	return $reg;
}
function modificar_estudiante(){

	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$conexion = conectar_base_datos();
		$cod_persona=$_POST['cod_persona'];
		$nom_persona=$_POST['nom_persona'];
		$ape_persona=$_POST['ape_persona'];
	    
		$cedula=$_POST['cedula'];
        $consulta =  "UPDATE persona Set nom_persona='$nom_persona', ape_persona='$ape_persona' where cod_persona='$cod_persona'"; 
	    mysqli_query($conexion,$consulta);

		if (isset($_POST['tel_persona'])) {
			    $tel_persona=$_POST['tel_persona'];
				$tel=$_POST['tel'];
		        for ($i=1; $i <=count($tel_persona) ; $i++) { 
				update_telefono($cod_persona,$tel_persona[$i],$tel[$i]);
			   }
		}
	
	   if(isset($_POST['correo_persona'])){
			    $correo=$_POST['correo'];
			    $correo_persona=$_POST['correo_persona'];	
		for ($i=1; $i <=count($correo_persona) ; $i++) {
		 echo $correo_persona[$i].$correo[$i]; 
			update_correo($cod_persona,$correo_persona[$i],$correo[$i]);
		}
      }
       if($cod_persona=$_POST['cod_persona']=='doc'){
      header('Location: Profesores');

       }else{
       	 header('Location: Estudiantes');
       }
	  echo mysqli_error($conexion);
	  cerrar_conexion_db($conexion);
	 
	}
}

function update_telefono($cod_estudiante,$tel_estudiante,$tel){
    $conexion = conectar_base_datos();
	$consulta2 =  "UPDATE persona_telefono Set num_telefono='$tel_estudiante'  where  num_telefono='$tel'"; 
	mysqli_query($conexion,$consulta2);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}
function update_correo($cod_estudiante,$correo_estudiante,$correo){
    $conexion = conectar_base_datos();
	$consulta2 =  "UPDATE persona_correo Set nom_correo='$correo_estudiante'  where  nom_correo='$correo'"; 
	mysqli_query($conexion,$consulta2);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}
function CrearEstudianteProyecto($cod_persona, $cod_proyecto){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO persona_proyecto values('$cod_proyecto', '$cod_persona','estudiante','')";
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
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
	$consulta = "SELECT proyectos2.cod_proyecto, proyectos2.titulo, proyectos2.estudiante, proyectos2.director, proyectos.jurado FROM proyectos2 LEFT OUTER JOIN proyectos ON proyectos.cod_proyecto = proyectos2.cod_proyecto";
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

function crear_Proyecto($codigo, $titulo, $resumen, $fechainicio, $estado,$director , $destino){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO proyecto values('$codigo', '$titulo','$resumen','$estado','$fechainicio','','$destino')";
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	crear_director($director, $codigo);	
}

function crear_director($cedula, $cod_proyecto){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO persona_proyecto values('$cod_proyecto','$cedula','director','')";
	mysqli_query($conexion,$consulta);
	mysqli_error($conexion);
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
	$consulta  = "INSERT INTO persona_proyecto values('$cod_proyecto','$cedula','jurado','$calificacion')";
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
	$consulta = "SELECT * FROM `persona` WHERE cod_persona='doc';";
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
	$consulta  = "INSERT INTO persona values('$cedula','doc','$nombre','$apellido')";
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}

function AgregarRol($cedula, $proyecto, $rol, $calificacion){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO persona_proyecto values('$proyecto',$cedula','$rol','$calificacion')";
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
} 

function buscar_jurado($proyecto){

}

function consultar_persona($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT * FROM persona WHERE cedula='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$correos = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$correos= $fila;
	}
	cerrar_conexion_db($conexion);
	return $correos;
}

function crear_Telefono_persona($cedula, $telefono){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO persona_telefono values('$cedula', '$telefono')";
	echo mysqli_error($conexion);
	mysqli_query($conexion,$consulta);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}

function crear_email_persona($cedula, $emails){
	$conexion = conectar_base_datos();
	$consulta  = "INSERT INTO persona_correo values('$cedula', '$emails')";
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



function consultar_Telefono_persona($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT * FROM persona_telefono WHERE cod_persona='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$telefonos = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		$telefonos[] = $fila;
	}
	cerrar_conexion_db($conexion);
	return $telefonos;
}

function consultar_correos_persona($codigo){
	$conexion = conectar_base_datos();
	$consulta  = "SELECT * FROM persona_correo WHERE cod_persona='$codigo'";
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
	$consulta="DELETE FROM  persona_correo WHERE  cod_persona='$codigo'";
	$consulta1="DELETE FROM  persona_telefono where cod_persona='$codigo'";
	$consulta2="DELETE FROM  prersona WHERE  cedula='$codigo'";
	$resultado = mysqli_query($conexion,$consulta);
	$resultado1 = mysqli_query($conexion,$consulta1);
	$resultado2 = mysqli_query($conexion,$consulta2);
	mysqli_error($conexion);
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

function consultar_exepto2($tabla,$campo,$valor){
	$conexion = conectar_base_datos();
	$consulta = "SELECT * FROM $tabla WHERE $campo !='$valor' and cod_persona = 'doc'";
	$resultado = mysqli_query($conexion,$consulta);
	mysqli_error($conexion);
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
	cerrar_conexion_db($conexion);
	return $date;
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
	$consulta = "SELECT * from persona_proyecto,proyecto where persona_proyecto.cod_proyecto = proyecto.cod_proyecto AND cod_persona='$id' and rol='director'";
	$resultado = mysqli_query($conexion,$consulta);
	$programa = array();
	while ($fila = mysqli_fetch_assoc($resultado)) {
		$programa[] = $fila;
	}
	mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	return $programa;
}
function  buscar_proyecto_directo_nombre($id){


   	$conexion = conectar_base_datos();
	$consulta = "SELECT nom_persona,ape_persona,cedula from persona_proyecto,persona where persona_proyecto.cod_persona=persona.cedula AND cod_proyecto ='$id'";
	$resultado = mysqli_query($conexion,$consulta);
	$programa = array();
	while ($fila = mysqli_fetch_assoc($resultado)) {
		$programa= $fila;
	}
	cerrar_conexion_db($conexion);
	return $programa;

}

function llamar_procedimiento($procedimiento){
	$conexion = conectar_base_datos();
	$resultado = mysqli_query($conexion,$procedimiento);
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
}

function llamar_procedimiento_consulta($procedimiento){
	$conexion = conectar_base_datos();
	$resultado = mysqli_query($conexion,$procedimiento);
	$proyectos = array();
	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($proyectos, $fila);
	}
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	return $proyectos;
}

function ConsultarProyectoEstado($estado){
	$conexion = conectar_base_datos();
	$consulta = "SELECT proyectos2.cod_proyecto, proyectos2.titulo, proyectos2.estudiante, proyectos2.director, proyectos.jurado FROM proyectos2 LEFT OUTER JOIN proyectos ON proyectos.cod_proyecto = proyectos2.cod_proyecto where proyectos2.estado='$estado';";
	$resultado = mysqli_query($conexion,$consulta);

	$proyectos = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($proyectos, $fila);
	}
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	return $proyectos;
}

function ConsultarProyectoano($an_buscar){
	$conexion = conectar_base_datos();
	$consulta = "SELECT proyectos2.cod_proyecto, proyectos2.titulo, proyectos2.estudiante, proyectos2.director, proyectos.jurado FROM proyectos2 LEFT OUTER JOIN proyectos ON proyectos.cod_proyecto = proyectos2.cod_proyecto where  proyectos2.cod_proyecto like '".$an_buscar."%' ";
	$resultado = mysqli_query($conexion,$consulta);

	$proyectos = array();

	while ($fila = mysqli_fetch_assoc($resultado)) {
		array_push($proyectos, $fila);
	}
	echo mysqli_error($conexion);
	cerrar_conexion_db($conexion);
	return $proyectos;
}



function consultar_tabla_jurado($id){
   	$conexion = conectar_base_datos();
	$consulta = "SELECT nom_persona,ape_persona from persona_proyecto,persona where persona_proyecto.cod_persona=persona.cedula AND persona_proyecto.cod_proyecto ='$id' and persona_proyecto.rol='jurado'";
	$resultado = mysqli_query($conexion,$consulta);
	$programa = array();
	while ($fila = mysqli_fetch_assoc($resultado)) {
		$programa[]= $fila;
	}
	cerrar_conexion_db($conexion);
	return $programa;
}
function Modificar_Proyecto(){
if ($_SERVER['REQUEST_METHOD']=="POST") {
		$conexion = conectar_base_datos();
	
		$nombre_a=$_FILES['archivo']['name'];
        $destino="archivo/".$nombre_a;
        $ubicacion_temp=$_FILES['archivo']['tmp_name']; 
        move_uploaded_file($ubicacion_temp,$destino);


		$cod_proyecto=$_POST['cod_proyecto'];
		$titulo=$_POST['titulo'];
	    $resumen=$_POST['resumen'];	    
 	    $archivo_viejo=$_POST['archivo_v'];
 	    //$director=$_POST['director'];
 	    // $director_c=$_POST['director_c'];
 	    //echo $director."dsadas";
 	    //  echo $director_c;
	    if(empty($nombre_a)){
	    $destino=$archivo_viejo;
	    }

         $consulta2 =  "UPDATE proyecto Set titulo='$titulo', resumen='$resumen' , archivo='$destino' where cod_proyecto='$cod_proyecto'"; 
		 mysqli_query($conexion,$consulta2);
	      
	    // $consulta =  "UPDATE persona_proyecto Set cod_persona='$director' where cod_proyecto='$cod_proyecto' And cod_persona='$director_c' AND rol='director'"; 
		 //mysqli_query($conexion,$consulta);

		cerrar_conexion_db($conexion);
		header("Location: detalle_proyecto?id=$cod_proyecto");
	}

}