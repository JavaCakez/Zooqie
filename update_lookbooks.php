<?php
	// Create connection
if(file_exists("db_settings.php")) {include("db_settings.php");}
if(file_exists("../db_settings.php")) {include("../db_settings.php");}
if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
if(file_exists("db_settings.php")) {include("db_settings.php");}
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
	
	// Check connection
	if (mysqli_connect_errno($con))
	{
	}
	else
	{

		
		$result = mysqli_query($con,"SELECT * FROM lookbooks");
		while($row = mysqli_fetch_array($result))
		{
			$s = strtolower($row['ID']);

			if (!copy('lookbooktemplate.php', 'blog/lookbooks/fresh' . $s . '.php'))
			{
				
			}
			else
			{
				
			}
		}
	}
		

	//Automatic Redirect
	$URL = "masterpage.php";
	header ("Location: $URL"); 
	
?>