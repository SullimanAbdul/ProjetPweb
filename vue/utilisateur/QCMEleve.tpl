<!doctype html>
<html>
	<head>
		<meta charset="utf-8"> 
		<title>Accueil QCM Eleve</title>
		<link rel="stylesheet" type="text/css" href="./vue/styleCSS/QCMEleve.css"/>
		
	</head>
	<body>
		<img src="./vue/images/logoclean.png" alt="logo" width="150">
		<h1 style="padding-bottom:5%"> QCM
			<?php echo ($_SESSION['nomTheme']); ?>
		</h1>
		
		<nav>
			<?php require ("vue/menu_eleve.tpl");?>
		</nav>
		
		<div id="main">
			<table>
				<?php
					echo("<form method ='post' action = 'index.php?controle=GestionRep&action=gererRep'  >");
					foreach($listeQ as $q){
						echo("<tr>");
						echo("<td>".$q['texte']."</td>");
						$listeR = listeRep($q['id_quest']);
						foreach($listeR as $r){
							if($q['bmultiple']==0){
								echo("<td> 
									<input  type='radio' name=".$r['id_quest']." value=".$r['id_rep'].">".utf8_encode($r['texte_rep'])."</input></td>");
							}else{
								echo("<td> 
									<input  type='checkbox' name=".$r['id_quest']." value=".$r['id_rep'].">".utf8_encode($r['texte_rep'])."</input></td>");
							}
						}
						echo("</tr>");
					}
					echo("<input  type='submit' name='envoyerRep' value='Valider'>");
					echo("</form>");
					
					
				?>
			</table>
		</div>
	</body>
</html>
