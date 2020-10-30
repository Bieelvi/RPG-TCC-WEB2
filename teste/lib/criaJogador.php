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

		$sqlCodigo = $conn->prepare("SELECT * FROM jogador WHERE codigo_usuario = ?");
		$sqlCodigo->bindValue(1, $_SESSION['usuarios'][2]);
		$sqlCodigo->execute();

		if($sqlCodigo->rowCount() >= 5) {
			$mensagem = "Impossível criar mais de 5 jogadores!";
			$_SESSION['personagmCriado'] = array(0, $mensagem);
		} else {
			$sqlConsultaPersonagem = $conn->prepare("SELECT nome_jogador FROM jogador WHERE codigo_usuario = ? AND nome_jogador = ?");
			$sqlConsultaPersonagem->bindValue(1, $_SESSION['usuarios'][2]);
			$sqlConsultaPersonagem->bindValue(2, $_SESSION['nomePersonagem']);
			$sqlConsultaPersonagem->execute();

			if($sqlConsultaPersonagem->rowCount()){
				$mensagem = "Não é possível criar um personagem com um nome já existente!";
				$_SESSION['vericaPersonagem'] = array(0, $mensagem);	
			} else {
				$sqlInsertJogador = $conn->prepare("INSERT INTO jogador (codigo_usuario, nome_jogador) VALUES (?, ?)");
				$sqlInsertJogador->bindValue(2, $_POST['nomeJogador']);
				$sqlInsertJogador->bindValue(1, $_SESSION['usuarios'][2]);
				if(!$sqlInsertJogador->execute()){
					$mensagem = "Algo aconteceu! Não foi possível iniciar uma ficha.";
					$_SESSION['vericaPersonagem'] = array(0, $mensagem);	
				} else {
					$mensagem = "Iniciando uma ficha nova!";
					$_SESSION['vericaPersonagem'] = array(1, $mensagem);	
				}
			}
		}
	} else {
		$mensagem = "Algo aconteceu! Não foi possível iniciar uma ficha.";
		$_SESSION['vericaPersonagem'] = array(0, $mensagem);	
	}
	
	header('Location: http://localhost/teste/modoJogo.php');