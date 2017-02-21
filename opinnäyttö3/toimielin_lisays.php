<?php

/* Kirjautumista vaativan alueen koodinpätkä, lisättävä jokaiseen kirjautumista vaativan sivun alkuun! ALKAA */

session_start();

if (!isset($_SESSION["logged_user"]) && !isset($_SESSION["logged_password"]))
{
	// Not logged in, going to login..

	header('Location: http://cosmo.kpedu.fi/~jarkkosalo/php2017/pöytäkirjasysteemi/kirjautuminen/login.php');
	exit();
}

/* Alue päättyy */

echo "Tervetuloa takaisin, <i>" . $_SESSION["logged_user"] . "</i>!";

echo "<br><br><a href=\"http://cosmo.kpedu.fi/~jarkkosalo/php2017/pöytäkirjasysteemi/kirjautuminen/logout.php\">Kirjaudu ulos</a>";

error_reporting(0);
$my=mysqli_connect("localhost","data15","jNTKdg3NTbRBuVEn","data15");
if($my->mysql_errno) {
  die("MySql-virhe: " . $my->connect_error);
}
$my->set_charset("utf8");
  include_once("db.php");


if(isset($_POST['nappi'])) {
  $nimi = $_POST['nimi'];
  $tyyppi = $_POST['luokka'];
  $aika = date("d.m.Y");

  $kysely = $yhteys->prepare("INSERT INTO 707A_toimielimet (nimi, pvm, tyyppi) VALUES (?, ?, ?)");
  $kysely->execute(array($nimi, $aika, $tyyppi));


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

      <input type="text" name="nimi"/>

    <select name="luokka">
      <option value="Esityslista">Esityslista</option>
      <option value="Pöytäkirja">Pöytäkirja</option>
    </select>

    <button type="submit" name="nappi"> Lähetä </button>


  </form>

</body>
</html>
