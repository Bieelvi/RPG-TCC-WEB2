<?php 
	session_start(); 

	include('../model/Ficha.php');
	include('../model/ConexaoDataBase.php');

	/*Pega infomacoes finais*/
	$ouro = isset($_POST['ouro']) ? $_POST['ouro'] : 0;
	$prata = isset($_POST['prata']) ? $_POST['prata'] : 0;
	$platina = isset($_POST['platina']) ? $_POST['platina'] : 0;
	$equipamentos = isset($_POST['equipamentos']) ? $_POST['equipamentos'] : 0;
	$ataqueConjuracao = isset($_POST['ataqueConjuracao']) ? $_POST['ataqueConjuracao'] : 0;
	$historiaPersonagem = isset($_POST['historiaPersonagem']) ? $_POST['historiaPersonagem'] : 0;

	$infFinais = array(
		$ouro, /*0*/
		$prata, /*1*/
		$platina, /*2*/
		$equipamentos, /*3*/
		$ataqueConjuracao, /*4*/
		$historiaPersonagem); /*5*/
	/*Termina*/

	/*Pega as pericias e add numa array*/
	$acrobacia = isset($_POST['acrobacia']) ? 1 : 0;
	$arcanismo = isset($_POST['arcanismo']) ? 1 : 0;
	$atletismo = isset($_POST['atletismo']) ? 1 : 0;
	$atuacao = isset($_POST['atuacao']) ? 1 : 0;
	$enganacao = isset($_POST['enganacao']) ? 1 : 0;
	$furtividade = isset($_POST['furtividade']) ? 1 : 0;
	$historia = isset($_POST['historia']) ? 1 : 0;
	$intimidacao = isset($_POST['intimidacao']) ? 1 : 0;
	$intuicao = isset($_POST['intuicao']) ? 1 : 0;
	$investigacao = isset($_POST['investigacao']) ? 1 : 0;
	$lidaComAnimais = isset($_POST['lidaComAnimais']) ? 1 : 0;
	$medicina = isset($_POST['medicina']) ? 1 : 0;
	$natureza = isset($_POST['natureza']) ? 1 : 0;
	$percepcao = isset($_POST['percepcao']) ? 1 : 0;
	$persuasao = isset($_POST['persuasao']) ? 1 : 0;
	$prestidigitacao = isset($_POST['prestidigitacao']) ? 1 : 0;
	$religao = isset($_POST['religao']) ? 1 : 0;
	$sobrevivencia = isset($_POST['sobrevivencia']) ? 1 : 0;

	$_SESSION['pericias'] = array(
		$acrobacia, /*0*/
		$arcanismo, /*1*/
		$atletismo, /*2*/
		$atuacao, /*3*/
		$enganacao, /*4*/
		$furtividade, /*5*/
		$historia, /*6*/
		$intimidacao,/*7*/
		$intuicao, /*8*/
		$investigacao, /*9*/
		$lidaComAnimais, /*10*/
		$medicina, /*11*/
		$natureza, /*12*/
		$percepcao, /*13*/
		$persuasao, /*14*/
		$prestidigitacao,/*15*/ 
		$religao, /*16*/
		$sobrevivencia); /*17*/
	/*Termina*/

	/*Pega salvaguardas e add numa array*/
	$forca = isset($_POST['forca']) ? 1 : 0;
	$destreza = isset($_POST['destreza']) ? 1 : 0;
	$constituicao = isset($_POST['constituicao']) ? 1 : 0;
	$inteligencia = isset($_POST['inteligencia']) ? 1 : 0;
	$sabedoria = isset($_POST['sabedoria']) ? 1 : 0;
	$carisma = isset($_POST['carisma']) ? 1 : 0;

	$salvaguardas = array(
		$forca, 
		$destreza, 
		$constituicao, 
		$inteligencia, 
		$sabedoria, 
		$carisma);
	/*Termina*/

	$codigoUsuario = $_SESSION['usuarios'][2];
	$nomeJogador = $_SESSION['usuarios'][0];

	/*Atributos da criaFicha.php*/
	$atrFicha = array(
		$_POST['forca'], 
		$_POST['destreza'], 
		$_POST['constituicao'], 
		$_POST['inteligencia'], 
		$_POST['sabedoria'], 
		$_POST['carisma']);

	/*Informações iniciais da criaFicha.php*/
	$infInicial = array(
		$_SESSION['nomePersonagem'], /*0*/
		$_POST['chooseClasse'], /*1*/
		$_POST['chooseRaca'], /*2*/
		$_POST['chooseAlinhamento'], /*3*/ 
		$_POST['vida'], /*4*/
		$_POST['classeArm'], /*5*/
		$_POST['deslocamento'], /*6*/
		$_POST['nivel'], /*7*/
		$_POST['inspiracao'], /*8*/
		$_POST['bonusProficiencia'], /*9*/
		$_POST['sabPassiva']); /*10*/
	/*Termina*/

	$sqlCodigo = $conn->prepare("SELECT codigo_ficha FROM jogador WHERE codigo_usuario = ?");
	$sqlCodigo->bindValue(1, $codigoUsuario);
	$sqlCodigo->execute();

	if($sqlCodigo->rowCount() >= 5)
		echo "Nao pode add mais de CINCO fichas!";
	else {
		$sqlAddAtr = $conn->prepare("INSERT INTO ficha (nome, classe, raca, classeArm, vida, desloc, forca, destreza, constituicao, inteligencia, sabedoria, carisma, sabedoriaPassiva, nivel, tendencia, nomeJoga, pontosXP, inspiracao, bonusProficiencia, ouro, prata, platina, historiaPersonagem, equipamentos, caracteristicas, acrobacia, arcanismo, 	atletismo, atuacao, enganacao, furtividade, historia, intimidacao, intuicao, investigacao, lidarComAnimais, medicina,
			natureza, percepcao, persuasao, prestidigitacao, religiao, sobrevivencia, forcaPrest, destrezaPrest, constituicaoPrest, inteligenciaPrest, sabedoriaPrest, carismaPrest, vida1, vida2, vida3, morte1, morte2, morte3
		) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$sqlAddAtr->bindValue(1, $infInicial[0]); /*nome*/
		$sqlAddAtr->bindValue(2, $infInicial[1]); /*classe*/
		$sqlAddAtr->bindValue(3, $infInicial[2]); /*raca*/
		$sqlAddAtr->bindValue(4, $infInicial[5]); /*classeArm*/
		$sqlAddAtr->bindValue(5, $infInicial[4]); /*vida*/
		$sqlAddAtr->bindValue(6, $infInicial[6]); /*desloc*/

		$sqlAddAtr->bindValue(7, $atrFicha[0]); /*forca*/
		$sqlAddAtr->bindValue(8, $atrFicha[1]); /*destreza*/
		$sqlAddAtr->bindValue(9, $atrFicha[2]); /*constituicao*/
		$sqlAddAtr->bindValue(10, $atrFicha[3]); /*inteligencia*/
		$sqlAddAtr->bindValue(11, $atrFicha[4]); /*sabedoria*/
		$sqlAddAtr->bindValue(12, $atrFicha[5]); /*carisma*/

		$sqlAddAtr->bindValue(13, $infInicial[10]); /*sabedoriaPassiva*/
		$sqlAddAtr->bindValue(14, $infInicial[7]); /*nivel*/
		$sqlAddAtr->bindValue(15, $infInicial[3]); /*tendencia*/
		$sqlAddAtr->bindValue(16, $nomeJogador); /*nomeJoga*/
		$sqlAddAtr->bindValue(17, 0); /*pontosXP*/
		$sqlAddAtr->bindValue(18, $infInicial[8]); /*inspiracao*/
		$sqlAddAtr->bindValue(19, $infInicial[9]); /*bonusProficiencia*/
		$sqlAddAtr->bindValue(20, $infFinais[0]); /*ouro*/
		$sqlAddAtr->bindValue(21, $infFinais[1]); /*prata*/
		$sqlAddAtr->bindValue(22, $infFinais[2]); /*platina*/
		$sqlAddAtr->bindValue(23, $infFinais[5]); /*historiaPersonagem*/
		$sqlAddAtr->bindValue(24, $infFinais[3]); /*equipamentos*/
		$sqlAddAtr->bindValue(25, $infFinais[4]); /*caracteristicas*/

		$sqlAddAtr->bindValue(26, $_SESSION['pericias'][0]); /*acrobacia*/
		$sqlAddAtr->bindValue(27, $_SESSION['pericias'][1]); /*arcanismo*/
		$sqlAddAtr->bindValue(28, $_SESSION['pericias'][2]); /*atletismo*/
		$sqlAddAtr->bindValue(29, $_SESSION['pericias'][3]); /*atuacao*/
		$sqlAddAtr->bindValue(30, $_SESSION['pericias'][4]); /*enganacao*/
		$sqlAddAtr->bindValue(31, $_SESSION['pericias'][5]); /*furtividade*/
		$sqlAddAtr->bindValue(32, $_SESSION['pericias'][6]); /*historia*/
		$sqlAddAtr->bindValue(33, $_SESSION['pericias'][7]); /*intimidacao*/
		$sqlAddAtr->bindValue(34, $_SESSION['pericias'][8]); /*intuicao*/
		$sqlAddAtr->bindValue(35, $_SESSION['pericias'][9]); /*investigacao*/
		$sqlAddAtr->bindValue(36, $_SESSION['pericias'][10]); /*lidarComAnimais*/
		$sqlAddAtr->bindValue(37, $_SESSION['pericias'][11]); /*medicina*/
		$sqlAddAtr->bindValue(38, $_SESSION['pericias'][12]); /*natureza*/
		$sqlAddAtr->bindValue(39, $_SESSION['pericias'][13]); /*percepcao*/
		$sqlAddAtr->bindValue(40, $_SESSION['pericias'][14]); /*persuasao*/
		$sqlAddAtr->bindValue(41, $_SESSION['pericias'][15]); /*presditigitacao*/
		$sqlAddAtr->bindValue(42, $_SESSION['pericias'][16]); /*religao*/
		$sqlAddAtr->bindValue(43, $_SESSION['pericias'][17]); /*sobrevivenvia*/

		$sqlAddAtr->bindValue(44, $salvaguardas[0]); /*forcaPrest*/
		$sqlAddAtr->bindValue(45, $salvaguardas[1]); /*destrezaPrest*/
		$sqlAddAtr->bindValue(46, $salvaguardas[2]); /*constituicaoPrest*/
		$sqlAddAtr->bindValue(47, $salvaguardas[3]); /*inteligenciaPrest*/
		$sqlAddAtr->bindValue(48, $salvaguardas[4]); /*sabedoriaPrest*/
		$sqlAddAtr->bindValue(49, $salvaguardas[5]); /*carismaPrest*/

		$sqlAddAtr->bindValue(50, 0); /*vida1*/
		$sqlAddAtr->bindValue(51, 0); /*vida2*/
		$sqlAddAtr->bindValue(52, 0); /*vida3*/
		$sqlAddAtr->bindValue(53, 0); /*morte1*/
		$sqlAddAtr->bindValue(54, 0); /*morte2*/
		$sqlAddAtr->bindValue(55, 0); /*morte3*/

		/*$sqlAtribuiFicha = $conn->prepare("SELECT codigo_ficha FROM ficha WHERE nomeJoga = ? AND nome = ?");
		$sqlAtribuiFicha->bindValue(1, $nomeJogador);
		$sqlAtribuiFicha->bindValue(2, $infInicial[0]);

		if($sqlAtribuiFicha->execute()){
			$dadoCodFicha = $sqlAtribuiFicha->fetchAll(PDO::FETCH_ASSOC);
			if($sqlAtribuiFicha->rowCount()){
				if($sqlAddAtr->execute()){
					$sqlInsertFichaJogador = $conn->prepare("UPDATE jogador SET codigo_ficha = ? WHERE codigo_usuario = ?");
				}
				else
					echo "Não adicionado 1";
			}
		}
		else
			echo "Erro ao coletar infomações do jogador";		*/	
	}