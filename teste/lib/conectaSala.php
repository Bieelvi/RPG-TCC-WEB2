<?php
	session_start();

	include("../model/ConexaoDataBase.php");

	include("funcoes.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if(isset($_POST['nomeSalaCriada']) && isset($_POST['senhaSalaCriada']) && isset($_POST['personagem'])){
		/* funcao que pega a array com os codigos dos personagens do usuario logado */
		$idJogador = pegaIdArrayPersonagem($_SESSION['usuarios'][2]);
		/* funcao que pega o codigo do personagem que ele vai jogar */
		$reCodPerso = pegaIdPersonagem($_SESSION['usuarios'][2], $_POST['personagem']);
		
		if($idJogador == -20){
			$mensagem = "Erro!";
			$_SESSION['vericaSalas'] = array(0, $mensagem);
		} else {
			/* funcao que verifica se o personagem escolhido esta na sala que ele esta tentando entrar */
			if(verificaJogador($reCodPerso['codigo_jogador'], $_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'])){
				$mensagem = "Conectando na sala {$_POST['nomeSalaCriada']}!";
				$_SESSION['vericaSalas'] = array(1, $mensagem);
				echo "Entrou pq ja tava na sala";
			} else {
				$retornoVaiOuNao = verificaJogadoresSala($_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'], $idJogador, $reCodPerso['codigo_jogador']);
				if($retornoVaiOuNao == 0){
					$mensagem = "Iniciando uma partida nova na sala {$_POST['nomeSalaCriada']}!";
					$_SESSION['vericaSalas'] = array(1, $mensagem);
				} elseif($retornoVaiOuNao == 1) {
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