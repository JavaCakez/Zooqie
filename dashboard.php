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
<!-- INFORMATION DASHBOARD HEADER: 75 - 145 -->
<!-- INFORMATION DASHBOARD BODY:  490 - 1050 -->


<!-- DASHBOARD HOME: The dashboard home gives a real time overview of business performance and is made up of the following components:

1. Manage Store (Line 603) � This takes a user to the store management tool, separate to this project.
2. �I� for Information (Line 610) � This gives a brief explanation to the user about the dashboard home.
3. Sales This Week (Line 620) � This is a real time count of the number of sales in the database that have been made in the last 7 days for the brand. Clicking anywhere in this box takes a user through to the sales dashboard.
4. Views This Week (Line 658) � This is a real time count of the number of views on all products made in the last 7 days for the brand. Clicking anywhere in this box takes a user through to the views dashboard.
5. Targets (Line 694) � This outputs a bar graph, displaying the percentage of each targets completion. If a user has currently set no targets, two default targets are set for them: �Sell 5 of all products per month� and �100 views on all products per week�. Targets are further explained in Section 6.6. Clicking anywhere in this box takes a user through to the targets dashboard.
6. Recent Sales (Line 764) � This displays real time information for the three most recent sales. Clicking anywhere in this box opens a pop up window displaying all sales details (Line 825). The pop up uses an open source jQuery plugin called Colorbox under the MIT Licence (available at www.jacklmoore.com/colorbox)
7. Most Viewed (Line 888) � This displays a real time count of the three most viewed items for a brand. Clicking anywhere in this box takes a user to the views dashboard.
8. Lowest in Stock (Line 999) � This displays the three items with the lowest stock. Clicking anywhere in this box takes a user to the stocks dashboard.

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
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/jquery.prettyphoto.js" charset="utf-8"></script>
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


	<!-- AJAX UPDATES -->
	<script type="text/javascript">
	  
	  // refresh rate in milliseconds
	  setInterval( refreshDash, 5000 );
	  // initialise in request variable
	  var inRequest = false;
	  
	  
	  function refreshDash() {
		if ( inRequest ) {
		  return false;
		}
		
		//refresh views counter
		refreshStats('getDashViews.php', '.dashViews') 
		
		//refresh sales counter 
		refreshStats('getDashSales.php', '.dashSales') 
		
		//refresh recent sales table
		refreshStats('getDashSalesTable.php', '.dashSalesTable') 
		
		//refresh most viewed table
		refreshStats('getDashViewsTable.php', '.dashViewsTable') 
		
		function refreshStats(file, div){
			inRequest = true;
			var load = $.get(file);
			load.error(function() {
			  //alert( "Ajax load Error" );
			});
			load.success(function( result ) {
			  $(div).html(result);
			});
			load.done(function() {
			  inRequest = false;
			});
		}
	  }
	</script>


	<!-- COLORBOX INITIALISATION -->
	<link rel="stylesheet" href="css/colorbox.css" />
	<script src="js/jquery.colorbox.js"></script>
	<script>

		$(document).ready(function()
		{
			$("#inline-link").colorbox({inline:true, width:"90%", href:"#inline-content"});
		});
		
	</script>

	
	<!-- CHART.JS INITIALISATION -->
	<script src="js/Chart.js"></script>
	<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
	<style>
		canvas{
		}
	</style>
	
	
	
	
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
.Heading-2-CC
{
    font-family:"Harabara", serif; color:#3A3A3A; font-size:22px; line-height:1.47em;
}
.Heading-2-CD
{
    font-family:"Harabara", serif; color:#3A3A3A; font-size:15px; line-height:1.47em;
}
.Heading-Dash
{
    font-family:"Harabara", serif; color:#656565; font-size:40px; line-height:1.47em;
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
    font-family:"Harabara", serif; color:#656565; font-size:31px; line-height:1.47em;
}

