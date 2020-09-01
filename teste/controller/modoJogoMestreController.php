<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	$nomeSala = $_POST['nomeSala'];
	$senhaSenha = $_POST['senhaSala'];
	$nomeMestre = $_POST['nomeMestre'];
	$codigoUsuario = $_SESSION['usuarios'][2];

	$sqlMestre = $conn->prepare("INSERT INTO mestre (codigoUsuario, nomeMestre) VALUES (?, ?)");
	$sqlMestre->bindValue(1, $codigoUsuario);
	$sqlMestre->bindValue(2, $nomeMestre);


	if($sqlMestre->execute()){
		if(!isset($_POST['qntJogadores'])){
			$qntJogadores = $_POST['qntJogadores'];
		} else {
			$sqlSelecao = $conn->prepare("SELECT * FROM mestre WHERE codigoUsuario = ?");
			$sqlSelecao->bindValue(1, $codigoUsuario);
			$sqlSelecao->execute();

			if($sqlSelecao->rowCount()){
				$dado = $sqlSelecao->fetchAll(PDO::FETCH_ASSOC)[0];
				$codigoMestre = $dado['codigoMestre'];

				$qntJogadores = 0;

				$sql = $conn->prepare("INSERT INTO salaOnline (nomeSala, senhaSala, codigoMestre) VALUES (?, ?, ?)");
				$sql->bindValue(1, $nomeSala);
				$sql->bindValue(2, $senhaSenha);
				$sql->bindValue(3, $codigoMestre);

				if($sql->execute())
					echo "Sala criada com sucesso!";
			}
		}
	}