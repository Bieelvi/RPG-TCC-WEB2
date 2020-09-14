<?php 
	session_start();

	include("../model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
	} else {
		header('Location: http://localhost/teste/login.php');
	}

	if(isset($_POST['nomeMestre']) && isset($_POST['nomeSala']) && isset($_POST['senhaSala'])){
		$_SESSION['infSala'] = array($_POST['nomeMestre'], $_POST['nomeSala'], $_POST['senhaSala']);
		?>
		<script type='text/JavaScript'>
			setTimeout(function () {
			   window.location.href = '../criaSala.php'; 
			}, 2); 
		</script>
		<?php 
	} else
		echo "Impossível criar sala!";
		