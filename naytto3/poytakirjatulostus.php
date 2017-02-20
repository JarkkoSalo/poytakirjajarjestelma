<?php
   $my = new mysqli('localhost','data15','jNTKdg3NTbRBuVEn','data15');
         $my->set_charset("utf8");

$id = $_GET['id'];

   $sql = 'SELECT otsikko, pykala, toimielin, pvm, vastaus, paatos FROM 707A_poytakirjat WHERE toimielin = "'.$id.'" ';
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

   <h3>



   <?php


     $es = $result->fetch_object();
     echo '<p>Pöytäkirja '.$es->pvm.' Pykälä '.$es->pykala;
     ?></h3>

   </div>
<div class="row">


<?php

           foreach ($result as $k) {
             echo '<div class="pohja">';
             echo '<div class="otsikko"><div>'.$k['toimielin'].'</div>';
             echo '<div>§'.$k['pykala'].'</div>';
            echo '<div>'.$k['pvm'].'</div></div>';
            echo '<div class="otsikko2">'. "<p>" . $k['otsikko']. "</p>" .'</div>';
             echo '<div class="vastaus"><p>vs: '.$k["vastaus"].'</p></div>';
             echo '<div class="paatos"><p>päätos: '.$k['paatos'].'</div>';
             echo '</div>';
           }

           $my->close();

   ?>

</div>
 </body>
</html>
