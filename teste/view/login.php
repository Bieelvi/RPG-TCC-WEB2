<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styleView.css">
	<title>Login - Roll and Play GENG</title>
</head>
<body>

	<div class="TituloLoginCadastro">
		<h1>
			ENTRAR
		</h1>
	</div>

	<form action="../controller/cadastroLogin.php" method="post">
		<div class="CadastroFormulario">
			<input type="text" name="loginEmail" id="loginEmail" placeholder="E-mail" required>
		</div>
		<div class="CadastroFormulario">
			<input type="text" name="loginSenha" id="loginSenha" placeholder="Senha" required>
		</div>
		<div class="CadastroFormulario">
			<input type="submit" value="Entrar">
		</div>
	</form>
</body>
</html>