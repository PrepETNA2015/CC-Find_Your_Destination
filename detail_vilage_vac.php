<?php
include ("db.php");
$str = urldecode($_GET['value']);
if ($_GET['type'] == 1)
{
$database_query = $bdd->query("SELECT * FROM ville_vacance where `CODE POSTAL` LIKE CONCAT(".$str.",  '___' )");
$array = $database_query->fetchAll();
}
if ($_GET['type'] == 0)
{
$database_query = $bdd->query("SELECT * FROM ville_vacance where `COMMUNE` = '".$str."' ");
$array = $database_query->fetchAll();
}

$i = 0;
$aff = "";
while (isset($array[$i]))
{
$etoiles_base=explode(" ",$array[$i]["CLASSEMENT"]);
$etoile_base=(int)$etoiles_base[0];
$aff_e = "";
for ($j =0; $j < $etoile_base; $j++)
{
$aff_e = $aff_e."&#9734";
}
$tab = $array[$i]["ADRESSE"]." ".$array[$i]["COMMUNE"]." ".$array[$i]["CODE POSTAL"];
$tableau = parse_url($array[$i]["SITE INTERNET"]);
if(!isset($tableau["scheme"]) && $array[$i]["SITE INTERNET"] != "-")
{
$array[$i]["SITE INTERNET"] = "http://".$array[$i]["SITE INTERNET"];
}
$aff = $aff.'<h3>'.$array[0]["NOM COMMERCIAL"].''.$aff_e.'</h3>
<p><span class="glyphicon glyphicon-home"></span> Adresse: '.$tab.'</p>
<p><span class="glyphicon glyphicon-phone-alt"></span> Téléphone: '.$array[$i]["TÉLÉPHONE"].'</p>
<p><span class="glyphicon glyphicon-envelope"></span> Mail: '.$array[$i]["COURRIEL"].'</p>
<p><span class="glyphicon glyphicon-globe"></span> Site: <a href="'.$array[$i]["SITE INTERNET"].'" target="_blank">'.$array[$i]["SITE INTERNET"].'</a></p>
<p><span class="glyphicon glyphicon-info-sign"></span> Capacité d\'accueil: '.$array[$i]["CAPACITÉ D'ACCUEIL (PERSONNES)"].'</p>
<p><span class="glyphicon glyphicon-info-sign"></span> Nombre de logements: '.$array[$i]["NOMBRE DE LOGEMENTS"].'</p><br />';

$i++;
}
echo $aff;

?>