<?php

$host = "";
$dbname = "";
$username = "";
$password = "";



try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connectionSuccess = true;
    
} catch (PDOException $e){
    $connectionSuccess = false;
    $e->getMessage();
    error_log($e->getMessage()); 
}

?>