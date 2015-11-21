<?php

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