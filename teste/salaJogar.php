<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if(!is_array($_SESSION['infSala']))
		header('Location: http://localhost/teste/modoJogo.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teste - Roll and Play GENG</title>
	<?php include("header.php"); ?>

	<?php include("lib/funcoes.php");?>

	<?php 
		$retornoJogador = pegaInfJogador($_SESSION['nomePersonagem'], $_SESSION['usuarios'][2]);

		$retorno = pegaInfFicha($retornoJogador['codigo_ficha'], $retornoJogador['nome_jogador']);
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#formTeste").on('submit',function(event) {
				event.preventDefault();
				var dados=$(this).serialize();
						  
				$.ajax ({
				  	url: 'lib/insereChat.php',
				    type: 'post',
				    dataType: 'html',
				    data: dados,
				    success:function(dados){
				    	document.querySelector("[name='mensagem']").value = "";
				   	}
			  	})
			});
		});
	</script>

	<script language="javascript">
		window.setInterval("refreshDiv()", 500);
		function refreshDiv(){
			$.get("lib/atualizaMensagem.php", function(resultado){
		     	$("#dados-chat").html(resultado);
			})		
		}
	</script>

	<script type="text/javascript">
		function mostrar(){
			for(var i = 1; i < 5; i++){
				document.getElementById("div"+i).hidden = true;
			}

			var obj = event.target.dataset.nome;
			document.getElementById(obj).hidden = false;
		}

		function inicia(){
			for(var i = 1; i < 5; i++){
				document.getElementById("div"+i).hidden = true;
			}

			document.getElementById("btn1").addEventListener("click", mostrar);
			document.getElementById("btn2").addEventListener("click", mostrar);
			document.getElementById("btn3").addEventListener("click", mostrar);
			document.getElementById("btn4").addEventListener("click", mostrar);
		}

		window.addEventListener("load", inicia);
	</script>

	<div>
		<a href="model/sairSalaJogo.php">Sair</a>
	</div>

	<div class="Pai">
		<div class="jogo-layout">
			
		</div>

		<div class="caixa-chat">
			<div class="chat">
				<div id="dados-chat">
					
				</div>
			</div>
			<form method="post" id="formTeste" action="testeController.php">
				<input type="text" name="mensagem" autocomplete="off">
				<input type="submit" name="enviar" value="Enviar">
			</form>
		</div>	

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
							<input class="FonteInterna" type="number" name="vida" value="<?php echo $retorno['vida']; ?>">
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
								<input type="hidden" name="bonusProficiencia">
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
								<input type="hidden" name="deslocamento">
							</div>
								<div class="CadastroFicha">
								<span>Sabedoria (Passiva)</span><br>
								<input class="FonteInterna" type="number" name="sabedoriaPassiva" value="<?php echo $retorno['sabedoriaPassiva']; ?>">
								<input type="hidden" name="sabPassiva">
							</div>
						</div>
					</div>
				</div>
			</div>
    	</div>
	</div>
	<div id="div2" style="width: 100%; height: auto;">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="container">
						<div class="CenterTitulo">
							<span>ATRIBUTOS</span>
						</div>
			    		<div class="CadastroFicha">
							<span>Força <br></span>
							<input class="FonteInterna" type="number" name="forca" id="atrForca" value="<?php echo $retorno['forca']; ?>">
						</div>		
						<div class="CadastroFicha">
							<span>Destreza</span><br>		
							<input class="FonteInterna" type="number" name="destreza" id="atrDestreza" value="<?php echo $retorno['destreza']; ?>">
						</div>
						<div class="CadastroFicha">
							<span>Constituição</span><br>
							<input class="FonteInterna" type="number" name="constituicao" id="atrConstituicao" value="<?php echo $retorno['constituicao']; ?>">
						</div>
							<div class="CadastroFicha">
							<span>Inteligência</span><br>
							<input class="FonteInterna" type="number" name="inteligencia" id="atrInteligencia" value="<?php echo $retorno['inteligencia']; ?>">
						</div>
						
						<div class="CadastroFicha">
							<span>Sabedoria</span><br>
							<input class="FonteInterna" type="number" name="sabedoria" id="atrSabedoria" value="<?php echo $retorno['sabedoria']; ?>">
						</div>
							<div class="CadastroFicha">
							<span>Carisma</span><br>
							<input class="FonteInterna" type="number" name="carisma" id="atrCarisma" value="<?php echo $retorno['carisma']; ?>">
						</div>
						</div>
				</div>
				<div class="col-md-6">
					<div class="container">
						<div class="CenterTitulo">
							<span>MODIFICADOR</span>
						</div>
		    			<div class="CadastroFicha">
							<span>Força<br></span>
							<input class="FonteInterna" disabled type="number" id="modForca" value="">
						</div>						
						<div class="CadastroFicha">
							<span>Destreza</span><br>		
							<input class="FonteInterna" disabled type="number" id="modDestreza" value="">
						</div>
						<div class="CadastroFicha">
							<span>Constituição</span><br>
							<input class="FonteInterna" disabled type="number" id="modConstituicao" value="">
						</div>
						<div class="CadastroFicha">
							<span>Inteligência</span><br>
							<input class="FonteInterna" disabled type="number" id="modInteligencia" value="">
						</div>							
						<div class="CadastroFicha">
							<span>Sabedoria</span><br>
							<input class="FonteInterna" disabled type="number" id="modSabedoria" value="">
						</div>
							<div class="CadastroFicha">
							<span>Carisma</span><br>
							<input class="FonteInterna" disabled type="number" id="modCarisma" value="">
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

	<?php include("footer.php"); ?>