<?php 
session_start();

require_once("includes/dbConnect.php");
require_once("includes/functions.php");

$message = $_GET['message'] ?? '';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
if(log_in($username, $password)){
    header("Location: selectEvents.php?message=Welcome Back");
}else {
    header("Location: login.php?message=Please Try Again");
};
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .loginForm{
        max-width:400px;
        margin: 0 auto;
        background-color: lightblue;
        border:2px solid darkblue;
        border-radius: 10px;
    }

    h2{
        display:flex;
        align-items: center;
        justify-content: center;
        color: darkblue;
        font-size:35px;
    }

    form {
        display:flex;
        flex-direction:column;
        align-items: center;
        justify-content: center;
    }

    input{
            color:darkblue;
            padding:5px 10px;
            background-color:white;
            border:2px solid darkblue;
            border-radius:10px;
            font-weight:700;
    }

</style>
</head>
<body>
    <div class="loginForm">
    <h2>Login</h2>
    <form method="post" action="login.php">
    <p>
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required>
    </p>

    <p>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required>
    </p>
        <?php 
            if($message){
                echo "<div>$message</div>";
            }
        ?>
    <p>
        <input type="submit" value="Login">
    </p>
</form>
</div>
</body>
</html>