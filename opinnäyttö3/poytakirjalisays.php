<?php

  include_once("db.php");

  $id = $_GET["id"];

if(isset($_POST['nappi'])) {
  $toimielin = $id;
  $otsikko = $_POST["otsikko"];
  $pykala = $_POST["pykala"];
  $pvm = date("d.m.Y");
  $vastaus = $_POST["vastaus"];
  $paatos = $_POST["paatos"];
  $kysely = $yhteys->prepare("INSERT INTO 707A_poytakirjat (otsikko, pykala, toimielin, pvm, vastaus, paatos) VALUES (?, ?, ?, ?, ?, ?)");
  $kysely->execute(array($otsikko, $pykala, $toimielin, $pvm, $vastaus, $paatos));
  echo "lähetetty";
}
?>
<!DOCTYPE html>
<html>
<head>
  <style>
  .lomake{
    margin: 5em;

  }
  </style>
  <meta charset="utf-8">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>

  <form class="lomake" method="post">

      <p><input type="text" name="otsikko">Otsikko</p>
      <p><input type="text" name="pykala">Pykälä</p>
      <p><input type="text" name="vastaus">Vastaus</p>
      <p><input type="text" name="paatos">Päätös</p>




    <button type="submit" name="nappi"> Lähetä </button>


  </form>

</body>
</html>
