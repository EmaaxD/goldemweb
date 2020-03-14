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
      <h1>
        Dashboard
        <small>informacion sobre el evento</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="box-body chart-responsive">
            <div class="chart" id="graficas-registro" style="height: 300px;"></div>
          </div>
      </div>

      <?php require_once 'template/widgets.php' ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.fin de contenido de la pagina -->

  <?php require_once 'template/footer.php' ?>

