<?php
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








<!--Header code for HTML frag_51 -->
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
.Heading-1-C-C12
{
    font-family:"Lato"; color:#656565; font-size:13px; line-height:1.54em;
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
<script type="text/javascript">
    <?php
        echoCookieFunctions();
    ?>

    $(document).ready(function(){
        <?php
            //Echo all sliding Div jquery code
            echoSlidingDiv(1);
            echoSlidingDiv(2);
            echoSlidingDiv(3);
            echoSlidingDiv(4);
        ?>
    });
</script>







<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  

<?php
$folderName = curFolderName();

// Create connection
$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

$result = mysqli_query($con,"SELECT * FROM brandfolders WHERE Folder_name = '" . $folderName . "'");
while($row = mysqli_fetch_array($result))
{
    $ID = $row['ID'];
}


// Check connection
if (mysqli_connect_errno($con))
{
    //echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
}
else
{
    $result=mysqli_query($con,"SELECT count(distinct Category) as total from products WHERE Brand = '". $ID . "'");
    $data=mysqli_fetch_array($result);
    $categoryCounter = $data['total'];

    $result=mysqli_query($con,"SELECT count(distinct Colour) as total from products WHERE Brand = '". $ID . "'");
    $data=mysqli_fetch_array($result);
    $colourCounter = $data['total'];

    $result=mysqli_query($con,"SELECT MAX(Price) as total from products WHERE Brand = '". $ID . "'");
    $data=mysqli_fetch_array($result);
    $topPrice = $data['total'];

    $result=mysqli_query($con,"SELECT count(Gender) as total from products WHERE Brand = '". $ID . "' AND Gender = 'U'");
    $data=mysqli_fetch_array($result);
    if($data['total'] >= 1) {
        $male = 'true';
        $female = 'true';
    } else {
        $result=mysqli_query($con,"SELECT count(Gender) as total from products WHERE Brand = '". $ID . "' AND Gender = 'M'");
        $data=mysqli_fetch_array($result);
        $male = ($data['total'] >= 1 ? 'true' : 'false');

        $result=mysqli_query($con,"SELECT count(Gender) as total from products WHERE Brand = '". $ID . "' AND Gender = 'F'");
        $data=mysqli_fetch_array($result);
        $female = ($data['total'] >= 1 ? 'true' : 'false');
    }

    $colourStrings = getUniqueColumnValues("Select * from products where brand = '". $ID . "'", 'Colour');
    $categoryStrings = getUniqueColumnValues("Select * from products where brand = '". $ID . "'", 'Category');

}

echoRefineByPriceScript($topPrice);

?>



<style type="text/css">
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

</style>



</head>




<?
	//initialise now date variable
	$nowdate = date('Y-m-d');

	//initialise the brand ID variable
	$brandID = substr($ID , 0, 3);

	//VIEW COUNTER - check to see if a view today exists, if it does add 1 to count, if it doesn't then add record
	$result = mysqli_query($con,"SELECT COUNT(*) FROM pageviews WHERE PageName = '$ID' AND Date = '$nowdate'");
	$row = mysqli_fetch_array($result);
	$total = $row[0];
	if ($total > 0) {
		//if result exists, increment count
		mysqli_query($con,"UPDATE pageviews SET Count = Count + 1 WHERE PageName = '$ID' AND Date = '$nowdate'");
	} else {
		//if result doesn't exist yet today add it
		mysqli_query($con,"INSERT INTO pageviews (PageName, BrandUsername, Date, Count) VALUES ('$ID', '$brandID', '$nowdate', 1)");
	}

	$result = mysqli_query($con,"SELECT * FROM brands WHERE ID = '". $ID . "'");
	while($row = mysqli_fetch_array($result))
	{
		$background = $row['background_URL'];
		break;
	}

	mysqli_close($con);
?>

<body text="#000000" style="background:#ffffff url('../../<?echo $background;?>') fixed top center; height:<!--PAGEHEIGHTVAL1-->px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3); background-size: cover;">
<!--Master Page Body Start-->

<?php
echoFooter(2, '<!--PAGEHEIGHTVAL-->');
echoFacebookScript();
echoHeader(2, '<!--PAGEHEIGHTVAL1-->');
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();
?>


<img src="../../images/navbar.png" border="0" width="1000" height="40" id="qs_1" alt="Navigation Bar" style="position:absolute;left:0px;top:80px;">
<!--NAVBAR-->













<img src="../../images/grey_bar.png" border="0" width="784" height="43" id="qs_288" alt="" style="position:absolute;left:208px;top:342px; " >
<div id="txt_225" style="position:absolute;left:229px;top:349px;width:82px;height:36px;overflow:hidden; " >
<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Sort by:</span></h1>
</div>


<form id="refineForm" name="refineForm" action="index.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:0px;top:0px;width:1035px;" >
<?php

	// Create connection
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
	
	// Check connection
	if (mysqli_connect_errno($con))
	{
	  echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
	}
	else
	{
		$result = mysqli_query($con,"SELECT * FROM brands WHERE ID = '". $ID . "'");
		while($row = mysqli_fetch_array($result))
		{
			$brandName = stripslashes($row['Brand_name']);
			$pageTitle = $brandName;
			$logo = $row['logo_URL'];
			$banner = $row['banner_URL'];
			$facebook = $row['Facebook_URL'];
			$twitter = $row['Twitter_URL'];
			$desc = stripslashes($row['Description']);
		}
	}

    if($_POST['Sort'] == '') $_POST['Sort'] = 'Asc';
    echoSortByComboBox(2, $_POST['Sort']);

	
	
	

	
	
	
	echo '
		<div style="position:absolute;left:20px;top:396px;width:169px; overflow:hidden; ">
	';
	
	echo '
		<div>
			<h1 class="Heading-1-P" style="margin-top:0px"><span class="Heading-1-C-C9">' . $brandName . '</span></h1>
		</div>
		<br/>
		<div style="margin-left:6px" >
			<p class="Wp-Body-P"><span class="Body-C">' . $desc . '</span></p>
		</div>
	';


	if ($male == 'true' && $female == 'true') {
		echoRefineByHeader(1, "Refine by Gender");
		echoRefineByCheckboxes(1, array("Male", "Female"), "true");
	}

	echoRefineByHeader(2, "Refine by Type");
	echoRefineByCheckboxes(2, $categoryStrings, "true");

	echoRefineByHeader(3, "Refine by Price");
	echoRefineByPrice(3);

	echoRefineByHeader(4, "Refine by Colour");
	echoRefineByCheckboxes(4, $colourStrings, "true");

	echo '
		</div>	
	';
	
	
?>


<?
	
	
	// Create connection
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
	
	// Check connection
	if (mysqli_connect_errno($con))
	{
	  echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
	}
	else
	{
		$result = mysqli_query($con,"SELECT * FROM brands WHERE ID = '". $ID . "'");
		while($row = mysqli_fetch_array($result))
		{
			$brandName = stripslashes($row['Brand_name']);
			$pageTitle = $brandName;
			$logo = $row['logo_URL'];
			$banner = $row['banner_URL'];
			$facebook = $row['Facebook_URL'];
			$twitter = $row['Twitter_URL'];
			$desc = stripslashes($row['Description']);
		}
		
		
		echo '
			<img src="../../' . $banner . '" border="1" width="981" height="189" id="pic_57" alt="" style="position:absolute;left:8px;top:140px; " >
			<a href=""><img src="../../' . $logo . '" border="1" width="180" height="188" id="pic_69" alt="" style="position:absolute;left:15px;top:194px; " ></a>
		';
			
			
		if(str_replace(" ", "", $facebook)!= '')
		{
			echo '
				<img src="../../images/facebook.png" border="0" width="59" height="47" id="pic_100" alt="" usemap="#map2" style="position:absolute;left:200px;top:283px; " >
			';
		}
		
		if(str_replace(" ", "", $twitter)!= '')
		{
			echo '
				<img src="../../images/twitter.png" border="0" width="59" height="47" id="pic_101" alt="" usemap="#map3" style="position:absolute;left:247px;top:283px; " >
			';
		}
		
		if(str_replace(" ", "", $facebook)!= '')
		{
			echo '
				<map id="map0" name="map2">
    				<area shape="poly" coords="40,39,46,33,46,13,41,7,40,6,16,6,10,12,10,34,16,40,40,40" href="' . $facebook . '" target="_blank" alt="" >
				</map>
			';
		}
		
		if(str_replace(" ", "", $twitter)!= '')
		{
			echo '
				<map id="map1" name="map3">
			    	<area shape="poly" coords="41,39,45,34,46,23,45,12,41,6,14,6,10,12,9,23,10,34,15,40,41,40" href="' . $twitter . '" target="_blank" alt="" >
				</map>
			';
		}

		$sqlStr = '';
		$genderSqlStr   = constructGenderSqlString();
		$categorySqlStr = constructGenericSqlString($categoryCounter, $categoryStrings, "Category");
		$priceSqlStr    = constructPriceSqlString();
		$colourSqlStr   = constructGenericSqlString($colourCounter, $colourStrings, "Colour");
		$sqlStr .= $genderSqlStr . $categorySqlStr . $priceSqlStr . $colourSqlStr . " AND Brand = '". $ID . "'";

		if ($categorySqlStr == '') {
			disableCheckboxes('Category', $sqlStr, $con, 2);
		}
		if ($colourSqlStr == '') {
			disableCheckboxes('Colour', $sqlStr, $con, 4);
		}
		if ($genderSqlStr == '') {
			disableCheckboxes('Gender', $sqlStr, $con, 1);
		}
		
		if($_POST['Sort'] == 'Default' || $_POST['Sort'] == '')
		{
		}
		else if($_POST['Sort'] == 'Asc')
		{
			$sqlStr .= " ORDER BY Item_name";
		}
		else if($_POST['Sort'] == 'desc')
		{
			$sqlStr .= " ORDER BY Item_name DESC";
		}
		else if($_POST['Sort'] == 'Price asc')
		{
			$sqlStr .= " ORDER BY Price";
		}
		else if($_POST['Sort'] == 'Price desc')
		{
			$sqlStr .= " ORDER BY Price DESC";
		}
		else if($_POST['Sort'] == 'Newest')
		{
			$sqlStr .= " ORDER BY Date_added DESC";
		}
		else if($_POST['Sort'] == 'Popularity')
		{
			$sqlStr .= " ORDER BY Quantity_sold DESC";
		}
		

		
		
		
		$r = 0;
		$c = 0;
		
		$maxColumns = 4;
		$maxRows = 10;
		$maxItems = $maxColumns * $maxRows;
		
		$totalItems = 0;
		$result = mysqli_query($con,"SELECT DISTINCT Item_number FROM products WHERE Brand = '". $ID . "'" . $sqlStr);
		while($row = mysqli_fetch_array($result))
		{
			$totalItems++;
		}
		
		$totalPages = ceil($totalItems/$maxItems);
		
		
		$w = 198;
		$h = 331;
		
		$x = 208;
		$y = 397;
		$y2 = 640;
		$y3 = 664;
		$y4 = 688;
		
		
		$i = 0;
		
		if($_POST['page'] == '')
		{
			$page = 1;
		}
		else
		{
			$page = intval($_POST['page']);
		}
		
		$offset = ($page-1)*$maxItems;
		$limit = $maxItems;
		$result = mysqli_query($con,"SELECT * FROM (SELECT DISTINCT Item_number FROM products WHERE Brand = '". $ID . "'" . $sqlStr . ") AS tmp_table  LIMIT ".$offset.", " .$limit);
		while($row = mysqli_fetch_array($result))
		{
			$itemno = $row['Item_number'];

			$res = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $itemno . "'");
			while($row = mysqli_fetch_array($res))
			{
				$prevno[$i] = $itemno;
				$i++;
				
				$img = $row['Image_URL1'];
				$itemno = strtolower($row['Item_number']);
				$itemname = stripslashes($row['Item_name']);
				$price = $row['Price'];
				
				$go = 'yes';
				for($j = 0; $j < $i; $j++)
				{
					if($prevno[$j] == $itemno) $go = 'no';
				}
				
				if($go == 'yes')
				{
					if($c == $maxColumns)
					{
						$c = 0;
						$r++;
					}
					$a = $x + ($c * $w);
					$b = $y + ($r * $h);

					echo '<img src="../../' . $img . '" border="0" width="187" height="233" alt="" style="border-style:solid;border-width:1px;position:absolute;left:' . $a . 'px;top:' . $b . 'px; " >';
					
					
					echo '<a href="' . $itemno . '.php" >
						  <img src="../../images/QS.png" border="0" width="189" height="235" title="" alt="' . $itemname . '" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px; " class="fader_img"></a>';
					
					$b = $y2 + ($r * $h);
					echo '<div id="txt_28" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px;width:189px;height:24px;overflow:hidden; " >
						  <h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C-C0">' . $brandName . '</span></h3>
						  </div>';
					
					$b = $y3 + ($r * $h);
					echo '<div id="txt_320" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px;width:189px;height:24px;overflow:hidden; " >
							<h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C-C1">' . $itemname . '</span></h3>
							</div>';
					
					$b = $y4 + ($r * $h);
					echo '<div id="txt_29" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px;width:189px;height:24px;overflow:hidden; " >
							<h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C">' . '&pound' . $price . '</span></h3>
							</div>';
					$c++;
				}
			}
		}
		$b = $y4 + ($r * $h);
		$b = $b + 40;
		
		$leftval = 940 - ($totalPages*24);
		echo '
		<div style="position:absolute;left:'.$leftval.'px;top:' . $b . 'px;overflow:hidden; " >
		<h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C-C1">Page:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		';
						
		for ($j = 1; $j <= $totalPages; $j++)
		{
			if($page == $j)
			{
				echo '<button class="button large blue" style="color:white" name="page" type="submit" value="'.$j.'">'.$j.'</button>';
			}
			else
			{
				echo '<button class="button large" name="page" type="submit" value="'.$j.'">'.$j.'</button>';
			}
		}
		
		echo '</span></h3> 	</div></form>
		';
	}

	mysqli_close($con);
	
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

