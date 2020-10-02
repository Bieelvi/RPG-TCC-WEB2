<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if(isset($_POST['nomeJogador'])){
		$_SESSION['nomePersonagem'] = $_POST['nomeJogador'];
		$_SESSION['infJogador'] = array($_POST['nomeJogador'], $nomeUsuario); 

		$sqlConsultaPersonagem = $conn->prepare("SELECT nome_jogador FROM jogador WHERE codigo_usuario = ? AND nome_jogador = ?");
		$sqlConsultaPersonagem->bindValue(1, $_SESSION['usuarios'][2]);
		$sqlConsultaPersonagem->bindValue(2, $_SESSION['nomePersonagem']);
		$sqlConsultaPersonagem->execute();

		if($sqlConsultaPersonagem->rowCount())
			echo "Não é possível criar um personagem com o nome já existente!";
		else {
			$sqlInsertJogador = $conn->prepare("INSERT INTO jogador (codigo_usuario, nome_jogador) VALUES (?, ?)");
			$sqlInsertJogador->bindValue(2, $_POST['nomeJogador']);
			$sqlInsertJogador->bindValue(1, $_SESSION['usuarios'][2]);

			if(!$sqlInsertJogador->execute()){
				echo "Erro! Não foi possível criar o personagem";
			} else { ?>
				<script type='text/JavaScript'>
					setTimeout(function () {
					   window.location.href = '../criaFicha.php'; 
					}, 2); 
				</script> <?php 
			}
		}
	} else {
		echo "Impossível criar o personagem!";
	}