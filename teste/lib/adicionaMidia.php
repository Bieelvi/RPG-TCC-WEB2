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
		$diretorioMusica = "../upload/imagem/" . $_SESSION['infSala'][4];

		if(!is_dir($diretorioMusica)){ 
			echo "Pasta nao existe";
		} else {

			$arquivo = isset($_FILES['imagem']) ? $_FILES['imagem'] : FALSE;

			$diretorioMusica = '../upload/imagem/' . $_SESSION['infSala'][4] . '/';

			for ($controle = 0; $controle < count($arquivo['name']); $controle++){
				$nomes = $arquivo['name'];
				$nomes[$controle] = rand().'-'.$nomes[$controle];
				$destino = $diretorioMusica.$nomes[$controle];

				$sqlInsertImagem = $conn->prepare("INSERT INTO imagem (codigo_mestre, nome_imagem) VALUES (?, ?)");
				$sqlInsertImagem->bindValue(1, $_SESSION['infSala'][4]);
				$sqlInsertImagem->bindValue(2, $nomes[$controle]);

				if($sqlInsertImagem->execute()){
					if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
						$mensagem = "Upload da imagem foi um SUCESSO!";
						$_SESSION['vericaUpload'] = array(1, $mensagem);				
					} else {
						$mensagem = "Upload da imagem foi um FRACASSO!";
						$_SESSION['vericaUpload'] = array(0, $mensagem);	
					}
				}			
			}

			header('Location: http://localhost/teste/criaSala.php');
		}
	}

	if ($enviarMusica){
		$diretorioMusica = "../upload/musica/" . $_SESSION['infSala'][4];

		if(!is_dir($diretorioMusica)){ 
			echo "Pasta nao existe";
		} else {

			$arquivo = isset($_FILES['musica']) ? $_FILES['musica'] : FALSE;

			$diretorioMusica = '../upload/musica/' . $_SESSION['infSala'][4] . '/';

			for ($controle = 0; $controle < count($arquivo['name']); $controle++){
		        $nomes = $arquivo['name'];
			    $nomes[$controle] = rand().'-'.$nomes[$controle];
				$destino = $diretorioMusica.$nomes[$controle];

				$sqlInsertImagem = $conn->prepare("INSERT INTO musica (codigo_mestre, nome_musica) VALUES (?, ?)");
				$sqlInsertImagem->bindValue(1, $_SESSION['infSala'][4]);
				$sqlInsertImagem->bindValue(2, $nomes[$controle]);

				if($sqlInsertImagem->execute()){

					if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
						$mensagem = "Upload da musica foi um SUCESSO!";
						$_SESSION['vericaUpload'] = array(1, $mensagem);				
					} else {
						$mensagem = "Upload da musica foi um FRACASSO!";
						$_SESSION['vericaUpload'] = array(0, $mensagem);	
					}
				}			
			}

			header('Location: http://localhost/teste/criaSala.php');
		}
	}