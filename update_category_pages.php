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

		
		$result = mysqli_query($con,"SELECT * FROM categories");
		while($row = mysqli_fetch_array($result))
		{
			$s = strtolower($row['ID']);
			$gender = $row['Gender'];

            if (!file_exists('men/')) {
                mkdir( 'men/', 0755, true);
            }

            if (!file_exists('men/')) {
                mkdir( 'women/', 0755, true);
            }

            if($gender == 'M' || $gender == 'U')
			{
				if (!copy('categorytemplate.php', 'men/' . $s . '.php'))
				{
					
				}
				else
				{
					
				}
			}
			
			if($gender == 'F' || $gender == 'U')
			{
				if (!copy('categorytemplate.php', 'women/' . $s . '.php'))
				{
					
				}
				else
				{
					
				}
			}
		}
		
		if (!copy('categorytemplate.php', 'men/all.php'))
		{
			
		}
		else
		{
			
		}
		
		if (!copy('categorytemplate.php', 'women/all.php'))
		{
			
		}
		else
		{
			
		}
	}
		

	//Automatic Redirect
	$URL = "masterpage.php";
	header ("Location: $URL"); 
	
?>