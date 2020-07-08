<?php include("header.php"); ?>

	<div>
		<h1 class="Titulo Center">CADASTRAR-SE</h1>	
	</div>

	<div class="Retorno">
		
	</div>

	<div class="RetornoNegativo">
		
	</div>

	<div class="Formulario">
		<form name="formCadastro" id="formCadastro" action="controller/cadastroController.php" method="post">
			<div class="CadastroFormulario">
				<span>Usuário: <br></span>
				<input type="text" name="usuario" id="usuario" required>
			</div>
			<div class="CadastroFormulario">
				<span>E-mail: <br></span>
				<input type="text" name="email" id="email" required>
			</div>
			<div class="CadastroFormulario">
				<span>Confirmar e-mail: <br></span>
				<input type="text" name="confEmail" id="confEmail" required>
			</div>
			<div class="CadastroFormulario">
				<span>Senha: <br></span>
				<input type="password" name="senha" id="senha" required>
			</div>
			<div class="CadastroFormulario">
				<span>Confirmar senha: <br></span>
				<input type="password" name="confSenha" id="confSenha" required>
			</div>
			<div class="CadastroFormulario">
				<input type="submit" value="Cadastrar">
			</div>
		</form>
	</div>

<?php include("footer.php"); ?>