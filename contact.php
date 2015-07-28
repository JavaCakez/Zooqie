<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Contact | Get in contact with us | Zooqie</title>
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
<script type="text/javascript" src="js/jquery.jigowatt.js"></script>
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
$pageHeight = 758;
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
echoNavBar(0, array('Home', 'Contact Us'), array('index.php', 'contact.php'));
?>










<div id="frag_36" style="position:absolute;left:20px;top:275px;width:550px;height:449px;">
    <div id="contact">
    
    			<div id="message"></div>
    
    			<form method="post" action="contactScript.php" name="contactform" id="contactform">
    
    			<fieldset>
    
    			<label for="name" accesskey="U"><span class="required">*</span> Your Name</label>
    			<input name="name" type="text" id="name" size="30" value="" />
    
    			<br />
    			<label for="email" accesskey="E"><span class="required">*</span> Email</label>
    			<input name="email" type="text" id="email" size="30" value="" />
    
    			<br />
    			<label for="phone" accesskey="P"><span class="required">*</span> Phone</label>
    			<input name="phone" type="text" id="phone" size="30" value="" />
    
    			<br />
    			<label for="subject" accesskey="S">Subject</label>
    			<select name="subject" id="subject">
    			  <option value="Support">Support</option>
    			  <option value="a Sale">Sales</option>
    			  <option value="dispatch">Dispatch</option>
    			</select>
    
    			<br />
    			<label for="comments" accesskey="C"><span class="required">*</span> Your comments</label>
    			<textarea name="comments" cols="40" rows="3" id="comments" style="width: 350px;"></textarea>
    
    			<p><span class="required">*</span> Are you human?</p>
    
    			<label for="verify" accesskey="V">&nbsp;&nbsp;&nbsp;3 + 1 =</label>
    			<input name="verify" type="text" id="verify" size="4" value="" style="width: 30px;" /><br /><br />
    
    			<input type="submit" class="submit" id="submit" value="Submit" />
    
    			</fieldset>
    
    			</form>
    
    	</div>
</div>
<div id="txt_2" style="position:absolute;left:20px;top:155px;width:220px;height:52px;overflow:hidden;">
<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Contact Us</span></h1>
</div>
<div id="txt_12" style="position:absolute;left:20px;top:219px;width:480px;height:88px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C">Got a question or just want to leave us a comment?</span></p>
<p class="Wp-Body-P"><span class="Body-C">Drop us a line via email any time and we’ll reply as soon as we can.</span></p>
</div>
<div id="txt_60" style="position:absolute;left:633px;top:364px;width:330px;height:127px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C">Customer Email: info@zooqie.com</span></p>
<p class="Wp-Body-P"><span class="Body-C">Brands Email: brands@zooqie.com</span></p>
<p class="Wp-Body-P"><span class="Body-C">Tel (Exeter): 07885489062</span></p>
<p class="Wp-Body-P"><span class="Body-C">Tel (London): 07786808064</span></p>
</div>
<div id="txt_65" style="position:absolute;left:633px;top:304px;width:330px;height:30px;overflow:hidden;">
<h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Contact Details:</span></h2>
</div>
<img src="images/line.png" border="0" width="330" height="1" id="pcrv_5" alt="" onload="OnLoadPngFix()" style="position:absolute;left:633px;top:284px;">
<img src="images/line.png" border="0" width="330" height="1" id="pcrv_6" alt="" onload="OnLoadPngFix()" style="position:absolute;left:633px;top:347px;">
<img src="images/line.png" border="0" width="330" height="1" id="pcrv_9" alt="" onload="OnLoadPngFix()" style="position:absolute;left:633px;top:495px;">
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

