<?PHP
include_once "../config.php";
class livraisonC {
function afficherlivraison ($livraison){
		echo "id_livraison: ".$livraison->getid_livraison()."<br>";
		echo "num_commande: ".$livraison->getnum_commande()."<br>";
		echo "cin_livreur: ".$livraison->getcin_livreur()."<br>";
	}
	function ajouterlivraison($livraison){
		$sql="insert into livraison (id_livraison,num_commande,cin_livreur) values (:id_livraison,:num_commande,:cin_livreur)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_livraison=$livraison->getid_livraison();
		$num_commande=$livraison->getnum_commande();
		$cin_livreur=$livraison->getcin_livreur();
		$req->bindValue(':id_livraison',$id_livraison);
        $req->bindValue(':num_commande',$num_commande);			
        $req->bindValue(':cin_livreur',$cin_livreur);			
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherlivraisons(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.idclient= a.idclient";
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivraison($id_livraison){
		$sql="DELETE FROM livraison where id_livraison= :id_livraison";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_livraison',$id_livraison);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivraison($livraison,$id_livraison){
		$sql="UPDATE livraison SET id_livraison=:id_livraisonn,num_commande=:num_commande,cin_livreur=:cin_livreur WHERE id_livraison=:id_livraison";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id_livraisonn=$livraison->getid_livraison();
		$num_commande=$livraison->getnum_commande();
		$cin_livreur=$livraison->getcin_livreur();
		$datas = array(':id_livraisonn'=>$id_livraisonn, ':id_livraison'=>$id_livraison,':numcommande'=>$numcommande,':cin_livreur'=>$cin_livreur);
		$req->bindValue(':id_livraisonn',$id_livraisonn);
		$req->bindValue(':id_livraison',$id_livraison);
        $req->bindValue(':num_commande',$num_commande);
        $req->bindValue(':cin_livreur',$cin_livreur);        			
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererlivraison($id_livraison){
		$sql="SELECT * from livraison where id_livraison=$id_livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListelivraisons($num_commande){
		$sql="SELECT * from livraison where num_commande=$num_commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>