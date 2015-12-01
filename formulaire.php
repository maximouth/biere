<?php
function formulaire() {
   $ret = '';
   $ret .= "<form method='post' action=''>";

   $ret .=  " <p class=type>
             <label for='type'>choisir le type de préparation</label><br />
             <input type='radio' name='type' value='conserve' /> <label for='type'>conserve</label><br>\n
             <input type='radio' name='type' value='extrait' /> <label for='type'>extrait</label><br>\n
             <input type='radio' name='type' value='grain' /> <label for='type'>tout grain</label><br>\n
</p>
";

   $ret .=  " <p class=couleur>
              <label for='couleur'>choisir la couleur de la bière</label><br />
               <select name='couleur' id='couleur'>
                    <option value='blanche'>Blanche</option>
                    <option value='blonde'>Blonde</option>
                    <option value='brune'>Brune</option>
                    <option value='stout'>Stout</option>
                    <option value='ambree'>Ambrée</option>
                    <option value='autre'>Autre</option>
               </select>
           </p>
";


   $ret .= " <p class=auteur>
             <label for='auteur'>Nom de l'auteur :</label>
             <input type='text' name='auteur' id='auteur' placeholder='Mon nom d auteur' size='20' maxlength='20' />
             </p>
";



   $ret .= " <p class=biere>
             <label for='biere'>Nom de la bière :</label>
             <input type='text' name='biere' id='biere' placeholder='Mon nom de biere' size='20' maxlength='15' />
            </p>
";

        $ret .= "
<p class=recette>
    <label for='recette'>
       Entrer votre recette ici :
    </label> <br>
       <textarea name='recette' id='recette' rows='25' cols='70'>



Ingredients : 
     - houblon(s)
     - levure
     - type de malt
     - épices
         
Differentes techniques :
     - façon de houblonner
     - type de refroidisseur
     - différents paliers utilisé
       
Etapes :
     -
     -
     -
        </textarea>       
</p>
";

        $ret .=  "
<p class=valider>
 <label for='valider'>Soumettre </label>
 <input type='submit' value='valider'>   
</p>
";

	$ret .= "</form>";
   
   return $ret;
 }

function formulaire2($recette) {
   $ret = '';
   $ret .= "<form method='post' action=''>";

   $ret .=  " <p class=type>
             <label for='type'>choisir le type de préparation</label><br />
             <input type='radio' name='type' value='conserve' /> <label for='type'>conserve</label><br>\n
             <input type='radio' name='type' value='extrait' /> <label for='type'>extrait</label><br>\n
             <input type='radio' name='type' value='grain' /> <label for='type'>tout grain</label><br>\n
</p>
";

   $ret .=  " <p class=couleur>
              <label for='couleur'>choisir la couleur de la bière</label><br />
               <select name='couleur' id='couleur'>
                    <option value='blanche'>Blanche</option>
                    <option value='blonde'>Blonde</option>
                    <option value='brune'>Brune</option>
                    <option value='stout'>Stout</option>
                    <option value='ambree'>Ambrée</option>
                    <option value='autre'>Autre</option>
               </select>
           </p>
";


   $ret .= " <p class=auteur>
             <label for='auteur'>Nom de l'auteur :</label>
             <input type='text' name='auteur' id='auteur' placeholder='Mon nom d auteur' size='20' maxlength='20' />
             </p>
";



   $ret .= " <p class=biere>
             <label for='biere'>Nom de la bière :</label>
             <input type='text' name='biere' id='biere' placeholder='Mon nom de biere' size='20' maxlength='15' />
            </p>
";

        $ret .= "
<p class=recette>
    <label for='recette'>
       Entrer votre recette ici :
    </label> <br>
       <textarea name='recette' id='recette' rows='15' cols='60'>
        $recette
       </textarea>       
</p>
";

        $ret .=  "
<p class=valider>
 <label for='valider'>Soumettre </label>
 <input type='submit' value='valider'>   
</p>
";

	$ret .= "</form>";
   
   return $ret;
 }

function commentaire () {
  $ret = '';

  ///formulaire note
   $ret .= "<form method='post' action='' class='note'>
            <p>Quelle note donnez vous à cette recette ? {0-5}</p>\n              
             <input name='note' type='number' min='0' max='5'step='1'> \n
             <input  type=submit name=envoyer>\n
</form>\n          
";


   /// formulaire commentaire
  $ret .= "<form method='post' action='' class='commentaire'>";
  
  $ret .= "
<p class=commentaire>

   <p class=auteur>\n
             <label for='auteur'>Nom de l'auteur :</label>\n
             <input type='text' name='auteur' id='auteur' placeholder='Mon nom d auteur' size='20' maxlength='20' />\n
             </p>\n

    <label for='commentaire'>
       Vous avez un commentaire a faire sur cette recette? :
    </label> <br>
       <textarea name='commentaire' id='commentaire' rows='10' cols='100'>
inserer un retour à la ligne &ltbr&gt
                        Restez poli et courtois s'il vous plait
        
       </textarea>       
</p>
";

  $ret .= "<input  type=submit name=envoyer>";

 
  
  $ret .= "</form>\n";
  return $ret;  

}


?>