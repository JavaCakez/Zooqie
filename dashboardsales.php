<?
ob_start ();
?>
<?php
	if(!session_id()) session_start();
	if(!isset($_SESSION['username'])){
	header("location:login.php");
	//if username is not set, go back to login
}
else
{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<!-- PLEASE NOTE: CODE FOR THE INFORMATION DASHBOARD PROJECT IS ON THE FOLLOWING LINES: -->
<!-- INFORMATION DASHBOARD HEADER: 80 - 175 -->
<!-- INFORMATION DASHBOARD BODY: 515 - 1070 -->


<!-- SALES DASHBOARD: The sales dashboard gives detailed information on sales performance and is made up of the following components:

1.	�I� for information (Line 528) � This gives a brief explanation to the user about the sales dashboard.
2.	Sales this week (Line 549) � This is a count of the number of sales in the last 7 days.
3.	From last week (Line 564) � This is a percentage comparison of sales this week against sales last week. This percentage is shown in green if the number is positive and red if the number is negative.
4.	Sales this month (Line 598) � This is a count of the number of sales in the last 28 days.
5.	Income this month (Line 613) � This is the total income on sales made in the last 28 days.
6.	Total sales (Line 635) � This is a count of the total sales made through Zooqie.
7.	Total income (Line 650) � This is the total income on all sales made through Zooqie.
8.	Time Period drop down (Line 686) � This is a time period option for the line graph allowing a user to see sales over 4 weeks, 3 months or 1 year. The default is 4 weeks.
9.	Product drop down (Line 697) � This is a product option for the line graph allowing a user to see sales for all products or any one of their products. The default is all products.
10.	Line graph (Line 752) � This shows the number of sales over a selected time period for a selected product or all products using the Chart.JS plugin. The default graph shows all products sold over the last 4 weeks.
11.	Pie chart (Line 821) � Each slice represents the number of sales for each product.
12.	Best seller (Line 930) � This shows a brand�s best-selling item and the number sold. This also gives the pie chart a relative reference of the size of a slice to the number of sales.
13.	Table sort drop down (Line 1039) � This allows the user to sort the sales report table by various different fields.
14.	Sales report (Line 961) � This provides all information about a sale including the date, the item details and where to ship the item. The sales report can be ordered by the date of sale, item name, price and customer name.
15.	Download full report (Line 1017) � This downloads a report of all sales to a Comma Separate Value file, which can be opened by any common spreadsheet software such as Microsoft Excel.
16.	Sales map (Line 91 + 1057) � Using the google maps and geocode API, this map displays a sales pin for each customer.

 -->

 
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><!--TITLE--></title>
<meta name="viewport" content="width=1000">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="css/styles.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.js"></script>


<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->

<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta content="<!--DESCRIPTION-->" name="description" property="og:description" />

<?php
    //Include database settings
    if(file_exists("db_settings.php")) {include("db_settings.php");}
    else if(file_exists("../db_settings.php")) {include("../db_settings.php");}
    else if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}

    //Include utilities
    if(file_exists("utils.php")) {include("utils.php");}
    else if(file_exists("../utils.php")) {include("../utils.php");}
    else if(file_exists("../../utils.php")) {include("../../utils.php");}
    ?>









<!-- BEGINNING OF INFORMATION DASHBOARD HEADER -->

	<!-- CHART.JS INITIALISATION -->
	<script src="js/Chart.js"></script>
	<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
	<style>
		canvas{
		}
	</style>

	
	<!--GOOGLE MAPS INITIALISATION-->
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<title>Geocoding service</title>
	<style>
	  html, body, #map-canvas {
		height: 100%;
		margin: 0px;
		padding: 0px
	  }
	  
	  #panel {
		position: absolute;
		top: 15px;
		left: 10%;
		z-index: 5;
		background-color: #fff;
		padding: 5px;
		border: 1px solid #999;
	  }
	</style>
	
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	
	<script>
		var geocoder;
		var map;
		//initialisation settings for google maps including: initial coordinates, map type and initial zoom
		function initialize() {
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(50.692648, 14.697053);
			var mapOptions = {
				zoom: 4,
				center: latlng
			}
			map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		}

		//Plot sales postcodes from database onto map
		function codeAddress() {
			
			<?
			// Create connection
			$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
			
			//create user id variable
                    $userID = getBrandIDFromSessionUsername($_SESSION['username']);
			
			//get all postcodes and put into an array, ready to be converted to js
			$phparray = array();
			$data = mysqli_query($con,"SELECT Postcode FROM sales WHERE BrandUsername = '$userID'");
			while($row = mysqli_fetch_array($data)){
				if ($row['Postcode'] != ""){
					array_push($phparray, $row['Postcode']);
				}
			}
			?>
			
			//convert php array to js
			var postcodes = [<?php echo '"'.implode('","', $phparray).'"' ?>];
				
			//plot all points from array on map
			for (var i=0;i<postcodes.length;i++) {
			  geocoder.geocode( { 'address': postcodes[i]}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
				  var marker = new google.maps.Marker({
					  map: map,
					  position: results[0].geometry.location
				  });
				} 
			  });
			}
		}

		google.maps.event.addDomListener(window, 'load', initialize);


	</script>


	
	
	
