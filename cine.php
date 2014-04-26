<?php
include ('db.php');
$str = urldecode($_GET['val']);
if ($_GET['type'] == 1)
{
$database_query = $bdd->query("SELECT `AdrCommune`, `AdrNumVoie`, `AdrCdPostal` FROM cinema where `AdrCdPostal` LIKE CONCAT(".$str.",  '___' )");
$array = $database_query->fetchAll();
}
if ($_GET['type'] == 0)
{
$database_query = $bdd->query("SELECT `AdrCommune`, `AdrNumVoie`, `AdrCdPostal` FROM cinema where `AdrCommune` = '".$str."' ");
$array = $database_query->fetchAll();
}

$i = 1;
$tab = $array[0]["AdrNumVoie"]."=".$array[0]["AdrCommune"]."=".$array[0]["AdrCdPostal"];
while (isset($array[$i]))
{
$tab = $tab."+".$array[$i]["AdrNumVoie"]."=".$array[$i]["AdrCommune"]."=".$array[$i]["AdrCdPostal"];

$i++;
}
echo $tab;


?>