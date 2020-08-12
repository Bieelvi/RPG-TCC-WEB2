<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
	} else {
		header('Location: http://localhost/teste/login.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $nomeUsuario; ?> - Roll and Play GENG</title>

	<style>
		.Um{grid-area: a;}

		.Teste{background-color: red; padding: 15px; margin: 5px;}

		.grid{display: grid;} 

		.grid-template-areasUm{
			grid-template-areas: 
			"a b c d" 
			"a e f g"
		;
		}
	</style>

	<section class="grid grid-template-areasUm">
		<div class="Teste Um">1</div>
		<div class="Teste Dois">2</div>
		<div class="Teste Tres">3</div>
		<div class="Teste Quatro">4</div>
		<div class="Teste Cinco">5</div>
		<div class="Teste Seis">6</div>
		<div class="Teste Sete">7</div>
	</section>

<?php include("footer.php"); ?>