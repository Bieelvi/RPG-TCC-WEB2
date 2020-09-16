<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro - Roll and Play GENG</title>
		<?php include("header.php"); ?>

	<div class="CenterTitutoUm">
		<h1>Cadastrar-se</h1>
	</div>

	<div class="Retorno">
		<script type="text/javascript">
			$(document).ready(function(){
				$("#formCadastro").on('submit',function(event) {
					event.preventDefault();
					var dados=$(this).serialize();
							  
					$.ajax ({
					  	url: 'controller/cadastroController.php',
					    type: 'post',
					    dataType: 'html',
					    data: dados,
					    success:function(dados){
					    	$('.Retorno').show().html(dados);
					   	}
				  	})
				});
			});
		</script>
	</div>

	<div class="Formulario">
		<form name="formCadastro" id="formCadastro" action="controller/cadastroController.php" method="post">
			<div class="CadastroFormulario">
				<span>Usúario: <br></span>
				<input type="text" name="usuario" id="usuario" autocomplete="off" required>
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