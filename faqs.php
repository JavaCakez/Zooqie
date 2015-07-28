<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Frequently Asked Questions | ZOOQIE</title>
<meta name="viewport" content="width=1000">
<meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. Zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
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
      return false;
   });
  });
</script>

<style type="text/css">
.accordion { width: 960px;}       /* Accordion Width */
.accordion div { height: 200px;}  /* Section Height - Change this if you want to add more text to a section */
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

#nav-bar {  min-height: 80px; background: #fff; }        /* Top bar height and colour */
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
//height of page excluding footer
$pageHeight = 725;
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
echoNavBar(0, array('Home', 'FAQs'), array('index.php', 'faqs.php'));
?>







<div id="txt_2" style="position:absolute;left:20px;top:155px;width:960px;height:52px;overflow:hidden;">
<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Frequently Asked Questions</span></h1>
</div>
<div id="frag_15" style="position:absolute;left:20px;top:207px;width:960px;height:388px;">
    <div class="accordion">
    
    <!--Section 01 Start-->
    			<section id="one">
    				<h2><a href="#one">How do I find out the Delivery Information of my order?</a></h2>
    				<div>
    					<p> The Delivery Information will be unique to each independent brand. This information can be found in the 'Delivery' tab in the information box below any item of clothing.</p>
    				</div>
    			</section>
    <!--Section 01 End-->
    
    <!--Section 02 Start-->
    			<section id="two">
    				<h2><a href="#two">How can I return an item of clothing?</a></h2>
    				<div>
    					<p>Check out the <a href="returns.php">returns page</a>.</p>
    				</div>
    			</section>
    <!--Section 02 End-->
    
    <!--Section 03 Start-->
    			<section id="three">
    				<h2><a href="#three">How long will items of clothing remain out of stock?</a></h2>
    				<div>
    					<p> The length of time will depend on the independent clothing brand, however, keep tuned to our Facebook and Twitter pages and we'll try our best to keep you updated with when products come back in stock. Alternatively, get in contact with the brand direclty via their brand page.</p>
    				</div>
    			</section>
    <!--Section 03 End-->
    
    <!--Section 04 Start-->
    			<section id="four">
    				<h2><a href="#four">How often are new brands added to Zooqie?</a></h2>
    				<div>
    					<p>We aim to add new brands as often as possible. Check our <a>Facebook</a> and <a>Twitter</a> pages to keep updated on any news of new brands on Zooqie!</p>
    				</div>
    			</section>
    <!--Section 04 End-->
    
    <section id="five">
    				<h2><a href="#four">I haven't received my order.</a></h2>
    				<div>
    					<p>Brands are expected to dispatch orders within 10 worknig days of you placing the order. If you still have not receieved your item within this time, please check out our <a href="returns.php">disputes page.</a></p>
    				</div>
    			</section>
    
    
    <!--Section 05 Start-->
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

