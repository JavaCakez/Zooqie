<?
ob_start (); // Buffer output
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><!--TITLE--></title>
<meta name="viewport" content="width=1000">
<link rel="icon" href="../../favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../../css/styles.css">
<script type="text/javascript" src="../../js/jquery.js"></script>

<!--[if lt IE 9]><script src="../../js/html5.js"></script><![endif]-->


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








<!--Header code for HTML frag_46 -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
<?

    $folderName = curFolderName();

    // Create connection
    $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

    $result = mysqli_query($con,"SELECT * FROM brandfolders WHERE Folder_name = '" . $folderName . "'");
    while($row = mysqli_fetch_array($result))
    {
        $ID = $row['ID'];
    }
?>

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
.Heading-3-C
{
    font-family:"Harabara", serif; color:#e52b50; font-size:14px; line-height:1.50em;
}
.Heading-1-C-C0
{
    font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
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
</style>

<script type="text/javascript" src="../../js/jquery.etalage.min.js"></script>
<script>
 $(document).ready(function(){
  $('#ecom').etalage({
  thumb_image_width: 350,
  thumb_image_height: 450,
  source_image_width: 900,
  source_image_height: 1200,
  zoom_area_width: 512,
  zoom_area_height: 500,
  zoom_area_distance: 5,
  small_thumbs: 4,
  smallthumb_inactive_opacity: 0.3,
  smallthumbs_position: 'left',
  show_icon: true,
  autoplay: false,
  keyboard: false,
  zoom_easing: true
  });
});
</script>
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
    font-family:"Harabara", serif; color:#656565; font-size:24px; line-height:1.50em;
}

</style>


<script type="text/javascript">


</script>
</head>


<?
    //height of page excluding footer
    $pageHeight = 1090;
    // 222 is footer height
    $tmpHeight = $pageHeight + 222;
?>


<body text="#000000" style="background:#ffffff url('../../images/backgroundpattern.png') repeat fixed top center; height:<?echo $tmpHeight;?>px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3);">
<!--Master Page Body Start-->

<?php
echoFooter(2, $pageHeight);
echoFacebookScript();
echoHeader(2, 1000, $tmpHeight);
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();
?>

<img src="../../images/navbar.png" border="0" width="1000" height="40" id="qs_1" alt="Navigation Bar" style="position:absolute;left:0px;top:80px;">
<!--NAVBAR-->












<div id="txt_40" style="position:absolute;left:20px;top:647px;width:441px;height:40px;overflow:hidden;">
<h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">You may also like</span></h2>
</div>
<img src="../../images/line.png" border="0" width="441" height="1" id="pcrv_6" alt="" style="position:absolute;left:20px;top:691px;">
<img src="../../images/line.png" border="0" width="441" height="1" id="pcrv_5" alt="" style="position:absolute;left:20px;top:628px;">


<!--Body-->
<?
	$pageName = curPageName();
	// Create connection
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
	
	// Check connection
	if (mysqli_connect_errno($con))
	{
	  echo '<div> Failed to connect to products database, please try again later.  </div>';
	}
	else
	{
		//initialise brand ID variable
		$brandID = substr($pageName,0,-3);
		//initialise now date variable
		$nowdate = date('Y-m-d');
		
		//VIEW COUNTER - check to see if a view today exists, if it does add 1 to count, if it doesn't then add record
		$result = mysqli_query($con,"SELECT COUNT(*) FROM pageviews WHERE PageName = '$pageName' AND Date = '$nowdate'");
		$row = mysqli_fetch_array($result);
		$total = $row[0];
		if ($total > 0) {
			//if result exists, increment count
			mysqli_query($con,"UPDATE pageviews SET Count = Count + 1 WHERE PageName = '$pageName' AND Date = '$nowdate'");
		} else {
			//if result doesn't exist yet today add it
			mysqli_query($con,"INSERT INTO pageviews (PageName, BrandUsername, Date, Count) VALUES ('$pageName', '$brandID', '$nowdate', 1)");
		}
		
		$result = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $pageName . "'");
		while($row = mysqli_fetch_array($result))
		{
			$price = $row['Price'];
			$shipping = $row['Shipping_charge'];
			$name = stripslashes($row['Item_name']);
			$pageTitle = $name;
			$brand  = stripslashes($row['Brand']);
			$brandPageURL = strtolower($brand) . '.php';
			$details = stripslashes(str_replace(PHP_EOL, "<br/>", $row['Details']));
			$shippinginfo = stripslashes(str_replace(PHP_EOL, "<br/>", $row['Shipping_info']));
			$guide = $row['Sizing_guide'];
			break;
		}
	}
	
	$result = mysqli_query($con,"SELECT * FROM brands WHERE ID = '". $brand . "'");
	while($row = mysqli_fetch_array($result))
	{
		$brandName = $row['Brand_name'];
		$shippinginfo = stripslashes(str_replace(PHP_EOL, "<br/>", $row['Shipping_info']));
		$paypalemail = $row['Paypal_email'];
		$email = $row['Email'];
		$questionstring = 'brandquestion.php?selleremail=' . $email;
		$commission = $row['Commission'];
		break;
	}
