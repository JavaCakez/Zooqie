<?php
/**
 * Timezone Setting
 */
date_default_timezone_set('America/Chicago');

/**
  * Enable Sessions
  */
if(!session_id()) session_start();

/** 
 * Sandbox Mode - TRUE/FALSE
 */
$sandbox = TRUE;
$domain = $sandbox ? 'http://www.zookie.org.uk/' : 'http://www.zookie.org.uk/';

/**
 * Enable error reporting if running in sandbox mode.
 */
if($sandbox)
{
	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
}

/**
 * API Credentials
 */
$api_version = '95.0';
$application_id = $sandbox ? 'APP-80W284485P519543T' : 'APP-67K49948YY2631814';	// Only required for Adaptive Payments.  You get your Live ID when your application is approved by PayPal.
$developer_account_email = 'zookie.org.uk@gmail.com';		// This is what you use to sign in to http://developer.paypal.com.  Only required for Adaptive Payments.
$api_username = $sandbox ? 'zookie.org.uk-facilitator_api1.gmail.com' : 'zookie.org.uk_api1.gmail.com';
$api_password = $sandbox ? '1375270785' : 'V5B7QWGPYYUDVMPV';
$api_signature = $sandbox ? 'ARG0R6TbAfKjXK0KYgFpq6XEq6JGAyEAgX97JYfCZluZpTVRpG9RUanj' : 'AFcWxV21C7fd0v3bYYYRCpSSRl31Am9vEHwutYH7Zh6YqO0TVRVsjpRx';
$payflow_username = $sandbox ? 'SANDBOX_USERNAME' : 'LIVE_USERNAME';
$payflow_password = $sandbox ? 'SANDBOX_PASSWORD' : 'LIVE_PASSWORD';
$payflow_vendor = $sandbox ? 'SANDBOX_VENDOR' : 'LIVE_VENDOR';
$payflow_partner = $sandbox ? 'SANDBOX_PARTNER' : 'LIVE_PARTNER';

/**
 * Third Party User Values
 * These can be setup here or within each caller directly when setting up the PayPal object.
 */
$api_subject = '';	// If making calls on behalf a third party, their PayPal email address or account ID goes here.
$device_id = '';
$device_ip_address = $_SERVER['REMOTE_ADDR'];
?>