<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil Eleve</title>
		<link rel="stylesheet" href="./vue/styleCSS/utilisateurEleve.css"/>
	</head>
	<body>
		<img src="./vue/images/logoclean.png" alt="logo" width="150">
		<h1 style="padding-bottom:5%"> Bienvenue 
			<?php echo ($_SESSION['profil']['prenom'] . " " . $_SESSION['profil']['nom']); ?>
		</h1>
		
		<nav>
			<?php require ("vue/menu_eleve.tpl");?>
		</nav>
			<div id="main">
				<h2>Test en cours : </h2>
				<?php
				echo("<form method = 'post' action ='index.php?controle=actionseleve&action=AccederTest'>
						<input type='submit' value='rejoindreTest' name='rejoindreTest'/>	
					</form>");
				?>
			</div>
	</body>
</html>
