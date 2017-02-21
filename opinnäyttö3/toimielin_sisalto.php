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
    echo '<a href="test_esim_poytakirjalisays.php?id='.$id.'">'. "Lisää pöytäkirja".'</a>';
    $jotain = $my->query('SELECT id, toimielin, pvm, vuosi, tyyppi FROM 707A_toimielimet_sisalto WHERE toimielin = "'.$id.'"');
    $result = $my->query('SELECT id, toimielin, pvm, vuosi, tyyppi FROM 707A_toimielimet_sisalto WHERE toimielin = "'.$id.'"');



    $res = $yhteys->prepare('SELECT DISTINCT id, vuosi FROM 707A_toimielimet_vuodet WHERE toimielin = "'.$id.'"');
    $res->execute();
  $i = 0;
  echo "<br>";
  foreach ($jotain as $z) {


  while($i < 1) {
    echo "<h2 style='text-align: center;'>" . $z["toimielin"] . "</h2>";
    $i++;
    }
  }
echo "<table class='table table-hover'>";
  echo "<thead>";
   echo "<tr>";

    echo "<th>" .  "</th>";
    echo "<th>" .  "</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";


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


echo "</table>";
echo "</tbody>";

  $my->close();
  ?>
</div>

</body>
</html>
