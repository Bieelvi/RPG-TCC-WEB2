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
						<div class="CadastroFormularioSala">	
							<p class="Titulo">MESTRE</p>
						</div>	
						<div class="CadastroFormularioSala">
							<label>USUÁRIO</label>
							<input type="text" name="UsuarioSala" id="UsuarioSala" size="48%" class="mb-2" disabled value="<?php echo $nomeUsuario; ?>">
						</div>
						<div class="CadastroFormularioSala">
							<label>NOME DA SALA</label>
							<input type="text" name="nomeSala" id="nomeSala" size="48%" class="mb-2" placeholder="Crie o nome da sala..." required="">
						</div>
						<div class="CadastroFormularioSala">
							<label>SENHA DA SALA</label>
							<input type="text" name="senhaSala" id="senhaSala" size="48%" placeholder="Copie o código e mande para seus jogadores...">
						</div>
						<div class="CadastroFormularioSala">
							<label>JOGADORES</label>
							<input type="text" name="QuantidadeJogadores" id="QuantidadeJogadores" size="48%" class="mb-2" placeholder="Digite a quantidade de jogadores...">
						</div>						
						<!-- <div class="CadastroFormularioSala">
							<fieldset required>
								<input type="radio" name="presOnPres" id="presOnPres">
								<label>PRESENCIAL</label>
								<input type="radio" name="presOnPres" id="presOnPres">
								<label>ONLINE</label>	
							</fieldset>
						</div>
						<div class="CadastroFormularioSala">	
							<label>CARREGAR MAPA</label>
							<input type="file" name="mapaAntigo" id="mapaAntigo" class="mb-2">
						</div> -->					
						<div class="CadastroFormularioSala">
							<input type="submit" value="Criar">
						</div>			
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="container">
					<form action="" method="POST">
						<div class="CadastroFormularioSala">	
							<p class="Titulo">JOGADOR</p>
						</div>
						<div class="CadastroFormularioSala">
							<label>USUÁRIO</label>
							<input type="text" size="48%" class="mb-2" disabled value="<?php echo $nomeUsuario; ?>">
						</div>	
						<div class="CadastroFormularioSala">
							<label>NOME DO JOGADOR</label>						
							<input type="text" name="nomeJogador" id="nomeJogador" size="48%" class="mb-2" placeholder="Digite o nome do seu usuario..." required>
						</div>
						<div class="CadastroFormularioSala">
							<label>NOME DA SALA</label>
							<input type="text" name="nomeSala" id="nomeSala" size="48%" class="mb-2" placeholder="Digite o nome da sala..." required>
						</div>
						<div class="CadastroFormularioSala">	
							<label>SENHA DA SALA</label>						
							<input type="text" name="senhaSala" id="senhaSala" size="48%" class="mb-2" placeholder="Digite aqui a senha da sala..." required>
						</div>
						<div class="CadastroFormularioSala">
							<input type="submit" value="Entrar">
						</div>			
					</form>
				</div>
			</div>
		</div>
	</div>

<?php include("footer.php"); ?>