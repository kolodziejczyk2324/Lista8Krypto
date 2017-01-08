<?php

require_once("basicmysql.php");
require_once("PasswordCreator.php");
require_once("ModelPHP.php");
require_once("Filter.php");

session_start();

/*if (!(isset($_POST['login']) and isset($_POST['password']))){
	header("location: https://" . $_SERVER['HTTP_HOST'] . "/Krypto/Register.php");
	exit;
}*/

echo getHeader();

echo "PRAWIDŁOWO! Wpisz nowe hasło.";

if( filter($_POST['code']) == filter($_POST['wpisany_kod'])){
		echo '<form action=\'ZapiszHaslo.php\' method=\'post\'>
		<input type="hidden" name="email" value="'.$_POST['email'].'">
		<input type="password" name="password">
		<input type="submit" value="Przejdz dalej">
		</form> ';
}
else{
	header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/NiepoprawnaOdpowiedz.php");
}

//header("location: https://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");

?>
<?php
	echo getFooter();
?>