<?php

//fin de session de connexion
	function fin(){
		session_destroy();
		require("vue/utilisateur/deco.tpl");
	}
?>