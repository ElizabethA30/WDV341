<?php  
session_start();
if (empty($_SESSION["token"])) {
    $_SESSION["token"] = bin2hex(random_bytes(32));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .formContainer {
            margin: 0px auto;
            max-width: 70%;
            background-color: lightblue;
            padding: 20px;
            border: solid 3px darkblue;
            border-radius: 10px;
            background-color: lightblue;
        }

        h2{
            text-align: center;
            margin:0px;
        }

        .formlayout {
            display: grid;
            grid-template-columns: auto auto auto;
        }

        div {
            padding:20px;
        }

        .button{
            padding-top: 20px;
            margin: 0px auto;
            grid-column: 2;
        }

        button{
            color:white;
            padding:5px 10px;
            background-color:darkblue;
            border:none;
            border-radius:10px;
        }
    </style>
</head>

<body>
    <div class="formContainer"> 

        <h2>Add an Event to the Events Table!</h2>

    <form action="insertEvent.php" method="post">

        <div class="formlayout">
            <div>
                <label>
                    Event Name: <input type="text" name="name">
                </label>
            </div>
            <div>
                <label>
                    Event Description: <input type="text" name="description">
                </label>
            </div>
            <div>
                <label>
                    Event Presenter: <input type="text" name="presenter">
                </label>
            </div>
            <div>


                <label>
                    Event Date: <input type="date" name="event_date">
                </label>
            </div>
            <div>
                <label>
                    Event Time: <input type="time" name="event_time">
                </label>
            </div>

            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

            <div class="button">
                <button type="submit">Add to Database</button>
            </div>
        </div>

    </form>
</div>
</body>

</html>