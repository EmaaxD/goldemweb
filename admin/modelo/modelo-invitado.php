<?php 
require_once '../funciones/funciones.php';
require_once '../../includes/fuciones/conexion.db.php';
$conexion = conexion();

//recivimos los datos del formulario y lo almacenamos
if (isset($_POST['nombre_invitado'])) {
	$nombre_invitado = ucfirst($_POST['nombre_invitado']);
	$apellido_invitado = ucfirst($_POST['apellido_invitado']);
	$biografia_invitado = $_POST['biografia_invitado'];
}



//verificamos de donde viene los datos
if ($_POST['registro'] == 'nuevo') {

	// $respuesta = array(
	// 	'post' => $_POST,
	// 	'file' => $_FILES
	// );

	// die(json_encode($respuesta));

	if (empty($nombre_invitado) || empty($apellido_invitado) || empty($biografia_invitado)) {
		$respuesta = array(
			'respuesta' => 'error',
			'msj' => 'Rellena todo los campos'
		);

	}else{

		//si no ahi campos vacios de tipo text

		//ubicacion de las imgs
		$directorio = "../../img/invitados/";

		//recivimos la url de la img
		$url_img_invitado = imgValida($_FILES,'imagen_invitado',$directorio);

		//preguntamos si tiene un error la img
		if ($url_img_invitado == 'errorFormat') {
			$respuesta = array(
				'respuesta' => 'error',
				'msj'=> 'Formato del archivo no valido, solo: JPG,PNG'
			);

		}elseif ($url_img_invitado == 'errorImgVacia') {
			$respuesta = array(
				'respuesta' => 'error',
				'msj'=> 'No selecciono ninguna imagen'
			);
		}else{
			//esta todo correcto
			try {
				$stmt = $conexion->prepare("INSERT INTO invitados (name_invitado,lastname_invitado,description,url_img) VALUES(?,?,?,?)");
				$stmt->bind_param('ssss', $nombre_invitado,$apellido_invitado,$biografia_invitado,$url_img_invitado);
				$stmt->execute();
				$id_insertado = $stmt->insert_id;
				//pregunta si inserto algo
				if ($stmt->affected_rows) {
					$respuesta = array(
						'respuesta' => 'exito',
						'id_insertado' => $id_insertado,
						'msj' => 'Invitado Creado Correctamente'
					);
				}else{
					$respuesta = array(
						'respuesta' => 'error',
						'msj' => 'No se pudo crear invitado'
					);
				}
				$stmt->close();

			} catch (Exception $e) {
				echo "Error".$e->getMessage();
			}
		}
	}

	die(json_encode($respuesta));
}

if ($_POST['registro'] == 'actualizar') {

	//tomamos la id del registro editado
	$id_invitado = (int) $_POST['id_invitado'];

	if (empty($nombre_invitado) || empty($apellido_invitado) || empty($biografia_invitado)) {
		$respuesta = array(
			'respuesta' => 'error',
			'msj' => 'Rellena todos los campos'
		);

	}else{

		//si no ahi campos vacios de tipo text
		$directorio = "../../img/invitados/";
		
		//recivimos la url de la img
		$url_img_invitado = imgValida($_FILES,'imagen_invitado',$directorio,'editar');

		//preguntamos si tiene un error la img
		if ($url_img_invitado == 'errorFormat') {
			$respuesta = array(
				'respuesta' => 'error',
				'msj'=> 'Formato del archivo no valido, solo: JPG,PNG'
			);

		}elseif ($url_img_invitado == 'errorImgVacia') {
			$respuesta = array(
				'respuesta' => 'error',
				'msj'=> 'No selecciono ninguna imagen'
			);

		}else{
			//esta todo correcto
			try {

				if ($_FILES['imagen_invitado']['size'] > 0) {
					//con img nueva
					$stmt = $conexion->prepare("UPDATE invitados SET name_invitado = ?,lastname_invitado = ?,description = ?,url_img = ?,editado = NOW() WHERE id_invitado = ?");
					$stmt->bind_param('ssssi', $nombre_invitado,$apellido_invitado,$biografia_invitado,$url_img_invitado,$id_invitado);

				}else{
					//sin actualizar la img
					$stmt = $conexion->prepare("UPDATE invitados SET name_invitado = ?,lastname_invitado = ?,description = ?,editado = NOW() WHERE id_invitado = ?");
					$stmt->bind_param('sssi', $nombre_invitado,$apellido_invitado,$biografia_invitado,$id_invitado);
				}
			
				$stmt->execute();
				$id_insertado = $stmt->insert_id;
				//pregunta si inserto algo
				if ($stmt->affected_rows > 0) {
					$respuesta = array(
						'respuesta' => 'exito',
						'id_insertado' => $id_insertado,
						'msj' => 'Invitado Creado Correctamente'
					);
				}else{
					$respuesta = array(
						'respuesta' => 'error',
						'msj' => 'No se pudo crear invitado'
					);
				}
				$stmt->close();

			} catch (Exception $e) {
				echo "Error".$e->getMessage();
			}
		}
	}

	die(json_encode($respuesta));
}

if ($_POST['registro'] == 'eliminar') {

	$id_borrar = $_POST['id'];

	try {

		$stmt = $conexion->prepare('DELETE FROM invitados WHERE id_invitado = ?');
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