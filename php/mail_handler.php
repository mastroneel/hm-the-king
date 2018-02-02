<?php
if(isset($_POST['submit'])){
    $to = "hm@brandedspiritsusa.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $company = $_POST['company'];
    $companytype = $_POST['companytype'];
    $phone = $_POST['phone'];
    $subject = "Form submission For HM the King";
    $subject2 = "Copy of your HM the King form submission";
    $message = "Full Name: " . $name ."\n\n".
     "Company Name: " . $company ."\n\n".
     "Company Type: ". $companytype ."\n\n".
     "Phone Number: " . $phone . "\n\n" .
     " Message: " . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $firstname . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>
