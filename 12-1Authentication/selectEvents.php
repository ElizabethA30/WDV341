<?php
session_start();

$message = $_GET['message'] ?? '';

if(!$_SESSION['validUser']){
    header("Location: login.php?message=Please Login");
}
require_once("includes/dbConnect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Events</title>

    <style>
        h1 {
            padding: 20px 0 20px 0;
            max-width: 980px;
            margin: 0 auto;
            color: darkblue;
            font-size: 45px;
        }

        h2 {
            padding: 20px 0 20px 0;
            max-width: 980px;
            margin: 0 auto;
            color: darkblue;
        }

        .Buttons {
            max-width: 980px;
            margin: 0 auto;       
        }

         .logoutBtn, .addEventBtn {
            padding: 2px 5px 2px 5px;
            background-color: lightblue;
            margin-right: 20px;
            color: darkblue;  
            text-decoration:none;  
            border-radius: 5px;
         }
         
         .actionBtn {
            padding: 2px 5px 2px 5px;
            background-color: lightblue;
            margin-bottom: 20px;
            color: darkblue;  
            text-decoration:none;  
            border-radius: 5px;        
        }

        .container {
            max-width: 980px;
            margin: 20px auto;
            border: 3px solid lightblue;
            border-radius: 10px;
            /* padding: 15px; */
        }

        .table {
            display: flex;
            border-bottom: 1px solid lightblue;
            border-top: 1px solid lightblue;
        }

        .name {
            width: 150px;
            padding: 10px;
            border-right: 1px solid lightblue;
        }

        .description {
            width: 325px;
            padding: 10px;
            border-right: 1px solid lightblue;
        }

        .presenter {
            width: 150px;
            padding: 10px;
            border-right: 1px solid lightblue;
        }

        .event_date {
            width: 150px;
            padding: 10px;
            border-right: 1px solid lightblue;
        }

        .event_time {
            width: 150px;
            padding: 10px;
            border-right: 1px solid lightblue;
        }

        .actions {
            width: 150px;
            padding: 10px;
            border-right: 1px solid lightblue;
        }

        .error {
            padding: 20px 0 20px 0;
            max-width: 980px;
            margin: 0 auto;
            font-size: 18px;
        }

        .title{
            font-size: large;
            font-weight: 600;
        }
    </style>

</head>

<body>

    <h1>Iowa Events</h1>
 <?php 
            if($message){
                echo "<h2>$message</h2>";
            }
        ?>

    <?php

    
    $sql = "SELECT * FROM wdv341_events";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        echo "<div class='error'> No Event Found. Please try again.</div>";
    } else {
    ?>
        <div class="Buttons"> <a href="eventInputForm.php" class="addEventBtn">Add an Event </a> 

         <a href="logout.php" class="logoutBtn">Logout </a> </div>

        <div class="container">

            <div class='table'>
                <div class="name title"> Event Name</div>

                <div class="description title">Description</div>

                <div class="presenter title">Presenter</div>

                <div class="event_date title">Event Date</div>

                <div class="event_time title">Event Time</div>

                <div class="actions title">Actions</div>

            </div>

        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='table'>";

            echo "<div class='name'>" . $row["name"] . "</div>";

            echo "<div class='description'>" . $row["description"] . "</div>";

            echo "<div class='presenter'>" . $row["presenter"] . "</div>";

            echo "<div class='event_date'>" . date("m/d/Y", strtotime($row["event_date"])) . "</div>";

            echo "<div class='event_time'>" . date("g:i a", strtotime($row["event_time"])) . "</div> <br>";


            echo "<div class='actions'><a class='actionBtn'>Update</a> <a class='actionBtn'>Delete</a></div>";

            echo "</div>";
        }
    }

        ?>
        </div>

</body>

</html>