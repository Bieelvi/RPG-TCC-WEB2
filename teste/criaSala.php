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
	
	<form action="controller/criaSalaController.php" enctype="multipart/form-data" method="post">
		<div>	
			Online: <input type="radio" name="sala" id="sala" value="Online" checked /><br />
			Presencial: <input type="radio" name="sala" id="sala" value="Presencial" /><br />
		</div>
		<div>
			<span>Imagens</span><br>
			<input type="file" alt="Submit" name="foto" id="foto" width="48" height="48">
		</div>
		<div>
			<span>Musícas</span><br>
			<input type="file" alt="Submit" name="musica" width="48" height="48">
		</div>
		<div>
			<input type="submit" name="" value="Entrar">
		</div>
	</form>

<?php include("footer.php"); ?>