<?php 
	session_start();	

    include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios'])) {
		$hierarquia = $_SESSION['usuarios'][1];
		if($hierarquia != 1)
			header('Location: index.php');
	} else
		header('Location: login.php');
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ADM - Roll and Play GENG</title>
		<?php include("header.php"); ?>
	<?php 
		if(isset($_SESSION['vericaDelete']) AND $_SESSION['vericaDelete'][0] == 1){ ?>
			<div class="RetornoTeste">
				<script type='text/JavaScript'>
					setTimeout(function () {
						window.location.href = 'admPage.php'; 
					}, 2000); 
				</script>
				<?php echo $_SESSION['vericaDelete'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaDelete']);
		}
		if(isset($_SESSION['vericaDelete']) AND $_SESSION['vericaDelete'][0] == 0){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['vericaDelete'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaDelete']);
		} 
	?>
	
	<div style="width: 100%; margin-bottom: 50px; margin-top: 50px;">
		<table class="TabelaSelecao">
			<tr>
				<td>Codigo</td>
				<td>Usuário</td>
				<td>E-mail</td>
				<td>Ações</td>
			</tr>
		<?php 

			$sqlSelecao = $conn->prepare("SELECT * FROM usuario ORDER BY codigo_usuario DESC");
			$sqlSelecao->execute();
			$resultado = $sqlSelecao->fetchAll(PDO::FETCH_ASSOC);
			
			$cont = 1;

			foreach($resultado as $cadaItem){ ?>
				<tr>
					<td><?php echo $cont++; ?></td>
					<td><?php echo $cadaItem["nome_usuario"]; ?></td>
					<td><?php echo $cadaItem["email_usuario"]; ?></td>
					<td>
						<a href="visualiza.php"><img src="image/lupa.png" width="30" height="30"></a>
						<a href="atualiza.php"><img src="image/lapis.png" width="30" height="30"></a>
						<a class="Deletar" href="<?php echo "controller/deletaController.php?codigoUsuario={$cadaItem['codigo_usuario']}"; ?>"><img src="image/lixeira.png" width="30" height="30"></a>
					</td>
				</tr>
	<?php 	}	?>
		</table>
	</div>
<?php include("footer.php"); ?>