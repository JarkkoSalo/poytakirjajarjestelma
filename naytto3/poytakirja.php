

 <?php
    $my = new mysqli('localhost','data15','jNTKdg3NTbRBuVEn','data15');
          $my->set_charset("utf8");

$id = $_GET['id'];

    $sql = 'SELECT id, toimielin, pvm, tyyppi FROM 707A_toimielimet_sisalto WHERE toimielin = "'.$id.'" ';
    $result = $my->query($sql);



 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="tietopalvelu.css">
    <title>Pöytäkirjajärjestelmä</title>
  </head>
  <body>

 <div class="top-bar">
      <div class="top-bar-left">
        <h5>Dynasty Tietopalvelu</h5>
      </div>
      <div class="top-bar-right">
        <h5>Kokkola RSS</h5>
      </div>
    </div>
    <div class="text-center">

    <h3>
    <a href="tietopalvelu.php">Toimielimet</a> &nbsp; &gt; &nbsp;


    <?php


      $es = $result->fetch_object();
      echo '<a href="poytakirja.php?id='. $es->toimielin.'">'.$es->toimielin.'</a>';
      ?></h3>

    </div>
<div class="row">
<table class="taulu">
      <tr>

    <th>Päivämäärä</th>

  <th>
    Tyyppi
</th>
  </tr>

<?php

            foreach ($result as $k) {
              echo '<tr>';


              echo '<td>'.$k["pvm"];
              echo '</td><td>'.$k['tyyppi'];
              echo '</td></tr>';
            }

            $my->close();
              echo '<a href="poytakirjalisays.php?id='. $es->toimielin.'">'."lisää pöytäkirja".'</a>';
    ?>
</table>
</div>
  </body>
</html>
