<HTML>
<head>
    <meta charset="utf-8" />
    <title>Modifier une livraison</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?PHP
include_once "../entites/livraison.php";
include_once "../core/livraisonC.php";
if (isset($_GET['id_livraison'])){
	$livraisonC=new livraisonC();
    $result=$livraisonC->recupererlivraison($_GET['id_livraison']);
	foreach($result as $row){
		$id_livraison=$row['id_livraison'];
		$num_commande=$row['num_commande'];
        $cin_livreur=$row['cin_livreur'];
?>
<form method="POST">
<div class="col-md-6">
    <div class="panel panel-default">
    <div class="panel-heading">
     <h2>  <center> MODIFIER UNE LIVRAISON </center> </h2>
    </div>
    <div class="panel-body">
        <form role="form">
            <center>
                <table>
                    <tr>
                        <td>
                             <label class="control-label" for="success">Saisir id livraison</label>
                        </td>
                        <td>
                              <input type="number" class="form-control" id="success" name="id_livraison" value="<?PHP echo $id_livraison ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <label class="control-label" for="success">Saisir le numero de commande</label>
                        </td>
                        <td>
                             <input type="number" class="form-control" id="success" name="num_commande" value="<?PHP echo $num_commande ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                              <label class="control-label" for="success">Saisir le cin du livreur</label>
                        </td>
                        <td>
                              <input type="number" class="form-control" id="success" name="cin_livreur" value="<?PHP echo $cin_livreur ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            </br>
                            <input type="submit" name="modifier" value="modifier" class="boutton">
                            <input type="hidden" name="id_livraison_ini" value="<?PHP echo $_GET['id_livraison'];?>">
                        </td>
                    </tr>
                </table>
                </center>
        </form>

</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$livraison=new livraison($_POST['id_livraison'],$_POST['num_commande'],$_POST['cin_livreur']);
	$livraisonC->modifierlivraison($livraison,$_POST['id_livraison_ini']);
	echo $_POST['id_livraison_ini'];
	header('Location: afficherlivraison.php');
}
?>
</body>
</HTMl>