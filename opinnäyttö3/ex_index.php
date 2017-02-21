<?php

error_reporting(0);
$my=mysqli_connect("localhost","data15","jNTKdg3NTbRBuVEn","data15");
if($my->mysql_errno) {
  die("MySql-virhe: " . $my->connect_error);
}
$my->set_charset("utf8");



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



    $result = $my->query('SELECT nimi, tyyppi FROM 707A_toimielimet');

echo "<table class='table table-hover'>";
  echo "<thead>";
   echo "<tr>";
    echo "<th>" . "Toimielimet" . "</th>";
    echo "<th>" . "Viimeisin kokous" . "</th>";
    echo "<th>" . "Tyyppi" . "</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($result as $k) {


      echo "<tr>";
        echo "<td>";
          echo '<a href="toimielin_sisalto.php?id='.$k["nimi"].'">'.$k['nimi'].'</a>';
        echo "</td>";
        echo "<td>";

        echo "</td>";
        echo "<td>";
          echo $k["tyyppi"];
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
