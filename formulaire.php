<?php
function formulaire() {
   $ret = '';
   $ret .= "<form method='post' action=''  enctype='multipart/form-data'>";

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

   $ret .=  "<p class='photo'>
             <label for='photo'>rajouter une photo (.png, .jpg, .jpeg, .bmp)<br></label> 
             <input type='file' name='photo'> 
             <input type='hidden' name='MAX_FILE_SIZE' value='50000'> 
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
       <textarea name='commentaire' id='commentaire' rows='10' cols='80'>
                        Restez poli et courtois s'il vous plait
        
       </textarea>       
</p>
";

  $ret .= "<input  type=submit name=envoyer>";

 
  
  $ret .= "</form>\n";
  return $ret;  

}



function rechercheform() {
  $ret = "
<form method='post' action='' class='formrecherche'>

  <div class='typeform'>
  <label for='type'>rechercher dans type?<br></label>
  <input type='checkbox' name='type[]' value='conserve' />conserve<br />
  <input type='checkbox' name='type[]' value='extrait' />extrait<br />
  <input type='checkbox' name='type[]' value='grain' />tout grain<br />
  </div>

  <div class='coulform'>
  <label for='coul'>recherche dans couleur?<br></label>
  <input type='checkbox' name='coul[]' value='blanche' />blanche<br />
  <input type='checkbox' name='coul[]' value='blonde' />blonde<br />
  <input type='checkbox' name='coul[]' value='brune' />brune<br />
  <input type='checkbox' name='coul[]' value='ambree' />ambree<br />
  <input type='checkbox' name='coul[]' value='stout' />stout<br />
  <input type='checkbox' name='coul[]' value='autre' />autre<br />
  </div>

  <div class='auteurform'>
  <label for='auteur'>rechercher le nom d'une bière ou un auteur ?<br></label>
  <input type='checkbox' name='auteur' value='auteur' />auteur<br />
  <input type='checkbox' name='nom' value='nom' />nom biere<br />  
  </div>
  
  <div class='rechercherform'>
  <label for='rchform'> votre recherche :</label>
  <input type='text' name='rchform'  placeholder='nom,auteur...' maxlength='15'>
  </div>

 <div class='vldform'>
 <label for='validerform'>lancer votre recherche</label>
 <input type='submit' name='validerform'>
 </div>

</form>

</body> </html>

   ";


  return $ret;
  
}








?>