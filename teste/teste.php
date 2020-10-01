<?php 
	session_start();
	$_SESSION['pericias'] = array("Acrobacia (Des)", "Arcanismo (Int)", "Atletismo (For)", "Atuação (Car)", "Enganação (Car)", "Furtividade (Des)", "História (Int)", "Intimidação (Car)", "Intuição (Sab)", "Investigação (Int)", "Lidar com Animais (Sab)", "Medicina (Sab)", "Natureza (Int)", "Percepção (Sab)", "Persuasão (Car)", "Prestidigitação (Des)", "Religião (Int)", "Sobrevivência (Sab)");
	$_SESSION['nomesPericias'] = array("acrobacia", "arcanismo", "atletismo", "atuacao", "enganacao", "furtividade", "historia", "intimidacao", "intuicao", "investigacao", "lidaComAnimais", "medicina", "natureza", "percepcao", "persuasao", "prestidigitacao", "religiao", "sobrevivencia");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="testeController.php" method="post">
		<input type="radio" name="acrobacia" value="acrobacia">
		<label for="">Acrobacia (Des)</label><br>

		<input type="radio" name="arcanismo" value="arcanismo">
		<label for="">Arcanismo (Int)</label><br>

		<input type="radio" name="atletismo" value="atletismo">
		<label for="">Atletismo (For)</label><br>

		<input type="radio" name="atuacao" value="atuacao">
		<label for="">Atuação (Car)</label><br>

		<input type="radio" name="enganacao" value="enganacao">
		<label for="">Enganação (Car)</label><br>

		<input type="radio" name="furtividade" value="furtividade">
		<label for="">Furtividade (Des)</label><br>

		<input type="radio" name="historia" value="historia">
		<label for="">História (Int)</label><br>

		<input type="radio" name="intimidacao" value="intimidacao">
		<label for="">Intimidação (Car)</label><br>

		<input type="radio" name="intuicao" value="intuicao">
		<label for="">Intuição (Sab)</label><br>

		<input type="radio" name="investigacao" value="investigacao">
		<label for="">Investigação (Int)</label><br>

		<input type="radio" name="lidaComAnimais" value="lidaComAnimais">
		<label for="">Lidar com Animais (Sab)</label><br>

		<input type="radio" name="medicina" value="medicina">
		<label for="">Medicina (Sab)</label><br>

		<input type="radio" name="natureza" value="natureza">
		<label for="">Natureza (Int)</label><br>

		<input type="radio" name="percepcao" value="percepcao">
		<label for="">Percepção (Sab)</label><br>

		<input type="radio" name="persuasao" value="persuasao">
		<label for="">Persuasão (Car)</label><br>

		<input type="radio" name="prestidigitacao" value="prestidigitacao">
		<label for="">Prestidigitação (Des)</label><br>

		<input type="radio" name="religiao" value="religiao">
		<label for="">Religião (Int)</label><br>

		<input type="radio" name="sobrevivencia" value="sobrevivencia">	
		<label for="">Sobrevivência (Sab)</label><br>

		<input type="submit" name="" value="Testar">
	</form>
</body>
</html>