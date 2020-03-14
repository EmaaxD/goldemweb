<?php include_once 'includes/template/header.php' ?>

	<section class="seccion contenedor">
		<h2>Calendario de Eventos</h2>

		<?php 

			try {
				
				$sql = "SELECT id_eventos,name_event,date_event,hour_event,cat_event,icons,name_invitado,lastname_invitado 
						FROM eventos 
						INNER JOIN categoria_evento ON eventos.id_cat_event = categoria_evento.id_categoria 
						INNER JOIN invitados ON eventos.id_inv = invitados.id_invitado ORDER BY id_eventos ASC";
				$result = $conexion->query($sql);
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		?>

		<div class="calendario">
			
			<?php 

				$calendario = array();
				while ($eventos = $result->fetch_assoc()) { 

					//obtiene la fecha del evento
					$fecha = $eventos['date_event'];
					$hora = $eventos['hour_event'];

					$evento = array(
						'titulo' => $eventos['name_event'],
						'fecha' => $eventos['date_event'],
						'hora' => $eventos['hour_event'],
						'categoria' => $eventos['cat_event'],
						'icono' => $eventos['icons'],
						'invitado' => $eventos['name_invitado']." ".$eventos['lastname_invitado']
					);

					$calendario[$fecha][] = $evento;

			?>

			<?php } ?>

			<?php foreach ($calendario as $dia => $lista_event) { ?>

				<!--Formateando fecha--->
				<h3><?php 
					setlocale(LC_TIME, 'spanish');
					echo strftime('%d de %B del %Y', strtotime($dia)) 
				?></h3>

				<?php foreach ($lista_event as $evento) { ?>

					<div class="dia">

						<p class="titulo"><?php echo $evento['titulo'] ?></p>
						<p class="hora">
							<i class="far fa-clock Icons"></i>
							<?php echo date('d-n-Y',strtotime($evento['fecha']))." ".$evento['hora'] ?>
						</p>
						<p>
							<i class="<?php echo $evento['icono'] ?> Icons"></i>
							<?php echo $evento['categoria'] ?>	
						</p>
						<p>
							<i class="far fa-user Icons"></i>
							<?php echo $evento['invitado'] ?>
						</p>

					</div>

				<?php } //fin foreach eventos ?>	
			<?php } //fin foreach dias?>

		</div>


	</section>

<?php include_once 'includes/template/footer.php' ?>