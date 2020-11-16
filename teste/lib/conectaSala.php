<?php
	session_start();

	include("../model/ConexaoDataBase.php");

	include("funcoes.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: ../login.php');

	if(isset($_POST['nomeSalaCriada']) && isset($_POST['senhaSalaCriada'])){
		if(isset($_POST['personagem']) && $_POST['personagem'] != "Escolha"){
			/* funcao que pega a array com os codigos dos personagens do usuario logado */
			$idJogador = pegaIdArrayPersonagem($_SESSION['usuarios'][2]);

			/* função que pega um array com os codigos dos mestres do usuario logado */	
			$arrayIdMestre = pegaIdArrayMestre($_SESSION['usuarios'][2]);

			/* funcao que pega o codigo do personagem que ele vai jogar */
			$reCodPerso = pegaIdPersonagem($_SESSION['usuarios'][2], $_POST['personagem']);
			
			if($idJogador == -20){
				$mensagem = "Erro!";
				$_SESSION['vericaSalas'] = array(0, $mensagem);
			} else {
				/* funcao que verifica se o personagem escolhido esta na sala que ele esta tentando entrar */
				if(verificaJogador($reCodPerso['codigo_jogador'], $_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'])){
					$mensagem = "Conectando na sala {$_POST['nomeSalaCriada']} como personagem {$_POST['personagem']}!";
					$_SESSION['vericaSalas'] = array(1, $mensagem);
				} else {
					if(verificaPersonagemMestre($_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'], $arrayIdMestre) == 1){
						$mensagem = "Impossível conectar na sala {$_POST['nomeSalaCriada']} como jogador, pois há um mestre, seu, participando da partida.";
						$_SESSION['vericaSalas'] = array(0, $mensagem);
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
			}
		} else if(isset($_POST['mestre']) && $_POST['mestre'] != "Escolha"){
			/* funcao que pega o codigo do mestre que ele vai jogar */
			$reCodMestre = pegaIdMestre($_SESSION['usuarios'][2], $_POST['mestre']);

			if(verificaMestre($reCodMestre['codigo_mestre'], $_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'])){
				$mensagem = "Conectando na sala {$_POST['nomeSalaCriada']} como mestre {$_POST['mestre']}!";
				$_SESSION['vericaSalas'] = array(1, $mensagem);
			} else {
				$mensagem = "Erro! {$_POST['mestre']} não está na sala!";
				$_SESSION['vericaSalas'] = array(0, $mensagem);
			}
				
		} else {
			$mensagem = "Erro! Selecione algum Mestre ou Personagem";
			$_SESSION['vericaSalas'] = array(0, $mensagem);
		}

		/* session inicialmente usada no modoJogo para pegar o nome da sala criada e criar uma tabela no banco de dados 
		e tbm usada para fazer a verificacao se o usuario esta realmente logado para pode entrar na salaJogar */
		$_SESSION['infSala'] = array($_POST['nomeSalaCriada'], $_POST['senhaSalaCriada'], $_POST['personagem']);	
	} 
	header('Location: ../modoJogo.php');