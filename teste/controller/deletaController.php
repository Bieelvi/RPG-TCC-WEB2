<?php session_start(); ?>
<?php include("../model/ConexaoDataBase.php"); ?>
<?php

	$codigoUsuario = filter_input(INPUT_GET,'codigoUsuario', FILTER_SANITIZE_NUMBER_INT);

	$sqlDelete = $conn->prepare("DELETE FROM usuario WHERE codigoUsuario = ?");
	$sqlDelete->bindValue(1, $codigoUsuario);

	if($sqlDelete->execute()){
		echo "Deletado com sucesso!";
	} else {
		echo "Erro ao deletar usuario";
	}

?>