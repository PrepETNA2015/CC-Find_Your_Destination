<?php
include ('db.php');

$query=$_GET["q"];
$type=$_GET["type"];

if ($type == "dep")
{
	$database_query = $bdd->query("SELECT departement_code,departement_nom FROM departement WHERE departement_code REGEXP '^" . $query . "' OR departement_nom REGEXP '^" . $query . "' LIMIT 0,5");
	if (strlen($query)>0)
	{
	$hint="";
	while ($x = $database_query->fetch())
		{    
			$var = $x['departement_code'] . " " . $x['departement_nom'];
			$tmp = preg_replace("/ /", "&nbsp;", $var);
			$hint=$hint.'<a href="#" onclick=fill_input("dep","' . $tmp . '")>' . $x['departement_code'] . ' ' . $x['departement_nom'] . '</a><br>';
		}
	  }
	if ($hint=="")
	  {
	  $response="No Suggestion";
	  }
	else
	  {
	  $response=$hint;
	  
	  }
	echo $response;
}
if ($type == "ville")
{
	$database_query = $bdd->query("SELECT DISTINCT COMMUNE FROM hotel WHERE COMMUNE REGEXP '^" . $query . "' LIMIT 0,5");
	if (strlen($query)>0)
	{
	$hint="";
	while ($x = $database_query->fetch())
		{    
			$tmp = preg_replace("/ /", "&nbsp;", $x['COMMUNE']);
			$hint=$hint.'<a href="#" onclick=fill_input("ville","' . $tmp . '")>' . $x['COMMUNE'] . '</a><br>';
		}
	  }
	if ($hint=="")
	  {
	  $response="No Suggestion";
	  }
	else
	  {
	  $response=$hint;
	  
	  }
	echo $response;
}
if ($type == "hotel_nom")
{
	$database_query = $bdd->query("SELECT `NOM COMMERCIAL` FROM hotel WHERE `NOM COMMERCIAL` REGEXP '^" . $query . "' LIMIT 0,5");
	if (strlen($query)>0)
	{
	$hint="";
	while ($x = $database_query->fetch())
		{
			$tmp = preg_replace("/ /", "&nbsp;", $x['NOM COMMERCIAL']);
			$hint=$hint.'<a href="#" onclick=fill_input("hotel_nom","' . $tmp . '")>' . $x['NOM COMMERCIAL'] . '</a><br>';
		}
	  }
	if ($hint=="")
	  {
	  $response="No Suggestion";
	  }
	else
	  {
	  $response=$hint;
	  
	  }
	echo $response;
}


?>