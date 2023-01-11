<?php
// chạy bằng command 
require "./vendor/autoload.php";
// init configuration
$clientID = "514942483038-t9obibinl8dvr1lugsd955g392vjeih1.apps.googleusercontent.com";
$clientSecret = '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';
// link trả về kết quả
$redirectUri = 'http://localhost/php/Ismart/user/?mod=login&controller=index&action=layout';
   
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


?>