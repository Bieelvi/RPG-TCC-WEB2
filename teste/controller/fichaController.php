<?php 
	session_start(); 

	include('../model/Ficha.php');
	include('../model/ConexaoDataBase.php');

	if(!isset($_POST['forcaPersonagem']) && !isset($_POST['destrezaPersonagem']) && !isset($_POST['constituicaoPersonagem']) && !isset($_POST['inteligenciaPersonagem']) && !isset($_POST['sabedoriaPersonagem']) && !isset($_POST['carismaPersonagem'])){
		echo "Por favor preencha todos os campos!";
		header('Location: http://localhost/teste/index.php');
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

			$sql = $conn->prepare("INSERT INTO ficha (forca, destreza, constituicao, inteligencia, sabedoria, carisma, codigoUsuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$sql->bindValue(1, $forcaPersonagem);
			$sql->bindValue(2, $destrezaPersonagem);
			$sql->bindValue(3, $constituicaoPersonagem);
			$sql->bindValue(4, $inteligenciaPersonagem);
			$sql->bindValue(5, $sabedoriaPersonagem);
			$sql->bindValue(6, $carismaPersonagem);		
			$sql->bindValue(7, $codigoUsuario);
			$sql->execute();			

			$ficha = new Ficha();

			header('Location: http://localhost/teste/jogar.php');

		}

	} 