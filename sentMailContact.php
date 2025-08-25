<?php

include("links.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor1/phpmailer/phpmailer/src/Exception.php';
require 'vendor1/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor1/phpmailer/phpmailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name']; //take from form
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    // Set up PHPMailer
    $mail = new PHPMailer(true);

    // Server settings for Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'javeriakhan0330@gmail.com'; // Your Gmail email address
    $mail->Password = 'xdga gruw tfsy atte'; // Your Gmail password or App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender info
    $mail->setFrom($email, $name);

    // Webiste email address
    $adminEmail = 'javvikhan2352001@gmail.com';

    // Recipient
    $mail->addAddress($adminEmail);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "
        <html>
            <head>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css'>
            <link href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>
            <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
            <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
            <style>
                 body{
                      font-family: 'Poppins',sans-serif;
                 }
            </style>
            </head>
            <body>
                <div style='background-color:#f5ebe5;padding:20px 30px;border-radius:20px;'>
                    <center>
                        <div style='border-bottom:1.5px solid black;padding-bottom:10px;border-top:1.5px solid black;'>
                            <h1 style='font-family:'Poppins',sans-serif;'><strong>TravelEase</strong></h1>
                        </div>
                        <br>
                        <div style='padding:20px 0px;background-color:white;border-radius:20px;'>
                            $message
                        </div>
                    </center>
                </div>
            </body>
        </html>";

    // Send email
    $mail->send();

    header("Location:index.php");
}
