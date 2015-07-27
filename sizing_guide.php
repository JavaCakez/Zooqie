<?php
	
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
		$e_body = 'Brand: ' . $username . ' attempted to add a sizing guide, but it failed';
	}
	else
	{
		//Get all POST variables
		$guideSelected 			= mysqli_real_escape_string($con, $_POST['Guide']);
		$guideName 				= mysqli_real_escape_string($con, $_POST['GuideName']);
		$id						= mysqli_real_escape_string($con, $_POST['ID']);
		$username				= mysqli_real_escape_string($con, $_POST['username']);
		$rows					= mysqli_real_escape_string($con, $_POST['rows']);
		$columns				= mysqli_real_escape_string($con, $_POST['columns']);
		

		if($_POST['submit'] == 'Submit')
		{
			if($guideSelected == 'New Sizing Guide')
			{
				for($i = 0; $i <= 9; $i++)
				{
					for($j = 0; $j <= 9; $j++)
					{
						$tmpStr = "r".$i."c".$j;
						if($i == 0 && $j == 0)
						{
						}
						else if($i == 0)
						{
							$Column_headers = $Column_headers . $_POST[$tmpStr];
							if($j != 9) $Column_headers = $Column_headers . ',';
						}
						else if($j == 0)
						{
							$Row_headers = $Row_headers . $_POST[$tmpStr];
							if($j != 9) $Row_headers = $Row_headers . ',';
						}
						else
						{
							$Row_values[$i] = $Row_values[$i] . $_POST[$tmpStr];
							if($j != 9) $Row_values[$i] = $Row_values[$i] . ',';
						}
					}
				}
				
				$sql = "INSERT INTO sizingguides VALUES ('" . $id . "', '" . $guideName . "', ".$rows.", ".$columns.", '".$Column_headers."', '".$Row_headers.
				"', '".$Row_values[1]."', '".$Row_values[2]."', '".$Row_values[3]."', '".$Row_values[4]."', '".$Row_values[5].
				"', '".$Row_values[6]."', '".$Row_values[7]."', '".$Row_values[8]."', '".$Row_values[9]."', '".$Row_values[10].
				"' )";
				$result = mysqli_query($con,$sql);
			}
			else
			{ 
				for($i = 0; $i <= 9; $i++)
				{
					for($j = 0; $j <= 9; $j++)
					{
						$tmpStr = "r".$i."c".$j;
						if($i == 0 && $j == 0)
						{
						}
						else if($i == 0)
						{
							$Column_headers = $Column_headers . $_POST[$tmpStr];
							if($j != 9) $Column_headers = $Column_headers . ',';
						}
						else if($j == 0)
						{
							$Row_headers = $Row_headers . $_POST[$tmpStr];
							if($j != 9) $Row_headers = $Row_headers . ',';
						}
						else
						{
							$Row_values[$i] = $Row_values[$i] . $_POST[$tmpStr];
							if($j != 9) $Row_values[$i] = $Row_values[$i] . ',';
						}
					}
				}
				
				$updatesql = "UPDATE sizingguides SET Name= '" . $guideName . "', Rows = ".$rows.", Columns = ".$columns. ", Column_headers = '".$Column_headers."', Row_headers = '".$Row_headers.
				"', Row_values1 = '".$Row_values[1]."', Row_values2 = '".$Row_values[2]."', Row_values3 = '".$Row_values[3]."', Row_values4 = '".$Row_values[4]."', Row_values5 = '".$Row_values[5].
				"', Row_values6 = '".$Row_values[6]."', Row_values7 = '".$Row_values[7]."', Row_values8 = '".$Row_values[8]."', Row_values9 = '".$Row_values[9]."', Row_values10 = '".$Row_values[10].
				"' WHERE Brand='" . $id . "' AND Name='" . $guideSelected . "'";
				$result = mysqli_query($con,$updatesql);
			}
			
			$e_body = 'Brand: ' . $username . ' have added a sizing guide:' . $s;
		}
		else if($_POST['delete'] == 'Delete')
		{
			$sql = "DELETE FROM sizingguides WHERE Brand ='".strtoupper($id)."' AND Name ='".$guideSelected."'";
			$result = mysqli_query($con,$sql);
			
			$sql = "UPDATE products SET Sizing_guide = '' WHERE Brand ='".strtoupper($id)."' AND Sizing_guide ='".$guideSelected."'";
			$result = mysqli_query($con,$sql);
			
			$e_body = 'Brand: ' . $username . ' have deleted a sizing guide:' . $s;
		}		
	}
	
	//Notify success
	$address = "zookie.org.uk@gmail.com";
	$e_subject = 'Brand sizing guide upload';

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
	if($errorMessage == "NULL") if($_POST['submit'] == 'Submit') $Message = 'Upload Successful';
	if($errorMessage == "NULL") if($_POST['delete'] == 'Delete') $Message = 'Delete Successful';
	if($errorMessage != "NULL") $Message = $errorMessage;
	$URL = "uploadmenu.php?Message=" . urlencode($Message) . "&Tab=4";
	//Reload without cache (for new images)
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
	header ("Location: $URL"); 
	
?>