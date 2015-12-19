<?php

	session_unset(); 
	session_destroy(); 
	unset($_COOKIE["SJC"]);
	unset($_COOKIE["Username"]);

	$redirectURL = "../html/UserLogin.htm";
	header('Location: '.$redirectURL);
	exit();
?>