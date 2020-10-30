<?php
	function criaTabelaChat($nomeSala){
		include("model/ConexaoDataBase.php");
		$sqlCria = $conn->prepare("CREATE TABLE IF NOT EXISTS chat_{$nomeSala}(
			id int primary key auto_increment,
			nome varchar(255) not null,
			mensagem text

		)");
		$sqlCria->execute();
	}

	function deletaTabelaChat($nomeSala){
		include("../model/ConexaoDataBase.php");
		$sqlDeleta = $conn->prepare("DROP TABLE chat_{$nomeSala}");
		$sqlDeleta->execute();
	}

	function insereTabelaChat($nomeSala, $mensagem, $nomeUsuario){
		include("../model/ConexaoDataBase.php");
		$sqlInsere = $conn->prepare("INSERT INTO chat_{$nomeSala} (nome, mensagem) VALUES (?, ?)");
		$sqlInsere->bindValue(1, $nomeUsuario);
		$sqlInsere->bindValue(2, $mensagem);
		$sqlInsere->execute();
	}

	function atualizaTabelaChat($nomeSala){
		include("../model/ConexaoDataBase.php");
		$sqlAtualiza = $conn->prepare("SELECT * FROM chat_{$nomeSala}");
		$sqlAtualiza->execute();

		$dado = $sqlAtualiza->fetchAll(PDO::FETCH_ASSOC);

		foreach ($dado as $key) {
			echo "<span style='font-weight: bold; color: blue;'>". $key['nome'] . ": </span>";
			echo "<span>". $key['mensagem'] . "</span><br>";
		}
	}

	function verificaTabelaChat(){
		include("../model/ConexaoDataBase.php");
		$sqlBusca = $conn->prepare("SELECT * FROM chat_{$nomeSala}");
		$sqlBusca->execute();
		if($sqlBusca->rowCount()){
			
		}
	}