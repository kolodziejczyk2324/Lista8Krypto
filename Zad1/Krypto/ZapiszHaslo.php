<?php

require_once("basicmysql.php");
require_once("PasswordCreator.php");
require_once("ModelPHP.php");
require_once("Filter.php");

session_start();

$pass = filter((string)$_POST['password']);
$email = filter((string)$_POST['email']);

updatePassword($email, createPassword($pass));
echo getHeader();

?>
GRATULACJE! Odzyskałeś hasło.
<br>
<a href="index.php">Wroc do strony glownej</a></br>
<?php
	echo getFooter();
?>