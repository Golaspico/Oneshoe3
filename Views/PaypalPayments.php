<?php

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredentials;

use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Exception\PPConnectionException;


session_start();
$db = new PDO('mysql:host=localhost;dbname=oneshoe','root','');
require __DIR__ . '../../paypalpayments/vendor/autoload.php';


// API

$api = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AcyZ9O0HRJMGKOBEYozpeIgdzf0jyC1Vp-HYnZopKaoRFBRksJgqBs-Ofhn8h3voAtSZBKiVTCawOesH',
            'EAV2AWR-PPVxOz2AALfgwmPprdAkVFVYzeHvWbKKz6fVYTjapgWGpUZVn5TRNgRiy_rVzfPDhZgadVcQ'
            )
    );

$api->setConfig([
    'mode' => 'sandbox',
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => false,
    'log.FileName' => '',
    'log.LogLevel' => 'FINE',
    'validation.level' => 'log'

    ]);


$payer = new Payer();
$details = new Details();
$amount = new Amount();
$transaction = new Transaction();
$payment = new Payment();
$redirectUrls = new RedirectUrls();


//Payer
$payer->setPaymentMethod('paypal');

//Details
$details->setShipping('2.00')
    ->setTax('0.00')
    ->setSubtotal('20.00');

//Amount
$amount->setCurrency('PHP')
    ->setTotal('22.00')
    ->setDetails($details);

//Transaction
$transaction->setAmount($amount)
    ->setDescription('Sapatos na Bulok');

$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions([$transaction]);

//Redirect Urls
$redirectUrls->setReturnUrl('http://solesearch/Views/Pay.php?approved=true')
    ->setCancelUrl('http://solesearch/Views/Pay.php?approved=false');

$payment->setRedirectUrls($redirectUrls);



try{
    $payment->create($api);

    //Generate Store Hash
    //Prepare execute transaction storage

    $hash = md5($payment->getId());
    $_SESSION['paypal_hash'] = $hash;


    //Store this to the database

    //Temporary test uid is 13
    $store = $db->prepare("
            INSERT INTO transaction_paypal (UsersID,PaymentID,Hash,Complete)
                VALUES (:UsersID,:PaymentID,:Hash,0)
        ");

    $store->execute([
            'UsersID' => 13,
            'PaymentID' => $payment->getId(),
            'Hash' => $hash
        ]);




} catch(PPConnectionException $e){
    header('Location : ../index.php');
}

foreach($payment->getLinks() as $link){
    if($link->getRel() == 'approval_url'){
        $redirectUrls = $link->getHref();
    }
}

header('Location:' . $redirectUrls);





