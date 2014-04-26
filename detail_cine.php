<?php
include ("db.php");

$str = urldecode($_GET['value']);

if ($_GET['type'] == 1)
{
$database_query = $bdd->query("SELECT * FROM cinema where `AdrCdPostal` LIKE CONCAT(".$str.",  '___' )");
$array = $database_query->fetchAll();
}
if ($_GET['type'] == 0)
{
$database_query = $bdd->query("SELECT * FROM cinema where `AdrCommune` = '".$str."' ");
$array = $database_query->fetchAll();
}
$i = 0;
$aff= "";
while (isset($array[$i]))
{
$tab = $array[$i]["AdrNumVoie"]." ".$array[$i]["AdrCommune"]." ".$array[$i]["AdrCdPostal"];

$aff = $aff.'<h3>'.$array[$i]["Enseigne"].'</h3>
<p><span class="glyphicon glyphicon-home"></span> Adresse: '.$tab.'</p>
<br />';
$i++;
}
echo $aff;
?>