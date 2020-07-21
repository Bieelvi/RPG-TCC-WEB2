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
			session_start();
			$_SESSION['emailUsuario'] = $dado['emailUsuario'];
			header('Location: http://localhost/teste/userPage.php');

		} else {

			$sqlAdm = $conn->prepare("SELECT emailUsuario FROM administrador WHERE senhaUsuario = ? AND emailUsuario = ?");
			$sqlAdm->bindValue(1, $senha); 
			$sqlAdm->bindValue(2, $email);
			$sqlAdm->execute();

			if($sqlAdm->rowCount() > 0) {

				$dadoAdm = $sqlAdm->fetch();
				session_start();
				$_SESSION['emailUsuarioAdm'] = $dadoAdm['emailUsuario'];
				header('Location: http://localhost/teste/admPage.php');

			} else {

				echo "Acesso Negado!";

			}
		}
	}	
?>