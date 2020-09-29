<?php 
	session_start(); 

	include('../model/Ficha.php');
	include('../model/ConexaoDataBase.php');

	$codigoUsuario = $_SESSION['usuarios'][2];

	$atrFicha = array($_POST['forca'], $_POST['destreza'], $_POST['constituicao'], $_POST['inteligencia'], $_POST['sabedoria'], $_POST['carisma']);

	$infInicial = array($_SESSION['nomePersonagem'], $_POST['chooseClasse'], $_POST['chooseRaca'], $_POST['chooseAlinhamento']);

	$sqlCodigo = $conn->prepare("SELECT codigo_ficha FROM jogador WHERE codigo_usuario = ?");
	$sqlCodigo->bindValue(1, $codigoUsuario);
	$sqlCodigo->execute();

	if($sqlCodigo->rowCount() >= 5)
		echo "Nao pode add mais de CINCO fichas!";
	else {
		$sqlAddAtr = $conn->prepare("INSERT INTO ficha (nome, classe, raca, classeArm, vida, desloc, forca, inteligencia, destreza, sabedoria, constituicao, carisma, nivel, tendencia, nomeJoga, inspiracao, bonusProficiencia, ouro, prata, platina, historia, equipamentos, caracteristicas, acrobacia, arcanismo, atletismo, atuacao, blefar, furtividade, historiaPerici, intimidacao, natureza, percepcao, persuacao, prestidigitacao, religicao, sobrevivencia, forcaPrest, destrezaPrest, lidaComAnimais, constituicaoPrest, inteligenciaPrest, sabedoriaPrest, carismaPrest, intuicao, medicina) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$sqlAddAtr->bindValue(1, );
		$sqlAddAtr->bindValue(2, );
		$sqlAddAtr->bindValue(3, );
		$sqlAddAtr->bindValue(4, );
		$sqlAddAtr->bindValue(5, );
		$sqlAddAtr->bindValue(6, );
		$sqlAddAtr->bindValue(7, );
		$sqlAddAtr->bindValue(8, );
		$sqlAddAtr->bindValue(9, );
		$sqlAddAtr->bindValue(10, );

		if($sqlAddAtr->execute()){
			echo "add";
		} else
			echo "Não adicionado 1";
	}