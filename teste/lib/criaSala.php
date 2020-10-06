<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	$nomeSala = $_POST['nomeSala'];
	$senhaSala = $_POST['senhaSala'];
	$nomeMestre = $_POST['nomeMestre'];
	$codigoUsuario = $_SESSION['usuarios'][2];

	$sqlMestre = $conn->prepare("INSERT INTO mestre (codigo_usuario, nome_mestre) VALUES (?, ?)");
	$sqlMestre->bindValue(1, $codigoUsuario);
	$sqlMestre->bindValue(2, $nomeMestre);

	if($sqlMestre->execute()){
		$sqlPegaCodigoMestre = $conn->prepare("SELECT codigo_mestre FROM mestre WHERE codigo_usuario = ?");
		$sqlPegaCodigoMestre->bindValue(1, $codigoUsuario);
		if($sqlPegaCodigoMestre->execute()){
			if($sqlPegaCodigoMestre->rowCount()){
				$dado = $sqlPegaCodigoMestre->fetchAll(PDO::FETCH_ASSOC)[0];
				$_SESSION['infSala'] = array($nomeSala, $senhaSala, $nomeMestre, $codigoUsuario, $dado['codigo_mestre']);
			}
			
		}

		header('Location: http://localhost/teste/criaSala.php');
	}