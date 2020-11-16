<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: login.php');

	$_SESSION['pericias'] = array("Acrobacia (Des)", "Arcanismo (Int)", "Atletismo (For)", "Atuação (Car)", "Enganação (Car)", "Furtividade (Des)", "História (Int)", "Intimidação (Car)", "Intuição (Sab)", "Investigação (Int)", "Lidar com Animais (Sab)", "Medicina (Sab)", "Natureza (Int)", "Percepção (Sab)", "Persuasão (Car)", "Prestidigitação (Des)", "Religião (Int)", "Sobrevivência (Sab)");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teste - Roll and Play GENG</title>
	<?php include("header.php"); ?>
</head>
<body>
	<script src="view/js/funcoesJogo.js"></script>
	<script src="view/js/atrMod.js"></script>
	<script src="view/js/bonus.js"></script>

	<div class="opcoes-ficha">
		<div id="btn1" data-nome="div1">Informações</div>
		<div id="btn2" data-nome="div2">Atributos</div>
		<div id="btn3" data-nome="div3">Perícias</div>
		<div id="btn4" data-nome="div4">Características</div>
	</div>

	<form name="formCadastro" id="formCadastro" action="controller/fichaController.php" method="POST">

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
							<input class="FonteInterna" type="text" value="<?php echo $_SESSION['nomePersonagem']; ?>" disabled>
						</div>			
						<div class="CadastroFicha">
							<span>Vida</span><br>		
							<input class="FonteInterna" type="number" name="vida">
						</div>
						<div class="CadastroFicha">
							<span>Classe</span><br>
							<select class="FonteInterna" onblur="pegaClasse()" id="classe">
								<option>Escolha</option> <?php 
									$sqlClasse = $conn->prepare("SELECT nomeClasse FROM classe");
									$sqlClasse->execute();
									$dado = $sqlClasse->fetchAll();
									foreach ($dado as $valor) { ?>
										<option> <?php echo $valor['nomeClasse']; ?> </option> <?php 
									} ?>
							</select>
							<input type="hidden" name="chooseClasse" value="">	
						</div>
						<div class="CadastroFicha">
							<span>Raça</span><br>
							<select class="FonteInterna" onblur="pegaRaca()" id="raca">
								<option>Escolha</option> <?php 
								$sqlRaca = $conn->prepare("SELECT nomeRaca, deslocamentoPersonagemRaca FROM raca");
								$sqlRaca->execute();
								$dado = $sqlRaca->fetchAll();
								$_SESSION['racaBancoDados'] = array($dado['nomeRaca'], $dado['deslocamentoPersonagemRaca']);
								foreach ($dado as $valor) { ?>
									<option> <?php echo $valor['nomeRaca']; ?> </option> <?php 
								} ?>
							</select>
							<input type="hidden" name="chooseRaca" value="">
						</div>				
						<div class="CadastroFicha">
							<span>Alinhamento</span><br>
							<select class="FonteInterna" onblur="pegaAlinhamento()" id="alinhamento">
								<option>Escolha</option>
								<option>Lawful Good</option>
								<option>Neutral Good</option>
								<option>Chaotic Good</option>
								<option>Lawful Neutral</option>
								<option>Neutral</option>
								<option>Lawful Evil</option>
								<option>Neutral Evil</option>
								<option>Chaotic Evil</option>
							</select>
							<input type="hidden" name="chooseAlinhamento" value="">
						</div>
						<div class="CadastroFicha">
							<span>Antecedente</span><br>
							<input class="FonteInterna" type="text" name="antecedente">
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
							<input class="FonteInterna" type="number" name="inspiracao">
						</div>								
						<div class="CadastroFicha">
							<span>Bonús de Proficiência</span><br>		
							<input class="FonteInterna" type="number" id="bonusProficiencia" value="" disabled>
							<input type="hidden" name="bonusProficiencia">
						</div>
						<div class="CadastroFicha">
							<span>Classe de Armadura</span><br>
							<input class="FonteInterna" type="number" name="classeArm">
						</div>
						<div class="CadastroFicha">
							<span>Iniciativa</span><br>
							<input class="FonteInterna" type="number" name="iniciativa">
						</div>								
						<div class="CadastroFicha">
							<span>Deslocamento</span><br>
							<input class="FonteInterna" type="number" id="deslocamento" value="" disabled>
							<input type="hidden" name="deslocamento">
						</div>
						<div class="CadastroFicha">
							<span>Nível<br></span>
							<input class="FonteInterna" onblur="calculaProficiencia()" type="number" id="nivel" name="nivel">
						</div>
					</div>
				</div>
			</div>
    	</div>
	</div> <!-- MOMO VC É LINDO E VAI CONSEGUIR ACABAR <3 -->
	<div id="div2">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="container">
						<div class="CenterTitulo">
							<h2>ATRIBUTOS</h2>
						</div>
						<div class="CadastroFicha">
							<span>Força <br></span>
							<input class="FonteInterna" onblur="calculaAtr('atrForca', 'modForca')" type="number" name="forca" id="atrForca" required>
						</div>								
						<div class="CadastroFicha">
							<span>Destreza</span><br>		
							<input class="FonteInterna" onblur="calculaAtr('atrDestreza', 'modDestreza')" type="number" name="destreza" id="atrDestreza" required>
						</div>
						<div class="CadastroFicha">
							<span>Constituição</span><br>
							<input class="FonteInterna" onblur="calculaAtr('atrConstituicao', 'modConstituicao')" type="number" name="constituicao" id="atrConstituicao" required>
						</div>
						<div class="CadastroFicha">
							<span>Inteligência</span><br>
							<input class="FonteInterna" onblur="calculaAtr('atrInteligencia', 'modInteligencia')" type="number" name="inteligencia" id="atrInteligencia" required>
						</div>								
						<div class="CadastroFicha">
							<span>Sabedoria</span><br>
							<input class="FonteInterna" onblur="calculaAtr('atrSabedoria', 'modSabedoria')" type="number" name="sabedoria" id="atrSabedoria" required>
						</div>
						<div class="CadastroFicha">
							<span>Carisma</span><br>
							<input class="FonteInterna" onblur="calculaAtr('atrCarisma', 'modCarisma')" type="number" name="carisma" id="atrCarisma" required>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="container">
						<div class="CenterTitulo">
							<h2>MODIFICADORES</h2>
						</div>
						<div class="CadastroFicha">
							<span>Força<br></span>
							<input class="FonteInterna" disabled type="number" id="modForca" value="">
						</div>								
						<div class="CadastroFicha">
							<span>Destreza</span><br>		
							<input class="FonteInterna" disabled type="number" id="modDestreza">
						</div>
						<div class="CadastroFicha">
							<span>Constituição</span><br>
							<input class="FonteInterna" disabled type="number" id="modConstituicao">
						</div>
						<div class="CadastroFicha">
							<span>Inteligência</span><br>
							<input class="FonteInterna" disabled type="number" id="modInteligencia">
						</div>								
						<div class="CadastroFicha">
							<span>Sabedoria</span><br>
							<input class="FonteInterna" disabled type="number" id="modSabedoria">
						</div>
						<div class="CadastroFicha">
							<span>Carisma</span><br>
							<input class="FonteInterna" disabled type="number" id="modCarisma">
						</div>
					</div>
				</div>
			</div>
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
	</form>
<?php include("footer.php"); ?>