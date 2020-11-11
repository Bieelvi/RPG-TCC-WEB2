<?php
	function teste($nomeSala, $senhaSala){
		include("model/ConexaoDataBase.php");
		for ($i = 1; $i <= 4; $i++){
			$codigoFormatado =  "codigo_jogador".$i;
			
			$sql = $conn->prepare("SELECT nome_jogador FROM jogador INNER JOIN sala_presencial ON sala_presencial.{$codigoFormatado} = jogador.codigo_jogador WHERE senha_sala_presencial = ? AND nome_sala_presencial = ?");
			$sql->bindValue(1, $senhaSala);
			$sql->bindValue(2, $nomeSala);
			$sql->execute();

			$teste = $sql->fetchAll(PDO::FETCH_ASSOC);

			print_r($teste);
			echo "<br>";

		}
	}

	/* funcao que pega um array os codigos dos personagens de certo usuario e compara se existe algum numa sala em que ele já estava presente */
	function verificaPersonagemSala($arrayIdPersonagem, $nomeSala, $senhaSala){
		include("../model/ConexaoDataBase.php");
		for ($i = 1; $i <= 4; $i++){
			$codigoFormatado =  "codigo_jogador".$i;
			$final = 0;
			$sqlOnline = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ?");
			$sqlOnline->bindValue(1, $nomeSala);
			$sqlOnline->bindValue(2, $senhaSala);
			if($sqlOnline->execute()){
				if($sqlOnline->rowCount()){
					$dados = $sqlOnline->fetchAll();
					foreach ($dados as $r) {
						foreach ($arrayIdPersonagem as $k) {
							if($r[$codigoFormatado] == $k){
								return 1;
							}
						}
					}
				}	
			}				
			
			$sqlPresencial = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
			$sqlPresencial->bindValue(1, $nomeSala);
			$sqlPresencial->bindValue(2, $senhaSala);
			if($sqlPresencial->execute()){
				if($sqlPresencial->rowCount()){
					$dadosDois = $sqlPresencial->fetchAll();
					foreach ($dadosDois as $r) {
						foreach ($arrayIdPersonagem as $k) {
							if($r[$codigoFormatado] == $k){
								return 1;
							}
						}
					}
				} 
			}
		}
		return $final;
	}

	function verificaJogador($codigoPersonagem, $nomeSala, $senhaSala){
		include("../model/ConexaoDataBase.php");
		$final = 0;
		for ($i = 1; $i <= 4; $i++){
			$codigoFormatado =  "codigo_jogador".$i;
			$sqlVerificaOnline = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ? AND {$codigoFormatado} = ?");
			$sqlVerificaOnline->bindValue(1, $nomeSala);
			$sqlVerificaOnline->bindValue(2, $senhaSala);
			$sqlVerificaOnline->bindValue(3, $codigoPersonagem);
			if($sqlVerificaOnline->execute()){
				if($sqlVerificaOnline->rowCount()){
					$final = 1;
				} else {
					$sqlVerificaPresencial = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ? AND {$codigoFormatado} = ?");
					$sqlVerificaPresencial->bindValue(1, $nomeSala);
					$sqlVerificaPresencial->bindValue(2, $senhaSala);
					$sqlVerificaPresencial->bindValue(3, $codigoPersonagem);
					if($sqlVerificaPresencial->execute()){
						if($sqlVerificaPresencial->rowCount())
							$final = 1;
					}
				}
			}
		}

		return $final;
	}

	function adicionaBanco($nomeSala, $senhaSala, $codigoPersonagem, $colunaJogador){
		include("../model/ConexaoDataBase.php");
		$sqlInsereSalaPresencial = $conn->prepare("UPDATE sala_presencial SET {$colunaJogador} = ? WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
		$sqlInsereSalaPresencial->bindValue(1, $codigoPersonagem);
		$sqlInsereSalaPresencial->bindValue(2, $nomeSala);
		$sqlInsereSalaPresencial->bindValue(3, $senhaSala);
		if($sqlInsereSalaPresencial->execute()){}

		$sqlInsereSalaOnline = $conn->prepare("UPDATE sala_online SET {$colunaJogador} = ? WHERE nome_sala_online = ? AND senha_sala_online = ?");
		$sqlInsereSalaOnline->bindValue(1, $codigoPersonagem);
		$sqlInsereSalaOnline->bindValue(2, $nomeSala);
		$sqlInsereSalaOnline->bindValue(3, $senhaSala);
		if($sqlInsereSalaOnline->execute()){}
	}

	function verificaJogadoresSala($nomeSala, $senhaSala, $arrayIdPersonagem, $codigoPersonagem){
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
						if(verificaPersonagemSala($arrayIdPersonagem, $nomeSala, $senhaSala) == 1){
							$r = 1;
						} else {
							adicionaBanco($nomeSala, $senhaSala, $codigoPersonagem, $codigoFormatado);
							return 0;
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
								if(verificaPersonagemSala($arrayIdPersonagem, $nomeSala, $senhaSala)){
									$r = 1;
								} else {
									adicionaBanco($nomeSala, $senhaSala, $codigoPersonagem, $codigoFormatado);
									return 0;
									
								}				
							}
						}
					} 
				}
			}
		}
		return $r;
	}

	/* função que pega os personagens existentes do usuario e lista pra mim */
	function pegaIdArrayPersonagem($codigoUsuario){
		include("../model/ConexaoDataBase.php");
		$sql = $conn->prepare("SELECT codigo_jogador FROM jogador WHERE codigo_usuario = ?");
		$sql->bindValue(1, $codigoUsuario);
		$sql->execute();
		if($sql->rowCount()){
			$dado = $sql->fetchAll(PDO::FETCH_ASSOC);
			foreach ($dado as $key) {
				$array[] = $key['codigo_jogador'];
			}
		} else {
			$array[] = -20;		
		}

		return $array;
	}

	function pegaIdPersonagem($codigoUsuario, $nomePersonagem){
		include("../model/ConexaoDataBase.php");
		$sqlId = $conn->prepare("SELECT * FROM jogador WHERE codigo_usuario = ? AND nome_jogador = ?");
		$sqlId->bindValue(1, $codigoUsuario);
		$sqlId->bindValue(2, $nomePersonagem);
		$sqlId->execute();
			if($sqlId->rowCount()){
				$dado = $sqlId->fetchAll()[0];
				return $dado;
			} else 
				return $r = -30;	
	}

	function pegaInfFicha($codigoFicha, $nomePersonagem){
		include("model/ConexaoDataBase.php");
		$sqlSelect = $conn->prepare("SELECT * FROM ficha WHERE codigo_ficha = ? AND nome = ?");
		$sqlSelect->bindValue(1, $codigoFicha);
		$sqlSelect->bindValue(2, $nomePersonagem);
		$sqlSelect->execute();
		if($sqlSelect->rowCount()){
			$dadosFicha = $sqlSelect->fetchAll(PDO::FETCH_ASSOC)[0];
			return $dadosFicha;
		} else 
			return "Erro";
	}

	function pegaInfJogador($nomePersonagem, $codigoUsuario){
		include("model/ConexaoDataBase.php");
		$sqlSelect = $conn->prepare("SELECT * FROM jogador WHERE nome_jogador = ? AND codigo_usuario = ?");
		$sqlSelect->bindValue(1, $nomePersonagem);
		$sqlSelect->bindValue(2, $codigoUsuario);
		$sqlSelect->execute();
		if($sqlSelect->rowCount()){
			$dadosJogador = $sqlSelect->fetchAll(PDO::FETCH_ASSOC)[0];
			return $dadosJogador;
		}
	}