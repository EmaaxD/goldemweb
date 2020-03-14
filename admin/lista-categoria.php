<!--este archivo incluye todo el head-->
<?php require_once 'funciones/sessiones.php' ?>

<?php require_once 'funciones/funciones.php' ?>

<?php require_once 'template/header.php' ?>

<?php require_once 'template/barra.php' ?>

<?php require_once 'template/navegacion.php' ?>

<?php $consulta = consultaUnaTabla($conexion,'categoria_evento'); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Listado de las categorias
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Maneja las categorias de los eventos</h3>
            <small><a href="crear-categoria.php">Crear nueva categoria</a></small>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="registros" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Icono</th>
                <th class="text-center">Acciones</th>
              </tr>
              </thead>
              <tbody>
                <?php while($rowCategoria = $consulta->fetch_assoc()){ ?>
                  <tr>
                    <td><?php echo $rowCategoria['id_categoria'] ?></td>
                    <td><?php echo $rowCategoria['cat_event'] ?></td>
                    <td><i class="<?php echo $rowCategoria['icons'] ?>"></i></td>
                    <td class="text-center">
                      <!-- btn editar -->
                      <a href="editar-categoria.php?id=<?php echo $rowCategoria['id_categoria'] ?>" class="btn bg-orange btn-flat margin">
                        <i class="far fa-edit"></i>
                      </a>
                      <!-- btn eliminar -->
                      <a href="#" data-id="<?php echo $rowCategoria['id_categoria'] ?>" data-tipo="categoria" class="btn bg-red btn-flat margin borrar_registro">
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
                <th>Icono</th>
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

