<?php
// Include required library files.
require_once('../includes/config2.php');
require_once('../includes/paypal.class.php');

// Create PayPal object.
$PayPalConfig = array(
					  'Sandbox' => $sandbox,
					  'DeveloperAccountEmail' => $developer_account_email,
					  'ApplicationID' => $application_id,
					  'DeviceID' => $device_id,
					  'IPAddress' => $_SERVER['REMOTE_ADDR'],
					  'APIUsername' => $api_username,
					  'APIPassword' => $api_password,
					  'APISignature' => $api_signature,
					  'APISubject' => $api_subject
					);

$PayPal = new PayPal_Adaptive($PayPalConfig);

if($_POST["commission"] == 0)
{
	$brandcut = 1.0;
	$zookiecut = 0.0;
	$brandamt = $_POST["amount"];
	$zookieamt = 0.0;
}
else
{
	$brandcut = 1.0 - ($_POST["commission"]/100);
	$zookiecut = $_POST["commission"]/100;
	$brandamt = round($_POST["amount"] * $brandcut, 2);
	$zookieamt = round($_POST["amount"] * $zookiecut,2);
}

// Pay
$PayRequestFields = array(
						'CancelURL' => $domain.'paymentfail.php', 				// Required.  The URL to which the sender's browser is redirected if the sender cancels the approval for the payment after logging in to paypal.com.  1024 char max.
						'CurrencyCode' => 'GBP', 								// Required.  3 character currency code.
						'FeesPayer' => 'PRIMARYRECEIVER', 						// The payer of the fees.  Values are:  SENDER, PRIMARYRECEIVER, EACHRECEIVER, SECONDARYONLY
						'IPNNotificationURL' => '', 						// The URL to which you want all IPN messages for this payment to be sent.  1024 char max.
						'Memo' => '', 										// A note associated with the payment (text, not HTML).  1000 char max
						'Pin' => '', 										// The sener's personal id number, which was specified when the sender signed up for the preapproval
						'PreapprovalKey' => '', 							// The key associated with a preapproval for this payment.  The preapproval is required if this is a preapproved payment.  
						'ReturnURL' => $domain.'paymentsuccess.php', 		// Required.  The URL to which the sener's browser is redirected after approvaing a payment on paypal.com.  1024 char max.
						'ReverseAllParallelPaymentsOnError' => '', 			// Whether to reverse paralel payments if an error occurs with a payment.  Values are:  TRUE, FALSE
						'SenderEmail' => '', 								// Sender's email address.  127 char max.
						'TrackingID' => ''									// Unique ID that you specify to track the payment.  127 char max.
						);
						
$ClientDetailsFields = array(
						'CustomerID' => '', 								// Your ID for the sender  127 char max.
						'CustomerType' => '', 								// Your ID of the type of customer.  127 char max.
						'GeoLocation' => '', 								// Sender's geographic location
						'Model' => '', 										// A sub-identification of the application.  127 char max.
						'PartnerName' => ''									// Your organization's name or ID
						);
						
$FundingTypes = array('ECHECK', 'BALANCE', 'CREDITCARD');					// Funding constrainigs require advanced permissions levels.

$Receivers = array();
$Receiver = array(
				'Amount' => $_POST["amount"]+$_POST["shipping"], 											// Required.  Amount to be paid to the receiver.
				'Email' => $_POST["business"], 												// Receiver's email address. 127 char max.
				'InvoiceID' => '', 											// The invoice number for the payment.  127 char max.
				'PaymentType' => '', 										// Transaction type.  Values are:  GOODS, SERVICE, PERSONAL, CASHADVANCE, DIGITALGOODS
				'PaymentSubType' => '', 									// The transaction subtype for the payment.
				'Phone' => array('CountryCode' => '', 'PhoneNumber' => '', 'Extension' => ''), // Receiver's phone number.   Numbers only.
				'Primary' => 'TRUE'												// Whether this receiver is the primary receiver.  Values are boolean:  TRUE, FALSE
				);
array_push($Receivers,$Receiver);

$Receiver = array(
		'Amount' => $zookieamt, 											// Required.  Amount to be paid to the receiver.
		'Email' => 'zookie.org.uk-facilitator@gmail.com', 												// Receiver's email address. 127 char max.
		'InvoiceID' => '', 											// The invoice number for the payment.  127 char max.
		'PaymentType' => '', 										// Transaction type.  Values are:  GOODS, SERVICE, PERSONAL, CASHADVANCE, DIGITALGOODS
		'PaymentSubType' => '', 									// The transaction subtype for the payment.
		'Phone' => array('CountryCode' => '', 'PhoneNumber' => '', 'Extension' => ''), // Receiver's phone number.   Numbers only.
		'Primary' => 'FALSE'												// Whether this receiver is the primary receiver.  Values are boolean:  TRUE, FALSE
);
array_push($Receivers,$Receiver);

$SenderIdentifierFields = array(
								'UseCredentials' => ''						// If TRUE, use credentials to identify the sender.  Default is false.
								);
								
$AccountIdentifierFields = array(
								'Email' => '', 								// Sender's email address.  127 char max.
								'Phone' => array('CountryCode' => '', 'PhoneNumber' => '', 'Extension' => '')								// Sender's phone number.  Numbers only.
								);

// SetPaymentOptions
$SPOFields = array(
		'ShippingAddressID' => '' 					// Sender's shipping address ID.
);

