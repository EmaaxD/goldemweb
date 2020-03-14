<?php 
session_start();
require_once '../funciones/funciones.php';
require_once '../../includes/fuciones/conexion.db.php';
$conexion = conexion();

//recivimos los datos del formulario y lo almacenamos
if (isset($_POST['nombre_categoria'])) {
	$nombre_categoria = ucfirst($_POST['nombre_categoria']);
	$icono = $_POST['icon'];
}




//verificamos de donde viene los datos
if ($_POST['registro'] == 'nuevo') {
	
	try {
		$stmt = $conexion->prepare("INSERT INTO categoria_evento (cat_event,icons) VALUES(?,?)");
		$stmt->bind_param('ss', $nombre_categoria,$icono);
		$stmt->execute();
		$id_insertado = $stmt->insert_id;
		//pregunta si inserto algo
		if ($stmt->affected_rows) {
			$respuesta = array(
				'respuesta' => 'exito',
				'id_insertado' => $id_insertado,
				'msj' => 'Categoria Creado Correctamente'
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error',
				'msj' => 'No se pudo crear la categoria'
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
	$id_categoria = (int) $_POST['id_categoria'];

	try {

		$stmt = $conexion->prepare("UPDATE categoria_evento SET cat_event = ?, icons = ?, editado = NOW() WHERE id_categoria = ?");
		$stmt->bind_param("ssi",$nombre_categoria,$icono,$id_categoria);
		$stmt->execute();
		if ($stmt->affected_rows) {
			$respuesta = array(
				'respuesta' => 'exito',
				'id_actualizado' => $id_categoria,
				'msj' => 'La categoria se actualizo correctamente'
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error',
				'msj' => 'error al actualizar categoria'
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

		$stmt = $conexion->prepare('DELETE FROM categoria_evento WHERE id_categoria = ?');
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
				'msj' => 'Error al eliminar la categoria'
			);
		}

		$stmt->close();
		
	} catch (Exception $e) {
		echo "Error:".$e->getMessage();
	}

	die(json_encode($respuesta));
}