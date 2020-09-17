<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Roll and Play GENG</title>
	<?php include("header.php"); ?>

	<div class="ImageFundo JogarIndex" style="background-image: url('image/bgIndex.jpg');">
		<div class="CenterTituloIndex">
			<h1>Roll and Play GENG</h1>
			<a href="modoJogo.php"><button>Jogar</button></a>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="container">
					<div class="CenterImg">					
						<img src="image/dado.png" width="50" height="50">						
					</div>
					<div>
						<a href="modoJogo.php">
							<h3 class="CenterTitulo">Jogue com seus amigos</h3>
						</a>
					</div>
					<div>
						<hr>
					</div>
					<div>
						<span>O jogo consiste em auxiliar os jogadores de RPG a jogadorem Online ou Presencial. Para saber como jogar o jogo, bastar acessar o link abaixo</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="container">
					<div class="ImgIndex">					
						<img src="image/fotoTematica.jpg" width="100%" height="300">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="container">
					<div class="CenterImg">					
						<img src="image/dado.png" width="50" height="50">						
					</div>
					<div>
						<a href="comoJogar.php">
							<h3 class="CenterTitulo">Como Jogar</h3>
						</a>
					</div>
					<div>
						<hr>
					</div>
					<div>
						<span>O Roll and Play GENG é um projeto desenvolvido por um grupo de amigos que juntos fazem um curso Técnico de Informática.</span>
						<span>O projeto é resultado de trabalho de conclusão de curso.</span>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="container">
					<div class="CenterImg">					
						<img src="image/nuvemDownload.png" width="" height="50">						
					</div>
					<div>
						<a href="download.php">
							<h3 class="CenterTitulo">Baixe Agora</h3>
						</a>
					</div>
					<div>
						<hr>
					</div>
					<div>
						<span>Jogue RPG com seus amigos o Roll and Play GENG. Baixe o aplicativo mobile ou programa desktop.</span>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="container">
					<div class="CenterImg">					
						<img src="image/varinha.png" width="50" height="50">						
					</div>
					<div>
						<a href="rpg.php">
							<h3 class="CenterTitulo">O que é RPG?</h3>
						</a>
					</div>
					<div>
						<hr>
					</div>
					<div>
						<span>RPG é um tipo de jogo em que os jogadores assumen papeís de personagens e criam narrativas colaborativamente. Os jogadores podem improvisar livremente.</span>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include("footer.php"); ?>