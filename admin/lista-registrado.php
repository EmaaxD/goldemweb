<!--este archivo incluye todo el head-->
<?php require_once 'funciones/sessiones.php' ?>

<?php require_once 'funciones/funciones.php' ?>

<?php require_once 'template/header.php' ?>

<?php require_once 'template/barra.php' ?>

<?php require_once 'template/navegacion.php' ?>

<?php 
//consulta nueva para mi xd
$sql = "SELECT registrados.*, regalos.name_regalo FROM registrados INNER JOIN regalos ON registrados.regalo = regalos.id_regalo";
$result = $conexion->query($sql);
?>
<!-- Contenido de la pagina -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Listado de personas registradas
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Maneja los visitantes registrado de los eventos</h3>
            <small><a href="crear-registro.php">Crear nuevo registro</a></small>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="registros" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Fecha Registro</th>
                <th>Articulos</th>
                <th>Talleres</th>
                <th>Regalo</th>
                <th>Compra</th>
                <th class="text-center">Acciones</th>
              </tr>
              </thead>
              <tbody>
                <?php while($rowRegistrado = $result->fetch_assoc()){ ?>
                  <tr>
                    <td><?php echo $rowRegistrado['id_registrado'] ?></td>
                    <td>
                      <?php 
                        echo $rowRegistrado['name_registrado']." ".$rowRegistrado['lastname_registrado'];
                        $pagado = $rowRegistrado['pagado'];
                        if ($pagado) {
                           echo '<span class="badge bg-green">Pagado</span>';
                        }else{
                          echo '<span class="badge bg-red">No pagado</span>';
                        } 
                      ?>
                    </td>
                    <td><?php echo $rowRegistrado['email_registrado'] ?></td>
                    <td><?php echo $rowRegistrado['date_registro'] ?></td>
                    <td>
                      <?php 
                        //convertimos el json que tenemos en la base de datos en array
                        $articulo = json_decode($rowRegistrado['pases_articulos'],true);

                        $array_articulo = array(
                          'un_dia' => 'Pase 1 dia',
                          'pase_2dias' => 'Pase 2 dias',
                          'pase_completo' => 'Pase Completo',
                          'camisas' => 'Camisas',
                          'etiquetas' => 'Etiquetas'
                        );

                        foreach ($articulo as $key => $value) {
                          echo '<span class="badge bg-primary">'.$value.'</span>'." ".$array_articulo[$key]."<br>";
                        }
                      ?>
                        
                    </td>
                    <td>
                      <?php  
                        $talleres = json_decode($rowRegistrado['talleres_registrado'],true);
                        //transformamos el array en un string
                        $talleres = implode("','", $talleres['eventos']);
                        //con el IN le pasamos multiples valores 
                        $sql_talleres = "SELECT name_event,date_event,hour_event FROM eventos WHERE clave IN ('$talleres')";
                        $result_talleres = $conexion->query($sql_talleres);

                        while($eventos = $result_talleres->fetch_assoc()){
                          echo $eventos['name_event']." ".$eventos['date_event']." ".$eventos['hour_event']."<br>";
                        }
                      ?>
                        
                    </td>
                    <td><?php echo $rowRegistrado['name_regalo'] ?></td>
                    <td><?php echo $rowRegistrado['total_pagado'] ?></td>
                    <td class="text-center">
                      <!-- btn editar -->
                      <a href="editar-registro.php?id=<?php echo $rowRegistrado['id_registrado'] ?>" class="btn bg-orange btn-flat margin">
                        <i class="far fa-edit"></i>
                      </a>
                      <!-- btn eliminar -->
                      <a href="#" data-id="<?php echo $rowRegistrado['id_registrado'] ?>" data-tipo="registro" class="btn bg-red btn-flat margin borrar_registro">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Fecha Registro</th>
                <th>Articulos</th>
                <th>Talleres</th>
                <th>Regalo</th>
                <th>Compra</th>
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

