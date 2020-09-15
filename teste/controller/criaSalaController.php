<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if($_POST['sala'] == 'Online')
		//1 == ONLINE no Banco de Dados
		$opSala = 1;
	else if ($_POST['sala'] == 'Presencial')
		//2 == PRESENCIAL no Banco de Dados
		$opSala = 2;

	echo "Ola";

