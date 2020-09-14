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
			
	<form action="" method="POST">
		<div style="float: left; width: 150px; margin-left: 10px;">
			<span>Jogador UM</span><br>
			<select>		
				<option>Escolha...</option>
				<?php
					$sqlSelectOption = $conn->prepare("SELECT nomeJogador FROM jogador");
					$sqlSelectOption->execute();					
					$resultado = $sqlSelectOption->fetchAll(PDO::FETCH_ASSOC);

					foreach ($resultado as $key) { ?>
						<option><?php echo $key['nomeJogador']; ?></option>
			  <?php } ?>
			</select>
		</div>
		<div style="float: left; width: 150px; margin-left: 10px;">
			<span>Jogador DOIS</span><br>
			<select>		
				<option>Escolha...</option>
				<?php
					$sqlSelectOption = $conn->prepare("SELECT nomeJogador FROM jogador");
					$sqlSelectOption->execute();					
					$resultado = $sqlSelectOption->fetchAll(PDO::FETCH_ASSOC);

					foreach ($resultado as $key) { ?>
						<option><?php echo $key['nomeJogador']; ?></option>
			  <?php } ?>
			</select>
		</div>
		<div style="float: left; width: 150px; margin-left: 10px;">
			<span>Jogador TRÊS</span><br>
			<select>		
				<option>Escolha...</option>
				<?php
					$sqlSelectOption = $conn->prepare("SELECT nomeJogador FROM jogador");
					$sqlSelectOption->execute();					
					$resultado = $sqlSelectOption->fetchAll(PDO::FETCH_ASSOC);

					foreach ($resultado as $key) { ?>
						<option><?php echo $key['nomeJogador']; ?></option>
			  <?php } ?>
			</select>
		</div>
		<div style="float: left; width: 150px; margin-left: 10px;">
			<span>Jogador QUATRO</span><br>
			<select>		
				<option>Escolha...</option>
				<?php
					$sqlSelectOption = $conn->prepare("SELECT nomeJogador FROM jogador");
					$sqlSelectOption->execute();					
					$resultado = $sqlSelectOption->fetchAll(PDO::FETCH_ASSOC);

					foreach ($resultado as $key) { ?>
						<option><?php echo $key['nomeJogador']; ?></option>
			  <?php } ?>
			</select>
		</div>
	</form>

<?php include("footer.php"); ?>