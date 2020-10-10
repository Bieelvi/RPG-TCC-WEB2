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
	<?php 
		$sqlSelectPersonagem = $conn->prepare("SELECT * FROM jogador WHERE codigo_usuario = ?");
		$sqlSelectPersonagem->bindValue(1, $_SESSION['usuarios'][2]);
		if($sqlSelectPersonagem->execute()){
			if($sqlSelectPersonagem->rowCount()){
				$dadoJogador = $sqlSelectPersonagem->fetchAll(); ?>
				<h5>Personagens</h5>
				<select> <?php 
					foreach ($dadoJogador as $valor) {
						?><option><?php echo $valor['nome_jogador']; ?></option><?php
					} ?>
				</select>	<?php
			} else {

			}
		} else {

		}

		$sqlSelectMestre = $conn->prepare("SELECT * FROM mestre WHERE codigo_usuario = ?");
		$sqlSelectMestre->bindValue(1, $_SESSION['usuarios'][2]);
		if($sqlSelectMestre->execute()){
			if($sqlSelectMestre->rowCount()){
				$dadoMestre = $sqlSelectMestre->fetchAll(); ?>
				<h5>Mestres</h5>
				<select> <?php 
					foreach ($dadoMestre as $value) {
						?><option><?php echo $value['nome_mestre']; ?></option><?php
					} ?>
				</select>	<?php
			} else {

			}
		} else {

		}
	?>	
<?php include("footer.php"); ?>