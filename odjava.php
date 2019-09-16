<?php
require_once("sesija.class.php");
Sesija::kreirajSesiju();
Sesija::obrisiSesiju();
header("Location: prijava.php");
die();
?>

