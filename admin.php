<?php
require('chargeurClass.php');
require('connexionBDR.php');
$db = connexionDB();
$manager = new NewsManager($db);
//var_dump($manager);
$change='lire';
$id=1;



//fonction qui se charge d'afficher toutes les news de la bdr en version courte
    function afficheNewsCourte($manager){
        //la variable tableau stocke la liste des données passées par la fonction liste du manager
         $listeNews=$manager->getList();
         // $id=$_GET['id'];
        //     echo ' <table>';    
          
         foreach ($listeNews as  $value) {
           //conversion des dates  au format europeen
          // $dateM= new DateTime($value->getDate_ajout());
             $dateA = $value->getDate_ajout();
         // $dateA= new DateTime($dateA);
           var_dump($dateA);
          // $dateM= new DateTime($value->getDate_modif());
           $dateM= $value->getDate_modif();
           
           $dateM= new DateTime( $dateM);
           var_dump($dateM);
           $nomImageCourt=  str_replace("image/", "", $value->getImage());
           echo' 
                <tr><td>'.$value->getId().'</td>
                <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id='.$value->getId().'&change=lire">'.$value->getTitre().'</a></td>
                <td>'.$value->getAuteur().'</td>
                <td>'.substr($value->getContenu(), 0 , 50 ).'.....</td>
                <td>'. $dateA->format('d-M-Y à H\hi').'</td>
                <td>'.$dateM->format('d-M-Y à H\hi').'</td>
                <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id='.$value->getId().'&change=image">'.$nomImageCourt.'</a></td>    
                <td> <img src="'.$value->getImage().'" alt="image1" style="width:100px ;height:100px;" /></td>
                <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id='.$value->getId().'&change=modifier">modifier</a></td>
                <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id='.$value->getId().'&change=supprimer">supprimer</a></td>
                </tr>';
                   }
       }
    
//fonction pour supprimer une news
function afficheNewsDel($manager){
    
     
    
}

//fonction pour modifer une news, l'ajoute (INSERT TO)
// avec save() si elle n'existe pas deja ou l'a modifie (UPDATE) avec update() si elle existe deja
function saveUpdate($manager)
{
    //!isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
    //$modif=$manager->Save(News $news); 
     if(isset($_POST['modifierNews'])){
        if(isset($_POST['titre']) && isset( $_POST['auteur']) && isset($_POST['contenu']) && isset($_POST['listeImages']) )
        {
            //affectation des variables du formulaire  modifierNews
            $id=$_POST['id'];//le fomulaire etant hidden sur l'id il devrait toujors etre !isset
         //  $id=3;
            $titre=$_POST['titre'];
            $auteur=$_POST['auteur'];
            $contenu=$_POST['contenu'];       
            $image=$_POST['listeImages'];
            //creation d'un objet tableau $news de la classe News avec les données du formulaire,
            // les index correspondent aux noms des attributs de la classe news
           $news = new News(
                               array(
                               'auteur' => $auteur,
                               'titre' => $titre,
                               'contenu' => $contenu,
                               'image' =>$image
                               )
                            );
         //on verifie l'id du post pour savoir si il existe deja dans la bdr
//           if (isset($_POST['id'])) 
//               {
                $news->setId($_POST['id']);
                
//               }
           //setter de l'id de la classe news    
           //public function setId($id) {
           //        $this->id = (int) $id;

           if ($news->isValid()) 
               {
                    $manager->save($news);
                    $message = $news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !';
               } else {
                   //$erreurs = $news->erreurs();
                  // echo "erreur dans le traitement";
                   }
            var_dump($id); 
            var_dump($image);
            var_dump($contenu);
            var_dump($titre);
            var_dump($auteur);
       }
     }  // echo "vous avez oublié de remplir un champ";
} 
 
 
   echo saveUpdate($manager); 
    
    


