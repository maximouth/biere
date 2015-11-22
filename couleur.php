<?php
    include "masque.php";

    echo masque();

$t = $_GET['type'];
$coul = $_GET['couleur'];
switch ($t) {
case 'c' :
  $type = 'conserve';
  break;
case 'e' :
  $type = 'extrait';
  break;
case 'g' :
  $type = 'grain';
  break;
}
switch ($coul) {
case 'blanche' :
  $couleur = 'blanche';
  break;
case 'blonde' :
  $couleur = 'blonde';
  break;
case 'brune' :
  $couleur = 'brune';
  break;
case 'stout' :
  $couleur = 'stout';
  break;
case 'ambree' :
  $couleur = 'ambree';
  break;
case 'autre' :
  $couleur = 'autre';
  break;
}

function liredoss($type, $coul) {
    $files = scandir($type."/".$coul);
    array_shift ($files);
    array_shift ($files);
    $ret = "";
  
    foreach ($files as $nom) {
      $ret .= "<li><div class=liste> <a href=''>- $nom  note  :  <img src='icone.png'><img src='icone.png'><img src='icone.png'><img src='icone.png'><img src='icone.png'> </a>
             </div></li>\n";
    }
    return $ret;
}

echo "<h2 class=couleur> la liste des recettes de bieres $couleur </h2>";

echo "<ol>";
echo liredoss ($type, $couleur);
echo "</ol>";

?>