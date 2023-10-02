<?php 

if (!isset($_SESSION['nombre'])&&!isset($_SESSION['idcliente'])) {
	header("Location: login.php");
	die();
}


?>