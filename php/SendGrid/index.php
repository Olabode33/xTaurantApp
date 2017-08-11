<?php
	echo 'Curl: ', function_exists('curl_version') ? 'Enabled' : 'Disabled';

	require("sendgrid-php/sendgrid-php.php");
	
	$from = new SendGrid\Email("Test Account", "test@xtaurantapp.com");
	$subject = "Sending with SendGrid is Fun";
	$to = new SendGrid\Email("Benedict Echekwube", "becheks@gmail.com");
	$content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
	$mail = new SendGrid\Mail($from, $subject, $to, $content);
	
	$apiKey = getenv('SENDGRID_API_KEY');
	if(isset($apiKey))
		echo $apiKey;
	else
		echo 'No Api Key';
	
	$sg = new \SendGrid($apiKey);
	
	$response = $sg->client->mail()->send()->post($mail);
	
	echo $response->statusCode();
	print_r($response->headers());
	echo $response->body();

?>
