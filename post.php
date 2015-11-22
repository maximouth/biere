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


    ///**** ICI ****///
    $file = fopen ("test.txt", 'c');
    if (!$file) {
      echo "<h1>ouverture ratée</h1>";
    }


    //.$_POST['type']."/".$_POST['couleur']."/".$_POST['auteur']."_".$_POST['biere'], 'a+');

  
  if (fwrite ($file, 'test') === false) {
      echo "<h1>ecriture ratée</h1>";
  }

  fwrite ($file, htmlspecilchar($_POST['recette']));  

  flose ($file);

    echo "<div class=pres>";
    echo "<h1>recette soumise</h1>";
    echo "</div></body></html>";

 
}


?>
