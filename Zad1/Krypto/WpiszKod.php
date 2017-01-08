<?php
	if(isset($_SESSION['login'])){
		header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");
		exit;
	}
		
	require_once("ModelPHP.php");
	require_once("basicmysql.php");
	require_once("Filter.php");
	echo getHeader();
	
?>

<h1>Odzyskiwanie hasła</h1>

Podaj kod otrzymany na email.
<br>

<form action="SprawdzPoprawnoscKodu.php" method="post">
<input type="hidden" name="email" value="<?php echo filter($_POST['email']); ?>">
<input type="hidden" name="code" value="<?php echo filter($_POST['code']); ?>">
  Kod:<br>
  <input type="text" name="wpisany_kod">
  <br><br>
  <input type="submit" value="Przejdz dalej">
</form>

<br>
<a href="index.php">Wroc</a></br>

<?php
	echo getFooter();
?>