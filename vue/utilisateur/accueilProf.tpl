<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil Professeur</title>
		<link rel="stylesheet" type="text/css" href="./vue/styleCSS/utilisateur.css"/>
		
	</head>
	<body>
		<img src="./vue/images/logoclean.png" alt="logo" width="150">
		<h1 style="padding-bottom:5%"> Bienvenue 
			<?php echo ($_SESSION['profil']['prenom'] . " " . $_SESSION['profil']['nom'] . "."); ?>
		</h1>
		
		<nav>
			<?php require ("vue/menu_prof.tpl");?>
		</nav>
		
		<div id="main">
			
			<!--<form method="post">
				<select name="list">
					<option value="a">Thème</option>
					<option value="b">Auteur</option>
					<option value="c">Titre</option>
				</select>
				
			</form>-->
			
			<?php
				$choix="";
				echo ("<h3> Sessions :</h3>");
				echo("<FORM method = 'post'>");
				echo("<SELECT name='liste_sessions' size='1'>");
				echo("<OPTION ></OPTION>");
				foreach($Contact as $C){
					echo ("<OPTION value =".$C['titre_test'].">" . $C['titre_test']."</OPTION>"); // utf8_encode($c['nom']) si nécessaire
				}
				echo("</SELECT>");
				echo("<input type='submit' value='Ok' name='ok'/>");
				echo("</FORM>")	;
				if (isset($_POST['liste_sessions'])){
					$choix=$_POST['liste_sessions'];
				
					if($choix<>""){
						require("/modele/Afficher_Infotest.php");
						echo("<FORM method= 'post' action = 'index.php?controle=actionsprof&action=lancerTest'>
								<input type='submit' value='lancerTest' name='LancerTest'/>
								</FORM>	");
					}
				}
				
			?>
			
		</div>
	</body>
</html>
