<?php
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
            color: maroon;
            font-size: 45px;
        }

        .container {
            max-width: 980px;
            margin: 0 auto;
            border: 3px solid pink;
            border-radius: 10px;
            /* padding: 15px; */
        }

        .table {
            display: flex;
            border-bottom: 1px solid pink;
            border-top: 1px solid pink;
        }

        .name {
            width: 150px;
            padding: 10px;
            border-right: 1px solid pink;
        }

        .description {
            width: 325px;
            padding: 10px;
            border-right: 1px solid pink;
        }

        .presenter {
            width: 150px;
            padding: 10px;
            border-right: 1px solid pink;
        }

        .event_date {
            width: 150px;
            padding: 10px;
            border-right: 1px solid pink;
        }

        .event_time {
            width: 150px;
            padding: 10px;
            border-right: 1px solid pink;
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
    $sql = "SELECT * FROM wdv341_events";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        echo "<div class='error'> No Event Found. Please try again.</div>";
    } else {
    ?>
        <div class="container">
            <div class='table'>
                <div class="name title"> Event Name</div>

                <div class="description title">Description</div>

                <div class="presenter title">Presenter</div>

                <div class="event_date title">Event Date</div>

                <div class="event_time title">Event Time</div>

            </div>

        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='table'>";

            echo "<div class='name'>" . $row["name"] . "</div>";

            echo "<div class='description'>" . $row["description"] . "</div>";

            echo "<div class='presenter'>" . $row["presenter"] . "</div>";

            echo "<div class='event_date'>" . date("m/d/Y", strtotime($row["event_date"])) . "</div>";

            echo "<div class='event_time'>" . date("g:i a", strtotime($row["event_time"])) . "</div> <br>";

            echo "</div>";
        }
    }

        ?>
        </div>

</body>

</html>