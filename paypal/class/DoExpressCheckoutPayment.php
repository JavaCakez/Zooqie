<?php
if(!session_id()) session_start();

require_once('../includes/config.php');
require_once('../includes/paypal.class.php');
require_once('../includes/paypal.adaptive.class.php');

$PayPalConfig = array(
					'Sandbox' => $sandbox,
					'APIUsername' => $api_username,
					'APIPassword' => $api_password,
					'APISignature' => $api_signature
					);

$PayPal = new PayPal($PayPalConfig);

$GECDResult = $PayPal -> GetExpressCheckoutDetails($_SESSION['PayPalResult']['TOKEN']);

if($_SESSION["commission"] == 0)
{
	$brandcut = 1.0;
	$zookiecut = 0.0;
	$brandamt = $_SESSION["amount"];
	$zookieamt = 0.0;
}
else
{
	$brandcut = 1.0 - ($_SESSION["commission"]/100);
	$zookiecut = $_SESSION["commission"]/100;
	$brandamt = round($_SESSION["amount"] * $brandcut, 2);
	$zookieamt = round($_SESSION["amount"] * $zookiecut,2);
}

//Testing
//echo '<b>GetExpressCheckoutDetails</b><br /><pre>';
//print_r($GECDResult);
//echo '<br /><br /></pre>';

$DECPFields = array(
					'token' => $_SESSION['PayPalResult']['TOKEN'], 								// Required.  A timestamped token, the value of which was returned by a previous SetExpressCheckout call.
					'payerid' => $GECDResult['PAYERID'], 		// Required.  Unique PayPal customer id of the payer.  Returned by GetExpressCheckoutDetails, or if you used SKIPDETAILS it's returned in the URL back to your RETURNURL.
					'returnfmfdetails' => '1', 					// Flag to indiciate whether you want the results returned by Fraud Management Filters or not.  1 or 0.
					'giftmessage' => '', 						// The gift message entered by the buyer on the PayPal Review page.  150 char max.
					'giftreceiptenable' => '', 					// Pass true if a gift receipt was selected by the buyer on the PayPal Review page. Otherwise pass false.
					'giftwrapname' => '', 						// The gift wrap name only if the gift option on the PayPal Review page was selected by the buyer.
					'giftwrapamount' => '', 					// The amount only if the gift option on the PayPal Review page was selected by the buyer.
					'buyermarketingemail' => '', 				// The buyer email address opted in by the buyer on the PayPal Review page.
					'surveyquestion' => '', 					// The survey question on the PayPal Review page.  50 char max.
					'surveychoiceselected' => '',  				// The survey response selected by the buyer on the PayPal Review page.  15 char max.
					'allowedpaymentmethod' => 'InstantPaymentOnly', 				// The payment method type. Specify the value InstantPaymentOnly.
					'buttonsource' => '' 						// ID code for use by third-party apps to identify transactions in PayPal. 
				);
						
$Payments = array();
$Payment = array(
				'amt' => $brandamt+$_SESSION["shipping"], 	// Required.  The total cost of the transaction to the customer.  If shipping cost and tax charges are known, include them in this value.  If not, this value should be the current sub-total of the order.
				'currencycode' => 'GBP', 					// A three-character currency code.  Default is USD.
				'itemamt' => $brandamt, 						// Required if you specify itemized L_AMT fields. Sum of cost of all items in this order.  
				'shippingamt' => $_SESSION["shipping"], 					// Total shipping costs for this order.  If you specify SHIPPINGAMT you mut also specify a value for ITEMAMT.
				'insuranceoptionoffered' => '', 		// If true, the insurance drop-down on the PayPal review page displays the string 'Yes' and the insurance amount.  If true, the total shipping insurance for this order must be a positive number.
				'handlingamt' => '', 					// Total handling costs for this order.  If you specify HANDLINGAMT you mut also specify a value for ITEMAMT.
				'taxamt' => '0.00', 					// Required if you specify itemized L_TAXAMT fields.  Sum of all tax items in this order. 
				'desc' => '', 							// Description of items on the order.  127 char max.
				'custom' => '', 						// Free-form field for your own use.  256 char max.
				'invnum' => '', 						// Your own invoice or tracking number.  127 char max.
				'notifyurl' => '',  						// URL for receiving Instant Payment Notifications
				'shiptoname' => '', 					// Required if shipping is included.  Person's name associated with this address.  32 char max.
				'shiptostreet' => '', 					// Required if shipping is included.  First street address.  100 char max.
				'shiptostreet2' => '', 					// Second street address.  100 char max.
				'shiptocity' => '', 					// Required if shipping is included.  Name of city.  40 char max.
				'shiptostate' => '', 					// Required if shipping is included.  Name of state or province.  40 char max.
				'shiptozip' => '', 						// Required if shipping is included.  Postal code of shipping address.  20 char max.
				'shiptocountry' => '', 					// Required if shipping is included.  Country code of shipping address.  2 char max.
				'shiptophonenum' => '',  				// Phone number for shipping address.  20 char max.
				'notetext' => 'Size: '.$_SESSION['size'], 						// Note to the merchant.  255 char max.  
				'allowedpaymentmethod' => 'InstantPaymentOnly', 			// The payment method type.  Specify the value InstantPaymentOnly.
				'paymentaction' => 'Sale', 					// How you want to obtain the payment.  When implementing parallel payments, this field is required and must be set to Order. 
				'paymentrequestid' => '0',  				// A unique identifier of the specific payment request, which is required for parallel payments. 
				'sellerpaypalaccountid' => $_SESSION["business"]			// A unique identifier for the merchant.  For parallel payments, this field is required and must contain the Payer ID or the email address of the merchant.
				);
				
