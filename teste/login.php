<!DOCTYPE html>
<html>
	<head>
		<title>Login - Roll and Play GENG</title>
	<?php include("header.php"); ?>

	<div class="ImageFundo" style="background-image: url('image/bgLogin.png');">
		<div class="CenterTitulo">
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
					<a href="cadastro.php">
						<small>Ainda não possui uma conta?<strong>Cadastre-se!</strong></small>
					</a>
				</div>
				<div class="CadastroFormulario">
					<input type="submit" value="Entrar">
				</div>
			</form>
		</div>
	</div>	

<?php include("footer.php"); ?>