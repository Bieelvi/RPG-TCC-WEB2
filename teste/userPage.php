<?php session_start(); ?>
<?php include("model/ConexaoDataBase.php"); ?>
<?php include("header.php"); ?>

<?php 

	if(!isset($_SESSION['emailUsuario'])){
		if(!isset($_SESSION['emailUsuarioAdm'])){
			header('Location: http://localhost/teste/index.php');
			exit;
		}
	}

?>

	<a href="sair.php">Sair</a>
	
	<div class="Content">
		
	</div>
<?php include("footer.php"); ?>