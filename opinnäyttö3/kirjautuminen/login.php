<?php

session_start(); // Starting session

$cryptoSalt = "VaFLknq2atLNddgEq9Z3aRKbMAYckk3Z2nmxJfv9xfDWexHuXA9fT4xLkE74yZVr39qVfU9bHUsVhG4u4k67wZH"; // Making your hashs stronger!

if (isset($_SESSION["logged_user"]) && isset($_SESSION["logged_password"]))
{
	// We logged in already, redirecting to dashboard!

	header('Location: http://cosmo.kpedu.fi/~jarkkosalo/php2017/pöytäkirjasysteemi/dashboard.php');
	exit();
}

$loginResult = "";

if (isset($_POST["username"]) && isset($_POST["password"]))
{


	// Fill!

	$databaseHost = "127.0.0.1";
	$databaseUser = "data15";
	$databasePassword = "jNTKdg3NTbRBuVEn";
	$databaseName = "data15";

	$dbLink = mysqli_connect($databaseHost, $databaseUser, $databasePassword, $databaseName);


		$logUsername = mysqli_real_escape_string($dbLink, $_POST["username"]);
		$logPassword = sha1($cryptoSalt . mysqli_real_escape_string($dbLink, $_POST["password"]));

	if ($logUsername == "" || $logPassword == "")
	{
		die("Täytä kaikki kentät!");
	}


	if (mysqli_num_rows(mysqli_query($dbLink, "SELECT * FROM 707A_kayttajat WHERE kayttaja = '" . $logUsername . "' AND salasana = '" . $logPassword . "' LIMIT 1")) == 1)
	{
		// Login success!

		$_SESSION["logged_user"] = $logUsername;
		$_SESSION["logged_password"] = $logPassword;
		header('Location: http://cosmo.kpedu.fi/~jarkkosalo/php2017/pöytäkirjasysteemi/index.php');
		exit();

	}
	else
	{
		$loginResult = "Käyttäjätunnus tai salasana on virheellinen.";
	}

}

?>

<?php echo $loginResult; ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<form method="post">
<p><strong>Käyttäjänimi:</strong></p>
<p><input type="text" name="username"></p>
<p><strong>Salasana:</strong></p>
<p><input type="password" name="password"></p>
<p><input type="submit" value="Kirjaudu"></p>
</form>
</body>
</html>
