<?php
 use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

function sendEmail($to, $subject, $body){

    $mail = new PHPMailer(true);

    try {
        // Server settings
        // Enable verbose debug output for troubleshooting.
        // Set to 0 in production to disable.
        $mail->SMTPDebug = 0;
        $mail->isSMTP(); // Use SMTP to send.
        $mail->Host = 'smtp.gmail.com'; // Specify Gmail's SMTP server.
        $mail->SMTPAuth = true; // Enable SMTP authentication.
        $mail->Username = 'achesonelizabeth30@gmail.com'; // Your full Gmail address.
        $mail->Password = ' '; // Your 16-character App Password.
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption.
        $mail->Port = 587; // TCP port for TLS.

        // Recipients
        $mail->setFrom('achesonelizabeth30@gmail.com', 'Urban Gardens LLC'); // Sender's email and name.
        $mail->addAddress($to, $to); // Recipient's email and name.
        // Optional: Add a CC or BCC recipient
        // $mail->addCC('cc_recipient@example.com');
        // $mail->addBCC('bcc_recipient@example.com');

        // Content
        $mail->isHTML(true); // Set email format to HTML.
        $mail->Subject = $subject; // Email subject.
        $mail->Body = $body; // HTML body.
        $mail->AltBody = $body; // Plain text for non-HTML clients.
        // Optional: Add an attachment
        // $mail->addAttachment('/path/to/your/file.pdf', 'filename.pdf');.

        $mail->send();
        echo 'Message has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>