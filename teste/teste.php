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

	<style>
		.dropdown{padding-right: 10px; position: relative; display: inline-block; text-decoration: none;}

		.dropdown-content{display: none; position: absolute; background-color: #f1f1f1; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1; text-decoration: none;}
			.dropdown-content a{color: black; padding: 12px 16px; text-decoration: none; display: block; text-decoration: none;}
			.dropdown-content a:hover{background-color: #ddd;}
			.dropdown:hover .dropdown-content{display: flex;}
	</style>

	<div class="dropdown">
		<span>Dados</span>
	    <div class="dropdown-content">
			<div>D4</div><div>D6</div><div>D8</div><div>D10</div><div>D12</div><div>D20</div>
		</div>	
	</div>	


	<?php include("footer.php"); ?>  