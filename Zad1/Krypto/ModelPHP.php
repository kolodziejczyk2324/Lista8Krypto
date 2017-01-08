<?php
$HEADER_1 =<<<EOT
<!DOCTYPE html>
<html>
<head>
<style>
	#MainDiv {
		width: 60%;
		max-width: 940px;
		margin-left: auto;
		margin-right: auto;
		background-color: #006183;
		text-align: center;
		font-size: 120%;
		color: white;
		padding-bottom: 2em;
		border-radius: 20px;
	}
	
	a{
	  text-decoration: none;
	  background: white;
	  color: #006183;
	  padding: .1em .25em;
	  margin: 0;
	  cursor: pointer;
	  border-radius: 10px;
	}
	
	a:hover {
	  /*Link po najechaniu*/
	  background-color: black;
	  color: white;
	}
	
	input[type=submit] {
		padding:5px 15px; 
		background: red;
		color: white;		
		border:0 none;
		cursor:pointer;
		-webkit-border-radius: 5px;
		border-radius: 5px; 
	}
</style>
EOT;

$HEADER_2 =<<<EOT
</head>
<body>
<div id="MainDiv">
EOT;

$FOOTER =<<<EOT
</div>
</body>
</html>
EOT;

function getHeader(){
	global $HEADER_1;
	global $HEADER_2;
	return $HEADER_1 . $HEADER_2;
}

function getHeader_1(){
	global $HEADER_1;
	return $HEADER_1;
}

function getHeader_2(){
	global $HEADER_2;
	return $HEADER_2;
}

function getFooter(){
	global $FOOTER;
	return $FOOTER;
}
?>