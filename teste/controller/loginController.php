<?php 
	include("../model/ConexaoDataBase.php");

	if(empty($_POST[('senha')])){
		echo "O senha não está corretamente preenchida!";
	} elseif(empty($_POST[('email')])) {
		echo "O e-mail não está corretamente preenchido!";
	} else {

		$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
		$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
	
		$sql = $conn->prepare("SELECT codigoUsuario FROM usuario WHERE senhaUsuario = ? AND emailUsuario = ?");

		$sql->bindValue(1, md5($senha)); 
		$sql->bindValue(2, $email);

		$sql->execute();

		if($sql->rowCount() > 0){

			echo "Acesso permitido!";

			$dado = $sql->fetch();

			session_start();

			$_SESSION['codigoUsuario'] = $dado['codigoUsuario'];

		} else {

			echo "Acesso negado!";

		}

	}
	
?>