<?php
	echo ("<div class = 'contenu'>");
	echo ("<h2 value =".$choix."> Matière : ".$choix."</h2>");
	require("Modele/connectBD.php"); 
	$s = "select *  from test t where t.titre_test = '%s'";
	$r = sprintf($s,$choix);
	$re = mysqli_query($link, $r)	
	or die (utf8_encode("erreur de requête : ") . $r); 
	if (mysqli_num_rows ($re) == 0) {
		echo("r"); //"pas de test";
	}else{
		$C=array();
		while ($c = mysqli_fetch_assoc($re) and isset($c)) {
			//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
			$C[] = $c; //stockage des enregistrements dans $C
			}
			foreach($C as $z){
				echo ("<h2 value =".$z['num_grpe'].">Groupe : ".$z['num_grpe']."</h2>"); // utf8_encode($c['nom']) si nécessaire
				$_SESSION['num_grpe']=$z['num_grpe'];
				$_SESSION['id_test']=$z['id_test'];
			}
		}		
		$s = "select t.titre_theme  from theme t where t.Nom_Test = '%s'";
		$r = sprintf($s,$choix);
		$re = mysqli_query($link, $r)	
		or die (utf8_encode("erreur de requête : ") . $r); 
		if (mysqli_num_rows ($re) == 0) {
			echo("r"); //"pas de test";
		}
		else{
			$C=array();
			while ($c = mysqli_fetch_assoc($re) and isset($c)) {
				//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
				$C[] = $c; //stockage des enregistrements dans $C
			}
			foreach($C as $z){
				echo ("<h2 value =".$z['titre_theme'].">Thème : ".utf8_encode($z['titre_theme'])."</h2>"); 
				$_SESSION['nomTheme']=$z['titre_theme'];
			}
		}
	echo ("</div>");
?>