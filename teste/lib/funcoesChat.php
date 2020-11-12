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
		if($sqlInsere->execute())
			return 1;
		else 
			return 2;
	}

	function atualizaTabelaChat($nomeSala){
		include("../model/ConexaoDataBase.php");
		$sqlAtualiza = $conn->prepare("SELECT * FROM chat_{$nomeSala}");
		$sqlAtualiza->execute();

		$dado = $sqlAtualiza->fetchAll(PDO::FETCH_ASSOC);

		foreach ($dado as $key) {
			echo "<div class='mensagem-chat'><span><small><strong>". $key['nome'] . "</strong></small><br>" . $key['mensagem'] . "</span><br></div>";
		}
	}

	function atualizaImagem(){
		include("../model/ConexaoDataBase.php");
		$sql_img = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ?");
		$sql_img->bindValue(1, "DungeonAndDragon");
		$sql_img->bindValue(2, "123");
		$sql_img->execute();

		if($sql_img->rowCount()){
			$img = $sql_img->fetchAll(PDO::FETCH_ASSOC)[0];
			echo "<img id='imagemJogo' src='" . $img['imagem_sala_online'] . "' style='width: auto; height: 100%;'>";
  		}
	}

	function verificaTabelaChat(){
		include("../model/ConexaoDataBase.php");
		$sqlBusca = $conn->prepare("SELECT * FROM chat_{$nomeSala}");
		$sqlBusca->execute();
		if($sqlBusca->rowCount()){
			
		}
	}