?>

<div style="position:absolute;left:509px;top:151px;width:447px;">

<?

			$result = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $pageName . "'");
			while($row = mysqli_fetch_array($result))
			{
				$name = stripslashes($row['Item_name']);
				$price = $row['Price'];
				$gender = $row['Gender'];
				if($gender == 'M') $gender = 'Male';
				if($gender == 'F') $gender = 'Female';
				if($gender == 'U') $gender = 'Unisex';
			}
			
		
	
?>

<?
    	echo '<div style="float:right;">
		<a style="text-decoration:none;" href="../../brands/'.$folderName.'" target="_self"><h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-3-C">
		&lt;&lt; Visit the brand\'s store</h1></span></a></div><br/>';
    	
    	echo '<div id="txt_2">
		<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">';
		echo $name;
		echo ' ('.$pageName.')</span></h1></div><br/>';
    	
    	echo '<div id="txt_12">
		<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">';
		echo 'Price: &pound';
		echo $price;
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo 'Gender: ';
		echo $gender;
		echo '</span></h1></div>';
    ?>




<form id="form_3" action="../../address.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" >

<input type="hidden" name="bn" value="Serif.WebPlus">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?echo $paypalemail;?>">
<input type="hidden" name="item_name" value="<?echo $name;?>">
<input type="hidden" name="item_number" value="<?echo $pageName;?>">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="amount" value="<?echo $price;?>">
<input type="hidden" name="quantity" value="1">
<input type="hidden" name="shipping" value="<?echo $shipping;?>">
<input type="hidden" name="no_shipping" value="2">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="commission" value="<?echo $commission;?>">


