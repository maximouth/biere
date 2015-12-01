<?php
    include "masque.php";
    include "formulaire.php";

    echo masque("recette de ".htmlspecialchars($_GET['nom'])."");

$nom = htmlspecialchars($_GET['nom']);
$type = htmlspecialchars($_GET['type']);
$coul = htmlspecialchars($_GET['coul']);

//afficher nom recette
echo "<div class='nom'> $nom</div>";



//recuperer la recette
   //php -> sql
    // on se connecte à MySQL
    $db = mysql_connect("localhost", "root", "max@94");

    // on sélectionne la base
    mysql_select_db("recette",$db);


//si il y a un commentaire en envoyer
if(isset ($_POST['commentaire']) AND isset($_POST['auteur'])) {
  $sql = "insert into commentaire (nom, auteur, date, commentaire, type, couleur)
values ('$nom', '".$_POST['auteur']."', '".date('Y-m-d H:i:s')."', '".nl2br(htmlspecialchars($_POST['commentaire']))."', '$type', '$coul')
;

";
   // on envoie la requête
    $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error()); 
  

}

//si il y a une note de donnée
if (isset ($_POST['note'])) {

  $sql = "
select note,nb
       from recette
       where nom='$nom' and type='$type' and couleur='$coul'
       ;
";

  // on envoie la requête
  $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error()); 
$row =  mysql_fetch_assoc($req);
$note = $row['note'];
$nb = $row['nb'];
//echo "<h1>$note , $nb, ".$_POST['note']."</h1>";

$nb = $nb+1;
$note = (($note * (1 / $nb)) +( $_POST['note'] * (1- (1 / $nb)) ));

//on modifie la valeur de le note dans la table
$sql = "update recette
        set note = '$note',
            nb = '$nb'
            where nom='$nom' and type='$type' and couleur='$coul'
;
";

  // on envoie la requête
  $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error()); 

}

$sql = "
select note
from recette
where  type = '$type' and couleur = '$coul' and nom = '$nom'
;
";

 // on envoie la requête
    $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error());    

$row =  mysql_fetch_assoc($req);
$note = $row['note'];



    // on crée la requête SQL ///**** pas encore de photo ****///
    $sql = "select recette
            from recette
            where type = '$type' and couleur = '$coul' and nom = '$nom'
            ;" ;
    
    // on envoie la requête
    $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error());    
//afficher recette
$row = mysql_fetch_assoc($req);
echo "<div class=recette><h2 class='recet'>".$row['recette']."</h2> </div>";

echo "
<div class='nottte'>
<p>note de la recette :  $note </p>
</div>
";

//fenetre de post de commentaire
//note de la recette
echo commentaire();
//recuperer les commentaires
//afficher les commentaires (un div pour tous + dans un ul ou ol pour afficher

$sql = "
select commentaire, date
       from commentaire
       where type='".$type."' and couleur='".$coul."' and nom='".$nom."'
       ;
";

// on envoie la requête
    $req = mysql_query($sql) or die('Erreur SQL !<h1>'.$sql.'<h1>'.mysql_error());    
//afficher les commentaire

while ($row = mysql_fetch_assoc($req)) {
  echo " <div class=comm>\n
         <p>date : ".$row['date']."</p>
         <p>".$row['commentaire']."</p>
</div>

";

}

echo "</body></html>";


?>