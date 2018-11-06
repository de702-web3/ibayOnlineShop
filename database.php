<?php

$dbHost = "mysql02.comp.dkit.ie";
$dbName = "D00189953";
$dbPassword = "73MTTZin";
$dbUsername="D00189953";
try {
$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
  
} catch (PDOExceptionc $e) {
    $error_message = $e->getMessage();
    inclcude("database_error.php");
    exit();
}