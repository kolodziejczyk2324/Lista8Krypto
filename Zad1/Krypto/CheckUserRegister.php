<?php

require_once("basicmysql.php");
require_once("PasswordCreator.php");
require_once("Filter.php");

session_start();

if (!(isset($_POST['login']) and isset($_POST['password']))){
	header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/Register.php");
	exit;
}
$login = filter((string)$_POST['login'], 1);
$pass = filter((string)$_POST['password']);
$email = filter((string)$_POST['email']);
$pytanie = filter((string)$_POST['pytanie']);
$odpowiedz = filter((string)$_POST['odpowiedz']);
if(isLoginInDB($login)){
	header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/Register.php");
	exit;
}
addUserToDB($login, createPassword($pass), $email, $pytanie, $odpowiedz);
$_SESSION['login'] = $login;
header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");

?>