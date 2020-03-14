<?php 

require_once 'funciones/sessiones.php';
require_once '../includes/fuciones/conexion.db.php';
$conexion = conexion();

$sql = "SELECT date_registro, COUNT(*) AS resultado FROM registrados GROUP BY DATE(date_registro) ORDER BY date_registro";
$resultado = $conexion->query($sql);

$arreglo_registro = array();
while($registro_dia = $resultado->fetch_assoc()) {

	$fecha = $registro_dia['date_registro'];
	$registro['fecha'] = date('Y-m-d', strtotime($fecha));
	$registro['cantidad'] = $registro_dia['resultado'];

	$arreglo_registro[] = $registro;
}


die(json_encode($arreglo_registro));
