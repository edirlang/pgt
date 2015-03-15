<?php 
require_once 'conexion.php';
/**
* Entidad Estudainte
*/
class Estudiante extends conexion
{
	public function estudiantes(){
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

	public function crear_Estudiante($codigo, $cedula, $nombre, $apellido, $proyecto){
		$conexion = conectar_base_datos();
		$consulta  = "INSERT INTO estudiante values('$codigo', '$cedula','$apellido','$nombre','$proyecto')";
		pg_query($conexion,$consulta);
		echo pg_last_error($conexion);
		cerrar_conexion_db($conexion);
	}

	public function consultar_Estudiante($codigo){
		$conexion = conectar_base_datos();
		$consulta  = "SELECT *  from estudiante where cod_estudiante ='$codigo'";
		$resultado = pg_query($conexion,$consulta);
		$estudiante = array();

		while ($fila = pg_fetch_assoc($resultado)) {
			$estudiante = $fila;
		}

		echo pg_last_error($conexion);
		cerrar_conexion_db($conexion);
		return $estudiante;
	}

	public function crear_Telefono_Estudiante($codigo, $telefono){
		$conexion = conectar_base_datos();
		$consulta  = "INSERT INTO estudiante_telefono values('$codigo', '$telefono')";
		echo pg_last_error($conexion);
		pg_query($conexion,$consulta);
		cerrar_conexion_db($conexion);
	}

	public function crear_Email_Estudiante($codigo, $telefono){
		$conexion = conectar_base_datos();
		$consulta  = "INSERT INTO estudiante_correo values('$codigo', '$telefono')";
		echo mysqli_error($conexion);
		pg_query($conexion,$consulta);
		cerrar_conexion_db($conexion);
	}

	public function consultar_Telefono_Estudiante($codigo){
		$conexion = conectar_base_datos();
		$consulta  = "SELECT * FROM estudiante_telefono WHERE cod_estudiante='$codigo'";
		$resultado = pg_query($conexion,$consulta);
		$telefonos = array();

		while ($fila = pg_fetch_assoc($resultado)) {
			$telefonos[] = $fila;
		}
		cerrar_conexion_db($conexion);
		return $telefonos;
	}

	public function consultar_correos_Estudiante($codigo){
		$conexion = conectar_base_datos();
		$consulta  = "SELECT * FROM estudiante_correo WHERE cod_estudiante='$codigo'";
		$resultado = pg_query($conexion,$consulta);
		$correos = array();

		while ($fila = pg_fetch_assoc($resultado)) {
			$correos[] = $fila;
		}
		cerrar_conexion_db($conexion);
		return $correos;
	}
}
?>