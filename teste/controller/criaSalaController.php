<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if($_POST['sala'] == 'Online'){
		$sqlInsertSalaOnline = $conn->prepare("INSERT INTO sala_online (codigo_mestre, nome_sala_online, senha_sala_online) VALUES (?, ?, ?)");
		$sqlInsertSalaOnline->bindValue(1, $_SESSION['infSala'][4]);
		$sqlInsertSalaOnline->bindValue(2, $_SESSION['infSala'][1]);
		$sqlInsertSalaOnline->bindValue(3, $_SESSION['infSala'][2]);
		if($sqlInsertSalaOnline->execute()){
			echo "Add com sucesso!";
		} else {
			echo "Erro";
		}
	}
	else if($_POST['sala'] == 'Presencial'){
		$sqlInsertSalaPresencial = $conn->prepare("INSERT INTO sala_presencial (codigo_mestre, nome_sala_presencial, senha_sala_presencial) VALUES (?, ?, ?)");
		$sqlInsertSalaPresencial->bindValue(1, $_SESSION['infSala'][4]);
		$sqlInsertSalaPresencial->bindValue(2, $_SESSION['infSala'][1]);
		$sqlInsertSalaPresencial->bindValue(3, $_SESSION['infSala'][2]);
		if($sqlInsertSalaPresencial->execute()){
			echo "Add com sucesso!";
		} else {
			echo "Erro";
		}
	}
	  	