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
		$sqlAtualiza = $conn->prepare("SELECT * FROM chat_{$nomeSala} ORDER BY id DESC");
		$sqlAtualiza->execute();

		$dado = $sqlAtualiza->fetchAll(PDO::FETCH_ASSOC);

		foreach ($dado as $key) {
			echo "<div class='mensagem-chat'><span><small><strong>". $key['nome'] . "</strong></small><br>" . $key['mensagem'] . "</span><br></div>";
		}
	}

	function atualizaImagem(){
		include("../model/ConexaoDataBase.php");
		$sql_img = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ?");
		$sql_img->bindValue(1, $_SESSION['infSala'][0]);
		$sql_img->bindValue(2, $_SESSION['infSala'][1]);
		$sql_img->execute();
		if($sql_img->rowCount()){
			$img = $sql_img->fetchAll(PDO::FETCH_ASSOC)[0];
			echo "<img id='imagemJogo' src='" . $img['imagem_sala_online'] . "' style='width: auto; height: 100%;'>";
  		}

  		$sql_img_ = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
		$sql_img_->bindValue(1, $_SESSION['infSala'][0]);
		$sql_img_->bindValue(2, $_SESSION['infSala'][1]);
		$sql_img_->execute();
		if($sql_img_->rowCount()){
			$img = $sql_img_->fetchAll(PDO::FETCH_ASSOC)[0];
			echo "<img id='imagemJogo' src='" . $img['imagem_sala_presencial'] . "' style='width: auto; height: 100%;'>";
  		}
	}

	function atualizaMusica(){
		include("../model/ConexaoDataBase.php");
		$sql_audio = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ? AND senha_sala_online = ?");
		$sql_audio->bindValue(1, $_SESSION['infSala'][0]);
		$sql_audio->bindValue(2, $_SESSION['infSala'][1]);
		$sql_audio->execute();
		if($sql_audio->rowCount()){
			$audio = $sql_audio->fetchAll(PDO::FETCH_ASSOC)[0];
			echo "<audio controls>";
			echo "<source id='audioJogo' src='" . $audio['audio_sala_online'] . "' type='audio/mp3'>";
			echo "</audio>";
  		}

  		$sql_audio = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ? AND senha_sala_presencial = ?");
		$sql_audio->bindValue(1, $_SESSION['infSala'][0]);
		$sql_audio->bindValue(2, $_SESSION['infSala'][1]);
		$sql_audio->execute();
		if($sql_audio->rowCount()){
			$audio = $sql_audio->fetchAll(PDO::FETCH_ASSOC)[0];
			echo "<audio controls>";
			echo "<source id='audioJogo' src='" . $audio['audio_sala_presencial'] . "' type='audio/mp3'>";
			echo "</audio>";
  		}
	}

	function verificaTabelaChat(){
		include("../model/ConexaoDataBase.php");
		$sqlBusca = $conn->prepare("SELECT * FROM chat_{$nomeSala}");
		$sqlBusca->execute();
		if($sqlBusca->rowCount()){
			
		}
	}