<?php

error_reporting(0);
$my=mysqli_connect("localhost","data15","jNTKdg3NTbRBuVEn","data15");
if($my->mysql_errno) {
  die("MySql-virhe: " . $my->connect_error);
}
$my->set_charset("utf8");

include("db.php");


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <style>
    td, th {
      width: 50%;
    }
  </style>
</head>
<body>

<div class='container'>


  <?php
      $id = $_GET["id"];
      $tmelin = $_GET["toimielin"];
      $os_nimi = $_GET["osio"];
    echo '<a href="test_esim_poytakirjaliite_asialisays.php?id='.$id. "&" . "toimielin=" . $tmelin . "&" . "osio=" . $os_nimi .'">'. "Lisää pöytäkirja".'</a>';

    $result = $my->query('SELECT id, otsikko, pykala, toimielin, pvm, vastaus, paatos, osio_nimi, osio_id FROM 707A_poytakirjat WHERE toimielin = "'.$tmelin.'" AND osio_id = "'.$id.'" AND osio_nimi = "'.$os_nimi.'"');



      $p = 0;



    foreach($result as $g) {
        echo "<br>";
      echo $g["otsikko"];
      echo "<br>";
      echo $g["pykala"];
      echo "<br>";
      echo $g["pvm"];
      echo "<br>";
      echo $g["vastaus"];
      echo "<br>";
      echo $g["paatos"];
      echo "<br>";
    }





  $joku = $my->query('SELECT toimielin, pkid, etunimi, sukunimi, tehtava FROM 707A_toimielimet_poytakirjasisalto_osallistujat WHERE toimielin = "'.$tmelin.'" AND pkid = "'.$id.'"');

  $my->close();



  ?>


</div>

</body>
</html>
