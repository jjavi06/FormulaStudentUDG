<?php
require 'claves.php';
$server = "localhost";
$dbName = GetDBName();
$user = GetDBUser();
$password = GetDBPassword();
$dsn = 'mysql:host=' . $server . ';dbname=' . $dbName;

try{
    $conn = new PDO($dsn, $user, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo 'Error: '. $ex;
}
?>