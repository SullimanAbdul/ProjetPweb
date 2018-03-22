<?php
	function listeRep($idq){
		require ("Modele/connectBD.php"); 
		$select = "select * from reponse r where r.id_quest = '%s' ";
		$req = sprintf($select,$idq);
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
	
	function verifRep($idr){
		require ("Modele/connectBD.php"); 
		$s = "select r.id_quest from reponse r where r.id_rep ='%s'";
		$re = sprintf($s,$idr);
		$res = mysqli_query($link, $re)	
		or die (utf8_encode("erreur de requête : ") . $re); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de test";
		}
		else {
			$quest = array();
			while ($q = mysqli_fetch_assoc($res) and isset($q)) {
				//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
				$quest[] = $q; //stockage des enregistrements dans $C
			}
			
			foreach($quest as $b){
				$value= $b['id_quest'];
			}
		}
		
		$select = "select id_rep, id_quest from reponse r where r.bvalide = 1 and id_quest='%s'";
		$req = sprintf($select,$value);
		$resu = mysqli_query($link, $req)	
			or die (utf8_encode("erreur de requête : ") . $req); 	
		if (mysqli_num_rows ($resu) == 0) {
			return false; //"pas de test";
		}
		else {
			
			$rep = array();
			while ($c = mysqli_fetch_assoc($resu) and isset($c)) {
				//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
				$rep[] = $c; //stockage des enregistrements dans $C
			}
			
			foreach($rep as $r){
			
				if($r['id_rep']==$idr){
					$sql="INSERT INTO resultat (id_etu, id_quest,id_test, points) VALUES (".$_SESSION['profil']['id_etu'].",".$r['id_quest'].",".$_SESSION['id_test'].",1)";
					if ($link->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $link->error;
					}
				}else{
					$sql="INSERT INTO resultat (id_etu, id_quest,id_test, points) VALUES (".$_SESSION['profil']['id_etu'].",".$r['id_quest'].",".$_SESSION['id_test'].",0)";
					if ($link->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $link->error;
					}
				}
			}
		}
	}
?>