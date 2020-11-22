<?php
date_default_timezone_set('America/Los_Angeles');

//Connect to database
$database = "jigamagr_grc";
$username = "jigamagr_grcuser";
$password = "Berryn1ce!";
$hostname = "localhost";

$cnxn = mysqli_connect($hostname, $username, $password, $database)
or die("There was a problem.");
//var_dump($cnxn);