<?php 

try {
	$sql = "SELECT * FROM invitados";
	$result = $conexion->query($sql);
} catch (Exception $e) {
	$error = $e->getMessage();
}

?>

<section class="invitados contenedor seccion">
	<h2>Invitados</h2>

    <ul class="lista-invitados clearfix">
	
		<?php while ($invitados = $result->fetch_assoc()) { ?>

            <li>
                
                <div class="invitado">
                    <a class="invitado-info" href="#invitado<?php echo $invitados['id_invitado'] ?>">
                    	<img src="img/invitados/<?php echo $invitados['url_img'] ?>" alt="imagen invitado">
	                    <p><?php echo $invitados['name_invitado']." ".$invitados['lastname_invitado'] ?></p>
                    </a>
                </div>

            </li>

            <div style="display: none;">
            	<div class="invitado-info" id="invitado<?php echo $invitados['id_invitado'] ?>">

            		<h2><?php echo $invitados['name_invitado']." ".$invitados['lastname_invitado'] ?></h2>
            		<img src="img/invitados/<?php echo $invitados['url_img'] ?>" alt="imagen invitado" width="400">
            		<p><?php echo $invitados['description'] ?></p>

            	</div>
            </div>

		<?php } ?>
	</ul>

</section>	