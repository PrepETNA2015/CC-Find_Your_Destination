<?php
include ('db.php');
$str = urldecode($_GET['val']);
if ($_GET['type'] == 1)
{
$database_query = $bdd->query("SELECT `COMMUNE`, `ADRESSE`, `CODE POSTAL` FROM ville_vacance where `CODE POSTAL` LIKE CONCAT(".$str.",  '___' )");
$array = $database_query->fetchAll();
}
if ($_GET['type'] == 0)
{
$database_query = $bdd->query("SELECT `COMMUNE`, `ADRESSE`, `CODE POSTAL` FROM ville_vacance where `COMMUNE` = '".$str."' ");
$array = $database_query->fetchAll();
}

$i = 1;
$tab = $array[0]["ADRESSE"]."=".$array[0]["COMMUNE"]."=".$array[0]["CODE POSTAL"];
while (isset($array[$i]))
{
$tab = $tab."+".$array[$i]["ADRESSE"]."=".$array[$i]["COMMUNE"]."=".$array[$i]["CODE POSTAL"];

$i++;
}
echo $tab;

?>