<?php

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$result = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $pageName . "'");
		
		$shippingStrings = array();
		$totalShipping = 4;
		//Count how many total sizes there are (e.g. Small, Medium, Large = 3)
		//Store the strings of the sizes
		while($row = mysqli_fetch_array($result))
		{
			$shippingStrings[0] = $row['Shipping_charge'];
			$shippingStrings[1] = $row['Shipping_charge2'];
			$shippingStrings[2] = $row['Shipping_charge3'];
			$shippingStrings[3] = $row['Shipping_charge4'];
			
			echo '<input type="hidden" name="uks" value="'.$row['Shipping_charge'].'">';
			echo '<input type="hidden" name="uke" value="'.$row['Shipping_charge2'].'">';
			echo '<input type="hidden" name="eur" value="'.$row['Shipping_charge3'].'">';
			echo '<input type="hidden" name="int" value="'.$row['Shipping_charge4'].'">';
			break;
		}
		
		if($shippingStrings[0] >= 0 || $shippingStrings[1] >= 0 || $shippingStrings[2] >= 0 || $shippingStrings[3] >= 0)
		{
			echo '<p><select name="ship" size="1" >';
				
			for ($j = 0; $j < $totalShipping = 4; $j++)
			{
				if($j == 0)
				{
					if($shippingStrings[$j] >= 0) echo '<option value="' . $j . '" selected>Shipping - UK Standard: &pound;'.$shippingStrings[$j].'</option>';
				}
				else
				{
					if($j == 1) $shipstr = 'Shipping - UK Express: &pound;';
					if($j == 2) $shipstr = 'Shipping - Europe: &pound;';
					if($j == 3) $shipstr = 'Shipping - International: &pound;';
					if($shippingStrings[$j] >= 0) echo '<option value="' . $j . '">' . $shipstr . $shippingStrings[$j] . '</option>';
				}
			}
				
			echo '</select>';
			
			
			
		}

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		
		$result = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $pageName . "'");
	
		$sizeStrings = array();
		$totalSizes = 0;
		
		//Count how many total sizes there are (e.g. Small, Medium, Large = 3)
		//Store the strings of the sizes
		while($row = mysqli_fetch_array($result))
		{
			$sizeStrings[$totalSizes] = $row['Size'];
			$totalSizes++;
		}
		
		//Initialise all size stocks to 0	
		$sizeStocks = array();
		for ($j = 0; $j < $totalSizes; $j++)
		{
		   $sizeStocks[$j] = 0; 
		}
		
		//Correctly set all size stocks to correct value
		$result = mysqli_query($con,"SELECT * FROM products WHERE Brand IN (SELECT ID FROM brands Where (Live = '1' || Brand='TST')) AND Item_number = '". $pageName . "'");
		while($row = mysqli_fetch_array($result))
		{
			for ($j = 0; $j < $totalSizes; $j++)
			{
			   	if($row['Item_number'] == $pageName && $row['Size'] == $sizeStrings[$j])
			  	{
			  		$sizeStocks[$j] = $row['stock'];
			  	} 
			}
		}
		
		//Check if all stocks are 0
		$instock = 'true';
		$counter = 0;
		for ($j = 0; $j < $totalSizes; $j++)
		{
			if($sizeStocks[$j] <= 0) $counter++;
		}
		if($counter == $totalSizes) $instock = 'false';
		
		//If there are items in stock, display combo box and buy button
		//Otherwise, display out of stock message
		if($instock == 'true')
		{  
			echo '<p><select id="combo_32" name="os0" size="1" >';
			
			for ($j = $totalSizes; $j > 0; $j--)
			{
				if($sizeStocks[$totalSizes - $j] > 0) echo '<option value="' . $sizeStrings[$totalSizes - $j] . '" >' . $sizeStrings[$totalSizes - $j] . ' </option>';
			}
			
			echo '</select>';
		
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" id="btn_46" class="button large blue">
			<span>Buy&nbsp;Now</span></button></p>';
		}
		else
		{
			echo '<div id="txt_139"  >
			<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C-C0">All Sizes out of Stock</span></h1>
			</div>
			<br/>';
		}
	

?>

<!-- HTML frag_31 -->

