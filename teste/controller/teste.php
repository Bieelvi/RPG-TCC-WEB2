<?php 
	session_start(); 

	include('../model/Ficha.php');
	include('../model/ConexaoDataBase.php');

	$atr_forca = $_POST['atrForca'];

	$_SESSION['atrFicha'] = $atr_forca;

	header('http://localhost/teste/criaFicha.php');