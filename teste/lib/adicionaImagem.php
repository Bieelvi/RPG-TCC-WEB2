<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	$enviar = filter_input(INPUT_POST,'acrescentar');

	if($enviar){
		$arquivo = isset($_FILES['imagem']) ? $_FILES['imagem'] : false;
		$caminho = "../view/foto";

		for($i = 0; $i < count($arquivo['name']); $i++){
			$destino = $caminho."/".$arquivo['name'][$i];

			if(move_uploaded_file($arquivo['tmp_name'][$i], $destino)){
            echo "Upload realizado com sucesso<br>"; 
	        } else {
	            echo "Erro ao realizar upload";
	        }        
		}
	} else echo "Erro";