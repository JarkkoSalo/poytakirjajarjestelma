<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Tietopalvelu</title>
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="tietopalvelu.css">
<style>

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
      <h3><a href="tietopalvelu.php">Toimielimet</a></h3>
    </div>
<div class="row">
<table class="taulu">
  <tr>
    <th>
      Toimielin
    </th>
    <th>Päivämäärä</th>

  <th>
    Tyyppi
</th>
  </tr>
  <?php
  $my = new mysqli('localhost','data15','jNTKdg3NTbRBuVEn','data15');
        $my->set_charset("utf8");

$sql = 'SELECT nimi, pvm, tyyppi FROM 707A_toimielimet ORDER BY pvm DESC';
$result = $my->query($sql);

          foreach ($result as $k) {
            echo '<tr><td>';
             echo '<a href="poytakirja.php?id='.$k["nimi"].'">'.$k['nimi'].'</a></td><td>';
            
            echo date("d.m.Y", strtotime($k["pvm"])).'</td><td>';
            echo $k['tyyppi'];
            echo '</td></tr>';
          }
          $my->close();

  ?>
</table>

</div>
  </body>
</html>
