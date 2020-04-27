<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delivery</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
        <?PHP
        include_once "../core/livraisonC.php";
        $livraison1C=new livraisonC();
        $listelivraisons=$livraison1C->afficherlivraisons();
        ?>
		<div class="col-md-6">
        <div class="panel panel-default">
		 <div class="panel-heading">
    <h2> <center> LES EVENEMENTS EN COURS </center> </h2>
    </div>
<div class="table-responsive">
    <center>
    <table class="customers">
        <thead>
            <tr>
                <th>id_livraison</th>
                <th>num_commande</th>
                <th>cin_livreur</th>
                <th>SUPPRIMER</th>
                <th>MODIFIER</th>
            </tr>
        </thead>
        <?PHP
foreach($listelivraisons as $row){
	?>
        <tbody>
           
            <tr>
                <td align="center"> <?PHP echo $row['id_livraison']; ?> </td>
				<td align="center"> <?PHP echo $row['num_commande']; ?> </td>
                <td align="center"> <?PHP echo $row['cin_livreur']; ?> </td>
                <td align="center"> 
                    <br>
                    <form method="POST" action="supprimerlivraison.php">
	                   <input type="submit" name="supprimer" value="supprimer" class="boutton">
	                   <input type="hidden" value="<?PHP echo $row['id_livraison']; ?>" name="id_livraison">   
                       <!-- <img src="cor.png" width="50" height="50" > -->

	                </form>
	            </td>
	            <td align="center"><a href="modifierlivraison.php?id_livraison=<?PHP echo $row['id_livraison']; ?>">
	                Modifier</a></td>
                </tr>
        </tbody>

        <?PHP
    }
    ?>
    </table>
    </center>
</div>
</div>
</body>
</html>