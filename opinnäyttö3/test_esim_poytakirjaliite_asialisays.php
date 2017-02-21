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

echo "Tervetuloa takaisin, <i>" . $_SESSION["logged_user"] . "</i>! Tänään on: " . date('j.n.Y');
echo "<br>Olet saapunut hallintapaneeliin!";
echo "<br><br><a href=\"http://cosmo.kpedu.fi/~jarkkosalo/php2017/pöytäkirjasysteemi/kirjautuminen/logout.php\">Kirjaudu ulos</a>";
  include_once("db.php");

  $id = $_GET["id"];
  $tmelin = $_GET["toimielin"];
  $os_nimi = $_GET["osio"];
if(isset($_POST['nappi'])) {

  $otsikko = $_POST['otsikko'];
  $pykala = $_POST['pykala'];
  $vastaus = $_POST['vastaus'];
  $paatos = $_POST['paatos'];
  $year = date('Y');
  $aika = date("d.m.Y");

  $kysely = $yhteys->prepare("INSERT INTO 707A_poytakirjat(otsikko, pykala, toimielin, pvm, vastaus, paatos, osio_nimi, osio_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $kysely->execute(array($otsikko, $pykala, $tmelin, $aika, $vastaus, $paatos, $os_nimi, $id));

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
		<div class="form-group">
			<p> Pöytäkirjan otsikko </p>
      <input type="text" name="otsikko">
		</div>
		<div class="form-group">
      <p> Pykälä </p>
      <input type="text" name="pykala">
		</div>
		<div class="form-group">
      <p> Vastaan </p>
      <input type="text" name="vastaus">
		</div>
		<div class="form-group">
      <p> Päätös </p>
      <textarea name="paatos" cols="60" rows="8"> </textarea>
		</div>
      <br>
      <br>
    <button type="submit" name="nappi"> Lähetä </button>


  </form>

</body>
</html>
