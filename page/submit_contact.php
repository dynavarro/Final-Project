<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the input data
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    // Specify the recipient email
    $to = 'info@ewingsmh.org';  // Change this to your institution's email address
    $subject = 'New Contact from Website';
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Prepare the email body
    $message = "You have received a new contact request.\n\n";
    $message .= "Phone: " . $phone . "\n";
    $message .= "Email: " . $email . "\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo 'Thank you for contacting us.';
    } else {
        echo 'Sorry, there was an error. Please try again later.';
    }
}
?>
