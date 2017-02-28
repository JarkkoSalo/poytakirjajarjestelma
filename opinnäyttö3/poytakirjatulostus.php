<?php
   $my = new mysqli('localhost','data15','','data15');
         $my->set_charset("utf8");


?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="tietopalvelu.css">


   <title>Pöytäkirjajärjestelmä <?php $es->pykala ?></title>





<style>
  .pohja{
    margin: auto;
    width: 700px;
    height: 1000px;
    background-color: white;
    margin-top: 1em;
  }
  .otsikko{
    position: left;
    margin-top: 2em;
    display: flex;
    justify-content: space-around;
    padding-top: 1em;
  }
  .vastaus{

    margin-top: 6em;
    margin-left: 7em;

  }
  .paatos{
    margin-top: 6em;
    margin-left: 7em;
  }
  .otsikko2{
    margin-top: 2em;
    margin-left: 7em;
    font-weight: bold;
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
    <?php
    $id = $_GET["id"];
    $toimielin = $_GET["toimielin"];
    $osio = $_GET["osio"];
    echo '<a href="test_esim_poytakirjaliite_asialisays.php?id='. $id . "&" . "toimielin=" . $toimielin . "&" . "osio=" . $osio .'">'."lisää pöytäkirja".'</a>';


    ?>
    <!-- Muista korjaukset !! -->




   <?php
   $id = $_GET['toimielin'];

      $sql = 'SELECT * FROM 707A_poytakirjat WHERE osio_nimi = "'.$osio.'" LIMIT 1';
      $result = $my->query($sql);


     $es = $result->fetch_object();
     echo '<p>Pöytäkirja '.$es->pvm.' Pykälä '.$es->pykala;

     ?>

   </div>

<div class="row">


<?php

           foreach ($result as $k) {
             echo '<div class="pohja">';
             echo '<div class="otsikko"><div>'.$k['toimielin'].'</div>';
             echo '<div>§'.$k['pykala'].'</div>';
            echo '<div>'.$k['pvm'].'</div></div>';
            echo '<div class="otsikko2">'.  $k['otsikko'].'</div>';
             echo '<div class="vastaus">' . 'vs:'   .$k["vastaus"]. '</div>';
             echo '<div class="paatos">' . 'päätos:'  .$k['paatos'] . '</div>';
             echo '</div>';
           }

           $my->close();

   ?>

</div>
 </body>
</html>
