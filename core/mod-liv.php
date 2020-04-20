<?PHP
include "livreurC.php";
include "../entites/livreur.php";
if (isset($_POST['modifier'])){
	$livreur=new livreur($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['secteur']);
	$livreurC=new livreurC();
	$livreurC->modifierlivreur($livreur,$_POST['cin_ini']);
	echo $_POST['cin_ini'];
	header('Location: ../views/afficherlivreur.php');
}
?>