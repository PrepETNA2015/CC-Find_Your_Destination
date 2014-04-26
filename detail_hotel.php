<?php
include ("db.php");
$database_query = $bdd->query("SELECT * FROM hotel where `id` = ".$_GET['id']."");
$array = $database_query->fetchAll();


$tab = $array[0]["ADRESSE"]." ".$array[0]["COMMUNE"]." ".$array[0]["CODE POSTAL"];
$etoiles_base=explode(" ",$array[0]["CLASSEMENT"]);
$etoile_base=(int)$etoiles_base[0];
$aff_e = "";
for ($i =0; $i < $etoile_base; $i++)
{
$aff_e = $aff_e."&#9734";
}
$tableau = parse_url($array[0]["SITE INTERNET"]);
if(!isset($tableau["scheme"]) && $array[0]["SITE INTERNET"] != "-")
{
$array[0]["SITE INTERNET"] = "http://".$array[0]["SITE INTERNET"];
}
echo '<h3>'.$array[0]["NOM COMMERCIAL"].''.$aff_e.'</h3>
<p><span class="glyphicon glyphicon-home"></span> Adresse: '.$tab.'</p>
<p><span class="glyphicon glyphicon-phone-alt"></span> Téléphone: '.$array[0]["TÉLÉPHONE"].'</p>
<p><span class="glyphicon glyphicon-envelope"></span> Mail: '.$array[0]["COURRIEL"].'</p>
<p><span class="glyphicon glyphicon-globe"></span> Site: <a href="'.$array[0]["SITE INTERNET"].'" target="_blank">'.$array[0]["SITE INTERNET"].'</a></p>
<p><span class="glyphicon glyphicon-info-sign"></span> Capacité d\'accueil: '.$array[0]["CAPACITÉ D'ACCUEIL (PERSONNES)"].'</p>
<p><span class="glyphicon glyphicon-info-sign"></span> Nombre de chambres: '.$array[0]["NOMBRE DE CHAMBRES"].'</p>';

?>