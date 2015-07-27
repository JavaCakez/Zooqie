<?
ob_start (); // Buffer output
?>
<?php
	if(!session_id()) session_start();
	if(!isset($_SESSION['username'])){
	header("location:login.php");
}
else
{ ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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



<!--Charts-->
<script src="js/Chart.js"></script>
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		<style>
			canvas{
			}
		</style>


























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

#nav-bar {  min-height: 90px; background: #fff; }        /* Top bar height and colour */
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

<img src="images/navbar.png" border="0" width="1000" height="40" id="qs_1" alt="" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:90px; " >
<!--NAVBAR-->





<?
	// Create connection
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
    $userID = getBrandIDFromSessionUsername($_SESSION['username']);
?>


<div style="position:relative; top:130px; width:100%;">
	<!--Title-->
	<div style = "position:absolute; top: 9px; width:100% ; text-align: center;">
		<span class="Body-C-C0">Views Dashboard</span>
	</div>
	<!--Background-->
	<img src="\images\backgrounds\dunes.jpg" alt="" width="100%"; height="1040px" />

	<!--Information-->
    <div style = "position:absolute; top: 20px; height: 30px; width: 30px; left: 15px; opacity: .5; ">
		<img src="images/info.png" border="0" alt="" height= "30px" width= "30px" title="Here you can see how your products have been viewed over time.

The views comparison pie chart shows how much each product has been viewed by comparison to other products (note: can only show 20 products).

To see a full report of ALL views hit the Download button on the views report." />
	</div>

    <div style = "position:absolute; top: 30px; left: 845px; width:140px; height: 50px; text-align: center; z-index: 100">
        <a href = "/uploadmenu.php" style = "text-decoration:none;color:#E52B50; font-family:'Harabara', serif; font-size:17px; line-height:1.50em;"><< Manage Store</a>
    </div>
	
	<!--Structure Lines-->
	<div style = "position:absolute; top: 65px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
	<div style = "position:absolute; top: 165px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
	<div style = "position:absolute; top: 580px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
	
	<!--Views this week-->
	<div style = "position:absolute; top: 75px; left: 140px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
	<br>
			<?
			//display number of views in last week from selected brand
			$data = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL 6 DAY) and curdate();");
			$row = mysqli_fetch_array($data);
			$thisweek = $row[0];
			//check for zero
			if (empty($thisweek)) {
				echo "<span class=\"Heading-22-C\">0</span>";
			}else { echo "<span class=\"Heading-22-C\">$thisweek</span>"; }
			?>
			<br>
			<span class="Heading-22-CC">VIEWS THIS WEEK</span>
	</div>
	
	<!--Views this week compared to last week-->
	<div style = "position:absolute; top: 75px; left: 290px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
	<br>
			<?
			//get total number of views for last week
			$data = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL 13 DAY) and date_sub(curdate(),INTERVAL 7 DAY);");
			$row = mysqli_fetch_array($data);
			$lastweek = $row[0];
			
			if ($lastweek == 0){
				//cant divide by 0
				$zero1 = "+" .($thisweek * 100) . "%";
				echo "<span class=\"Heading-22-GREEN\">$zero1</span>";
			}else if ($thisweek == 0) {
				//cant divide by 0
				$zero2 = "-" . ($lastweek * 100) . "%";
				echo "<span class=\"Heading-22-RED\">$zero2</span>"; 
			} else {
				//display percentage difference between this week and last week
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
	
	<!--Views this month-->
	<div style = "position:absolute; top: 75px; left: 440px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<br>
		<?
			//display number of views in last week from selected brand
			$data = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL 27 DAY) and curdate();");
			$row = mysqli_fetch_array($data);
			$thismonth = $row[0];
			//check for zero
			if (empty($thismonth)) {
				echo "<span class=\"Heading-22-C\">0</span>";
			}else { echo "<span class=\"Heading-22-C\">$thismonth</span>"; }
		?>
			<br>
			<span class="Heading-22-CC">VIEWS THIS MONTH</span>
	</div>
	
	<!--Views compared to last month -->
	<div style = "position:absolute; top: 75px; left: 590px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<br>
		<?
			// number of views from month before last
			$data = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND date between date_sub(curdate(),INTERVAL 54 DAY) AND date_sub(curdate(),INTERVAL 27 DAY)");
			$row = mysqli_fetch_array($data);
			$lastmonth = $row[0];
			
			if ($lastmonth == 0){
				//cant divide by 0
				$zero1 = "+" .($thismonth * 100) . "%";
				echo "<span class=\"Heading-22-GREEN\">$zero1</span>";
			}else if ($thismonth == 0) {
				//cant divide by 0
				$zero2 = "-" . ($lastmonth * 100) . "%";
				echo "<span class=\"Heading-22-RED\">$zero2</span>"; 
			} else {
				//display percentage difference between this week and last week
				$diff = (($thismonth / $lastmonth) * 100) - 100;
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
			<span class="Heading-22-CC">FROM LAST MONTH</span>
	</div>
	
	<!--TOTAL VIEWS -->
	<div style = "position:absolute; top: 75px; left: 740px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<br>
		<?
			//display number of views in total
			$data = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID'");
			$row = mysqli_fetch_array($data);
			$total = $row[0];
			//check for zero
			if (empty($total)) {
				echo "<span class=\"Heading-22-C\">0</span>";
			}else { echo "<span class=\"Heading-22-C\">$total</span>"; }
		?>
			<br>
			<span class="Heading-22-CC">TOTAL VIEWS</span>
	</div>
	
	
	<? //Variables for keeping time and product selected values
	$timeSort = $_POST['time'];
	$productSort = $_POST['product'];
	?>
	
	<!--drop down lists for Line Chart -->
	<form name = "Select1" action="/dashboardviews.php" method="POST" class="Heading-22-CC" >	
		<!--Time drop down list for Line Chart -->
		<div style = "position:absolute; top: 172px; left: 75px; width: 120px; height: 30px; text-align: center; opacity: .85;">
			<select name = "time" id = "time" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" OnChange="document.Select1.submit(); ">
				<option value=0 <? if ($timeSort == 0){ echo "selected = 'selected'";} ?>>-Time Period-</option>
				<option value=1 <? if ($timeSort == 1){ echo "selected = 'selected'";} ?>>4 Weeks</option>
				<option value=2 <? if ($timeSort == 2){ echo "selected = 'selected'";} ?>>3 Months</option>
				<option value=3 <? if ($timeSort == 3){ echo "selected = 'selected'";} ?>>1 Year</option>
			</select>
		</div>
		
		<!--Products drop down list for Line Chart-->
		<div style = "position:absolute; top: 172px; left: 375px; width:120px; height: 30px; text-align: center; opacity: .85;">
			<select name = 'product' style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" OnChange="document.Select1.submit();" >
				<option value="0">-All Products-</option>
				<?
					//add each individual product to an array ready to be displayed in a drop down list
					$result = mysqli_query($con,"SELECT * FROM products WHERE Brand = '$userID'");
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
							$names[$arcount] = $data['Item_name']; }
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
					
					// Now just need to add every element in the products array to a drop down list
					for ($x=0; $x<=$arcount; $x++){
						$val = $x + 1; ?>
						<option value= <? echo $val;?> <?if($productSort == $val){ echo "selected = 'selected'";} ?>> <?echo $products[$x] . " - " . $names[$x];?></option>; <?
					}
				?>
			</select>
		
		</div>
	</form>
	
	<!--Line Chart Label-->
	<div style = "position: absolute; left: -20px; top: 380px; -ms-transform:rotate(270deg); -moz-transform:rotate(270deg); -webkit-transform:rotate(270deg);"> 
		<span class="Heading-2-C">Views Count</span>
	</div> 

	<!--Line Chart-->
	<div style = "position:absolute; top: 220px; left: 30px; text-align: center;">
		
		<canvas id="line" height="350" width="645"></canvas>
		<script type="text/javascript">
			
			<?
			//LINE CHART DATA. 
			function getData($prod, $con1, $user1, $date1, $date2){
				if ($prod == 0) {
					//all products
					$query = "SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$user1' AND date between " . $date1 . " AND ". $date2;
				} else {
					//for finding a specific product, make $prod equal to the item number 
					if ($prod < 10) {
						$prod = $user1."00".$prod;
					} else if ($prod < 100 && $prod >= 10) {
						$prod = $user1."0".$prod;
					} else if ($prod >= 100) {
						$prod = $user1 . $prod; }
					$query = "SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$user1' AND PageName = '$prod' AND date between " . $date1 . " AND ". $date2;;
				}
				$data = mysqli_query($con1, $query);
				$row = mysqli_fetch_array($data);
				//return 0 if nothing comes back from mysql call
				if (is_null($row) || $row[0] == '') { 
					echo 0; 
				} else { echo $row[0]; }
			}				
			?>
			
			//for time period selected
			var timeValue = <? if (!isset($timeSort)) {echo 0;} else { echo $timeSort; } ?>;
			//initiate variable PRODVAL for selected product
			<? if (!isset($productSort)) {$prodVal = 0;} else { $prodVal = $productSort; } ?>
			
			//CHOOSE GRAPH LABELS & DATA
			if (timeValue < 2) { // if the time value is TIME PERIOD or 4 WEEKS then show 4 WEEKS worth of data
				var showLabels = new Array("<? echo date("d/M",strtotime("-1 month")); ?>", "<? echo date("d/M",strtotime("-3 week")); ?>", "<? echo date("d/M",strtotime("-2 week")); ?>", "<? echo date("d/M",strtotime("-1 week")); ?>");
				var showData = new Array(<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 27 DAY)", "date_sub(CURDATE(),INTERVAL 21 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 20 DAY)", "date_sub(CURDATE(),INTERVAL 14 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 13 DAY)", "date_sub(CURDATE(),INTERVAL 7 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 6 DAY)", "CURDATE()"); ?>,0,3);
				}
			else if (timeValue == 2) { //if the time value is 3 MONTHS shows 3 Months worth of data
				var showLabels = new Array("<? echo date("d/M",strtotime("-12 week")); ?>", "<? echo date("d/M",strtotime("-11 week")); ?>","<? echo date("d/M",strtotime("-10 week")); ?>","<? echo date("d/M",strtotime("-9 week")); ?>","<? echo date("d/M",strtotime("-8 week")); ?>", "<? echo date("d/M",strtotime("-7 week")); ?>", "<? echo date("d/M",strtotime("-6 week")); ?>", "<? echo date("d/M",strtotime("-5 week")); ?>","<? echo date("d/M",strtotime("-4 week")); ?>", "<? echo date("d/M",strtotime("-3 week")); ?>", "<? echo date("d/M",strtotime("-2 week")); ?>", "<? echo date("d/M",strtotime("-1 week")); ?>");
				var showData = new Array(<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 83 DAY)", "date_sub(CURDATE(),INTERVAL 77 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 76 DAY)", "date_sub(CURDATE(),INTERVAL 70 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 69 DAY)", "date_sub(CURDATE(),INTERVAL 63 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 62 DAY)", "date_sub(CURDATE(),INTERVAL 56 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 55 DAY)", "date_sub(CURDATE(),INTERVAL 49 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 48 DAY)", "date_sub(CURDATE(),INTERVAL 42 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 41 DAY)", "date_sub(CURDATE(),INTERVAL 35 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 34 DAY)", "date_sub(CURDATE(),INTERVAL 28 DAY)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 27 DAY)", "date_sub(CURDATE(),INTERVAL 21 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 20 DAY)", "date_sub(CURDATE(),INTERVAL 14 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 13 DAY)", "date_sub(CURDATE(),INTERVAL 7 DAY)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 6 DAY)", "CURDATE()"); ?>, 0,0,3);
				}
			else if (timeValue == 3) {//if the time value is 1 YEAR then show 12 months worth of data
				var showLabels = new Array("<? echo date("M-y",strtotime("-11 month"));?>", "<? echo date("M-y",strtotime("-10 month"));?>", "<? echo date("M-y",strtotime("-9 month"));?>", "<? echo date("M-y",strtotime("-8 month"));?>", "<? echo date("M-y",strtotime("-7 month"));?>", "<? echo date("M-y",strtotime("-6 month"));?>", "<? echo date("M-y",strtotime("-5 month"));?>", "<? echo date("M-y",strtotime("-4 month"));?>", "<? echo date("M-y",strtotime("-3 month"));?>", "<? echo date("M-y",strtotime("-2 month"));?>", "<? echo date("M-y",strtotime("-1 month"));?>", "<? echo date("M-y");?>");
				var showData = new Array( <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 12 MONTH)", "date_sub(CURDATE(),INTERVAL 11 MONTH)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 11 MONTH)", "date_sub(CURDATE(),INTERVAL 10 MONTH)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 10 MONTH)", "date_sub(CURDATE(),INTERVAL 9 MONTH)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 9 MONTH)", "date_sub(CURDATE(),INTERVAL 8 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 8 MONTH)", "date_sub(CURDATE(),INTERVAL 7 MONTH)"); ?>,<? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 7 MONTH)", "date_sub(CURDATE(),INTERVAL 6 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 6 MONTH)", "date_sub(CURDATE(),INTERVAL 5 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 5 MONTH)", "date_sub(CURDATE(),INTERVAL 4 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 4 MONTH)", "date_sub(CURDATE(),INTERVAL 3 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 3 MONTH)", "date_sub(CURDATE(),INTERVAL 2 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 2 MONTH)", "date_sub(CURDATE(),INTERVAL 1 MONTH)"); ?>, <? getData($prodVal, $con, $userID, "date_sub(CURDATE(),INTERVAL 1 MONTH)", "CURDATE()"); ?>,0,0,3);
				}
							
				//DRAW LINE CHART
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
	
	<!--Pie chart-->
	<div style = "position:absolute; top: 170px; left: 675px; width:300px; height: 80px; text-align: center; opacity: .85;">
		<div style = "position:absolute; top: 10px; width:100%; text-align: center; ">
			<span title = 'Each slice represents a products proportion of total sales' class="Heading-2-C">PRODUCT VIEWS COMPARISON</span> 
		</div>  <br>
		<br> 
		<?
			//add up all the views for each product and sort to find the 3 most viewed
			$data = mysqli_query($con,"SELECT * FROM pageviews WHERE BrandUsername = '$userID'");
			$count = 0;
			$viewsarray = array();
			while($row = mysqli_fetch_array($data))
			{
				if (strlen($row['PageName']) > 3){ //make sure it doesnt include the shop page itself
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
			
			?>
							
			<canvas title = 'Each slice represents a products proportion of total views' id="pie" height="250" width="250";></canvas>
			<script type="text/javascript">
			
			
			var pieData = [
					
					//give dummy data for pie chart so it shows up 
					<?
					if (sizeof($viewsarray) == 0) {
						$viewsarray[0][0] = "--";
						$viewsarray[0][1] = 0;
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
						if (sizeof($viewsarray) > 17) {
							$arraySize = 17;
						} else { $arraySize = sizeof($viewsarray); }
						
						//loop through views array and display in pie chart
						for ($z = 0; $z<$arraySize; $z++){
							//for choosing colour, if z is greater than size of colours array, choose random colour
							if ($z >= sizeof($colours)) { 
								$y = rand(0,sizeof($colours));
							} else { $y = $z;}
							?>
							{
								//create pie chart slice
								value: <? echo $viewsarray[$z][1];?>,
								color:'<? echo $colours[$y];?>',
								label : '<? echo $viewsarray[$z][0]; ?>',
								labelColor : "#666",
								labelFontSize : '20'
							},
					<?	}
					}	?>
				];

		var myPie = new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
		</script>
		
		<div style = "position:absolute; left: 40px; top: 303px; width:220px; text-align: center; ">
			<?
				echo "<table class=\"hovertable\"> <tr> <th>Most Viewed</th><th>Views</th> </tr>";
				
				//find the item name for the item number
				$itemNo = $viewsarray[0][0];
				$result = mysqli_query($con,"SELECT Item_name FROM products WHERE Brand = '$userID' AND Item_number = '$itemNo'");
				$data = mysqli_fetch_array($result);
				$prodname = $data[0];
				
				echo "<tr> <td>" . $viewsarray[0][0] . " - " . substr($prodname,0,8) . "</td> <td>" . $viewsarray[0][1] . " </td> </tr>";
				echo "</table>";
				
			?>
		</div>
	
	</div>
	
	
	<!--Views Report-->
	<div style = "position:absolute; top: 610px; left: 60px; width:880px; height: 380px; background-color:#D1D1D1; text-align: center; opacity: .9;">
		<br>

		<? //PRODUCT SORT VARIABLE - PRODUCTSORT
		$tableSort = $_POST['tableorder'];
		?>		
		
		<!--Views Report Table-->
		<div style = "position:absolute; top: 10px; width: 100%; text-align: center;">
			<span class="Heading-2-C">PRODUCT VIEWS REPORT</span>
		</div>
		
		<div style = "position:absolute; top: 45px; width:860px; left: 10px; text-align: center;">
		<?
			//goes through the array and organises by name
			function namesort($x, $y){
				if ( $x[0] == $y[0] )
				 return 0;
				else if ( $x[0] > $y[0] )
				 return 1;
				else
				 return -1;
			}
			
			//create table
			echo " <table class=\"hovertable\">
			<tr>
				<th>Page Name</th><th>Product Name</th><th>Views Count</th><th>Last Viewed</th><th>First Viewed</th>
			</tr>";
			if (!isset($tableSort)) {$tableSort = "count";}
			$tablecount = 0;
			
			//need to add shop to viewsarray eg: TST - 150 views
			$result = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE PageName = '$userID'");
			$data = mysqli_fetch_array($result);
			//add to the end
			$end =(sizeof($viewsarray));
			$viewsarray[$end][0] = $userID;
			$viewsarray[$end][1] = $data[0];
			
			//resort array either by name or by count
			if ($tableSort == "count"){
				usort($viewsarray, 'countsort');
			} else if ($tableSort == "name"){
				usort($viewsarray, 'namesort'); }
			
			//loop through viewsarray until the end of the array or while the array is less than 8 in length
			for ($i = 0; $i<(sizeof($viewsarray)) && $i<8; $i++){
				$item = $viewsarray[$i][0];
				$value = $viewsarray[$i][1];
				
				//find product name to go with each item, if its the brand shop eg TST rename to Brand Shop
				if ($item == $userID) {
					$prodname = "Brand Shop"; 
				} else {
					$result = mysqli_query($con,"SELECT Item_name FROM products WHERE Brand = '$userID' AND Item_number = '$item'");
					$data = mysqli_fetch_array($result);
					$prodname = $data[0];
				}
				
				echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
				echo "<td>" . $item . "</td>";
				echo "<td>" . substr($prodname,0,22) . "</td>";
				echo "<td>" . $value . "</td>";
				//find the most recent of it
				$result1 = mysqli_query($con,"SELECT Date FROM pageviews WHERE PageName = '$item' ORDER BY DATE DESC");
				$row1 = mysqli_fetch_array($result1);
				echo "<td>". date('d-M-y', strtotime($row1[0])) .  "</td>";  
				//find the least recent of it
				$result2 = mysqli_query($con,"SELECT Date FROM pageviews WHERE PageName = '$item' ORDER BY DATE ASC");
				$row2 = mysqli_fetch_array($result2);
				echo "<td>". date('d-M-y', strtotime($row2[0])) .  "</td>";
				$tablecount++;
			}
			
			//enter default table data if less than 8 records exist
			for ($x=$tablecount; $x<=7; $x++){
				echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
				for ($y=0; $y<=4; $y++){
					echo "<td>" . "--" . "</td>";
				}
			}
			
			echo "</table>";
		?>
		</div>
		
		
		<!--Download Button-->
		<div style = "position:absolute; top: 8px; right: 8px; text-align: centre;" >
			
			<?
			//if the download button is clicked, save all mysql sales data into a csv file
			if (isset($_POST['Download'])) {
			
				include("download.php");
				$qry = mysqli_query($con,"SELECT * FROM pageviews WHERE BrandUsername = '$userID' ORDER BY Date DESC");
				download($con, $userID, $qry, 'ZooqieViewsReport-');
					
				} 
				
			?>
			
			<form method = "post">
				<input type = "submit" name = "Download" value = "Download Full Report" class="Heading-22-CC" />
			</form>
			
		</div>
		
		<!--Order by Drop Down list for report table-->
		<div style = "position:absolute; top: 2px; left: 10px; width: 150px; ">
			<form name = "Select3" action="/dashboardviews.php" method="POST" class="Heading-22-CC" >
				<select name = "tableorder" id = "tableorder" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" OnChange="document.Select3.submit(); ">
					<option value='count' <?if($_POST['tableorder'] == 'count') {echo 'selected';}?>>-Order By-</option>
					<option value='count' <?if($_POST['tableorder'] == 'count') {echo 'selected';}?>>Views Count</option>
					<option value='name' <?if($_POST['tableorder'] == 'name') {echo 'selected';}?>>Page Name</option>
				</select>
			</form>
		</div>
		
	</div> 
	
</div>



































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

<div class="nav_348style" id="nav_348" style="left: 20px; top: 101px; width: 960px; height: 26px; position: absolute;">
	<a id="nav_348_I0" href="index.php" target="_self"> Home </a>
	 &gt; 
	<a id="nav_348_I2" href="dashboard.php" target="_self"> Dashboard Home </a>
	&gt; 
	<a id="nav_348_I2" href="dashboardviews.php" target="_self"> Views </a>
</div>';


$minHeight = 1185;
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
$array2 = array("Views Dashboard", $navBar, $pageHeight, $pageHeightVal1, $pageHeightVal2, $pageHeightVal3, $pageHeightVal4, $pageHeightVal5, $pageHeightVal6, $d);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>