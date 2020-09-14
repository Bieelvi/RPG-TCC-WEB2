<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
	} else {
		header('Location: http://localhost/teste/login.php');
	}

	if(isset($_POST['nomeJogador'])){
		$_SESSION['infJogador'] = array($_POST['nomeJogador'], $nomeUsuario); 
		$sqlInsertJogador = $conn->prepare("INSERT INTO jogador (nomeJogador) VALUES (?)");
		$sqlInsertJogador->bindValue(1, $_POST['nomeJogador']);
		$sqlInsertJogador->execute();
		?>
		<script type='text/JavaScript'>
			setTimeout(function () {
			   window.location.href = '../modoJogo.php'; 
			}, 2); 
		</script> <?php
	} else {
		echo "Impossível criar sala!";
	}