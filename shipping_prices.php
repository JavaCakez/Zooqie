<?php
	
	$errorMessage = "NULL";
	
	// Create connection
if(file_exists("db_settings.php")) {include("db_settings.php");}
if(file_exists("../db_settings.php")) {include("../db_settings.php");}
if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
if(file_exists("db_settings.php")) {include("db_settings.php");}
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
	
	// Check connection
	if (mysqli_connect_errno($con))
	{
		$e_body = 'Brand: ' . $username . ' attempted to add a shipping set, but it failed';
	}
	else
	{
		//Get all POST variables
		$Set 					= mysqli_real_escape_string($con, $_POST['Set']);
		$Setname 				= mysqli_real_escape_string($con, $_POST['Setname']);
		$UKS 					= str_replace('£','',mysqli_real_escape_string($con, $_POST['UKS']));
		$UKE 					= str_replace('£','',mysqli_real_escape_string($con, $_POST['UKE']));
		$Europe 				= str_replace('£','',mysqli_real_escape_string($con, $_POST['Europe']));
		$International 			= str_replace('£','',mysqli_real_escape_string($con, $_POST['International']));
		
		$id						= mysqli_real_escape_string($con, $_POST['ID']);
		$username				= mysqli_real_escape_string($con, $_POST['username']);
		

		if($UKS == '') 				$UKS 			= -1.00;
		if($UKE == '')				$UKE 			= -1.00;
		if($Europe == '')			$Europe 		= -1.00;
		if($International == '')	$International 	= -1.00;
		

		if($_POST['submit'] == 'Submit')
		{
			if($Set == 'New Shipping Price Set')
			{
				$sql = "INSERT INTO shippingprices VALUES ('".$id."', '".$Setname."', ".$UKS.", ".$UKE.", ".$Europe.", ".$International.")";
				$result = mysqli_query($con,$sql);
			}
			else
			{ 
				$updatesql = "UPDATE shippingprices SET Name= '" . $Setname . "', Shipping_charge = ".$UKS.", Shipping_charge2 = ".$UKE. ", Shipping_charge3 = ".$Europe.", Shipping_charge4 = ".$International." WHERE Brand='" . $id . "' AND Name = '".$Set."'";
				$result = mysqli_query($con,$updatesql);
			}
			$e_body = 'Brand: ' . $username . ' have added a shipping set:' . $s;
		}
		else if($_POST['delete'] == 'Delete')
		{
			$sql = "DELETE FROM shippingprices WHERE Brand ='".strtoupper($id)."' AND Name ='".$Setname."'";
			$result = mysqli_query($con,$sql);
			
			$e_body = 'Brand: ' . $username . ' have deleted a shipping set:' . $s;
		}
		

		
	}
	
	//Notify success
	$address = "zookie.org.uk@gmail.com";
	$e_subject = 'Brand shipping set upload';

	$e_content = "";
	$e_reply = "";

	$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

	$headers = "From: " . $username . PHP_EOL;
	$headers .= "Reply-To: " . $username . PHP_EOL;
	$headers .= "MIME-Version: 1.0" . PHP_EOL;
	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
	$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

	if(mail($address, $e_subject, $msg, $headers)) {

		// Email has sent successfully, echo a success page.

		//echo "<fieldset>";
		//echo "<div id='success_page'>";
		//echo "<h1>Email Sent Successfully.</h1>";
		//echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
		//echo "</div>";
		//echo "</fieldset>";

	} else {

		//echo 'ERROR!';

	}
	
	
	//Automatic Redirect
	if($errorMessage == "NULL") $Message = 'Upload Successful';
	if($errorMessage != "NULL") $Message = $errorMessage;
	$URL = "uploadmenu.php?Message=" . urlencode($Message) . "&Tab=5";
	//Reload without cache (for new images)
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
	header ("Location: $URL"); 
	
?>