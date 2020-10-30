<!DOCTYPE html>
<html>
<head>
	<title>Teste - Roll and Play GENG</title>
	<?php include("header.php"); ?>

	<?php include("lib/funcoesChat.php");?>
	<?php include("lib/funcoes.php");?>

	<?php 
		$retorno = pegaInfJogador("Felcor", 13);

		print_r($retorno);
	?>

	<?php include("footer.php"); ?>