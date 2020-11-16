<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['infSala']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: ../login.php');

	if(isset($_POST['addImagem'])){
		$diretorioMusica = "../upload/imagem/" . $_SESSION['infSalaMestre'][4];

		if(!is_dir($diretorioMusica)){ 
			echo "Pasta nao existe";
		} else {

			$arquivo = isset($_FILES['imagem']) ? $_FILES['imagem'] : FALSE;

			$diretorioMusica = '../upload/imagem/' . $_SESSION['infSalaMestre'][4] . '/';

			for ($controle = 0; $controle < count($arquivo['name']); $controle++){
				$nomes = $arquivo['name'];
				$tipo = $arquivo['type'];
				$nomes[$controle];
				$destino = $diretorioMusica.$nomes[$controle];
				if($tipo[$controle] == 'image/jpeg' || $tipo[$controle] == 'image/jpg' || $tipo[$controle] == 'image/gif' || $tipo[$controle] == 'image/bmp' || $tipo[$controle] == 'image/png') {
					$sqlInsertImagem = $conn->prepare("INSERT INTO imagem (codigo_mestre, nome_imagem) VALUES (?, ?)");
					$sqlInsertImagem->bindValue(1, $_SESSION['infSalaMestre'][4]);
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
				} else {
					echo $mensagem = "Extensão não suportada!";
					$_SESSION['vericaUpload'] = array(0, $mensagem);
				}	
			}

			header('Location: ../informacao_sala.php');
		}
	}

	if(isset($_POST['addMusica'])){
		$diretorioMusica = "../upload/musica/" . $_SESSION['infSalaMestre'][4];

		if(!is_dir($diretorioMusica)){ 
			echo "Pasta nao existe";
		} else {

			$arqMusica = isset($_FILES['musica']) ? $_FILES['musica'] : FALSE;

			$diretorioMusica = '../upload/musica/' . $_SESSION['infSalaMestre'][4] . '/';

			for ($controle = 0; $controle < count($arqMusica['name']); $controle++){
		        $nomes = $arqMusica['name'];
		        print_r($tipo = $arqMusica['type']);
			    $nomes[$controle];
				$destino = $diretorioMusica.$nomes[$controle];
				if($tipo[$controle] == 'audio/mpeg' || $tipo[$controle] == 'audio/mp3' || $tipo[$controle] == 'audio/wav') {
					$sqlInsertImagem = $conn->prepare("INSERT INTO musica (codigo_mestre, nome_musica) VALUES (?, ?)");
					$sqlInsertImagem->bindValue(1, $_SESSION['infSalaMestre'][4]);
					$sqlInsertImagem->bindValue(2, $nomes[$controle]);

					if($sqlInsertImagem->execute()){

						if(move_uploaded_file($arqMusica['tmp_name'][$controle], $destino)){
							$mensagem = "Upload da musica foi um SUCESSO!";
							$_SESSION['vericaUpload'] = array(1, $mensagem);				
						} else {
							$mensagem = "Upload da musica foi um FRACASSO!";
							$_SESSION['vericaUpload'] = array(0, $mensagem);	
						}
					}
				} else {
					echo $mensagem = "Extensão não suportada!";
					$_SESSION['vericaUpload'] = array(0, $mensagem);
				}			
			}

			header('Location: ../informacao_sala.php');
		}
	}