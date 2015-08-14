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

		
		$result = mysqli_query($con,"SELECT * FROM products ");
		while($row = mysqli_fetch_array($result))
		{
            $s = strtolower($row['Item_number']);
            $ID = $row['Brand'];

            $result3 = mysqli_query($con,"SELECT * FROM brands WHERE ID = '" . $ID . "'");
            while($row3 = mysqli_fetch_array($result3))
            {
                $live = $row3['Live'];
                $brandId = $row3['ID'];
            }

            if($live == 1 || $brandId == 'TST')
            {
                $result2 = mysqli_query($con,"SELECT * FROM brandfolders WHERE ID = '" . $ID . "'");
                while($row2 = mysqli_fetch_array($result2))
                {
                    $foldername = 'brands/' . $row2['Folder_name'];
                }

                if (!copy('producttemplate.php', $foldername . '/' . strtolower($s) . '.php'))
                {

                }
                else
                {

                }
            }
		}
	}
		

	//Automatic Redirect
	$URL = "masterpage.php";
	header ("Location: $URL"); 
	
?>