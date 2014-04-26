<?php
include ('db.php');
$str = urldecode($_GET['val']);
$_GET["etoile"] =(int)$_GET["etoile"];
if ($_GET["etoile"] == 0)
{
$_GET["etoile"] = '[1-5]';
}
if ($_GET['type'] == "dep")
{

$database_query = $bdd->query("SELECT `COMMUNE`, `ADRESSE`, `CODE POSTAL`,`id` FROM hotel where `CODE POSTAL` LIKE CONCAT(".$str.",  '___' ) AND `CLASSEMENT` REGEXP('^".$_GET['etoile']."')");
$array = $database_query->fetchAll();
}
if ($_GET['type'] == "ville")
{

$database_query = $bdd->query("SELECT `COMMUNE`, `ADRESSE`, `CODE POSTAL`,`id` FROM hotel where `COMMUNE` = '".$str."' AND `CLASSEMENT` REGEXP('^".$_GET['etoile']."')");
$array = $database_query->fetchAll();
}
if ($_GET['type'] == "hotel_nom")
{
$database_query = $bdd->query("SELECT `COMMUNE`, `ADRESSE`, `CODE POSTAL`,`id` FROM hotel where `NOM COMMERCIAL` = '".$str."' ");
$array = $database_query->fetchAll();
}
$i = 1;
$tab = $array[0]["ADRESSE"]."=".$array[0]["COMMUNE"]."=".$array[0]["CODE POSTAL"]."=".$array[0]["id"];
while (isset($array[$i]))
{
$tab = $tab."+".$array[$i]["ADRESSE"]."=".$array[$i]["COMMUNE"]."=".$array[$i]["CODE POSTAL"]."=".$array[$i]["id"];

$i++;
}
echo $tab;


?>