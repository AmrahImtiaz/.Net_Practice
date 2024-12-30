<?php
// Get form data
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Basic input validation
if (empty($name) || empty($email) || empty($message)) {
    die("Required fields are missing.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// Email content
$email_message = "
Name: $name
Email: $email
Phone: $phone
Subject: $subject
Message: $message
";

// Email sending
$to = "serein107@gmail.com"; 
$mail_subject = "New Message";
$headers = "From: $email\r\n" .
           "Reply-To: $email\r\n";

if (mail($to, $mail_subject, $email_message, $headers)) {
    // Redirect to success page
    header("Location: ../mail-success.html");
    exit;
} else {
    die("Failed to send the email. Please try again later.");
}
?>
