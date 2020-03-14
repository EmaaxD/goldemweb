<!--este archivo incluye todo el head-->
<?php require_once 'funciones/sessiones.php' ?>

<?php require_once 'funciones/funciones.php' ?>

<?php require_once 'template/header.php' ?>

<?php require_once 'template/barra.php' ?>

<?php require_once 'template/navegacion.php' ?>

<?php $consulta = consultaUnaTabla($conexion,'invitados','id_invitado'); ?>

<!-- Contenido de la pagina -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Listado de los invitados
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Maneja los invitados que dirigen los eventos</h3>
            <small><a href="crear-invitados.php">Crear nuevo invitado</a></small>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="registros" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Nombre Completo</th>
                <th>Biografia</th>
                <th>Imagen</th>
                <th class="text-center">Acciones</th>
              </tr>
              </thead>
              <tbody>
                <?php while($rowInvitado = $consulta->fetch_assoc()){ ?>
                  <tr>
                    <td><?php echo $rowInvitado['id_invitado'] ?></td>
                    <td><?php echo $rowInvitado['name_invitado']." ".$rowInvitado['lastname_invitado'] ?></td>
                    <td><?php echo $rowInvitado['description'] ?></td>
                    <td><img src="../img/invitados/<?php echo $rowInvitado['url_img'] ?>" width="150"></td>
                    <td class="text-center">
                      <!-- btn editar -->
                      <a href="editar-invitados.php?id=<?php echo $rowInvitado['id_invitado'] ?>" class="btn bg-orange btn-flat margin">
                        <i class="far fa-edit"></i>
                      </a>
                      <!-- btn eliminar -->
                      <a href="#" data-id="<?php echo $rowInvitado['id_invitado'] ?>" data-tipo="invitado" class="btn bg-red btn-flat margin borrar_registro">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Biografia</th>
                <th>Imagen</th>
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