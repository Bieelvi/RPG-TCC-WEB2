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
		<?php include("header.php"); ?>

		<title>Teste</title>
</head>
<body>
	<div style="position: absolute; width: 200px; background-color: lightblue; padding: 10px; margin: 5px;">
		<form action="controller/fichaController.php" method="POST">
			<span>Força</span><br>
			<input type="number" name="forcaPersonagem" id="forcaPersonagem" value="<?php echo $_SESSION['forcaPersonagem']; ?>"><br><br>
			<span>Modificador</span><br>
			<input type="text" value="<?php echo $_SESSION['modForcaPersonagem']; ?>" disabled><br><br>

			<span>Destreza</span><br>		
			<input type="number" name="destrezaPersonagem" id="destrezaPersonagem" value="<?php echo $_SESSION['destrezaPersonagem']; ?>"><br><br>
			<span>Modificador</span><br>
			<input type="text" value="<?php echo $_SESSION['modDestrezaPersonagem']; ?>" disabled><br><br>

			<span>Constituição</span><br>
			<input type="number" name="constituicaoPersonagem" id="constituicaoPersonagem" value="<?php echo $_SESSION['constituicaoPersonagem']; ?>"><br><br>
			<span>Modificador</span><br>
			<input type="text" value="<?php echo $_SESSION['modConstituicaoPersonagem']; ?>" disabled><br><br>

			<span>Inteligência</span><br>
			<input type="number" name="inteligenciaPersonagem" id="inteligenciaPersonagem" value="<?php echo $_SESSION['inteligenciaPersonagem']; ?>"><br><br>
			<span>Modificador</span><br>
			<input type="text" value="<?php echo $_SESSION['modInteligenciaPersonagem']; ?>" disabled><br><br>

			<span>Sabedoria</span><br>
			<input type="number" name="sabedoriaPersonagem" id="sabedoriaPersonagem" value="<?php echo $_SESSION['sabedoriaPersonagem']; ?>"><br><br>
			<span>Modificador</span><br>
			<input type="text" value="<?php echo $_SESSION['modSabedoriaPersonagem']; ?>" disabled><br><br>

			<span>Carisma</span><br>
			<input type="number" name="carismaPersonagem" id="carismaPersonagem" value="<?php echo $_SESSION['carismaPersonagem']; ?>"><br><br>
			<span>Modificador</span><br>
			<input type="text" value="<?php echo $_SESSION['modCarismaPersonagem']; ?>" disabled><br><br>

			<button type="submit">Calcular</button>
		</form>	
	</div>

<?php include("footer.php"); ?>