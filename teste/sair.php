<?php

	session_start();
	unset($_SESSION['emailUsuario']);
	unset($_SESSION['emailUsuarioAdm']);
	header('Location: http://localhost/teste/login.php');

?>