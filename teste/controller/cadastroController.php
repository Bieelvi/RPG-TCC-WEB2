<?php
	include("../model/ConexaoDataBase.php");

	if(isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['confEmail']) && isset($_POST['senha']) && isset($_POST['confSenha'])){
		if($_POST[('senha')] != $_POST[('confSenha')]){
			echo "Os senhas não estão corretamente preenchidas!";
		} elseif($_POST[('email')] != $_POST[('confEmail')]) {
			echo "Os e-mail não estão corretamente preenchidos!";
		} else {
			$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
			
			$sql = $conn->prepare("SELECT codigoUsuario FROM usuario WHERE emailUsuario = ?");
			$sql->bindValue(1, $email);

			if(!$sql->execute()){
				echo "Erro no cadastro!";
			} else {
				if($sql->rowCount()){
					echo "E-mail já cadastrado!"; ?>

					<script type='text/JavaScript'>
						setTimeout(function () {
						    window.location.reload();
						}, 2000); 
					</script>

		<?php } else {
					$usuario = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_SPECIAL_CHARS);
					$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
					$confEmail = filter_input(INPUT_POST,'confEmail',FILTER_SANITIZE_EMAIL);
					$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
					$confSenha = filter_input(INPUT_POST,'confSenha',FILTER_SANITIZE_SPECIAL_CHARS);
					$hierarquiaUsuario = 0;

					$sql = $conn->prepare("INSERT INTO usuario (nomeUsuario, senhaUsuario, emailUsuario, hierarquiaUsuario) VALUES (?, ?, ?, ?)");

					$sql->bindValue(1, $usuario, PDO::PARAM_STR);
					$sql->bindValue(2, md5($senha), PDO::PARAM_STR);
					$sql->bindValue(3,  $email, PDO::PARAM_STR);
					$sql->bindValue(4,  $hierarquiaUsuario);

					if($sql->execute()){
						echo "Cadastrado com sucesso!"; ?>
						<script type='text/JavaScript'>
						    setTimeout(function () {
						        window.location.href = 'index.php'; 
						    }, 2000); 
						</script>
					<?php } else {
						echo "Erro no cadastro!";
						}
					}
				}	
		}
	} else {
		echo "Por favor preencha todos os campos!";
	}
?>