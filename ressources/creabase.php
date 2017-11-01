<?php
		$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="gestion_news";//mabddtest2";//nom dela base de données
		$table="news";//inscrit";//nom de la table
// nom des colonnes		
		$col1="id";//id";//"nb";
                $col2="titre";//id";//"nb";
		$col3="auteur";//prenom";//"id_inscrit";
		$col4="contenu";//nom";
		$col5="date_ajout";//"email";//"mail";
		$col6="date_modif";//"sexe";//"commentaires";
		$col7="image";//"age";//"tel portable";"numero client";
		$col8="";//rue";//"CP";
		$col9="";//ville";
		$col10="";//"pays";
		$col11="";//"CP";
		$col12="";
		
		
		try{
			$connexion=new PDO("mysql:host=$serveur;dbname=$bdd",$login,$pass);
			$connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//permet de lire les erreurs
		
///////////////////////////////////////////////////////////////////////
// pour creer une nouvelle base on retire le nom de base 
// !!!!    il y a bien un ;apres serveur, ne pas mettre d'espace dans le $col3 du serveur
// PDO(nom serveur;nom de la BDD,login,mot de passe)
// afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations 
// sensibles soient divlguées
// on va refaire une verification avec un TRY et CATCH de controle d'erreur
	
// ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
// par convention on ecrit en Maj dans SQL		
// respecter l'ordre de la base de donnée pour les tables, pour cela on peut aller voir dans 
// myAdmin pour verifier l'ordre
// pour plus de lisibilité on passe par une variable pour inserer le code SQL.			

		
///////////////////////////////			
	// echo'<strong>on commence par créer de la table  </strong>';		
/////////////////////////		
		 $codesql = "CREATE TABLE $table(
		 $col1 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		 $col2 VARCHAR(50),
		 $col3 VARCHAR(50),
		 $col4 TEXT,
                 $col5 DATETIME,
                 $col6 DATETIME,
                 $col7 TEXT
		
		 )";
		 $connexion->exec($codesql);
		
		 echo 'table de la base de données créée ';
                 
                 
                 }

		catch(PDOException $e){
		echo'Echec de la base de donnée '.$e->$getMessage();
	
		}

		
                 
                 
                 
                 
                 
                 ?>
