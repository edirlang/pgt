<?php 
require 'conexion.php';
/**
* Entidad Estudainte
*/
class Estudiante extends conexion
{
	function estudiantes(){
		$conexion = conectar_base_datos();
		$consulta = "SELECT * FROM Estudiantes";
		$resultado = mysqli_query($conexion,$consulta);

		$usuarios = array();

		while ($fila = mysqli_fetch_assoc($resultado)) {
			array_push($usuarios, $fila);
		}
		cerrar_conexion_db($conexion);
		return $usuarios;
	}

	function crear_Estudiante($codigo, $cedula, $nombre, $apellido, $proyecto){
		$conexion = conectar_base_datos();
		$consulta  = "INSERT INTO Estudiantes values('$codigo', '$cedula','$nombre','$apellido','$proyecto')";
		mysqli_query($conexion,$consulta);
		echo mysqli_error($conexion);
		cerrar_conexion_db($conexion);
	}

	function consultar_Estudiante($codigo){
		$conexion = conectar_base_datos();
		$consulta  = "SELECT *  from Estudiantes where codigo ='$codigo')";
		mysqli_query($conexion,$consulta);
		$estudiante = array();

		while ($fila = mysqli_fetch_assoc($resultado)) {
			$estudiante = $fila;
		}

		echo mysqli_error($conexion);
		cerrar_conexion_db($conexion);
		return $estudiante;
	}
}
?>