$PaymentOrderItems = array();
$Item = array(
			'name' => $_SESSION["item_name"], 							// Item name. 127 char max.
			'desc' => '', 							// Item description. 127 char max.
			'amt' => $brandamt, 								// Cost of item.
			'number' => $_SESSION["item_number"], 							// Item number.  127 char max.
			'qty' => '1', 								// Item qty on order.  Any positive integer.
			'taxamt' => '0.00', 							// Item sales tax
			'itemurl' => '', 							// URL for the item.
			'itemweightvalue' => '', 					// The weight value of the item.
			'itemweightunit' => '', 					// The weight unit of the item.
			'itemheightvalue' => '', 					// The height value of the item.
			'itemheightunit' => '', 					// The height unit of the item.
			'itemwidthvalue' => '', 					// The width value of the item.
			'itemwidthunit' => '', 					// The width unit of the item.
			'itemlengthvalue' => '', 					// The length value of the item.
			'itemlengthunit' => '',  					// The length unit of the item.
			'ebayitemnumber' => '', 					// Auction item number.  
			'ebayitemauctiontxnid' => '', 			// Auction transaction ID number.  
			'ebayitemorderid' => '',  				// Auction order ID number.
			'ebayitemcartid' => ''					// The unique identifier provided by eBay for this order from the buyer. These parameters must be ordered sequentially beginning with 0 (for example L_EBAYITEMCARTID0, L_EBAYITEMCARTID1). Character length: 255 single-byte characters
			);
array_push($PaymentOrderItems, $Item);

$Payment['order_items'] = $PaymentOrderItems;
array_push($Payments, $Payment);



