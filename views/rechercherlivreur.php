<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delivery</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
		<div class="col-md-6">
    <div class="panel panel-default">
		 <div class="panel-heading">
      

<form method="GET" action="../core/search.php">
        <label for="secteur">
            Entrer votre recherche :
        </label>
        <input type="search" name="secteur">
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
                <th>Cin</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Secteur</th>
            </tr>
        </thead>
        <?PHP
        if(isset($_GET["secteur"])){
            include_once "../core/livreurC.php";
            $livreur1C=new livreurC();
            $listelivreurs=$livreur1C->rechercherListelivreurs($_GET["secteur"]);
            foreach($listelivreurs as $row){
	    ?>
        <tbody>
           
            <tr>
                <td align="center"><?PHP echo $row['cin']; ?></td>
                <td align="center"><?PHP echo $row['nom']; ?></td>
                <td align="center"><?php echo $row['prenom'];?></td>
                <td align="center"><?PHP echo $row['secteur']; ?></td>
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