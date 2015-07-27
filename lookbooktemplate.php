<?
ob_start (); // Buffer output
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Looking Fresh | Lookbook of this months favourites | ZOOQIE</title>
<meta name="viewport" content="width=450">
<meta name="description" content="A lookbook showcasing some of Zooqie&#39;s favourite picks of the month. Click images to find in store.">
<meta name="robots" content="index,follow">
<link rel="icon" href="../../favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">

<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../../css/styles.css">
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/superfish.js"></script>
<script type="text/javascript" src="../../js/jquery.prettyphoto.js" charset="utf-8"></script>
<!--[if lt IE 9]><script src="../../js/html5.js"></script><![endif]-->

<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">

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

#nav-bar {  min-height: 90px; background: #fff; }        /* Top bar height and colour */
#nav > li:hover > a { border-top: 3px solid #E52B50; }    /* Navigation bar top border hover state colour */
.button.amaranth { background-color: #E52B50; }           /* Button colour throughout site */
</style>
<script type="text/javascript" src="../../js/jspngfix.js"></script>
<link rel="stylesheet" href="../../css/wpstyles.css" type="text/css"><script type="text/javascript">
var blankSrc = "../../js/blank.gif";
</script>
<script type="text/javascript" src="../../js/jsRollover.js"></script>
<script type="text/javascript">


</script>
</head>

<script type="text/javascript">
	$('.imgwrap').hover(
    function() { $('img', this).fadeIn(); },
    function() { $('img', this).fadeOut(); }
);
</script>

<body text="#000000" style="background:#ffffff url('../../images/backgrounds/grey.png') repeat fixed top center; height:<!--PAGEHEIGHT-->px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3);">
<!--Master Page Body Start-->

<?php
echoFacebookScript();
echoHeader(2, 450, '<!--PAGEHEIGHTVAL1-->');
echoFooter(2, '<!--PAGEHEIGHTVAL-->');
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();
?>

<img src="../../images/navbar.png" border="0" width="450" height="40" id="qs_1" title="" alt="Navigation Bar" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:90px;">
<!--NAVBAR-->

<?

    // Create connection
    $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

    $pageName = curPageName();
    $ID = substr($pageName, 5);

    $result = mysqli_query($con,"SELECT * FROM lookbooks WHERE ID =".intval($ID).";");
    while($row = mysqli_fetch_array($result))
    {
        $ID = $row['ID'];
        $name = $row['Name'];
        $values = $row['Values'];
        $images = explode(",", $values);
        $noimgs = count($images)/2;
    }
?>

<div id="txt_2" style="position:absolute;left:20px;top:138px;width:408px;height:70px;overflow:hidden;">
	<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Looking Fresh -<wbr> <?echo $name?></span></h1>
</div>
<div id="txt_231" style="position:absolute;left:20px;top:194px;width:410px;height:48px;overflow:hidden;">
	<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C-C0">Showcasing some of Zooqie's favourite picks of the month. Click image to find in
    store.</span></h1>
</div>

<div style="position:absolute;top:250px;width:450px;" align="center">
<?

	
	// Check connection
	if (mysqli_connect_errno($con))
	{
	  echo 'Failed to connect to products database, please try again later.';
	}
	else
	{
		$y = 250;
		for ($i = 0; $i < $noimgs; $i++)
		{
			$tmp = $i * 2;
			$tmp2 = ($i * 2) + 1;

			
			$result2 = mysqli_query($con,"SELECT * FROM products WHERE Item_number ='" . strtoupper($images[$tmp]) ."' LIMIT 1 ");
			while($row2 = mysqli_fetch_array($result2))
			{	
				if($images[$tmp2] == 1) $imageloc = '../../' . $row2['Image_URL1'];
				if($images[$tmp2] == 2) $imageloc = '../../' . $row2['Image_URL2'];
				if($images[$tmp2] == 3) $imageloc = '../../' . $row2['Image_URL3'];
				if($images[$tmp2] == 4) $imageloc = '../../' . $row2['Image_URL4'];
				if($images[$tmp2] == 5) $imageloc = '../../' . $row2['Image_URL5'];
				
				$imagedetails = getimagesize($imageloc);
				$width = $imagedetails[0];
				$height = $imagedetails[1];
				
				$scalar = $width / 407;
				$h = $height / $scalar;
				
				$y += $h;
				$y += 21;
				
				$itemname = $row2['Item_name'];
				echo '
					<div class="imgwrap"><a href="'.strtolower($images[$tmp]).'.php" target="_blank"><img src="'.$imageloc.'" border="1" style="margin-bottom:21px;border-style:solid; border-color:#000000" width="90%" alt="'.$itemname.' image"></a></div>
				';
				
			}
		}
	}
$y += 400;
?>
<div style="width:90%;background:#3B5998;padding-top:1px;padding-bottom:1px;border-radius:5px 5px 0 0">
<h2 class="Heading-1-C-C0" style="color:white;margin-left:27px;margin-top:5px;font-size:22px;text-align:left;">Comments</h2>
<h3 class="Heading-1-C-C0" style="color:white;margin-left:29px;margin-top:-15px;margin-bottom:5px;text-align:left;">Via Facebook</h3>
</div>
<div class="fb-comments" data-href="<?$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo $actual_link;?>" data-colorscheme="light" data-width="407"></div>
</div>










<!--Master Page End-->
<div id="nav-bar"></div>
</div>
<script type="text/javascript" src="../../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../../js/totop.min.js"></script>
<script type="text/javascript" src="../../js/custom.js"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto({ theme:'facebook', allow_resize: false });
  });
</script>
<!--Page Body End-->

<!--Fullsize Background Image-->
<script src="../../js/jquery.backstretch.js"></script>
<script>
    jQuery.backstretch("../../images/backgrounds/sbackground3.jpg");
</script>
<!--Fullsize Background Image End-->
</body>
</html>


<?
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

$navBar = '<div class="nav_348style" id="nav_348" style="left: 20px; top: 101px; width: 960px; height: 26px; position: absolute;"><a id="nav_348_I0" href="../../index.php" target="_self"> Home </a> &gt; <a id="nav_348_I1" href="../../blog/" target="_self"> Blog </a> &gt; <a id="nav_348_I2" href="../../blog/lookbooks/" target="_self"> Lookbooks </a> &gt; <a class=" currentpage" id="nav_348_I3" href="../../blog/lookbooks/fresh'.$ID.'.php" target="_self"> '.$name.' </a></div>';


$array1 = array('<!--PAGEHEIGHT-->', '<!--NAVBAR-->');//Values to replace 
$array2 = array($y,$navBar);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>