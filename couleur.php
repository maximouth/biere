<?php
    include "masque.php";

    echo masque("liste recette");

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

      //php -> sql
    // on se connecte à MySQL
    $db = mysql_connect("localhost", "root", "max@94");

    // on sélectionne la base
    mysql_select_db("recette",$db);
    
    // on crée la requête SQL ///**** pas encore de photo ****///
    $sql = "select auteur, nom, note
            from recette
            where type = '$type' and couleur = '$coul'
            ;" ;
    
    // on envoie la requête
    $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error());    

    while ($row = mysql_fetch_assoc($req)) {
      $ret .= "<li><div class=liste> <a href='recette.php?nom=".$row['nom']."&type=".$type."&coul=".$coul."'>- ".$row['auteur'].", ".$row['nom'].", ".$row['note']."   <img src='icone.png'><img src='icone.png'><img src='icone.png'><img src='icone.png'><img src='icone.png'> </a>
             </div></li>\n";
    }
    mysql_close ($db);
    return $ret;
}

echo "<h2 class=couleur> la liste des recettes de bieres $couleur </h2>";

echo "<ol>";
echo liredoss ($type, $couleur);
echo "</ol>";

?>