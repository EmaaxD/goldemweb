<!--este archivo incluye todo el head-->
<?php require_once 'funciones/sessiones.php' ?>

<?php require_once 'funciones/funciones.php' ?>

<?php require_once 'template/header.php' ?>

<?php require_once 'template/barra.php' ?>

<?php require_once 'template/navegacion.php' ?>

<?php 
	//consulta para la tabla categoria
	$consultCatEvt = consultaUnaTabla($conexion,'categoria_evento');
	//consulta para la tabla invitados
	$consultInvi = consultaUnaTabla($conexion,'invitados');

?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-capitalize">
        crear evento
        <small>llena el formulario para crear evento</small>
      </h1>
    </section>

    <div class="row">
    	<div class="col-md-8">
    		<!-- Main content -->
		    <section class="content">

		      <!-- Default box -->
		      <div class="box box-primary">

		        <div class="box-header with-border">
		          <h3 class="box-title text-capitalize">crear evento</h3>
		          <small><a href="lista-evento.php">Ver lista de eventos</a></small>
		        </div>

		        <div class="box-body">

		          <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo/modelo-evento.php">
		              <div class="box-body">

		                <div class="form-group">
		                  <label for="nameUser">Titulo Evento</label>
		                  <input type="text" class="form-control" name="titulo_event" id="titulo_event" placeholder="Titulo del Evento">
		                </div>

		                <div class="form-group">
			                <label>Categoria del Evento</label>
			                <select class="form-control seleccionarCatego" name="categoria" style="width: 100%;">
			                  <option selected="selected" disabled>Seleccione una categoria</option>
			                  <?php while ($rowCate = $consultCatEvt->fetch_assoc()) { ?>
			                  	<option value="<?php echo $rowCate['id_categoria'] ?>"><?php echo ucfirst($rowCate['cat_event']) ?></option>
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
			                  <input type="text" class="form-control pull-right" name="fecha_evento" id="fechaEvento">
			                </div>
			            </div>

			            <!-- time Picker -->
			            <div class="bootstrap-timepicker">
			                <div class="form-group">
			                  <label>Hora del Evento:</label>

			                  <div class="input-group">
			                    <input type="text" name="hora_evento" class="form-control horaEvento">

			                    <div class="input-group-addon">
			                      <i class="fa fa-clock-o"></i>
			                    </div>
			                  </div>
			                </div>
			            </div>

			            <div class="form-group">
			                <label>Invitado:</label>
			                <select class="form-control seleccionarCatego" name="invitado" style="width: 100%;">
			                  <option selected="selected" disabled>Seleccione una categoria</option>
			                  <?php while ($rowInv = $consultInvi->fetch_assoc()) { ?>
			                  	<option value="<?php echo $rowInv['id_invitado'] ?>"><?php echo ucfirst($rowInv['name_invitado']." ".$rowInv['lastname_invitado']) ?></option>
			                  <?php } ?>
			                </select>
			            </div>

		                
		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		              	<input type="hidden" name="registro" value="nuevo">
		                <button type="submit" id="crear-evento" class="btn btn-primary">Crear</button>
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