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
        crear registro
      </h1>
    </section>

    <div class="row">
    	<div class="col-md-8">
    		<!-- Main content -->
		    <section class="content">

		      <!-- Default box -->
		      <div class="box box-primary">
		        <div class="box-header with-border">
		          <h3 class="box-title text-capitalize">crear registro</h3>
		          <small><a href="lista-registrado.php">Ver la lista de los registrados</a></small>
		        </div>
		        <div class="box-body">
		          <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo/modelo-registrado.php">
		              <div class="box-body">

		                <div class="form-group">
		                  <label for="nombre_registrado">Nombre</label>
		                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
		                </div>

		                <div class="form-group">
		                  <label for="apellido">Apellido</label>
		                  <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
		                </div>

		                <div class="form-group">
		                  <label for="email">Correo</label>
		                  <input type="text" class="form-control" name="email" id="email" placeholder="Apellido">
		                </div>

		                <div class="form-group">
		                	<div id="paquetes" class="paquetes">
                
				                <div class="box-header with-border">
			                		<h3 class="box-title">Elige el numero de boletos</h3>
			                	</div>

				                <ul class="lista-precios clearfix row">
				                
				                    <li class="col-md-4">
				                        
				                        <div class="tabla-precio text-center">
				                            
				                            <h3>Pase por dia (viernes)</h3>
				                            <p class="numero">$30</p>

				                            <ul>

				                                <li>Bocadillos Gratis</li>
				                                <li>Tdoas las Conferencias</li>
				                                <li>Todos los Talleres</li>

				                            </ul>

				                            <div class="orden">
				                                
				                                <label for="pase_dia">Boletos deseados:</label>
				                                <input type="number" class="form-control" min="0" name="boletos[un_dia][cantidades]" id="pase_dia" size="3" placeholder="0">
				                                <input type="hidden" value="30" name="boletos[un_dia][precio]">

				                            </div>

				                        </div>

				                    </li>

				                    <li class="col-md-4">
				                        
				                        <div class="tabla-precio text-center">
				                            
				                            <h3>Todos los dia</h3>
				                            <p class="numero">$50</p>

				                            <ul>

				                                <li>Bocadillos Gratis</li>
				                                <li>Tdoas las Conferencias</li>
				                                <li>Todos los Talleres</li>

				                            </ul>

				                            <div class="orden">
				                                
				                                <label for="pase_completo">Boletos deseados:</label>
				                                <input type="number" class="form-control" min="0" name="boletos[completo][cantidad]" id="pase_completo" size="3" placeholder="0">
				                                <input type="hidden" value="50" name="boletos[completo][precio]">

				                            </div>

				                        </div>

				                    </li>

				                    <li class="col-md-4">
				                        
				                        <div class="tabla-precio text-center">
				                            
				                            <h3>Pase por 2 dias (viernes y sabado)</h3>
				                            <p class="numero">$45</p>

				                            <ul>

				                                <li>Bocadillos Gratis</li>
				                                <li>Tdoas las Conferencias</li>
				                                <li>Todos los Talleres</li>

				                            </ul>

				                            <div class="orden">
				                                
				                                <label for="pase_dosdias">Boletos deseados:</label>
				                                <input type="number" class="form-control" min="0" name="boletos[dos_dias][cantidad]" id="pase_dosdias" size="3" placeholder="0">
				                                <input type="hidden" value="45" name="boletos[dos_dias][precio]">

				                            </div>

				                        </div>

				                    </li>

				                </ul>

				            </div>
		                </div>

		                <div class="form-group">
		                	<div class="box-header with-border">
		                		<h3 class="box-title">Elige los talleres</h3>
		                	</div>
		                	<div id="eventos" class="eventos clearfix">
				                 
				                <div class="caja">

				                  <?php 
				                    try {

				                      $sql = "SELECT eventos.*, categoria_evento.cat_event, invitados.name_invitado, invitados.lastname_invitado 
				                              FROM eventos JOIN categoria_evento ON eventos.id_cat_event = categoria_evento.id_categoria 
				                              JOIN invitados ON eventos.id_inv = invitados.id_invitado ORDER BY eventos.date_event, eventos.id_cat_event, eventos.hour_event";
				                      $resultado = $conexion->query($sql);
				                      
				                    } catch (Exception $e) {
				                      echo $e->getMessage();
				                    }

				                    $eventos_dias = array();
				                    while ($eventos = $resultado->fetch_assoc()) {
				                      
				                      //tomamos la fecha
				                      $fecha = $eventos['date_event'];
				                      //configuramos el servidor para que nos muestre los dias en es
				                      setlocale(LC_ALL, 'es');
				                      //convertimos de una fecha numerica a dias
				                      $dia_semana = strftime("%A", strtotime($fecha));

				                      //almacenamos la categoria para poder usarla en el arraglo
				                      $categoria = $eventos['cat_event'];

				                      //guardamos los datos para mostrar en pantalla
				                      $dia = array(
				                        'nombre_evento' => $eventos['name_event'],
				                        'hora' => $eventos['hour_event'],
				                        'id' => $eventos['id_eventos'],
				                        'nombre_invitado' => $eventos['name_invitado'],
				                        'apellido_invitado' =>$eventos['lastname_invitado']
				                      );

				                      //aniade al final del arreglo
				                      //el indice del arreglo general va a ser los dia de la semana, para que no se repita cada rato el dia,solo una vez
				                      $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;

				                    }
				                    // echo "<pre>";
				                    //   var_dump($eventos_dias);
				                    // echo "</pre>";  
				                  ?>
				                  
				                  <?php foreach ($eventos_dias as $dia => $eventos) {  ?>
				                        <div id="<?php echo str_replace('�', 'a', $dia); ?>" class="contenido-dia clearfix row">

				                           <h4 class="text-center nombre_dia"><?php echo $dia ?></h4>
				                              <?php foreach ($eventos['eventos'] as $tipo => $evento_dia) {  ?>

				                                 <div class="col-md-4">
				                                     <p><?php echo $tipo ?>:</p>

				                                     <?php foreach ($evento_dia as $evento) {  ?>
				                                         <label>
				                                            <input type="checkbox" class="flat-red" name="registro[]" id="<?php echo $evento['id'] ?>" value="<?php echo $evento['id'] ?>"><time><?php echo $evento['hora'] ?></time> <?php echo $evento['nombre_evento'] ?><br>
				                                            <span class="autor"><?php echo $evento['nombre_invitado']." ".$evento['apellido_invitado'] ?></span>
				                                         </label>
				                                     <?php } ?>
				                                 </div>

				                              <?php } ?>

				                       </div> <!--Contenido dia-->
				                  <?php } ?>

				                </div><!--.caja-->
				            </div> <!--#eventos-->

				            <div id="resumen" class="resumen">
				                
				                <div class="box-header with-border">
			                		<h3 class="box-title">Pago y Extras</h3>
			                	</div><br>

				                <div class="caja clearfix row">
				                    
				                    <div class="extras col-md-6">
				                        
				                        <div class="orden">
				                            
				                            <label for="camisa_eventos">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
				                            <input type="number" class="form-control" name="pedido_extra[camisa][cantidad]" id="camisa_eventos" min="0" size="3" placeholder="0">
				                            <input type="hidden" value="10" name="pedido_extra[camisa][precio]">

				                        </div>

				                        <div class="orden">
				                            
				                            <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Opera)</small></label>
				                            <input type="number" class="form-control" name="pedido_extra[etiquetas][cantidad]" id="etiquetas" min="0" size="3" placeholder="0">
				                            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">

				                        </div>

				                        <div class="orden">
				                            
				                            <label for="regalo">Seleccione un regalo</label><br>
				                            <select name="regalo" id="regalo" required class="form-control">
				                                
				                                <option value="">Seleccione un regalo --</option>
				                                <option value="2">Etiquetas</option>
				                                <option value="1">Pulsera</option>
				                                <option value="3">Plumas</option>

				                            </select>

				                        </div><br>

				                        <input type="button" id="calcular" class="btn btn-success" value="Calcular">

				                    </div>

				                    <div class="total col-md-6">
				                        
				                        <p>Resumen:</p>

				                        <div id="lista-productos">
				                            
				                        </div>
				                        <p>Total:</p>

				                        <div id="suma-total">
				                            
				                        </div>
				                        
				                        <input type="hidden" name="total_pedido" id="total_pedido">

				                    </div>

				                </div>

				            </div>
		                </div>

		              </div>
		              <!-- /.box-body -->

		              <div class="box-footer">
		              	<input type="hidden" name="registro" value="nuevo">
		                <button type="submit" class="btn btn-primary" id="btnRegistrar">Crear</button>
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

