<?php 
	session_start();

	include("../model/ConexaoDataBase.php");
	include("../model/Pilha.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	$enviarImagem = filter_input(INPUT_POST,'addImagem');
	$enviarMusica = filter_input(INPUT_POST,'addMusica');

	if($enviarImagem){
		foreach($_FILES['imagem']['name'] as $ind => $valor){
		    if(empty($valor)){
				$_SESSION['vericaUpload'] = 0;
				header('Location: http://localhost/teste/criaSala.php');
			} else {
				$valor = $_FILES['imagem']['name'];
				$nomeMestre = $_SESSION['infSala'][2];
				$codigoMestre = $_SESSION['infSala'][4];

				$sqlInsertImagem = $conn->prepare("INSERT INTO imagem (codigo_mestre, nome_imagem) VALUES (?, ?)");
				$sqlInsertImagem->bindValue(1, $codigoMestre);
				$sqlInsertImagem->bindValue(2, $valor[$ind]);
				if($sqlInsertImagem->execute())
					$_SESSION['vericaUpload'] = 1;
				else 
					$_SESSION['vericaUpload'] = 0;				
				header('Location: http://localhost/teste/criaSala.php');
			}
		}
	}

	if ($enviarMusica){
		foreach($_FILES['musica']['name'] as $ind => $valor){
		    if(empty($valor)){
				$_SESSION['vericaUpload'] = 0;
				header('Location: http://localhost/teste/criaSala.php');
			} else {
				$valor = $_FILES['musica']['name'];
				$nomeMestre = $_SESSION['infSala'][2];
				$codigoMestre = $_SESSION['infSala'][4];

				$sqlInsertImagem = $conn->prepare("INSERT INTO musica (codigo_mestre, nome_musica) VALUES (?, ?)");
				$sqlInsertImagem->bindValue(1, $codigoMestre);
				$sqlInsertImagem->bindValue(2, $valor[$ind]);
				if($sqlInsertImagem->execute())
					$_SESSION['vericaUpload'] = 1;
				else 
					$_SESSION['vericaUpload'] = 0;				
				header('Location: http://localhost/teste/criaSala.php');
			}
		}

	}