<?php
	/*Fonctions-modèle réalisant les requètes de gestion des utilisateurs en base de données*/
	
	// verif_bd : fonction booléenne. 
	// Si vraie, alors le profil de l'utilisateur est affecté en sortie à $profil
	$pass="pass_";
	function verif_bd($nom,$num,&$profil, $table ) {
		
		require ("modele/connectBD.php") ; //connexion $link à MYSQL et sélection de la base
		if($table == "professeur"){
			$pass="pass_prof";
		}else{
			$pass="pass_etu";
		}
		$select= "select * from %s where nom='%s' and %s='%s'"; 
		$req = sprintf($select,$table,$nom,$pass,$num);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) > 0) {
			$profil = mysqli_fetch_assoc($res);
			/*
				echo ('<br /> dans verif_bd : <br /><pre>'); 
				print_r ($profil); 
				echo ('</pre><br />'); 
			*/
			return true;
		} 
		else {
			$profil = null;
			return false;
		}
	}
?>