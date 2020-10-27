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

	<?php include("footer.php"); ?>