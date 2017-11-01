<?php
		session_start();
		//import_request_variables('p', 'p_'); //importe toutes les valeurs des des GET/POST/Cookie

                include_once 'chargeurClass.php';               
                
                
                
                function connection(){
	$file=fopen("fichieres/identification.*", "r");
	$ok = false;
	while($line=fgets($file)){
		//echo $line;
		//for($i=0;$i<str_word_count($line);$i++){
			$tab= explode(";",$line);
			if ($tab[0] == $_POST["username"] && $tab[1] == $_POST["password"] ){
				$ok = true;
                                break;
                        }
                        
		//}	
		echo  "<br/>";
	}
	fclose($file);
	if ($ok){
		echo "Bonjour " . $_POST["username"] . " " . $_POST["password"] . " <br/> ";

		$_SESSION['username'] = $_POST["username"];
		$_SESSION['password'] = $_POST["password"];

		echo '<a href="page.php">ajout d\'un nouvel utilisateur</a>';


	}
	else
		echo "nom ou mot de passe erroné(s)";
}
?>


<html>

<head>
	<meta charset="utf-8">     
    <title>authentification</title>
</head>
<body>

<?php
	connection();
	
?>
	
</body>

</html>

