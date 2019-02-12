<?php

	// If you are using Composer
	require 'vendor/autoload.php';

	if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$mailFrom = $_POST['email'];
	$message = $_POST['message'];

	$mailTo = "ryan96db@gmail.com";


	$from = new SendGrid\Email(null, $mailFrom);
	$subjectSend = $subject;
	$to = new SendGrid\Email(null, $mailTo);
	$content = new SendGrid\Content("text/plain", $message);
	$mail = new SendGrid\Mail($from, $subjectSend, $to, $content);

	$apiKey = getenv('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');
	$sg = new \SendGrid($apiKey);

	$response = $sg->client->mail()->send()->post($mail);
	echo $response->statusCode();
	echo $response->headers();
	echo $response->body();

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