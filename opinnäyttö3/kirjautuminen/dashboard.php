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
echo "<br><br><a href=\"logout.php\">Kirjaudu ulos</a>";

?>
