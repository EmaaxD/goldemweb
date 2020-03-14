<!--este archivo incluye todo el head-->
<?php require_once 'funciones/sessiones.php' ?>

<?php require_once 'funciones/funciones.php' ?>

<?php require_once 'template/header.php' ?>

<?php require_once 'template/barra.php' ?>

<?php require_once 'template/navegacion.php' ?>

<?php $consulta = consultaUnaTabla($conexion,'admins'); ?>
  <!-- Contenido de la pagina -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de administradores
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los usuarios en esta sesion</h3>
              <small><a href="crear-admin.php">Crear nuevo admin</a></small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Nombre Completo</th>
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php while($contentAdmins = $consulta->fetch_assoc()){ ?>
                    <tr>
                      <td><?php echo $contentAdmins['id_admin'] ?></td>
                      <td><?php echo $contentAdmins['usuario'] ?></td>
                      <td><?php echo $contentAdmins['fullname'] ?></td>
                      <td class="text-center">
                        <!-- btn editar -->
                        <a href="editar-admin.php?id=<?php echo $contentAdmins['id_admin'] ?>" class="btn bg-orange btn-flat margin">
                          <i class="far fa-edit"></i>
                        </a>
                        <!-- btn eliminar -->
                        <a href="#" data-id="<?php echo $contentAdmins['id_admin'] ?>" data-tipo="admin" class="btn bg-red btn-flat margin borrar_registro">
                          <i class="fas fa-trash" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Nombre Completo</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.fin de contenido de la pagina -->

  <?php require_once 'template/footer.php' ?>