if($zookiecut != 0.0)
{
	$Payment = array(
					'amt' => $zookieamt, 							// Required.  The total cost of the transaction to the customer.  If shipping cost and tax charges are known, include them in this value.  If not, this value should be the current sub-total of the order.
					'currencycode' => 'GBP', 					// A three-character currency code.  Default is USD.
					'itemamt' => $zookieamt, 						// Required if you specify itemized L_AMT fields. Sum of cost of all items in this order.  
					'shippingamt' => '0.00', 					// Total shipping costs for this order.  If you specify SHIPPINGAMT you mut also specify a value for ITEMAMT.
					'insuranceoptionoffered' => '', 		// If true, the insurance drop-down on the PayPal review page displays the string 'Yes' and the insurance amount.  If true, the total shipping insurance for this order must be a positive number.
					'handlingamt' => '', 					// Total handling costs for this order.  If you specify HANDLINGAMT you mut also specify a value for ITEMAMT.
					'taxamt' => '0.00', 						// Required if you specify itemized L_TAXAMT fields.  Sum of all tax items in this order. 
					'desc' => '', 							// Description of items on the order.  127 char max.
					'custom' => '', 						// Free-form field for your own use.  256 char max.
					'invnum' => '', 						// Your own invoice or tracking number.  127 char max.
					'notifyurl' => '',  						// URL for receiving Instant Payment Notifications
					'shiptoname' => '', 					// Required if shipping is included.  Person's name associated with this address.  32 char max.
					'shiptostreet' => '', 					// Required if shipping is included.  First street address.  100 char max.
					'shiptostreet2' => '', 					// Second street address.  100 char max.
					'shiptocity' => '', 					// Required if shipping is included.  Name of city.  40 char max.
					'shiptostate' => '', 					// Required if shipping is included.  Name of state or province.  40 char max.
					'shiptozip' => '', 						// Required if shipping is included.  Postal code of shipping address.  20 char max.
					'shiptocountry' => '', 					// Required if shipping is included.  Country code of shipping address.  2 char max.
					'shiptophonenum' => '',  				// Phone number for shipping address.  20 char max.
					'notetext' => '', 						// Note to the merchant.  255 char max.  
					'allowedpaymentmethod' => 'InstantPaymentOnly', 			// The payment method type.  Specify the value InstantPaymentOnly.
					'paymentaction' => 'Sale', 					// How you want to obtain the payment.  When implementing parallel payments, this field is required and must be set to Order. 
					'paymentrequestid' => '1',  				// A unique identifier of the specific payment request, which is required for parallel payments. 
					'sellerpaypalaccountid' => 'zookie.org.uk@gmail.com'			// A unique identifier for the merchant.  For parallel payments, this field is required and must contain the Payer ID or the email address of the merchant.
					);
					
	$PaymentOrderItems = array();
	$Item = array(
				'name' => 'Brand Fee', 							// Item name. 127 char max.
				'desc' => "This is a commission fee we charge brands taken away from the item total. Don't worry, you're paying nothing extra!", 							// Item description. 127 char max.
				'amt' => $zookieamt, 								// Cost of item.
				'number' => $_SESSION["item_number"], 							// Item number.  127 char max.
				'qty' => '1', 								// Item qty on order.  Any positive integer.
				'taxamt' => '0.00', 							// Item sales tax
				'itemurl' => '', 							// URL for the item.
				'itemweightvalue' => '', 					// The weight value of the item.
				'itemweightunit' => '', 					// The weight unit of the item.
				'itemheightvalue' => '', 					// The height value of the item.
				'itemheightunit' => '', 					// The height unit of the item.
				'itemwidthvalue' => '', 					// The width value of the item.
				'itemwidthunit' => '', 					// The width unit of the item.
				'itemlengthvalue' => '', 					// The length value of the item.
				'itemlengthunit' => '',  					// The length unit of the item.
				'ebayitemnumber' => '', 					// Auction item number.  
				'ebayitemauctiontxnid' => '', 			// Auction transaction ID number.  
				'ebayitemorderid' => '',  				// Auction order ID number.
				'ebayitemcartid' => ''					// The unique identifier provided by eBay for this order from the buyer. These parameters must be ordered sequentially beginning with 0 (for example L_EBAYITEMCARTID0, L_EBAYITEMCARTID1). Character length: 255 single-byte characters
				);
	array_push($PaymentOrderItems, $Item);

	$Payment['order_items'] = $PaymentOrderItems;
	array_push($Payments, $Payment);
}		

$UserSelectedOptions = array(
							 'shippingcalculationmode' => '', 	// Describes how the options that were presented to the user were determined.  values are:  API - Callback   or   API - Flatrate.
							 'insuranceoptionselected' => '', 	// The Yes/No option that you chose for insurance.
							 'shippingoptionisdefault' => '', 	// Is true if the buyer chose the default shipping option.  
							 'shippingoptionamount' => '', 		// The shipping amount that was chosen by the buyer.
							 'shippingoptionname' => '', 		// Is true if the buyer chose the default shipping option...??  Maybe this is supposed to show the name..??
							 );

$PayPalRequest = array(
					   'DECPFields' => $DECPFields, 
					   'Payments' => $Payments
					   );

$_SESSION['PayPalResult'] = $PayPal -> DoExpressCheckoutPayment($PayPalRequest);

$myFile = "logFile.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = print_r($_SESSION['PayPalResult'], true);
fwrite($fh, $stringData);
fclose($fh);

//Automatic Redirect
if($_SESSION["item_number"] == '')
{
	$URL = 'http://www.zooqie.com/paymentfail.php';
}
else
{
	$URL = 'http://www.zooqie.com/paymentsuccess.php?item_number=' . urlencode($_SESSION["item_number"]) . '&size=' . urlencode($_SESSION["size"]);
}
header ("Location: $URL"); 

//Testing
//echo '<b>Yo</b><br /><pre>';
//echo $_SESSION["item_number"];
//echo '<br/>';
//echo $_SESSION["size"];
//echo '<br/>';
//echo '<pre />';
//print_r($_SESSION['PayPalResult']);
?>