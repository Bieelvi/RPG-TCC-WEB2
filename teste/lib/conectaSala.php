<?php
	session_start();

	include("../model/ConexaoDataBase.php");

	include("funcoes.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if(isset($_POST['nomeSalaCriada']) && isset($_POST['senhaSalaCriada']) && isset($_POST['personagem'])){
		$idJogador = pegaIdArrayPersonagem($_SESSION['usuarios'][2]);
		$reCodPerso = pegaIdPersonagem($_SESSION['usuarios'][2], $$_POST['personagem']);
		if($idJogador == -20){
			$mensagem = "Erro!";
			$_SESSION['vericaSalas'] = array(0, $mensagem);
		} else {
			if(verificaJogador($reCodPerso['codigo_jogador'], $_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'])){
				$mensagem = "Conectando na sala {$_POST['nomeSalaCriada']}!";
				$_SESSION['vericaSalas'] = array(1, $mensagem);
			} else {
				if(verificaJogadoresSala($_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'], $idJogador, $reCodPerso['codigo_jogador'])){
					$mensagem = "Iniciando uma partida nova na sala {$_POST['nomeSalaCriada']}!";
					$_SESSION['vericaSalas'] = array(1, $mensagem);
				} else {
					$mensagem = "Você já está participando da sala {$_POST['nomeSalaCriada']} com outro personagem!";
					$_SESSION['vericaSalas'] = array(0, $mensagem);
				}
			}
		}


		
	} else {
		
	}
	/* session inicialmente usada no modoJogo para pegar o nome da sala criada e criar uma tabela no banco de dados 
	e tbm usada para fazer a verificacao se o usuario esta realmente logado para pode entrar na salaJogar */
	$_SESSION['infSala'] = array($_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'], $_POST['personagem']);
	header('Location: http://localhost/teste/modoJogo.php');