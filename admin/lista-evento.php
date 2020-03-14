
<!--este archivo incluye todo el head-->
<?php require_once 'funciones/sessiones.php' ?>

<?php require_once 'funciones/funciones.php' ?>

<?php require_once 'template/header.php' ?>

<?php require_once 'template/barra.php' ?>

<?php require_once 'template/navegacion.php' ?>

<?php 
  //pasamos al array los campos de la bd para la funcion
  $datos = array(
          'tablaPrincipal' => 'eventos',
          'primeraTablaRelacionada' => 'categoria_evento',
          'segundaTablaRelacionada' => 'invitados',
          'idEventos' => 'id_eventos',
          'idEventosCategoria' => 'id_categoria',
          'idInvitado' => 'id_invitado',
          'id_cat_event_Eventos' => 'id_cat_event',
          'id_inv_Eventos' => 'id_inv',
          'nombreEvento' => 'name_event',
          'fechaEvento' => 'date_event',
          'horaEvento' => 'hour_event',
          'categoriaEvent' => 'cat_event',
          'nombreInvitado' => 'name_invitado',
          'apellidoInvitado' => 'lastname_invitado',
        ); 
?>

<?php $consulta = multipleTablas($conexion,$datos); ?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Listado de eventos
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Maneja los eventos en esta sesion</h3>
            <small><a href="crear-evento.php">Crear nuevo evento</a></small>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="registros" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Categoria</th>
                <th>Invitado</th>
                <th class="text-center">Acciones</th>
              </tr>
              </thead>
              <tbody>
                <?php while($contentEvent = $consulta->fetch_assoc()){ ?>
                  <tr>
                    <td><?php echo $contentEvent['name_event'] ?></td>
                    <td><?php echo $contentEvent['date_event'] ?></td>
                    <td><?php echo $contentEvent['hour_event'] ?></td>
                    <td><?php echo $contentEvent['cat_event'] ?></td>
                    <td><?php echo $contentEvent['name_invitado']." ".$contentEvent['lastname_invitado'] ?></td>
                    <td class="text-center">
                      <!-- btn editar -->
                      <a href="editar-evento.php?id=<?php echo $contentEvent['id_eventos'] ?>" class="btn bg-orange btn-flat margin">
                        <i class="far fa-edit"></i>
                      </a>
                      <!-- btn eliminar -->
                      <a href="#" data-id="<?php echo $contentEvent['id_eventos'] ?>" data-tipo="evento" class="btn bg-red btn-flat margin borrar_registro">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Categoria</th>
                <th>Invitado</th>
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