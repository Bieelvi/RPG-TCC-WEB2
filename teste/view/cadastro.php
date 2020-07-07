<?php session_start(); ?>

<?php include("header.php"); ?>

	<div class="TituloLoginCadastro">
		<h1>
			CADASTRE-SE
		</h1>
	</div>

	<form action="../controller/cadastroController.php" method="post">
		<div class="CadastroFormulario">
			<input type="text" name="usuario" id="usuario" placeholder="Usuário" required>
		</div>
		<div class="CadastroFormulario">
			<input type="text" name="email" id="email" placeholder="E-mail" required>
		</div>
		<div class="CadastroFormulario">
			<input type="text" name="confEmail" id="confEmail" placeholder="Confirmar E-mail" required>
		</div>
		<div class="CadastroFormulario">
			<input type="text" name="senha" id="senha" placeholder="Senha" required>
		</div>
		<div class="CadastroFormulario">
			<input type="text" name="confSenha" id="confSenha" placeholder="Confirmar Senha" required>
		</div>
		<div class="CadastroFormulario">
			<input type="submit" value="Cadastrar">
		</div>
	</form>

	<?php 
		if(isset($_SESSION['mensagem'])){
			echo $_SESSION['mensagem'];
			unset ($_SESSION['mensagem']);
		}
	?>

<?php include("footer.php"); ?>