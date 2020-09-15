<!DOCTYPE html>
<html>
<head>
	<title>Testando</title>
</head>
<body>
	<style>
		.GridContainer{
			display: grid;
			grid-gap: 5px;
			background-color: #2196F3;
			padding: 5px;
			margin: 50px;
			grid-template-areas: 
			'um um um um um um um'
			'dois tres tres quatro quatro cinco cinco'
			'dois tres tres quatro quatro cinco cinco'
			'dois tres tres quatro quatro cinco cinco'
			'dois tres tres quatro quatro cinco cinco'
			'dois tres tres quatro quatro cinco cinco'
			'dois tres tres quatro quatro cinco cinco'
			'dois tres tres quatro quatro cinco cinco'
			'dois tres tres quatro quatro cinco cinco';
		}

		.Item1{grid-area: um; height: 50px;}
		.Item2{grid-area: dois; width: 100%;}
		.Item3{grid-area: tres; width: 100%;}
		.Item4{grid-area: quatro; width: 100%;}
		.Item5{grid-area: cinco; width: 100%;}

		.GridContainer > div {
		  background-color: rgba(255, 255, 255, 0.8);
		  text-align: center;
		}
	</style>

	<div class="GridContainer">
		<div class="Item1">1</div>
		<div class="Item2">
			<div>
				FORÇA <br>
				<input type="number" name="" height="50px" width="50px">
			</div>
			<div>
				DESTREZA <br>
				<input type="number" name="">
			</div>
			<div>
				CONSTITUIÇÃO <br>
				<input type="number" name="">
			</div>
			<div>
				INTELIGÊNCIA <br>
				<input type="number" name="">
			</div>
			<div>
				SABEDORIA <br>
				<input type="number" name="">
			</div>
			<div>
				CARISMA <br>
				<input type="number" name="">
			</div>
		</div>
		<div class="Item3">3</div>
		<div class="Item4">4</div>
		<div class="Item5">5</div>
	</div>
</body>
</html>