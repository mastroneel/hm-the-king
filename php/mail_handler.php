<?php
if(isset($_POST['submit']) && !empty($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6Ldyk0wUAAAAAB37-piqRNf_n67130OT_sY8pXG0';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
            //contact form submission code
            $name = !empty($_POST['name'])?$_POST['name']:'';
            $email = !empty($_POST['email'])?$_POST['email']:'';
            $message = !empty($_POST['message'])?$_POST['message']:'';
            $company = !empty($_POST['company'])?$_POST['company']:'';
            $companytype = !empty($_POST['companytype'])?$_POST['companytype']:'';
            $phone = !empty($_POST['phone'])?$_POST['phone']:'';

            $to = 'hm@brandedspiritsusa.com';
            $from = $_POST['email'];
            $subject = 'New HM The King contact form submission';
            $subject2 = 'Copy of your HM The King contact form submission';
            $htmlContent = "
                <h1>Contact request details</h1>
                <p><b>Name: </b>".$name."</p>
                <p><b>Email: </b>".$email."</p>
                <p><b>Company Name: </b>".$company."</p>
                <p><b>Company Type: </b>".$companytype."</p>
                <p><b>Phone: </b>".$phone."</p>
                <p><b>Message: </b>".$message."</p>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
            //send email
            @mail($to,$subject,$htmlContent,$headers);
            @mail($from,$subject2,$htmlContent,$headers);

            $succMsg = 'Your contact request have submitted successfully.';
            echo "Mail Sent. Thank you " . $firstname . ", we will contact you shortly.";
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        echo "Please click on the reCAPTCHA box and try again.";
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
endif;
?>
