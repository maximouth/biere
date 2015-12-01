<?php
include "entete.php";
include "liste.php";


function masque ($nom) {
  $ret =  entete($nom);
  
  $ret .= "  <body>
  <div class=logo>
      <img src='logo3.png'>
  </div>

  <div class=titre >
      <h1>The Beer CookBook </h1
  </div>
  
  <div class=menu >
  <ul>
  <li><a href='menu.php'> accueil</a>  </li>".
  liste ( 'conserve', 'c').
  liste ( 'extrait', 'e').
  liste ( 'tout grain', 'g').
  "<li><a href='post.php'> poster une recette </a></li>
  <li><a href='contact.php'> nous contacter </a></li>
</ul>
</div>
";
  return $ret;
}

?>
