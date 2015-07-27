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
.Heading-2-CC
{
    font-family:"Harabara", serif; color:#3A3A3A; font-size:19px; line-height:1.47em;
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

<img src="images/navbar.png" border="0" width="1000" height="40" id="qs_1" alt="" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:90px; " >
<!--NAVBAR-->







	
	<?
	// Create connection
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

    $userID = getBrandIDFromSessionUsername($_SESSION['username']);
	
	?>

<div style="position:relative; top:130px; width:100%;">
	<!--Title-->
	<div style = "position:absolute; top: 8px; width:100% ; text-align: center;">
		<span class="Body-C-C0">Stocks Dashboard</span>
	</div>
	<!--Background-->
	<img src="\images\backgrounds\dunes.jpg" alt="dunes" width="100%"; height="940px">

	<!--Information-->
    <div style = "position:absolute; top: 20px; height: 30px; width: 30px; left: 15px; opacity: .5; ">
		<img src="images/info.png" border="0" alt="" height= "30px" width= "30px" title="Here you can monitor your product stocks.

To see a full report of ALL stocks hit the Download button on the stocks report.

You can edit your stock quantities by clicking 'Manage Store'." />
	</div>

    <div style = "position:absolute; top: 30px; left: 845px; width:140px; height: 50px; text-align: center; z-index: 100">
        <a href = "/uploadmenu.php" style = "text-decoration:none;color:#E52B50; font-family:'Harabara', serif; font-size:17px; line-height:1.50em;"><< Manage Store</a>
    </div>
	
	<!--Structure Lines-->
	<div style = "position:absolute; top: 65px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
	<div style = "position:absolute; top: 165px; left: 80px; width:840px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>
	
	<!--total products-->
	<div style = "position:absolute; top: 75px; left: 215px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<br>
		<?
			//display total number of items
			$data = mysqli_query($con,"SELECT COUNT(*) FROM products WHERE Brand = '$userID'");
			$result = mysqli_fetch_array($data);
			$totalProds = $result[0];
			if ($totalProds == 0){
				echo "<span class=\"Heading-22-C\">0</span>";
			} else { echo "<span class=\"Heading-22-C\">$totalProds</span>"; }
			?>
			<br>
			<span class="Heading-22-CC">TOTAL PRODUCTS</span>
	</div>
	
	<!--total stock-->
	<div style = "position:absolute; top: 75px; left: 365px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<br>
		<?
			//display total number of items 
			$data = mysqli_query($con,"SELECT SUM(stock) FROM products WHERE Brand = '$userID'");
			$result = mysqli_fetch_array($data);
			$totalStock = $result[0];
			if ($totalStock == 0){
				echo "<span class=\"Heading-22-C\">0</span>";
			} else { echo "<span class=\"Heading-22-C\">$totalStock</span>"; }
			?>
			<br>
			<span class="Heading-22-CC">TOTAL STOCK</span>
			
	</div>
	
	<!--out of stock-->
	<div style = "position:absolute; top: 75px; left: 515px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<br>
			<?
			//display number of items that are out of stock
			$data = mysqli_query($con,"SELECT COUNT(*) FROM products WHERE Brand = '$userID' AND stock=0 ");
			$result = mysqli_fetch_array($data);
			$noStock = $result[0];
			if ($noStock > 0){
				echo "<span class=\"Heading-22-RED\">$noStock</span>";
			} else { echo "<span class=\"Heading-22-C\">0</span>"; }
			?>
			<br>
			<span class="Heading-22-CC">OUT OF STOCK</span>
		
	</div>
	
	<!--low stock-->
	<div style = "position:absolute; top: 75px; left: 665px; width:120px; height: 80px; background-color:#D1D1D1; text-align: center; opacity: .8;">
		<br>
			<?
			//display number of items that are less than 5 in stock
			$data = mysqli_query($con,"SELECT COUNT(*) FROM products WHERE Brand = '$userID' AND stock<6 ");
			$result = mysqli_fetch_array($data);
			$lowStock = $result[0];
			if ($lowStock > 0){
				echo "<span class=\"Heading-22-RED\">$lowStock</span>";
			} else { echo "<span class=\"Heading-22-C\">0</span>"; }
			?>
			<br>
			<span class="Heading-22-CC">LESS THAN 5 LEFT</span>
		
	</div>
	
	
	<!--Line Chart Label-->
	<div style = "position: absolute; left: -10px; top: 320px; -ms-transform:rotate(270deg); -moz-transform:rotate(270deg); -webkit-transform:rotate(270deg);"> 
		<span class="Heading-2-C">Quantity in Stock</span>
	</div> 
	
	<!-- Bar chart to show target percentage completion -->
	<div style = "position:absolute; top: 190px; left: 40px; height: 550px; text-align: center;">
		<canvas id="bar" height="330" width="890"></canvas>
		
		<?
		//for every product in the product table from this brand
		//get a label
		//get a stock quantity
		$phpLabels = array();
		$phpData = array();
		
		$result = mysqli_query($con,"SELECT Item_Number, Size, stock FROM products WHERE Brand = '$userID' ORDER BY stock, Item_Number ASC LIMIT 60");
		while($data = mysqli_fetch_array($result))
			{
			$label= $data['Item_Number']."-".substr($data['Size'],0,8);
			array_push($phpLabels, $label);
			array_push($phpData, $data['stock']);
			}
		
		//gives the chart a standard scale of 0 - 10
		//have to put so many 0s in so that the 10 at the end never gets displayed on the chart
		array_push($phpData, 0);
		array_push($phpData, 0);
		array_push($phpData, 0);
		array_push($phpData, 0);
		array_push($phpData, 0);
		array_push($phpData, 0);
		array_push($phpData, 0);
		array_push($phpData, 0);
		array_push($phpData, 10);
		?>
		
		<script>
		var labelsArray = [<?php echo '"'.implode('","', $phpLabels).'"' ?>];
		var dataArray = [<?php echo '"'.implode('","', $phpData).'"' ?>];
		
		
			var barChartData = {
				labels : labelsArray,
				datasets : [

					{
						fillColor : "rgba(20,220,220,0.5)",
						strokeColor : "#656565",
						data : dataArray
					}
				]
				
			}

		var myLine = new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
		</script>
		
	</div>
	
	<!--Stocks Table-->
	<div style = "position:absolute; top: 545px; left: 120px; height: 370px; width:760px; background-color:#D1D1D1; text-align: center; opacity: .9;">
		
		<? //PRODUCT SORT VARIABLE - PRODUCTSORT
		$tableSort = $_POST['tableorder'];
		?>	
		
		<div style = "position:absolute; top: 7px; width:100%; text-align: center;">
			<span class="Heading-2-C">STOCK QUANTITIES</span>
		</div>
		
		<!--Table-->
		<div style = "position:absolute; top: 39px; width:744px; left: 8px; text-align: center;">
			<?
			//create table
			echo " <table class=\"hovertable\">
			<tr>
				<th>Item No.</th><th>Item Name</th><th>Description</th><th>Stock</th>
			</tr>";
			
			//show remaining stock for products
			if (!isset($tableSort)) {$tableSort = "stock ASC";}
			$result = mysqli_query($con,"SELECT Item_number, Item_name, Size, stock FROM products WHERE Brand = '$userID' ORDER BY " . $tableSort . " LIMIT 8");
			$tablecount = 0;
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
				echo "<td>" . $row['Item_number'] . "</td>";
				echo "<td>" . substr($row['Item_name'],0,45) . "</td>";
				echo "<td>" . substr($row['Size'],0,10) . "</td>";
				echo "<td>" . $row['stock'] . "</td>";
				echo "</tr>";
				$tablecount++;
			}
			//enter default table data if no data is given
			for ($x=$tablecount; $x<=7; $x++){
				echo "<tr onmouseover=\"this.style.backgroundColor='#B3C8CB';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\">";
				echo "<td>" . "--" . "</td>";
				echo "<td>" . "--" . "</td>";
				echo "<td>" . "--" . "</td>";
				echo "<td>" . "--" . "</td>";
				echo "</tr>";
				}
			echo "</table>";
			?>
		</div>
		
		<!--Download Button-->
		<div style = "position:absolute; top: 4px; right: 8px; text-align: centre;" >
			
			<?
			//if the download button is clicked, save all stocks data into a csv file
			if (isset($_POST['Download'])) {
			
				include("download.php");
				$qry = mysqli_query($con,"SELECT Item_number, Item_name, Size, stock FROM products WHERE Brand = '$userID' ORDER BY stock ASC");
				download($con, $userID, $qry, 'ZooqieStocksReport-');
					
				} 
				
			?>
			
			<form method = "post">
				<input type = "submit" name = "Download" value = "Download Full Report" class="Heading-22-CC" />
			</form>
			
		</div>
	
		<!--Order by Drop Down list for report table-->
		<div style = "position:absolute; top: 0px; left: 8px; width: 150px; ">
			<form name = "Select1" action="/dashboardstocks.php" method="POST" class="Heading-22-CC" >
				<select name = "tableorder" id = "tableorder" style = "background-color:#D1D1D1; border-width: 1px; border-color:#A5A5A5;" OnChange="document.Select1.submit(); ">
					<option value='stock ASC' <?if($_POST['tableorder'] == 'stock ASC') {echo 'selected';}?>>-Order By-</option>
					<option value='stock ASC' <?if($_POST['tableorder'] == 'stock ASC') {echo 'selected';}?>>Stock - Lowest First</option>
					<option value='stock DESC' <?if($_POST['tableorder'] == 'stock DESC') {echo 'selected';}?>>Stock - Highest First</option>
					<option value='Item_Number ASC' <?if($_POST['tableorder'] == 'Item_Number ASC') {echo 'selected';}?>>Item Number</option>
					<option value='Item_name ASC' <?if($_POST['tableorder'] == 'Item_name ASC') {echo 'selected';}?>>Item Name</option>
				</select>
			</form>
		</div>
	
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
	<a id="nav_348_I2" href="dashboardstocks.php" target="_self"> Stocks Dashboard </a>
</div>';



$minHeight = 1080;
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
$array2 = array("Stocks Dashboard", $navBar, $pageHeight, $pageHeightVal1, $pageHeightVal2, $pageHeightVal3, $pageHeightVal4, $pageHeightVal5, $pageHeightVal6, $d);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>