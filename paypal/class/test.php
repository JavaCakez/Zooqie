<?php
//$PayPalConfig = array(
//    'Sandbox' => $sandbox,
//    'DeveloperAccountEmail' => $developer_account_email,
//    'ApplicationID' => $application_id,
//    'DeviceID' => $device_id,
//    'IPAddress' => $_SERVER['REMOTE_ADDR'],
//    'APIUsername' => $api_username,
//    'APIPassword' => $api_password,
//    'APISignature' => $api_signature,
//    'APISubject' => $api_subject
//);

require_once('../includes/config.php');

$info = 'USER=' . $api_username .''
    .'&PWD=' . $api_password . ''
    .'&SIGNATURE=' . $api_signature . ''
    .'&METHOD=TransactionSearch'
    .'&TRANSACTIONCLASS=RECEIVED'
    .'&STARTDATE=2010-01-08T05:38:48Z'
    .'&ENDDATE=2200-07-14T05:38:48Z'
    .'&VERSION=94';

$curl = curl_init('https://api-3t.paypal.com/nvp');
curl_setopt($curl, CURLOPT_FAILONERROR, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl, CURLOPT_POSTFIELDS,  $info);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POST, 1);

$result = curl_exec($curl);

parse_str($result, $result);

foreach($result as $key => $value){
    echo $key.' => '.$value."<BR/>";
}

//# Bust the string up into an array by the ampersand (&)
//# You could also use parse_str(), but it would most likely limit out
//$result = explode("&", $result);
//
//# Loop through the new array and further bust up each element by the equal sign (=)
//# and then create a new array with the left side of the equal sign as the key and the right side of the equal sign as the value
//foreach($result as $value){
//    $value = explode("=", $value);
//    $temp[$value[0]] = $value[1];
//}
//
//# At the time of writing this code, there were 11 different types of responses that were returned for each record
//# There may only be 10 records returned, but there will be 110 keys in our array which contain all the different pieces of information for each record
//# Now create a 2 dimensional array with all the information for each record together
//for($i=0; $i<count($temp)/11; $i++){
//    $returned_array[$i] = array(
//        "timestamp"         =    urldecode($result["L_TIMESTAMP".$i]),
//        "timezone"          =    urldecode($result["L_TIMEZONE".$i]),
//        "type"              =    urldecode($result["L_TYPE".$i]),
//        "email"             =    urldecode($result["L_EMAIL".$i]),
//        "name"              =    urldecode($result["L_NAME".$i]),
//        "transaction_id"    =    urldecode($result["L_TRANSACTIONID".$i]),
//        "status"            =    urldecode($result["L_STATUS".$i]),
//        "amt"               =    urldecode($result["L_AMT".$i]),
//        "currency_code"     =    urldecode($result["L_CURRENCYCODE".$i]),
//        "fee_amount"        =    urldecode($result["L_FEEAMT".$i]),
//        "net_amount"        =    urldecode($result["L_NETAMT".$i]));
//}
//
//echo($returned_array);
?>