<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['nombre'])) {
	header("Location: login.php");
	die();
}elseif ($_SESSION['administrador']!="logeado") {
	header("Location: login.php");
	die();
	}



?>