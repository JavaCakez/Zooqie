<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Privacy Policy &amp; Cookies | Privacy information for Zooqie customers | ZOOQIE</title>
<meta name="viewport" content="width=1000">
<meta name="description" content="Zooqie is totally committed to protecting the privacy of our site visitors and customers.">
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
$pageHeight = 879;
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
echoNavBar(0, array('Home', 'Privacy'), array('index.php', 'privacy.php'));
?>








<div id="txt_2" style="position:absolute;left:20px;top:155px;width:960px;height:52px;overflow:hidden;">
<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Privacy Policy &amp; Cookies</span></h1>
</div>
<div id="frag_15" style="position:absolute;left:20px;top:220px;width:960px;height:407px;">
    <div class="accordion">
    
    <!--Section 01 Start-->
    			<section id="one">
    				<h2><a href="#one">1. Your Privacy</a></h2>
    				<div>
    					<p>
                            Zooqie is totally committed to protecting the privacy of our site visitors and customers. The Zooqie team members are customers themselves of other Internet sites and fully appreciate and respect the importance of privacy on the Internet. We will not disclose information about our customers to third parties except where it is part of providing a service to you - e.g. arranging for a product to be sent to you, carrying out credit and other security checks and for the purposes of customer research and profiling or where we have your express permission to do so.
    					</p></div>
    			</section>
    <!--Section 01 End-->
    
    <!--Section 02 Start-->
    			<section id="two">
    				<h2><a href="#two">2. Your Consent</a></h2>
    				<div>
    					<p>
    						We will not sell your name, address, e-mail address, credit card information or personal information to any third party without your permission, but we cannot be responsible or held liable for the actions of third party sites from which you may have linked or been directed to the Zooqie website.
    					</p>
    				</div>
    			</section>
    <!--Section 02 End-->
    
    <!--Section 03 Start-->
    			<section id="three">
    				<h2><a href="#three">3. Cookies</a></h2>
    				<div>
    					<p>
    					A cookie is a small information file that is sent to your computer, mobile or other device when you visit a website and it will recognise your device on future visits. These types of files do a number of different jobs such as remembering your preferences and chosen items, assisting you to improve your site experience as well as trying to ensure that the adverts or offers you see online are more relevant to you. These “cookies” can be divided into 4 types each of which is outlined below.
    					</p>
    				</div>
    			</section>
    			
    			<section id="threea">
    				<h2><a href="#threea">3a. Category 1: Strictly Necessary Cookies</a></h2>
    				<div>
    					<p>
    						These cookies are essential in order to enable the site to provide services you have asked for such as remembering your shopping bag items.
    					</p>
    				</div>
    			</section>
    			
    			<section id="threea">
    				<h2><a href="#threea">3b. Category 2: Performance Cookies</a></h2>
    				<div>
    					<p>
    						This type collect anonymous information on how people use the site and the data is merged with other users to enable us to improve how the site operates. For example we utilise Google Analytics cookies to help us understand how customers arrive at our site, browse or use our site and highlight areas where we can improve areas such as navigation, shopping experience and marketing campaigns. The data stored by these cookies never shows personal details from which your individual identity can be established.
    					</p>
    				</div>
    			</section>
    			
    			<section id="threea">
    				<h2><a href="#threea">3c. Category 3: Functionality Cookies</a></h2>
    				<div>
    					<p>
    						These remember choices you make such as language, search parameters such as size, colour or product line. These can then be used to provide you with an experience more appropriate with your selections and make the visits more tailored and pleasant. The information is also merged with other users on an anonymous basis to enable us to improve how the site operates. 
    					</p>
    				</div>
    			</section>
    			
    			<section id="threea">
    				<h2><a href="#threea">3d. Category 4: Targeting Cookies or Advertising Cookies</a></h2>
    				<div>
    					<p>
    						These cookies collect information about your browsing habits in order to make advertising relevant to you and your interests. They remember the websites you have visited and that information is shared with other parties such as advertisers. 
    You can change the settings on your browser to prevent cookies being stored on your computer or mobile device without your explicit consent. Your browser “help” section will normally provide details on how to manage the cookie settings.
    					</p>
    				</div>
    			</section>
    			
    			
    <!--Section 03 End-->
    
    <!--Section 04 Start-->
    			<section id="four">
    				<h2><a href="#four">4. Third party sites</a></h2>
    				<div>
    					<p>
    						Our site may contain links to and from the websites of our partner networks, advertisers and other third parties. If you follow a link to any of these websites, please note that they have their own privacy policies and that we do not accept any responsibility or liability for these policies. Please check these policies before you submit any personal data to these websites.
    					</p>
    				</div>
    			</section>
    <!--Section 04 End-->
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

