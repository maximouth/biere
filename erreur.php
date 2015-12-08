<?php

function pageerreur() {

  $ret .= masque('ERREUR');

  $ret .= "<h1>Mauvaise url, <br> Vous vous êtes trompé cette page n'existe pas</h1>";
  $ret .=  "</body></html>";

  return $ret;
}
?>