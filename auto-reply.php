<?php

//API Url
$url = 'https://apps.applozic.com/rest/ws/register/client';

//Initiate cURL.
$ch = curl_init($url);

//The JSON data.
$jsonData = array(
    'userId' => 'admin',
    'email' => 'admin@wdchat.com',
	'password' => 'admin',
	'displayName' => 'admin',
	'applicationId' => '26454089450343aeb79319e5496f4283b',
	'deviceType' => '4',
	'registrationId' => '',
	'pushNotificationFormat' => '',
	'userTypeId' => '',
	'contactNumber' => ''
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

//Execute the request
$result = curl_exec($ch);