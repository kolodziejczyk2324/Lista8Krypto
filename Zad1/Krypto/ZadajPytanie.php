<?php
	if(isset($_SESSION['login'])){
		header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");
		exit;
	}
		
	require_once("ModelPHP.php");
	require_once("basicmysql.php");
	echo getHeader();
	
?>

<h1>Odzyskiwanie hasła</h1>

Podaj odpowiedz na ponizsze pytanie udzieloną w trakcie rejestracji.
<br>

<?php
	echo filter(pobierzPytanie(filter($_POST['email']))[0]['Pytanie']);
?>

<form action="SprawdzPoprawnoscPytania.php" method="post">
<input type="hidden" name="email" value="<?php echo filter($_POST['email']); ?>">
  Odpowiedź:<br>
  <input type="text" name="odpowiedz">
  <br><br>
  <input type="submit" value="Przejdz dalej">
</form>

<br>
<a href="index.php">Wroc</a></br>

<?php
	echo getFooter();
?>