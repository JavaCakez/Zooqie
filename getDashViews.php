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
			
			//display number of view from all brand's pages
			$data = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL 6 DAY) and curdate();");
			$row = mysqli_fetch_array($data);
			$thisweek = $row[0];
			if (empty($thisweek)) {
				echo "<span class=\"Heading-Dash\">0</span>";
			}else { echo "<span class=\"Heading-Dash\">$thisweek</span>"; }

			
}
?>
			