<!-- END OF INFORMATION DASHBOARD HEADER -->











<style type ="text/css">
.Heading-1-P
{
    margin:32px 0px 4px 0px; text-align:center; font-weight:400;
}
.Heading-2-C
{
    font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
}
.Heading-22-C
{
    font-family:"Harabara", serif; color:#656565; font-size:24px; line-height:1.47em;
}
.Heading-22-GREEN
{
    font-family:"Harabara", serif; color:#376737; font-size:24px; line-height:1.47em;
}
.Heading-22-RED
{
    font-family:"Harabara", serif; color:#672626; font-size:24px; line-height:1.47em;
}
.Heading-22-CC
{
    font-family:"Harabara", serif; color:#656565; font-size:12.5px; line-height:1.47em;
}
.Body-C
{
    font-family:"Lato", sans-serif; color:#2c2c2c; font-size:14px; line-height:1.29em;
}
.Heading-2-C-C0
{
    font-family:"Harabara", serif; color:#656565; font-size:21px; line-height:1.48em;
}
.Heading-3-C
{
    font-family:"Harabara", serif; color:#e52b50; font-size:14px; line-height:1.50em;
}
.Heading-1-C-C0
{
    font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
}
.Heading-1-C-C10
{
    font-family:"Harabara", serif; color:#656565; font-size:24px; line-height:1.47em;
}
.Heading-1-C-C1
{
    font-family:"Harabara", serif; color:#656565; font-size:13px; line-height:1.54em;
}
.Heading-3-C-C0
{
    font-family:"Harabara", serif; font-weight:700; color:#656565; font-size:16px; line-height:1.50em;
}
.Heading-3-C-C1
{
    font-family:"Harabara", serif; color:#656565; font-size:13px; line-height:1.54em;
}
.Heading-3-C-C10
{
    font-family:"Harabara", serif; color:#656565; font-size:13px; line-height:1.54em; text-align: center;
}
.Heading-1-C-C9
{
    font-family:"Harabara", serif; color:#656565; font-size:27px; line-height:1.47em;
}
.Body-C-C3
{
    font-family:"Lato", sans-serif; color:#2c2c2c; font-size:16px; line-height:1.38em;
}
.Body-C-C4
{
    font-family:"Lato", sans-serif; color:#ff0000; font-size:16px; line-height:1.38em;
}
.Heading-3-C-C12
{
    font-family:"Harabara", serif; font-size:15px; line-height:1.47em;
}
table.hovertable {
	font-family:"Lato", sans-serif;
	font-size:13px;
	line-height:1.47em;
	color:#515151;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
	width:100%;
    height:100%;
	margin-left: 0 auto;
	margin-right: 0 auto;
}
table.hovertable th {
	background-color:#84C2CB;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#d4e3e5;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
</style>






<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

  



<style type="text/css">
body{margin:0;padding:0;}
.wpfixed{position:absolute;}
div > .wpfixed{position:fixed;}
a.hlink_1:link {color:#2c2c2c;}
a.hlink_1:visited {color:#2c2c2c;}
a.hlink_1:hover {color:#e52b50;}
a.hlink_1:active {color:#2c2c2c;}
.Heading-2-C
{
    font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
}
.Body-C
{
    font-family:"Lato", sans-serif; color:#2c2c2c; font-size:14px; line-height:1.29em;
}
.Heading-2-C-C0
{
    font-family:"Harabara", serif; color:#656565; font-size:21px; line-height:1.48em;
}
.Heading-1-C
{
    font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
}
.Body-C-C0
{
    font-family:"Harabara", serif; color:#656565; font-size:32px; line-height:1.47em;
}


</style>


<script type="text/javascript">


</script>
</head>


<body text="#000000" onload="codeAddress()" style="background:#ffffff url('images/backgroundpattern.png') repeat fixed top center; height:<!--PAGEHEIGHTVAL1-->px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3); "  >

<!--Master Page Body Start-->

<?php
echoFooter(0, '<!--PAGEHEIGHTVAL-->');
echoFacebookScript();
echoHeader(0, '<!--PAGEHEIGHTVAL1-->');
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();

?>

<img src="images/navbar.png" border="0" width="1000" height="40" id="qs_1" alt="Navigation Bar" style="position:absolute;left:0px;top:80px;" >
<!--NAVBAR-->








<!-- BEGINNING OF INFORMATION DASHBOARD BODY -->


	<!-- CREATE USABLE DASHBOARD AREA -->
	<div style="position:relative; top:130px; width:100%;">
		<!--Title-->
		<div style = "position:absolute; top: 9px; width:100% ; text-align: center;">
			<span class="Body-C-C0">Sales Dashboard</span>
		</div>
		<!--Background-->
		<img src="\images\backgrounds\dunes.jpg" alt="" width="100%" height="1430px" />


		<!--Information-->
        <div style = "position:absolute; top: 20px; height: 30px; width: 30px; left: 15px; opacity: .5; ">
			<img src="images/info.png" border="0" alt="" height= "30px" width= "30px" title="Here you can see how your products have sold over time.

The sales comparison pie chart shows how well each product has sold by comparison to your other products.

To see a full report of ALL sales hit the Download button on the sales report.

The sales map shows the geographical locations of those who bought your products." />
		</div>

        <div style = "position:absolute; top: 30px; left: 845px; width:140px; height: 50px; text-align: center; z-index: 100">
            <a href = "uploadmenu.php" style = "text-decoration:none;color:#E52B50; font-family:'Harabara', serif; font-size:17px; line-height:1.50em;"><< Manage Store</a>
        </div>

		<!--Structure Lines-->
		<div style = "position:absolute; top: 65px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
		<div style = "position:absolute; top: 165px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
		<div style = "position:absolute; top: 550px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
		<div style = "position:absolute; top: 965px; left: 10px; width:980px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
		
		
		
		<!--START OF TOP PANEL-->
		
			<!--SALES THIS WEEK-->
			<div style = "position:absolute; top: 75px; left: 65px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
			<br>
					<?
					//display number of sales in last week from selected brand
					$data = mysqli_query($con,"SELECT COUNT(*) FROM sales WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL 6 DAY) and curdate();");
					$row = mysqli_fetch_array($data);
					$thisweek = $row[0];
					echo "<span class=\"Heading-22-C\">$thisweek</span>";
					?>
					<br>
					<span class="Heading-22-CC">SALES THIS WEEK</span>
			</div>
			
			
			<!--PERCENTAGE OF SALES THIS WEEK COMPARED TO LAST WEEK-->
			<div style = "position:absolute; top: 75px; left: 215px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
			<br>
					<?
					//get total number of sales for last week
					$data = mysqli_query($con,"SELECT COUNT(*) FROM sales WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL 13 DAY) and date_sub(curdate(),INTERVAL 7 DAY);");
					$row = mysqli_fetch_array($data);
					$lastweek = $row[0];
					
					if ($lastweek == 0){
						//cant divide by 0
						$zero = "+" .($thisweek * 100) . "%";
						echo "<span class=\"Heading-22-GREEN\">$zero</span>";
					} else {
						//display percentage difference between this week and last week to 1 decimal place
						$diff = (($thisweek / $lastweek) * 100) - 100;
						$diff1 = round($diff, 1);
						//display plus sign if positive, negative sign happens naturally
						//if positive output in green, if negative output in red
						if ($diff1 > 0) {
							$diff1 = "+" . $diff1;
							$diffout = $diff1 . "%";
							echo "<span class=\"Heading-22-GREEN\">$diffout</span>";
						} else {
							$diffout = $diff1 . "%";
							echo "<span class=\"Heading-22-RED\">$diffout</span>";
						}
					}
					?>
					<br>
					<span class="Heading-22-CC">FROM LAST WEEK</span>
			</div>
			
			
			<!--SALES THIS MONTH-->
			<div style = "position:absolute; top: 75px; left: 365px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
				<br>
				<?
					//display number of sales in last month from selected brand
					$data = mysqli_query($con,"SELECT COUNT(*) FROM sales WHERE BrandUsername = '$userID' AND date between date_sub(now(),INTERVAL 27 DAY) and now();");
					$row = mysqli_fetch_array($data);
					$thismonth = $row[0];
					echo "<span class=\"Heading-22-C\">$thismonth</span>";
				?>
					<br>
					<span class="Heading-22-CC">SALES THIS MONTH</span>
			</div>
			
			
			<!--MONTHLY INCOME-->
			<div style = "position:absolute; top: 75px; left: 515px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
				<br>
				<?
					//get all sales in last month, add up the price plus shipping
					$result = mysqli_query($con,"SELECT * FROM sales WHERE BrandUsername = '$userID' AND date between date_sub(now(),INTERVAL 27 DAY) and now();");
					$income = 0;
					while($row = mysqli_fetch_array($result))
					{
						$price = number_format((float)$row['Price'], 2, '.', '');
						$shipping = number_format((float)$row['Shipping'], 2, '.', '');
						$total = $price + $shipping;
						$income = $income + $total;
					}
					$incomeout = "£" . $income;
					echo "<span title= 'Note: This figure is before commission and includes shipping charges' class=\"Heading-22-C\">$incomeout</span>";
				?>
					<br>
					<span class="Heading-22-CC">INCOME THIS MONTH</span>
			</div>
			
			
			<!--TOTAL SALES -->
			<div style = "position:absolute; top: 75px; left: 665px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
				<br>
				<?
					//display total number of sales from selected brand
					$data = mysqli_query($con,"SELECT COUNT(*) FROM sales WHERE BrandUsername = '$userID'");
					$row = mysqli_fetch_array($data);
					$total = $row[0];
					echo "<span class=\"Heading-22-C\">$total</span>";
				?>
					<br>
					<span class="Heading-22-CC">TOTAL SALES</span>
			</div>
			
			
			<!--TOTAL INCOME-->
			<div style = "position:absolute; top: 75px; left: 815px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8; ">
				<br>
				<?
					//add up total sales income and shipping 
					$result = mysqli_query($con,"SELECT * FROM sales WHERE BrandUsername = '$userID'");
					$income = 0;
					while($row = mysqli_fetch_array($result))
					{
						$price = number_format((float)$row['Price'], 2, '.', '');
						$shipping = number_format((float)$row['Shipping'], 2, '.', '');
						$total = $price + $shipping;
						$income = $income + $total;
					}
					$incomeout = "£" . $income;
					echo "<span title= 'Note: This figure is before commission and includes shipping charges' class=\"Heading-22-C\">$incomeout</span>";
				?>
					<br>
					<span class="Heading-22-CC">TOTAL INCOME</span>
			</div>
		
		
		<!--END OF TOP PANEL-->
		
		
		
		<!--START OF DROP DOWN LISTS-->
		
			<? //variables for keeping time and product selected values
			$timeSort = $_POST['time'];
			$productSort = $_POST['product'];
			?>
			
			<!--Form for line graph drop down lists-->
			<form name = "Select1" action="/dashboardsales.php" method="POST" class="Heading-22-CC" >
				
				<!--Time drop down list for Line Chart -->
				<div style = "position:absolute; top: 172px; left: 65px; width: 120px; height: 30px; text-align: center; opacity: .85;">
					<select name = "time" id = "time" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" OnChange="document.Select1.submit(); ">
						<!-- Ensure option stays selected after page submit -->
						<option value=0 <? if ($timeSort == 0){ echo "selected = 'selected'";} ?>>-Time Period-</option>
						<option value=1 <? if ($timeSort == 1){ echo "selected = 'selected'";} ?>>4 Weeks</option>
						<option value=2 <? if ($timeSort == 2){ echo "selected = 'selected'";} ?>>3 Months</option>
						<option value=3 <? if ($timeSort == 3){ echo "selected = 'selected'";} ?>>1 Year</option>
					</select>
				</div>
				
				<!--Products drop down list for Line Chart-->	
				<div style = "position:absolute; top: 172px; left: 365px; width:120px; height: 30px; text-align: center; opacity: .85;">
					<select name = 'product' style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" OnChange="document.Select1.submit();" >
						<option value="0">-All Products-</option>
						
						<!-- Retrieve all product names and IDs from database -->
						<?
							//add each individual product to an array ready to be displayed in a drop down list
							$result = mysqli_query($con,"SELECT Item_number, Item_name FROM products WHERE Brand = '$userID'");
							$products = array();
							$names = array();
							//dont want to add the same product name more than once (eg: TST001 red and TST001 blue)
							while($data = mysqli_fetch_array($result))
							{
								$found = 0;
								$arcount = sizeof($products);
								//if its the first item in the array add it
								if ($arcount == 0) { 
									$products[$arcount] = $data['Item_number']; 
									$names[$arcount] = $data['Item_name'];}
								//if its not the first item, check if it already exists
								if ($arcount > 0) {
									for ($x=0; $x<=$arcount; $x++){
										if ($products[$x] == $data['Item_number']) {
											$found = 1;
										}
									}
									//if its not found, add it
									if ($found == 0) {
										$products[$arcount] = $data['Item_number']; 
										$names[$arcount] = $data['Item_name'];}
								}
							}
							
							//add every element in the products array to the drop down list
							for ($x=0; $x<=$arcount; $x++){
								$val = $x + 1; ?>
								<!-- Ensure option stays selected after page submit -->
								<option value= <? echo $val;?> <?if($productSort == $val){ echo "selected = 'selected'";} ?>> <?echo $products[$x] . " - " . $names[$x];?></option>; <?
							}
						?>
					</select>
				</div>
			</form>
		
		
		<!--END OF DROP DOWN LISTS-->
		
		
		
		<!--LINE CHART LABEL-->
		<div style = "position: absolute; left: -20px; top: 360px; -ms-transform:rotate(270deg); -moz-transform:rotate(270deg); -webkit-transform:rotate(270deg);"> 
			<span class="Heading-2-C">Sales Count</span>
		</div> 
		
		<!--LINE CHART-->
		<div style = "position:absolute; top: 220px; left: 20px; text-align: center;">
			
			<canvas id="line" height="320" width="680"></canvas>
			<script type="text/javascript">
				
				<?
				//function to get the number of sales between two specific dates for either all products or a specific product
				function getData($prod, $con1, $user1, $date1, $date2){
					
					if ($prod == 0) {
						//get sales data for all products
						$query = "SELECT COUNT(*) FROM sales WHERE BrandUsername = '$user1' AND date between " . $date1 . " and ". $date2; 
					
					} else {
						//get sales data for a specific product
						//make $prod equal to the item number 
						if ($prod < 10) {
							$prod = $user1."00".$prod;
						} else if ($prod < 100 && $prod >= 10) {
							$prod = $user1."0".$prod;
						} else if ($prod >= 100) {
							$prod = $user1 . $prod; }
						$query = "SELECT COUNT(*) FROM sales WHERE BrandUsername = '$user1' AND Item_Number = '$prod' AND date between " . $date1 . " and ". $date2;
					}
					$data = mysqli_query($con1, $query);
					$row = mysqli_fetch_array($data);
					echo $row[0]; }	
				?>
				
				//get time period selected in the drop down list
				var timeValue = <? if (!isset($timeSort)) {echo 0;} else { echo $timeSort; } ?>;
				//initiate variable PRODVAL for selected product
				<? if (!isset($productSort)) {$prodVal = 0;} else { $prodVal = $productSort; } ?>
				
				//CHOOSE GRAPH LABELS & DATA
				if (timeValue < 2) { // if the time value is TIME PERIOD or 4 WEEKS then show 4 WEEKS worth of data and set appropriate labels
					var showLabels = new Array("<? echo date("d/M",strtotime("-1 month")); ?>", "<? echo date("d/M",strtotime("-3 week")); ?>", "<? echo date("d/M",strtotime("-2 week")); ?>", "<? echo date("d/M",strtotime("-1 week")); ?>");
					var showData = new Array(<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 27 DAY)", "date_sub(CURDATE(),INTERVAL 21 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 20 DAY)", "date_sub(CURDATE(),INTERVAL 14 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 13 DAY)", "date_sub(CURDATE(),INTERVAL 7 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 6 DAY)", "CURDATE()"); ?>,0,3);
					}
				else if (timeValue == 2) { //if the time value is 3 MONTHS then show 3 Months worth of data and set appropriate labels
					var showLabels = new Array("<? echo date("d/M",strtotime("-12 week")); ?>", "<? echo date("d/M",strtotime("-11 week")); ?>","<? echo date("d/M",strtotime("-10 week")); ?>","<? echo date("d/M",strtotime("-9 week")); ?>","<? echo date("d/M",strtotime("-8 week")); ?>", "<? echo date("d/M",strtotime("-7 week")); ?>", "<? echo date("d/M",strtotime("-6 week")); ?>", "<? echo date("d/M",strtotime("-5 week")); ?>","<? echo date("d/M",strtotime("-4 week")); ?>", "<? echo date("d/M",strtotime("-3 week")); ?>", "<? echo date("d/M",strtotime("-2 week")); ?>", "<? echo date("d/M",strtotime("-1 week")); ?>");
					var showData = new Array(<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 83 DAY)", "date_sub(CURDATE(),INTERVAL 77 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 76 DAY)", "date_sub(CURDATE(),INTERVAL 70 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 69 DAY)", "date_sub(CURDATE(),INTERVAL 63 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 62 DAY)", "date_sub(CURDATE(),INTERVAL 56 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 55 DAY)", "date_sub(CURDATE(),INTERVAL 49 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 48 DAY)", "date_sub(CURDATE(),INTERVAL 42 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 41 DAY)", "date_sub(CURDATE(),INTERVAL 35 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 34 DAY)", "date_sub(CURDATE(),INTERVAL 28 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 27 DAY)", "date_sub(CURDATE(),INTERVAL 21 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 20 DAY)", "date_sub(CURDATE(),INTERVAL 14 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 13 DAY)", "date_sub(CURDATE(),INTERVAL 7 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 6 DAY)", "CURDATE()"); ?>, 0,0,3);
					}
				else if (timeValue == 3) {//if the time value is 1 YEAR then show 12 Months worth of data and set appropriate labels
					var showLabels = new Array("<? echo date("M-y",strtotime("-11 month"));?>", "<? echo date("M-y",strtotime("-10 month"));?>", "<? echo date("M-y",strtotime("-9 month"));?>", "<? echo date("M-y",strtotime("-8 month"));?>", "<? echo date("M-y",strtotime("-7 month"));?>", "<? echo date("M-y",strtotime("-6 month"));?>", "<? echo date("M-y",strtotime("-5 month"));?>", "<? echo date("M-y",strtotime("-4 month"));?>", "<? echo date("M-y",strtotime("-3 month"));?>", "<? echo date("M-y",strtotime("-2 month"));?>", "<? echo date("M-y",strtotime("-1 month"));?>", "<? echo date("M-y");?>");
					var showData = new Array(<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 12 MONTH)", "date_sub(CURDATE(),INTERVAL 11 MONTH)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 11 MONTH)", "date_sub(CURDATE(),INTERVAL 10 MONTH)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 10 MONTH)", "date_sub(CURDATE(),INTERVAL 9 MONTH)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 9 MONTH)", "date_sub(CURDATE(),INTERVAL 8 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 8 MONTH)", "date_sub(CURDATE(),INTERVAL 7 MONTH)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 7 MONTH)", "date_sub(CURDATE(),INTERVAL 6 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 6 MONTH)", "date_sub(CURDATE(),INTERVAL 5 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 5 MONTH)", "date_sub(CURDATE(),INTERVAL 4 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 4 MONTH)", "date_sub(CURDATE(),INTERVAL 3 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 3 MONTH)", "date_sub(CURDATE(),INTERVAL 2 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 2 MONTH)", "date_sub(CURDATE(),INTERVAL 1 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 1 MONTH)", "CURDATE()"); ?>,0,0,3);
					}
					
				//Draw line chart using the labels array and sales data array
				var lineChartData = {
					labels : showLabels,
					datasets : [
						{
							fillColor : "rgba(20,220,220,0.5)",
							strokeColor : "rgba(220,220,220,1)",
							pointColor : "rgba(220,220,220,1)",
							pointStrokeColor : "#fff",
							data : showData
						},
					]
				}

				var myLine = new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
			</script>
		</div>
		
		
		
		<!--PIE CHART-->
		<div style = "position:absolute; top: 170px; left: 690px; width:300px; height: 80px; text-align: center; opacity: .9;">
		
			<!--Pie chart title-->
			<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
				<span title = 'Each slice represents a products proportion of total sales' class="Heading-2-C">PRODUCT SALES COMPARISON</span> 
			</div> <br> 
			<br>
			
			<!--get the number of sales for each product to feed into the pie chart-->
			<?
				$data = mysqli_query($con,"SELECT * FROM sales WHERE BrandUsername = '$userID'");
				$count = 0;
				$salesarray = array();
				while($row = mysqli_fetch_array($data))
				{
					$true = 0;
					//if its the first one add it to the array with a count of 1 sale
					if ($count == 0) {
						$salesarray[$count] = array($row['Item_Number'], 1);
					}
					
					//if the count is above 0 check to see whether the item number exists already in the array
					//if it does, increment the sales count, if it doesnt, add it to the array with a count of 1
					if ($count > 0) {
						for ($i = 0; $i<(sizeof($salesarray)); $i++){
							if ($salesarray[$i][0] == $row['Item_Number']){
								//if they are the same, increment count
								$salesarray[$i][1] = $salesarray[$i][1] + 1;
								$true = 1;
							}
						}
						//if not found, add it to the end of the array
						if ($true == 0){
							$salesarray[sizeof($salesarray)] = array($row['Item_Number'], 1);
						}
					}
					$count++;
				} 
				
				//sort salesarray with the highest count of sales being at the beginning of the array
				function countsort($x, $y){
					if ( $x[1] == $y[1] )
					 return 0;
					else if ( $x[1] > $y[1] )
					 return -1;
					else
					 return 1;
					}
				usort($salesarray, 'countsort');
				
				?>
								
				<!--Draw pie chart-->
				<canvas title = 'Each slice represents a products proportion of total sales' id="pie" height="240" width="240";></canvas>
				<script type="text/javascript">
				
					var pieData = [
					
					//give dummy data for pie chart so it shows up 
					<?
					if (sizeof($salesarray) == 0) {
						$salesarray[0][0] = "--";
						$salesarray[0][1] = 0;
					?>
						{
							//create pie chart slice
							value: 1,
							color:'#63CEDE',
							label : 'No Data',
							labelColor : "#666",
							labelFontSize : '20'
						},
					<? } else {
						//an array of colours for different pie chart slices
						$colours = array("#63CEDE", "#F38630", "#E0E4CC", "#81FF83", "#FDFA4F", "#FD4FD4", "#DF8D64", "#8C9DFF", "#B88FFF", "FD4F4F" );
						
						//17 is the max number of products the pie chart can show clearly
						if (sizeof($salesarray) > 17) {
							$arraySize = 17;
						} else { $arraySize = sizeof($salesarray); }
						
						//loop through views array and display in pie chart
						for ($z = 0; $z<$arraySize; $z++){
							//for choosing colour, if z is greater than size of colours array, choose random colour
							if ($z >= sizeof($colours)) { 
								$y = rand(0,sizeof($colours));
							} else { $y = $z;}
							?>
							{
								//create pie chart slice
								value: <? echo $salesarray[$z][1];?>,
								color:'<? echo $colours[$y];?>',
								label : '<? echo $salesarray[$z][0]; ?>',
								labelColor : "#666",
								labelFontSize : '20'
							},
					<?	}
					}	?>
					];

				var myPie = new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
				</script>
			
			
			
			<!--BEST SELLER TABLE-->
			<div style = "position:absolute; left: 42px; top: 290px; width:220px; text-align: center; ">
				<?
					echo "<table class=\"hovertable\"> <tr> <th>Best Seller</th><th>Sales</th> </tr>";
					
					//find the item name for the item number
					$itemNo = $salesarray[0][0];
					$result = mysqli_query($con,"SELECT Item_name FROM products WHERE Brand = '$userID' AND Item_number = '$itemNo'");
					$data = mysqli_fetch_array($result);
					$prodname = $data[0];
					
					//display the best selling item and the number of sales
					echo "<tr> <td>" . $salesarray[0][0] . " - " . substr($prodname,0,8) . "</td> <td>" . $salesarray[0][1] . " </td> </tr>";
					echo "</table>";
					
				?>
			</div>
		
		</div>
		
		
		
		
		<!--SALES REPORT-->
		<div style = "position:absolute; top: 570px; left: 20px; width:960px; height: 380px; background-color:#D1D1D1; text-align: center; opacity: .9;">
			<br>

			<? //variable for table order
			$tableSort = $_POST['tableorder'];
			?>		
			
			<!--Sales Report Table-->
			<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
				<span class="Heading-2-C">SALES REPORTS</span>
				<div style = "position:absolute; top: 35px; width:940px; left: 10px; text-align: center;">
				<?
					//create table
					echo " <table class=\"hovertable\">
					<tr>
						<th>Date</th><th>Item</th><th>Item Name</th><th>Customer</th><th>Address1</th><th>Address2</th><th>Postcode</th><th>Contact</th><th>Price</th><th>Shipping</th>
					</tr>";
					
					//if no table order has been set, default to ordering by date
					if (!isset($tableSort)) {$tableSort = "Date DESC";}
					
					//get all sales from the database, limited to displaying 8
					$result = mysqli_query($con,"SELECT * FROM sales WHERE BrandUsername = '$userID' ORDER BY " . $tableSort . " LIMIT 8");
					$tablecount = 0;
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
						
						//format and display all sales information
						$price = number_format((float)$row['Price'], 2, '.', '');
						$shipping = number_format((float)$row['Shipping'], 2, '.', '');
						$itemname = substr($row['Item_name'],0,12) . "-" . $row['Description'];
						echo "<td>" . date('d-M-y', strtotime($row['Date'])) . "</td>";
						echo "<td>" . $row['Item_Number'] . "</td>";
						echo "<td>" . substr($itemname,0,17) . "</td>";
						echo "<td>" . substr($row['Name'],0,17) . "</td>";
						echo "<td>" . substr($row['Address1'],0,20) . "</td>";
						echo "<td>" . substr($row['Address2'],0,15) . "</td>";
						echo "<td>" . substr($row['Postcode'],0,8) . "</td>";
						echo "<td>" . substr($row['Contact'],0,11) . "</td>";
						echo "<td>" . $price . "</td>";
						echo "<td>" . $shipping . "</td>";
						echo "</tr>";
						$tablecount++;
					}
					
					//enter default table data if less than 8 records exist
					for ($x=$tablecount; $x<=7; $x++){
						echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
						for ($y =0; $y<=9; $y++){
							echo "<td>" . "--" . "</td>";
						}
						echo "</tr>";
						}
					
					echo "</table>";
				?>
				
				</div>
				
			</div>
			
			
			<!--DOWNLOAD BUTTON FOR SALES REPORT-->
			<div style = "position:absolute; top: 8px; right: 8px; text-align: centre;" >
				
				<?
				//if the download button is clicked, save all mysql sales data into a csv file
				if (isset($_POST['Download'])) {
				
					include("download.php");
					$qry = mysqli_query($con,"SELECT * FROM sales WHERE BrandUsername = '$userID' ORDER BY Date DESC");
					download($con, $userID, $qry, 'ZooqieSalesReport-');
						
					} 
					
				?>
				
				<form method = "post">
					<input type = "submit" name = "Download" value = "Download Full Report" class="Heading-22-CC" />
				</form>
				
			</div>
			
			
			<!--DROP DOWN LIST FOR ORDERING SALES REPORT-->
			<div style = "position:absolute; top: 2px; left: 10px; width: 150px; ">
				<form name = "Select3" action="/dashboardsales.php" method="POST" class="Heading-22-CC" >
					<select name = "tableorder" id = "tableorder" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" OnChange="document.Select3.submit(); ">
						<option value='Date DESC' <?if($_POST['tableorder'] == 'Date DESC') {echo 'selected';}?>>-Order By-</option>
						<option value='Date DESC' <?if($_POST['tableorder'] == 'Date DESC') {echo 'selected';}?>>Date - Newest First</option>
						<option value='Date ASC' <?if($_POST['tableorder'] == 'Date ASC') {echo 'selected';}?>>Date - Oldest First</option>
						<option value='Item_Number ASC' <?if($_POST['tableorder'] == 'Item_Number ASC') {echo 'selected';}?>>Item Number</option>
						<option value='Price DESC' <?if($_POST['tableorder'] == 'Price DESC') {echo 'selected';}?>>Price - Highest First</option>
						<option value='Price ASC' <?if($_POST['tableorder'] == 'Price ASC') {echo 'selected';}?>>Price - Lowest First</option>
						<option value='Name ASC' <?if($_POST['tableorder'] == 'Name ASC') {echo 'selected';}?>>Customer Name</option>
					</select>
				</form>
			</div>
			
		</div>


		<!--GOOGLE MAPS-->
		<div style = "position:absolute; top: 980px; left:20px; width:960px; background-color:#D1D1D1; text-align: center; opacity: .9;">
			<span class="Heading-2-C">SALES MAP</span>
		</div>
		<div id="map-canvas"  style="position:absolute; top: 1007px; left: 20px; width: 960px; height: 400px;"></div>
		
	</div>






