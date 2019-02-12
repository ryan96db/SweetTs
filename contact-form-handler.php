<?php

	// If you are using Composer
//    require 'vendor/autoload.php';
    require("sendgrid-php/sendgrid-php.php");

	if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$mailFrom = $_POST['email'];
	$message = $_POST['message'];

	$mailTo = "ryan96db@gmail.com";

        
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($mailFrom, $name);
    $email->setSubject($subject);
    $email->addTo($mailTo, $name);
    $email->addContent("text/plain", $message);
//    $email->addContent(
//                       "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
//                       );
    $sendgrid = new \SendGrid(getenv('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'));
    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }

	}



	

	// $email_from = "ryandb1596@gmail.com";

	// $email_subject = "New Form Submission"; 

	// $email_body = "User Name: ". $name. ".\n". "User Email: ". $visitor_email.".\n"
	// . "User Message: ". $message. ".\n";

	// $to = "ryan96db@gmail.com";

	// $headers = "From: ". $email_from. "\r\n";

	// $headers = "Reply-To: ". $visitor_email. "\r\n" 

	// mail($to,$email_subject,$email_body,$headers);

	// header("Location: contact.html");

	


?>
