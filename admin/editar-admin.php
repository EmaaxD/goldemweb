<!--este archivo incluye todo el head-->
<?php require_once 'funciones/sessiones.php' ?>

<?php require_once 'funciones/funciones.php' ?>

<?php require_once 'template/header.php' ?>

<?php require_once 'template/barra.php' ?>

<?php require_once 'template/navegacion.php' ?>

<?php
	//obtenemos el id del usario
	$id_admin = $_GET['id'];
	//vamos a preguntar si el id_admin es un entero, es para evitar
	//que en la url escribar alguna letra
	if (!filter_var($id_admin,FILTER_VALIDATE_INT)) {
		require_once 'template/error404.php';
	}

	$leerDatos = consultaUnaTabla($conexion,'admins','id_admin',$id_admin);

	//transformamos los datos en un array asociativo
	$contenEditar = $leerDatos->fetch_assoc(); 
?>

  <!-- Contenido de la pagina -->
  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1 class="text-capitalize">
	        editar administrados
	        <small>utiliza el formulario para editar</small>
	      </h1>
	    </section>

	    <div class="row">
	    	<div class="col-md-8">
	    		<!-- Main content -->
			    <section class="content">

			      <!-- Default box -->
			      <div class="box box-primary">
			        <div class="box-header with-border">
			          <h3 class="box-title text-capitalize">editar administrador</h3>
			          <small><a href="listar-admin.php">Ver lista de admin</a></small>
			        </div>
			        <div class="box-body">
			          <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo/modelo-admin.php">
			              <div class="box-body">

			                <div class="form-group">
			                  <label for="nameUser">Nombre Usuario</label>
			                  <input type="text" class="form-control" name="nameUser" id="nameUser" value="<?php echo $contenEditar['usuario'] ?>" placeholder="Nombre Usuario">
			                </div>

			                <div class="form-group">
			                  <label for="fullname">Nombre Completo</label>
			                  <input type="text" class="form-control" name="fullName" id="fullname" value="<?php echo $contenEditar['fullname'] ?>" placeholder="Nombre Completo">
			                </div>

			                <div class="form-group">
			                  <label for="passUser">Password</label>
			                  <input type="password" class="form-control" name="passUser" id="passUser" placeholder="Password">
			                </div>

			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			              	<input type="hidden" name="registro" value="actualizar">
			              	<input type="hidden" name="id_admin" value="<?php echo $contenEditar['id_admin'] ?>">
			                <button type="submit" class="btn btn-primary">Guardar</button>
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

