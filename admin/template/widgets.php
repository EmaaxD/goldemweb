<?php  

//saber cuanto registrados ahi en total
$sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
$resultado = $conexion->query($sql);
$registrados = $resultado->fetch_assoc();

//saber cuanto registrados an pagado
$sql2 = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 1";
$resultado2 = $conexion->query($sql2);
$registrados2 = $resultado2->fetch_assoc();

//registrados sin pagar
$sql3 = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 0";
$resultado3 = $conexion->query($sql3);
$registrados3 = $resultado3->fetch_assoc();

//total pagado de los registrados
$sql4 = "SELECT SUM(total_pagado) AS ganancia FROM registrados WHERE pagado = 1";
$resultado4 = $conexion->query($sql4);
$registrados4 = $resultado4->fetch_assoc();

//widgets para regalos

//pulsera
$sql5 = "SELECT COUNT(regalo) AS pulsera FROM registrados WHERE regalo = 1";
$resultado5 = $conexion->query($sql5);
$registrados5 = $resultado5->fetch_assoc();

//etiquetas
$sql6 = "SELECT COUNT(regalo) AS etiqueta FROM registrados WHERE regalo = 2";
$resultado6 = $conexion->query($sql6);
$registrados6 = $resultado6->fetch_assoc();

//plumas
$sql7 = "SELECT COUNT(regalo) AS pluma FROM registrados WHERE regalo = 3";
$resultado7 = $conexion->query($sql7);
$registrados7 = $resultado7->fetch_assoc();

?>

<h2 class="page-header">Resumen de Registros</h2>

<div class="row">
	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-aqua">
	    <div class="inner">
	      <h3><?php echo $registrados['registros'] ?></h3>

	      <p>Total Registrados</p>
	    </div>
	    <div class="icon">
	      <i class="fa fa-user"></i>
	    </div>
	    <a href="lista-registrado.php" class="small-box-footer">
	      Mas informacion <i class="fa fa-arrow-circle-right"></i>
	    </a>
	  </div>
	  
	</div>

	<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $registrados2['registros'] ?></h3>

          <p>Total Pagados</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $registrados3['registros'] ?></h3>

          <p>Total Sin Pagar</p>
        </div>
        <div class="icon">
          <i class="fa fa-user-times"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>$<?php echo $registrados4['ganancia'] ?></h3>

          <p>Ganancias</p>
        </div>
        <div class="icon">
          <i class="fa fa-plus"></i>
        </div>
        <a href="#" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
</div>

<h2 class="page-header">Regalos</h2>

<div class="row">
	<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-teal">
        <div class="inner">
          <h3><?php echo $registrados5['pulsera'] ?></h3>

          <p>Pulseras</p>
        </div>
        <div class="icon">
          <i class="fa fa-gift"></i>
        </div>
        <a href="lista-registrado.php" class="small-box-footer">
          Mas informacion <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-purple-active">
        <div class="inner">
          <h3><?php echo $registrados6['etiqueta'] ?></h3>

          <p>Etiquetas</p>
        </div>
        <div class="icon">
          <i class="fa fa-gift"></i>
        </div>
        <a href="lista-registrado.php" class="small-box-footer">
          Mas informacion <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <h3><?php echo $registrados7['pluma'] ?></h3>

          <p>Plumas</p>
        </div>
        <div class="icon">
          <i class="fa fa-gift"></i>
        </div>
        <a href="lista-registrado.php" class="small-box-footer">
          Mas informacion <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
</div>