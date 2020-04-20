<?PHP
include_once "../entites/livreur.php";
include_once "../core/livreurC.php";

if (isset($_POST['cin']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['secteur'])){
$livreur1=new livreur($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['secteur']);
$livreur1C=new livreurC();
$livreur1C->ajouterlivreur($livreur1);
header('Location: afficherlivreur.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>