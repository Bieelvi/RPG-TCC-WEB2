<!DOCTYPE html>
<html>
<head>
	<title>Teste - Roll and Play GENG</title>
	<?php include("header.php"); ?>

	<?php 
		include("lib/funcoesChat.php");

		criaTabelaChat($nomeSala);

		deletaTabelaChat($nomeSala);

	?>

	<?php include("footer.php"); ?>