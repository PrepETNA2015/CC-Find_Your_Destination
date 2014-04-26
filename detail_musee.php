<?php
include ("db.php");
$str = urldecode($_GET['value']);
if ($_GET['type'] == 1)
{
$database_query = $bdd->query("SELECT * FROM musee where `CP` LIKE CONCAT(".$str.",  '___' )");
$array = $database_query->fetchAll();
}
if ($_GET['type'] == 0)
{
$database_query = $bdd->query("SELECT * FROM musee where `VILLE` = '".$str."' ");
$array = $database_query->fetchAll();
}

$i = 0;
$aff ="";
while (isset($array[$i]))
{
$tab = $array[$i]["ADR"]." ".$array[$i]["VILLE"]." ".$array[$i]["CP"];
$tableau = parse_url($array[$i]["SITWEB"]);
if(!isset($tableau["scheme"]) && $array[$i]["SITWEB"] != "-")
{
$array[$i]["SITWEB"] = "http://".$array[$i]["SITWEB"];
}
$aff = $aff.'<h3>'.$array[$i]["NOM DU MUSEE"].'</h3>
<p><span class="glyphicon glyphicon-home"></span> Adresse: '.$tab.'</p>
<p><span class="glyphicon glyphicon-globe"></span> Site: <a href="'.$array[$i]["SITWEB"].'" target="_blank">'.$array[0]["SITWEB"].'</a></p>
<p><span class="glyphicon glyphicon-info-sign"></span> Fermeture annuelle: '.$array[$i]["FERMETURE ANNUELLE"].'</p>
<p><span class="glyphicon glyphicon-info-sign"></span> Période d\'ouverture: '.$array[$i]["PERIODE OUVERTURE"].'</p><br />';

$i++;
}
echo $aff;

?>