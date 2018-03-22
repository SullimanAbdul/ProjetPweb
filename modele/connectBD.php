<?php
	$hote = "localhost";
	$login = "root";
	$pass = "root";
	$bd="pweb17";
	
	
	if (!isset($link)){
	
		$link = mysqli_connect($hote, $login, $pass) 
		or die (htmlentities("erreur de connexion au serveur :") . mysql_error());
		mysqli_select_db($link, $bd)
		or die (htmlentities("erreur d'accès à la base:" . $bd));
	}
?>