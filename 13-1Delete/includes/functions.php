<?php 
function log_in($user, $pass, $pdo = null){
    if(!$pdo){
       include "dbConnect.php"; 
    }
    $sql= "SELECT event_user_password
    FROM event_user
    WHERE event_user_name = :username";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":username", $user);
    $stmt->execute();
    $result = $stmt->fetch();

    if($result && password_verify($pass, $result["event_user_password"])) {
        $_SESSION['validUser'] = true;
        return true;
    }else {
        $_SESSION['validUser'] = false;
        return false;
    };
}
?>