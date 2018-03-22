<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
		<link rel="stylesheet" href="./vue/styleCSS/connexion.css"/>
		<!-- <script src="script.js"></script> -->
	</head>
	<body>
		<img src="./vue/images/logoclean.png" alt="logo" width="350">
		<form action="index.php?controle=utilisateur&action=ident" method="post" class="center">
			<label>Username :</label>
			<input name="nom" class="nom" value="<?php echo $nom ?>" /> 
			<label>Password :</label>
			<input type="password" name="num" class="num" value="<?php echo $num ?>" />
			<input class = button type= "submit" value= "Ok" /> 	 
		</form>
		<div id ="m" class="center"> <?php echo $msg; ?> </div>
	</body>
</html>