<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if(!isset($_POST['nomeSalaCriada']) && !isset($_POST['senhaSalaCriada'])){

	} else {
		$sqlSalaPresencial = $conn->prepare("SELECT nome_sala_presencial, senha_sala_presencial FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
		$sqlSalaPresencial->bindValue(1, $_POST['nomeSalaCriada']);
		$sqlSalaPresencial->bindValue(2, $_POST['senhaSalaCriada']);
		if($sqlSalaPresencial->execute()) {
			if($sqlSalaPresencial->rowCount()){
				$infSalaPresencial = $sqlSalaPresencial->fetchAll(PDO::FETCH_ASSOC)[0];
				$mensagem = "Conectando na sala {$_POST['nomeSalaCriada']}!";
				$_SESSION['vericaSalas'] = array(1, $mensagem);
				header('Location: http://localhost/teste/modoJogo.php');
			} else {
				$sqlSalaOnline = $conn->prepare("SELECT nome_sala_online, senha_sala_online FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ?");
				$sqlSalaOnline->bindValue(1, $_POST['nomeSalaCriada']);
				$sqlSalaOnline->bindValue(2, $_POST['senhaSalaCriada']);
				if($sqlSalaOnline->execute()){
					if($sqlSalaOnline->rowCount()){
						$infSalaOnline = $sqlSalaOnline->fetchAll(PDO::FETCH_ASSOC)[0];
						$mensagem = "Conectando na sala {$_POST['nomeSalaCriada']}!";
						$_SESSION['vericaSalas'] = array(1, $mensagem);
						header('Location: http://localhost/teste/modoJogo.php');
					} else {
						$mensagem = "Sala inexistente!";
						$_SESSION['vericaSalas'] = array(0, $mensagem);
						header('Location: http://localhost/teste/modoJogo.php');
					}
				}
			}
		}
	}