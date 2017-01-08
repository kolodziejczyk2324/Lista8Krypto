<?php
	if(isset($_SESSION['login'])){
		header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");
		exit;
	}
		
	require_once("ModelPHP.php");
	echo getHeader();
?>

<h1>Odzyskiwanie hasła</h1>

Wpisz email podany podczas rejestracji.

<form action="ZadajPytanie.php" method="post">
  Email:<br>
  <input type="text" name="email">
  <br><br>
  <input type="submit" value="Przejdz dalej">
</form>

<br>
<a href="index.php">Wroc</a></br>

<?php
	echo getFooter();
?>