<?php

require_once("basicmysql.php");
require_once("PasswordCreator.php");
require_once("ModelPHP.php");
session_start();
echo getHeader();
/*if (!(isset($_POST['login']) and isset($_POST['password']))){
	header("location: https://" . $_SERVER['HTTP_HOST'] . "/Krypto/Register.php");
	exit;
}*/
$odpowiedz = filter((string)$_POST['odpowiedz']);
$code = rand ();
echo $code.'<br>';

if( $odpowiedz == pobierzOdpowiedz(filter($_POST['email']))[0]['Odpowiedz']){
	
	echo "PRAWIDŁOWO! Na Twojego maila został wysłany kod, który będziesz musiał podać!";
	
		echo '<form action=\'WpiszKod.php\' method=\'post\'>
		<input type="hidden" name="email" value=\''.filter($_POST["email"]).'\'>
		<input type="hidden" name="code" value=\''.$code.'\'>
		<input type="submit" value="Przejdz dalej">
		</form> 
		<script>
			document.getElementById("setTransferDBForm").submit();
		</script>';
}
else{
	header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/NiepoprawnaOdpowiedz.php");
}

//header("location: https://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");

?>

<?php
	echo getFooter();
?>