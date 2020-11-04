<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	include("lib/funcoesChat.php");

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

	<?php 
		if(isset($_SESSION['personagmCriado']) AND $_SESSION['personagmCriado'][0] == 1){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['personagmCriado'][1]; ?>
			</div> <?php
				unset($_SESSION['personagmCriado']);
		}
		if(isset($_SESSION['personagmCriado']) AND $_SESSION['personagmCriado'][0] == 0){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['personagmCriado'][1]; ?>
			</div> <?php
				unset($_SESSION['personagmCriado']);
		} 
	?>

	<?php 
		if(isset($_SESSION['vericaSalas']) AND $_SESSION['vericaSalas'][0] == 1){ ?>
			<div class="RetornoTeste">
				<script type='text/JavaScript'>
					setTimeout(function () {
						window.location.href = 'salaJogar.php'; 
					}, 2000); 
				</script>
				<?php
					echo $_SESSION['vericaSalas'][1]; 
					criaTabelaChat($_SESSION['infSala'][0]);
				?>
			</div> <?php
				unset($_SESSION['vericaSalas']);
		}
		if(isset($_SESSION['vericaSalas']) AND $_SESSION['vericaSalas'][0] == 0){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['vericaSalas'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaSalas']);
		} 
	?>

	<?php 
		if(isset($_SESSION['vericaPersonagem']) AND $_SESSION['vericaPersonagem'][0] == 1){ ?>
			<div class="RetornoTeste">
				<script type='text/JavaScript'>
					setTimeout(function () {
						window.location.href = 'criaFicha.php'; 
					}, 2000); 
				</script>
				<?php echo $_SESSION['vericaPersonagem'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaPersonagem']);
		}
		if(isset($_SESSION['vericaPersonagem']) AND $_SESSION['vericaPersonagem'][0] == 0){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['vericaPersonagem'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaPersonagem']);
		} 
	?>

	<?php 
		if(isset($_SESSION['vericaSala']) AND $_SESSION['vericaSala'][0] == 1){ ?>
			<div class="RetornoTeste">
				<script type='text/JavaScript'>
					setTimeout(function () {
						window.location.href = 'criaSala.php'; 
					}, 2000); 
				</script>
				<?php echo $_SESSION['vericaSala'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaSala']);
		}
		if(isset($_SESSION['vericaSala']) AND $_SESSION['vericaSala'][0] == 0){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['vericaSala'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaSala']);
		} 
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="container">
					<form action="lib/conectaSala.php" method="POST">
						<div class="CadastroSala">	
							<p class="Titulo">ENTRAR NUMA SALA</p>
						</div>
						<div class="CadastroSala">
							<label>USUÁRIO</label>
							<input type="text" size="48%" class="mb-2" disabled value="<?php echo $nomeUsuario; ?>">
						</div>	
						<div class="CadastroSala">
							<label>PERSONAGEM</label><br>
							<select name="personagem">
								<option>Escolha</option> <?php 
									$sqlPegaPersonagem = $conn->prepare("SELECT * FROM jogador WHERE codigo_usuario = ?");
									$sqlPegaPersonagem->bindValue(1, $_SESSION['usuarios'][2]);
									$sqlPegaPersonagem->execute();
									$dado = $sqlPegaPersonagem->fetchAll(PDO::FETCH_ASSOC);
									foreach ($dado as $valor) { ?>
										<option><?php echo $valor['nome_jogador']; ?></option>
							  <?php } ?>
							</select>
						</div>
						<div class="CadastroSala">
							<label>SALA</label>
							<input type="text" name="nomeSalaCriada" size="48%" class="mb-2" placeholder="Nome da sala..." required>
						</div>	
						<div class="CadastroSala">
							<label>SENHA</label>						
							<input type="password" name="senhaSalaCriada" size="48%" class="mb-2" placeholder="Senha da sala..." required>
						</div>
						<div class="CadastroSala">
							<input type="submit" value="Entrar">
						</div>			
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<div class="container">
					<form action="lib/criaSala.php" method="POST">
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
							<input type="password" name="senhaSala" id="senhaSala" size="48%" placeholder="Senha da sala..." required>
						</div>
						<div class="CadastroSala">	
							Online: <input type="radio" name="sala" value="Online" checked/><br>
							Presencial: <input type="radio" name="sala" value="Presencial"/>
						</div>	
						<div class="CadastroSala">
							<input type="submit" value="Criar">
						</div>		
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<div class="container">
					<form action="lib/criaJogador.php" method="POST">
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