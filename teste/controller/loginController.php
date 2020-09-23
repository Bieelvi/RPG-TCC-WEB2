<?php 
	session_start();

	require("../model/ConexaoDataBase.php");

	if(isset($_POST["senha"]) && isset($_POST["email"]) && $conn != "1"){

		$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
		$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
	
		$sql = $conn->prepare("SELECT * FROM usuario WHERE senha_usuario = ? AND email_usuario = ?");
		$sql->bindValue(1, $senha); 
		$sql->bindValue(2, $email);
		
		$sql->execute();

		if($sql->rowCount()){
			$dado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
			$_SESSION['usuarios'] = array($dado["nome_usuario"], $dado["hierarquia"], $dado["codigo_usuario"]);
			header('Location: http://localhost/teste/userPage.php');
		} else {
			header('Location: http://localhost/teste/login.php');
		}
	} else {
		header('Location: http://localhost/teste/login.php');
	}	
?>