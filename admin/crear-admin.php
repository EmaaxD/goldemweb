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
	        crear administrados
	        <small>llena el formulario para crear administrador</small>
	      </h1>
	    </section>

	    <div class="row">
	    	<div class="col-md-8">
	    		<!-- Main content -->
			    <section class="content">

			      <!-- Default box -->
			      <div class="box box-primary">
			        <div class="box-header with-border">
			          <h3 class="box-title text-capitalize">crear administrador</h3>
			          <small><a href="listar-admin.php">Ver lista de admin</a></small>
			        </div>
			        <div class="box-body">
			          <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo/modelo-admin.php">
			              <div class="box-body">

			                <div class="form-group">
			                  <label for="nameUser">Nombre Usuario</label>
			                  <input type="text" class="form-control" name="nameUser" id="nameUser" placeholder="Nombre Usuario">
			                </div>

			                <div class="form-group">
			                  <label for="fullname">Nombre Completo</label>
			                  <input type="text" class="form-control" name="fullName" id="fullname" placeholder="Nombre Completo">
			                </div>

			                <div class="form-group">
			                  <label for="passUser">Password</label>
			                  <input type="password" class="form-control" name="passUser" id="passUser" placeholder="Password para iniciar sesion">
			                </div>

			                <div class="form-group">
			                  <label for="passUser">Repetir Password</label>
			                  <input type="password" class="form-control" name="repetir_passUser" id="repetir_passUser" placeholder="Password para iniciar sesion">
			                  <span id="resultado_password" class="help-block"></span>
			                </div>
			                <!-- <div class="form-group">
			                  <label for="exampleInputFile">File input</label>
			                  <input type="file" id="exampleInputFile">

			                  <p class="help-block">No es obligatorio una foto.</p>
			                </div> -->
			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			              	<input type="hidden" name="registro" value="nuevo">
			                <button type="submit" class="btn btn-primary" id="crear_registro_admin">Crear</button>
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

