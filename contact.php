<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all necessary fields are filled
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        // Validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Construct the email
            $to = "manikaab@kean.edu"; // Change this to your email
            $subject = "New Contact Form Submission";
            $body = "Name: $name\nEmail: $email\nMessage: $message";

            // Send the email
            $result = mail($to, $subject, $body);

            if ($result) {
                echo "Thank you for your message. We will get back to you soon.";
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        } else {
            echo "Invalid email address. Please enter a valid email.";
        }
    } else {
        echo "Please fill in all the required fields.";
    }
}
?>
