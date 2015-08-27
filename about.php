<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>About Us | Who we are and what we&#39;re about | Zooqie</title>
<meta name="viewport" content="width=1000">
<meta name="description" content="We want to help independent brands get started and selling quickly, we want to help customers find all these brands under one roof and we want to share brands amongst customers and share customers amognst brands.">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.js"></script>

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





<style type="text/css">
.wpfixed{position:absolute;}
div > .wpfixed{position:fixed;}
a.hlink_1:link {color:#2c2c2c;}
a.hlink_1:visited {color:#2c2c2c;}
a.hlink_1:hover {color:#e52b50;}
a.hlink_1:active {color:#2c2c2c;}
.Heading-1-P
{
    margin:32px 0px 4px 0px; text-align:center; font-weight:400;
}
.Body-P
{
    margin:0px 0px 12px 0px; text-align:center; font-weight:400;
}
.Heading-2-C
{
    font-family: 'Lato', sans-serif; color:#656565; font-size:19px;
}
.Body-C
{
    font-family: 'Lato', sans-serif; color:#2c2c2c; font-size:14px;
}
.Heading-2-C-C0
{
    font-family: 'Lato', sans-serif; color:#656565; font-size:21px;
}

.Heading-1-C
{
    font-family:"Harabara", serif; font-weight:700; color:#1f1f1f; font-size:40px;
}
.Body-C-C0
{
    font-family: 'Lato', sans-serif;; font-size:18px;
}
.Body-C-C1
{
    font-family: 'Lato', sans-serif; font-weight:700; font-size:16px;
}
.Body-C-C2
{
    font-family: 'Lato', sans-serif; font-weight:700; font-size:15px;
}
.Body-C-C3
{
    font-family: 'Lato', sans-serif; color:#161616; font-size:16px;
}
.Body-C-C4
{
    font-family: 'Lato', sans-serif; color:#1f1f1f; font-size:21px;
}


</style>


</head>

<?
//height of page excluding footer
$pageHeight = 1645;
// 222 is footer height
$tmpHeight = $pageHeight + 222;
?>

<body text="#000000" style="background:#ffffff url('images/backgroundpattern.png') repeat fixed top center; height:<?echo $tmpHeight;?>px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3);">
<!--Master Page Body Start-->

<?php
echoFooter(0, $pageHeight);
echoFacebookScript();
echoHeader(0, $tmpHeight);
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();
echoNavBar(0, array('Home', 'About Us'), array('index.php', 'about.php'));
?>

















<img src="images/about_background.jpg" border="0" width="997" height="1505" id="pic_234" alt="" style="position:absolute;left:0px;top:129px;">
<img src="images/grey_box.png" border="0" width="600" height="999" id="qs_337" alt=""  style="position:absolute;left:200px;top:129px;">
<div id="txt_173" style="position:absolute;left:273px;top:260px;width:460px;height:173px;overflow:hidden;">
<h1 class="Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Sell</span></h1>
<p class="Body-P"><span class="Body-C-C0">At Zooqie, we want to help independent clothing brands get started and </span><span class="Body-C-C1">selling</span><span class="Body-C-C0"> quickly.
    </span></p>
<p class="Body-P"><span class="Body-C-C0">As well as clothes, we want to </span><span class="Body-C-C1">sell</span><span class="Body-C-C0"> the brand’s individuality and personality, so
    they can make a name for themselves.</span></p>
</div>
<div id="txt_280" style="position:absolute;left:273px;top:433px;width:460px;height:151px;overflow:hidden;">
<h1 class="Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Shop</span></h1>
<p class="Body-P"><span class="Body-C-C0">Previously, it could be hard to find new independent clothing brands.</span></p>
<p class="Body-P"><span class="Body-C-C0">At Zooqie, we want to help you find all these brands under one roof, so you can </span><span class="Body-C-C1">shop</span><span class="Body-C-C2">
    </span><span class="Body-C-C0">their unique wares. </span></p>
</div>
<div id="txt_281" style="position:absolute;left:273px;top:590px;width:460px;height:142px;">
<h1 class="Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Share</span></h1>
<p class="Body-P"><span class="Body-C-C0">At Zooqie, we want to brings the brands and customers together.</span></p>
<p class="Body-P"><span class="Body-C-C0">We want to </span><span class="Body-C-C1">share</span><span class="Body-C-C0"> brands amongst customers and </span><span class="Body-C-C1">share</span><span class="Body-C-C0"> customers amongst brands.</span></p>
</div>
<img src="images/black_line.png" border="0" width="441" height="2" id="pcrv_12" alt=""  style="position:absolute;left:283px;top:260px;">
<img src="images/little_tom.png" border="0" width="153" height="134" id="pic_225" alt=""  style="position:absolute;left:332px;top:995px;">
<img src="images/big_tom.png" border="0" width="150" height="157" id="pic_226" alt=""  style="position:absolute;left:486px;top:973px;">
<div id="txt_162" style="position:absolute;left:291px;top:818px;width:419px;height:185px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C-C3">We started Zooqie because we have a whole bunch of friends who have started clothing
    brands and we’ve always loved the uniqueness of independent clothing labels. We’ve
    seen first hand the difficulties brands have getting going and getting their name
    out there and this inspired us to go out and create Zooqie, to help people like us
    find the brands we love to find. </span></p>
<p class="Wp-Body-P"><span class="Body-C-C3">Little Tom &amp; Big Tom </span></p>
</div>
<div id="txt_286" style="position:absolute;left:291px;top:761px;width:434px;height:39px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C-C4">Message From The Authors</span></p>
</div>
<img src="images/black_line.png" border="0" width="441" height="2" id="pcrv_10" alt=""  style="position:absolute;left:283px;top:590px;">
<img src="images/black_line.png" border="0" width="441" height="2" id="pcrv_11" alt=""  style="position:absolute;left:283px;top:431px;">
<img src="images/black_line.png" border="0" width="441" height="2" id="pcrv_5" alt=""  style="position:absolute;left:283px;top:750px;">
<img src="images/zooqie.png" border="0" width="360" height="83" id="pic_235" alt=""  style="position:absolute;left:320px;top:154px;">
<!--Master Page End-->
<div id="nav-bar"></div>
</div>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/totop.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!--Page Body End-->


</body>
</html>

