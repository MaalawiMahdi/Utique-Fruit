<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ajout d'un livraison</title>
    <link rel="stylesheet" type="text/css" href="style.css">
   
   
</head>
<body>
  <script type="text/javascript" src="controlsaisi.js"></script>
    <form method="GET" action="ajoutlivraison.php" name="f">
   
    <div>
           <h2> <center> AJOUTER UNE LIVRAISON </center></h2>
            <center>
                    <table>
                        <tr>
                            <td>
                                <label class="control-label" for="success"> Saisir l'identifiant de la livraison </label>
                            </td>
                            <td>
                                 <input type="" name="id_livraison"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                 <label class="control-label" for="warning"> Saisir le numéro de commande </label>
                            </td>
                            <td>
                                 <input type="" name="num_commande"/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                  <label class="control-label" for="error"> Choisir le cin du livreur </label>
                            </td>
                            <td>
                                <select name="cin_livreur">
 
                                  <?php
                                      include_once "../config.php";

                                      $db = config::getConnexion();
                                      try{

                                           $reponse = $db->query('select * from livreur');
                                           var_dump($reponse);
                                         }
                                         catch (Exception $e)
                                         {
                                            echo "erreur";
                                         }
                                      foreach ($reponse as $row) 
                                      {
                                        echo "<option value='".$row['cin']."'>". $row['cin']." </option>";
                                      }
                                  ?>

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                 </br>
                                 <input type="submit" name="ajouter" value="ajouter" class="boutton" onclick="test()">
                            </td>
                        </tr>

                   </table>
              </center> 
            </div>
        </form>

        </body>
        </html>