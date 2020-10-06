<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if(isset($_SESSION['verificador'])){
		$verificador = $_SESSION['verificador'];
		if($verificador == 1){
			echo "<script> alert('Adicionado com sucesso!');</script>";	
			unset($_SESSION['verificador']);
			$verificador = 0;
		} else if($verificador == 2){
			echo "<script> alert('Erro ao adicionar imagem/musíca!');</script>";
			unset($_SESSION['verificador']);
			$verificador = 0;
		}
	} else
		unset($_SESSION['verificador']);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $nomeUsuario; ?> - Roll and Play GENG</title>
<?php include("header.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<form name="formCadastro" action="controller/criaSalaController.php" enctype="multipart/form-data" method="post">
					<div class="CenterTitulo">
						<span>SALA...</span><br>
					</div>
					<div>	
						Online: <input type="radio" name="sala" id="sala" value="Online" checked /><br />
						Presencial: <input type="radio" name="sala" id="sala" value="Presencial" /><br />
					</div>
					<div>
						<input type="submit" name="" value="Entrar">
					</div>
				</form>
			</div>
			<div class="col-md-4">
				<form name="formCadastroFoto" action="lib/adicionaImagem.php" enctype="multipart/form-data" method="post">
					<div class="CenterTitulo">
						<span>IMAGENS</span><br>
					</div>
					<input type="file" name="imagem[]" multiple>
					<input type="submit" name="acrescentar" value="Adicionar">
				</form>			
			</div>
			<div class="col-md-4">	
				<form name="formCadastroMusica" action="lib/adicionaMusica.php" enctype="multipart/form-data" method="post">
					<div class="CenterTitulo">
						<span>MÚSICAS</span><br>
					</div>
					<input type="file" name="musica[]" multiple>
					<input type="submit" name="adicionar" value="Adicionar">
				</form>
			</div>	
		</div>
	</div>


<?php include("footer.php"); ?>