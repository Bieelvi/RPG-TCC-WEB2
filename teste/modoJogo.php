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

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="container">
					<form action="" method="POST">
						<div class="CadastroSala">	
							<p class="Titulo">MESTRE</p>
						</div>	
						<div class="CadastroSala">
							<label>USUÁRIO</label>
							<input type="text" name="UsuarioSala" id="UsuarioSala" size="48%" class="mb-2" disabled value="<?php echo $nomeUsuario; ?>">
						</div>
						<div class="CadastroSala">
							<label>NOME DA SALA</label>
							<input type="text" name="nomeSala" id="nomeSala" size="48%" class="mb-2" placeholder="Nome da sala..." required="">
						</div>
						<div class="CadastroSala">
							<label>SENHA DA SALA</label>
							<input type="text" name="senhaSala" id="senhaSala" size="48%" placeholder="Senha...">
						</div>
						<div class="CadastroSala">
							<label>JOGADORES</label>
							<input type="text" name="QuantidadeJogadores" id="QuantidadeJogadores" size="48%" class="mb-2" placeholder="Quantidade de jogadores...">
						</div>						
						<!-- <div class="CadastroSala">
							<fieldset required>
								<input type="radio" name="presOnPres" id="presOnPres">
								<label>PRESENCIAL</label>
								<input type="radio" name="presOnPres" id="presOnPres">
								<label>ONLINE</label>	
							</fieldset>
						</div>
						<div class="CadastroSala">	
							<label>CARREGAR MAPA</label>
							<input type="file" name="mapaAntigo" id="mapaAntigo" class="mb-2">
						</div> -->					
						<div class="CadastroSala">
							<input type="submit" value="Criar">
						</div>			
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="container">
					<form action="controller/modoJogoJogadorController.php" method="POST">
						<div class="CadastroSala">	
							<p class="Titulo">JOGADOR</p>
						</div>
						<div class="CadastroSala">
							<label>USUÁRIO</label>
							<input type="text" size="48%" class="mb-2" disabled value="<?php echo $nomeUsuario; ?>">
						</div>	
						<div class="CadastroSala">
							<label>NOME DO PERSONAGEM</label>						
							<input type="text" name="nomeJogador" id="nomeJogador" size="48%" class="mb-2" placeholder="Nome do seu usuario..." required>
						</div>
						<div class="CadastroSala">
							<label>NOME DA SALA</label>
							<input type="text" name="nomeSala" id="nomeSala" size="48%" class="mb-2" placeholder="Nome da sala..." required>
						</div>
						<div class="CadastroSala">	
							<label>SENHA DA SALA</label>						
							<input type="text" name="senhaSala" id="senhaSala" size="48%" class="mb-2" placeholder="Senha..." required>
						</div>
						<div class="CadastroSala">
							<input type="submit" value="Entrar">
						</div>			
					</form>
				</div>
			</div>
		</div>
	</div>

<?php include("footer.php"); ?>