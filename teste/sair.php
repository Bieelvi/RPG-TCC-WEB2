<?php
	
	session_start();
	unset($_SESSION['codigoUsuario']);
	header('Location: http://localhost/teste/login.php');

?>