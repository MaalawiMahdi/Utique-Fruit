<?PHP
class livraison{
	private $id_livraison;
	private $num_commande;
	private $cin_livreur;
	function __construct($id_livraison,$num_commande,$cin_livreur){
		$this->id_livraison=$id_livraison;
		$this->num_commande=$num_commande;
		$this->cin_livreur=$cin_livreur;
	}
	
	function getid_livraison(){
		return $this->id_livraison;
	}
	function getnum_commande(){
		return $this->num_commande;
	}
	function getcin_livreur(){
		return $this->cin_livreur;
	}


    function setid_livraison($id_livraison){
		$this->id_livraison;
	}
	function setnum_commande($num_commande){
		$this->num_commande;
	}
	function setcin_livreur($cin_livreur){
		$this->cin_livreur;
	}
	
}

?>