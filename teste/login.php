<?php session_start(); ?>

<?php include("header.php"); ?>

	<div>
		<h1 class="Titulo Center">ENTRAR</h1>	
	</div>

	<div class="Retorno">
		
	</div>

	<div class="Formulario">
		<form name="formCadastro" id="formCadastro" action="controller/cadastroController.php" method="post">
			<div class="CadastroFormulario">
				<span>E-mail: <br></span>
				<input type="text" name="email" id="email" required>
			</div>			<div class="CadastroFormulario">
				<span>Senha: <br></span>
				<input type="text" name="senha" id="senha" required>
			</div>
			<small>Caso não possua conta <a href="cadastro.php">registre-se</a> agora!</small>
			<div class="CadastroFormulario">
				<input type="submit" value="Cadastrar">
			</div>
		</form>
	</div>	

	<?php 
		if(isset($_SESSION['mensagem'])){
			echo $_SESSION['mensagem'];
			unset ($_SESSION['mensagem']);
		}
	?>

<?php include("footer.php"); ?>