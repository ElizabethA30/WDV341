 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>

  <?php

    require "includes/functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST["first_name"] ?? "");
    $last_name = trim($_POST["last_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $reason = trim($_POST["contactReason"] ?? "");
    $comments = trim($_POST["comments"] ?? "");
    $honeypot = trim($_POST["website"] ?? "");

    $date= date("m-d-Y");

    // if (empty($_POST["first_name"]))
    //     {
    //         echo"Name is required.";
    //         exit();
    //     }

    // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo "Valid email address";
    // } else {
    //     echo "Invalid email address";
    //     exit();
    // }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contactForm.php?status=failEmail");
        exit();
    }


    if ($honeypot !== "") {
        header("Location: contactForm.php?status=failHoneypot");
        exit();
    }


    $to = $email;

    $subject = "Urban Gardens LLC ". htmlspecialchars($reason) . " Confirmation";

    $body = "<div style='background-color: #CED7DC; padding:0 10px 0 10px; border:solid 1px #322C23; max-width:500px'> <h3 style='color: #322C23;'>Thank you for contacting Urban Gardens " . htmlspecialchars($first_name) . " " . htmlspecialchars($last_name) . "!</h3>
    <p style='color: #322C23;'> We have recieved your message in regards to " . htmlspecialchars($reason) . " on " . $date . ".</p> 
    <p style='color: #322C23;'>We will be in contact with you soon. We look forward to working with you!</p>
    <p style='color: #322C23;'> Sincerely, <br> Urban Gardens LLC </p> </div>"
            
    ;

    sendEmail($to, $subject, $body);

    $buisnessEmail= "achesonelizabeth30@gmail.com";

    $to = $buisnessEmail;

    $subject ="Contact Form for " . htmlspecialchars($first_name) . " " . htmlspecialchars($last_name);

    $body = "<h3> Contact form information: </h3> <p> Name: " . htmlspecialchars($first_name) . " " . htmlspecialchars($last_name) ." </p> <p>Email: " . htmlspecialchars($email) . "</p> <p>Reason for contacting: " . htmlspecialchars($reason) . "</p> <p>Comments: " . htmlspecialchars($comments) . "</p> <p>Date of Contact: " . $date . "</p>";

    sendEmail($to, $subject, $body);

    header("Location: contactForm.php?status=success");
}
    ?>

 <body>
    
 </body>
 </html>
 
   