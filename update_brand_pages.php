<?php

    //Include database settings
    if(file_exists("db_settings.php")) {include("db_settings.php");}
    else if(file_exists("../db_settings.php")) {include("../db_settings.php");}
    else if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}

    //Include utilities
    if(file_exists("utils.php")) {include("utils.php");}
    else if(file_exists("../utils.php")) {include("../utils.php");}
    else if(file_exists("../../utils.php")) {include("../../utils.php");}
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

	// Check connection
	if (mysqli_connect_errno($con))
	{
	}
	else
	{

		
		$result = mysqli_query($con,"SELECT * FROM brands WHERE Live = 1");


		while($row = mysqli_fetch_array($result))
		{
			$s = $row['ID'];
            $name = str_replace("&","and",$row['Brand_name']);


            $result2 = mysqli_query($con,"SELECT * FROM brandfolders WHERE ID = '" . $s . "'");
            while($row2 = mysqli_fetch_array($result2))
            {
                $foldername = 'brands/' . $row2['Folder_name'];
            }

            if (!file_exists($foldername . '/')) {
                mkdir( $foldername . '/', 0755, true);
            }

            if (!copy('brandtemplate.php',  $foldername . '/index.php'))
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