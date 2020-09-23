<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	$enviar = filter_input(INPUT_POST,'acrescentar');
	$verificador = 2;

	if($enviar){
		foreach($_FILES['imagem']['name'] as $ind => $valor){
		    if(empty($valor)){
		        echo "Índice $ind está vazio";
		    } else {
		    	$arquivo = $_FILES['imagem'];
		        $caminho = "../view/foto";
		        $tipos = "%\.(pjpeg|jpeg|png|gif|bmp)$%i";

		        if(preg_match($tipos, $arquivo["type"]) == 1){
					echo "Arquivo selecionado não é uma imagem."; 			
				}
				
				for($i = 0; $i < count($arquivo['name']); $i++){
					$destino = $caminho."/".$arquivo['name'][$i];

					if(move_uploaded_file($arquivo['tmp_name'][$i], $destino)){


					    $verificador = 1;
		            	echo "Upload realizado com sucesso<br>"; 
			        } else {
			            echo "Erro ao realizar upload<br";
			        } 

				    
			       }
		    }
		}

		/*if($verificador == 1){
			$_SESSION['verificador'] = 1;
			header('Location: http://localhost/teste/criaSala.php');
        } else if($verificador == 2){
			$_SESSION['verificador'] = 2;
			header('Location: http://localhost/teste/criaSala.php');
		}*/
	}