<?php
// muodostetaan yhteys tietokantaan
try {
    $yhteys = new PDO("mysql:host=localhost;dbname=data15", "data15", "jNTKdg3NTbRBuVEn");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
// virheenkäsittely: virheet aiheuttavat poikkeuksen
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// merkistö: käytetään latin1-merkistöä; toinen yleinen vaihtoehto on utf8.
$yhteys->exec("SET NAMES utf8");


?>