<div id="frag_31" >
    
	<div id="tabs">
	  <ul style="font-size:0.9em;">
	    <li style="font-size:0.9em;"><a href="#tabs-1">Details</a></li>
	    <li style="font-size:0.9em;"><a href="#tabs-2">Shipping</a></li>
	    <li style="font-size:0.9em;"><a href="#tabs-3">Returns</a></li>
		<li style="font-size:0.9em;"><a href="#tabs-4">Sizing Guide</a></li>
	  </ul>
	  
	  <div id="tabs-1">
	    <p class="Wp-Body-P" style="font-size:1.1em;"><span class="Body-C">
	    	<?echo $details;?>
	    </span></p>
		    
	    <div> 
			<a href="../../<?echo $questionstring;?>" onclick="window.open('../../<?echo $questionstring;?>', 'newwindow', 'width=590, height=450'); return false;">
				<img src="../../images/mail.png" style="float:left" height="46" width="46" id="pic_256" alt=""/>
			</a>
			<p class="Wp-Body-P" style="padding-top:13px;margin-left:50px;"><span class="Body-C"><strong>Ask seller a question</strong></span></p>
		</div>
	  </div>
	  
	  <div id="tabs-2">
	    <p class="Wp-Body-P" style="font-size:1.1em;"><span class="Body-C">
	    	<?echo $shippinginfo;?>
	    </span></p>
		    
	    <div> 
			<a href="../../<?echo $questionstring;?>" onclick="window.open('../../<?echo $questionstring;?>', 'newwindow', 'width=590, height=450'); return false;">
				<img src="../../images/mail.png" style="float:left" height="46" width="46" id="pic_256" alt="" />
			</a>
			<p class="Wp-Body-P" style="padding-top:13px;margin-left:50px;"><span class="Body-C"><strong>Ask seller a question</strong></span></p>
		</div>
	  </div>
	  
	  <div id="tabs-3">
	    <p class="Wp-Body-P" style="font-size:1.1em;"><span class="Body-C">
	    	If you wish to return an item for any reason, please get in contact with brands directly via email by clicking the mail icon below.<br/>
			<br/>
			The brand will then liaise with you and do their best to complete the return of the item, or a swap for a new one.<br/><br/>
			<br/>
	    	Please see our <a href="../../returns.php">returns page</a> for further information on returns and exchanges.
	    </span></p>
		    
	    <div> 
			<a href="../../<?echo $questionstring;?>" onclick="window.open('../../<?echo $questionstring;?>', 'newwindow', 'width=590, height=450'); return false;">
				<img src="../../images/mail.png" style="float:left" height="46" width="46" id="pic_256" alt=""/>
			</a>
			<p class="Wp-Body-P" style="padding-top:13px;margin-left:50px;"><span class="Body-C"><strong>Ask seller a question</strong></span></p>
		</div>
	  </div>
	  
	  <div id="tabs-4">
		<?

				if($guide != '')
				{
					$result = mysqli_query($con,"SELECT * FROM sizingguides WHERE Brand = '". $brand . "' AND Name = '".$guide."'");
					
					while($row = mysqli_fetch_array($result))
					{
						$Column_headers = $row['Column_headers'];
						$Row_headers = $row['Row_headers'];
						$Row_values[1] = $row['Row_values1'];
						$Row_values[2] = $row['Row_values2'];
						$Row_values[3] = $row['Row_values3'];
						$Row_values[4] = $row['Row_values4'];
						$Row_values[5] = $row['Row_values5'];
						$Row_values[6] = $row['Row_values6'];
						$Row_values[7] = $row['Row_values7'];
						$Row_values[8] = $row['Row_values8'];
						$Row_values[9] = $row['Row_values9'];
						$Row_values[10] = $row['Row_values10'];
						
						$Rows = $row['Rows'];
						$Columns = $row['Columns'];
					}

					$Column_names = explode(",", $Column_headers);
					$Row_names = explode(",", $Row_headers);
					
					echo '<table border="1" bordercolor="#999999" style="background-color:#FFFFFF" width="100%" cellpadding="0" cellspacing="0">';
					for($i = 0; $i <= intval($Rows); $i++)
					{
						$tmpRow_values = explode(",", $Row_values[$i]);
						
						echo '<tr align="center">';
						for($j = 0; $j <= intval($Columns); $j++)
						{
							if($i == 0 && $j == 0)
							{
								echo '<td></td>';
							}
							else if($i == 0)
							{
								$x = $j - 1;
								echo '<td align="center">'.$Column_names[$x].'</td>';
							}
							else if($j == 0)
							{
								$x = $i - 1;
								echo '<td align="center">'.$Row_names[$x].'</td>';
							}
							else
							{
								$x = $j - 1;
								echo '<td align="center">'.$tmpRow_values[$x].'</td>';
							}
							
						}
						echo '</tr>';
					}
					echo '</table><br/>';
				}
				else
				{
					echo '<p class="Wp-Body-P"><span class="Body-C">This brand has not provided a sizing guide for this product yet.</span><p>';
				}
			
		?>

		
		<div> 
			<a href="../../<?echo $questionstring;?>" onclick="window.open('../../<?echo $questionstring;?>', 'newwindow', 'width=590, height=450'); return false;">
				<img src="../../images/mail.png" style="float:left" height="46" width="46" id="pic_256" alt=""/>
			</a>
			<p class="Wp-Body-P" style="padding-top:13px;margin-left:50px;"><span class="Body-C"><strong>Ask seller a question</strong></span></p>
		</div>
	  </div>
	  	    
	</div>
	<div style="width:446px;height:10px;"></div>
	<?
		$fb = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	?>
	<div class="fb-like" data-href="<?echo $fb;?>" data-width="446" data-show-faces="true" data-send="true"></div>
	<div class="fb-comments" data-href="<?echo $fb;?>" data-width="446"></div>