<!-- END OF INFORMATION DASHBOARD BODY -->



<!--Master Page End-->
<div id="nav-bar"></div>

</div>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/totop.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!--Page Body End-->


</body>
</html>

<?

//close connection
	mysqli_close($con);
	
}
?>






<?
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

$navBar = '

<div class="nav_348style" id="nav_348" style="left: 20px; top: 91px;; width: 960px; height: 26px; position: absolute;">
	<a id="nav_348_I0" href="index.php" target="_self"> Home </a>
	 &gt; 
	<a id="nav_348_I2" href="dashboard.php" target="_self"> Dashboard Home </a>
	&gt; 
	<a id="nav_348_I2" href="dashboardsales.php" target="_self"> Sales </a>
</div>';


$minHeight = 1570;
$ph = $b + 40;
if($ph < $minHeight) $ph = $minHeight;
$pageHeight = $ph ;
$pageHeightVal1 = $ph  + 222;
$pageHeightVal2 = $ph  + 14;
$pageHeightVal3 = $ph  + 65;
$pageHeightVal4 = $ph  + 162;
$pageHeightVal5 = $ph  + 183;
$pageHeightVal6 = $ph  + 115;

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
$array1 = array("<!--TITLE-->", '<!--NAVBAR-->', '<!--PAGEHEIGHT-->', '<!--PAGEHEIGHTVAL1-->', '<!--PAGEHEIGHTVAL2-->', '<!--PAGEHEIGHTVAL3-->', '<!--PAGEHEIGHTVAL4-->', '<!--PAGEHEIGHTVAL5-->', '<!--PAGEHEIGHTVAL6-->', '<!--DESCRIPTION-->');//Values to replace 
$array2 = array("Sales Dashboard", $navBar, $pageHeight, $pageHeightVal1, $pageHeightVal2, $pageHeightVal3, $pageHeightVal4, $pageHeightVal5, $pageHeightVal6, $d);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>