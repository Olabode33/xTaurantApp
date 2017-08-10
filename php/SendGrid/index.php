<?php

	require("sendgrid-php/sendgrid-php.php");
	
	$request_body = json_decode('{
														  "personalizations": [
															{
															  "to": [
																{
																  "email": "becheks@gmail.com"
																}
															  ],
															  "subject": "Sending with SendGrid is Fun"
															}
														  ],
														  "from": {
															"email": "info@xtaurantapp.com"
														  },
														  "content": [
															{
															  "type": "text/plain",
															  "value": "and easy to do anywhere, even with PHP"
															}
														  ]
														}');
	
	$apiKey = getenv('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');
	$sg = new \SendGrid($apiKey);
	
	$response = $sg->client->mail()->send()->post($request_body);
	
	echo $response->statusCode();
	print_r($response->headers());
	echo $response->body();

?>
