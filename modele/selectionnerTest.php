<?php
	function listetest($idn){
		require ("Modele/connectBD.php"); 
		$select = "select t.titre_test  from test t where t.id_prof = '%s' ";
		$req = sprintf($select,$idn);
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de test";
		}
		else {
			$C = array();
			while ($c = mysqli_fetch_assoc($res) and isset($c)) {
				//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
				$C[] = $c; //stockage des enregistrements dans $C
			}			
			return $C;
		}
	}
	
	
?>