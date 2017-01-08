<?php

/*
	Funkcja filtrujaca zmienna var i zwraca ja w postaci bezpiecznej.
*/
function filter($var, $sql = 0){
	$var = strip_tags($var); //usuwa znaczniki HTML zawarte w $var
	$var = addslashes ($var); //dodaje slashe '\' do niepokojacych znakow
	$var = stripslashes ($var); //dodaje slashe '\' do niepokojacych znakow
	if($sql == 1){ //jesli masz doczynienia z wszyknieciem sql
		$var = htmlspecialchars($var, ENT_QUOTES, 'UTF-8'); //ochrona przez sql
	}
	return $var; //zwroc bezpieczna wartosc zmiennej
}

?>