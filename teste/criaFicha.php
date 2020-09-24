<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
	} else {
		header('Location: http://localhost/teste/login.php');
	}
?>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!DOCTYPE html>
<html>
	<head>
		<title>Teste - Roll and Play GENG</title>
		<?php include("header.php"); ?>
</head>
<body>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="500000" data-pause="hover">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
			<form name="formCadastro" id="formCadastro" action="controller/fichaController.php" method="POST">
			<div style="margin-bottom: -200px;" class="TextareaEstilizado">
	    		<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="container">
								<div class="CenterTitulo">
									<span>INFORMAÇÕES</span>
								</div>
								<div class="CadastroFicha">
									<span>Nome do Jogador<br></span>
									<input type="number" name="forcaPersonagem" id="forcaPersonagem">
								</div>
								
								<div class="CadastroFicha">
									<span>Vida</span><br>		
									<input type="number" name="destrezaPersonagem" id="destrezaPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Classe</span><br>
									<input type="number" name="constituicaoPersonagem" id="constituicaoPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Raça</span><br>
									<input type="number" name="inteligenciaPersonagem" id="inteligenciaPersonagem">
								</div>
								
								<div class="CadastroFicha">
									<span>Alinhamento</span><br>
									<input type="number" name="sabedoriaPersonagem" id="sabedoriaPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Antecedente</span><br>
									<input type="number" name="carismaPersonagem" id="carismaPersonagem">
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
									<input type="number" name="forcaPersonagem" id="forcaPersonagem">
								</div>
								
								<div class="CadastroFicha">
									<span>Bonús de Proficiência</span><br>		
									<input type="number" name="destrezaPersonagem" id="destrezaPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Classe de Armadura</span><br>
									<input type="number" name="constituicaoPersonagem" id="constituicaoPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Iniciativa</span><br>
									<input type="number" name="inteligenciaPersonagem" id="inteligenciaPersonagem">
								</div>
								
								<div class="CadastroFicha">
									<span>Deslocamento</span><br>
									<input type="number" name="sabedoriaPersonagem" id="sabedoriaPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Sabedoria (Passiva)</span><br>
									<input type="number" name="carismaPersonagem" id="carismaPersonagem">
								</div>
							</div>
						</div>
					</div>
				</div>
	    	</div>
			<div class="ImageFundoFicha" style="background-image: url('image/bgAnao.jpg');"></div>
	    </div>
	    <div class="carousel-item">
	    	<div style="margin-bottom: -200px;">
	    		<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="container">
								<div class="CenterTitulo">
									<span>ATRIBUTOS</span>
								</div>
					    		<div class="CadastroFicha">
									<span>Força <br></span>
									<input type="number" name="forcaPersonagem" id="forcaPersonagem">
								</div>
								
								<div class="CadastroFicha">
									<span>Destreza</span><br>		
									<input type="number" name="destrezaPersonagem" id="destrezaPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Constituição</span><br>
									<input type="number" name="constituicaoPersonagem" id="constituicaoPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Inteligência</span><br>
									<input type="number" name="inteligenciaPersonagem" id="inteligenciaPersonagem">
								</div>
								
								<div class="CadastroFicha">
									<span>Sabedoria</span><br>
									<input type="number" name="sabedoriaPersonagem" id="sabedoriaPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Carisma</span><br>
									<input type="number" name="carismaPersonagem" id="carismaPersonagem">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="container">
								<div class="CenterTitulo">
									<span>MODIFICADOR</span>
								</div>
				    			<div class="CadastroFicha">
									<span>Inspiração<br></span>
									<input type="number" name="forcaPersonagem" id="forcaPersonagem">
								</div>
								
								<div class="CadastroFicha">
									<span>Bonús de Proficiência</span><br>		
									<input type="number" name="destrezaPersonagem" id="destrezaPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Classe de Armadura</span><br>
									<input type="number" name="constituicaoPersonagem" id="constituicaoPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Iniciativa</span><br>
									<input type="number" name="inteligenciaPersonagem" id="inteligenciaPersonagem">
								</div>
								
								<div class="CadastroFicha">
									<span>Deslocamento</span><br>
									<input type="number" name="sabedoriaPersonagem" id="sabedoriaPersonagem">
								</div>

								<div class="CadastroFicha">
									<span>Sabedoria (Passiva)</span><br>
									<input type="number" name="carismaPersonagem" id="carismaPersonagem">
								</div>
							</div>
						</div>
					</div>
				</div>
	    		
	    	</div>
		    <div class="ImageFundoFicha" style="background-image: url('image/bgElfo2.jpg');">
		  	</div>
	    </div>
	    <div class="carousel-item">
	    	<div style="margin-bottom:-50px;">
	    		<div class="CenterTitulo">
					<span>PERÍCIAS</span>
				</div>
				<div class="SelectEstilizado" style="display: flex; justify-content: space-between; margin: 0 400px 0 400px;">
					<div>
						<select>
							<option>Perícia 1</option>
							<option>Acrobacia (Des)</option>
							<option>Arcanismo (Int)</option>
							<option>Atletismo (For)</option>
							<option>Atuação (Car)</option>
							<option>Enganação (Car)</option>
							<option>Furtividade (Des)</option>
							<option>História (Int)</option>
							<option>Intimidação (Car)</option>
							<option>Intuição (Sab)</option>
							<option>Investigação (Int)</option>
							<option>Lidar com Animais</option>
							<option>Medicina (Sab)</option>
							<option>Natureza (Int)</option>
							<option>Percepção (Sab)</option>
							<option>Persuasão (Car)</option>
							<option>Prestidigitação (Des)</option>
							<option>Religião (Int)</option>
							<option>Sobrevivência (Sab)</option>
						</select>
					</div>
					<div>
						<select>
							<option>Perícia 2</option>
							<option>Acrobacia (Des)</option>
							<option>Arcanismo (Int)</option>
							<option>Atletismo (For)</option>
							<option>Atuação (Car)</option>
							<option>Enganação (Car)</option>
							<option>Furtividade (Des)</option>
							<option>História (Int)</option>
							<option>Intimidação (Car)</option>
							<option>Intuição (Sab)</option>
							<option>Investigação (Int)</option>
							<option>Lidar com Animais</option>
							<option>Medicina (Sab)</option>
							<option>Natureza (Int)</option>
							<option>Percepção (Sab)</option>
							<option>Persuasão (Car)</option>
							<option>Prestidigitação (Des)</option>
							<option>Religião (Int)</option>
							<option>Sobrevivência (Sab)</option>
						</select>
					</div>
					<div>
						<select>
							<option>Perícia 3</option>
							<option>Acrobacia (Des)</option>
							<option>Arcanismo (Int)</option>
							<option>Atletismo (For)</option>
							<option>Atuação (Car)</option>
							<option>Enganação (Car)</option>
							<option>Furtividade (Des)</option>
							<option>História (Int)</option>
							<option>Intimidação (Car)</option>
							<option>Intuição (Sab)</option>
							<option>Investigação (Int)</option>
							<option>Lidar com Animais</option>
							<option>Medicina (Sab)</option>
							<option>Natureza (Int)</option>
							<option>Percepção (Sab)</option>
							<option>Persuasão (Car)</option>
							<option>Prestidigitação (Des)</option>
							<option>Religião (Int)</option>
							<option>Sobrevivência (Sab)</option>
						</select>
					</div>
					<div>
						<select>
							<option>Perícia 4</option>
							<option>Acrobacia (Des)</option>
							<option>Arcanismo (Int)</option>
							<option>Atletismo (For)</option>
							<option>Atuação (Car)</option>
							<option>Enganação (Car)</option>
							<option>Furtividade (Des)</option>
							<option>História (Int)</option>
							<option>Intimidação (Car)</option>
							<option>Intuição (Sab)</option>
							<option>Investigação (Int)</option>
							<option>Lidar com Animais</option>
							<option>Medicina (Sab)</option>
							<option>Natureza (Int)</option>
							<option>Percepção (Sab)</option>
							<option>Persuasão (Car)</option>
							<option>Prestidigitação (Des)</option>
							<option>Religião (Int)</option>
							<option>Sobrevivência (Sab)</option>
						</select>
					</div>
					<div>
						<select>
							<option>Perícia 5</option>
							<option>Acrobacia (Des)</option>
							<option>Arcanismo (Int)</option>
							<option>Atletismo (For)</option>
							<option>Atuação (Car)</option>
							<option>Enganação (Car)</option>
							<option>Furtividade (Des)</option>
							<option>História (Int)</option>
							<option>Intimidação (Car)</option>
							<option>Intuição (Sab)</option>
							<option>Investigação (Int)</option>
							<option>Lidar com Animais</option>
							<option>Medicina (Sab)</option>
							<option>Natureza (Int)</option>
							<option>Percepção (Sab)</option>
							<option>Persuasão (Car)</option>
							<option>Prestidigitação (Des)</option>
							<option>Religião (Int)</option>
							<option>Sobrevivência (Sab)</option>
						</select>
					</div>
					<div>
						<select>
							<option>Perícia 6</option>
							<option>Acrobacia (Des)</option>
							<option>Arcanismo (Int)</option>
							<option>Atletismo (For)</option>
							<option>Atuação (Car)</option>
							<option>Enganação (Car)</option>
							<option>Furtividade (Des)</option>
							<option>História (Int)</option>
							<option>Intimidação (Car)</option>
							<option>Intuição (Sab)</option>
							<option>Investigação (Int)</option>
							<option>Lidar com Animais</option>
							<option>Medicina (Sab)</option>
							<option>Natureza (Int)</option>
							<option>Percepção (Sab)</option>
							<option>Persuasão (Car)</option>
							<option>Prestidigitação (Des)</option>
							<option>Religião (Int)</option>
							<option>Sobrevivência (Sab)</option>
						</select>
					</div>
				</div>
	    		<div class="CenterTitulo" style="margin-top: 100px;">
					<span>SALVAGUARDAS</span>
				</div>
				<div class="SelectEstilizado" style="display: flex; justify-content: space-between; margin: 0 750px 0 750px;">
					<div>
						<select>
							<option>Salvaguarda 1</option>
							<option>Força</option>
							<option>Destreza</option>
							<option>Constituição</option>
							<option>Inteligência</option>
							<option>Sabedoria</option>
							<option>Carisma</option>
						</select>
					</div>
					<div>
						<select>
							<option>Salvaguarda 2</option>
							<option>Força</option>
							<option>Destreza</option>
							<option>Constituição</option>
							<option>Inteligência</option>
							<option>Sabedoria</option>
							<option>Carisma</option>
						</select>
					</div>
				</div>
	    	</div>
		    <div class="ImageFundoFicha" style="background-image: url('image/bgGnomo.jpg');"></div>
	    </div>
	    <div class="carousel-item">
	    	<div style="margin-bottom: -200px;" class="TextareaEstilizado">
	    		<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="container">
								<div style="margin-top: 30px;">
				    				<span class="CenterTituloFicha">TRAÇOS DE PERSONALIDADE</span><br>
				    				<textarea rows="10" cols="40"></textarea>
				    			</div>
				    			<div style="margin-top: 30px;">
				    				<span class="CenterTituloFicha">IDEAIS</span><br>
				    				<textarea rows="10" cols="40"></textarea>
				    			</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="container">
								<div style="margin-top: 30px;">
				    				<span class="CenterTituloFicha">VÍNCULOS</span><br>
				    				<textarea rows="10" cols="40"></textarea>
				    			</div>    			
				    			<div style="margin-top: 30px;">
				    				<span class="CenterTituloFicha">FRAQUEZAS</span><br>
				    				<textarea rows="10" cols="40"></textarea>
				    			</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="container">
				    			<div style="margin-top: 30px;">
				    				<span class="CenterTituloFicha">CACTERISTÍCAS & TALENTOS</span><br>
				    				<textarea rows="10" cols="40"></textarea>
				    			</div>   			
				    			<div style="margin-top: 30px;">
				    				<span class="CenterTituloFicha">OUTROS & IDIOMAS</span><br>
				    				<textarea rows="10" cols="40"></textarea>
				    			</div>
							</div>
						</div>
					</div>
				</div>
	    	</div>
		    <div class="ImageFundoFicha" style="background-image: url('image/bgOrc.png');"></div>
	    </div>
	    <div class="carousel-item">
	    	<div style="margin-bottom: -100px;" class="TextareaEstilizado">
	    		<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="container">
								<div style="margin-top: 30px;">
				    				<span class="CenterTituloFicha">EQUIPAMENTOS</span><br>
				    				<textarea rows="10" cols="40"></textarea>
				    			</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="container">
								<div style="margin-top: 30px;">
				    				<span class="CenterTituloFicha">DINHEIRO</span><br>
				    				<textarea rows="10" cols="40"></textarea>
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
				    				<span class="CenterTituloFicha">ATAQUES & CONJURAÇÕES</span><br>
				    				<textarea rows="10" cols="40"></textarea>
				    			</div>
							</div>
						</div>
					</div>
				</div>
	    	</div>
	    	<div class="ImageFundoFicha" style="background-image: url('image/bgHalfiling.jpg');"></div>
				</form>
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span style="background-color: #41B13B; padding: 5px; border-radius: 8px;" class="" aria-hidden="true"></span>
	    <span class="sr-only">Anterior</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span style="background-color: #41B13B; padding: 5px; border-radius: 8px;" class="" aria-hidden="true"></span>
	    <span class="sr-only">Próximo</span>
	  </a>
	</div>

<?php include("footer.php"); ?>