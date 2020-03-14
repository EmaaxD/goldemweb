<?php 
session_start();
require_once '../funciones/funciones.php';
require_once '../../includes/fuciones/conexion.db.php';
$conexion = conexion();

//recivimos los datos del formulario y lo almacenamos
if (isset($_POST['titulo_event'])) {
	$titulo = ucfirst($_POST['titulo_event']);
	$categoria_id = (int) $_POST['categoria'];
	$invitado_id = (int) $_POST['invitado'];
	//obtener la fecha y hora
	$fecha = formatearFecha($_POST['fecha_evento']);
	$hora = $_POST['hora_evento'];
	$hora_formateada = date("H:m", strtotime($hora));
}




//verificamos de donde viene los datos
if ($_POST['registro'] == 'nuevo') {
	
	try {
		$stmt = $conexion->prepare("INSERT INTO eventos (name_event,date_event,hour_event,id_cat_event,id_inv) VALUES(?,?,?,?,?)");
		$stmt->bind_param('sssii', $titulo,$fecha,$hora_formateada,$categoria_id,$invitado_id);
		$stmt->execute();
		$id_insertado = $stmt->insert_id;
		//pregunta si inserto algo
		if ($stmt->affected_rows) {
			$respuesta = array(
				'respuesta' => 'exito',
				'id_insertado' => $id_insertado,
				'msj' => 'Evento Creado Correctamente'
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error',
				'msj' => 'No se pudo crear el evento'
			);
		}
		$stmt->close();

	} catch (Exception $e) {
		echo "Error".$e->getMessage();
	}

	die(json_encode($respuesta));
}

if ($_POST['registro'] == 'actualizar') {

	//tomamos la id del registro editado
	$id_evento = (int) $_POST['id_evento'];

	try {

		$stmt = $conexion->prepare("UPDATE eventos SET name_event = ?, date_event = ?,hour_event = ?, id_cat_event = ?, id_inv = ?, editado = NOW() WHERE id_eventos = ?");
		$stmt->bind_param("sssiii",$titulo,$fecha,$hora_formateada,$categoria_id,$invitado_id,$id_evento);
		$stmt->execute();
		if ($stmt->affected_rows) {
			$respuesta = array(
				'respuesta' => 'exito',
				'id_actualizado' => $id_evento,
				'msj' => 'El evento se actualizo correctamente'
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error',
				'msj' => 'error al actualizar evento'
			);
		}

		$stmt->close();
	} catch (Exception $e) {
		echo "Error".$e->getMessage();
	}

	die(json_encode($respuesta));
}

if ($_POST['registro'] == 'eliminar') {
	$id_borrar = $_POST['id'];

	try {

		$stmt = $conexion->prepare('DELETE FROM eventos WHERE id_eventos = ?');
		$stmt->bind_param('i',$id_borrar);
		$stmt->execute();
		if ($stmt->affected_rows) {
			$respuesta = array(
				'respuesta' => 'exito',
				'id_eliminar' => $id_borrar
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error',
				'msj' => 'Error al eliminar evento'
			);
		}

		$stmt->close();
		
	} catch (Exception $e) {
		echo "Error:".$e->getMessage();
	}

	die(json_encode($respuesta));
}