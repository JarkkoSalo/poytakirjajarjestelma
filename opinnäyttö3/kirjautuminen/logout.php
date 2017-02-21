<?php

session_start();
session_destroy(); // Destroying session (Logging out!);

header('Location: http://cosmo.kpedu.fi/~jarkkosalo/php2017/pöytäkirjasysteemi/kirjautuminen/login.php');
exit();

?>
