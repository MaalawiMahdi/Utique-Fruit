<?PHP
include_once "../core/livraisonC.php";
$livraisonC=new livraisonC();
if (isset($_POST["id_livraison"])){
	$livraisonC->supprimerlivraison($_POST["id_livraison"]);
	header('Location: afficherlivraison.php');
}

?>