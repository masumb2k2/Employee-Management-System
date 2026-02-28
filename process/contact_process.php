<?php
// Handle contact form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validate inputs
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Full name is required";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email address is required";
    }
    
    if (empty($subject)) {
        $errors[] = "Subject is required";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }

    if (count($errors) === 0) {
        // Email configuration
        $to = "support@ems.com";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";

        // Email body
        $email_body = "
        <html>
        <head>
            <style>
                body { font-family: 'Montserrat', Arial, sans-serif; color: #333; }
                .container { max-width: 600px; margin: 0 auto; }
                .header { background: #0c6996; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
                .content { background: #f5f7fa; padding: 20px; border-radius: 0 0 5px 5px; }
                .field { margin: 15px 0; padding: 10px; background: white; border-left: 4px solid #0c6996; }
                .field-label { font-weight: bold; color: #0c6996; }
                .footer { font-size: 12px; color: #666; margin-top: 20px; text-align: center; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>New Contact Message</h2>
                </div>
                <div class='content'>
                    <div class='field'>
                        <div class='field-label'>Name:</div>
                        " . htmlspecialchars($name) . "
                    </div>
                    <div class='field'>
                        <div class='field-label'>Email:</div>
                        " . htmlspecialchars($email) . "
                    </div>
                    <div class='field'>
                        <div class='field-label'>Phone:</div>
                        " . htmlspecialchars($phone ?: 'Not provided') . "
                    </div>
                    <div class='field'>
                        <div class='field-label'>Subject:</div>
                        " . htmlspecialchars($subject) . "
                    </div>
                    <div class='field'>
                        <div class='field-label'>Message:</div>
                        " . nl2br(htmlspecialchars($message)) . "
                    </div>
                    <div class='footer'>
                        <p>This message was sent from the EMS Contact Page</p>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ";

        // Send email
        if (mail($to, "Contact Form Submission: " . $subject, $email_body, $headers)) {
            // Success - redirect back with success message
            header("Location: ../contact.html?success=1");
            exit;
        } else {
            // Email sending failed
            $_SESSION['contact_error'] = "Failed to send message. Please try again later.";
            header("Location: ../contact.html?error=1");
            exit;
        }
    } else {
        // Validation errors
        $_SESSION['contact_errors'] = $errors;
        header("Location: ../contact.html?error=1");
        exit;
    }
} else {
    // Not a POST request
    header("Location: ../contact.html");
    exit;
}
?>
