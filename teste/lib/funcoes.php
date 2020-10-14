<?php

	function verificaJogador($codigoJogador, $nomeSala, $senhaSala){
		include("model/ConexaoDataBase.php");
		for ($i = 1; $i <= 4; $i++){
			$codigoFormatado =  "codigo_jogador".$i;
			$sqlVerificaOnline = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ? AND {$codigoFormatado} = ?");
			$sqlVerificaOnline->bindValue(1, $nomeSala);
			$sqlVerificaOnline->bindValue(2, $senhaSala);
			$sqlVerificaOnline->bindValue(3, $codigoJogador);
			if($sqlVerificaOnline->execute()){
				if($sqlVerificaOnline->rowCount())
					return 1;
				else {
					$sqlVerificaPresencial = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ? AND {$codigoFormatado} = ?");
					$sqlVerificaPresencial->bindValue(1, $nomeSala);
					$sqlVerificaPresencial->bindValue(2, $senhaSala);
					$sqlVerificaPresencial->bindValue(3, $codigoJogador);
					if($sqlVerificaPresencial->execute()){
						if($sqlVerificaPresencial->rowCount())
							return 1;
						else 
							return 0;
					} 
				}
			}
		}
	}

	function verificaJogadoresSala($nomeSala, $senhaSala){
		include("model/ConexaoDataBase.php");
		for ($i = 1; $i <= 4; $i++){
			$codigoFormatado =  "codigo_jogador".$i;
			$sqlVerificaOnline = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ?");
			$sqlVerificaOnline->bindValue(1, $nomeSala);
			$sqlVerificaOnline->bindValue(2, $senhaSala);
			if($sqlVerificaOnline->execute()){
				if($sqlVerificaOnline->rowCount()){
					$dado = $sqlVerificaOnline->fetchAll()[0];
					if ($dado[$codigoFormatado] == NULL){
						echo "Nao tem ngm no: ".$codigoFormatado." Sala Disponivel!<br>";
					} else echo "Tem gente na vaga: ".$codigoFormatado."<br>";
				} else {
					$sqlVerificaPresencial = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
					$sqlVerificaPresencial->bindValue(1, $nomeSala);
					$sqlVerificaPresencial->bindValue(2, $senhaSala);
					if($sqlVerificaPresencial->execute()){
						if($sqlVerificaPresencial->rowCount()){
							$dadoDois = $sqlVerificaPresencial->fetchAll()[0];
							if ($dadoDois[$codigoFormatado] == NULL){
								echo "Nao tem ngm no: ".$codigoFormatado." Sala Disponivel!<br>";
							} else echo "Tem gente na vaga: ".$codigoFormatado."<br>";
						}
						else 
							return 0;
					} 
				}
			}
		}
	}