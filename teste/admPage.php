<?php session_start(); ?>
<?php include("model/ConexaoDataBase.php"); ?>
<?php include("header.php"); ?>

<?php 	 
	 if(!isset($_SESSION['nomeUsuario'])){
	 	header('Location: http://localhost/teste/login.php');
	 	exit;
	 }
?>
	
	<div class="Secao">
		<?php 

			$sqlSelecao = $conn->prepare("SELECT * FROM usuario");

			$sqlSelecao->execute();

			$resultado = $sqlSelecao->fetchAll(PDO::FETCH_ASSOC);

			foreach ($resultado as $key => $value){
				echo $key.": ".$value;
				echo "<br>";
			}
		?>
	</div>

<?php include("footer.php"); ?>