<?php
    include "masque.php"; 
    include 'erreur.php';


$t = htmlspecialchars($_GET['type']);
$coul = htmlspecialchars($_GET['couleur']);
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

if ($type != 'conserve' AND $type != 'extrait' AND $type != 'grain') {
  echo pageerreur();
  die();
}
if ($coul != 'blanche' AND $coul != 'blonde' AND $coul != 'brune' AND $coul != 'stout' AND $coul != 'ambree' AND $coul != 'autre' ) {
  echo pageerreur();
  die();
}

    echo masque("liste recette");

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
      $ret .= "<li><div class=liste> <a href='recette.php?nom=".$row['nom']."&type=".$type."&coul=".$coul."'>- ".$row['auteur'].", ".$row['nom'].", ".$row['note']."";

      //recuperer valeur de la note
      switch ($row['note']) {
      case 0 :
	$ret .= " <img src='choppe_vide.png'><img src='choppe_vide.png'><img src='choppe_vide.png'><img src='choppe_vide.png'><img src='choppe_vide.png'></div></li>\n";
	break;
      case 1 :
	$ret .= " <img src='choppe_pleine.png'><img src='choppe_vide.png'><img src='choppe_vide.png'><img src='choppe_vide.png'><img src='choppe_vide.png'></div></li>\n";
        break;
      case 2 :
	$ret .= " <img src='choppe_pleine.png'><img src='choppe_pleine.png'><img src='choppe_vide.png'><img src='choppe_vide.png'><img src='choppe_vide.png'></div></li>\n";
        break;
      case 3 :
	$ret .= " <img src='choppe_pleine.png'><img src='choppe_pleine.png'><img src='choppe_pleine.png'><img src='choppe_vide.png'><img src='choppe_vide.png'></div></li>\n";
	break;
      case 4 :
	$ret .= " <img src='choppe_pleine.png'><img src='choppe_pleine.png'><img src='choppe_pleine.png'><img src='choppe_pleine.png'><img src='choppe_vide.png'></div></li>\n";
        break;
      case 5 :
	$ret .= " <img src='choppe_pleine.png'><img src='choppe_pleine.png'><img src='choppe_pleine.png'><img src='choppe_pleine.png'><img src='choppe_pleine.png'></div></li>\n";
	break;
	
      }
    }
    mysql_close ($db);
    return $ret;
}

echo "<h2 class=couleur> la liste des recettes de bieres $couleur </h2>";

echo "<ol>";
echo liredoss ($type, $couleur);
echo "</ol>";

?>