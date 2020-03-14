<?php 	
session_start();
require_once '../funciones/funciones.php';
require_once '../../includes/fuciones/conexion.db.php';
$conexion = conexion();

//datos que viene del formulario crear y editar
if (isset($_POST['nameUser'])) {
	$usuario = $_POST['nameUser'];
	$fullName = sanearCadena($_POST['fullName']);
	$pass = $_POST['passUser'];
}


//script para crear administrador
if ($_POST['registro'] == 'nuevo') {

	try {
		//preguntamos por el nombre de administrador
		$sql = "SELECT * FROM admins WHERE usuario = '$usuario'";
		$verificar = $conexion->query($sql);
		if ($verificar->num_rows > 0) {
			$respuesta = array(
				'respuesta' => 'error',
				'msj' => 'el nombre de usuario ya existe, pruebe con otro'
			);
		}else{

			//preparamos nuestra consulta
			$pass_hash = passwordEncriptada($pass);
			$stmt = $conexion->prepare("INSERT INTO admins (usuario,fullname,password) VALUES(?,?,?)");
			$stmt->bind_param('sss',$usuario,$fullName,$pass_hash);
			$stmt->execute();
			$id_registro = $stmt->insert_id;
			if ($id_registro > 0) {
				$respuesta = array(
					'respuesta' => 'exito',
					'msj' => 'Administrador creado correctamente',
					'id_admin' => $id_registro
				);

			}else{
				$respuesta = array(
					'respuesta' => 'error',
					'msj' => 'en variables o en consulta'
				);

			}
			$stmt->close();
		}


	} catch (Exception $e) {
		echo "Error: ".$e->getMessage();
	}

	die(json_encode($respuesta));
}

//script para editar administrador
if ($_POST['registro'] == 'actualizar') {

	$id_admin = $_POST['id_admin'];

	try {

		if (empty($_POST['passUser'])) {
			//que no actualize el password
			$stmt = $conexion->prepare("UPDATE admins SET usuario = ?, fullname = ?, editado = NOW() WHERE id_admin = ?");
			$stmt->bind_param("ssi", $usuario,$fullName,$id_admin);
		}else{
			//actualizar el password
			$pass_hash = passwordEncriptada($pass);
			$stmt = $conexion->prepare("UPDATE admins SET usuario = ?, fullname = ?, password = ?, editado = NOW() WHERE id_admin = ?");
			$stmt->bind_param("sssi", $usuario,$fullName,$pass_hash,$id_admin);
		}

		$stmt->execute();
		if ($stmt->affected_rows) {
			$respuesta = array(
				'respuesta' => 'exito',
				'msj' => 'Administrador actualizado correctamente',
				'id_actualizado' => $stmt->insert_id
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error',
				'msj' => 'error al acutalizar'
			);
		}

		$stmt->close();
	} catch (Exception $e) {
		$respuesta = array(
			'respuesta' => $e->getMessage()
		);
	}

	die(json_encode($respuesta));
}


//script para eliminar admin
if ($_POST['registro'] == 'eliminar') {
	$id_borrar = $_POST['id'];

	try {

		$stmt = $conexion->prepare('DELETE FROM admins WHERE id_admin = ?');
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
				'msj' => 'Error al eliminar administrador'
			);
		}

		$stmt->close();
		
	} catch (Exception $e) {
		echo "Error:".$e->getMessage();
	}

	die(json_encode($respuesta));
}