</div>



</form>
</div>

<div id="frag_4" style="position:absolute;left:20px;top:149px;width:440px;height:452px;">
    
    <?php

    		$result = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '" . $pageName . "'");
    		
    		$imgURL1 = 'NULL';
    		$imgURL2 = 'NULL';
    		$imgURL3 = 'NULL';
    		$imgURL4 = 'NULL';
    		$imgURL5 = 'NULL';
    		while($row = mysqli_fetch_array($result))
    		{
				$imgURL1 = $row['Image_URL1'];
				$largeimgURL1 = str_replace('.', '_large.', $imgURL1);
    			$imgURL2 = $row['Image_URL2'];
				$largeimgURL2 = str_replace('.', '_large.', $imgURL2);
    			$imgURL3 = $row['Image_URL3'];
				$largeimgURL3 = str_replace('.', '_large.', $imgURL3);
    			$imgURL4 = $row['Image_URL4'];
				$largeimgURL4 = str_replace('.', '_large.', $imgURL4);
    			$imgURL5 = $row['Image_URL5'];
				$largeimgURL5 = str_replace('.', '_large.', $imgURL5);
    		}
    	
    	
    	echo '<ul id="ecom">';
    	if($largeimgURL1 != "" && file_exists('../../'.$largeimgURL1)) {
			echo '<li><img class="etalage_source_image" src="../../' . $largeimgURL1 . '" /></li>';
		} else if($imgURL1 != "") {
			echo '<li><img class="etalage_source_image" src="../../' . $imgURL1 . '" /></li>';
		}
		if($largeimgURL2 != "" && file_exists('../../'.$largeimgURL2)) {
			echo '<li><img class="etalage_source_image" src="../../' . $largeimgURL2 . '" /></li>';
		} else if($imgURL2 != "") {
			echo '<li><img class="etalage_source_image" src="../../' . $imgURL2 . '" /></li>';
		}
		if($largeimgURL3 != "" && file_exists('../../'.$largeimgURL3)) {
			echo '<li><img class="etalage_source_image" src="../../' . $largeimgURL3 . '" /></li>';
		} else if($imgURL3 != "") {
			echo '<li><img class="etalage_source_image" src="../../' . $imgURL3 . '" /></li>';
		}
		if($largeimgURL4 != "" && file_exists('../../'.$largeimgURL4)) {
			echo '<li><img class="etalage_source_image" src="../../' . $largeimgURL4 . '" /></li>';
		} else if($imgURL4 != "") {
			echo '<li><img class="etalage_source_image" src="../../' . $imgURL4 . '" /></li>';
		}
		if($largeimgURL5 != "" && file_exists('../../'.$largeimgURL5)) {
			echo '<li><img class="etalage_source_image" src="../../' . $largeimgURL5 . '" /></li>';
		} else if($imgURL5 != "") {
			echo '<li><img class="etalage_source_image" src="../../' . $imgURL5 . '" /></li>';
		}


	echo '</ul>';
    	
    ?>
</div>
<!--Body-->

