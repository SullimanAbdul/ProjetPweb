<?php 
	/*controleur selectUser.php :
		fonctions-action de selection des utilisateurs
	*/
	function ident() {
		$nom=isset($_POST['nom'])?trim($_POST['nom']):'';
		$num=isset($_POST['num'])?trim($_POST['num']):'';
		$msg="";
		$table="";
		require ("./modele/utilisateurBD.php");
		
		if (count($_POST)==0)
		require("vue/utilisateur/ident.tpl");
		else {
			$table="professeur";
			if (verifS_ident($nom, $num, $err) && verif_bd($nom, $num, $profil, $table)) {
				
				$_SESSION['profil'] = $profil;
				$nexturl = "index.php?controle=actionsprof&action=afficherTest";
				header ("Location:" . $nexturl);
			}
			else {
				$table="etudiant";
				if (verifS_ident($nom, $num, $err) && verif_bd($nom, $num, $profil, $table)) {
					//echo ('<br />PROFIL : <pre>'); print_r ($profil); echo ('</pre><br />'); die("ident");
					//session_start(); //fait dans index
					$_SESSION['profil'] = $profil;
					$nexturl = "index.php?controle=actionseleve&action=rejoindreAccueil";
					header ("Location:" . $nexturl);
				}
				else{
					$msg = $err;
					require("vue/utilisateur/ident.tpl");
				}
			}
		}
	}
	
	
	// vérification syntaxique des saisies
	// nom : composé de caractères alphanumériques et du tiret, chaîne non vide de 30 caractères maximum
	// num : composé de caractères alphanumériques, à raison de 6 à 8 caractères
	// En cas d'erreur, une information sur l'erreur est retournée dans $err 
	function verifS_ident($nom, $num, &$err) {
		if (!preg_match("`^[[:alpha:][:digit:]\-]{1,30}$`", $nom)) {
			$err = 'Identifiant ou mot de passe incorrect.';
			return false;
		}
		if (!preg_match("`^[[:alpha:][:digit:]]{2,16}$`", $num)) {
			$err = 'Identifiant ou mot de passe incorrect.';
			return false;
		}
		return true;
	} 
?>	