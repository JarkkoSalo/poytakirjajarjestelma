                                                     <?php
   $my = new mysqli('localhost','data15','jNTKdg3NTbRBuVEn','data15');
         $my->set_charset("utf8");

$id = $_GET['id'];
$telin = $_GET['toimielin'];
   $sql = 'SELECT id, toimielin, osio_nimi, pkid, asianro, vuosi, pvm, tyyppi FROM 707A_toimielimet_poytakirjasisalto WHERE pkid = "'.$id.'" ';




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
   <style>
      .push {
        height: 9em;
      }
   </style>
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





   </div>

  <?php


      $toka = $my->query('SELECT kirjanimi, toimielin FROM 707A_toimielimet_sisalto WHERE id = "'.$id.'"');

        $p = 0;



      foreach($toka as $g) {
        while($p < 1) {
          echo "<h2 style='text-align: center;'>" .  $g["toimielin"] . "</h2>";
          echo "<h2 style='text-align: center; color: blue;'>" . " - " . "</h2>";
          echo "<h2 style='text-align: center;'>" . $g["kirjanimi"] . "</h2>";
          $p++;
        }

      }
   ?>
   <div class="push" style="height: 3em;"> </div>
<div class="row">
    <?php echo '<a href="test_esim_liitelisays.php?id='.$id."&". "toimielin=" . $telin . '">'."lisää pöytäkirja".'</a>'; ?>
<table class="taulu">

     <tr>

   <th>Päivämäärä</th>

 <th>
   Tyyppi
</th>
 </tr>

<?php


$result = $my->query('SELECT * FROM 707A_toimielimet_poytakirjasisalto WHERE toimielin = "'.$telin.'" AND pkid = "'.$id.'"');

foreach ($result as $k) {

  echo "<tr>";
    echo "<td>";
      echo $k["asianro"];
    echo "</td>";
    echo "<td>";
      echo '<a href="poytakirjatulostus.php?id='.$k["id"]. "&" . "toimielin=" . $k["toimielin"] . "&" . "osio=" .$k["osio_nimi"] .'">'.$k['osio_nimi'].'</a>';
    echo "</td>";
  echo "</tr>";

}








   ?>

</table>
</div>
<div class='push'></div>
<h2 style='text-align: center;'>Osallistujat</h2>
<br>
<div class="row">
  <?php
  $joku = $my->query('SELECT * FROM 707A_toimielimet_poytakirjasisalto_osallistujat WHERE toimielin = "'.$telin.'" AND pkid = "'.$id.'"');
  echo "<table>";
  echo "<thead>";
  echo "<tr>";

  echo "<th>" . "Osallistuja" .  "</th>";
  echo "<th>" . "Tehtävä" . "</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

  foreach ($joku as $t) {

  echo "<tr>";
  echo "<td>";
    echo $t["etunimi"] . " " . $t["sukunimi"];
  echo "</td>";
  echo "<td>";
    echo $t["tehtava"];
  echo "</td>";
  echo "</tr>";

  }
  echo "</tbody>";
  echo "</table>";

   ?>
</div>
 </body>
</html>
