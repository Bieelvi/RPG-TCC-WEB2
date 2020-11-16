<?php 
	session_start(); 

	include("model/ConexaoDataBase.php");
	include("lib/funcoes.php"); ?>

	<?php include("header.php"); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="view/js/funcoesJogo.js"></script>
	<script src="view/js/atrMod.js"></script>

	<div class="opcoes-layout-jogo">
		<div class="dropdown-sala-jogar">Mapa
			<div class="dropdown-sala-jogar-content SizeImg"> <?php
				$id = pegaIdMestreSala($_SESSION['infSala'][0], $_SESSION['infSala'][1]);
				$sql = $conn->prepare("SELECT * FROM imagem WHERE codigo_mestre = ?");
				$sql->bindValue(1, $id);
				if($sql->execute()){
					$img = $sql->fetchAll(PDO::FETCH_ASSOC);
					$cont = 1;		

					foreach($img as $key) {
						$diretorio = "upload/imagem/".$id."/".$key['nome_imagem']; ?>
						<div id="<?php echo $cont; ?>" onclick="imagem('<?php echo $diretorio; ?>')">
							<img src="<?php echo $diretorio ?>" width="50" height="50">
							<span> <?php echo $key['nome_imagem']; ?> </span>
						</div> <?php 
						$cont++; 
					}
				} ?>
			</div>
		</div>
		<div class="dropdown-sala-jogar-dado">Dados
			
		</div>
		<div>Jogadores</div>
		<div>Informações</div>
		<div><a href="model/sairSalaJogo.php">Sair da sala</a></div>
	</div>