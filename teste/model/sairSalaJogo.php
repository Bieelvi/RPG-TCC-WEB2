<?php
	include("../lib/funcoesChat.php");

	session_start();

	deletaTabelaChat($_SESSION['infSala'][0]);

	unset($_SESSION['infSala']);

	header('Location: http://localhost/teste/index.php');