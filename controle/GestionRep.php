<?php 
	function gererRep(){
		require("modele/reponse.php");
		for($i = 1;$i<= 5;$i++){
			if(isset($_POST[$i])){
				verifRep($_POST[$i]);
			}
		}
	}
	function gererResultat(){
		require("modele/Resultat.php");
		getidEtu();
		//require("vue/utilisateur/fintest.tpl");
	}

?>