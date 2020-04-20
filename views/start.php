
<?PHP
include_once "../entites/livreur.php";
include_once "../core/livreurC.php";
$livreur=new livreur(00001,10,11959502);
$livreurrC=new livreurC();
$livreurrC->afficherlivreur($livreur);
echo "****************";
echo "<br>";
echo "cin:".$livreur->getcin_livreur();
echo "<br>";
echo "nom:".$livreur->getnom();
echo "<br>";
echo "prenom:".$livreur->getprenom();
echo "<br>";
echo "nbH:".$livreur->getsecteur();
echo "<br>";


?>