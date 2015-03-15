<?php 
	/**
	* Clase encargada de la conexion a la bd
	*/
	class conexion
	{
		function conectar_base_datos (){
			$conexion=pg_connect("  host=localhost port=5432 dbname=pgt user=postgres password=1234 ");
			if(!$conexion){
				echo 'No se pudo conectar con la jodida BD';
			}
			return $conexion;
		}
		function cerrar_conexion_db($conexion){
			pg_close($conexion);
		}
	}
	?>