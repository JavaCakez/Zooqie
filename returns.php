<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Returns | Information on the Zooqie returns policy | ZOOQIE</title>
<meta name="viewport" content="width=1000">
<meta name="description" content="Full returns information for Zooqie. Information on returning orders, and opening disuputes with a brand.">
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






<script src="js/jquery.watermarkinput.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $('.accordion h2').click(function(){
      if( $(this).next().is(':hidden') )
      {
      $('.accordion h2').removeClass('active').next().slideUp();
      $(this).addClass('active').next().slideDown();
      }
      else
      {
      $('.accordion h2').removeClass('active').next().slideUp();
      }
      return false;
   });
  });
</script>

<style type="text/css">
.accordion { width: 430px;}       /* Accordion Width */
.accordion div { height: 200px;}  /* Section Height - Change this if you want to add more text to a section */
</style>
<!--Header code for HTML frag_55 -->
<style type="text/css">
.Table-Body-C
{
    font-family:"Arial", sans-serif; font-weight:700; font-size:16px; line-height:1.25em;
}
.Table-Body-C-C0
{
    font-family:"Arial", sans-serif; font-size:16px; line-height:1.19em;
}

</style>
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

#nav-bar {  min-height: 90px; background: #fff; }        /* Top bar height and colour */
#nav > li:hover > a { border-top: 3px solid #E52B50; }    /* Navigation bar top border hover state colour */
.button.amaranth { background-color: #E52B50; }           /* Button colour throughout site */


</style>
<script type="text/javascript" src="js/jspngfix.js"></script>
<link rel="stylesheet" href="css/wpstyles.css" type="text/css">
<script type="text/javascript">var blankSrc = "js/blank.gif";
</script>
<script type="text/javascript" src="js/jsRollover.js"></script>
<script type="text/javascript">


</script>
</head>

<?
$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
// Check connection
if (mysqli_connect_errno($con))
{
    //echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
}
else
{
    $result=mysqli_query($con,"SELECT count(*) as total from brands WHERE Live = '1'");
    $data=mysqli_fetch_array($result);
    $brandCounter = $data['total'];
}

//height of page excluding footer
$pageHeight = 270 + (53*$brandCounter);
// 222 is footer height
$tmpHeight = $pageHeight + 222;
?>

<body text="#000000" style="background:#ffffff url('images/backgrounds/grey.png') repeat fixed top center; height:<?echo $tmpHeight;?>px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3);">
<!--Master Page Body Start-->

<?php
echoFacebookScript();
echoHeader(0, 1000, $tmpHeight);
echoFooter(0, $pageHeight);
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();
echoNavBar(0, array('Home', 'Returns'), array('index.php', 'returns.php'));
?>






<div id="txt_2" style="position:absolute;left:20px;top:155px;width:428px;height:52px;overflow:hidden;">
<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Returns and Disputes</span></h1>
</div>
<div id="frag_15" style="position:absolute;left:20px;top:207px;width:428px;height:229px;">
    <div class="accordion">
    
    <!--Section 01 Start-->
    			<section id="one">
    				<h2><a href="#one">1. Returns</a></h2>
    				<div>
    					<p>
    						If you wish to return an item for any reason, please get in contact with brands directly via email. Contact details for all brands can be found in the table on the right.<br/><br/>
    The brand will then liaise with you and do their best to complete the return of the item, or a swap for a new one.<br/><br/>
    If your return is not completed or you are still not satisfied, feel free to open a dispute with the brand <a href="https://www.paypal.com/uk/webapps/mpp/first-dispute" target="_blank">via PayPal.</a> See 2. Disputes for more details.
    					</p>
    				</div>
    			</section>
    <!--Section 01 End-->
    
    <!--Section 02 Start-->
    			<section id="two">
    				<h2><a href="#two">2. Disputes</a></h2>
    				<div>
    					<p>
    					If for any reason you have a dispute with a seller you can resolve it <a href="https://www.paypal.com/uk/webapps/mpp/first-dispute" target="_blank">via PayPal.</a><br/><br/>
    A dispute might be for example the brand not sending you an item of clothing which you have purchased, or the brand being uncooperative in a return.<br/><br/>
    PayPal will then be the mediator of the dispute between you and the seller and your problems will be resolved through them.
    					</p>
    				</div>
    			</section>
    <!--Section 02 End-->
    
    		</div>
</div>
<div id="txt_392" style="position:absolute;left:500px;top:155px;width:428px;height:52px;overflow:hidden;">
<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Brand Contact Details</span></h1>
</div>
<!--Body-->
    
<!--Body-->
<table id="table_3" cellspacing="0" cellpadding="0" style=" border-collapse: collapse; position:absolute; left:500px; top:208px; width:480px; height:100px; " >

    <col style="width:240px;">
    <col style="width:239px;">
    <tr style="height:50px;" id="table_3_R01">
        <td id="table_3_R01C01" style="vertical-align:middle; padding:1px; background-color:#efefef; " >
            
            <p class="Wp-Table-Body-P"><span class="Table-Body-C">Brand</span></p>
            
        </td>
        <td id="table_3_R01C02" style="vertical-align:middle; padding:1px; background-color:#efefef; " >
            
            <p class="Wp-Table-Body-P"><span class="Table-Body-C">Email</span></p>
            
        </td>
    </tr>
	<?php
	// Create connection
    if(file_exists("db_settings.php")) {include("db_settings.php");}
    if(file_exists("../db_settings.php")) {include("../db_settings.php");}
    if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
    if(file_exists("db_settings.php")) {include("db_settings.php");}
	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
	
	// Check connection
	if (mysqli_connect_errno($con))
	{
	  echo '<div style="position:absolute;left:508px;top:0px;"> Failed to connect to products database, please try again later.  </div>';
	}
	else
	{
		$result = mysqli_query($con,"SELECT * FROM brands WHERE Live = '1' ORDER BY Brand_name");

		while($row = mysqli_fetch_array($result))
		{
			$name = $row['Brand_name'];
			$email = $row['Email'];
			if($email != '')
			{
				echo '
					<tr style="height:49px;">
				        <td style="vertical-align:middle; padding:1px; background-color:#fbfbfb; " >
				            
				            <p class="Wp-Table-Body-P"><span class="Table-Body-C-C0">'.$name.'</span></p>
				            
				        </td>
				        <td style="vertical-align:middle; padding:1px; background-color:#fbfbfb; " >
				            
				            <p class="Wp-Table-Body-P"><span class="Table-Body-C-C0">'.$email.'</span></p>
				            
				        </td>
				    </tr>
				';
			}
		}
	}
	?>
</table>
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

