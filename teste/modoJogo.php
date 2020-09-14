<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
		$hierarquiaUsuario = $_SESSION['usuarios'][1];
	} else {
		header('Location: http://localhost/teste/login.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $nomeUsuario; ?> - Roll and Play GENG</title>
<?php include("header.php"); ?>	

	<Div class="Retorno">
		
	</Div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="container">
					<form action="controller/criaSalaController.php" method="POST">
						<div class="CadastroSala">	
							<p class="Titulo">CRIAR UMA SALA</p>
						</div>	
						<div class="CadastroSala">
							<label>USUÁRIO</label>
							<input type="text" size="48%" class="mb-2" disabled value="<?php echo $nomeUsuario; ?>">
						</div>
						<div class="CadastroSala">
							<label>MESTRE</label>
							<input type="text" name="nomeMestre" id="nomeMestre" size="48%" class="mb-2" placeholder="Nome do mestre..." required>
						</div>
						<div class="CadastroSala">
							<label>SALA</label>
							<input type="text" name="nomeSala" id="nomeSala" size="48%" class="mb-2" placeholder="Nome da sala..." required>
						</div>
						<div class="CadastroSala">
							<label>SENHA</label>
							<input type="password" name="senhaSala" id="senhaSala" size="48%" placeholder="Senha..." required>
						</div>			
						<div class="CadastroSala">
							<input type="submit" value="Criar">
						</div>			
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="container">
					<form action="controller/criaJogadorController.php" method="POST">
						<div class="CadastroSala">	
							<p class="Titulo">CRIAR UM PERSONAGEM</p>
						</div>
						<div class="CadastroSala">
							<label>USUÁRIO</label>
							<input type="text" size="48%" class="mb-2" disabled value="<?php echo $nomeUsuario; ?>">
						</div>	
						<div class="CadastroSala">
							<label>PERSONAGEM</label>						
							<input type="text" name="nomeJogador" id="nomeJogador" size="48%" class="mb-2" placeholder="Nome do seu personagem..." required>
						</div>
						<div class="CadastroSala">
							<input type="submit" value="Criar">
						</div>			
					</form>
				</div>
			</div>
		</div>
	</div>

<?php include("footer.php"); ?>