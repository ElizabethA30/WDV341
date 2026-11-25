<?php

require_once("includes/dbConnect.php");

$id = $_GET["id"] ?? " ";

$sql = "DELETE
        FROM wdv341_events
        WHERE id = :id";
$message = "Successfully Deleted Event";
try{
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if($stmt->rowCount() == 0){
        $message = "Unsuccessfully Deleted Event";
    }
    header("Location: selectEvents.php?message=$message");
} catch (Exception $e){
    $message = "Unable to delete";
    header("Location: selectEvents.php?message=$message");
}
?>