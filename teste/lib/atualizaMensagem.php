<?php
	session_start();
	
	include("funcoesChat.php");

	atualizaTabelaChat($_SESSION['infSala'][0]);	

