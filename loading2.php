<?php
session_start();
?>

<?php

if(isset($_GET['lat']) && isset($_GET['long']) && isset($_GET['radius']))
	displayResults($_GET['lat'], $_GET['long'], $_GET['radius']);


function displayResults($lat, $long, $radius)
{
	$_SESSION["myLat"] = $lat;
	$_SESSION["myLong"] = $long;
}

header('refresh: 0; url=main.php');

?>