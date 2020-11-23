<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: login.php');

	if(!is_array($_SESSION['infSala']))
		header('Location: modoJogo.php');

	include("lib/funcoes.php");

	$retornoJogador = pegaInfJogador($_SESSION['infSala'][2], $_SESSION['usuarios'][2]);
	$retorno = pegaInfFicha($retornoJogador['codigo_ficha'], $retornoJogador['nome_jogador']);

	$dados = array("image/diceQuatro.png", "image/diceSeis.png", "image/diceOito.png", "image/diceDex.png", "image/diceDoze.png", "image/diceVinte.png", "image/diceCem.png");
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sala - Roll and Play GENG</title>
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

		<div class="dropdown-sala-jogar">Música
			<div class="dropdown-sala-jogar-content SizeImg"> <?php
				$id = pegaIdMestreSala($_SESSION['infSala'][0], $_SESSION['infSala'][1]);
				$sql = $conn->prepare("SELECT * FROM musica WHERE codigo_mestre = ?");
				$sql->bindValue(1, $id);
				if($sql->execute()){
					$img = $sql->fetchAll(PDO::FETCH_ASSOC);
					$cont = 1;		

					foreach($img as $key) {
						$diretorio = "upload/musica/".$id."/".$key['nome_musica']; ?>
						<div id="<?php echo $cont; ?>" onclick="musica('<?php echo $diretorio; ?>')">
							<img src="image/icon_music.png" width="50" height="50">
							<span> <?php echo $key['nome_musica']; ?> </span>
						</div> <?php 
						$cont++; 
					}
				} ?>
			</div>
		</div>

		<div class="dropdown-sala-jogar-dado">Dados
			<div class="dropdown-sala-jogar-content-dado SizeImg"> 
				<div onclick="dado(1, 4, 'Dado 4')"><img src="image/diceQuatro.png"></div>	
				<div onclick="dado(1, 6, 'Dado 6')"><img src="image/diceSeis.png"></div>	
				<div onclick="dado(1, 8, 'Dado 8')"><img src="image/diceOito.png"></div>	
				<div onclick="dado(1, 10, 'Dado 10')"><img src="image/diceDex.png"></div>	
				<div onclick="dado(1, 12, 'Dado 12')"><img src="image/diceDoze.png"></div>	
				<div onclick="dado(1, 20, 'Dado 20')"><img src="image/diceVinte.png"></div>	
				<div onclick="dado(1, 100, 'Dado 100')"><img src="image/diceCem.png"></div>				
			</div>
		</div>

		<div class="dropdown-sala-jogar">Jogadores
			<div class="dropdown-sala-jogar-content SizeImg"> <?php
				$id = pegaIdMestreSala($_SESSION['infSala'][0], $_SESSION['infSala'][1]);

				for ($i = 1; $i <= 4; $i++){
					$codigoFormatado =  "codigo_jogador".$i;
					$sqlVerificaOnline = $conn->prepare("SELECT * FROM sala_online WHERE senha_sala_online = ? AND codigo_mestre = ? AND codigo_mestre = ?");
					$sqlVerificaOnline->bindValue(1, $_SESSION['infSala'][0]);
					$sqlVerificaOnline->bindValue(2, $_SESSION['infSala'][1]);
					$sqlVerificaOnline->bindValue(3, $id);
					if($sqlVerificaOnline->execute()){
						if($sqlVerificaOnline->rowCount()){
							$final = 1;
						} else {
							$sqlVerificaPresencial = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ? AND codigo_mestre = ?");
							$sqlVerificaPresencial->bindValue(1, $_SESSION['infSala'][0]);
							$sqlVerificaPresencial->bindValue(2, $_SESSION['infSala'][1]);
							$sqlVerificaPresencial->bindValue(3, $id);
							if($sqlVerificaPresencial->execute()){
								if($sqlVerificaPresencial->rowCount()){
									$final = 1;
								}	
							}						
						}
					}
				} ?>
			</div>
		</div>	

		<div>
			<a href="model/sairSalaJogo.php">Sair da sala</a>
		</div>

	</div>
	<div class="Pai" id="pai">

		<div class="jogo-layout" id='jogo-img'>
			
		</div>

		<div class="caixa-chat">
			<div class="chat">
				<div id="dados-chat">
					
				</div>
			</div>
			<div class="caixa-manda-mensagem">
				<form method="post" id="formTeste" action="lib/insereChat.php">
					<input type="text" name="mensagem" autocomplete="off">
					<input type="submit" name="enviar" value="Enviar">
					<input type="hidden" id="valorDado" name="valorDado" value="">
				</form>
			</div>	
		</div>

	</div>

	<div id="jogo-audio">
		
	</div>

	<div class="opcoes-ficha">
		<div id="btn1" data-nome="div1">Informações</div>
		<div id="btn2" data-nome="div2">Atributos</div>
		<div id="btn3" data-nome="div3">Perícias</div>
		<div id="btn4" data-nome="div4">Características</div>
	</div>

	<div id="div1" style="width: 100%; height: auto;">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="container">
						<div class="CenterTitulo">
							<span>INFORMAÇÕES</span>
						</div>
						<div class="CadastroFicha">
							<span>Nome do Personagem<br></span>
							<input class="FonteInterna" type="text" value="<?php echo $retorno['nome']; ?>" disabled>
						</div>					
						<div class="CadastroFicha">
							<span>Vida</span><br>		
							<input class="FonteInterna" type="number" id="vida" value="<?php echo $retorno['vida']; ?>">
						</div>
						<div class="CadastroFicha">
							<span>Classe</span><br>
							<input class="FonteInterna" type="text" id="classe" value="<?php echo $retorno['classe']; ?>">
						</div>
						<div class="CadastroFicha">
							<span>Raça</span><br>
							<input class="FonteInterna" type="text" id="raca" value="<?php echo $retorno['raca']; ?>">
						</div>							
						<div class="CadastroFicha">
							<span>Alinhamento</span><br>
							<input class="FonteInterna" type="text" id="alinhamento" value="<?php echo $retorno['tendencia']; ?>">
						</div>
						<div class="CadastroFicha">
							<span>Antecedente</span><br>
							<input class="FonteInterna" type="text" name="antecedente" value="<?php echo 'não'; ?>">
						</div>
						<div class="CadastroFicha">
							<span>Nível<br></span>
							<input class="FonteInterna" type="number" id="nivel" name="nivel" value="<?php echo $retorno['nivel']; ?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="container">
						<div class="CenterTitulo">
							<span>PERSONAGEM</span>
						</div>
			    		<div class="CadastroFicha">
							<span>Inspiração<br></span>
							<input class="FonteInterna" type="number" name="inspiracao" value="<?php echo $retorno['inspiracao']; ?>">
						</div>							
						<div class="CadastroFicha">
							<span>Bonús de Proficiência</span><br>		
							<input class="FonteInterna" type="number" id="bonusProficiencia" value="<?php echo $retorno['bonusProficiencia']; ?>">
						</div>
							<div class="CadastroFicha">
							<span>Classe de Armadura</span><br>
							<input class="FonteInterna" type="number" name="classeArm" value="<?php echo $retorno['classeArm']; ?>">
						</div>
							<div class="CadastroFicha">
							<span>Iniciativa</span><br>
							<input class="FonteInterna" type="number" name="iniciativa" value="<?php echo '-20'; ?>">
						</div>
						
						<div class="CadastroFicha">
							<span>Deslocamento</span><br>
							<input class="FonteInterna" type="number" id="deslocamento" value="<?php echo $retorno['desloc']; ?>">
						</div>
							<div class="CadastroFicha">
							<span>Sabedoria (Passiva)</span><br>
							<input class="FonteInterna" type="number" name="sabedoriaPassiva" value="<?php echo $retorno['sabedoriaPassiva']; ?>">
						</div>
					</div>
				</div>
			</div>
    	</div>
	</div> <!-- MOMO VC É LINDO E VAI CONSEGUIR ACABAR <3 -->
	<div id="div2" class="FichaJogar">	
		<div class="ConteudoFicha">
			<div class="CenterTitulo"><h2>ATRIBUTOS</h2></div>

			<img onmouseenter="mostra_oculta('atr1')" onmouseout="mostra_oculta('atr1')" src="image/interrogacao.png"><span>Força</span><br>
			<input class="FonteInterna" disabled type="number" id="atrForca" value="<?php echo $retorno['forca']; ?>"><br>
			<div id="atr1" class="mostraDiv">
				<span>A força é um atributo usado para as jogadas de ataque e dano corpo-à-corpo, como pré-requisito de armaduras pesadas e armas grandes e na capacidade de carga. Aplica-se na perícia Atletismo. Os talentos de D&D 5.0 que aumentam a força são: Agilidade rasteira, atleta, bem descansado, especialista em briga, maestria em armadura pesada, mestre de armas, musculoso, proteção leve, proteção moderada, proteção pesada.</span>
			</div>

			<img onmouseenter="mostra_oculta('atr2')" onmouseout="mostra_oculta('atr2')" src="image/interrogacao.png"><span>Destreza</span><br>
			<input class="FonteInterna" disabled type="number" id="atrDestreza" value="<?php echo $retorno['destreza']; ?>"><br>
			<div id="atr2" class="mostraDiv">
				<span>A destreza é um atributo usado para as jogadas de ataque e dano à distância. Aplica-se nas perícias Acrobacia, Furtividade e Prestidigitação. Os talentos de D&D 5.0 que aumentam a destreza são: Acrobata, arrombador, atleta, dedos rápidos, furtivo.</span>
			</div>

			<img onmouseenter="mostra_oculta('atr3')" onmouseout="mostra_oculta('atr3')" src="image/interrogacao.png"><span>Constituição</span><br>
			<input class="FonteInterna" disabled type="number" id="atrConstituicao" value="<?php echo $retorno['constituicao']; ?>"><br>
			<div id="atr3" class="mostraDiv">
				<span>A constituição é um atributo usado para os pontos de vida. Os talentos de D&D 5.0 que aumentam a constituição: Especialista em briga, gourmand, resistente.</span>
			</div>

			<img onmouseenter="mostra_oculta('atr4')" onmouseout="mostra_oculta('atr4')" src="image/interrogacao.png"><span>Inteligência</span><br>
			<input class="FonteInterna" disabled type="number" id="atrInteligencia" value="<?php echo $retorno['inteligencia']; ?>"><br>
			<div id="atr4" class="mostraDiv">
				<span>A inteligência é um atributo usado para as jogadas de ataque e CD (classe de dificuldade) das magias. Aplica-se nas perícias Arcanismo, História, Investigação, Natureza, Religião. Os talentos de D&D 5.0 que aumentam a inteligência são: Alquimista, arcanista, historiador, investigador,  mente afiada, naturalista, observado, poliglota, teólogo.</span>
			</div>

			<img onmouseenter="mostra_oculta('atr5')" onmouseout="mostra_oculta('atr5')" src="image/interrogacao.png"><span>Sabedoria</span><br>
			<input class="FonteInterna" disabled type="number" id="atrSabedoria" value="<?php echo $retorno['sabedoria']; ?>"><br>
			<div id="atr5" class="mostraDiv">
				<span>A sabedoria é um atributo usado para as jogadas de ataque e CD (classe de dificuldade) das magias. Aplica-se nas perícias Adestrar Animais, Intuição, Medicina, Percepção, Sobrevivência. Os talentos de D&D 5.0 que aumentam a sabedoria são: Domador de animais, Médico, observado, perceptivo, sobrevivente.</span>
			</div>

			<img onmouseenter="mostra_oculta('atr6')" onmouseout="mostra_oculta('atr6')" src="image/interrogacao.png"><span>Carisma</span><br>
			<input class="FonteInterna" disabled type="number" id="atrCarisma" value="<?php echo $retorno['carisma']; ?>"><br>
			<div id="atr6" class="mostraDiv">
				<span>O carisma é um atributo usado para as jogadas de ataque e CD (classe de dificuldade) das magias. Aplica-se nas perícias Atuação, Enganação, Intimidação, Persuasão. Os talentos que aumentam o carisma são: Ameaçador, artista, ator, diplomata, eloquente, líder inspirador, mestre do disfarce.</span>
			</div>
		</div>

		<div class="ConteudoFicha">
			<div class="CenterTitulo"><h2>MODIFICADORES</h2></div>
			<img onclick="dado(1, 20, 'Força')" src="image/dado.png" width="25" height="25"><span>Força</span><br>
			<input class="FonteInterna" disabled type="number" id="atr1" value=""><br>

			<img onclick="dado(1, 20, 'Destreza')" src="image/dado.png" width="25" height="25"><span>Destreza</span><br>
			<input class="FonteInterna" disabled type="number" id="atr2" value=""><br>

			<img onclick="dado(1, 20, 'Constituição')" src="image/dado.png" width="25" height="25"><span>Constituição</span><br>
			<input class="FonteInterna" disabled type="number" id="atr3" value=""><br>

			<img onclick="dado(1, 20, 'Inteligência')" src="image/dado.png" width="25" height="25"><span>Inteligência</span><br>
			<input class="FonteInterna" disabled type="number" id="atr4" value=""><br>

			<img onclick="dado(1, 20, 'Sabedoria')" src="image/dado.png" width="25" height="25"><span>Sabedoria</span><br>
			<input class="FonteInterna" disabled type="number" id="atr5" value=""><br>

			<img onclick="dado(1, 20, 'Carisma')" src="image/dado.png" width="25" height="25"><span>Carisma</span><br>
			<input class="FonteInterna" disabled type="number" id="atr6" value=""><br>
		</div>
	</div>
	<div id="div3" style="width: 100%; height: auto;">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="container">
						<div class="CenterTitulo">
							<span>PERÍCIAS</span>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="acrobacia" value="acrobacia">
							<label for="">Acrobacia (Des)</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="arcanismo" value="arcanismo">
							<label for="">Arcanismo (Int)</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="atletismo" value="atletismo">
							<label for="">Atletismo (For)</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="atuacao" value="atuacao">
							<label for="">Atuação (Car)</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="enganacao" value="enganacao">
							<label for="">Enganação (Car)</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="furtividade" value="furtividade">
							<label for="">Furtividade (Des)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="historia" value="historia">
							<label for="">História (Int)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="intimidacao" value="intimidacao">
							<label for="">Intimidação (Car)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="intuicao" value="intuicao">
							<label for="">Intuição (Sab)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="investigacao" value="investigacao">
							<label for="">Investigação (Int)</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="lidaComAnimais" value="lidaComAnimais">
							<label for="">Lidar com Animais (Sab)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="medicina" value="medicina">
							<label for="">Medicina (Sab)</label><br>
						</div>	
						<div class="CadastroFicha">
			 				<input type="radio" name="natureza" value="natureza">
							<label for="">Natureza (Int)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="percepcao" value="percepcao">
							<label for="">Percepção (Sab)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="persuasao" value="persuasao">
							<label for="">Persuasão (Car)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="prestidigitacao" value="prestidigitacao">
							<label for="">Prestidigitação (Des)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="religiao" value="religiao">
							<label for="">Religião (Int)</label><br>
						</div>	
						<div class="CadastroFicha">
							<input type="radio" name="sobrevivencia" value="sobrevivencia">	
							<label for="">Sobrevivência (Sab)</label><br>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="container">
						<div class="CenterTitulo">
							<span>SALVAGUARDAS</span>
						</div>
			   			<div class="CadastroFicha">
							<input type="radio" name="forca" value="forca">
							<label for="">Força</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="destreza" value="destreza">
							<label for="">Destreza</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="constituicao" value="constituicao">
							<label for="">Constituição</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="inteligencia" value="inteligencia">
							<label for="">Inteligência</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="sabedoria" value="sabedoria">
							<label for="">Sabedoria</label><br>
						</div>
						<div class="CadastroFicha">
							<input type="radio" name="carisma" value="carisma">
							<label for="">Carisma</label><br>
						</div>	
					</div>
				</div>
				<div class="col-md-4">
					<div class="container">
						<div class="CenterTitulo">
							<span>DINHEIRO</span>
						</div>
						<div>
			   				<span class="CenterTituloFicha">Ouro</span><br>
			   				<input type="number" name="ouro">
			   				<span class="CenterTituloFicha">Prata</span><br>
			  				<input type="number" name="prata">
			   				<span class="CenterTituloFicha">Platina</span><br>
			   				<input type="number" name="platina">
			 				<span class="CenterTituloFicha">Total</span><br>
			   				<input type="number" name="" disabled>
			   			</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="div4" style="width: 100%; height: auto;">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="container">
						<div style="margin-top: 30px;">
		    				<span class="CenterTituloFicha">EQUIPAMENTOS</span><br>
		    				<textarea rows="10" cols="40" name="equipamento"></textarea>
		    			</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="container">
						<div style="margin-top: 30px;">
		    				<span class="CenterTituloFicha">CACTERISTÍCAS & TALENTOS</span><br>
		    				<textarea rows="10" cols="40" name="ataqueConjuracao"></textarea>
		    			</div>
		    			<div style="margin-top: 90px;">
		    				<div class="CadastroFicha">
								<input type="submit" value="Cria Ficha">
							</div>	
		    			</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="container">
		    			<div style="margin-top: 30px;">
		    				<span class="CenterTituloFicha">HISTÓRIA</span><br>
		    				<textarea rows="10" cols="40" name="historiaPersonagem"></textarea>
		    			</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
		if(isset($_SESSION['vericaUpload']) AND $_SESSION['vericaUpload'][0] == 1){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['vericaUpload'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaUpload']);
		}
		if(isset($_SESSION['vericaUpload']) AND $_SESSION['vericaUpload'][0] == 0){ ?>
			<div class="RetornoTeste">
				<?php echo $_SESSION['vericaUpload'][1]; ?>
			</div> <?php
				unset($_SESSION['vericaUpload']);
		} 
	?>

	<div class="CenterMidia">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form name="formCadastroImagem" action="lib/atualizaMidia.php" enctype="multipart/form-data" method="post">
						<div class="CenterTitulo">
							<span>IMAGENS</span><br>
						</div>
						<input type="file" name="imagem[]" multiple>
						<input type="submit" name="addImagem" value="Adicionar">
					</form>
				</div>
				<div class="col-md-6">	
					<form name="formCadastroMusica" action="lib/atualizaMidia.php" enctype="multipart/form-data" method="post">
						<div class="CenterTitulo">
							<span>MÚSICAS</span><br>
						</div>
						<input type="file" name="musica[]" multiple>
						<input type="submit" name="addMusica" value="Adicionar">
					</form>
				</div>	
			</div>
		</div>
	</div>

	<?php include("footer.php"); ?>