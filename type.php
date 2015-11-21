<?php

include 'masque.php';

$type = $_GET['type'];

switch ($type) {
case 'c' :
  $t = 'conserve';
  echo masque ('conserve');
  break;
case 'e' :
    $t = 'extrait de malt';
  echo masque ('extrait de malt');
  break;
case 'g' :
  $t = 'tout grains';
  echo masque ('tout grains');
  break;
}

function lien ($type) {
  $ret = '';
  $array = array ('blanche', 'blonde', 'brune', 'stout', 'ambrée', 'autre');

  foreach ($array as $k) {
    $ret .= "<p> <a href='couleur.php?type=".$type."&couleur=".$k."'> $k </a>  </p>\n";
  }
  return $ret;
}


?>

<div class=pres>
  <h2> Vous êtes ici sur une page concernant les recettes de bière <br>
  à base de <?php echo $t; ?><br></h2>
<?php
switch ($type) {
case 'c':
  echo "  <h3> C'est une manière assez simple de commencer à brasser, car les <br>
       principales étapes sont deja faites.
        ".lien ($type)."
</h3>
";
  break;
case 'e':
  echo " <h3> Une manière un peu plus compmiqué mais qui permet d'obtenir de <br>             meilleurs resultats, et un contrôle plus grand qu'avec les conserves <br> 
".lien($type)."
</h3>
";
  break;
case 'g' :
  echo " <h3> Voici la manière de faire des 'vrais'! <br>
              un contrôle de la recette de A à Z, mais demande plus de temps <br>
             et de courage pour la réalisation d'un biere<br>
           ".lien($type)."
</h3>
";
  break;
}

?>
  
</div>


  </body> </html>