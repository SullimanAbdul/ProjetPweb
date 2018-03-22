<?php
	//dans ce fichier se trouve l'ensemble des actions possible par le prof
	function afficherTest(){
		require ("Modele/selectionnerTest.php") ; //connexion $link à MYSQL et sélection de la base
		$idn = (isset($_GET['id']))?$_GET['id']:$_SESSION['profil']['id_prof'];
		$Contact = listetest($idn);
		 
		require ("./vue/utilisateur/accueilProf.tpl");
	}
	
	function lancerTest(){
		require("modele/ChoisirQuest.php"); 
		$nomtheme = $_SESSION['nomTheme'];
		$listeQ= listeQuest($nomtheme);
		require("vue/utilisateur/QCMProf.tpl");
	}
	
?>