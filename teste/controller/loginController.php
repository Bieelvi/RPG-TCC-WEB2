<?php 
	include("../model/ConexaoDataBase.php");

	if(empty($_POST[('senha')])){
		echo "O senha não está corretamente preenchida!";
	} elseif(empty($_POST[('email')])) {
		echo "O e-mail não está corretamente preenchido!";
	} else {

		$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
		$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
	
		$sql = $conn->prepare("SELECT emailUsuario FROM usuario WHERE senhaUsuario = ? AND emailUsuario = ?");

		$sql->bindValue(1, md5($senha)); 
		$sql->bindValue(2, $email);

		$sql->execute();

		if($sql->rowCount() > 0){

			$dado = $sql->fetch();

			if($dado['emailUsuario'] == "bieelvii@gmail.com" || $dado['emailUsuario'] == "edilsonFilho@gmail.com" || $dado['emailUsuario'] == "gubiRosin@gmail.com"){
				
				session_start();

				$_SESSION['emailUsuario'] = $dado['emailUsuario'];

				header('Location: http://localhost/teste/admPage.php');

			} else {

				session_start();

				$_SESSION['emailUsuario'] = $dado['emailUsuario'];

				header('Location: http://localhost/teste/userPage.php');

			}

			

		} else {

			echo "Acesso negado!";

		}

	}
	
?>