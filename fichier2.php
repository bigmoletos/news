<?php

		$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="location";//nom dela base de données
		$table="inscrit";//nom de la table
// nom des colonnes		
		$col1="id";//"nb";
		$col2="prenom";//"id_inscrit";
		$col3="nom";
		$col4="email";//"mail";
		$col5="sexe";//"commentaires";
		$col6="age";//"tel portable";"numero client";
		$col7="rue";//"CP";
		$col8="ville";
		$col8="pays";
		$col9="CP";
		$col10="";
		
		
try{
        $connexion=new PDO("mysql:host=$serveur;dbname=$bdd",$login,$pass);
        $connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
  catch (Exception $e) {
    echo "connection à mysql impossible", $e->getMessage();
//    var_dump($e);
    die();
//    autre possiblite mettre le die devant il affichera le message comme le echo
//    die ("connection à mysql impossible", $e->getMessage());
    }
?>