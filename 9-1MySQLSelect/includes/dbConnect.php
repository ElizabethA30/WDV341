<?php

$host = "localhost";
$dbname = "";
$username = "";
$password = "";



try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connectionSuccess = true;
   
} catch (PDOException $e){
    $connectionSuccess = false;
    echo "Connection failed: " . $e->getMessage();
    error_log($e->getMessage()); 
}

?>