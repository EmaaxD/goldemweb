<?php 
session_start();
//verificar si el usuario esta autenticado\
function usuario_autentitcado(){
	if (!revisar_usuario()) {
		header("Location:index.php");
		exit();
	}
}

function revisar_usuario(){
	return isset($_SESSION['usuario']);
}

usuario_autentitcado();