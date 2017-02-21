<?php
/* Kirjautumista vaativan alueen koodinpätkä, lisättävä jokaiseen kirjautumista vaativan sivun alkuun! ALKAA */

session_start();

if (!isset($_SESSION["logged_user"]) && !isset($_SESSION["logged_password"]))
{
	// Not logged in, going to login..

	header('Location:http://cosmo.kpedu.fi/~jarkkosalo/php2017/pöytäkirjasysteemi/kirjautuminen/login.php');
	exit();
}

/* Alue päättyy */

echo "Tervetuloa takaisin, <i>" . $_SESSION["logged_user"] . "</i>! Tänään on: " . date('j.n.Y');
echo "<br>Olet saapunut hallintapaneeliin!";
echo "<br><br><a href=\"http://cosmo.kpedu.fi/~jarkkosalo/php2017/pöytäkirjasysteemi/kirjautuminen/logout.php\">Kirjaudu ulos</a>";
  include_once("db.php");

  $id = $_GET["id"];

if(isset($_POST['nappi'])) {
  $toimielin =   $id;
  $nimi = $_POST['nimi'];
  $tyyppi = $_POST['luokka'];
  $year = date('Y');
  $aika = date("d.m.Y");
  $kysely = $yhteys->prepare("INSERT INTO 707A_toimielimet_sisalto (toimielin, tyyppi, vuosi, pvm, kirjanimi) VALUES (?, ?, ?, ?, ?)");
  $kysely->execute(array($toimielin, $tyyppi, $year, $aika, $nimi));
  $kysely = $yhteys->prepare("INSERT INTO 707A_toimielimet_vuodet (toimielin, vuosi) VALUES (?, ?)");
  $kysely->execute(array($toimielin, $year));


  echo "lähetetty";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>

  <form method="post">
      <p> Pöytäkirjan nimi </p>
      <input type="text" name="nimi">

    <select name="luokka">
      <option value="Esityslista">Esityslista</option>
      <option value="Pöytäkirja">Pöytäkirja</option>
    </select>

    <button type="submit" name="nappi"> Lähetä </button>


  </form>

</body>
</html>
