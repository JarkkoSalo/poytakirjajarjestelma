

 <?php
    $my = new mysqli('localhost','data15','jNTKdg3NTbRBuVEn','data15');
          $my->set_charset("utf8");

$id = $_GET['id'];




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



    <br>
    <?php

    $jotain = $my->query('SELECT id, toimielin, pvm, vuosi, tyyppi FROM 707A_toimielimet_sisalto WHERE toimielin = "'.$id.'"');
    foreach ($jotain as $z) {


    while($i < 1) {
      echo "<h2 style='text-align: center;'>" . $z["toimielin"] . "</h2>";
      $i++;
      }
    }

      ?>

    </div>

<div class="row">
  <?php   echo '<a href="test_esim_poytakirjalisays.php?id='. $id .'">'."lisää pöytäkirja".'</a>'; ?>
<table class="taulu">

      <tr>

    <th>Päivämäärä</th>

  <th>
    Tyyppi
</th>
  </tr>

<?php
$id = $_GET["id"];

$result = $my->query('SELECT id, toimielin, pvm, vuosi, tyyppi FROM 707A_toimielimet_sisalto WHERE toimielin = "'.$id.'"');


foreach ($result as $k) {

  echo "<tr>";
    echo "<td>";
      echo $k["pvm"];
    echo "</td>";
    echo "<td>";
      echo '<a href="toimielin_poytakirja_sisalto.php?id='.$k["id"]. "&" . "toimielin=". $k["toimielin"] . '">'.$k['tyyppi'].'</a>';
    echo "</td>";
  echo "</tr>";

}


            $my->close();

    ?>
</table>
</div>
  </body>
</html>
