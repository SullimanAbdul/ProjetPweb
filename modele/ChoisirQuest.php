<?php
function listeQuest($nomtheme){
	require("modele/connectBD.php");
		$select="select t.id_theme from theme t where t.titre_theme ='%s'";
		$req = sprintf($select,$nomtheme);
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
			foreach($C as $z){
				$value=$z['id_theme'];
			}
		}
		$select="select * from question q where q.id_theme ='%s'";
		$req = sprintf($select,$value);
		$res = mysqli_query($link, $req)
				or die (utf8_encode("erreur de requête : ") . $req); 
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de test";
		}
		else {
			$B = array();
			while ($c = mysqli_fetch_assoc($res) and isset($c)) {
				//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
				$B[] = $c; //stockage des enregistrements dans $C
			}			
		}
		return $B;
	}

?>