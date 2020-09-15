<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
	} else {
		header('Location: http://localhost/teste/login.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $nomeUsuario; ?> - Roll and Play GENG</title>
<?php include("header.php"); ?>		
	
	<form name="formCadastro" id="formCadastro" action="controller/criaSalaController.php" enctype="multipart/form-data" method="post">
		<div>	
			Online: <input type="radio" name="sala" id="sala" value="Online" checked /><br />
			Presencial: <input type="radio" name="sala" id="sala" value="Presencial" /><br />
		</div>
		<div>
			<input type="submit" name="" value="Entrar">
		</div>
	</form>

	<form name="formCadastroFoto" id="formCadastroFoto" action="lib/adicionaImagem.php" enctype="multipart/form-data" method="post">
		<span>Imagens</span><br>
		<input type="file" name="imagem[]" multiple>
		<input type="submit" name="acrescentar" value="Adicionar">
	</form>

	<form name="formCadastroMusica" id="formCadastroMusica" action="lib/adicionaMusica.php" enctype="multipart/form-data" method="post">
		<span>Musícas</span><br>
		<input type="file" name="musica[]" multiple>
		<input type="submit" name="adicionar" value="Adicionar">
	</form>

<?php include("footer.php"); ?>