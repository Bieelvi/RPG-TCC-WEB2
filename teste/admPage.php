<?php session_start(); ?>
<?php include("header.php"); ?>

<?php 
	 
	 if(isset($_SESSION['nomeUsuario'])){

	 } else {

	 	header('Location: http://localhost/teste/login.php');
	 	exit;

	 }

?>

<a href="sair.php">SAIR</a>

<?php echo $_SESSION['nomeUsuario']; ?>

<?php include("footer.php"); ?>