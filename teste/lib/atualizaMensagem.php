<?php
	include("../model/ConexaoDataBase.php");
	$sql = $conn->prepare("SELECT * FROM chat");
	$sql->execute();

	$dado = $sql->fetchAll(PDO::FETCH_ASSOC);

	foreach ($dado as $key) {
		echo "<span style='font-weight: bold; color: blue;'>". $key['nome'] . ": </span>";
		echo "<span>". $key['mensagem'] . "</span><br>";
	}