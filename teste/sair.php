<?php

	session_start();
	unset($_SESSION['emailUsuario']);
	header('Location: http://localhost/teste/login.php');

?>