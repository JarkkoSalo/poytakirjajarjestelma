<?php

// With this script you can create account with salted password! Run once per name! Move out from document directory after user creation!

$cryptoSalt = "VaFLknq2atLNddgEq9Z3aRKbMAYckk3Z2nmxJfv9xfDWexHuXA9fT4xLkE74yZVr39qVfU9bHUsVhG4u4k67wZH"; // Making your hashs stronger!

$yourUsername = "Admin"; // Username here
$yourPassword = "k1sum1rr145678"; // Password here

	$databaseHost = "127.0.0.1";
	$databaseUser = "data15";
	$databasePassword = "jNTKdg3NTbRBuVEn";
	$databaseName = "data15";

	$dbLink = mysqli_connect($databaseHost, $databaseUser, $databasePassword, $databaseName);

	mysqli_query($dbLink, "INSERT INTO `707A_kayttajat` (`kayttaja`, `salasana`) VALUES ('" . $yourUsername . "', '" . sha1($cryptoSalt . $yourPassword) . "')");

echo "Käyttäjä luotu. Siirrä tämä skripti pois dokumenttikansiosta, äläkä suorita tätä samalla nimellä muuten kantaan tulee kaksi saman nimistä käyttäjää! ;)"
?>
