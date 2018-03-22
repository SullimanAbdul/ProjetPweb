<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil Eleve</title>
		<link rel="stylesheet" href="./vue/styleCSS/utilisateurEleve.css"/>
	</head>
	<body>
		
		<h1 style="padding-bottom:5%"> Bienvenue 
			<?php echo ($_SESSION['profil']['prenom'] . " " . $_SESSION['profil']['nom']); ?>
		</h1>
		
		<nav>
			<?php require ("vue/menu_eleve.tpl");?>
		</nav>
		
		<div class="contenu">
			<h3>Il n'y a pas de test en cours</h3>
		</div>
	</body>
</html>
