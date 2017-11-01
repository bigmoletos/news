<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$bdd = "cafe";
$utilisateur = "root";
$motdepasse = "root";
$serveur = "localhost";
$driver = "mysql:host=$serveur;dbname=$bdd";

//$connexion=new PDO($driver, $utilisateur, $motdepasse);
try {

//   $connexion=new PDO('mysql:host=$serveur;dbname=$bdd',$login,$pass);
    $connexion = new PDO($driver, $utilisateur, $motdepasse);
    $connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "connection réussie";
} catch (Exception $e) 
    {
    echo "connection à mysql impossible", $e->getMessage();
//    var_dump($e);
    die();
//    autre possiblite mettre le die devant il affichera le message comme le echo
//    die ("connection à mysql impossible", $e->getMessage());
    }

$select = $connexion->query("SELECT * FROM comprend");


//affichage des données de notre table
$select->setfetchMode(PDO::FETCH_OBJ);
var_dump($select);


//PDO::FETCH ASSOC : retourne chaque ligne dans un tableau
//indexé par les noms des colonnes comme elles sont retournées
//dans le jeu de r ´ esultats correspondant.
//PDO::FETCH NUM : retourne chaque ligne dans un tableau indexé
//par le numéro des colonnes en commenc¸ant `a 0.
//PDO::FETCH BOTH : retourne chaque ligne dans un tableau
//indexé par les noms des colonnes ainsi que leurs numéros, en
//commenc¸ant `a 0.
//PDO::FETCH OBJ : retourne chaque ligne dans un objet avec les
//noms de propri ´ et és correspondant aux noms des colonnes
//comme elles sont retournées dans le jeu de r ´ esultats.
//PDO::FETCH CLASS ou PDO::FETCH CLASSTYPE : retourne
//une nouvelle instance de la classe demandée, liant les colonnes
//aux propri ´ et és nommées dans la classe.


//PDO::beginTransaction — Démarre une transaction
//PDO::commit — Valide une transaction
//PDO::__construct — Crée une instance PDO qui représente une connexion à la base
//PDO::errorCode — Retourne le SQLSTATE associé avec la dernière opération sur la base de données
//PDO::errorInfo — Retourne les informations associées à l'erreur lors de la dernière opération sur la base de données
//PDO::exec — Exécute une requête SQL et retourne le nombre de lignes affectées
//PDO::getAttribute — Récupère un attribut d'une connexion à une base de données
//PDO::getAvailableDrivers — Retourne la liste des pilotes PDO disponibles
//PDO::inTransaction — Vérifie si nous sommes dans une transaction
//PDO::lastInsertId — Retourne l'identifiant de la dernière ligne insérée ou la valeur d'une séquence
//PDO::prepare — Prépare une requête à l'exécution et retourne un objet
//PDO::query — Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
//PDO::quote — Protège une chaîne pour l'utiliser dans une requête SQL PDO
//PDO::rollBack — Annule une transaction
//PDO::setAttribute — Configure un attribut PDO


//PDOStatement::bindColumn — Lie une colonne à une variable PHP
//PDOStatement::bindParam — Lie un paramètre à un nom de variable spécifique
//PDOStatement::bindValue — Associe une valeur à un paramètre
//PDOStatement::closeCursor — Ferme le curseur, permettant à la requête d'être de nouveau exécutée
//PDOStatement::columnCount — Retourne le nombre de colonnes dans le jeu de résultats
//PDOStatement::debugDumpParams — Détaille une commande préparée SQL
//PDOStatement::errorCode — Récupère les informations sur l'erreur associée lors de la dernière opération sur la requête
//PDOStatement::errorInfo — Récupère les informations sur l'erreur associée lors de la dernière opération sur la requête
//PDOStatement::execute — Exécute une requête préparée
//PDOStatement::fetch — Récupère la ligne suivante d'un jeu de résultats PDO
//PDOStatement::fetchAll — Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
//PDOStatement::fetchColumn — Retourne une colonne depuis la ligne suivante d'un jeu de résultats
//PDOStatement::fetchObject — Récupère la prochaine ligne et la retourne en tant qu'objet
//PDOStatement::getAttribute — Récupère un attribut de requête
//PDOStatement::getColumnMeta — Retourne les métadonnées pour une colonne d'un jeu de résultats
//PDOStatement::nextRowset — Avance à la prochaine ligne de résultats d'un gestionnaire de lignes de résultats multiples
//PDOStatement::rowCount — Retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()
//PDOStatement::setAttribute — Définit un attribut de requête
//PDOStatement::setFetchMode — Définit le mode de récupération par défaut pour cette requête





//modification des données de notre table


while ($enregistrement=$select->fetch())
        {
    //traitement des resultats en boucle
//    while ($enregistrement=$select->fetch())
        
//affichage des champs
        echo '<h1>', $enregistrement-> NUMFACTURE, ' ' ,$enregistrement->NUMCONS, ' ', $enregistrement->QTE,' <h1>';
}
try{
    $update=$connexion ->exec("UPDATE lestables SET NBPLACE=3 WHERE NUMTABLE=7");
}catch (Exception $ex){
    echo "erreur lors de la modif";
    }


//protection injection SQL
//BIT$nom connexion->quote($nom chaıne) : desactive les
//quotes inserées par l’utilisateur
//htmlspecialchars($nom chaıne) : élimine les < et >. Pour
//récuperer la chaˆıne d’origine on peut utiliser
//htmlspecialchars decode().
//strip tags($nom chaıne) : supprime les balises html et php
//stripcslashes : supprime les antislash d’une chaıne de
//caractère.
//htmlentities($nom chaıne) : remplace les ’ ” < > par leur
//code html (&lt ;...). Pour récup erer la chaˆıne d’origine on peut
//utiliser html entity decode().
//addcslashes() : ajoute des slashs devant des caract ères
//mentionnés d’une chaˆıne de caractère.

