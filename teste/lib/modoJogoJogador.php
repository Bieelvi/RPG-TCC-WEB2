<?php 
	session_start();
	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
	} else {
		header('Location: http://localhost/teste/login.php');
	}

	if(!isset($_POST['nomeJogador']) && !isset($_POST['nomeSala']) && !isset($_POST['senhaSala']))
		echo "Preencha todos os campos!";
	else {
		$nomeJogador = filter_input(INPUT_POST,'nomeJogador',FILTER_SANITIZE_SPECIAL_CHARS);
		$nomeSala = filter_input(INPUT_POST,'nomeSala',FILTER_SANITIZE_SPECIAL_CHARS);
		$senhaSala = filter_input(INPUT_POST,'senhaSala',FILTER_SANITIZE_SPECIAL_CHARS);

		$_SESSION['infSalaUsuario'] = array($nomeUsuario, $nomeJogador, $nomeSala, $senhaSala);

		header('Location: http://localhost/teste/jogar.php');
	}