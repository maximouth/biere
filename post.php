<?php

include "controleSaisies.php";
include "formulaire.php";
include "masque.php";

$type = saisie_fiable($_POST, 'type','',false);
$couleur = saisie_fiable($_POST, 'couleur', '', false);
$auteur = saisie_fiable($_POST, 'auteur', '', false);
$biere = saisie_fiable($_POST, 'biere', '', false);
$recette = saisie_fiable($_POST, 'recette', '', false);

if (!$type OR !$couleur OR !$auteur OR !$biere OR !$recette ) {
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

    //php -> sql
    // on se connecte à MySQL
    $db = mysql_connect("localhost", "root", "max@94");

    // on sélectionne la base
    mysql_select_db("recette",$db);
    
    // on crée la requête SQL ///**** pas encore de photo ****///
    $sql = "insert into recette (auteur,nom,recette,type,couleur,note) values ('".$_POST['auteur']."','".$_POST['biere']."','".nl2br(htmlspecialchars($_POST['recette']))."','".$_POST['type']."','".$_POST['couleur']."', '5');";
    
    // on envoie la requête
    $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error());    

    mysql_close ($db);
    
    echo "<div class=pres>";
    echo "<h1>recette soumise</h1>";
    echo "</div></body></html>";

 
}


?>
