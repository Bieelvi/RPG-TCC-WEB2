<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
	} else {
		header('Location: http://localhost/teste/login.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $nomeUsuario; ?> - Roll and Play GENG</title>
		<?php include("header.php"); ?>
</head>
<body>
	<div class="Retorno">
		<script type="text/javascript">
			$(document).ready(function(){
				$("#formCadastro").on('submit',function(event) {
					event.preventDefault();
					var dados=$(this).serialize();
							  
					$.ajax ({
					  	url: 'controller/fichaController.php',
					    type: 'post',
					    dataType: 'html',
					    data: dados,
					    success:function(dados){
					    	$('.Retorno').show().html(dados);
					   	}
				  	})
				});
			});
		</script>
	</div>

	<style>
		.flex{
			display: flex;			
		}

		.colunas{
			width: 500px;
			padding: 20px;
			margin: 10px;
		}

		h1{
			font-weight: 1.2rem;
			text-align: center;
		}

		.titulo{
			text-align: center;
		}

		.CadastroFicha{float: left; width: 60%; margin: 10px 20% 10px 20%;}
  			.CadastroFicha span{font-family:'Josefin Sans', sans-serif;}
  			.CadastroFicha input[type='text'], input[type="number"]{float: left; width: 100%; height: 40px; border: 2px solid #41B13B; border-radius: 5px; background: #D8E2D5}
  			.CadastroFicha input[type='submit']{display: inline-block; width: 20%; height: 40px; font-size: 17px; color:#FFF; font-weight: bold; text-align: center; border:0; border-radius: 15px; cursor:pointer; background: #41B13B; font-family: 'Josefin Sans', sans-serif;}
			.CadastroFicha a{color: #41B13B; text-decoration: none;}
			.CadastroFicha a:hover{text-decoration: underline;} 
	</style>

	<div>
		<h1>FICHA</h1>
	</div>

	<section class="flex">
		<div class="colunas">
			<div class="titulo">
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
		<div class="colunas">
				<div class="titulo">
					<span>INFORMAÇÕES</span>
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

				<div class="CadastroFicha">
					<span>Deslocamento</span><br>
					<input type="number" name="deslocamento" id="deslocamento">
				</div>				
		</div>
		<div class="colunas">
				<div class="titulo">
					<span>TESTE DE RESISTÊNCIA</span>
				</div>				
		</div>
	</section>
		<div>
				<div class="CadastroFicha">
					<input type="submit" value="Calcular">
				</div>
			</form>
		</div>		

<?php include("footer.php"); ?>