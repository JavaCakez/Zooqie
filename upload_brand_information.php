<?php
	if(!session_id()) session_start();	
	
	$errorMessage = "NULL";
	$uploadedString = "";
	
	// Create connection
if(file_exists("db_settings.php")) {include("db_settings.php");}
if(file_exists("../db_settings.php")) {include("../db_settings.php");}
if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
if(file_exists("db_settings.php")) {include("db_settings.php");}
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
	
	// Check connection
	if (mysqli_connect_errno($con))
	{
		$e_body = 'Brand: ' . $username . ' attempted to update their brand information, but it failed';
	}
	else
	{
		$Brand_name 	= mysqli_real_escape_string($con, $_POST['Brand_name']);
		$Description 	= mysqli_real_escape_string($con, $_POST['Desc']);
        $Location 		= mysqli_real_escape_string($con, $_POST['Location']);
		$Gender 		= mysqli_real_escape_string($con, $_POST['Gender']);
		$Email 			= mysqli_real_escape_string($con, $_POST['Email']);
		$Paypal_email 	= mysqli_real_escape_string($con, $_POST['Paypal_email']);
		$Facebook_URL 	= mysqli_real_escape_string($con, $_POST['Facebook_URL']);
		$Twitter_URL 	= mysqli_real_escape_string($con, $_POST['Twitter_URL']);
		$username 		= mysqli_real_escape_string($con, $_POST["username"]);
		$shipping		= mysqli_real_escape_string($con, $_POST["Shipping_info"]);
		
		$pw				= mysqli_real_escape_string($con, $_POST["current_password"]);
		$newpw			= mysqli_real_escape_string($con, $_POST["new_password"]);
		$newpw2			= mysqli_real_escape_string($con, $_POST["new_password2"]);
		
		if($Brand_name != '')
		{
			$updatesql = "UPDATE brands SET Brand_name= '" . $Brand_name . "' WHERE Username='" . $username . "'";
			$result = mysqli_query($con,$updatesql);
		}
		if($Description != '')
		{
			$updatesql = "UPDATE brands SET Description= '" . $Description . "' WHERE Username='" . $username . "'";
			$result = mysqli_query($con,$updatesql);
		}
        if($Location != '')
        {
            $updatesql = "UPDATE brands SET Location= '" . $Location . "' WHERE Username='" . $username . "'";
            $result = mysqli_query($con,$updatesql);
        }
		if($Gender != '')
		{
			if($Gender == 'Male') $updatesql = "UPDATE brands SET Gender= 'M' WHERE Username='" . $username . "'";
			if($Gender == 'Female') $updatesql = "UPDATE brands SET Gender= 'F' WHERE Username='" . $username . "'";
			if($Gender == 'Both') $updatesql = "UPDATE brands SET Gender= 'U' WHERE Username='" . $username . "'";
			$result = mysqli_query($con,$updatesql);
		}
		if($Email != '')
		{
			$updatesql = "UPDATE brands SET Email= '" . $Email . "' WHERE Username='" . $username . "'";
			$result = mysqli_query($con,$updatesql);
		}
		if($Paypal_email != '')
		{
			$updatesql = "UPDATE brands SET Paypal_email= '" . $Paypal_email . "' WHERE Username='" . $username . "'";
			$result = mysqli_query($con,$updatesql);
		}
		if($Facebook_URL != '')
		{
			$updatesql = "UPDATE brands SET Facebook_URL= '" . $Facebook_URL . "' WHERE Username='" . $username . "'";
			$result = mysqli_query($con,$updatesql);
		}
		if($Twitter_URL != '')
		{
			$updatesql = "UPDATE brands SET Twitter_URL= '" . $Twitter_URL . "' WHERE Username='" . $username . "'";
			$result = mysqli_query($con,$updatesql);
		}
		if($shipping != '')
		{
			$updatesql = "UPDATE brands SET Shipping_info= '" . $shipping . "' WHERE Username='" . $username . "'";
			$result = mysqli_query($con,$updatesql);
		}
		$e_body = 'Brand: ' . $username . ' have successfully updated their brand information.';
		$Message = 'Upload successful';
		
		if($_POST['pword'] == 'Save Changes')
		{
			if($pw != '' && $newpw != '' && $newpw2 != '')
			{
				if($newpw == $newpw2)
				{
					$result2 = mysqli_query($con,"SELECT * FROM logins WHERE Username = '". $username . "'");
			
					while($row2 = mysqli_fetch_array($result2))
					{
						$password = $row2['Password'];
					}
					
					if(md5($pw) == $password)
					{
						$hash = md5($newpw);
						
						$updatesql = "UPDATE logins SET Password= '" . $hash . "' WHERE Username='" . $username . "'";
						$result = mysqli_query($con,$updatesql);
						
						$Message = 'Password Changed';
						$e_body = 'Brand: ' . $username . ' have successfully changed their password.';
					}
					else
					{
						$Message = 'Old password was incorrect';
						$e_body = 'Brand: ' . $username . ' attempted to change password, but old password was incorrect.';
					}
					
					
				}
				else
				{
					$Message = 'New password was not correctly re-typed';
					$e_body = 'Brand: ' . $username . ' attempted to change password, but incorrectly re-typed.';
				}
			}
		}
		
		
		
	}
	

	
	//Notify success
	$address = "zookie.org.uk@gmail.com";
	$e_subject = 'Brand information update notification';


	// Configuration option.
	// You can change this if you feel that you need to.
	// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.
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
	
	$URL = "uploadmenu.php?Message=" . urlencode($Message) . "&Tab=1";
	//Reload without cache (for new images)
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
	header ("Location: $URL"); 
	
?>