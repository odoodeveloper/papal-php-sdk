<?php
// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
require 'D:/projects/paypal/vendor/autoload.php';
// 2. Provide your Secret Key. Replace the given one with your app clientId, and Secret
// https://developer.paypal.com/webapps/developer/applications/myapps
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AYacgC24ta3aZyv9tlowv9ujcYWLwBiXLW-rv0IyD-xBBvycstKCw9M4o0cgY1a7GquINry1BbZ8YthG',     // ClientID
        'EI6iI8xZz3mYQjbFM5zrg1rI0dhUB1RnJo5Y119idE5nijWO8rsaptvrSu8fxlKugdLBBVkDkGBrhmgU'      // ClientSecret
    )
);
// 3. Lets try to save a credit card to Vault using Vault API mentioned here
// https://developer.paypal.com/webapps/developer/docs/api/#store-a-credit-card
$creditCard = new \PayPal\Api\CreditCard();
$creditCard->setType("visa")
    ->setNumber("4032034501927795")
    ->setExpireMonth("06")
    ->setExpireYear("2021")
    ->setCvv2("123")
    ->setFirstName("Tharanga")
    ->setLastName("Jayasinghe");
// 4. Make a Create Call and Print the Card
try {
    $creditCard->create($apiContext);
     var_dump($creditCard);
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception. 
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}