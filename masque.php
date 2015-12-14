<?php
include "entete.php";
include "liste.php";


function masque ($nom) {
  
  $ret =  entete($nom);
  
  $ret .= "  <body>
  <div class=logo>
      <img src='logo3.png'>
  </div>


  <div class='recherche'>
      <form method='post' action=''>
          <label for='name'>recherche</label>
          <input type='text'name='recherche' placeholder='auteur' size='16' maxlength='16' />
      </form>
  </div>

  <div class=titre >"./* il manque un chevron, avec ca detruit la mise en page  */ "
      <h1>The Beer CookBook </h1
  </div>
  
  <div class=menu >
  <ul>
  <li><a href='menu.php'> accueil</a>  </li>".
  liste ( 'conserve', 'c').
  liste ( 'extrait', 'e').
  liste ( 'tout grain', 'g').
  "<li><a href='post.php'> poster une recette </a></li>
  <li><a href='recherche.php'>recherche</a></li>
  <li><a href='contact.php'> nous contacter </a></li>
</ul>
</div>
";

  if (isset ($_POST['recherche'])) {
    $rech = htmlspecialchars($_POST['recherche']);

      //php -> sql
    // on se connecte à MySQL
    $db = mysql_connect("localhost", "root", "max@94");

    // on sélectionne la base
    mysql_select_db("recette",$db);
    
    // on crée la requête SQL
    $sql = "select auteur, nom, note, couleur, type
            from recette
            where auteur = '$rech'
            ;" ;
    
    // on envoie la requête
    $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error());

    
    $ret .= "<div class='rech'><ol>";

    $cpt = 0;
    
    while ($row = mysql_fetch_assoc($req)) {
      $cpt++;
      
      $ret .= "<li><div class=liste> <a href='recette.php?nom=".$row['nom']."&type=".$row['type']."&coul=".$row['couleur']."'>- ".$row['auteur'].", ".$row['nom'].", ".$row['note']."";

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
    $ret .= "</ol></div>";

    if ($cpt == 0) {
      $ret .= "<h2> Aucun résultat trouvé pour la recherche : $rech</h2>";
    }

    else {
    $ret .= "<div class='nbres'>
               <h2> il y a $cpt resultat(s) pour la recherche : $rech </h2>
            </div>";
    }
    echo $ret;
    die();
    }
  
  return $ret;
}

?>
