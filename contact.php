<?php
  // Replace with your real receiving email address
  $receiving_email_address = 'ferdinandmanurung937@gmail.com';

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and assign form data to variables
    $from_name = htmlspecialchars(trim($_POST['name']));
    $from_email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Prepare the email headers
    $headers = "From: $from_email\r\n";
    $headers .= "Reply-To: $from_email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Prepare the email body
    $email_body = "You have received a new message from $from_name.\n\n";
    $email_body .= "Email: $from_email\n\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message";

    // Send the email
    if (mail($receiving_email_address, $subject, $email_body, $headers)) {
      // Email sent successfully
      echo "Your message has been sent successfully!";
    } else {
      // Email sending failed
      echo "There was an issue sending your message. Please try again.";
    }
  } else {
    echo "Invalid request.";
  }
?>
