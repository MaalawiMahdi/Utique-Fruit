<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delivery</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

        <?PHP
        if(isset($_GET['tri']) and $_GET['tri']=='1')
        {

        include_once "../core/livreurC.php";
        $livreur1C=new livreurC();
        $listelivreurs=$livreur1C->trieListelivreurs();
        }
        else
        { 

            include_once "../core/livreurC.php";
            $livreur1C=new livreurC();
            $listelivreurs=$livreur1C->afficherlivreurs();
        }
        ?>

		<div class="col-md-6">
    <div class="panel panel-default">
		 <div class="panel-heading">
       <h2> <center> LES LIVREURS DISPONIBLES </center> </h2>
                    <form action="../core/trielivreur.php" method="POST">
                        <input type="submit" name="" value="TRIER">
                     
                       <a href="chart.php"> Afficher les statistiques des secteurs </a>
                    </form>
       <br>
    </div>
<div class="table-responsive">
    <center>
    <table class="customers" 
        <thead>
            <tr>
                <th>Cin</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Secteur</th>
                <th>SUPPRIMER</th>
                <th>MODIFIER</th>

            </tr>
        </thead>
        <?PHP
foreach($listelivreurs as $row){
	?>
        <tbody>
           
            <tr>
                <td align="center"><?PHP echo $row['cin']; ?></td>
                <td align="center"><?PHP echo $row['nom']; ?></td>
                <td align="center"><?php echo $row['prenom'];?></td>
                <td align="center"><?PHP echo $row['secteur']; ?></td>
                <td align="center">
                    <form method="POST" action="supprimerlivreur.php">
	                 <input type="submit" name="supprimer" value="supprimer" class="boutton">
	                 <input type="hidden" value="<?PHP echo $row['cin']; ?>" name="cin">
	                </form>
	            </td>
	            <td align="center"><a href="modifierlivreur.php?cin=<?PHP echo $row['cin']; ?>">
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