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
			
			//create table
			echo " <table class=\"hovertable\">
			<tr>
				<th>Date</th><th>Item Name</th><th title= 'Product Price plus Shipping Price'>Total</th>
			</tr>";
			
			//add data
			//choose the brand logged in from the sales db
			$result = mysqli_query($con,"SELECT Price, Shipping, Date, Item_name FROM sales WHERE BrandUsername = '$userID' ORDER BY Date DESC LIMIT 3");
			$tablecount = 0;
			while($row = mysqli_fetch_array($result))
			{
				$price = number_format((float)$row['Price'], 2, '.', '');
				$shipping = number_format((float)$row['Shipping'], 2, '.', '');
				$total = $price + $shipping; 
				echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
				//echo date
				echo "<td>" . date('d-M-y', strtotime($row['Date'])) . "</td>";
				//echo item number
				echo "<td>" . substr($row['Item_name'],0,12) . "</td>";
				//echo price
				echo "<td>" . $total . "</td>";
				echo "</tr>";
				$tablecount++;
			}
			//enter default table data if no data is given
			for ($x=$tablecount; $x<=2; $x++){
				echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
				echo "<td>" . "--" . "</td>";
				echo "<td>" . "--" . "</td>";
				echo "<td>" . "--" . "</td>";
				echo "</tr>";
				}
			
			echo "</table>";
			

			
}
?>
			