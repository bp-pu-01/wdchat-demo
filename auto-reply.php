<?php
function login(){
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

	//Header data
	//Set the content type to application/json
	$headerData = array(
		'Content-Type: application/json'
	);

	//Encode the array into JSON.
	$jsonDataEncoded = json_encode($jsonData);

	//Tell cURL that we want to send a POST request.
	curl_setopt($ch, CURLOPT_POST, true);
	//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 

	//Attach our encoded JSON string to the POST fields.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headerData); 
	
	//return the transfer as a string 
	/*
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION , true);
	curl_setopt($ch, CURLOPT_AUTOREFERER , true);
	*/
	
	print '1111111<br>';
	//Execute the request
	$result = curl_exec($ch);
	$err = curl_error($ch);
	
	curl_close($ch);
	
	print '<br>';
	print '2222222<br>';
	print 'deviceKey : ' .$result['deviceKey']. '<br>';
	print 'userId : ' .$result['userId']. '<br>';
	print '3333333<br>';
	
	if($err){
		print 'ERROR : ' .$err. +'<br>';
	}else{
		print 'Result : ' .$result. +'<br>';
	}
	
}

function sendMessage($responseData){
	//API Url
	$url = 'https://apps.applozic.com/rest/ws/message/v2/send';

	//Initiate cURL.
	$ch = curl_init($url);

	//Set Request Body (JSON data)
	$jsonData = array(
		'to' => 'pu1',
		'message' => 'Hi pu1'
	);

	//Set Request Header
	$deviceKey = $responseData['deviceKey'];
	$userId = $responseData['userId'];
    $authorization = $userId.':'.$deviceKey;	
	$encodedString = base64_encode($authorization);
	$headerData = array(
		'Access-Token : admin admin',
		'Application-Key : 26454089450343aeb79319e5496f4283b',
		'Authorization : Basic ' . $encodedString,
		'Content-Type : application/json; charset=utf-8',
		'Device-Key : ' . $deviceKey,
		'UserId-Enabled : true'
		
	);

	//Encode the array into JSON.
	$jsonDataEncoded = json_encode($jsonData);

	//Tell cURL that we want to send a POST request.
	//curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 

	//Attach our encoded JSON string to the POST fields.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headerData); 
	
	//return the transfer as a string 
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	//Execute the request
	$result = curl_exec($ch);
	$err = curl_error($ch);
	
	curl_close($ch);
	
	
	if($err){
		print 'ERROR : ' .$err. +'<br>';
	}else{
		print 'Result : ' .$result. +'<br>';
	}
	
}

login();