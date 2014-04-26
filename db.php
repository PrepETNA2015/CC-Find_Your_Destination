<?php
session_start();
$pass = "";
$user = "root";
$server = "localhost";
$db = "travel";
try
{
    $bdd = new PDO('mysql:host=' . $server . ';dbname=' . $db . ';charset=UTF8', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>