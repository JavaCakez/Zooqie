<?
ob_start (); // Buffer output
?>
<?php
	if(!session_id()) session_start();
	if(!isset($_SESSION['username'])){
	header("location:login.php");
}
else
{

			// Create connection
            if(file_exists("db_settings.php")) {include("db_settings.php");}
            else if(file_exists("../db_settings.php")) {include("../db_settings.php");}
            else if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
            else if(file_exists("db_settings.php")) {include("db_settings.php");}
			$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

            if(file_exists("utils.php")) {include("utils.php");}
            else if(file_exists("../utils.php")) {include("../utils.php");}
            else if(file_exists("../../utils.php")) {include("../../utils.php");}
            else if(file_exists("utils.php")) {include("utils.php");}
            $userID = getBrandIDFromSessionUsername($_SESSION['username']);
			
			$data = mysqli_query($con,"SELECT * FROM pageviews WHERE BrandUsername = '$userID' AND Length(PageName) > 3 ORDER BY Count DESC LIMIT 3");
			while($row = mysqli_fetch_array($data))
			{
			echo $row['PageName'] . " Count = " . $row['Count'] . "<br>";
			}
			
}
?>
			