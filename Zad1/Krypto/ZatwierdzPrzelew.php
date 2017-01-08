<?php

	require_once("basicmysql.php");
	require_once("Filter.php");
	
	session_start();

	if (!(isset($_SESSION['login'])) OR isUserInDBLog($_SESSION['login']) OR !(isset($_GET['id']))){
		header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/index.php");
		exit;
	}
	confirmTransfer(filter($_GET['id']));
	header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/AdminPage.php");
?>