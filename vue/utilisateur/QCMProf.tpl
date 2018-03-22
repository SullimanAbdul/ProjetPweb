<!doctype html>
<html>
	<head>
		<meta charset="utf-8"> 
		<title>Accueil QCM Professeur</title>
		<link rel="stylesheet" type="text/css" href="./vue/styleCSS/QCMProf.css"/>
		
	</head>
	<body>
		<img src="./vue/images/logoclean.png" alt="logo" width="150">
		<h1 style="padding-bottom:5%"> QCM
			<?php echo ($_SESSION['nomTheme']); ?>
		</h1>
		
		<nav>
			<?php require ("vue/menu_prof.tpl");?>
		</nav>
		
		<div id="main">
			<table>
				<?php
					foreach($listeQ as $q){
						echo("<tr>");
						echo("<td>".$q['texte']."</td>");
						
						echo("</tr>");
					}
				?>
			</table>
			<?php
				echo("<form method ='post' action = 'index.php?controle=GestionRep&action=gererResultat'>
						   <input type='submit' name = 'fintest' value = 'Fin du Test'></input>
					   </form>");
			
			
			
			?>
		</div>
	</body>
</html>
