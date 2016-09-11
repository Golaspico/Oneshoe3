<?php
use PayPal\Api\Payment;


use PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredentials;

use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;

use PayPal\Api\RedirectUrls;
use PayPal\Exception\PPConnectionException;


require __DIR__ . '../../paypalpayments/vendor/autoload.php';



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



session_start();
$db = new PDO('mysql:host=localhost;dbname=oneshoe','root','');

if(isset($_GET['approved']))
{
	$approved = $_GET['approved'] === 'true';

	if($approved)
	{
		$payerId = $_GET['PayerID'];

		//Get payment_id from database
		$PaymentID = $db->prepare("
				SELECT PaymentID FROM transaction_paypal
				WHERE Hash= :Hash");

		$PaymentID->execute([
		'Hash' => $_SESSION['paypal_hash']
		]);

	$paymentId = $PaymentID->fetchObject()->PaymentID;

	
	$payment = Payment::get($paymentId, $api);
	$execution = new PaymentExecution();
	$execution->setPayerId($payerId);


	//charge the user

	$payment->execute($execution,$api);

	echo $payerId;

	
	
	} else{
		header('Location: Canceled.php');
	}



}


?>