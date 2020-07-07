<?php 

	session_start();

	include("../model/ConexaoDataBase.php");

	if($_POST[('senha')] != $_POST[('confSenha')]){
		$_SESSION['mensagem'] = "<p style='color:red;'>Por favor inserir senhar iguais!</p>";
		header("Location: http://localhost/teste/view/cadastro.php");
	} elseif($_POST[('email')] != $_POST[('confEmail')]) {
		$_SESSION['mensagem'] = "<p style='color:red;'>Por favor inserir e-mail iguais!</p>";
		header("Location: http://localhost/teste/view/cadastro.php");
	} else {

		$usuario = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_SPECIAL_CHARS);
		$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
		$confEmail = filter_input(INPUT_POST,'confEmail',FILTER_SANITIZE_EMAIL);
		$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
		$confSenha = filter_input(INPUT_POST,'confSenha',FILTER_SANITIZE_SPECIAL_CHARS);

		$create = $conn->prepare("INSERT INTO usuario (nomeUsuario, senhaUsuario, emailUsuario) VALUES (?, ?, ?)");

		$create->bindValue(1, $usuario, PDO::PARAM_STR);
		$create->bindValue(2, $email, PDO::PARAM_STR);
		$create->bindValue(3, $senha, PDO::PARAM_STR);

		if($create->execute()){
			echo "Inserido com sucesso no Banco de Dados!";
		} else {
			echo "Erro ao inserir os dados no Banco de Dados!";
		}
	}

?>