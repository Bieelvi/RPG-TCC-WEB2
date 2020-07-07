<?php 

	include_once("../model/ConexaoDataBase.php");
	
	$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
	$senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);

	
?>