<?

			
			$result = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $pageName . "'");
			while($row = mysqli_fetch_array($result))
			{
				$gender = $row['Gender'];
				break;
			}
			
			for ($i = 1; $i <= 2; $i++)
			{
				if($i == 1) $oldno = '';
				
				do
				{
					if($gender == 'M') $result = mysqli_query($con,"SELECT * FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = '1') AND (Gender='M' OR Gender='U')");
					if($gender == 'F') $result = mysqli_query($con,"SELECT * FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = '1') AND (Gender='F' OR Gender='U')");
					if($gender == 'U') $result = mysqli_query($con,"SELECT * FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = '1')");
					$count = 0;
					while($row = mysqli_fetch_array($result))
					{
						$count++;
					}
					$randomnum = mt_rand(0, $count-1);
					
					if($gender == 'M') $result = mysqli_query($con,"SELECT * FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = '1') AND (Gender='M' OR Gender='U') LIMIT " . $randomnum . ", 1");
					if($gender == 'F') $result = mysqli_query($con,"SELECT * FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = '1') AND (Gender='F' OR Gender='U') LIMIT " . $randomnum . ", 1");
					if($gender == 'U') $result = mysqli_query($con,"SELECT * FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = '1') LIMIT " . $randomnum . ", 1");
					while($row = mysqli_fetch_array($result))
					{
						$name = stripslashes($row['Item_name']);
						$itemno = strtolower($row['Item_number']);
                        $r_brandID = $row['Brand'];
						$price = $row['Price'];
						$img = $row['Image_URL1'];
					}
				} while ((strtolower($pageName) == $itemno) || ($itemno == $oldno));

                // Create connection
                $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

                $result3 = mysqli_query($con,"SELECT * FROM brandfolders WHERE ID = '" . $r_brandID . "'");
                while($row3 = mysqli_fetch_array($result3))
                {
                    $r_folderName = 'brands/' . $row3['Folder_name'];
                }


				$oldno = $itemno;
				if($i == 1) $left = 20;
				if($i == 2) $left = 252;
				
				echo'
					<img src="../../' . $img . '" border="1" width="208" height="245" id="pic_38" alt="" style="position:absolute;left:' . $left . 'px;top:727px; " >
					
					<a href="../../'.$r_folderName.'/' . $itemno . '.php">
					<img src="../../images/QS.png" border="0" width="208" height="245" title="" alt="' . $name . '" style="position:absolute;left:' . $left . 'px;top:727px; " class="fader_img"></a>
	
					
					
					<div id="txt_38" style="position:absolute;left:' . $left . 'px;top:985px;width:208px;height:27px;overflow:hidden; /*BorderDivStyle*/" __AddCode="InsideBorderDiv">
					<h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C-C0">' . $name . '</span></h3>
					<p class="Wp-Body-P"><span class="Body-C"><br></span></p>
					</div>
					
	
					<div id="txt_39" style="position:absolute;left:' . $left . 'px;top:1012px;width:208px;height:35px;overflow:hidden; /*BorderDivStyle*/" __AddCode="InsideBorderDiv">
					<h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C">&#163;' . $price . '</span></h3>
					</div>
				';
			}
		
?>
<!--Master Page End-->
<div id="nav-bar"></div>
</div>
<script type="text/javascript" src="../../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../../js/totop.min.js"></script>
<script type="text/javascript" src="../../js/custom.js"></script>
<!--Page Body End-->

</body>
</html>
<?
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

$navBar = '<div class="nav_348style" id="nav_348" style="left: 20px; top: 91px;; width: 960px; height: 26px; position: absolute;"><a id="nav_348_I0" href="../../index.php" target="_self"> Home </a> &gt; <a id="nav_348_I1" href="../..//brands" target="_self"> Brands </a> &gt; <a id="nav_348_I2" href="../../brands/'.$folderName.'" target="_self"> '.$brandName.' </a> &gt; <a class=" currentpage" id="nav_348_I3" href="'.strtolower($pageName).'.php" target="_self"> '.$pageTitle.' </a></div>';

$pageTitle = $brandName ." | " .$pageTitle . ' | ZOOQIE';
$d = str_replace("<br/>", " ", $details);

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
$array1 = array("<!--TITLE-->", '<!--NAVBAR-->', '<!--DESCRIPTION-->');//Values to replace 
$array2 = array($pageTitle, $navBar, $d);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>