$DisplayOptions = array(
		'EmailHeaderImageURL' => '', 			// The URL of the image that displays in the header of customer emails.  1,024 char max.  Image dimensions:  43 x 240
		'EmailMarketingImageURL' => '', 		// The URL of the image that displays in the customer emails.  1,024 char max.  Image dimensions:  80 x 530
		'HeaderImageURL' => '', 				// The URL of the image that displays in the header of a payment page.  1,024 char max.  Image dimensions:  750 x 90
		'BusinessName' => 'Zooqie'					// The business name to display.  128 char max.
);

$InstitutionCustomer = array(
		'CountryCode' => '', 				// Required.  2 char code of the home country of the end user.
		'DisplayName' => '', 				// Required.  The full name of the consumer as known by the institution.  200 char max.
		'InstitutionCustomerEmail' => '', 	// The email address of the consumer.  127 char max.
		'FirstName' => '', 					// Required.  The first name of the consumer.  64 char max.
		'LastName' => '', 					// Required.  The last name of the consumer.  64 char max.
		'InstitutionCustomerID' => '', 		// Required.  The unique ID assigned to the consumer by the institution.  64 char max.
		'InstitutionID' => ''				// Required.  The unique ID assiend to the institution.  64 char max.
);

$SenderOptions = array(
		'RequireShippingAddressSelection' => TRUE // Boolean.  If true, require the sender to select a shipping address during the embedded payment flow.  Default is false.
);

// Begin loop to populate receiver options.
$ReceiverOptions = array();
$ReceiverOption = array(
		'Description' => 'Item Number: ' . $_POST["item_number"] . ' Size: ',//.$_POST["os0"], 					// A description you want to associate with the payment.  1000 char max.
		'CustomID' => '' 						// An external reference number you want to associate with the payment.  1000 char max.
);
	
$InvoiceData = array(
		'TotalTax' => '', 							// Total tax associated with the payment.
		'TotalShipping' => $_POST["shipping"]					// Total shipping associated with the payment.
);

$InvoiceItems = array();
$InvoiceItem = array(
		'Name' => $_POST["item_name"], 								// Name of item.
		'Identifier' => '', 						// External reference to item or item ID.
		'Price' => $_POST["amount"], 								// Total of line item.
		'ItemPrice' => $_POST["amount"],							// Price of an individual item.
		'ItemCount' => '1'							// Item QTY
);
array_push($InvoiceItems,$InvoiceItem);

$ReceiverIdentifier = array(
		'Email' => $_POST["business"], 	// Receiver's email address.  127 char max.
		'PhoneCountryCode' => '', 			// Receiver's telephone number country code.
		'PhoneNumber' => '', 				// Receiver's telephone number.
		'PhoneExtension' => ''				// Receiver's telephone extension.
);

$ReceiverOption['InvoiceData'] = $InvoiceData;
$ReceiverOption['InvoiceItems'] = $InvoiceItems;
$ReceiverOption['ReceiverIdentifier'] = $ReceiverIdentifier;
array_push($ReceiverOptions,$ReceiverOption);

$ReceiverOption = array(
		'Description' => '', 					// A description you want to associate with the payment.  1000 char max.
		'CustomID' => '' 						// An external reference number you want to associate with the payment.  1000 char max.
);
	
$InvoiceData = array(
		'TotalTax' => '', 							// Total tax associated with the payment.
		'TotalShipping' => '' 						// Total shipping associated with the payment.
);

$InvoiceItems = array();
$InvoiceItem = array(
		'Name' => 'Commission', 								// Name of item.
		'Identifier' => '', 						// External reference to item or item ID.
		'Price' => $zookieamt, 								// Total of line item.
		'ItemPrice' => $zookieamt,							// Price of an individual item.
		'ItemCount' => '1'							// Item QTY
);
array_push($InvoiceItems,$InvoiceItem);

$ReceiverIdentifier = array(
		'Email' => 'zookie.org.uk-facilitator@gmail.com', 	// Receiver's email address.  127 char max.
		'PhoneCountryCode' => '', 			// Receiver's telephone number country code.
		'PhoneNumber' => '', 				// Receiver's telephone number.
		'PhoneExtension' => ''				// Receiver's telephone extension.
);

$ReceiverOption['InvoiceData'] = $InvoiceData;
$ReceiverOption['InvoiceItems'] = $InvoiceItems;
$ReceiverOption['ReceiverIdentifier'] = $ReceiverIdentifier;
array_push($ReceiverOptions,$ReceiverOption);
// End receiver options loop					
								
$PayPalRequestData = array(
		'PayRequestFields' => $PayRequestFields, 
		'ClientDetailsFields' => $ClientDetailsFields, 
		//'FundingTypes' => $FundingTypes, 
		'Receivers' => $Receivers, 
		//'SenderIdentifierFields' => $SenderIdentifierFields, 
		//'AccountIdentifierFields' => $AccountIdentifierFields,
		'SPOFields' => $SPOFields, 
		'DisplayOptions' => $DisplayOptions, 
		//'InstitutionCustomer' => $InstitutionCustomer, 
		'SenderOptions' => $SenderOptions, 
		'ReceiverOptions' => $ReceiverOptions 
		);


// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->PayWithOptions($PayPalRequestData);

//Automatic Redirect
$URL=$PayPalResult['RedirectURL']; 
header ("Location: $URL"); 

// Write the contents of the response array to the screen for demo purposes.
//echo '<pre />';
//print_r($PayPalResult);