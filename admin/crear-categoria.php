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
        crear categoria
      </h1>
    </section>

    <div class="row">
    	<div class="col-md-8">
    		<!-- Main content -->
		    <section class="content">

		      <!-- Default box -->
		      <div class="box box-primary">
		        <div class="box-header with-border">
		          <h3 class="box-title text-capitalize">crear categoria</h3>
		          <small><a href="lista-categoria.php">Ver la lista de las categorias</a></small>
		        </div>
		        <div class="box-body">
		          <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo/modelo-categoria.php">
		              <div class="box-body">

		                <div class="form-group">
		                  <label for="nameUser">Nombre</label>
		                  <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" placeholder="Nombre de la categoria">
		                </div>

		                <div class="form-group">
		                  <label>Icono</label>
		                  <div class="input-group">
		                  	<div class="input-group-addon">
		                  		<i class="fas fa-book"></i>
		                  	</div>
		                  	<input type="text" id="icono" name="icon" class="form-control pull-right" placeholder="fa-icon">
		                  </div>
		                </div>

		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		              	<input type="hidden" name="registro" value="nuevo">
		                <button type="submit" class="btn btn-primary" id="crear_categoria">Crear</button>
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

