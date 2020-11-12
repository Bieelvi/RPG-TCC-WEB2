<?php
	include("../model/ConexaoDataBase.php");

	echo $diretorio = $_GET['dir'];

	$sql = $conn->prepare("UPDATE sala_online SET imagem_sala_online = ? WHERE nome_sala_online = ? AND senha_sala_online = ?");
	$sql->bindValue(1, $diretorio);
	$sql->bindValue(2, "DungeonAndDragon");
	$sql->bindValue(3, "123");
	$sql->execute();