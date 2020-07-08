<?php
	include("../model/ConexaoDataBase.php");

	if($_POST[('senha')] != $_POST[('confSenha')]){
		echo "Os senhas não estão corretamente preenchidas!";
	} elseif($_POST[('email')] != $_POST[('confEmail')]) {
		echo "Os e-mail não estão corretamente preenchidos!";
	} else {

		$sql = $conn->prepare("SELECT codigoUsuario FROM usuario WHERE nomeUsuario = ?");

		$sql->bindValue(1, $_POST[('usuario')]);

		$sql->execute();

		if($sql->rowCount() > 0){

			echo "Usuário já cadastrado!";

		} else {

			$usuario = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_SPECIAL_CHARS);
			$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
			$confEmail = filter_input(INPUT_POST,'confEmail',FILTER_SANITIZE_EMAIL);
			$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
			$confSenha = filter_input(INPUT_POST,'confSenha',FILTER_SANITIZE_SPECIAL_CHARS);

			$sql = $conn->prepare("INSERT INTO usuario (nomeUsuario, senhaUsuario, emailUsuario) VALUES (?, ?, ?)");

			$sql->bindValue(1, $usuario, PDO::PARAM_STR);
			$sql->bindValue(2, md5($senha), PDO::PARAM_STR);
			$sql->bindValue(3,  $email, PDO::PARAM_STR);

			if($sql->execute()){
				echo "Cadastrado com sucesso!";
			} else {
				echo "Erro no cadastro!";
			}

		}		
	}

?>