<?php 
	include_once ('includes/template/header.php');
	include_once ('includes/fuciones/functions.php'); 
?>

<section class="seccion contenedor">
	<h2>resumen registro</h2>

	<?php if (isset($_POST['submit'])): 

		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo = $_POST['email'];
		$regalo = $_POST['regalo'];
		$total = $_POST['total_pedido'];
		$fecha = date("Y-m-d H:i:s");

		//Pedidos
		$boletos = $_POST['boletos'];
		$camisa = $_POST['pedido_camisa'];
		$etiquetas = $_POST['pedido_etiquetas'];
		$pedido = productoJson($boletos,$camisa,$etiquetas);

		//eventos
		$eventos = $_POST['registro'];
		$registro = eventosJson($eventos);
		

		
		try {

			//CONSULTAS PREPARADAS
			$stmt = $conexion->prepare("INSERT INTO registrados (name_registrado,lastname_registrado,email_registrado,date_registro,pases_articulos,talleres_registrado,regalo,total_pagado) VALUES(?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssssssis", $nombre,$apellido,$correo,$fecha,$pedido,$registro,$regalo,$total);
			$stmt->execute();
			$stmt->close();
			header("Location: validar_registro.php?exitoso=1");

		} catch (Exception $e) {
			$error = $e->getMessage();
		}

	?>

		
	<?php endif; ?>


	<?php 


		if (isset($_GET['exitoso'])) {
			$success = $_GET['exitoso'];
			if ($success == "1") {
				echo "Registro Exitoso";
			}
		}
	?>

</section>

<?php include_once('includes/template/footer.php') ?>