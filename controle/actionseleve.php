<?php
	function rejoindreAccueil(){
		
		$ide=$_SESSION['profil']['id_etu'];
		/*if(savoirTest($ide) ==true){
			require("vue/utilisateur/accueileleve.tpl");
		}else{
			require("vue/utilisateur/accueileleveVide.tpl");	
		}*/
		if(empty($_SESSION['num_grpe'])){
			require("vue/utilisateur/accueileleveVide.tpl");
		}
		else {
			if($_SESSION['num_grpe']==$_SESSION['profil']['num_grpe']){
				require("vue/utilisateur/accueileleve.tpl");
			}
			else{
				require("vue/utilisateur/accueileleveVide.tpl");
				}
		}
	}
	function AccederTest(){
		$_SESSION['score']=0;
		require("modele/ChoisirQuest.php"); 
		$nomtheme = $_SESSION['nomTheme'];
		$listeQ= listeQuest($nomtheme);
		require("modele/reponse.php");
		$listeR = array();
		require("vue/utilisateur/QCMEleve.tpl");
	}







?>