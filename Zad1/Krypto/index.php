<?php
	if(isset($_SESSION['login'])){
		header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");
		exit;
	}
	
	require_once("ModelPHP.php");
	require_once("MyFacebook.php");
	
	echo getHeader_1();
	echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
	echo getHeader_2();
	checkFacebook();
?>

<h1>Logowanie</h1>
<a href="Register.php">zarejestruj sie</a>

<form id="logForm" action="CheckUserLogin.php" method="post">
  Login:<br>
  <input type="text" name="login">
  <br>
  Haslo:<br>
  <input type="password" name="password">
  <br>
  <br>
  <div class="g-recaptcha" align="center" data-sitekey="6Le_5w4UAAAAAAKUFqVEAh47afpBb0E9QfFIFVDm"></div>
  <br>
  <input type="submit" value="Zaloguj">
</form>
<a href="ForgotPasswordPage.php">Zapomnialem hasla</a>
<h3>Witaj na najbezpieczniejszej stronie do wykonywania przelewów na świecie!</h3>

<a href="MySmail/mySmail.php">Poczta studencka</a>

<?php
	echo getFooter();
?>