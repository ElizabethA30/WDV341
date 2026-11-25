<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .confirmationstmt{
            margin: 50px auto;
            padding:20px;
            border: solid 3px darkblue;
            border-radius:10px;
            max-width:500px;
            background-color:lightblue;
        }

        .btn{
            margin-top:40px;
            text-align:center;
        }
        
        a{  
            text-decoration:none;
            color:white;
            padding:5px 10px;
            background-color:darkblue;
            border-radius:10px;
            
        }

    </style>
</head>
<body>
</body>
</html>

<?php
require_once("includes/dbConnect.php");

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    

$name  = trim($_POST["name"] ?? "");
$description = trim($_POST["description"] ?? "");
$presenter  = trim($_POST["presenter"] ?? "");
$event_date  = $_POST["event_date"] ?? "";
$event_time  = $_POST["event_time"] ?? "";   


$errors = [];

if ($name === "") {
    $errors[] = "Event name is required.";
}

if ($description === "") {
    $errors[] = "Description is required.";
}

if ($presenter === "") {
    $errors[] = "Presenter is required.";
}

if ($event_date === "") {
    $errors[] = "Please select an event date.";
}

if ($event_time === "") {
    $errors[] = "Please select an event time.";
}

if (!empty($errors)) {
echo "<div class='confirmationstmt'> <h3>The event wasn't added to the database. </h3> <h4>Please fix the following errors:</h4>";

    foreach ($errors as $error) {
        
        echo "<p>$error</p>";     
    }
    echo "<div class='btn'> <a href='eventInputForm.php'>Return to Form</a> </div></div>";

    unset($_SESSION["token"]);
    exit;
}

if (hash_equals($_SESSION["token"], $_POST["token"])){
unset($_SESSION["token"]);
$sql = "
  INSERT INTO wdv341_events
  (
      name,
      description,
      presenter,
      event_date,
      event_time
  )
  VALUES
  (
      :eventName,
      :description,
      :presenter,
      :eventDate,
      :eventTime
  )";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":eventName", $name);
$stmt->bindParam(":description", $description);
$stmt->bindParam(":presenter", $presenter);
$stmt->bindParam(":eventDate", $event_date);
$stmt->bindParam(":eventTime", $event_time);

if($stmt->execute()){
    echo "<div class='confirmationstmt'> The event has been successfully added to the database! 
    <div class='btn'> <a href='eventInputForm.php'>Return to Form</a> </div>
    </div>";
}else{
    echo "<div class='confirmationstmt'> The event wasn't added to the database. Please Try Again 
    <div class='btn'> <a href='eventInputForm.php'>Return to Form</a> </div>
    </div>";
}
}else{
    echo "<div class='confirmationstmt'> An error occurred. Please Try Again.
    <div class='btn'> <a href='eventInputForm.php'>Return to Form</a> </div>
    </div>";
}
} else{
    echo "<div class='confirmationstmt'> An error occurred. Please Try Again.
    <div class='btn'> <a href='eventInputForm.php'>Return to Form</a> </div>
    </div>";
    // exit("Invalid request.");
}





?>







