<?php 
	session_start(); 

	include('../model/Ficha.php');
	include('../model/ConexaoDataBase.php');

	if(empty($_POST['forcaPersonagem']) || empty($_POST['destrezaPersonagem']) || 
	   	empty($_POST['constituicaoPersonagem']) || empty($_POST['inteligenciaPersonagem']) || 
	   	empty($_POST['sabedoriaPersonagem']) || empty($_POST['carismaPersonagem'])){

		echo "Por favor preencha todos os campos!";
	} else {

		$codigoUsuario = $_SESSION['usuarios'][2];

		$sqlSelecao = $conn->prepare("SELECT * FROM ficha WHERE codigoUsuario = ?");
		$sqlSelecao->bindValue(1, $codigoUsuario);
		$sqlSelecao->execute();

		if($sqlSelecao->rowCount() >= 5)
			echo "Nao pode add mais de CINCO fichas!";
		else {
			$forcaPersonagem = $_POST['forcaPersonagem'];
			$destrezaPersonagem = $_POST['destrezaPersonagem'];
			$constituicaoPersonagem = $_POST['constituicaoPersonagem'];
			$inteligenciaPersonagem = $_POST['inteligenciaPersonagem'];
			$sabedoriaPersonagem = $_POST['sabedoriaPersonagem'];
			$carismaPersonagem = $_POST['carismaPersonagem'];
			$nomePersonagem = $_SESSION['infSalaUsuario'][1];
			$nomeJogador = $_SESSION['usuarios'][0];

			$vida = $_POST['vida'];
			$classe = $_POST['classe'];
			$raca = $_POST['raca'];
			$alinhamento = $_POST['alinhamento'];
			$inspiracao = $_POST['inspiracao'];
			$bonusProficiencia = $_POST['bonusProficiencia'];
			$classeArmadura = $_POST['classeArmadura'];
			$iniciativa = $_POST['iniciativa'];
			$deslocamento = $_POST['deslocamento'];
			$pontosExperiencia = $_POST['pontosExperiencia'];
			$antecedente = $_POST['antecedente'];
			$sabedoriaPassiva = $_POST['sabedoriaPassiva'];

			$ficha = new Ficha();
			$modForca = $ficha->modificadorAtributo($forcaPersonagem);
			$modDestreza = $ficha->modificadorAtributo($destrezaPersonagem);
			$modConstituicao = $ficha->modificadorAtributo($constituicaoPersonagem);
			$modInteligencia = $ficha->modificadorAtributo($inteligenciaPersonagem);
			$modSabedoria = $ficha->modificadorAtributo($sabedoriaPersonagem);
			$modCarisma = $ficha->modificadorAtributo($carismaPersonagem);

			$sql = $conn->prepare("INSERT INTO ficha (saveForca, saveDestreza, saveConstituicao, saveInteligencia, saveSabedoria, saveCarisma, forca, destreza, constituicao, inteligencia, sabedoria, carisma, codigoUsuario, nomePersonagem, nomeJogador, vida, classePersonagem, racaPersonagem, alinhamento, inspiracao, bonusProficiencia, classeArmadura
				, iniciativa, deslocamento, sabedoriaPassiva, antecedente, pontosExperiencia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$sql->bindValue(1, $modForca);
			$sql->bindValue(2, $modDestreza);
			$sql->bindValue(3, $modConstituicao);
			$sql->bindValue(4, $modInteligencia);
			$sql->bindValue(5, $modSabedoria);
			$sql->bindValue(6, $modCarisma);
			$sql->bindValue(7, $forcaPersonagem);
			$sql->bindValue(8, $destrezaPersonagem);
			$sql->bindValue(9, $constituicaoPersonagem);
			$sql->bindValue(10, $inteligenciaPersonagem);
			$sql->bindValue(11, $sabedoriaPersonagem);
			$sql->bindValue(12, $carismaPersonagem);		
			$sql->bindValue(13, $codigoUsuario);
			$sql->bindValue(14, $nomePersonagem);
			$sql->bindValue(15, $nomeJogador);
			$sql->bindValue(16, $vida);
			$sql->bindValue(17, $classe);
			$sql->bindValue(18, $raca);
			$sql->bindValue(19, $alinhamento);
			$sql->bindValue(20, $inspiracao);
			$sql->bindValue(21, $bonusProficiencia);
			$sql->bindValue(22, $classeArmadura);
			$sql->bindValue(23, $iniciativa);
			$sql->bindValue(24, $deslocamento);
			$sql->bindValue(25, $sabedoriaPassiva);
			$sql->bindValue(26, $antecedente);
			$sql->bindValue(27, $pontosExperiencia);

			$sql->execute();

			echo "Ficha adicionado com sucesso!";
		}

	}