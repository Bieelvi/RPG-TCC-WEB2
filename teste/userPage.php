<?php 
	session_start();

	include("model/ConexaoDataBase.php");

	if(isset($_SESSION['usuarios']) && is_array($_SESSION['usuarios'])){
		$nomeUsuario = $_SESSION['usuarios'][0];
		$hierarquiaUsuario = $_SESSION['usuarios'][1];
	} else {
		header('Location: http://localhost/teste/login.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $nomeUsuario; ?> - Roll and Play GENG</title>
		<?php include("header.php"); ?>	

<?php include("footer.php"); ?>