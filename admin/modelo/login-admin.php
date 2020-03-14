<?php
session_start();
require_once '../../includes/fuciones/conexion.db.php';
$conexion = conexion(); 
//script para loggear administrador
if (isset($_POST['login-admin'])) {

	$usuario = $_POST['nameUser'];
	$pass = $_POST['passUser'];

	try {
		$stmt = $conexion->prepare("SELECT * FROM admins WHERE usuario = ?;");
		$stmt->bind_param('s', $usuario);
		$stmt->execute();
		$stmt->bind_result($id_admin,$usuario_admin,$nombre_admin,$password_admin,$editado,$nivel);
		if ($stmt->affected_rows) {
			$existe = $stmt->fetch();
			if ($existe) {
				if (password_verify($pass, $password_admin)) {

					//creamos la sesion
					$_SESSION['usuario'] = $usuario_admin;
					$_SESSION['nombre'] = $nombre_admin;
					$_SESSION['nivel'] = $nivel;
					//fin de la sesion

					$respuesta = array(
						'respuesta' => 'exitoso',
						'usuario' => $nombre_admin
					);
				}else{
					$respuesta = array(
						'respuesta' => 'error_password',
						'msj' => 'contraseña incorrecta'
					);
				}
			}else{
				$respuesta = array(
					'respuesta' => 'error_user',
					'msj' => 'El usuario no existe'
				);
			}
		}
		$stmt->close();
	} catch (Exception $e) {
		echo "Error:".$e->getMessage();
	}
	
	die(json_encode($respuesta));
}