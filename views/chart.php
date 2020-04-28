<?php 



 $connect = mysqli_connect("localhost", "root", "", "gestion_livraison");  
 $query = "SELECT secteur, count(*) as number FROM livreur GROUP BY secteur";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <meta charset="utf-8">>
           <title> Statistiques des secteurs </title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['secteur', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["secteur"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                     
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center"> LES STATISTIQUES DES SECTEURS </h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>