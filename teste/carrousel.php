<?php session_start(); ?>
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
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <div class="ImageFundo" style="background-image: url('image/bgIndex.jpg');">
	      		<div class="CenterTitulo">
					<span>ATRIBUTOS</span>
				</div>	
				<form name="formCadastro" id="formCadastro" action="controller/fichaController.php" method="POST">
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
	    <div class="carousel-item">
		      <div class="ImageFundo" style="background-image: url('image/bgIndex.jpg');">
		      		<div class="CenterTitulo">
						<span>Informações</span>
					</div>
					<div class="CadastroFicha">
						<span>Vida <br></span>
						<input type="number" name="vida" id="vida">
					</div>

					<div class="CadastroFicha">
						<span>Classe</span><br>
						<input type="text" name="classe" id="classe">
					</div>

					<div class="CadastroFicha">
						<span>Raça</span><br>		
						<input type="text" name="raca" id="raca">
					</div>

					<div class="CadastroFicha">
						<span>Antecedente</span><br>
						<input type="text" name="antecedente" id="antecedente" >
					</div>

					<div class="CadastroFicha">
						<span>Alinhamento</span><br>
						<input type="text" name="alinhamento" id="alinhamento">
					</div>

					<div class="CadastroFicha">
						<span>Pontos de Experiência</span><br>
						<input type="number" name="pontosExperiencia" id="pontosExperiencia">
					</div>

					<div class="CadastroFicha">
						<span>Inspiração</span><br>
						<input type="number" name="inspiracao" id="inspiracao">
					</div>

					<div class="CadastroFicha">
						<span>Bônus de Proficiência</span><br>
						<input type="number" name="bonusProficiencia" id="bonusProficiencia">
					</div>

					<div class="CadastroFicha">
						<span>Classe de Armadura</span><br>
						<input type="number" name="classeArmadura" id="classeArmadura">
					</div>

					<div class="CadastroFicha">
						<span>Iniciativa</span><br>
						<input type="number" name="iniciativa" id="iniciativa">
					</div>

					<div class="CadastroFicha">
						<span>Sabedoria Passiva</span><br>
						<input type="number" name="sabedoriaPassiva" id="sabedoriaPassiva">
					</div>	
			</div>
	    </div>
	    <div class="carousel-item">
	      	<div class="ImageFundo" style="background-image: url('image/bgIndex.jpg');">
		      		<div class="CenterTitulo">
						<span>TESTE DE RESISTÊNCIA</span>
					</div>
					<div style="margin-left: 600px;">
						<input type="submit" name="" value="Cadastrar">
					</div>
			</div>
		</form>
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Anterior</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Próximo</span>
	  </a>
	</div>

<?php include("footer.php"); ?>