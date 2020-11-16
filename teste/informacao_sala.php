<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: login.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Mídia - Roll and Play GENG</title>
<?php include("header.php"); ?>

	<?php 
		if(isset($_SESSION['vericaUpload']) AND $_SESSION['vericaUpload'][0] == 1){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['vericaUpload'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaUpload']);
		}
		if(isset($_SESSION['vericaUpload']) AND $_SESSION['vericaUpload'][0] == 0){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['vericaUpload'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaUpload']);
		} 
	?>
	
		<div class="CenterMidia">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<form name="formCadastroImagem" action="lib/adicionaMidia.php" enctype="multipart/form-data" method="post">
							<div class="CenterTitulo">
								<span>IMAGENS</span><br>
							</div>
							<input type="file" name="imagem[]" multiple>
							<input type="submit" name="addImagem" value="Adicionar">
						</form>
					</div>
					<div class="col-md-6">	
						<form name="formCadastroMusica" action="lib/adicionaMidia.php" enctype="multipart/form-data" method="post">
							<div class="CenterTitulo">
								<span>MÚSICAS</span><br>
							</div>
							<input type="file" name="musica[]" multiple>
							<input type="submit" name="addMusica" value="Adicionar">
						</form>
					</div>	
				</div>
			</div>
			<div style="padding: 5%;">
				<form action="modoJogo.php" method="post">
					<input type="submit" name="finalizarSala" value="Finalizar">
				</form>
			</div>
		</div>

<?php include("footer.php"); ?>