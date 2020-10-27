<?php 
	session_start();
	
	include("funcoesChat.php");

	if(isset($_POST['mensagem']))
		insereTabelaChat($_SESSION['infSala'][0], $_POST['mensagem'], $_SESSION['usuarios'][0]);
	else
		echo "erro";