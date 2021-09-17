<?php
	//session_start();
	
	//print_r($_SESSION);
	setcookie("id","1234",time()+60*60*24);
	
	echo $_COOKIE["id"];
	
	
?>