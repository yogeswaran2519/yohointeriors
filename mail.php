<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $mobile  = trim($_POST['mobile'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if(empty($name) || empty($email) || empty($mobile) || empty($message)){
        die("All fields are required.");
    }

    $body = "New Enquiry Form Submission\n\n";
    $body .= "Name: $name\nEmail: $email\nMobile: $mobile\nMessage: $message\n";

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;           // 0=off, 2=verbose
        $mail->isSMTP();                // use SMTP
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'yogeswaran25032003@gmail.com';      // your Gmail
        $mail->Password   = 'scds wrnr ntqc nznk';         // App Password
        $mail->SMTPSecure = 'tls';                       // tls or ssl
        $mail->Port       = 587;                         // 587 for tls

        $mail->setFrom('yogeswaran25032003@gmail.com', 'Contact Form');
        $mail->addAddress('yogesyogi2519@gmail.com');

        $mail->isHTML(false);
        $mail->Subject = 'YOHO INTERIORS - Contact US';
        $mail->Body    = $body;

        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>