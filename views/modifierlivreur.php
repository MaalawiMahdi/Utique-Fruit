<HTML>
<head>
    <meta charset="utf-8" />
    <title>Modifier un livreur</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<?PHP
include_once "../entites/livreur.php";
include_once "../core/livreurC.php";
if (isset($_GET['cin'])){
	$livreurC=new livreurC();
    $result=$livreurC->recupererlivreur($_GET['cin']);
	foreach($result as $row){
		$cin=$row['cin'];
		$nom=$row['nom'];
        $prenom=$row['prenom'];
       
		$secteur=$row['secteur'];}}
?>
<div class="col-md-6">
    <div class="panel panel-default">
    <div class="panel-heading">
      <h2> <center> MODIFIER UN LIVREUR </center> </h2>
       <br>
    </div>
    <div class="panel-body">
        <form action="../core/mod-liv.php" method="POST">
                  <center>
                    <table>

                        <tr>
                            <td>
                               <label class="control-label" for="success">Saisir le cin</label>
                           </td>
                           <td>
                               <input type="number" class="form-control" id="success" name="cin" value="<?PHP echo $cin ?>"/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                               <label class="control-label" for="warning">Saisir le nom</label>
                           </td>
                           <td>
                               <input type="text" class="form-control" id="warning" name="nom" value="<?PHP echo $nom ?>"/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                               <label class="control-label" for="error">Saisir le prenom</label>
                           </td>
                           <td>
                               <input type="text" class="form-control" id="error" name="prenom" value="<?PHP echo $prenom ?>"/>
				            </td>
                        </tr>    
                        <tr>
                            <td>
                               <label class="control-label" for="success">Choisir un secteur</label>
                           </td>
                           <td>
                               <select class="form-control" name="secteur" type="text" >
                                  <option><?PHP echo $secteur ?></option>
                                      <option>Ariana</option>
                                      <option>Béja</option>
                                      <option>Ben Arous</option>
                                      <option>Bizerte</option>
                                      <option>Gabes</option>
                                      <option>Gafsa</option>
                                      <option>Jendouba</option>
                                      <option>Kairouan</option>
                                      <option>Kasserine</option>
                                      <option>Kebili</option>
                                      <option>La Manouba</option>
                                      <option>Le Kef</option>
                                      <option>Mahdia</option>
                                      <option>Médenine</option>
                                      <option>Monastir</option>
                                      <option>Nabeul</option>
                                      <option>Sfax</option>
                                      <option>Sidi Bouzid</option>
                                      <option>Siliana</option>
                                      <option>Sousse</option>
                                      <option>Tataouine</option>
                                      <option>Tozeur</option>
                                      <option>Tunis</option>
                                      <option>Zaghouan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="modifier" value="modifier" class="boutton">
                                <input type="hidden" name="cin_ini" value="<?PHP echo $_GET['cin'];?>">
                            </td>
                        </tr>
                    </table>
                    </center>
                </form>



</body>
</html>