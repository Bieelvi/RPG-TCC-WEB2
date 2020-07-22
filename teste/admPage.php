<?php session_start(); ?>
<?php include("model/ConexaoDataBase.php"); ?>
<?php
	if(!$_SESSION['nivelAdm']) {
		header('Location: http://localhost/teste/index.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ADM - Roll and Play GENG</title>
		<?php include("header.php"); ?>
	
	<div class="Content">
		<table class="TabelaSelecao">
			<tr>
				<td>Codígo</td>
				<td>Usuário</td>
				<td>E-mail</td>
				<td>Ações</td>
			</tr>
		<?php 

			$sqlSelecao = $conn->prepare("SELECT * FROM usuario ORDER BY codigoUsuario DESC");
			$sqlSelecao->execute();
			$resultado = $sqlSelecao->fetchAll(PDO::FETCH_ASSOC);
			$cont = 1;

			foreach($resultado as $cadaItem){ ?>
				<tr>
					<td><?php echo $cont++; ?></td>
					<td><?php echo $cadaItem["nomeUsuario"]; ?></td>
					<td><?php echo $cadaItem["emailUsuario"]; ?></td>
					<td>
						<a href="visualiza.php"><img src="image/lupa.png" width="30" height="30"></a>
						<a href="atualiza.php"><img src="image/lapis.png" width="30" height="30"></a>
						<a class="Deletar" href="<?php echo "controller/deletaController.php?codigoUsuario={$cadaItem['codigoUsuario']}"; ?>"><img src="image/lixeira.png" width="30" height="30"></a>
					</td>
				</tr>			

		<?php 
			} 
		?>
		</table>
	</div>
<?php include("footer.php"); ?>