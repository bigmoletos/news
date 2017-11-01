<!DOCTYPE html>
<!--1 Affichage des cinq premières news à l'accueil du site avec texte réduit à 200 caractères.
2 Possibilité de cliquer sur le titre de la news pour la lire entièrement. L'auteur et la date
d'ajout apparaîtront, ainsi que la date de modification si la news a été modifiée.
3 Un espace d'administration qui permettra d'ajouter / modifier / supprimer des news.
4 Ajouter une news : Dans l’espace administration, un formulaire doit permettre de créer une
nouvelle news.
5 Modifier / Supprimer une news : un tableau en-dessous listant les news doit être présent
dans l’administration avec des liens modifier / supprimer. Quand on clique sur « Modifier »,
le formulaire se pré-remplit.-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="formulaire.php" method="post">
            
            NOM <input type=text name="nom"><br>
            PRENOM <input type=text name="prenom"><br>
            ADRESSE <input type=text name="adresse"><br>
            <INPUT type=submit  value="cliquez ici">
        </form> 

        <form>  
            <input type="checkbox" name="case" checked="checked" />
            Aimez-vous les frites ?
            <input type="radio" name="frites" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
            <input type="radio" name="frites" value="non" id="non" /> <label for="non">Non</label>
        </form>

        <form method="post" action="http://www.monsite.com/cible.php">
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>
