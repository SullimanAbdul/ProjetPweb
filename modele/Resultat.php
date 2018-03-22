<?php 
	function getidEtu(){
				require("modele/connectBD.php");
		$select = "select e.id_etu from etudiant e where e.num_grpe = '%s' ";
		$req = sprintf($select,$_SESSION['num_grpe']);
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
			foreach($C as $etu){
				MettreNote($etu['id_etu']);
			}
			
		}
	}
	
	function MettreNote($ide){
		require("modele/connectBD.php");
		$sql="select count(r.points) as c, id_etu  from resultat r where r.points = 1 and r.id_test ='%s' and id_etu = '%s'";
		$req = sprintf($sql,$_SESSION['id_test'],$ide);
		$res = mysqli_query($link, $req)	
			or die (utf8_encode("erreur de requête : ") . $req); 
		if (mysqli_num_rows ($res) == 0) {
			return false;		
		}else{
			$E = array();
			while ($e = mysqli_fetch_assoc($res) and isset($e)) {
				//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
				$E[] = $e; //stockage des enregistrements dans $C
			}
			
			foreach($E as $r){
				if($ide == $r['id_etu']){
					$sql="insert into bilan (id_etu, id_test, note_test) values (".$ide.",".$_SESSION['id_test'].",".$r['c'].")";
					if ($link->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $link->error;
					}
				}else {
					$sql="insert into bilan (id_etu, id_test, note_test) values (".$ide.",".$_SESSION['id_test'].",'ABS')";
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