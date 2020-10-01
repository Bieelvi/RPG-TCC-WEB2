<?php 
	session_start();

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





function pegaPericia($pericia){	
	if($pericia == 'Perícia 1' || $pericia == 'Perícia 2') $periciaClicada = 0;
	else if($pericia == 'Acrobacia (Des)') $periciaClicada = 1;
	else if($pericia == 'Arcanismo (Int)') $periciaClicada = 1;
	else if($pericia == 'Atletismo (For)') $periciaClicada = 1;
	else if($pericia == 'Atuação (Car)') $periciaClicada = 1;
	else if($pericia == 'Enganação (Car)') $periciaClicada = 1;
	else if($pericia == 'Furtividade (Des)') $periciaClicada = 1;
	else if($pericia == 'História (Int)') $periciaClicada = 1;
	else if($pericia == 'Intimidação (Car)') $periciaClicada = 1;
	else if($pericia == 'Intuição (Sab)') $periciaClicada = 1;
	else if($pericia == 'Investigação (Int)') $periciaClicada = 1;
	else if($pericia == 'Lidar com Animais (Sab)') $periciaClicada = 1;
	else if($pericia == 'Medicina (Sab)') $periciaClicada = 1;
	else if($pericia == 'Natureza (Int)') $periciaClicada = 1;
	else if($pericia == 'Percepção (Sab)') $periciaClicada = 1;
	else if($pericia == 'Persuasão (Car)') $periciaClicada = 1;
	else if($pericia == 'Prestidigitação (Des)') $periciaClicada = 1;
	else if($pericia == 'Religião (Int)') $periciaClicada = 1;
	else if($pericia == 'Sobrevivência (Sab)') $periciaClicada = 1;

	return $periciaClicada;
}

function verificaPericia ($pericia, $periciaSelecionada){
		foreach ($pericia as $value) {
			if($value == $periciaSelecionada){

			switch ($value) {
				case 'Acrobacia (Des)':	$_SESSION['periciaUm'] = array('Acrobacia' => '1'); break;
				case 'Arcanismo (Int)':	$_SESSION['periciaUm'] = array('Arcanismo' => '1');	break;
				case 'Atletismo (For)':	$_SESSION['periciaUm'] = array('Atletismo' => '1');	break;
				case 'Atuação (Car)': $_SESSION['periciaUm'] = array('Atuação' => '1'); break;
				case 'Enganação (Car)':	$_SESSION['periciaUm'] = array('Enganação' => '1');	break;
				case 'Furtividade (Des)': $_SESSION['periciaUm'] = array('Furtividade' => '1'); break;
				case 'História (Int)':	$_SESSION['periciaUm'] = array('História' => '1');	break;
				case 'Intimidação (Car)': $_SESSION['periciaUm'] = array('Intimidação' => '1'); break;
				case 'Intuição (Sab)':	$_SESSION['periciaUm'] = array('Intuição' => '1');	break;
				case 'Investigação (Int)':	$_SESSION['periciaUm'] = array('Investigação' => '1');	break;
				case 'Lidar com Animais (Sab)':	$_SESSION['periciaUm'] = array('Lidar com Animais' => '1'); break;
				case 'Medicina (Sab)': $_SESSION['periciaUm'] = array('Medicina' => '1'); break;
				case 'Natureza (Int)': $_SESSION['periciaUm'] = array('Natureza' => '1'); break;
				case 'Percepção (Sab)':	$_SESSION['periciaUm'] = array('Percepção' => '1'); break;
				case 'Persuasão (Car)':	$_SESSION['periciaUm'] = array('Persuasão' => '1');	break;
				case 'Prestidigitação (Des)': $_SESSION['periciaUm'] = array('Prestidigitação' => '1'); break;	
				case 'Religião (Int)': $_SESSION['periciaUm'] = array('Religião' => '1'); break;
				case 'Sobrevivência (Sab)':	$_SESSION['periciaUm'] = array('Sobrevivência' => '1');	break;										
				default:
					
					break;
				}
			}
		}
	}