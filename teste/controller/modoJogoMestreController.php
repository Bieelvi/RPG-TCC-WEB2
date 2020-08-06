<?php 
	session_start();
	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
		$hierarquiaUsuario = $_SESSION['usuarios'][1];
	} else {
		header('Location: http://localhost/teste/login.php');
	}

	if(!isset($_POST['nomeSala']))
		echo "Preencha o campo 'Nome da Sala'";
	else {
		$nomeSala = filter_input(INPUT_POST,'nomeSala',FILTER_SANITIZE_SPECIAL_CHARS);

		if(isset($_POST['QuantidadeJogadores'])
			$qntJogadores = filter_input(INPUT_POST,'QuantidadeJogadores',FILTER_SANITIZE_SPECIAL_CHARS);
		else 
			$qntJogadores = 0;

		$codigoSala = filter_input(INPUT_POST,'codigoSala',FILTER_SANITIZE_SPECIAL_CHARS);
		$tipoJogo = filter_input(INPUT_POST,'presOnPres',FILTER_SANITIZE_SPECIAL_CHARS);;
		$mapa = $_POST['mapaAntigo'];
	}

 ?>