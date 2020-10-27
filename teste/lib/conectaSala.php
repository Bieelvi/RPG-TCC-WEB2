<?php
	session_start();

	include("../model/ConexaoDataBase.php");

	include("funcoes.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if(!isset($_POST['nomeSalaCriada']) && !isset($_POST['senhaSalaCriada'])){

	} else {
		if(verificaJogador($_SESSION['usuarios'][2], $_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'])){
			$mensagem = "Conectando na sala {$_POST['nomeSalaCriada']}!";
			$_SESSION['vericaSalas'] = array(1, $mensagem);
		} else {
			$sqlSalaPresencial = $conn->prepare("SELECT nome_sala_presencial, senha_sala_presencial FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
			$sqlSalaPresencial->bindValue(1, $_POST['nomeSalaCriada']);
			$sqlSalaPresencial->bindValue(2, $_POST['senhaSalaCriada']);
			if($sqlSalaPresencial->execute()) {
				if($sqlSalaPresencial->rowCount()){
					$retorno = verificaJogadoresSala($_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'], $_SESSION['usuarios'][2]);
					if($retorno == 1){
						$mensagem = "Conectando na sala {$_POST['nomeSalaCriada']}!";
						$_SESSION['vericaSalas'] = array(1, $mensagem);
					} else {
						$mensagem = "Sala {$_POST['nomeSalaCriada']} cheia!";
						$_SESSION['vericaSalas'] = array(0, $mensagem);
					}			
				} else {
					$sqlSalaOnline = $conn->prepare("SELECT nome_sala_online, senha_sala_online FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ?");
					$sqlSalaOnline->bindValue(1, $_POST['nomeSalaCriada']);
					$sqlSalaOnline->bindValue(2, $_POST['senhaSalaCriada']);
					if($sqlSalaOnline->execute()){
						if($sqlSalaOnline->rowCount()){
							$retorno = verificaJogadoresSala($_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'], $_SESSION['usuarios'][2]);
							if($retorno == 1){
								$mensagem = "Conectando na sala {$_POST['nomeSalaCriada']}!";
								$_SESSION['vericaSalas'] = array(1, $mensagem);
							} else {
								$mensagem = "Sala {$_POST['nomeSalaCriada']} cheia!";
								$_SESSION['vericaSalas'] = array(0, $mensagem);
							}			
						} else {
							$mensagem = "Sala inexistente!";
							$_SESSION['vericaSalas'] = array(0, $mensagem);							
						}
					}
				}
			}
		}
	}
	$_SESSION['infSala'] = array($_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'], 1);
	header('Location: http://localhost/teste/modoJogo.php');