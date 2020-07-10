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

			foreach($resultado as $cadaItem){ ?>
				<tr>
					<td><?php echo $cadaItem["codigoUsuario"]; ?></td>
					<td><?php echo $cadaItem["nomeUsuario"]; ?></td>
					<td><?php echo $cadaItem["emailUsuario"]; ?></td>
					<td>
						<a href="visualiza.php"><img src="image/lupa.png" width="30" height="30"></a>
						<a href="atualiza.php"><img src="image/lapis.png" width="30" height="30"></a>
						<a href="deleta.php"><img src="image/lixeira.png" width="30" height="30"></a>
					</td>
				</tr>			

			<?php 
			} 
			?>
		</table>
	</div>
<?php include("footer.php"); ?>