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
			
			//add up all the views for each product and sort to find the 3 most viewed
			//dont add the shop page - as that will be just TST as opposed to TST001
			$data = mysqli_query($con,"SELECT PageName, Count FROM pageviews WHERE BrandUsername = '$userID' AND CHAR_LENGTH(PageName) > 3 ");
			$count = 0;
			$viewsarray = array();
			while($row = mysqli_fetch_array($data))
			{
				$true = 0;
				//if its the first one add it to the array with its number of views
				if ($count == 0) {
					$viewsarray[$count] = array($row['PageName'],$row['Count'] );
				}
				//if the count is above 0 check to see whether the item number exists already in the array
				//if it does, increment the sales count, if it doesnt, add it to the array with its number of views
				
				if ($count > 0) {
					for ($i = 0; $i<(sizeof($viewsarray)); $i++){
						if ($viewsarray[$i][0] == $row['PageName']){
							//if they are the same, increment count
							$viewsarray[$i][1] = $viewsarray[$i][1] + $row['Count'];
							$true = 1;
						}
					}
					//if not found, add it to the end of the array
					if ($true == 0){
						$viewsarray[sizeof($viewsarray)] = array($row['PageName'], $row['Count']);
					}
					
				}
				$count++;
			}
			
			//sort viewsarray with the highest count having the smallest index in the array
			function countsort($x, $y){
				if ( $x[1] == $y[1] )
				 return 0;
				else if ( $x[1] > $y[1] )
				 return -1;
				else
				 return 1;
				}
			usort($viewsarray, 'countsort');
			
			//create table
			echo " <table class=\"hovertable\">
			<tr>
				<th>Item Name</th><th>Views Count</th>
			</tr>";
			
			
			$tablecount=0;
			for ($y = 0; $y<=2; $y++){
				//make sure the item number is above 3 letters so the shop page is not counted as a product
				if (strlen($viewsarray[$y][0]) > 3) {
					echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
					
					
					//find the item name for the item number
					$itemNo = $viewsarray[$y][0];
					$result = mysqli_query($con,"SELECT Item_name FROM products WHERE Brand = '$userID' AND Item_number = '$itemNo'");
					$data = mysqli_fetch_array($result);
					$prodname = $data[0];
					
					echo "<td>" . substr($prodname,0,12) . "</td>";
					echo "<td>" . $viewsarray[$y][1] . "</td>";
					echo "</tr>";
					}
				$tablecount++;
			}
			
			//enter default table data if there are less than 3 records to display
			for ($x=$tablecount; $x<=2; $x++){
				echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
				echo "<td>" . "--" . "</td>";
				echo "<td>" . "--" . "</td>";
				echo "</tr>";
				}
			echo "</table>";
			

			
}
?>
			