<?php 

function cerramosSesion(){
	session_destroy();
	header("Location:../index.php");
}

cerramosSesion();