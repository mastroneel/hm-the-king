<?php
if(isset($_POST['submit'])){
    $to = "hm@brandedspiritsusa.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $company = $_POST['company'];
    $companytype = $_POST['companytype'];
    $phone = $_POST['phone'];
    $subject = "HM the King Form Submission";
    $subject2 = "Copy of your HM the King form submission";
    $message = $name . " wrote the following:" . "\n\n" . "Name: " . $name . "\n\n" . "Company name: " . $company . "\n\n" .  "Company Type: " . $companytype . "\n\n" . "From: " . $from . "\n\n" . "Phone: " . $phone . "\n\n" . "Message: " . $_POST['message'];
    $message2 = "Here is a copy of your message " . "\n\n" . "Name: " . $name . "\n\n" . "Company name: " . $company . "\n\n" .  "Company Type: " . $companytype . "\n\n" . "From: " . $from . "\n\n" . "Phone: " . $phone . "\n\n" . "Message: " . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>
