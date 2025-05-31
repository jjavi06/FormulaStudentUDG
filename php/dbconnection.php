<?php
$server = "localhost";
$dbName = "racingdivision";
$user = "racingdivision";
$password = "RacingUdG25#.";
$dsn = 'mysql:host=' . $server . ';dbname=' . $dbName;

try{
    $conn = new PDO($dsn, $user, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo 'Error: '. $ex;
}
?>