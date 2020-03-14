<?php 

function conexion(){

	$data = array(

			"local" => "localhost",
			"user" => "root",
			"pass" => "",
			"database" => "goldpage"
	);
	$conexion = new mysqli ($data['local'],$data['user'],$data['pass'],$data['database']);

	//verificamos si no hay errores al conectarnos a la base de datos
	if ($conexion->connect_error) {
		echo "Error al conectarse a la base de datos";
	}

	//cambiamos los caracteres a utf8
	if (!mysqli_set_charset($conexion,"utf8")) {
		echo "Error cargando el conjunto de caracteres utf8: %s\n";
	}else{
		//mostramos el conjunto de caracter que usa
		// echo mysqli_character_set_name($conexion);
		return $conexion;
	}
}

?>