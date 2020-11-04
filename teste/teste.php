<!DOCTYPE html>
<html>
<head>
	<title>Teste - Roll and Play GENG</title>
	<?php include("header.php"); ?>

	<?php include("lib/funcoesChat.php");?>
	<?php include("lib/funcoes.php");?>

	<script type="text/javascript">	
		function mostra_oculta(){
		    var x = document.getElementById("atr");
		    if (x.style.display === "block") {
		        x.style.display = "none";
		    } else {
		        x.style.display = "block";
		    }

		}
	</script>

	<img onmouseenter="mostra_oculta()" onmouseout="mostra_oculta()" src="image/interrogacao.png">

	<span>Força</span><br>

	<style>
		.atributos{position: absolute; z-index: 1; margin: 20px; background: lightgray; display: none;}
	</style>

	<div id="atr" class="atributos">
		astyuiohgjkklçsadfghjkak <br>
		astyuiohgjkklçsadfghjkastjk <br>
		astyuiohgjkklçsadfghjçsadfghjk <br>

	</div>


	<?php include("footer.php"); ?>  