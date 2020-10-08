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
				//if($infSalaPresencial['nome_sala_presencial'] == $_POST['nomeSalaCriada'] && $infSalaPresencial['senha_sala_presencial'] == $_POST['senhaSalaCriada'])

			} else {
				$mensagem = "Sala inexistente!";
				$_SESSION['vericaSalas'] = array(0, $mensagem);
				header('Location: http://localhost/teste/modoJogo.php');
			}
		} 
	}
