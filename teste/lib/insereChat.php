<?php 
	session_start();
	
	include("funcoesChat.php");

	if(isset($_POST['mensagem'])){
		if(insereTabelaChat($_SESSION['infSala'][0], $_POST['mensagem'], $_SESSION['infSala'][2]) == 1){}
	}
