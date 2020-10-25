<?php 
	session_start();
	
	include("../model/ConexaoDataBase.php");

	$sqlInsert = $conn->prepare("INSERT INTO chat (nome, mensagem) VALUES (?, ?)");
	$sqlInsert->bindValue(1, $_SESSION['usuarios'][0]);
	$sqlInsert->bindValue(2, $_POST['mensagem']);
	$sqlInsert->execute();