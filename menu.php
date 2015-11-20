<?php
include "entete.php";

echo entete("beer world");

function liste ($titre, $type) {
  $ret = '';

  $ret .= "<li><a href='type.php?type=$type'>$titre </a>\n";

  $ret .= "<ul>\n
	      \t<li><a href='couleur.php?type=".$type."&couleur=blanche'> blanche</a></li>\n
	      \t<li><a href='couleur.php?type=$type&couleur=blonde'> blonde</a></li>\n
	      \t<li><a href='couleur.php?type=$type&couleur=brune'> brune</a></li>\n
	      \t<li><a href='couleur.php?type=$type&couleur=stout'> stout </a></li>\n
	      \t<li><a href='couleur.php?type=$type&couleur=ambree'> ambrée </a></li>\n
	      \t<li><a href='couleur.php?type=$type&couleur=autre'> autre </a></li>\n
  </ul></li>\n
  ";

  return $ret;
}



?>
<body>


  <div class=logo>

  </div>

  <div class=titre >
  <h1> Beer World </h1>
  </div>
  
  <div class=menu >
  <ul>
  <li><a href=""> accueil</a>  </li>
  <?php
  echo liste ( 'conserve', 'c');
  echo liste ( 'extrait', 'e');
  echo liste ( 'tout grain', 'g');
  ?>
  <li><a href="post.php"> poster une recette </a></li>
  <li><a href="contact.php"> nous contacter </a></li>
</ul>
</div>

<div class=pres>
<h2>LE site de partage de recette communautaire</h2>
<h3>Bonjour tout le monde, vous voici ici sur un site de partage<br><br>
de recette de biere communautaire,vous pouvez selectionner<br><br>
les differentes techniques de brassage ainsi que les<br><br>
differents type de bieres qui vous interesse.<br><br>
N'hesitez pas à partager les votre et à me poser<br><br>
de questions (et remarques)Je suis preneur de toute<br><br>
degustation de vos bieres! :D</h3>
</div>

</body>
</html>