$navBar = '<div class="nav_348style" id="nav_348" style="left: 20px; top: 91px;; width: 960px; height: 26px; position: absolute;"><a id="nav_348_I0" href="../../index.php" target="_self"> Home </a> &gt; <a id="nav_348_I1" href="../..//brands" target="_self"> Brands </a> &gt; <a id="nav_348_I2" href="'.$brandPageURL.'" target="_self"> '.$brandName.' </a></div>';

$minHeight = 1650;
$ph = $b + 50;
if($ph < $minHeight) $ph = $minHeight;
$pageHeight = $ph ;
$pageHeightVal1 = $ph  + 222;
$pageHeightVal2 = $ph  + 14;
$pageHeightVal3 = $ph  + 50;
$pageHeightVal4 = $ph  + 162;
$pageHeightVal5 = $ph  + 183;
$pageHeightVal6 = $ph  + 115;

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
$pageTitle = $pageTitle . ' | Shop ';
for ($j = 0; $j < $categoryCounter; $j++)
{
   if($j != $categoryCounter - 1) $pageTitle = $pageTitle . $categoryStrings[$j] . ', ';
   if($j == $categoryCounter - 1) $pageTitle = $pageTitle . $categoryStrings[$j];
}
$pageTitle = $pageTitle . ' | ZOOQIE';

$array1 = array("<!--TITLE-->", '<!--NAVBAR-->', '<!--PAGEHEIGHT-->', '<!--PAGEHEIGHTVAL1-->', '<!--PAGEHEIGHTVAL2-->', '<!--PAGEHEIGHTVAL3-->', '<!--PAGEHEIGHTVAL4-->', '<!--PAGEHEIGHTVAL5-->', '<!--PAGEHEIGHTVAL6-->', '<!--DESCRIPTION-->');//Values to replace 
$array2 = array($pageTitle, $navBar, $pageHeight, $pageHeightVal1, $pageHeightVal2, $pageHeightVal3, $pageHeightVal4, $pageHeightVal5, $pageHeightVal6, $desc);  //Replacements.

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>