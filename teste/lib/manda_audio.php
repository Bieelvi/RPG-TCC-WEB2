<?php
	session_start();

	include("../model/ConexaoDataBase.php");

	echo $diretorio = $_GET['dir'];

	$sql = $conn->prepare("UPDATE sala_online SET audio_sala_online = ? WHERE nome_sala_online = ? AND senha_sala_online = ?");
	$sql->bindValue(1, $diretorio);
	$sql->bindValue(2, $_SESSION['infSala'][0]);
	$sql->bindValue(3, $_SESSION['infSala'][1]);
	if($sql->execute()){
		echo "Executado com sucesso!";
	}

	$sql = $conn->prepare("UPDATE sala_presencial SET audio_sala_presencial = ? WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
	$sql->bindValue(1, $diretorio);
	$sql->bindValue(2, $_SESSION['infSala'][0]);
	$sql->bindValue(3, $_SESSION['infSala'][1]);
	if($sql->execute()){
		echo "Executado com sucesso!!!!!!!!!!!!!";
	}