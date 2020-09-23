<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	$enviar = filter_input(INPUT_POST,'adicionar');
	$verificador = 2;

	if($enviar){
		foreach($_FILES['musica']['name'] as $ind => $valor){
		    if(empty($valor)){
		        echo "Índice $ind está vazio";
		    } else {
		    	$arquivo = $_FILES['musica'];
		        $caminho = "../view/musica";

				for($i = 0; $i < count($arquivo['name']); $i++){
					$destino = $caminho."/".$arquivo['name'][$i];

				    $_SESSION['musicas'][$i] = array($arquivo['tmp_name'][$i], $destino);

				    $verificador = 1;
			       }
		    }
		}

		if($verificador == 1){
			$_SESSION['verificador'] = 1;
			header('Location: http://localhost/teste/criaSala.php');
        } else if($verificador == 2){
			$_SESSION['verificador'] = 2;
			header('Location: http://localhost/teste/criaSala.php');
		}
	}