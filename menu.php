<?php
include "entete.php";

echo entete("beer world");

function liste ($titre, $type) {
  $ret = '';

  $ret .= "<li><a href='type.php?type='$type''>$titre </a>\n";

  $ret .= "<ul>\n
	      \t<li><a href='couleur.php?type='$type'&couleur=blanche'></a> blanche</li>\n
	      \t<li><a href='couleur.php?type='$type'&couleur=blonde'></a> blonde</li>\n
	      \t<li><a href='couleur.php?type='$type'&couleur=brune'></a> brune</li>\n
	      \t<li><a href='couleur.php?type='$type'&couleur=stout'></a> stout</li>\n
	      \t<li><a href='couleur.php?type='$type'&couleur=ambree'></a> ambrée</li>\n
	      \t<li><a href='couleur.php?type='$type'&couleur=autre'></a> autre</li>\n
  </ul></li>\n
  ";

  
}



?>
<body>

<div class=titre>
  <h1> Beer World </h1>
  </div>
  
  <div class=menu>
  <ul>
  <li><a href=""> accueil</a>  </li>
  
  <li><a href="type.php?type='c'">conserve </a>
  <ul>
	<li>blanche</li>
  <li>blonde</li>
  <li>brune</li>
  <li>stout</li>
  <li>rousse</li>
  <li>autre</li>
  </ul></li>

  <li> <a href="type.php?type='e'">extrait </a>
  <ul>
  <li>blanche</li>
  <li>blonde</li>
  <li>brune</li>
	<li>stout</li>
  <li>rousse</li>
  <li>autre</li>
  </ul></li>
  
  
  <li>  <a href="type.php?type='g'">tout grain </a>
  
  <ul>
  <li>blanche</li>
  <li>blonde</li>
  <li>brune</li>
  <li>stout</li>
  <li>rousse</li>
  <li>autre</li>
</ul></li>

	<li> poster une recette</li>
	<li> nous contacter</li>


</ul>
</div>

<div class=pres>

<h2>LE site de partage de recette communautaire</h2>

<h3>Bonjour tout le monde, vous voici ici sur un site de partage</h3>
<h3>de recette de biere communautaire,vous pouvez selectionner</h3>
<h3> les differentes techniques de brassage ainsi que les</h3>
<h3> differents type de bieres qui vous interesse.</h3>
<h3>N'hesitez pas à partager les votre et à me poser</h3>
<h3>de questions (et remarques)Je suis preneur de toute</h3>
<h3>degustation de vos bieres! :D</h3>


</div>

</body>
</html>