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

	$sqlMestre = $conn->prepare("INSERT INTO mestre (codigoUsuario, nomeMestre) VALUES (?, ?)");
	$sqlMestre->bindValue(1, $codigoUsuario);
	$sqlMestre->bindValue(2, $nomeMestre);

	if($sqlMestre->execute()){
		$_SESSION['infSala'] = array($nomeSala, $senhaSala, $nomeMestre, $codigoUsuario);

		header('Location: http://localhost/teste/criaSala.php');
	}