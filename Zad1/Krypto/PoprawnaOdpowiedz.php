<?php 
	session_start();
	require_once("ModelPHP.php");
	echo getHeader();
?>
	<h1>GRATULACJE! Hasło zostało wysłane na Twój email</h1>
	<a href="index.php">Wroc do strony glownej</a></br>
<?php
	echo getFooter();
?>