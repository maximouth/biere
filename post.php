<?php

include "controleSaisies.php";
include "formulaire.php";

$type = saisie_fiable($_POST, 'type','',false);
$couleur = saisie_fiable($_POST, 'couleur', '', false);
$auteur = saisie_fiable($_POST, 'auteur', '', false);
$biere = saisie_fiable($_POST, 'biere', '', false);
$recette = saisie_fiable($_POST, 'recette', '', false);

if (!$type OR !$couleur OR !$auteur OR !$biere OR !$recette ) {
  if (!$recette) {
    echo formulaire ();
  }
  else {
    echo formulaire2 ($_POST['recette']);
  }
}

else {
  $file = fopen ($_POST['type']."/".$_POST['$couleur']."/".$_POST['$auteur']."_".$_POST['biere'].".txt" , 'a+');

  fputs ($file, htmlspecilchar($recette));  

  flose ($file);

  echo "<h1>formulaire plein  </h1>";
}


?>
