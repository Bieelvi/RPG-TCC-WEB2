<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	$codigoUsuario = filter_input(INPUT_GET,'codigoUsuario', FILTER_SANITIZE_NUMBER_INT);

	$sqlDelete = $conn->prepare("DELETE FROM usuario WHERE codigo_usuario = ?");
	$sqlDelete->bindValue(1, $codigoUsuario);

	if($sqlDelete->execute()){
		$mensagem = "Usuario deletado com sucesso!";
		$_SESSION['vericaDelete'] = array(1, $mensagem);
	} else {
		$mensagem = "Não foi possível deletar o usuario!";
		$_SESSION['vericaDelete'] = array(0, $mensagem);
	}

	header('Location: http://localhost/teste/admPage.php');