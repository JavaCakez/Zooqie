<?php
	if(!session_id()) session_start();
    $u = strtolower($_SESSION['username']);
	if(!($u == 'zookie' || $u == 'zooqie')){
	header("location:login.php");
}
else
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<title>Master Page | ZOOQIE</title>
<meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. Zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
	<?
	//Variable declarations
	$folderLevel = 0;
	$folderString = '';
	$names = array('Home', 'Masterpage');
	$links = array('index.php', 'masterpage.php');
	$pageHeight = 1100;

	include($folderString . 'php/head.php');
	?>


    <?

    if (isset($_GET['Message']))
    {
        $message = $_GET['Message'];
        echo "<script>

		    alert('$message');

		</script>";
    }

    ?>
<style type="text/css">
body{margin:0;padding:0;}
.wpfixed{position:absolute;}
div > .wpfixed{position:fixed;}
a.hlink_1:link {color:#2c2c2c;}
a.hlink_1:visited {color:#2c2c2c;}
a.hlink_1:hover {color:#e52b50;}
a.hlink_1:active {color:#2c2c2c;}
.Heading-Dash
{
    font-family:"Harabara", serif; color:#656565; font-size:30.0px; line-height:1.47em;
}
.Heading-22-GREEN
{
    font-family:"Harabara", serif; color:#376737; font-size:30.0px; line-height:1.47em;
}
.Heading-22-RED
{
    font-family:"Harabara", serif; color:#672626; font-size:30.0px; line-height:1.47em;
}
.Heading-2-C
{
    font-family:"Harabara", serif; color:#656565; font-size:14.0px; line-height:1.47em;
}
.Body-C
{
    font-family:"Lato", sans-serif; color:#2c2c2c; font-size:14.0px; line-height:1.29em;
}
.Heading-2-C-C0
{
    font-family:"Harabara", serif; color:#656565; font-size:21.0px; line-height:1.48em;
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

</head>



<body>
<div class="pageWrapper">
	<? include($folderString . 'php/header.php'); ?>
	<div class="pageContent" style="height:<?echo $pageHeight;?>px;">
		<? include($folderString . 'php/navBar.php'); ?>








<!-- UPDATE BUTTONS -->

<form id="form_31" action="update_product_pages.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:780px;top:133px;width:296px;height:41px;">
<input type="submit" style="position:absolute; left:8px; top:8px; width:200px; height:22px;" id="butn_8" value="Update product pages">
</form>
<form id="form_32" action="update_brand_pages.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:780px;top:163px;width:296px;height:46px;">
<input type="submit" style="position:absolute; left:8px; top:8px; width:200px; height:22px;" id="butn_9" value="Update brand pages">
</form>
<form id="form_33" action="update_category_pages.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:780px;top:193px;width:296px;height:46px;">
<input type="submit" style="position:absolute; left:8px; top:8px; width:200px; height:22px;" id="butn_10" value="Update category pages">
</form>
<form id="form_35" action="update_lookbooks.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:780px;top:223px;width:296px;height:46px;">
<input type="submit" style="position:absolute; left:8px; top:8px; width:200px; height:22px;" id="butn_12" value="Update lookbooks">
</form>
<form id="form_35" action="update_thumbnails.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:780px;top:253px;width:296px;height:46px;">
	<input type="submit" style="position:absolute; left:8px; top:8px; width:200px; height:22px;" id="butn_12" value="Update Product Thumbnails">
</form>

<form action="add_brand.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:500px;top:253px;width:250px;height:46px;">
    ID: <input type="text" name="id" style="width:25px;"> <br/>
    Brand Name: <input type="text" name="brandname"> <br/>
    Commission: <input type="text" name="commission" style="width:25px;"> <br/>
    <input type="submit" id="butn_12" value="Insert new brand">
</form>


<!--<form action="paypal/class/test.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:500px;top:283px;width:500px;height:46px;">-->
<!--    <input type="submit" id="butn_12" value="Test">-->
<!--</form>-->






<!-- CREATE USABLE DASHBOARD AREA -->
	<div style="position:relative; width:100%;">



		<!--SALES THIS WEEK-->

		<!--Make entire box clickable through to the sales dashboard-->
		<a href = "dashboardsales.php" >
			<div style = "position:absolute; top: 10px; left: 30px; width:150px; height: 100px; background-color:#D1D1D1; text-align: center; opacity: .9;">

				<!--Highlight the box on mouse over-->
				<img src="wpimages/wp9b022f92_06.png" border="0" width="100%" height="100%"  style="position:absolute;left:0px;top:0px;" class="fader_img">

				<!--Show the number of sales this week-->
				<div class = "dashSales" style = "position:absolute; top: 37px; width:100%; text-align: center;">
					<?
					// Create connection
                    if(file_exists("db_settings.php")) {include("db_settings.php");}
                    if(file_exists("../db_settings.php")) {include("../db_settings.php");}
                    if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
                    if(file_exists("db_settings.php")) {include("db_settings.php");}
					$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

					//display number of sales in last week from selected brand
					$data = mysqli_query($con,"SELECT COUNT(*) FROM sales WHERE date between date_sub(curdate(),INTERVAL 6 DAY) and curdate();");
					$row = mysqli_fetch_array($data);
					$total = $row[0];
					echo "<span class=\"Heading-Dash\">$total</span>";
					?>
				</div>

				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
					<span class="Heading-2-C">SALES THIS WEEK</span>
				</div>

			</div>
		</a>



		<!--TOTAL SALES-->

		<!--Make entire box clickable through to the sales dashboard-->
		<a href = "dashboardsales.php" >
			<div style = "position:absolute; top: 10px; left: 210px; width:150px; height: 100px; background-color:#D1D1D1; text-align: center; opacity: .9;">

				<!--Highlight the box on mouse over-->
				<img src="wpimages/wp9b022f92_06.png" border="0" width="100%" height="100%"  style="position:absolute;left:0px;top:0px;" class="fader_img">

				<!--Show the number of sales this week-->
				<div class = "dashSales" style = "position:absolute; top: 37px; width:100%; text-align: center;">
					<?
					//display number of sales in last week from selected brand
					$data = mysqli_query($con,"SELECT COUNT(*) FROM sales;");
					$row = mysqli_fetch_array($data);
					$total = $row[0];
					echo "<span class=\"Heading-Dash\">$total</span>";
					?>
				</div>

				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
					<span class="Heading-2-C">TOTAL SALES</span>
				</div>

			</div>
		</a>



		<!--TOTAL SALES WORTH-->

		<!--Make entire box clickable through to the sales dashboard-->
		<a href = "dashboardsales.php" >
			<div style = "position:absolute; top: 10px; left: 390px; width:150px; height: 100px; background-color:#D1D1D1; text-align: center; opacity: .9;">

				<!--Highlight the box on mouse over-->
				<img src="wpimages/wp9b022f92_06.png" border="0" width="100%" height="100%"  style="position:absolute;left:0px;top:0px;" class="fader_img">

				<!--Show the number of sales this week-->
				<div class = "dashSales" style = "position:absolute; top: 37px; width:100%; text-align: center;">
					<?
					//get all sales in last month, add up the price plus shipping
					$result = mysqli_query($con,"SELECT Price FROM sales;");
					$income = 0;
					while($row = mysqli_fetch_array($result))
					{
						$price = number_format((float)$row['Price'], 2, '.', '');
						$income = $income + $price;
					}

					echo "<span class=\"Heading-Dash\">£$income</span>";
					?>
				</div>

				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
					<span class="Heading-2-C">TOTAL SALES WORTH</span>
				</div>

			</div>
		</a>


		<!--ESTIMATED COMMISSION-->

		<!--Make entire box clickable through to the sales dashboard-->
		<a href = "dashboardsales.php" >
			<div style = "position:absolute; top: 10px; left: 570px; width:150px; height: 100px; background-color:#D1D1D1; text-align: center; opacity: .9;">

				<!--Highlight the box on mouse over-->
				<img src="wpimages/wp9b022f92_06.png" border="0" width="100%" height="100%"  style="position:absolute;left:0px;top:0px;" class="fader_img">

				<!--Show the number of sales this week-->
				<div class = "dashSales" style = "position:absolute; top: 37px; width:100%; text-align: center;">
					<?
					$commission = $income * 0.25;
					$commission = number_format((float)$commission, 2, '.', '');

					echo "<span class=\"Heading-Dash\">£$commission</span>";
					?>
				</div>

				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center;">
					<span class="Heading-2-C">APPROX COMMISSION</span>
				</div>

			</div>
		</a>

		<!--Structure Lines-->
		<div style = "position:absolute; top: 118px; left: 50px; width:600px; height: 3px; background-color:#656565; text-align: center; opacity: .8;"> </div>



		<!--VIEWS THIS WEEK-->

		<!--Make entire box clickable through to the views dashboard-->
		<a href = "dashboardviews.php" >
			<div style = "position:absolute; top: 130px; left: 30px; width:150px; height: 100px; background-color:#D1D1D1; text-align: center; opacity: .9;">

				<!--Highlight the box on mouse over-->
				<img src="wpimages/wp9b022f92_06.png" border="0" width="100%" height="100%"  style="position:absolute;left:0px;top:0px;" class="fader_img">

				<!--Show the number of views this week-->
				<div class = "dashViews" style = "position:absolute; top: 37px; width:100%; text-align: center;">
					<?

					//display number of view from all brand's pages
					$data = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE date between date_sub(curdate(),INTERVAL 6 DAY) and curdate();");
					$row = mysqli_fetch_array($data);
					$thisweek = $row[0];
					//check for zero
					if (empty($thisweek)) {
						echo "<span class=\"Heading-Dash\">0</span>";
					}else { echo "<span class=\"Heading-Dash\">$thisweek</span>"; }

					?>
				</div>

				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center; ">
					<span class="Heading-2-C">VIEWS THIS WEEK</span>
				</div>

			</div>
		</a>


		<!--COMPARED TO LAST WEEK-->

		<!--Make entire box clickable through to the views dashboard-->
		<a href = "dashboardviews.php" >
			<div style = "position:absolute; top: 130px; left: 210px; width:150px; height: 100px; background-color:#D1D1D1; text-align: center; opacity: .9;">

				<!--Highlight the box on mouse over-->


				<!--Show the number of views this week-->
				<div class = "dashViews" style = "position:absolute; top: 37px; width:100%; text-align: center;">
					<?
						//get total number of views for last week
						$data = mysqli_query($con,"SELECT sum(Count) FROM pageviews WHERE date between date_sub(curdate(),INTERVAL 13 DAY) and date_sub(curdate(),INTERVAL 7 DAY);");
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
				</div>

				<!--Box title-->
				<div style = "position:absolute; top: 10px; width:100%; text-align: center; ">
					<span class="Heading-2-C">FROM LAST WEEK</span>
				</div>


			</div>
		</a>






<?
}
?>

	</div>
<? include($folderString . 'php/footer.php'); ?>
</div>

</body>
</html>

