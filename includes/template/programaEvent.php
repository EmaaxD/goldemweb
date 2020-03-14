<?php 

try {

    //consulta para los nombres de los eventos
    $sql = "SELECT * FROM categoria_evento ORDER BY id_categoria DESC";
    $result = $conexion->query($sql);   

} catch (Exception $e) {
    $error = $e->getMessage();
}

?>    
    <div class="contenido-programa">
                
        <div class="contenedor">
            
            <div class="programa-evento">

                <h2>Programa del evento</h2>

                <nav class="menu-programa">

                    <?php while ($cat = $result->fetch_array(MYSQLI_ASSOC)) { ?>

                        <?php $nombre_evento = $cat['cat_event'] ?>
                    
                        <a href="#<?php echo strtolower($nombre_evento) ?>">
                            <i class="<?php echo $cat['icons'] ?> Icons"></i><?php echo $nombre_evento ?></a>

                    <?php } ?>

                </nav>
                <?php  

                try {
                                    
                    $sql = "SELECT id_eventos,name_event,date_event,hour_event,cat_event,icons,name_invitado,lastname_invitado ";

                    $sql.= "FROM eventos ";

                    $sql.= "INNER JOIN categoria_evento ";

                    $sql.= "ON eventos.id_cat_event=categoria_evento.id_categoria ";

                    $sql.= "INNER JOIN invitados ";

                    $sql.= "ON eventos.id_inv=invitados.id_invitado ";

                    $sql.= "AND eventos.id_cat_event=1 ";

                    $sql.= "ORDER BY id_eventos LIMIT 2; ";

                    $sql .= "SELECT id_eventos,name_event,date_event,hour_event,cat_event,icons,name_invitado,lastname_invitado ";

                    $sql.= "FROM eventos ";

                    $sql.= "INNER JOIN categoria_evento ";

                    $sql.= "ON eventos.id_cat_event=categoria_evento.id_categoria ";

                    $sql.= "INNER JOIN invitados ";

                    $sql.= "ON eventos.id_inv=invitados.id_invitado ";

                    $sql.= "AND eventos.id_cat_event=2 ";

                    $sql.= "ORDER BY id_eventos LIMIT 2; ";

                    $sql .= "SELECT id_eventos,name_event,date_event,hour_event,cat_event,icons,name_invitado,lastname_invitado ";

                    $sql.= "FROM eventos ";

                    $sql.= "INNER JOIN categoria_evento ";

                    $sql.= "ON eventos.id_cat_event=categoria_evento.id_categoria ";

                    $sql.= "INNER JOIN invitados ";

                    $sql.= "ON eventos.id_inv=invitados.id_invitado ";

                    $sql.= "AND eventos.id_cat_event=3 ";

                    $sql.= "ORDER BY id_eventos LIMIT 2; ";              

                } catch (Exception $e) {

                    echo $e->getMessage();

                }

                ?>

                <?php 

                    if(!$conexion->multi_query($sql)) {

                        echo "Falló la multiconsulta: (" . $conexion->errno . ") " . $conexion->error;

                    }

                ?>

                <?php do {

                    $resultado = $conexion->store_result();

                    $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

                    <?php $i = 0; ?>

                    <?php foreach ($row as $evento) {  ?>

                        <?php 

                            if ($i % 2 == 0) { 

                                $cat_event = $evento['cat_event'];

                        ?>

                            <div id="<?php echo strtolower($cat_event); ?>" class="info-curso ocultar clearfix">

                                <?php  } ?>

                                    <div class="detalle-evento">

                                      <h3><?php echo utf8_encode($evento['name_event']); ?></h3>

                                      <p><i class="fas fa-clock fa-lg Icons"></i> <?php echo $evento['hour_event']; ?></p>

                                      <p><i class="fas fa-calendar fa-lg Icons"></i> <?php echo $evento['date_event']; ?></p>

                                      <p><i class="fas fa-user fa-lg Icons"></i>

                                        <?php echo $evento['name_invitado']." ".$evento['lastname_invitado']; ?></p>

                                    </div>

                                <?php if ($i % 2 == 1) { ?>

                                    <a href="calendario.php" class="button float-right">Ver todos</a>

                            </div>

                          <!--#talleres-->

                        <?php } ?>

                        <?php $i++; ?>

                     <?php } ?>

                    <?php $resultado->free(); ?>

                <?php } while ($conexion->more_results() && $conexion->next_result()); ?>

            </div>

        </div>

    </div>