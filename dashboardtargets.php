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

?>

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












<script type="text/javascript">
  setInterval( refreshajaxViews, 5000 );
  var inRequest = false;
  function refreshajaxViews() {
    if ( inRequest ) {
      return false;
    }
    inRequest = true;
    var load = $.get('getinfo.php');
    load.error(function() {
      console.log( "Error" );
      // do something here if request failed
    });
    load.success(function( res ) {
      console.log( "Success" );
      $(".ajaxViews").html('<table>'+res+'</table>');
    });
    load.done(function() {
      console.log( "Completed" );
      inRequest = false;
    });
  }
</script>






<style type ="text/css">
.Heading-1-P
{
    margin:32px 0px 4px 0px; text-align:center; font-weight:400;
}
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
.Heading-22-C
{
    font-family:"Harabara", serif; color:#656565; font-size:24px; line-height:1.47em;
}
.Heading-22-CC
{
    font-family:"Harabara", serif; color:#656565; font-size:12.5px; line-height:1.47em;
}
.Heading-22-GREEN
{
    font-family:"Harabara", serif; color:#376737; font-size:24px; line-height:1.47em;
}
.Heading-22-RED
{
    font-family:"Harabara", serif; color:#672626; font-size:24px; line-height:1.47em;
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

#nav-bar {  min-height: 80px; background: #fff; }        /* Top bar height and colour */
#nav > li:hover > a { border-top: 3px solid #E52B50; }    /* Navigation bar top border hover state colour */
.button.amaranth { background-color: #E52B50; }           /* Button colour throughout site */

</style>


<script type="text/javascript">

		
		
		//chart js intialiasation
		</script>

		<title>Line Chart</title>
		<script src="js/Chart.js"></script>
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		<style>
			canvas{
			}
		</style>


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

<img src="images/navbar.png" border="0" width="1000" height="40" id="qs_1" alt="Navigation Bar" style="position:absolute;left:0px;top:80px;" >
<!--NAVBAR-->




	
	<?
	// Create connection
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
    $userID = getBrandIDFromSessionUsername($_SESSION['username']);
	 
	//function to find an item name from a number, eg: input 1, output TST001
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
	
	//function to find time period from a number, eg: input 1, output Per Week
	function findTimeString($num) {
		if ($num == 1){ $timeP = ' Per Week';
		} else if ($num == 2) { $timeP = ' Per Month';
		} else if ($num == 3) { $timeP = ' Per 3 Months';
		} else if ($num == 4) { $timeP = ' Per Year'; }
		return $timeP;
	}
	
	function findTimeValue($numb) {
		if ($numb == 1){ $timePer = '7 DAY';
		} else if ($numb == 2) { $timePer = '1 MONTH';
		} else if ($numb == 3) { $timePer = '3 MONTH';
		} else if ($numb == 4) { $timePer = '12 MONTH'; }
		return $timePer;
	}
	
	function targetPercent($con, $userID, $targetNo){
		
		$targName = 'target'.$targetNo.'_name';
		$targValue = 'target'.$targetNo.'_value';
		
		//check to see if the target exists
		$result = mysqli_query($con,"SELECT $targName, $targValue FROM targets WHERE BrandUsername = '$userID' ");
		$row = mysqli_fetch_array($result); 
		if ($row[$targName] == '') {
			return array(0,0,0);
		//work out what target is trying to be achieved
		} else {  
			//identify product
			$outItem = findItem($userID, substr($row[$targName],1,1));
			//identify time period
			$outTime = findTimeValue(substr($row[$targName],2,1));
			
			//is it a sales or views target
			if ($row[$targName] < 200) { 
				//sales target
				if ($outItem == 'All Products') { 
					//query for all products
					$query = "SELECT COUNT(*) FROM sales WHERE BrandUsername = '$userID' AND date between date_sub(now(),INTERVAL $outTime) and now();";
				} else { 
					//query a specific product
					$query = "SELECT COUNT(*) FROM sales WHERE BrandUsername = '$userID' AND Item_Number = '$outItem' AND date between date_sub(now(),INTERVAL $outTime) and now();";
				}
			} else {
				//views target
				if ($outItem == 'All Products') { 
					//query for all products
					$query = "SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND date between date_sub(now(),INTERVAL $outTime) and now();";
				} else {
					//query for a specific product
					$query = "SELECT sum(Count) FROM pageviews WHERE BrandUsername = '$userID' AND PageName = '$outItem' AND date between date_sub(now(),INTERVAL $outTime) and now();";
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
				$targetPerc = (round($targetPerc, 1));
			}
			$arrayOut = array($targetResult, $targetValue, $targetPerc);
			return $arrayOut;
		}
	}
		
	?>


<div style="position:relative; top:130px; width:100%;">
	<!--Title-->
	<div style = "position:absolute; top: 9px; width:100% ; text-align: center;">
		<span class="Body-C-C0">Manage Targets</span>
	</div>
	<!--Background-->
	<img src="\images\backgrounds\dunes.jpg" alt="dunes" width="100%"; height="730px">

	<!--Information-->
    <div style = "position:absolute; top: 20px; height: 30px; width: 30px; left: 15px; opacity: .5; ">
		<img src="images/info.png" border="0" alt="" height= "30px" width= "30px" title="Here you can set yourself weekly, monthly or yearly sales or views targets.

2 default targets are automatically set for you.

Note: You can see the product name for an item code by clicking the 'Select Product' drop down list." />
	</div>

    <div style = "position:absolute; top: 30px; left: 845px; width:140px; height: 50px; text-align: center; z-index: 100">
        <a href = "uploadmenu.php" style = "text-decoration:none;color:#E52B50; font-family:'Harabara', serif; font-size:17px; line-height:1.50em;"><< Manage Store</a>
    </div>
	
	<!--Structure Lines-->
	<div style = "position:absolute; top: 65px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
	<div style = "position:absolute; top: 165px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
	
	<!--Targets Achieved-->
	<!--Target 1-->
	<div style = "position:absolute; top: 75px; left: 215px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<div style = "position:absolute; top: 5px; width: 100%; text-align: center;">
			<span class="Heading-22-CC">TARGET 1</span>
		</div>
		<div style = "position:absolute; top: 23px; width: 100%; text-align: center;">
			<?
			
			//get target 1 values
			$target1array = array();
			$target1array = targetPercent($con, $userID, 1);
			$target1actual = $target1array[0];
			$target1aim = $target1array[1];
			$target1result = $target1array[2];
			
			if ($target1aim == 0){
				//no target set
				echo "<span class=\"Heading-22-C\">--</span>";
			} else {  
				if ($target1result >= 100) {
					//if the target is complete output in green
					echo "<span class=\"Heading-22-GREEN\">$target1result%</span>";
				} else {
					//if the target is incomplete output in red
					echo "<span class=\"Heading-22-RED\">$target1result%</span>";
				}
			}
			?>
		</div>
		<div style = "position:absolute; top: 57px; width: 100%; text-align: center;">
			<? echo "<span class=\"Heading-22-CC\">($target1actual / $target1aim)</span>"; ?>
		</div>
	</div>
	
	<!--Target 2-->
	<div style = "position:absolute; top: 75px; left: 365px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<div style = "position:absolute; top: 5px; width: 100%; text-align: center;">
			<span class="Heading-22-CC">TARGET 2</span>
		</div>
		<div style = "position:absolute; top: 23px; width: 100%; text-align: center;">
			<?
			
			//get target 2 values
			$target2array = array();
			$target2array = targetPercent($con, $userID, 2);
			$target2actual = $target2array[0];
			$target2aim = $target2array[1];
			$target2result = $target2array[2];
			
			if ($target2aim == 0){
				//no target set
				echo "<span class=\"Heading-22-C\">--</span>";
			} else {  
				if ($target2result >= 100) {
					//if the target is complete output in green
					echo "<span class=\"Heading-22-GREEN\">$target2result%</span>";
				} else {
					//if the target is incomplete output in red
					echo "<span class=\"Heading-22-RED\">$target2result%</span>";
				}
			}
			
			?>
		</div>
		<div style = "position:absolute; top: 57px; width: 100%; text-align: center;">
			<? echo "<span class=\"Heading-22-CC\">($target2actual / $target2aim)</span>"; ?>
		</div>
	</div>
	
	<!--Target 3-->
	<div style = "position:absolute; top: 75px; left: 515px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<div style = "position:absolute; top: 5px; width: 100%; text-align: center;">
			<span class="Heading-22-CC">TARGET 3</span>
		</div>
		<div style = "position:absolute; top: 23px; width: 100%; text-align: center;">
			<?
			
			//get target 3 values
			$target3array = array();
			$target3array = targetPercent($con, $userID, 3);
			$target3actual = $target3array[0];
			$target3aim = $target3array[1];
			$target3result = $target3array[2];
			
			if ($target3aim == 0){
				//no target set
				echo "<span class=\"Heading-22-C\">--</span>";
			} else {  
				if ($target3result >= 100) {
					//if the target is complete output in green
					echo "<span class=\"Heading-22-GREEN\">$target3result%</span>";
				} else {
					//if the target is incomplete output in red
					echo "<span class=\"Heading-22-RED\">$target3result%</span>";
				}
			}
			
			?>
		</div>
		<div style = "position:absolute; top: 57px; width: 100%; text-align: center;">
			<? echo "<span class=\"Heading-22-CC\">($target3actual / $target3aim)</span>"; ?>
		</div>
	</div>
	
	<!--Target 4-->
	<div style = "position:absolute; top: 75px; left: 665px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<div style = "position:absolute; top: 5px; width: 100%; text-align: center;">
			<span class="Heading-22-CC">TARGET 4</span>
		</div>
		<div style = "position:absolute; top: 23px; width: 100%; text-align: center;">
			<?
			
			//get target 4 values
			$target4array = array();
			$target4array = targetPercent($con, $userID, 4);
			$target4actual = $target4array[0];
			$target4aim = $target4array[1];
			$target4result = $target4array[2];
			
			if ($target4aim == 0){
				//no target set
				echo "<span class=\"Heading-22-C\">--</span>";
			} else {  
				if ($target4result >= 100) {
					//if the target is complete output in green
					echo "<span class=\"Heading-22-GREEN\">$target4result%</span>";
				} else {
					//if the target is incomplete output in red
					echo "<span class=\"Heading-22-RED\">$target4result%</span>";
				}
			}
			
			?>
		</div>
		<div style = "position:absolute; top: 57px; width: 100%; text-align: center;">
			<? echo "<span class=\"Heading-22-CC\">($target4actual / $target4aim)</span>"; ?>
		</div>
	</div>
	
	<!--Line Chart Label-->
	<div style = "position: absolute; left: -32px; top: 420px; -ms-transform:rotate(270deg); -moz-transform:rotate(270deg); -webkit-transform:rotate(270deg);"> 
		<span class="Heading-2-C">Percentage Completion</span>
	</div> 
	
	<!-- Bar chart to show target percentage completion -->
	<div style = "position:absolute; top: 190px; left: 40px; width:500px; height: 550px; text-align: center;">
		<canvas id="bar" height="505" width="510"></canvas>
		<script>

			var barChartData = {
				labels : ["Target 1","Target 2","Target 3","Target 4"],
				datasets : [

					{
						fillColor : "rgba(20,220,220,0.5)",
						strokeColor : "#656565",
						//if results are over 100% then limit at 100 so the scale is not thrown off
						data : [<? if($target1result>100){echo 100;} else {echo $target1result;} ?>,<? if($target2result>100){echo 100;} else {echo $target2result;} ?>,<? if($target3result>100){echo 100;} else {echo $target3result;} ?>,<? if($target4result>100){echo 100;} else {echo $target4result;} ?>,,,100]
					}
					
				]
				
			}

		var myLine = new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
		</script>
		
	</div>
	
	<!-- Display current targets -->
	<div style = "position:absolute; top: 190px; left: 580px; width:350px; height: 230px; text-align: center; background-color:#D1D1D1; opacity: .8; ">
		<div style = "position:absolute; top: 8px; width: 100%; text-align: center;">
			<span class="Heading-2-C">TARGETS</span>
		</div>
		
		<div style = "position:absolute; top: 40px; left: 10px; width: 330px; text-align: center;">
			<table class="hovertable">
				<tr>
					<th>Target</th><th>Description</th>
				</tr>
				
				<?
				
				//display 4 targets in table
				$result = mysqli_query($con,"SELECT * FROM targets WHERE BrandUsername = '$userID' ");
				$row = mysqli_fetch_array($result); 
				
				for ($x = 0; $x < 4; $x++) {
					$count = $x + 1;
					$name = 'target'. $count . '_name';
					$value = 'target'. $count . '_value';
					echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
					echo "<td>" . $count . "</td>";
					
					//check to see whether there is a target set
					if ($row[$name] == '') {
						echo  "<td>- No Target Set -</td>";
					} else { //create target description
						
						//identify product name
						$outItem = findItem($userID, substr($row[$name],1,1));
						
						//identify time period
						$outTime = findTimeString(substr($row[$name],2,1));
						
						//identify target type
						if ($row[$name] < 200) { 
							//sales target
							$output = "Sell " . $row[$value] . " of ". $outItem . $outTime;	
						} else { 
							//views target
							$output = $row[$value] . " Views on ". $outItem . $outTime;
						}
						
						//display target description
						echo "<td>" . $output . "</td>";
					}
					echo "</tr>";
				}
				
				
				?>
			</table>;
		
		</div>
	</div>
	
	
	<?
		//form variables
		$targetChoose = $_POST['choose'];
		$targetDelete = $_POST['deletetarget'];
		$targetType = $_POST['targettype'];
		$targetProduct = $_POST['product'];
		$targetTime = $_POST['timeframe'];
		$targetValue = $_POST['targetvalue'];
		
		//adaptable form length
		$formLength = '247px';
		$display1 = '';
		$display2 = 'display: none;';
		
		//if delete is chosen
		if ($targetChoose == 2) { 
			$formLength = '160px';
			$display1 = 'display: none;';
			$display2 = '';
		}
		
	?>
	
	<!-- input form for managing a target -->
	<div style = "position:absolute; top: 445px; left: 580px; width:350px;  height: <? echo $formLength ?>; text-align: center; background-color:#D1D1D1; opacity: .8; ">
		<div style = "position:absolute; top: 10px; width: 100%; text-align: center;">
			<span class="Heading-2-C">ADD / DELETE A TARGET</span>
		</div>
		
		
		<!--drop down lists for adding a target -->
		<form name = "managetarget" action="/dashboardtargets.php" method="POST" class="Heading-22-CC" >	
			
			<!-- Choose an action -->
			<div style = "position:absolute; top: 40px; width:100%; text-align: center;  ">
				<select name = "choose" id = "choose" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" OnChange = "document.managetarget.submit();"  >
					<option value=-1 >- Add / Delete -</option>
					<option value=1 <? if ($targetChoose == 1){ echo "selected = 'selected'";} ?> >Add a Target</option>
					<option value=2 <? if ($targetChoose == 2){ echo "selected = 'selected'";} ?>>Delete a Target</option>
				</select>
			</div>
			
			<!-- DISPLAY 2 - Which target to delete -->
			<div style = "position:absolute; top: 80px; width:100%; text-align: center; <? echo $display2 ?> ">
				<select name = "deletetarget" id = "deletetarget" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" >
					<option value=-1 >- Select Target -</option>
					<?
						//need to see which targets are occupied 
						$result = mysqli_query($con,"SELECT * FROM targets WHERE BrandUsername = '$userID'");
						$data = mysqli_fetch_array($result);
						if ($data['target1_name'] > 0) { echo "<option value = 1> Target 1 </option>"; }
						if ($data['target2_name'] > 0) { echo "<option value = 2> Target 2 </option>"; }
						if ($data['target3_name'] > 0) { echo "<option value = 3> Target 3 </option>"; }
						if ($data['target4_name'] > 0) { echo "<option value = 4> Target 4 </option>"; }
					?>
					
				</select>
			</div>
			
			<!-- DISPLAY 2 - Delete Button -->
			<div style = "position:absolute; top: 122px; width:100%; text-align: center; <? echo $display2 ?> ">
				<input type="submit" value="Delete" name = "delete" class="Heading-22-CC">
			</div>
			
			<!-- DISPLAY 1 - Choose whether its a sales target or views target -->
			<div style = "position:absolute; top: 80px; width:100%; text-align: center; <? echo $display1 ?>  ">
				<select name = "targettype" id = "targettype" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" >
					<option value=-1 >- Target Type -</option>
					<option value=1>Sales Target</option>
					<option value=2>Views Target</option>
				</select>
			</div>
			
			<!-- DISPLAY 1 - For what product -->
			<div style = "position:absolute; top: 120px; width:100%; text-align: center; <? echo $display1 ?> ">
				<select name = "product" id = "product" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" >
					<option value=-1 >- Select Product -</option>
					<option value=0>ALL PRODUCTS</option>
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
							<option value= <? echo $val;?>> <?echo $products[$x] . " - " . $names[$x];?></option>; <?
						}
					?>
				</select>
			</div>
			
			<!-- DISPLAY 1 - Time Frame -->
			<div style = "position:absolute; top: 160px; width:100%; text-align: center; <? echo $display1 ?> ">
				<select name = "timeframe" id = "timeframe" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" >
					<option value=-1 >- Select Time Frame -</option>
					<option value=1>Per Week</option>
					<option value=2>Per Month</option>
					<option value=3>Per 3 Months</option>
					<option value=4>Per Year</option>
				</select>
			</div>
			
			<!-- DISPLAY 1 - Target Value and Submit -->
			<div style = "position:absolute; top: 205px; width:100%; text-align: center; <? echo $display1 ?>  ">
				TARGET VALUE: <input type="text" name="targetvalue" id = "targetvalue" value =" eg: 10" class="Heading-22-CC">
				<input type="submit" value="Save" name = "save" class="Heading-22-CC">
			</div>
			
			
		</form>
		
		<?
		//SAVE TARGET BUTTON
		//if the save button is clicked, save all selections to the database. Check to make sure all selections are valid
		if (isset($_POST['save'])) {
			//first check all selections are valid
			if ($targetType== -1 OR $targetProduct == -1 OR $targetTime == -1 OR $targetValue == '' OR (!is_numeric($targetValue)) ) {
				echo "<script> alert('Error: Please ensure all target selections are filled out correctly'); </script>";
			} else {
				//assign variables to names ready to be saved to database
				$saveName = $targetType . $targetProduct . $targetTime;
				$saveValue = $targetValue;
				
				//check to see if the brand already has targets saved
				$exists = 0;
				$result = mysqli_query($con,"SELECT count(*) FROM targets WHERE BrandUsername = '$userID'");
				$data = mysqli_fetch_array($result);
				if ($data[0] == 0) { 
					//doesnt exist so add
					mysqli_query($con,"INSERT INTO targets (BrandUsername, targetsSet, target1_name, target1_value) VALUES ('$userID', 1, '$saveName', '$saveValue') ");
					echo "<script> alert('Target Added Successfully'); </script>"; 
				} else { 
					//if it exists then find current count of targets
					$result = mysqli_query($con,"SELECT targetsSet FROM targets WHERE BrandUsername = '$userID'");
					$data = mysqli_fetch_array($result);
					//cant set more than 4 targets
					if ($data[0] < 4) {
						$number = $data[0] + 1;
						//need to go through each column checking if its empty to know where to insert next target
						$result = mysqli_query($con,"SELECT * FROM targets WHERE BrandUsername = '$userID'");
						$data = mysqli_fetch_array($result);
						//update quantity of targets set, update new target name, update new target value
						if ($data['target1_name'] == '') {
							mysqli_query($con,"UPDATE targets SET target1_name = '$saveName', target1_value = '$saveValue', targetsSet = '$number' WHERE BrandUsername = '$userID'");
						} else if ($data['target2_name'] == '') {
							mysqli_query($con,"UPDATE targets SET target2_name = '$saveName', target2_value = '$saveValue', targetsSet = '$number' WHERE BrandUsername = '$userID'");
						} else if ($data['target3_name'] == '') {
							mysqli_query($con,"UPDATE targets SET target3_name = '$saveName', target3_value = '$saveValue', targetsSet = '$number' WHERE BrandUsername = '$userID'");
						} else if ($data['target4_name'] == '') {
							mysqli_query($con,"UPDATE targets SET target4_name = '$saveName', target4_value = '$saveValue',targetsSet = '$number' WHERE BrandUsername = '$userID'");
						}
						echo "<script> location.reload(); alert('Target Added Successfully'); </script>"; 
					} else { 
						echo "<script> alert('Error: The maximum of 4 targets have already been set'); </script>"; }
				}
			}
		}
		
		//IF DELETE BUTTON IS PRESSED
		if (isset($_POST['delete'])) {
			//first check a target has been selected
			if ($targetDelete == -1) {
				echo "<script> alert('Error: Please ensure all target selections are filled out correctly'); </script>";
			} else {
				//make the name = "" and the value = 0
				if ($targetDelete == 1) {
					mysqli_query($con,"UPDATE targets SET target1_name = '', target1_value = 0 WHERE BrandUsername = '$userID'");
				} else if ($targetDelete == 2) {
					mysqli_query($con,"UPDATE targets SET target2_name = '', target2_value = 0 WHERE BrandUsername = '$userID'");
				} else if ($targetDelete == 3) {
					mysqli_query($con,"UPDATE targets SET target3_name = '', target3_value = 0 WHERE BrandUsername = '$userID'");
				} else if ($targetDelete == 4) {
					mysqli_query($con,"UPDATE targets SET target4_name = '', target4_value = 0 WHERE BrandUsername = '$userID'");
				}
				//reduce quantity of targets set by 1
				$result = mysqli_query($con,"SELECT targetsSet FROM targets WHERE BrandUsername = '$userID'");
				$data = mysqli_fetch_array($result);
				$newNo = $data[0] - 1;
				mysqli_query($con,"UPDATE targets SET targetsSet = '$newNo' WHERE BrandUsername = '$userID'");
				echo "<script> location.reload(); alert('Target Deleted Successfully'); </script>";
			}
		}
		?>
		
			
	</div>
	

	
	<?
	//close connection
	mysqli_close($con);
	?>
	

	
</div>
































<!--Master Page End-->
<div id="nav-bar"></div>

</div>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/totop.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
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
	<a id="nav_348_I2" href="dashboardtargets.php" target="_self"> Manage Targets </a>
</div>';



$minHeight = 870;
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
$array2 = array("Manage Targets", $navBar, $pageHeight, $pageHeightVal1, $pageHeightVal2, $pageHeightVal3, $pageHeightVal4, $pageHeightVal5, $pageHeightVal6, $d);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>