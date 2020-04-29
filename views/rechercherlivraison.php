<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delivery</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
     <a href="afficherlivraison.php"> <-- Revenir à la page précédente </a></br>
		<div class="col-md-6">
    <div class="panel panel-default">
		 <div class="panel-heading">
      

<form method="GET" action="../core/searchlivraison.php">
        <label for="num_commande">
            Entrer votre recherche :
        </label>
        <input type="search" name="num_commande">
        </br>
        <input type="submit" name="" value="Rechercher">
    </form>

       <br>
    </div>
<div class="table-responsive">
    <center>
    <table class="customers">
        <thead>
            <tr>
                <th>Id_livraison</th>
                <th>Num_commande</th>
                <th>Cin_livreur</th>
            </tr>
        </thead>
        <?PHP
        if(isset($_GET["num_commande"])){
            include_once "../core/livraisonC.php";
            $livraison1C=new livraisonC();
            $listelivraisons=$livraison1C->rechercherListelivraisons($_GET["num_commande"]);
            foreach($listelivraisons as $row){
	    ?>
        <tbody>
           
            <tr>
                <td align="center"><?PHP echo $row['id_livraison']; ?></td>
                <td align="center"><?PHP echo $row['num_commande']; ?></td>
                <td align="center"><?php echo $row['cin_livreur'];?></td>
            </tr>
           
        </tbody>
        <?PHP
            }
        }
    ?>
    </table>
    </center>
</div>
</div>
</body>
</html>