<?php
	
	$sqlSelecao = $conn->prepare("SELECT * FROM usuario WHERE codigoUsuario = ?");

	$sqlSelecao->bindValue(1, 79);

	$sqlSelecao->execute();

	$resultado = $sqlSelecao->fetch();

	print_r($resultado);

 ?>