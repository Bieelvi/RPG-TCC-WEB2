<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios']))
		$nomeUsuario = $_SESSION['usuarios'][0];
	else
		header('Location: http://localhost/teste/login.php');

	$nomeSala = $_POST['nomeSala'];
	$senhaSala = $_POST['senhaSala'];
	$nomeMestre = $_POST['nomeMestre'];
	$codigoUsuario = $_SESSION['usuarios'][2];

	$sqlConsultaPresencial = $conn->prepare("SELECT * FROM sala_presencial WHERE nome_sala_presencial = ?");
	$sqlConsultaPresencial->bindValue(1, $nomeSala);

	if($sqlConsultaPresencial->execute()){
		if($sqlConsultaPresencial->rowCount()){
			$mensagem = "Nome de sala já em uso!";
			$_SESSION['vericaSalas'] = array(0, $mensagem);
			header('Location: http://localhost/teste/modoJogo.php');
		} else {
			$sqlConsultaOnline = $conn->prepare("SELECT * FROM sala_online WHERE nome_sala_online = ?");
			$sqlConsultaOnline->bindValue(1, $nomeSala);

			if($sqlConsultaOnline->execute()){
				if($sqlConsultaOnline->rowCount()){
					$mensagem = "Nome de sala já em uso!";
					$_SESSION['vericaSalas'] = array(0, $mensagem);
					header('Location: http://localhost/teste/modoJogo.php');
				} else {
					$sqlMestre = $conn->prepare("INSERT INTO mestre (codigo_usuario, nome_mestre) VALUES (?, ?)");
					$sqlMestre->bindValue(1, $codigoUsuario);
					$sqlMestre->bindValue(2, $nomeMestre);

					if($sqlMestre->execute()){
						$codigoMestre = $conn->lastInsertId();		
						$_SESSION['infSalaMestre'] = array($nomeSala, $senhaSala, $nomeMestre, $codigoUsuario, $codigoMestre);

						$diretorioImagem = '../upload/imagem/' . $_SESSION['infSalaMestre'][4] . '/';
						mkdir($diretorioImagem, 0755);

						$diretorioMusica = '../upload/musica/' . $_SESSION['infSalaMestre'][4] . '/';
						mkdir($diretorioMusica, 0755);
					}
					
					if($_POST['sala'] == 'Online'){
						$sqlInsertSalaOnline = $conn->prepare("INSERT INTO sala_online (codigo_mestre, nome_sala_online, senha_sala_online) VALUES (?, ?, ?)");
						$sqlInsertSalaOnline->bindValue(1, $_SESSION['infSalaMestre'][4]);
						$sqlInsertSalaOnline->bindValue(2, $_SESSION['infSalaMestre'][0]);
						$sqlInsertSalaOnline->bindValue(3, $_SESSION['infSalaMestre'][1]);

						if(!$sqlInsertSalaOnline->execute()) {
							$mensagem = "Não foi possível inciar um sala nove!";
							$_SESSION['vericaSala'] = array(0, $mensagem);
						} else {
							$mensagem = "Criando um sala!";
							$_SESSION['vericaSala'] = array(1, $mensagem);
						}

					} else if ($_POST['sala'] == 'Presencial'){
						$sqlInsertSalaPresencial = $conn->prepare("INSERT INTO sala_presencial (codigo_mestre, nome_sala_presencial, senha_sala_presencial) VALUES (?, ?, ?)");
						$sqlInsertSalaPresencial->bindValue(1, $_SESSION['infSalaMestre'][4]);
						$sqlInsertSalaPresencial->bindValue(2, $_SESSION['infSalaMestre'][0]);
						$sqlInsertSalaPresencial->bindValue(3, $_SESSION['infSalaMestre'][1]);

						if(!$sqlInsertSalaPresencial->execute()) {
							$mensagem = "Não foi possível inciar um sala nove!";
							$_SESSION['vericaSala'] = array(0, $mensagem);
						} else {
							$mensagem = "Criando um sala!";
							$_SESSION['vericaSala'] = array(1, $mensagem);
						}
					}
				}
			}
		}
	}

	header('Location: http://localhost/teste/modoJogo.php');