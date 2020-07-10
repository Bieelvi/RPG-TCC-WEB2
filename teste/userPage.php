<?php session_start(); ?>
<?php include("model/ConexaoDataBase.php"); ?>
<?php include("header.php"); ?>

<?php 	 
	if(!isset($_SESSION['emailUsuario']) || !isset($_SESSION['emailUsuarioAdm'])){
		header('Location: http://localhost/teste/login.php');
		exit;
	}
?>

	<a href="sair.php">Sair</a>
	
	<div class="Content">
		
	</div>
<?php include("footer.php"); ?>