//***************************************

         //fonction pour afficher l'id quand on clique sur modifier
          function id($manager){
                 !isset($_GET['id']) ? $id=10:  $id=$_GET['id'];// ternaire
                  $news=$manager->Load($id);
                  $id= $news->getId();
                   var_dump($id);
                  // echo $auteur;
                //  return $id;
         }
         // echo id($manager);
          //var_dump($id);
        //fonction pour afficher l'auteur quand on clique sur modifier
          function auteur($manager){
                 !isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
                  $news=$manager->Load($id);
                  $auteur= $news->getAuteur();
                  //  var_dump($auteur);
                  // echo $auteur;
                  return $auteur;
         }
         //fonction pour afficher le titre quand on clique sur modifier
          function titre($manager){
                 !isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
                  $news=$manager->Load($id);
                  $titre= $news->getTitre();
                  //  var_dump($titre);
                  // echo $titre;
                  return $titre;
         }
          //fonction pour afficher le contenu quand on clique sur modifier
          function contenu($manager){
                 !isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
                  $news=$manager->Load($id);
                  $contenu= $news->getContenu();
                  //  var_dump($contenu);
                  // echo $contenu;
                  return $contenu;
         }

          //fonction pour afficher le lien de l'image de la bdr quand on clique sur modifier
          function image($manager){
                 !isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
                 $news=$manager->Load($id);
                  $image= $news->getImage();
                  //var_dump($image);
                  $nomcourt=str_replace("image/","",$image);
                   //var_dump($nomcourt);
                 echo'<figure>'
                            . '<img src="'.$image.'" alt="'.$nomcourt.'"  style="width:200px ;height:200px;" />'
                             . '<figcaption>"'.$nomcourt.'"</figcaption>'
                      . '</figure>';
                 // echo $image;
                 
         }
 
//****************
         // function menu deroulant simple selection pour le choix des images à inserer
         function menuDeroulantImage()
    {
        //début du menu déroulant
        
         !isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
        $select = "<p>Liste des Images<br /><select name=\"listeImages\" id=\"listeImages\" size=\"4\">";
        //liste les fichiers jpg du repertoire image/
        $listeImages = glob("image/*.jpg");
        //$nomImageCourt=  str_replace("image/", "", $value->getImage());
        //trie le tableau $listeImages par string
        sort($listeImages,SORT_STRING);
        //echo '<br>'; print_r ($listeImages);
        //boucle pour afficher toues les images contenues dans le repertoire images
            foreach ($listeImages as $fichier) {
               
                //recuperation du nom de l'image en enlevant le nom du chemin
                $nomImage=str_replace("image/","",$fichier);
                //construction menu déroulant 
                 $select .= "<option value=\"' .$nomImage. '\" id=\"$id\" >$nomImage</option>";
               // $select .= "<option value=\"' .$nomImage. '\" id=\"$_GET\['id'\]\" >$nomImage</option>";
                //var_dump($nomImage);
            } 
        $select .= "</select></p>"; //fin menu déroulant
        return $select;
        //var_dump($nomImage);
   }
      
   
//   affichage de l'image selcetionnée
   if(isset($_POST['modifierNews'])){ 
        if(isset($_POST['titre']) && isset( $_POST['auteur']) && isset($_POST['contenu']) && isset($_POST['listeImages']) ){
             $imageSelectionné=$_POST['listeImages'];
             $imageSelectionné=  str_replace("'","", $imageSelectionné) ; 
             $imageSelectionné=  str_replace(" .","", $imageSelectionné) ;
             $imageSelectionné=  str_replace(". ","", $imageSelectionné) ; 
             $imageSelectionné=  "image/".$imageSelectionné ; 
         //var_dump($imageSelectionné);
        }echo"vous avez oublié de remplir un champ";
   }
//****************

   
//         ****************
//var_dump($nomImage);
//var_dump($image);
 //echo '<br />'.auteur($manager);
//var_dump($auteur);
//var_dump($id);

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>page administrateur</title>
    </head>
    <body>
        
   <?php // echo "<a href=\"http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id=1&change=lire\"></a>" ; ?>    
         
