<?php include_once 'includes/template/header.php' ?>


  <section class="seccion contenedor">
      
      <h2>Registro de Usuarios</h2>

      <form action="pagar.php" class="registro" id="registro" method="post">
          
            <div id="datos_usuario" class="registro caja clearfix">

                <div class="campo">
                    
                    <label for="nombre">Nombre:</label>
                    <input type="text" autocomplete="off" id="nombre" name="nombre" placeholder="tu Nombre">

                </div>

                <div class="campo">
                    
                    <label for="apellido">Apellido:</label>
                    <input type="text" autocomplete="off" id="apellido" name="apellido" placeholder="tu Apellido">
                    
                </div>

                <div class="campo">
                    
                    <label for="email">Email:</label>
                    <input type="email" autocomplete="off" id="email" name="email" placeholder="tu Email">
                    
                </div>

                <div id="error"></div>
                
            </div>

            <div id="paquetes" class="paquetes">
                
                <h3>Elige el numero de boleto</h3>

                <ul class="lista-precios clearfix">
                
                    <li>
                        
                        <div class="tabla-precio">
                            
                            <h3>Pase por dia (viernes)</h3>
                            <p class="numero">$30</p>

                            <ul>

                                <li>Bocadillos Gratis</li>
                                <li>Tdoas las Conferencias</li>
                                <li>Todos los Talleres</li>

                            </ul>

                            <div class="orden">
                                
                                <label for="pase_dia">Boletos deseados:</label>
                                <input type="number" min="0" name="boletos[un_dia][cantidades]" id="pase_dia" size="3" placeholder="0">
                                <input type="hidden" value="30" name="boletos[un_dia][precio]">

                            </div>

                        </div>

                    </li>

                    <li>
                        
                        <div class="tabla-precio">
                            
                            <h3>Todos los dia</h3>
                            <p class="numero">$50</p>

                            <ul>

                                <li>Bocadillos Gratis</li>
                                <li>Tdoas las Conferencias</li>
                                <li>Todos los Talleres</li>

                            </ul>

                            <div class="orden">
                                
                                <label for="pase_completo">Boletos deseados:</label>
                                <input type="number" min="0" name="boletos[completo][cantidad]" id="pase_completo" size="3" placeholder="0">
                                <input type="hidden" value="50" name="boletos[completo][precio]">

                            </div>

                        </div>

                    </li>

                    <li>
                        
                        <div class="tabla-precio">
                            
                            <h3>Pase por 2 dias (viernes y sabado)</h3>
                            <p class="numero">$45</p>

                            <ul>

                                <li>Bocadillos Gratis</li>
                                <li>Tdoas las Conferencias</li>
                                <li>Todos los Talleres</li>

                            </ul>

                            <div class="orden">
                                
                                <label for="pase_dosdias">Boletos deseados:</label>
                                <input type="number" min="0" name="boletos[dos_dias][cantidad]" id="pase_dosdias" size="3" placeholder="0">
                                <input type="hidden" value="45" name="boletos[dos_dias][precio]">

                            </div>

                        </div>

                    </li>

                </ul>

            </div>

            <div id="eventos" class="eventos clearfix">
                 <h3>Elige tus talleres</h3>

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
                        <div id="<?php echo str_replace('�', 'a', $dia); ?>" class="contenido-dia clearfix">

                           <h4><?php echo $dia ?></h4>
                              <?php foreach ($eventos['eventos'] as $tipo => $evento_dia) {  ?>

                                 <div>
                                     <p><?php echo $tipo ?>:</p>

                                     <?php foreach ($evento_dia as $evento) {  ?>
                                         <label>
                                            <input type="checkbox" name="registro[]" id="<?php echo $evento['id'] ?>" value="<?php echo $evento['id'] ?>"><time><?php echo $evento['hora'] ?></time> <?php echo $evento['nombre_evento'] ?><br>
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
                
                <h3>Pago y Extras</h3>

                <div class="caja clearfix">
                    
                    <div class="extras">
                        
                        <div class="orden">
                            
                            <label for="camisa_eventos">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
                            <input type="number" name="pedido_extra[camisa][cantidad]" id="camisa_eventos" min="0" size="3" placeholder="0">
                            <input type="hidden" value="10" name="pedido_extra[camisa][precio]">

                        </div>

                        <div class="orden">
                            
                            <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Opera)</small></label>
                            <input type="number" name="pedido_extra[etiquetas][cantidad]" id="etiquetas" min="0" size="3" placeholder="0">
                            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">

                        </div>

                        <div class="orden">
                            
                            <label for="regalo">Seleccione un regalo</label><br>
                            <select name="regalo" id="regalo" required>
                                
                                <option value="">Seleccione un regalo --</option>
                                <option value="2">Etiquetas</option>
                                <option value="1">Pulsera</option>
                                <option value="3">Plumas</option>

                            </select>

                        </div>

                        <input type="button" id="calcular" class="button" value="Calcular">

                    </div>

                    <div class="total">
                        
                        <p>Resumen:</p>

                        <div id="lista-productos">
                            
                        </div>
                        <p>Total:</p>

                        <div id="suma-total">
                            
                        </div>
                        
                        <input type="hidden" name="total_pedido" id="total_pedido">
                        <input type="submit" id="btnRegistrar" size="3" class="button" name="submit" value="Pagar">

                    </div>

                </div>

            </div>

      </form>

  </section>

<?php include_once 'includes/template/footer.php' ?>
