<?php
session_start();
?>

<?php
$_SESSION["destName"] = $_POST["destination"];
$_SESSION["destDist"] = $_POST["distance"];
#echo $_POST["destination"];
#echo $_
header('refresh: 0; url=Loading.php');

?>