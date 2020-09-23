<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	if($_POST['sala'] == 'Online')
		$opSala = 1;
	else if($_POST['sala'] == 'Presencial')
		$opSala = 2;

	for($i = 0; $i < count($_SESSION['imagens']); $i++){
		print_r($_SESSION['imagens'][$i]); echo "<br>";

		$imagensArray = $_SESSION['imagens'][$i];

		$arquivo = $imagensArray[0];
		$destino = $imagensArray[1];

		echo $arquivo;

		echo "<br><br>";

		echo $destino;

		/*if(move_uploaded_file($arquivo, $destino)){
            echo "Upload realizado com sucesso<br>"; 
	   	} else {
	        echo "Erro ao realizar upload";
	    } */   

		echo "<br>";



		
	}	  	