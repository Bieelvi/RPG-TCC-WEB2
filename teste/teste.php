<!DOCTYPE html>
<html>
<head>
	<title>Teste - Roll and Play GENG</title>
	<?php 
		/*include("header.php");
		include("lib/funcoesChat.php");
		include("lib/funcoes.php");*/
		include("model/ConexaoDataBase.php"); ?>

		<style>
			.dropdown-content{display: none; position: absolute; background-color: #f1f1f1; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1; text-decoration: none;}
				.dropdown-content a{color: black; padding: 12px 16px; text-decoration: none; display: block; text-decoration: none;}
				.dropdown-content a:hover{background-color: #ddd;}
				.dropdown:hover .dropdown-content{display: block;}
		</style>


		<div class="dropdown">Mapa
			<div class="dropdown-content SizeImg">	
				<?php
				$idMestre = 68;
				$sql = $conn->prepare("SELECT * FROM imagem WHERE codigo_mestre = {$idMestre}");
				$sql->execute();
				$img = $sql->fetchAll(PDO::FETCH_ASSOC);
				foreach($img as $key) { 
					$diretorio = "upload/imagem/".$idMestre."/".$key['nome_imagem']; ?>
					<section>
						<img src="<?php echo $diretorio ?>" width="50" height="50">
						<span> <?php echo $key['nome_imagem']; ?> </span>
					</section>
		  <?php } ?>

			</div>
		</div>

	<?php// include("footer.php"); ?>  