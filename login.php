<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Brands Log In | ZOOQIE</title>
<meta name="viewport" content="width=1000">
<meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. Zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
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
    else if(file_exists("../db_settings.php")) {include("../db_settings.php");}
    else if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}

    //Include utilities
    if(file_exists("utils.php")) {include("utils.php");}
    else if(file_exists("../utils.php")) {include("../utils.php");}
    else if(file_exists("../../utils.php")) {include("../../utils.php");}
    ?>







<script type="text/javascript">
function validate_form_25( form )
{
    if( ltrim(rtrim(form.elements['USERNAME'].value,' '),' ')=="" ) { alert("Please give your username"); form.elements['USERNAME'].focus(); return false; }
    if( ltrim(rtrim(form.elements['PASSWORD'].value,' '),' ')=="" ) { alert("Please give your password"); form.elements['PASSWORD'].focus(); return false; }
    return true;
}
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
.Normal-C
{
    font-family:"Lato", sans-serif; font-size:13px; line-height:1.23em;
}

</style>


<script type="text/javascript">


</script>
</head>

<?
//height of page excluding footer
$pageHeight = 316;
// 222 is footer height
$tmpHeight = $pageHeight + 222;
?>

<body text="#000000" style="background:#ffffff url('images/backgroundpattern.png') repeat fixed top center; height:<?echo $tmpHeight;?>px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3);">
<!--Master Page Body Start-->

<?php
echoFooter(0, $pageHeight);
echoFacebookScript();
echoHeader(0, 1000, $tmpHeight);
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();
echoNavBar(0, array('Home', 'Log In'), array('index.php', 'login.php'));
?>









<div id="txt_2" style="position:absolute;left:36px;top:141px;width:220px;height:52px;overflow:hidden;">
<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Brands Log In</span></h1>
</div>
<form id="form_25" name="userinfo_2" onsubmit="return validate_form_25(this)" action="loginScript.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" style="margin:0;position:absolute;left:36px;top:194px;width:453px;height:106px;">
<div id="txt_4" style="position:absolute;left:8px;top:8px;width:165px;height:16px;overflow:hidden;">
<p class="Wp-Normal-P"><label for="edit_1"><span class="Normal-C">Username or Brand Name</span></label></p>
</div>
<input type="text" id="edit_1" name="USERNAME" maxlength="50" value="" style="position:absolute; left:215px; top:8px; width:186px;">
<div id="txt_5" style="position:absolute;left:8px;top:38px;width:67px;height:16px;overflow:hidden;">
<p class="Wp-Normal-P"><label for="edit_2"><span class="Normal-C">Password</span></label></p>
</div>
<input type="password" id="edit_2" name="PASSWORD" maxlength="25" value="" style="position:absolute; left:215px; top:38px; width:186px;">
<input type="submit" style="position:absolute; left:243px; top:68px; width:76px; height:22px;" id="butn_1" name="Login" value="Log In">
<input type="reset" style="position:absolute; left:327px; top:68px; width:72px; height:22px;" id="butn_2" name="Reset" value="Clear">
</form>
<script type="text/javascript" src="js/jsValidation.js"></script>
<!--Master Page End-->
<div id="nav-bar"></div>
</div>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/totop.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!--Page Body End-->


</body>
</html>
