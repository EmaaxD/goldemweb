<!--este archivo incluye todo el head-->
<?php require_once 'funciones/sessiones.php' ?>

<?php require_once 'template/header.php' ?>

<?php require_once 'funciones/funciones.php' ?>

<?php require_once 'template/barra.php' ?>

<?php require_once 'template/navegacion.php' ?>

<?php 

	//obtenemos el id del registro selecionando
	$id = validarId($_GET['id']);

	//consulta para la tabla eventos
	$consultaEvento = consultaUnaTabla($conexion,'eventos','id_eventos',$id);
	$resultEvent = $consultaEvento->fetch_assoc();

	//consulta para la tabla categoria
	$consultCatEvt = consultaUnaTabla($conexion,'categoria_evento');
	$categoriaActual = $resultEvent['id_cat_event'];

	//consulta para la tabla invitados
	$consultInvi = consultaUnaTabla($conexion,'invitados');
	$invitadoActual = $resultEvent['id_inv'];

	//cambiamos el formato de la fecha
	$fecha_evento = formatoDate($resultEvent['date_event'],'fecha');

	//cambiamos el formato de la hora
	$hora_evento = formatoDate($resultEvent['hour_event'],'hora');

?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-capitalize">
        editar evento
        <small>cambia los valores para editar evento</small>
      </h1>
    </section>

    <div class="row">
    	<div class="col-md-8">
    		<!-- Main content -->
		    <section class="content">

		      <!-- Default box -->
		      <div class="box box-primary">

		        <div class="box-header with-border">
		          <h3 class="box-title text-capitalize">editar evento</h3>
		          <small><a href="lista-evento.php">Ver lista de eventos</a></small>
		        </div>

		        <div class="box-body">

		          <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo/modelo-evento.php">
		              <div class="box-body">

		                <div class="form-group">
		                  <label for="nameUser">Titulo Evento</label>
		                  <input type="text" class="form-control" name="titulo_event" id="titulo_event" placeholder="Titulo del Evento" value="<?php echo $resultEvent['name_event'] ?>">
		                </div>

		                <div class="form-group">
			                <label>Categoria del Evento</label>
			                <select class="form-control seleccionarCatego" name="categoria" style="width: 100%;">
			                  <option selected="selected" disabled>Seleccione una categoria</option>
			                  <?php while ($rowCate = $consultCatEvt->fetch_assoc()) { 
			                  			if ($rowCate['id_categoria'] == $categoriaActual) { ?>
			                  				<option value="<?php echo $rowCate['id_categoria'] ?>" selected><?php echo ucfirst($rowCate['cat_event']) ?></option>
			                  			<?php }else{ ?>
											<option value="<?php echo $rowCate['id_categoria'] ?>"><?php echo ucfirst($rowCate['cat_event']) ?></option>
			                  			<?php } ?>	
			                  <?php } ?>
			                </select>
			            </div>

		                <!-- Fecha Evento -->
			            <div class="form-group">
			               <label>Fecha del Evento:</label>

			                <div class="input-group date">
			                  <div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                  </div>
			                  <input type="text" class="form-control pull-right" name="fecha_evento" id="fechaEvento" value="<?php echo $fecha_evento ?>">
			                </div>
			            </div>

			            <!-- time Picker -->
			            <div class="bootstrap-timepicker">
			                <div class="form-group">
			                  <label>Hora del Evento:</label>

			                  <div class="input-group">

			                    <div class="input-group-addon">
			                      <i class="fa fa-clock-o"></i>
			                    </div>

			                    <input type="text" name="hora_evento" class="form-control horaEvento" value="<?php echo $hora_evento ?>">
			                  </div>
			                </div>
			            </div>

			            <div class="form-group">
			                <label>Invitado:</label>
			                <select class="form-control seleccionarCatego" name="invitado" style="width: 100%;">
			                  <option selected="selected" disabled>Seleccione una categoria</option>
			                  <?php while ($rowInv = $consultInvi->fetch_assoc()) { 
			                  			if ($rowInv['id_invitado'] == $invitadoActual) { ?>
			                  				<option value="<?php echo $rowInv['id_invitado'] ?>" selected><?php echo ucfirst($rowInv['name_invitado']." ".$rowInv['lastname_invitado']) ?></option>
			                  			<?php } else{ ?>
			                  				<option value="<?php echo $rowInv['id_invitado'] ?>"><?php echo ucfirst($rowInv['name_invitado']." ".$rowInv['lastname_invitado']) ?></option>
			                  			<?php } ?>	
			                  <?php } ?>
			                </select>
			            </div>

		                
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		              	<input type="hidden" name="registro" value="actualizar">
		              	<input type="hidden" name="id_evento" value="<?php echo $resultEvent['id_eventos'] ?>">
		                <button type="submit" id="editar-evento" class="btn btn-primary">Guardar</button>
		              </div>
		            </form>

		        </div>
		        <!-- /.box-body -->
		      </div>
		      <!-- /.box -->
		    </section>
		    <!-- /.content -->
    	</div>
    </div>
</div>
<!-- /.fin de contenido de la pagina -->

<?php require_once 'template/footer.php' ?>