#nav-bar {  min-height: 80px; background: #fff; }        /* Top bar height and colour */
#nav > li:hover > a { border-top: 3px solid #E52B50; }    /* Navigation bar top border hover state colour */
.button.amaranth { background-color: #E52B50; }           /* Button colour throughout site */

</style>
<script type="text/javascript" src="js/jspngfix.js"></script>
<link rel="stylesheet" href="css/wpstyles.css" type="text/css"><script type="text/javascript">
var blankSrc = "js/blank.gif";
</script>
<script type="text/javascript" src="js/jsRollover.js"></script>
<script type="text/javascript">

		
		</script>



</head>


<body text="#000000" style="background:#ffffff url('images/backgrounds/grey.png') repeat fixed top center; height:<!--PAGEHEIGHTVAL1-->px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3); "  >

<!--Master Page Body Start-->



<?php
echoFacebookScript();
echoHeader(0, 1000, '<!--PAGEHEIGHTVAL1-->');
echoFooter(0, '<!--PAGEHEIGHTVAL-->');
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();
?>

<img src="images/navbar.png" border="0" width="1000" height="40" id="qs_1" alt="Navigation Bar" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:80px;" >
<!--NAVBAR-->









<!-- BEGINNING OF INFORMATION DASHBOARD BODY -->




	<?

	//RESUABLE PHP FUNCTIONS

	//function to find an item name from a number, eg: input: 1, output: TST001
	function findItem ($user1, $prod) {
		if ($prod == 0) {
			$prod = 'All Products';
		} else if ($prod < 10) {
			$prod = $user1."00".$prod;
		} else if ($prod < 100 && $prod >= 10) {
			$prod = $user1."0".$prod;
		} else if ($prod >= 100) {
			$prod = $user1 . $prod; }
		return $prod;
	}

	//function to find time period from a number, eg: input: 1, output: Per Week
	function findTimeValue($numb) {
		if ($numb == 1){ $timePer = '7 DAY';
		} else if ($numb == 2) { $timePer = '1 MONTH';
		} else if ($numb == 3) { $timePer = '3 MONTH';
		} else if ($numb == 4) { $timePer = '12 MONTH'; }
		return $timePer;
	}
					
	//function to get target results. 
	//Given a target number, returns an array containing the actual value achieved, the target value and the percentage completion of the target
	function targetPercent($con, $userID, $targetNo){

		//create string variables that match the name of the database fields
		$targName = 'target'.$targetNo.'_name';
		$targValue = 'target'.$targetNo.'_value';
		
		//check to see if the target exists
		$result = mysqli_query($con,"SELECT $targName, $targValue FROM targets WHERE BrandUsername = '$userID' ");
		$row = mysqli_fetch_array($result); 
		
		//if the target is empty, return an array of zeros
		if ($row[$targName] == '') {
			return array(0,0,0);
	
		//if the target does exist, work out what target is trying to be achieved
		} else {  
		
			//identify product
			$outItem = findItem($userID, substr($row[$targName],1,1));
			
			//identify time period
			$outTime = findTimeValue(substr($row[$targName],2,1));
			
			//work out if its a sales or views target and if its for a specific item or all products, then create an appropriate database query 
			if ($row[$targName] < 200) { 
				//sales target
				if ($outItem == 'All Products') { 
					//query for all products
					$query = "SELECT COUNT(*) FROM sales WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL $outTime) and curdate();";
				} else { 
					//query a specific product
					$query = "SELECT COUNT(*) FROM sales WHERE BrandUsername = '$userID' AND Item_Number = '$outItem' AND date between date_sub(curdate(),INTERVAL $outTime) and curdate();";
				}
			} else {
				//views target
				if ($outItem == 'All Products') { 
					//query for all products
					$query = "SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL $outTime) and curdate();";
				} else {
					//query for a specific product
					$query = "SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND PageName = '$outItem' AND date between date_sub(curdate(),INTERVAL $outTime) and curdate();";
				}
			}
		
			//work out how much of that target has been achieved in the time period specified
			$data = mysqli_query($con, $query);
			$data1 = mysqli_fetch_array($data);
			$targetResult = $data1[0];
			$targetValue = $row[$targValue];
			//output a percentage of the target achieved so far out of the target value
			//cant divide by 0, so check for that
			if (empty($data1[0])) {
				$targetPerc = 0;
				$targetResult = 0;
			} else { 
				$targetPerc = ($targetResult / $targetValue) * 100;
				//round to one decimal place
				$targetPerc = (round($targetPerc, 1));
			}
			
			//return an array containing the actual value achieved, the target value and the percentage completion of the target
			$arrayOut = array($targetResult, $targetValue, $targetPerc);
			return $arrayOut;
		}
	}

	?>

	
	<!-- CREATE USABLE DASHBOARD AREA -->
	<div style="position:relative; top:130px; width:100%;">
		
		<!--Background image-->
		<img src="\images\backgrounds\dunes.jpg" alt="" width="100%"; height="540px" />
		
		<!--Page title-->
		<div style = "position:absolute; top: 15px; width:100%; text-align: center;">
			<span class="Body-C-C0">Dashboard Home</span>
		</div>

        		<!--Go to store management tool-->
<!--        		<div style = "position:absolute; top: 15px; left: 760px; width:240px; height: 50px; background-color:#D1D1D1; text-align: center; opacity: .9;">-->
<!--        			<div style ="position:absolute; top:8px; width:100%; text-align: center;">-->
<!--        				<a class="Heading-2-CC" href = "/uploadmenu.php" style = "text-decoration:none;" TITLE="Upload and edit products and store appearance">Manage Store</a>-->
<!--        			</div>-->
<!--        		</div>-->

        <div style = "position:absolute; top: 30px; left: 845px; width:140px; height: 50px; text-align: center; z-index: 100">
            <a href = "uploadmenu.php" style = "text-decoration:none;color:#E52B50; font-family:'Harabara', serif; font-size:17px; line-height:1.50em;"><< Manage Store</a>
        </div>
		
		<!--Information-->
		<div style = "position:absolute; top: 20px; height: 30px; width: 30px; left: 15px; opacity: .5; ">
			<img src="images/info.png" border="0" alt="" height= "30px" width= "30px" title="Your dashboard gives an overview of your brands performance.
			
To edit products on your store or your stores appearance click 'Manage Store' in the top right." />
		</div>

		
		
		
		<!--SALES THIS WEEK-->
		
		<!--Make entire box clickable through to the sales dashboard-->
		<a href = "dashboardsales.php" >
			<div style = "position:absolute; top: 80px; left: 62.5px; width:250px; height: 150px; background-color:#D1D1D1; text-align: center; opacity: .9;">
				
				<!--Highlight the box on mouse over-->
				<img src="images/QS.png" border="0" width="100%" height="100%" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:0px;" class="fader_img">
				
				<!--Show the number of sales this week-->
				<div class = "dashSales" style = "position:absolute; top: 20px; width:100%; text-align: center;">
					<?
					// Create connection
					$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

                    $userID = getBrandIDFromSessionUsername($_SESSION['username']);

					//display number of sales in last week from selected brand
					$data = mysqli_query($con,"SELECT COUNT(*) FROM sales WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL 6 DAY) and curdate();");
					$row = mysqli_fetch_array($data);
					$total = $row[0];
					echo "<span class=\"Heading-Dash\">$total</span>";
					?>
				</div>
				
				<!--Box title-->
				<div style = "position:absolute; top: 100px; width:100%; text-align: center;">
					<span class="Heading-2-C">SALES THIS WEEK</span>
				</div>
			
			</div>
		</a>
		
		
		
		
		<!--VIEWS THIS WEEK-->
		
		<!--Make entire box clickable through to the views dashboard-->
		<a href = "dashboardviews.php" >
			<div style = "position:absolute; top: 80px; left: 375px; width:250px; height: 150px; background-color:#D1D1D1; text-align: center; opacity: .9;">
				
				<!--Highlight the box on mouse over-->
				<img src="images/QS.png" border="0" width="100%" height="100%" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:0px;" class="fader_img">
				
				<!--Show the number of views this week-->
				<div class = "dashViews" style = "position:absolute; top: 20px; width:100%; text-align: center;">
					<?
					
					//display number of view from all brand's pages
					$data = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL 6 DAY) and curdate();");
					$row = mysqli_fetch_array($data);
					$thisweek = $row[0];
					//check for zero
					if (empty($thisweek)) {
						echo "<span class=\"Heading-Dash\">0</span>";
					}else { echo "<span class=\"Heading-Dash\">$thisweek</span>"; }
					
					?>
				</div>
				
				<!--Box title-->
				<div style = "position:absolute; top: 100px; width:100%; text-align: center; ">
					<span class="Heading-2-C">VIEWS THIS WEEK</span>
				</div>
				
			</div>
		</a>
		
		
		
		
		<!--TARGETS-->
		
		<!--Make entire box clickable through to the targets dashboard-->
		<a href = "dashboardtargets.php" >
			<div style = "position:absolute; top: 80px; left: 687.5px; width:250px; height: 150px; background-color:#D1D1D1; opacity: .9;">
				
				<!--Highlight the box on mouse over-->
				<img src="images/QS.png" border="0" width="100%" height="100%" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:0px;" class="fader_img">
				
				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
					<span class="Heading-2-C">TARGETS (%)</span>
				</div>
				
				<!--Bar chart to show percentage completion of each target-->
				<div style = "position:absolute; top: 40px; left: 10px; text-align: center;">
					<?
					
					//check to see if any targets are set
					$result = mysqli_query($con,"SELECT targetsSet FROM targets WHERE BrandUsername = '$userID'");
					$data = mysqli_fetch_array($result);
					$targetCheck = $data[0];
					
					//if no targets are set then add 2 default targets
					if ($targetCheck <= 0) {
						//Add default targets: Target 1 = 5 sales a month. Target 2 = 100 views a week
						mysqli_query($con, "INSERT INTO targets (BrandUsername, targetsSet, target1_name, target1_value, target2_name, target2_value ) VALUES ('$userID', 2, 102, 5, 201, 100)");
					}
					
					//get target results
					$target1array = array();
					$target1array = targetPercent($con, $userID, 1);
					$target2array = array();
					$target2array = targetPercent($con, $userID, 2);
					$target3array = array();
					$target3array = targetPercent($con, $userID, 3);
					$target4array = array();
					$target4array = targetPercent($con, $userID, 4);	
					?>
					
					
					<canvas id="bar" height="106" width="220"></canvas>
					<script>
					
						//display target 1 - 4 results on bar chart
						//limit target completion maximum to 100
						var barChartData = {
							labels : ["1","2","3","4"],
							datasets : [

								{
									fillColor : "#84C2CB",
									strokeColor : "#9D9D9D",
									data : [<? if ($target1array[2] > 100) {echo 100;} else {echo $target1array[2];} ?>,<? if ($target2array[2] > 100) {echo 100;} else {echo $target2array[2];} ?>, <? if ($target3array[2] > 100) {echo 100;} else {echo $target3array[2];} ?>, <? if ($target4array[2] > 100) {echo 100;} else {echo $target4array[2];} ?>, , 100]

									}
							]
							
						}

						var myLine = new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
					
					</script>
				</div>
			</div>
		</a>
		
		
		
		
		<!--RECENT SALES-->
		
		<!--Make entire box clickable to activate pop up window-->
		<a href="#" id="inline-link">
			<div style = "position:absolute; top: 292.5px; left: 62.5px; width:250px; height: 198px; background-color:#D1D1D1; text-align: center; opacity: .9;">
				
				<!--Highlight the box on mouse over-->
				<img src="images/QS.png" border="0" width="100%" height="100%" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:0px;" class="fader_img">
				
				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
					<span class="Heading-2-C">RECENT SALES</span>
				</div>
				
				<!--Create table containing basic details for 3 most recent sales-->
				<div class = "dashSalesTable" style = "position:absolute; top: 42px; width: 230px; left: 10px; text-align: center;">
					<?
					//create table
					echo " <table class=\"hovertable\">
					<tr>
						<th>Date</th><th>Item Name</th><th title= 'Product Price plus Shipping Price'>Total</th>
					</tr>";
					
					//display and format the 3 most recent sales
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
					?>
				</div>
				
			</div>
		</a>
		
		
		
		
		<!-- POP UP WINDOW - HIDDEN COLORBOX CONTENT -->
		
		<div style="display: none; text-align: center;" >
			<div id="inline-content">
				
				<!--Pop up window title-->
				<div style = "position:relative; top: 15px; width:100%; text-align: center;">
					<span class="Body-C-C0">Recent Sales</span>
				</div>
						
				<!--Sales report table for 3 most recent sales-->
				<div style = "position:relative; top: 35px; width:98%; left: 1%; text-align: center;">
					<?
					//create table
					echo " <table class=\"hovertable\">
					<tr>
						<th>Date</th><th>Item</th><th>Item Name</th><th>Customer</th><th>Address1</th><th>Address2</th><th>Postcode</th><th>Contact</th><th>Price</th><th>Shipping</th>
					</tr>";
					
					//display and format all details for 3 most recent sales
					$result = mysqli_query($con,"SELECT * FROM sales WHERE BrandUsername = '$userID' ORDER BY Date Desc LIMIT 3");
					$tablecount = 0;
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
						$price = number_format((float)$row['Price'], 2, '.', '');
						$shipping = number_format((float)$row['Shipping'], 2, '.', '');
						$itemname = substr($row['Item_name'],0,15) . "-" . $row['Description'];
						
						echo "<td>" . date('d-M-y', strtotime($row['Date'])) . "</td>";
						echo "<td>" . $row['Item_Number'] . "</td>";
						echo "<td>" . substr($itemname,0,25) . "</td>";
						echo "<td>" . substr($row['Name'],0,17) . "</td>";
						echo "<td>" . substr($row['Address1'],0,25) . "</td>";
						echo "<td>" . substr($row['Address2'],0,15) . "</td>";
						echo "<td>" . substr($row['Postcode'],0,8) . "</td>";
						echo "<td>" . substr($row['Contact'],0,11) . "</td>";
						echo "<td>" . $price . "</td>";
						echo "<td>" . $shipping . "</td>";
						echo "</tr>";
						$tablecount++;
					}
					
					//enter default table data if less than 3 records exist
					for ($x=$tablecount; $x<=2; $x++){
						echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
						for ($y =0; $y<=9; $y++){
							echo "<td>" . "--" . "</td>";
						}
						echo "</tr>";
						}
					
					echo "</table>";
					echo "<br>";
					echo "<br>";
					?>
				</div>
			</div>
		</div>
		
		
		
		
		<!--MOST VIEWED-->
		
		<!--Make entire box clickable to navigate to views dashboard-->
		<a href = "dashboardviews.php" >
			<div style = "position:absolute; top: 292.5px; left: 375px; width:250px; height: 198px; background-color:#D1D1D1; text-align: center; opacity: .9;">
				
				<!--Highlight the box on mouse over-->
				<img src="images/QS.png" border="0" width="100%" height="100%" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:0px;" class="fader_img">
				
				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
					<span class="Heading-2-C">MOST VIEWED</span>
				</div>
				
				<!--Calculate and display 3 most viewed items-->
				<div class = "dashViewsTable" style = "position:absolute; top: 42px; width:230px; left: 10px; text-align: center;">
					<?
					
					//add up all the views for each item. Each items views are recorded by their Item ID eg: TST001
					//filter to more than 3 characters as not to include the brand shop eg: TST
					$data = mysqli_query($con,"SELECT PageName, Count FROM pageviews WHERE BrandUsername = '$userID' AND CHAR_LENGTH(PageName) > 3 ");
					$count = 0;
					$viewsarray = array();
					
					//create an array to sum the page views for each unique item ID eg: TST001 
					while($row = mysqli_fetch_array($data))
					{
						//initiate boolean to see whether the item already exists in array
						$true = 0;
						
						//if its the first item add it to the array with its number of views
						if ($count == 0) {
							$viewsarray[$count] = array($row['PageName'],$row['Count'] );
						
						} else {
						
							//if the count is above 0 check to see whether the item number exists already in the array
							//if it does, increment the sales count, if it doesnt, add it to the array with its number of views
							for ($i = 0; $i<(sizeof($viewsarray)); $i++){
								if ($viewsarray[$i][0] == $row['PageName']){
									
									//if they are the same, increment count
									$viewsarray[$i][1] = $viewsarray[$i][1] + $row['Count'];
									//initiate boolean to true
									$true = 1;
								}
							}
							
							//if boolean indicates the item is unique, add it to the end of the array
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
					
					
					//create table to display the 3 most viewed items
					echo " <table class=\"hovertable\">
					<tr>
						<th>Item Name</th><th>Views Count</th>
					</tr>";
					
					//count to see how many rows are entered
					$tablecount=0;
					
					for ($y = 0; $y<=2; $y++){
					
						echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
						
						//find the item name for the item number
						$itemNo = $viewsarray[$y][0];
						$result = mysqli_query($con,"SELECT Item_name FROM products WHERE Brand = '$userID' AND Item_number = '$itemNo'");
						$data = mysqli_fetch_array($result);
						$prodname = $data[0];
						
						//format and display the item name and its total number of views
						echo "<td>" . substr($prodname,0,12) . "</td>";
						echo "<td>" . $viewsarray[$y][1] . "</td>";
						echo "</tr>";
						
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
					?>
				</div>
			</div>
		</a>
		
		
		
		
		<!--STOCK-->
		
		<!--Make entire box clickable to navigate to stocks dashboard-->
		<a href="dashboardstocks.php">
			<div style = "position:absolute; top: 292.5px; left: 687.5px; width:250px; height: 198px; background-color:#D1D1D1; text-align: center; opacity: .9;">
				
				<!--Make entire box clickable to navigate to views dashboard-->
				<img src="images/QS.png" border="0" width="100%" height="100%" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:0px;" class="fader_img">
				
				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
					<span class="Heading-2-C">LOWEST IN STOCK</span>
				</div>
				
				<!--Display the 3 items with the lowest stock-->
				<div style = "position:absolute; top: 42px; width:230px; left: 10px; text-align: center;">
					<?
					//create table
					echo " <table class=\"hovertable\">
					<tr>
						<th>Item Name</th><th>Size</th><th>Stock</th>
					</tr>";
					
					//find, display and format 3 items with the lowest stock
					$result = mysqli_query($con,"SELECT Item_name, Size, stock FROM products WHERE Brand = '$userID' ORDER BY stock ASC LIMIT 3");
					$tablecount = 0;
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
						echo "<td>" . substr($row['Item_name'],0,12) . "</td>";
						echo "<td>" . substr($row['Size'],0,9) . "</td>";
						echo "<td>" . $row['stock'] . "</td>";
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
					?>
				</div>
			</div>
		</a>
		
	</div>

<!-- END OF INFROMATION DASHBOARD BODY -->




<!--Master Page End-->
<div id="nav-bar"></div>

</div>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/totop.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto({ theme:'facebook', allow_resize: false });
  });
</script>
<!--Page Body End-->

<!--Fullsize Background Image-->
<script src="js/jquery.backstretch.js"></script>
<script>
    jQuery.backstretch("images/backgrounds/sbackground3.jpg");
</script>
<!--Fullsize Background Image End-->
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
	
</div>';



$minHeight = 682;
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
$array2 = array("Dashboard Home | Zooqie", $navBar, $pageHeight, $pageHeightVal1, $pageHeightVal2, $pageHeightVal3, $pageHeightVal4, $pageHeightVal5, $pageHeightVal6, $d);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>