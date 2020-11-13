<!DOCTYPE html>
<html>
<head>
	<title>Teste - Roll and Play GENG</title>
	<?php 
		session_start();

		include("header.php");
		include("lib/funcoesChat.php");
		include("lib/funcoes.php");
		include("model/ConexaoDataBase.php");

		$nome = 123;
		$senha = 123;

		$arrayIdMestre = pegaIdArrayMestre($_SESSION['usuarios'][2]);

		echo verificaPersonagemMestre($nome, $senha, $arrayIdMestre);

	?>

	<?php include("footer.php"); ?>  