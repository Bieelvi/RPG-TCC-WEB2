<?php 
	session_start(); 

	include('../model/Ficha.php');
	include('../model/ConexaoDataBase.php');

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

	$_SESSION['pericias'] = array($acrobacia, $arcanismo, $atletismo, $atuacao, $enganacao, $furtividade, $historia, $intimidacao,
		$intuicao, $investigacao, $lidaComAnimais, $medicina, $natureza, $percepcao, $persuasao, $prestidigitacao, $religao, $sobrevivencia);
	/*Termina*/

	/*Pega salvaguardas e add numa array*/
	$forca = isset($_POST['forca']) ? 1 : 0;
	$destreza = isset($_POST['destreza']) ? 1 : 0;
	$constituicao = isset($_POST['constituicao']) ? 1 : 0;
	$inteligencia = isset($_POST['inteligencia']) ? 1 : 0;
	$sabedoria = isset($_POST['sabedoria']) ? 1 : 0;
	$carisma = isset($_POST['carisma']) ? 1 : 0;

	$_SESSION['salvaguardas'] = array($forca, $destreza, $constituicao, $inteligencia, $sabedoria, $carisma);
	/*Termina*/

	$codigoUsuario = $_SESSION['usuarios'][2];

	/*Atributos da criaFicha.php*/
	$atrFicha = array($_POST['forca'], $_POST['destreza'], $_POST['constituicao'], $_POST['inteligencia'], $_POST['sabedoria'], $_POST['carisma']);

	/*Informações iniciais da criaFicha.php*/
	$infInicial = array($_SESSION['nomePersonagem'], $_POST['chooseClasse'], $_POST['chooseRaca'], $_POST['chooseAlinhamento'], $_POST['vida'], $_POST['classeArm'], $_POST['deslocamento'], $_POST['nivel'], $_POST['inspiracao'], $_POST['bonusProficiencia'], $_POST['sabPassiva']);
	/*Termina*/

	$sqlCodigo = $conn->prepare("SELECT codigo_ficha FROM jogador WHERE codigo_usuario = ?");
	$sqlCodigo->bindValue(1, $codigoUsuario);
	$sqlCodigo->execute();

	if($sqlCodigo->rowCount() >= 5)
		echo "Nao pode add mais de CINCO fichas!";
	else {
		$sqlAddAtr = $conn->prepare("INSERT INTO ficha (nome, classe, raca, classeArm, vida, desloc, forca, inteligencia, destreza, sabedoria, constituicao, carisma, sabedoriaPassiva, nivel, tendencia, nomeJoga, inspiracao, bonusProficiencia, ouro, prata, platina, historia, equipamentos, caracteristicas, acrobacia, arcanismo, atletismo, atuacao, enganacao, furtividade, historiaPericia, intimidacao, intuicao, natureza, percepcao, persuacao, prestidigitacao, religicao, sobrevivencia, forcaPrest, destrezaPrest, lidaComAnimais, medicina,constituicaoPrest, inteligenciaPrest, sabedoriaPrest, carismaPrest, vida1, vida2, vida3, morte1, morte2, morte3) VALUES ()");
		$sqlAddAtr->bindValue(1, $infInicial[0]);
		$sqlAddAtr->bindValue(2, $infInicial[1]);
		$sqlAddAtr->bindValue(3, $infInicial[2]);
		$sqlAddAtr->bindValue(4, $infInicial[5]);
		$sqlAddAtr->bindValue(5, $infInicial[4]);
		$sqlAddAtr->bindValue(6, $infInicial[6]);
		$sqlAddAtr->bindValue(7, $atrFicha[0]);
		$sqlAddAtr->bindValue(8, $atrFicha[3]);
		$sqlAddAtr->bindValue(9, $atrFicha[1]);
		$sqlAddAtr->bindValue(10, $atrFicha[4]);
		$sqlAddAtr->bindValue(11, $atrFicha[2]);
		$sqlAddAtr->bindValue(12, $atrFicha[5]);
		$sqlAddAtr->bindValue(13, $atrFicha[10]);
		$sqlAddAtr->bindValue(14, $atrFicha[7]);
		$sqlAddAtr->bindValue(15, $infInicial[3]);
		$sqlAddAtr->bindValue(16, $_SESSION['usuarios'][0]);
		$sqlAddAtr->bindValue(17, $infInicial[8]);
		$sqlAddAtr->bindValue(18, $infInicial[9]);
		$sqlAddAtr->bindValue(19, );
		$sqlAddAtr->bindValue(20, );
		$sqlAddAtr->bindValue(21, );
		$sqlAddAtr->bindValue(22, );
		$sqlAddAtr->bindValue(23, );
		$sqlAddAtr->bindValue(24, );
		$sqlAddAtr->bindValue(25, $_SESSION['pericias'][0]);
		$sqlAddAtr->bindValue(26, $_SESSION['pericias'][1]);
		$sqlAddAtr->bindValue(27, $_SESSION['pericias'][2]);
		$sqlAddAtr->bindValue(28, $_SESSION['pericias'][3]);
		$sqlAddAtr->bindValue(29, $_SESSION['pericias'][4]);
		$sqlAddAtr->bindValue(30, $_SESSION['pericias'][5]);
		$sqlAddAtr->bindValue(31, $_SESSION['pericias'][6]);
		$sqlAddAtr->bindValue(32, $_SESSION['pericias'][7]);
		$sqlAddAtr->bindValue(33, $_SESSION['pericias'][8]);
		$sqlAddAtr->bindValue(34, $_SESSION['pericias'][9]);
		$sqlAddAtr->bindValue(35, $_SESSION['pericias'][10]);
		$sqlAddAtr->bindValue(36, $_SESSION['pericias'][11]);
		$sqlAddAtr->bindValue(37, $_SESSION['pericias'][12]);
		$sqlAddAtr->bindValue(38, $_SESSION['pericias'][13]);
		$sqlAddAtr->bindValue(39, $_SESSION['pericias'][14]);
		$sqlAddAtr->bindValue(41, $_SESSION['pericias'][15]);
		$sqlAddAtr->bindValue(42, $_SESSION['pericias'][16]);
		$sqlAddAtr->bindValue(43, $_SESSION['pericias'][17]);
		$sqlAddAtr->bindValue(44, $_SESSION['pericias'][18]);
		$sqlAddAtr->bindValue(45, 0);
		$sqlAddAtr->bindValue(46, 0);
		$sqlAddAtr->bindValue(47, 0);
		$sqlAddAtr->bindValue(48, 0);
		$sqlAddAtr->bindValue(49, 0);
		$sqlAddAtr->bindValue(45, 0);


		if($sqlAddAtr->execute()){
			echo "add";
		} else
			echo "Não adicionado 1";
	}