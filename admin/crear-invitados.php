<!--este archivo incluye todo el head-->
<?php require_once 'funciones/sessiones.php' ?>

<?php require_once 'funciones/funciones.php' ?>

<?php require_once 'template/header.php' ?>

<?php require_once 'template/barra.php' ?>

<?php require_once 'template/navegacion.php' ?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-capitalize">
        crear invitado
      </h1>
    </section>

    <div class="row">
    	<div class="col-md-8">
    		<!-- Main content -->
		    <section class="content">

		      <!-- Default box -->
		      <div class="box box-primary">
		        <div class="box-header with-border">
		          <h3 class="box-title text-capitalize">crear invitado</h3>
		          <small><a href="lista-invitados.php">Ver la lista de los invitados</a></small>
		        </div>
		        <div class="box-body">
		          <form role="form" method="post" name="guardar-registro" id="guardar-registro-archivo" data-lista="invitados" action="modelo/modelo-invitado.php" enctype="multipart/form-data">
		              <div class="box-body">

		                <div class="form-group">
		                  <label for="nombre_invitado">Nombre</label>
		                  <input type="text" class="form-control" name="nombre_invitado" id="nombre_invitado" placeholder="Nombre del invitado">
		                </div>

		                <div class="form-group">
		                  <label for="apellido_invitado">Apellido</label>
		                  <input type="text" class="form-control" name="apellido_invitado" id="apellido_invitado" placeholder="Apellido del invitado">
		                </div>

		                <div class="form-group">
		                	<label for="biografia_invitado">Biografia del invitado</label>
		                	<textarea class="form-control biografia" name="biografia_invitado" id="biografia_invitado" placeholder="Biografia del invitado"></textarea>
		                </div>

		                <div class="form-group">
		                  <label for="imgInv">Imagen del invitado</label>
		                  <input type="file" id="imagen_invitado" name="imagen_invitado">

		                  <p class="help-block">Selecciona una imagen para el invitado</p>
		                </div>

		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		              	<input type="hidden" name="registro" value="nuevo">
		                <button type="submit" class="btn btn-primary" id="crear_invitado">Crear</button>
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

