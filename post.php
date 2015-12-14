<?php

include "controleSaisies.php";
include "formulaire.php";
include "masque.php";

$type = saisie_fiable($_POST, 'type','',false);
$couleur = saisie_fiable($_POST, 'couleur', '', false);
$auteur = saisie_fiable($_POST, 'auteur', '', false);
$biere = saisie_fiable($_POST, 'biere', '', false);
$recette = saisie_fiable($_POST, 'recette', '', false);

if (!$type OR !$couleur OR !$auteur OR !$biere OR !$recette OR !isset($_FILES['photo']) ) {
  if (!$recette) {
    echo masque('poster recette');
    echo "<div class=pres>";
    echo formulaire ();
    echo "</div></body></html>";
  }
  else {
    echo masque();
    echo "<div class=pres>";
    echo formulaire2 ($_POST['recette']);
    echo "</div></body></html>";
  }
}

else {

    echo masque();

$dossier = '/upload/';
$fichier = basename($_FILES['photo']['name']);
$taille_maxi = 1000000;
$taille = filesize($_FILES['photo']['tmp_name']);
$extensions = array('.png', '.bmp', '.jpg', '.jpeg');
$extension = strrchr($_FILES['photo']['name'], '.'); 
//Début des vérifications de sécurité...
//Si l'extension n'est pas dans le tableau
if(!in_array($extension, $extensions)) {
  $erreur = 'Vous devez uploader un fichier de type png, bmp, jpg, jpeg...';
}
if($taille>$taille_maxi) {
  $erreur = 'Le fichier est trop gros...';
}

//S'il n'y a pas d'erreur, on upload
if(!isset($erreur)) {
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     if(move_uploaded_file($_FILES['photo']['tmp_name'], "../" . $_POST['type'] . "/" . $_POST['couleur'] . "/" . $_POST['biere'])) {
       //  echo 'Upload effectué avec succès !';
    
    //php -> sql
    // on se connecte à MySQL
    $db = mysql_connect("localhost", "root", "max@94");

    // on sélectionne la base
    mysql_select_db("recette",$db);
    
    // on crée la requête SQL ///**** pas encore de photo ****///
    $sql = "insert into recette (auteur,nom,recette,type,couleur,note,nb) values ('".$_POST['auteur']."','".$_POST['biere']."','".nl2br(htmlspecialchars($_POST['recette']))."','".$_POST['type']."','".$_POST['couleur']."', '5', '1');";
    
    // on envoie la requête
    $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error());    

    mysql_close ($db);
    
    echo "<div class=pres>";
    echo "<h1>recette soumise</h1>";
    echo "</div></body></html>";
     }
     //Sinon (la fonction renvoie FALSE).
     else  {
       echo '<h1>Echec de l\'upload !</h1>';
     }
}
else {
  echo $erreur;
}
 
}


?>
