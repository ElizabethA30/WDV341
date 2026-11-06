<?php
header("Content-Type: application/json");
require_once("includes/dbConnect.php");
require_once("classes/classes.php");


 $id = 4;
    $sql = "SELECT * FROM wdv341_events WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([":id" => $id]);

    if ($stmt->rowCount() == 0) {

        $errorResponse = [
            "status" => "error", 
            "message" => "Event not found"];

        echo json_encode($errorResponse);
        error_log (json_encode($errorResponse));
    } else {

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            $outputObj = new Event();

                $outputObj -> events_id = $row['id'];
                $outputObj -> events_name = $row['name'];
                $outputObj -> events_description = $row['description'];
                $outputObj -> events_presenter = $row['presenter'];
                $outputObj -> events_date = $row['event_date'];
                $outputObj -> events_time = $row['event_time'];

            echo json_encode($outputObj);  
                
        }
    }
        ?>