<!DOCTYPE html>
<html>
<head>
	<title>Teste - Roll and Play GENG</title>
	<?php include("header.php"); ?>

	<?php include("lib/funcoesChat.php");?>
	<?php include("lib/funcoes.php");?>

	<?php

	$codigoUsuario = 19;
	$nomePersonagem = "Caralhinhos";
	$nomeSala = "DungeonAndDragon";
	$senhaSala = "123";

	$retorno = pegaIdArrayPersonagem($codigoUsuario);

	$reCodigoPersonagem = pegaIdPersonagem($codigoUsuario, $nomePersonagem);

	if($retorno == -20)
		echo $retorno;
	else {
		if(verificaJogador($reCodigoPersonagem['codigo_jogador'], $nomeSala, $senhaSala))
			echo "Entrou";
		else
			verificaJogadoresSala($nomeSala, $senhaSala, $retorno, $reCodigoPersonagem['codigo_jogador']);
	}

	?>

	<?php include("footer.php"); ?>  