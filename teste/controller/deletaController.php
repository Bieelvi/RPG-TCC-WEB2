<?php 
	session_start();
	include("../model/ConexaoDataBase.php");


	$codigoUsuario = filter_input(INPUT_GET,'codigoUsuario', FILTER_SANITIZE_NUMBER_INT);

	$sqlDelete = $conn->prepare("DELETE FROM usuario WHERE codigoUsuario = ?; commit;");
	$sqlDelete->bindValue(1, $codigoUsuario);

	if($sqlDelete->execute()){
		header('Location: http://localhost/teste/admPage.php?acao=1');
	} else {
		header('Location: http://localhost/teste/admPage.php?acao=2');
	}

?>