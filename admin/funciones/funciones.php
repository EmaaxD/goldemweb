<?php 
//sanear datos string
function sanearCadena($cadena){
	if (strlen($cadena) < 3) {
		echo 'error debe tener mas caracteres';
	}else{

		//saniamos la cadena
		$cadena_saneada = ucwords(strtolower($cadena));

		return $cadena_saneada;
	}
}

//encriptar password
function passwordEncriptada($contra){
	
	//encriptar password
	$opciones = array(
		'cost' => 12
	);
	$password_hashed = password_hash($contra, PASSWORD_BCRYPT, $opciones);

	return $password_hashed;
}

//formatear fechas
function formatearFecha($fecha){
	$fecha_formateada = date('Y-m-d', strtotime($fecha));
	return $fecha_formateada;
}

//consultamos a una tabla
function consultaUnaTabla($core,$tabla,$campoComparacion = null,$comparacion = null,$ordenar = null){
	
	if (!is_null($campoComparacion) && !is_null($comparacion)) {
		//consulta para hacer comparaciones en una tabla
		$sql = "SELECT * FROM {$tabla} WHERE {$campoComparacion} = {$comparacion}";
		$result = $core->query($sql);
		return $result;

	}elseif (!is_null($ordenar)) {
		//consulta con orden DESC
		$sql = "SELECT * FROM {$tabla} ORDER BY {$ordenar} DESC";
		$result = $core->query($sql);
		return $result;
	}else{
		//consulta simple
		$sql = "SELECT * FROM {$tabla}";
		$result = $core->query($sql);
		return $result;
	}
}

//consulta a multiple tablas
function multipleTablas($core,$campos){
	
	$sql = "SELECT {$campos['idEventos']},{$campos['nombreEvento']},{$campos['fechaEvento']},{$campos['horaEvento']},{$campos['categoriaEvent']},{$campos['nombreInvitado']},{$campos['apellidoInvitado']} 
			FROM {$campos['tablaPrincipal']} 
			INNER JOIN {$campos['primeraTablaRelacionada']} 
			ON {$campos['tablaPrincipal']}.{$campos['id_cat_event_Eventos']} = {$campos['primeraTablaRelacionada']}.{$campos['idEventosCategoria']} 
			INNER JOIN {$campos['segundaTablaRelacionada']} 
			ON {$campos['tablaPrincipal']}.{$campos['id_inv_Eventos']} = {$campos['segundaTablaRelacionada']}.{$campos['idInvitado']}";
	$result = $core->query($sql);
	
	return $result;		
}

//validamos que la id sea numerica por si las dudas 
function validarId($id){
	
	if (!filter_var($id, FILTER_VALIDATE_INT)) {
		include_once 'template/error500.php';
	}else{
		return $id;
	}
}

//formateamos la fecha al formato que queremos
function formatoDate($data,$tipo){

	$formato_deseado = "";

	if ($tipo == 'fecha') {
		//si viene un formato de fecha
		$formato_deseado = date("m/d/Y", strtotime($data));
	}else{
		//si viene un formato de hora
		$formato_deseado = date('h:i a', strtotime($data));
	}

	return $formato_deseado;
}

//validamos la img
function imgValida($archivo,$post,$ruta,$accion = null){

	$devolvemos = "";
	
	//verifica si existe ese directorio
	if (!is_dir($ruta)) {
		//da permiso a cierta persona y crea el directorio
		mkdir($ruta, 0755, true);
	}

	if (is_null($accion)) {
		//preguntamos si existe la img (solo en crear)
		if (isset($archivo[$post]) && $archivo[$post]['tmp_name'] != '') {
			if (trim($archivo[$post]['name']) != '') {
				//nos alamacena la extencion del archivo selecionado a subir
				$extencion = pathinfo($archivo[$post]['name'], PATHINFO_EXTENSION);

				//array de extenciones permitidas
				$extenciones = array('jpg','jpeg','png');

				//preguntamos por la extencion
				if (in_array($extencion, $extenciones)) {
					//movemos el archivo de la carpeta que se sube por defecto en nuestro servidor, al destino que queremos
					move_uploaded_file($archivo[$post]['tmp_name'], $ruta.$archivo[$post]['name']); 
					$devolvemos =  $archivo[$post]['name'];

				}else{
					$devolvemos =  "errorFormat";
				}
			}	
		}else{
			//no cargo ninguna img
			$devolvemos =  "errorImgVacia";
		}
	}else{
		//es editar
		if (trim($archivo[$post]['name']) != '') {
			//nos alamacena la extencion del archivo selecionado a subir
			$extencion = pathinfo($archivo[$post]['name'], PATHINFO_EXTENSION);

			//array de extenciones permitidas
			$extenciones = array('jpg','jpeg','png');
			
			//preguntamos por la extencion
			if (in_array($extencion, $extenciones)) {
				//movemos el archivo de la carpeta que se sube por defecto en nuestro servidor, al destino que queremos
				move_uploaded_file($archivo[$post]['tmp_name'], $ruta.$archivo[$post]['name']); 
				$devolvemos =  $archivo[$post]['name'];

			}else{
				$devolvemos =  "errorFormat";
			}
		}
	}

	return $devolvemos;
}