<?php
include ('db.php');
$str = urldecode($_GET['val']);
if ($_GET['type'] == 1)
{
$database_query = $bdd->query("SELECT `VILLE`, `ADR`, `CP` FROM musee where `CP` LIKE CONCAT(".$str.",  '___' )");
$array = $database_query->fetchAll();
}
if ($_GET['type'] == 0)
{
$database_query = $bdd->query("SELECT `VILLE`, `ADR`, `CP` FROM musee where `VILLE` = '".$str."' ");
$array = $database_query->fetchAll();
}

$i = 1;
$tab = $array[0]["ADR"]."=".$array[0]["VILLE"]."=".$array[0]["CP"];
while (isset($array[$i]))
{
$tab = $tab."+".$array[$i]["ADR"]."=".$array[$i]["VILLE"]."=".$array[$i]["CP"];

$i++;
}
echo $tab;


?>