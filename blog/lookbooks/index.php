<?
ob_start (); // Buffer output
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Looking Fresh Lookbooks | Our Lookbooks for each month | Zooqie </title>
<meta name="viewport" content="width=450">
<meta name="description" content="A lookbook showcasing some of zooqie&#39;s favourite picks of the month. Click images to find in store.">
<meta name="robots" content="index,follow">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="css/styles.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.js"></script>


<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->

<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">

    <?php
    //Include database settings
    if(file_exists("db_settings.php")) {include("db_settings.php");}
    else if(file_exists("../db_settings.php")) {
        include("../db_settings.php");}
    else if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}

    //Include utilities
    if(file_exists("utils.php")) {include("utils.php");}
    else if(file_exists("../utils.php")) {
        include("../utils.php");}
    else if(file_exists("../../utils.php")) {include("../../utils.php");}
    ?>




<style type="text/css">
body{margin:0;padding:0;}
.wpfixed{position:absolute;}
div > .wpfixed{position:fixed;}
.Heading-1-C
{
    font-family:"Harabara", serif; color:#656565; font-size:27px; line-height:1.48em;
}
.Heading-1-C-C0
{
    font-family:"Harabara", serif; color:#656565; font-size:15px; line-height:1.47em;
}

#nav-bar {  min-height: 80px; background: #fff; }        /* Top bar height and colour */
#nav > li:hover > a { border-top: 3px solid #E52B50; }    /* Navigation bar top border hover state colour */
.button.amaranth { background-color: #E52B50; }           /* Button colour throughout site */
</style>


<script type="text/javascript">


</script>
</head>

<script type="text/javascript">
	$('.imgwrap').hover(
    function() { $('img', this).fadeIn(); },
    function() { $('img', this).fadeOut(); }
);
</script>

<body text="#000000" style="background:#ffffff url('images/backgrounds/grey.png') repeat fixed top center; height:<!--PAGEHEIGHT-->px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3);">
<!--Master Page Body Start-->

<?php
echoFacebookScript();
echoHeader(1, 1000, '<!--PAGEHEIGHTVAL1-->');
echoFooter(1, '<!--PAGEHEIGHTVAL-->');
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();
echoNavBar(1, array('Home', 'Lookbooks'), array('../index.php', '../lookbooks'));
?>






<div id="txt_2" style="position:absolute;left:20px;top:138px;width:408px;height:70px;overflow:hidden;">
	<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Looking Fresh Lookbooks</span></h1>
</div>

<div style="position:absolute;top:180px;width:450px;" align="center">
<?
	// Create connection
if(file_exists("db_settings.php")) {include("db_settings.php");}
if(file_exists("../db_settings.php")) {
    include("../db_settings.php");}
if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
if(file_exists("db_settings.php")) {include("db_settings.php");}
	$con=mysqli_connect("cust-mysql-123-16",$db_user,$db_pass,$db_user);

	// Check connection
	if (mysqli_connect_errno($con))
	{
	  echo 'Failed to connect to products database, please try again later.';
	}
	else
	{		
		$y = 200;
		
		$result = mysqli_query($con,"SELECT * FROM lookbooks ORDER BY ID Desc ");
		while($row = mysqli_fetch_array($result))
		{	
			$ID = $row['ID'];
			$name = $row['Name'];
			$values = $row['Values'];
			$images = explode(",", $values);
			$noimgs = count($images)/2;
			
			for ($i = 0; $i < 1; $i++)
			{
				$tmp = $i * 2;
				$tmp2 = ($i * 2) + 1;
				
				$result2 = mysqli_query($con,"SELECT * FROM products WHERE Item_number ='" . strtoupper($images[$tmp]) ."' LIMIT 1 ");
				while($row2 = mysqli_fetch_array($result2))
				{	
					if($images[$tmp2] == 1) $imageloc = '' . $row2['Image_URL1'];
					if($images[$tmp2] == 2) $imageloc = '' . $row2['Image_URL2'];
					if($images[$tmp2] == 3) $imageloc = '' . $row2['Image_URL3'];
					if($images[$tmp2] == 4) $imageloc = '' . $row2['Image_URL4'];
					if($images[$tmp2] == 5) $imageloc = '' . $row2['Image_URL5'];
					
					$imagedetails = getimagesize("'".$imageloc);
					$width = $imagedetails[0];
					$height = $imagedetails[1];
					
					$scalar = $width / 407;
					$h = $height / $scalar;
					
					$y += $h;
					$y += 21;
					$y += 22;
					$y += 19;
					
					$y += 10; //This one was arbitarily added :/
					
					$itemname = $row2['Item_name'];
					echo '
						<h1 class="Wp-Heading-1-P" style="margin-left:5%"><span class="Heading-1-C-C0">Looking Fresh - '.$name.'</span></h1>
						
						<div class="imgwrap"><a href="blog/lookbooks/fresh'.$ID.'.php"><img src="'.$imageloc.'" border="1" style="margin-bottom:21px;border-style:solid; border-color:#000000" width="90%" alt="'.$itemname.' image"></a></div>
					';
					
				}
			}
		}
	}
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
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

$array1 = array('<!--PAGEHEIGHT-->');//Values to replace 
$array2 = array($y);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>