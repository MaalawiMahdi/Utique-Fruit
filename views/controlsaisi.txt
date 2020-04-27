 function test() 
{
 
  if (f.nom.value =="" || f.prenom.value =="") 
  {
    alert("Le champ de saisi ne doit pas être vide !");
  } 
  else if (f.nom.value.length > 15 || f.prenom.value.length > 15)
    {
      alert("Le champ de saisi doit contenir au maximum 15 caractères !");
    }
   else if (f.num_commande.value.length > 20)
    {
      alert("Le champ de saisi doit contenir au maximum 20 chiffres !");
    } 
   else if (isNAN(f.nom.value)) || (isNAN(f.prenom.value))
   {
      alert("Le champ de saisi ne doit pas être numériques !");
   } 
   else if (f.cin.value.length != 8)
   {
      alert("Votre CIN doit contenir 8 caractères !");
   } 
   else  if(!(isNaN(f.cin.value)))
   {
      alert("Votre CIN doit être numérique !");
   }

}

