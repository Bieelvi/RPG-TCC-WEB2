<?php

	function verificaJogador($codigoJogador, $nomeSala, $senhaSala){
		include("../model/ConexaoDataBase.php");
		for ($i = 1; $i <= 4; $i++){
			$codigoFormatado =  "codigo_jogador".$i;
			$sqlVerificaOnline = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ? AND {$codigoFormatado} = ?");
			$sqlVerificaOnline->bindValue(1, $nomeSala);
			$sqlVerificaOnline->bindValue(2, $senhaSala);
			$sqlVerificaOnline->bindValue(3, $codigoJogador);
			if($sqlVerificaOnline->execute()){
				if($sqlVerificaOnline->rowCount()){
					return 1;
				} else {
					$sqlVerificaPresencial = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ? AND {$codigoFormatado} = ?");
					$sqlVerificaPresencial->bindValue(1, $nomeSala);
					$sqlVerificaPresencial->bindValue(2, $senhaSala);
					$sqlVerificaPresencial->bindValue(3, $codigoJogador);
					if($sqlVerificaPresencial->execute()){
						if($sqlVerificaPresencial->rowCount()){
							return 1;
						} 
					}
				}
			}
		}
	}

	function adicionaBanco($nomeSala, $senhaSala, $codigoJogador, $colunaJogador){
		include("../model/ConexaoDataBase.php");
		$sqlInsereSalaPresencial = $conn->prepare("UPDATE sala_presencial SET {$colunaJogador} = ? WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
		$sqlInsereSalaPresencial->bindValue(1, $codigoJogador);
		$sqlInsereSalaPresencial->bindValue(2, $nomeSala);
		$sqlInsereSalaPresencial->bindValue(3, $senhaSala);
		if($sqlInsereSalaPresencial->execute()){}

		$sqlInsereSalaOnline = $conn->prepare("UPDATE sala_online SET {$colunaJogador} = ? WHERE nome_sala_online = ? AND senha_sala_online = ?");
		$sqlInsereSalaOnline->bindValue(1, $codigoJogador);
		$sqlInsereSalaOnline->bindValue(2, $nomeSala);
		$sqlInsereSalaOnline->bindValue(3, $senhaSala);
		if($sqlInsereSalaOnline->execute()){}
	}

	function verificaJogadoresSala($nomeSala, $senhaSala, $codigoJogador){
		include("../model/ConexaoDataBase.php");
		for ($i = 1; $i <= 4; $i++){
			$codigoFormatado =  "codigo_jogador".$i;
			$sqlVerificaOnline = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ?");
			$sqlVerificaOnline->bindValue(1, $nomeSala);
			$sqlVerificaOnline->bindValue(2, $senhaSala);
			if($sqlVerificaOnline->execute()){
				if($sqlVerificaOnline->rowCount()){
					$dadoUm = $sqlVerificaOnline->fetchAll()[0];
					if($dadoUm[$codigoFormatado] == NULL){
						$retorno = verificaJogador($codigoJogador, $nomeSala, $senhaSala);
						if(!($retorno == 1)){
							adicionaBanco($nomeSala, $senhaSala, $codigoJogador, $codigoFormatado);
							return 1;
						}								
					}
				} else {
					$sqlVerificaPresencial = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
					$sqlVerificaPresencial->bindValue(1, $nomeSala);
					$sqlVerificaPresencial->bindValue(2, $senhaSala);
					if($sqlVerificaPresencial->execute()){
						if($sqlVerificaPresencial->rowCount()){
							$dadoDois = $sqlVerificaPresencial->fetchAll()[0];
							if($dadoDois[$codigoFormatado] == NULL){
								$retornoExiste = verificaJogador($codigoJogador, $nomeSala, $senhaSala);
								if(!($retornoExiste == 1)){
									adicionaBanco($nomeSala, $senhaSala, $codigoJogador, $codigoFormatado);
									return 1;
								}							
							}
						}
					} 
				}
			}
		}
	}