<!--        
        affiche un tableau avec la liste des news avec la possibilite de les modifier, 
        afficher et supprimer ou d'ajouter une nouvelle news
lors  dela modification il faudra pre-remplir le formulaire avec les données
correspondant à l'id de la news selectionnée par le bouton modifier-->

<h1>liste des news</h1>  
<form method="post" action="admin.php" name="formAdministrateur">
    <table border="6">
        <tr><th>id</th>
            <th>titre</th>
            <th>auteur</th>
            <th>contenu</th>
            <th>date_ajout</th>
            <th>date_modif</th>
            <th>Image</th>
            <th>photo</th>
            <th>modifier</th>
            <th>supprimer </th>
      </tr>
        <?php  //$change= htmlspecialchars($_GET['change']);
//        if ($change='modifier'){
//        echo afficheNewsModif($manager);
//        }
//        if ($change='supprimer'){
//        echo afficheNewsDel($manager);
//        }
       // affiche le tableau principal avec la liste des news
        echo afficheNewsCourte($manager);
        ?>
    </table>

<!--champs de saisie des news-->
    <!--saisie de l'id, quand on clique sur modifier on renseigne l'id sinon il est vide-->
    <p>id de la news à modifier : <?php echo id($manager) ?></p>
       
         <input type="hidden" name="id" id="id"  
               value="<?php echo isset($_GET['change']) && $_GET['change']=='modifier' ?  id($manager) : ""; ?>">
        <br />
    <!--saisie du titre-->
        <label for="titre">votre titre</label>
        <input type="text" name="titre" id="titre" placeholder="ex: Les nymphes" 
               value="<?php echo isset($_GET['change']) && $_GET['change']=='modifier' ?  titre($manager) : ""; ?>" 
               maxlength="20" size="30">
    <!--saisie de l'auteur-->
        <br />
        <label for="auteur">votre nom</label>
        <input type="text" name="auteur" id="auteur" placeholder="ex: Alain Thiers" 
               value="<?php echo isset($_GET['change']) && $_GET['change']=='modifier' ? auteur($manager): ""; ?>" 
               maxlength="20" size="30">
     <!--saisie du contenu-->
        <br />
        <label for="contenu">votre contenu</label>
        <textarea name="contenu" id="contenu"  rows="8" cols="100" placeholder="ex: Il était une fois..........." >
           <?php echo isset($_GET['change']) && $_GET['change']=='modifier' ? contenu($manager): "";//ternaire le champ se remplit si change=modifer et si modifier est set ?>
        </textarea>

<!--<br />
<label for="image">image à integrer</label>
<input type="text" name="image" id="image" placeholder="\image\image1.jpg" 
       value="<?php //echo isset($_GET['change']) && $_GET['change']=='modifier' ? image($manager): ""; ?>" 
       maxlength="200" size="110">-->

    <!--<br /> affiche le menu déroulant pour choisir l'image-->
   <p> <?php echo menuDeroulantImage(); ?>
    
     <!--affiche l'image correspond à l'image seelctionnée dans le menu deroulant-->
    <img src="<?php echo isset($_POST['modifierNews'])? $imageSelectionné : "image/image1.jpg"; ?>" alt="image" style="width:100px ;height:100px;" />
   </p>
   
    <!--bouton de validation d'une modif ou d'une nouvelle news-->
    <input type="submit" name="modifierNews" id="modifierNews" value="valider modif" >

    <!--affiche l'image de la news quand on clique sur son nom-->
    <br />  <?php echo image($manager); ?>
   
    <!--affiche une image-->
    <p><img src="image/image1.jpg" alt="image1" style="width:100px ;height:100px;" /></p>

</form>


<a href="index.php?id=0&change=lire" >lien vers index</a>        
<br> 
         <?php //affiche la valeur de l'id et de change dans l'URL
        echo !isset($_GET['id']) ? "":'<br>id='. htmlspecialchars( $_GET['id']);
        echo !isset($_GET['id']) ? "":'<br>change='. htmlspecialchars($_GET['change']);
        ?>
    
    
    </body>
</html>
