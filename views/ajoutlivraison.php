<?PHP
include_once "../entites/livraison.php";
include_once "../core/livraisonC.php";

if (!empty($_GET['id_livraison']) and !empty($_GET['num_commande']))
{
   $livraison1=new livraison($_GET['id_livraison'],$_GET['num_commande'],$_GET['cin_livreur']);
   $livraison1C=new livraisonC();
   $livraison1C->ajouterlivraison($livraison1);
   header('Location: afficherlivraison.php');	
}
else
{
	echo "verifier les champs";
}
//*/

?>