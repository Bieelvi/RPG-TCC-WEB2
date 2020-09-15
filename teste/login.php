<!DOCTYPE html>
<html>
	<head>
		<title>Login - Roll and Play GENG</title>
<?php include("header.php"); ?>

	<div class="CenterTitutoUm">
		<h1>Entrar</h1>
	</div>

	<div class="Formulario">
		<form name="formLogin" id="formLogin" action="controller/loginController.php" method="post">
			<div class="CadastroFormulario">
				<span>E-mail: <br></span>
				<input type="text" name="email" id="email" autocomplete="off" required>
			</div>			
			<div class="CadastroFormulario">
				<span>Senha: <br></span>
				<input type="password" name="senha" id="senha" autocomplete="off" required>
			</div>
			<div class="CadastroFormulario">
				<small>Ainda não possui uma conta? <a href="cadastro.php"><strong>Cadastre-se!</strong></a></small>
			</div>
			<div class="CadastroFormulario">
				<input type="submit" value="Entrar">
			</div>
		</form>
	</div>

<?php include("footer.php"); ?>