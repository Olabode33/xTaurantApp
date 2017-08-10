<?php

	require("sendgrid-php/sendgrid-php.php");
	
	$from = new SendGrid\Email("xTaurantApp", "info@xtaurantapp.com");
	$subject = "Sending with SendGrid is Fun";
	$to = new SendGrid\Email("Benedict Echekwube", "becheks@gmail.com");
	$content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
	$mail = new SendGrid\Mail($from, $subject, $to, $content);
	
	$apiKey = getenv('');
	
	$sg = new \SendGrid($apiKey);
	
	$response = $sg->client->mail()->send()->post($mail);
	
	echo $response->statusCode();
	print_r($response->headers());
	echo $response->body();

?>