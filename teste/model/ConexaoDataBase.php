<?php 
	$server = "143.106.241.3";
	$usuario = "cl19458";
	$senha = "cl*10022000";
	$banco = "cl19458";	

	try {
		$conn = new PDO('mysql:host='.$server.';dbname='.$banco, $usuario, $senha);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
	} catch (PDOException $erro){
		echo "Erro ao tentar conectar com os banco de dados: {$erro->getMessage()}";
		$conn = "1";
	}