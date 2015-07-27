<?php
	if(!session_id()) session_start();	

	// Create connection
    if(file_exists("db_settings.php")) {include("db_settings.php");}
    if(file_exists("../db_settings.php")) {include("../db_settings.php");}
    if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
    if(file_exists("db_settings.php")) {include("db_settings.php");}
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
	
	// Check connection
	if (mysqli_connect_errno($con))
	{
        $Message = 'Failure - couldn\'t connect to DB';
	}
	else
	{
		$Brand_name 	= mysqli_real_escape_string($con, $_POST['brandname']);
		$ID 	        = mysqli_real_escape_string($con, $_POST['id']);
        $Commission 	= mysqli_real_escape_string($con, $_POST['commission']);
        $Username       = $ID;

        $result = mysqli_query($con,"SELECT * FROM brands WHERE ID = '" . $ID . "'");
        // ID doesn't already exist, all capital letters and length 3
        if($result->num_rows == 0 && strlen($ID) == 3 && ctype_alpha($ID) && ctype_upper($ID))
        {
            if($Brand_name != '' && $ID != '' && $Commission != '' && is_numeric($Commission))
            {
                //Insert brand into brand table
                $sql = "INSERT INTO brands (Brand_name, ID, Username, Commission, Date_added, Live) VALUES ('" . $Brand_name . "', '" . $ID . "', '" . $Username . "', " . $Commission . ", '" . date('Y-m-d H:i:s') . "', '-1');";
                $result = mysqli_query($con,$sql);

                //Insert brand login into login table
                $sql = "INSERT INTO logins (ID, Username, Password) VALUES ('" . $ID . "', '" . $Username . "', '9bd52003a9db818a0658149d5a4e2329');";
                $result = mysqli_query($con,$sql);

                //Insert brand folder into brandfolder table
                $foldername = str_replace(" ", "-", strtolower($Brand_name));
                $sql = "INSERT INTO brandfolders (ID, Folder_name) VALUES ('" . $ID . "', '" . $foldername . "');";
                $result = mysqli_query($con,$sql);

                //Create brand folder
                $foldername = 'brands/' . $foldername;
                if (!file_exists($foldername . '/')) {
                    mkdir( $foldername . '/', 0755, true);
                }

                //Create brand page
                if (!copy('brandtemplate.php',  $foldername . '/index.php'))
                {

                }
                else
                {

                }

                $Message = 'Success';
            }
            else
            {
                $Message = 'Failure - One of the inputs was empty or invalid';
            }
        }
        else
        {
            $Message = 'Failure - invalid ID (must be 3 capital letters and not already be in use)';
        }
	}

	//Automatic Redirect
    $URL = "masterpage.php?Message=" . urlencode($Message);
	//Reload without cache (for new images)
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
	header ("Location: $URL"); 
	
?>