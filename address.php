<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Checkout | ZOOQIE</title>
<meta name="viewport" content="width=1000">
<meta name="robots" content="index,follow">
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
<!--Header code for HTML frag_68 -->
<?
// Create connection
$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

// Check connection
if (mysqli_connect_errno($con))
{
  echo '<div> Failed to connect to products database, please try again later.  </div>';
}
else
{
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$result = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $_POST['item_number'] . "'");
	
	while($row = mysqli_fetch_array($result))
	{
		if($_POST['ship'] == '0')
		{
			$geo = 'UK Standard';
			$shipprice = $_POST['uks'];
		}
		else if($_POST['ship'] == '1')
		{
			$geo = 'UK Express';
			$shipprice = $_POST['uke'];
		}
		else if($_POST['ship'] == '2')
		{
			$geo = 'Europe';
			$shipprice = $_POST['eur'];
		}
		else if($_POST['ship'] == '3')
		{
			$geo = 'International';
			$shipprice = $_POST['int'];
		}
	}
}
?>

<script type="text/javascript">
function validate_form_25( form )
{
	<?if($_POST['country'] == '' || $_POST['country'] == 'none') echo 'alert("Please select a country"); return false;'?>
	
	if( ltrim(rtrim(form.elements['firstname'].value,' '),' ')=="" ) { alert("Please enter your name"); form.elements['firstname'].focus(); return false; }
	if( ltrim(rtrim(form.elements['line1'].value,' '),' ')=="" ) { alert("Please enter Address Line 1"); form.elements['line1'].focus(); return false; }
	if( ltrim(rtrim(form.elements['town'].value,' '),' ')=="" ) { alert("Please enter your Town / City"); form.elements['town'].focus(); return false; }
	if( ltrim(rtrim(form.elements['state'].value,' '),' ')=="" ) { alert("Please enter your State / Province"); form.elements['state'].focus(); return false; }
	if( ltrim(rtrim(form.elements['email'].value,' '),' ')=="" ) { alert("Please enter a contact email address"); form.elements['email'].focus(); return false; }
	if( ltrim(rtrim(form.elements['postcode'].value,' '),' ')=="" ) { alert("Please enter your Postcode / ZIP code"); form.elements['postcode'].focus(); return false; }
	var TCode = ltrim(rtrim(form.elements['postcode'].value,' '),' ');
    if( /[^a-zA-Z0-9 ]/.test( TCode ) ) { alert("Postcode / ZIP code must contain letters and numbers only"); form.elements['postcode'].focus(); return false; }
    
	
	<?
		if($geo == 'UK Standard' || $geo == 'UK Express')
		{
			if($_POST['country'] != 'United Kingdom') {echo 'alert("Selected country and selected shipping method do not match. Please go back and select the correct shipping method"); return false;';}
		}
		else if($geo == 'Europe')
		{
			if(!($_POST['country'] == 'Russian Federation'
			|| $_POST['country'] == 'Ukraine'
			|| $_POST['country'] == 'France'
			|| $_POST['country'] == 'Spain'
			|| $_POST['country'] == 'Sweden'
			|| $_POST['country'] == 'Norway'
			|| $_POST['country'] == 'Germany'
			|| $_POST['country'] == 'Finland'
			|| $_POST['country'] == 'Poland'
			|| $_POST['country'] == 'Italy'
			|| $_POST['country'] == 'Romania'
			|| $_POST['country'] == 'Belarus'
			|| $_POST['country'] == 'Kazakhstan'
			|| $_POST['country'] == 'Greece'
			|| $_POST['country'] == 'Bulgaria'
			|| $_POST['country'] == 'Iceland'
			|| $_POST['country'] == 'Hungary'
			|| $_POST['country'] == 'Portugal'
			|| $_POST['country'] == 'Serbia'
			|| $_POST['country'] == 'Ireland'
			|| $_POST['country'] == 'Austria'
			|| $_POST['country'] == 'Czech Republic'
			|| $_POST['country'] == 'Georgia'
			|| $_POST['country'] == 'Lithuania'
			|| $_POST['country'] == 'Latvia'
			|| $_POST['country'] == 'Croatia'
			|| $_POST['country'] == 'Bosnia and Herzegovina'
			|| $_POST['country'] == 'Slovakia'
			|| $_POST['country'] == 'Estonia'
			|| $_POST['country'] == 'Denmark'
			|| $_POST['country'] == 'Netherlands Antilles'
			|| $_POST['country'] == 'Netherlands'
			|| $_POST['country'] == 'Switzerland'
			|| $_POST['country'] == 'Moldova'
			|| $_POST['country'] == 'Belgium'
			|| $_POST['country'] == 'Albania'
			|| $_POST['country'] == 'Macedonia'
			|| $_POST['country'] == 'Turkey'
			|| $_POST['country'] == 'Slovenia'
			|| $_POST['country'] == 'Serbia and Montenegro'
			|| $_POST['country'] == 'Cyprus'
			|| $_POST['country'] == 'Azerbaijan'
			|| $_POST['country'] == 'Luxembourg'
			|| $_POST['country'] == 'Andorra'
			|| $_POST['country'] == 'Malta'
			|| $_POST['country'] == 'Liechtenstein'
			|| $_POST['country'] == 'San Marino'
			|| $_POST['country'] == 'Monaco'
			|| $_POST['country'] == 'South Georgia'
			|| $_POST['country'] == 'Holy See (Vatican City State)'
			))
			{echo 'alert("Selected country and selected shipping method do not match. Please go back and select the correct shipping method"); return false;';}
		}
		else if($geo == 'International')
		{
			if(($_POST['country'] == 'Russian Federation'
			|| $_POST['country'] == 'Ukraine'
			|| $_POST['country'] == 'United Kingdom'
			|| $_POST['country'] == 'France'
			|| $_POST['country'] == 'Spain'
			|| $_POST['country'] == 'Sweden'
			|| $_POST['country'] == 'Norway'
			|| $_POST['country'] == 'Germany'
			|| $_POST['country'] == 'Finland'
			|| $_POST['country'] == 'Poland'
			|| $_POST['country'] == 'Italy'
			|| $_POST['country'] == 'Romania'
			|| $_POST['country'] == 'Belarus'
			|| $_POST['country'] == 'Kazakhstan'
			|| $_POST['country'] == 'Greece'
			|| $_POST['country'] == 'Bulgaria'
			|| $_POST['country'] == 'Iceland'
			|| $_POST['country'] == 'Hungary'
			|| $_POST['country'] == 'Portugal'
			|| $_POST['country'] == 'Serbia'
			|| $_POST['country'] == 'Ireland'
			|| $_POST['country'] == 'Austria'
			|| $_POST['country'] == 'Czech Republic'
			|| $_POST['country'] == 'Georgia'
			|| $_POST['country'] == 'Lithuania'
			|| $_POST['country'] == 'Latvia'
			|| $_POST['country'] == 'Croatia'
			|| $_POST['country'] == 'Bosnia and Herzegovina'
			|| $_POST['country'] == 'Slovakia'
			|| $_POST['country'] == 'Estonia'
			|| $_POST['country'] == 'Denmark'
			|| $_POST['country'] == 'Netherlands Antilles'
			|| $_POST['country'] == 'Netherlands'
			|| $_POST['country'] == 'Switzerland'
			|| $_POST['country'] == 'Moldova'
			|| $_POST['country'] == 'Belgium'
			|| $_POST['country'] == 'Albania'
			|| $_POST['country'] == 'Macedonia'
			|| $_POST['country'] == 'Turkey'
			|| $_POST['country'] == 'Slovenia'
			|| $_POST['country'] == 'Serbia and Montenegro'
			|| $_POST['country'] == 'Cyprus'
			|| $_POST['country'] == 'Azerbaijan'
			|| $_POST['country'] == 'Luxembourg'
			|| $_POST['country'] == 'Andorra'
			|| $_POST['country'] == 'Malta'
			|| $_POST['country'] == 'Liechtenstein'
			|| $_POST['country'] == 'San Marino'
			|| $_POST['country'] == 'Monaco'
			|| $_POST['country'] == 'South Georgia'
			|| $_POST['country'] == 'Holy See (Vatican City State)'
			))
			{echo 'alert("Selected country and selected shipping method do not match. Please go back and select the correct shipping method"); return false;';}
		}
	?>
	
	$('#butn_1').hide();
	$('#loading_image').show();
	return true;
}
</script>

<script type="text/javascript">
function validate_form_123( form )
{
    <?if($_POST['country'] == '' || $_POST['country'] == 'none') echo 'return false;'?>
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
    font-family:"Harabara", serif; color:#656565; font-size:19.0px; line-height:1.47em;
}
.Body-C
{
    font-family:"Lato", sans-serif; color:#2c2c2c; font-size:14.0px; line-height:1.29em;
}
.Heading-2-C-C0
{
    font-family:"Harabara", serif; color:#656565; font-size:21.0px; line-height:1.48em;
}
.Heading-1-C
{
    font-family:"Harabara", serif; color:#656565; font-size:24.0px; line-height:1.50em;
}
.Normal-C
{
    font-family:"Lato", sans-serif; font-size:13.0px; line-height:1.23em;
}

#nav-bar {  min-height: 90px; background: #fff; }        /* Top bar height and colour */
#nav > li:hover > a { border-top: 3px solid #E52B50; }    /* Navigation bar top border hover state colour */
.button.amaranth { background-color: #E52B50; }           /* Button colour throughout site */
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
    font-family:"Harabara", serif; color:#656565; font-size:19.0px; line-height:1.47em;
}
.Body-C
{
    font-family:"Lato", sans-serif; color:#2c2c2c; font-size:14.0px; line-height:1.29em;
}
.Heading-2-C-C0
{
    font-family:"Harabara", serif; color:#656565; font-size:21.0px; line-height:1.48em;
}

#nav-bar {  min-height: 90px; background: #fff; }        /* Top bar height and colour */
#nav > li:hover > a { border-top: 3px solid #E52B50; }    /* Navigation bar top border hover state colour */
.button.amaranth { background-color: #E52B50; }           /* Button colour throughout site */


</style>
<script type="text/javascript" src="js/jspngfix.js"></script>
<link rel="stylesheet" href="css/wpstyles.css" type="text/css">
<script type="text/javascript">var blankSrc = "wpscripts/blank.gif";
</script>
<script type="text/javascript" src="js/jsRollover.js"></script>
<script type="text/javascript">

</script>
</head>

<?
//height of page excluding footer
$pageHeight = 850;
// 222 is footer height
$tmpHeight = $pageHeight + 222;
?>


<body text="#000000" style="background:#ffffff url('images/backgrounds/grey.png') repeat fixed top center; height:<?echo $tmpHeight;?>px;  /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3);">
<!--Master Page Body Start-->

<?php
echoFacebookScript();
echoHeader(0, 1000, $tmpHeight);
echoFooter(0, $pageHeight);
echoSocialMediaFollowButtons();
echoGoogleAnalyticsScript();
echoNavBar(0, array('Home', 'Checkout'), array('index.php', 'address.php'));
?>














<!--Body-->
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
.Heading-3-Ca
{
    font-family:"Lato", serif; color:#2c2c2c; font-size:14px; line-height:1.50em;
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


<div style="position:absolute;top:230px;left:50px;">
	
	<div style="position:absolute;left:-25px;top:-80px;" id="txt_2">
	<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Please Enter Your Shipping Address</span></h1>
	</div>
	
		
		<form id="form_123" onsubmit="return validate_form_123(this)" action="address.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" >
			<input type="hidden" name="bn" value="Serif.WebPlus">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="<?echo $_POST['business'];?>">
			<input type="hidden" name="item_name" value="<?echo $_POST['item_name'];?>">
			<input type="hidden" name="item_number" value="<?echo $_POST['item_number'];?>">
			<input type="hidden" name="currency_code" value="GBP">
			<input type="hidden" name="amount" value="<?echo $_POST['amount'];?>">
			<input type="hidden" name="quantity" value="1">
			<input type="hidden" name="shipping" value="<?echo $_POST['shipping'];?>">
			<input type="hidden" name="no_shipping" value="2">
			<input type="hidden" name="no_note" value="1">
			<input type="hidden" name="commission" value="<?echo $_POST['commission'];?>">
			<input type="hidden" name="os0" value="<?echo $_POST['os0'];?>">
			<input type="hidden" name="ship" value="<?echo $_POST['ship'];?>">
			<input type="hidden" name="uks" value="<?echo $_POST['uks'];?>">
			<input type="hidden" name="uke" value="<?echo $_POST['uke'];?>">
			<input type="hidden" name="eur" value="<?echo $_POST['eur'];?>">
			<input type="hidden" name="int" value="<?echo $_POST['int'];?>">
			
			<div style="width:400px;height:40px;">
				<p class="Wp-Normal-P"><label for="edit_2"><span class="Heading-3-C">*Country:</span></label><select onChange="submit();" style="width:155px;float:right;" name="country"> 
					<option value="none" <?if($_POST['country'] == 'none' || $_POST['country'] == '') echo 'selected';?>>Please Select a Country</option> 
					<option value="United States" <?if($_POST['country'] == 'United States') echo 'selected';?>>United States</option> 
					<option value="United Kingdom" <?if($_POST['country'] == 'United Kingdom') echo 'selected';?>>United Kingdom</option> 
					<option value="Afghanistan" <?if($_POST['country'] == 'Afghanistan') echo 'selected';?>>Afghanistan</option> 
					<option value="Albania" <?if($_POST['country'] == 'Albania') echo 'selected';?>>Albania</option> 
					<option value="Algeria" <?if($_POST['country'] == 'Algeria') echo 'selected';?>>Algeria</option> 
					<option value="American Samoa" <?if($_POST['country'] == 'American Samoa') echo 'selected';?>>American Samoa</option> 
					<option value="Andorra" <?if($_POST['country'] == 'Andorra') echo 'selected';?>>Andorra</option> 
					<option value="Angola" <?if($_POST['country'] == 'Angola') echo 'selected';?>>Angola</option> 
					<option value="Anguilla" <?if($_POST['country'] == 'Anguilla') echo 'selected';?>>Anguilla</option> 
					<option value="Antarctica" <?if($_POST['country'] == 'Antarctica') echo 'selected';?>>Antarctica</option> 
					<option value="Antigua and Barbuda" <?if($_POST['country'] == 'Antigua and Barbuda') echo 'selected';?>>Antigua and Barbuda</option> 
					<option value="Argentina" <?if($_POST['country'] == 'Argentina') echo 'selected';?>>Argentina</option> 
					<option value="Armenia" <?if($_POST['country'] == 'Armenia') echo 'selected';?>>Armenia</option> 
					<option value="Aruba" <?if($_POST['country'] == 'Aruba') echo 'selected';?>>Aruba</option> 
					<option value="Australia" <?if($_POST['country'] == 'Australia') echo 'selected';?>>Australia</option> 
					<option value="Austria" <?if($_POST['country'] == 'Austria') echo 'selected';?>>Austria</option> 
					<option value="Azerbaijan" <?if($_POST['country'] == 'Azerbaijan') echo 'selected';?>>Azerbaijan</option> 
					<option value="Bahamas" <?if($_POST['country'] == 'Bahamas') echo 'selected';?>>Bahamas</option> 
					<option value="Bahrain" <?if($_POST['country'] == 'Bahrain') echo 'selected';?>>Bahrain</option> 
					<option value="Bangladesh" <?if($_POST['country'] == 'Bangladesh') echo 'selected';?>>Bangladesh</option> 
					<option value="Barbados" <?if($_POST['country'] == 'Barbados') echo 'selected';?>>Barbados</option> 
					<option value="Belarus" <?if($_POST['country'] == 'Belarus') echo 'selected';?>>Belarus</option> 
					<option value="Belgium" <?if($_POST['country'] == 'Belgium') echo 'selected';?>>Belgium</option> 
					<option value="Belize" <?if($_POST['country'] == 'Belize') echo 'selected';?>>Belize</option> 
					<option value="Benin" <?if($_POST['country'] == 'Benin') echo 'selected';?>>Benin</option> 
					<option value="Bermuda" <?if($_POST['country'] == 'Bermuda') echo 'selected';?>>Bermuda</option> 
					<option value="Bhutan" <?if($_POST['country'] == 'Bhutan') echo 'selected';?>>Bhutan</option> 
					<option value="Bolivia" <?if($_POST['country'] == 'Bolivia') echo 'selected';?>>Bolivia</option> 
					<option value="Bosnia and Herzegovina" <?if($_POST['country'] == 'Bosnia and Herzegovina') echo 'selected';?>>Bosnia and Herzegovina</option> 
					<option value="Botswana" <?if($_POST['country'] == 'Botswana') echo 'selected';?>>Botswana</option> 
					<option value="Bouvet Island" <?if($_POST['country'] == 'Bouvet Island') echo 'selected';?>>Bouvet Island</option> 
					<option value="Brazil" <?if($_POST['country'] == 'Brazil') echo 'selected';?>>Brazil</option> 
					<option value="British Indian Ocean Territory" <?if($_POST['country'] == 'British Indian Ocean Territory') echo 'selected';?>>British Indian Ocean Territory</option> 
					<option value="Brunei Darussalam" <?if($_POST['country'] == 'Brunei Darussalam') echo 'selected';?>>Brunei Darussalam</option> 
					<option value="Bulgaria" <?if($_POST['country'] == 'Bulgaria') echo 'selected';?>>Bulgaria</option> 
					<option value="Burkina Faso" <?if($_POST['country'] == 'Burkina Faso') echo 'selected';?>>Burkina Faso</option> 
					<option value="Burundi" <?if($_POST['country'] == 'Burundi') echo 'selected';?>>Burundi</option> 
					<option value="Cambodia" <?if($_POST['country'] == 'Cambodia') echo 'selected';?>>Cambodia</option> 
					<option value="Cameroon" <?if($_POST['country'] == 'Cameroon') echo 'selected';?>>Cameroon</option> 
					<option value="Canada" <?if($_POST['country'] == 'Canada') echo 'selected';?>>Canada</option> 
					<option value="Cape Verde" <?if($_POST['country'] == 'Cape Verde') echo 'selected';?>>Cape Verde</option> 
					<option value="Cayman Islands" <?if($_POST['country'] == 'Cayman Islands') echo 'selected';?>>Cayman Islands</option> 
					<option value="Central African Republic" <?if($_POST['country'] == 'Central African Republic') echo 'selected';?>>Central African Republic</option> 
					<option value="Chad" <?if($_POST['country'] == 'Chad') echo 'selected';?>>Chad</option> 
					<option value="Chile" <?if($_POST['country'] == 'Chile') echo 'selected';?>>Chile</option> 
					<option value="China" <?if($_POST['country'] == 'China') echo 'selected';?>>China</option> 
					<option value="Christmas Island" <?if($_POST['country'] == 'Christmas Island') echo 'selected';?>>Christmas Island</option> 
					<option value="Cocos (Keeling) Islands" <?if($_POST['country'] == 'Cocos (Keeling) Islands') echo 'selected';?>>Cocos (Keeling) Islands</option> 
					<option value="Colombia" <?if($_POST['country'] == 'Colombia') echo 'selected';?>>Colombia</option> 
					<option value="Comoros" <?if($_POST['country'] == 'Comoros') echo 'selected';?>>Comoros</option> 
					<option value="Congo" <?if($_POST['country'] == 'Congo') echo 'selected';?>>Congo</option> 
					<option value="Congo, The Democratic Republic of The" <?if($_POST['country'] == 'Congo, The Democratic Republic of The') echo 'selected';?>>Congo, The Democratic Republic of The</option> 
					<option value="Cook Islands" <?if($_POST['country'] == 'Cook Islands') echo 'selected';?>>Cook Islands</option> 
					<option value="Costa Rica" <?if($_POST['country'] == 'Costa Rica') echo 'selected';?>>Costa Rica</option> 
					<option value="Croatia" <?if($_POST['country'] == 'Croatia') echo 'selected';?>>Croatia</option> 
					<option value="Cuba" <?if($_POST['country'] == 'Cuba') echo 'selected';?>>Cuba</option> 
					<option value="Cyprus" <?if($_POST['country'] == 'Cyprus') echo 'selected';?>>Cyprus</option> 
					<option value="Czech Republic" <?if($_POST['country'] == 'Czech Republic') echo 'selected';?>>Czech Republic</option> 
					<option value="Denmark" <?if($_POST['country'] == 'Denmark') echo 'selected';?>>Denmark</option> 
					<option value="Djibouti" <?if($_POST['country'] == 'Djibouti') echo 'selected';?>>Djibouti</option> 
					<option value="Dominica" <?if($_POST['country'] == 'Dominica') echo 'selected';?>>Dominica</option> 
					<option value="Dominican Republic" <?if($_POST['country'] == 'Dominican Republic') echo 'selected';?>>Dominican Republic</option> 
					<option value="Ecuador" <?if($_POST['country'] == 'Ecuador') echo 'selected';?>>Ecuador</option> 
					<option value="Egypt" <?if($_POST['country'] == 'Egypt') echo 'selected';?>>Egypt</option> 
					<option value="El Salvador" <?if($_POST['country'] == 'El Salvador') echo 'selected';?>>El Salvador</option> 
					<option value="Equatorial Guinea" <?if($_POST['country'] == 'Equatorial Guinea') echo 'selected';?>>Equatorial Guinea</option> 
					<option value="Eritrea" <?if($_POST['country'] == 'Eritrea') echo 'selected';?>>Eritrea</option> 
					<option value="Estonia" <?if($_POST['country'] == 'Estonia') echo 'selected';?>>Estonia</option> 
					<option value="Ethiopia" <?if($_POST['country'] == 'Ethiopia') echo 'selected';?>>Ethiopia</option> 
					<option value="Falkland Islands (Malvinas)" <?if($_POST['country'] == 'Falkland Islands (Malvinas)') echo 'selected';?>>Falkland Islands (Malvinas)</option> 
					<option value="Faroe Islands" <?if($_POST['country'] == 'Faroe Islands') echo 'selected';?>>Faroe Islands</option> 
					<option value="Fiji" <?if($_POST['country'] == 'Fiji') echo 'selected';?>>Fiji</option> 
					<option value="Finland" <?if($_POST['country'] == 'Finland') echo 'selected';?>>Finland</option> 
					<option value="France" <?if($_POST['country'] == 'France') echo 'selected';?>>France</option> 
					<option value="French Guiana" <?if($_POST['country'] == 'French Guiana') echo 'selected';?>>French Guiana</option> 
					<option value="French Polynesia" <?if($_POST['country'] == 'French Polynesia') echo 'selected';?>>French Polynesia</option> 
					<option value="French Southern Territories" <?if($_POST['country'] == 'French Southern Territories') echo 'selected';?>>French Southern Territories</option> 
					<option value="Gabon" <?if($_POST['country'] == 'Gabon') echo 'selected';?>>Gabon</option> 
					<option value="Gambia" <?if($_POST['country'] == 'Gambia') echo 'selected';?>>Gambia</option> 
					<option value="Georgia" <?if($_POST['country'] == 'Georgia') echo 'selected';?>>Georgia</option> 
					<option value="Germany" <?if($_POST['country'] == 'Germany') echo 'selected';?>>Germany</option> 
					<option value="Ghana" <?if($_POST['country'] == 'Ghana') echo 'selected';?>>Ghana</option> 
					<option value="Gibraltar" <?if($_POST['country'] == 'Gibraltar') echo 'selected';?>>Gibraltar</option> 
					<option value="Greece" <?if($_POST['country'] == 'Greece') echo 'selected';?>>Greece</option> 
					<option value="Greenland" <?if($_POST['country'] == 'Greenland') echo 'selected';?>>Greenland</option> 
					<option value="Grenada" <?if($_POST['country'] == 'Grenada') echo 'selected';?>>Grenada</option> 
					<option value="Guadeloupe" <?if($_POST['country'] == 'Guadeloupe') echo 'selected';?>>Guadeloupe</option> 
					<option value="Guam" <?if($_POST['country'] == 'Guam') echo 'selected';?>>Guam</option> 
					<option value="Guatemala" <?if($_POST['country'] == 'Guatemala') echo 'selected';?>>Guatemala</option> 
					<option value="Guinea" <?if($_POST['country'] == 'Guinea') echo 'selected';?>>Guinea</option> 
					<option value="Guinea-bissau" <?if($_POST['country'] == 'Guinea-bissau') echo 'selected';?>>Guinea-bissau</option> 
					<option value="Guyana" <?if($_POST['country'] == 'Guyana') echo 'selected';?>>Guyana</option> 
					<option value="Haiti" <?if($_POST['country'] == 'Haiti') echo 'selected';?>>Haiti</option> 
					<option value="Heard Island and Mcdonald Islands" <?if($_POST['country'] == 'Heard Island and Mcdonald Islands') echo 'selected';?>>Heard Island and Mcdonald Islands</option> 
					<option value="Holy See (Vatican City State)" <?if($_POST['country'] == 'Holy See (Vatican City State)') echo 'selected';?>>Holy See (Vatican City State)</option> 
					<option value="Honduras" <?if($_POST['country'] == 'Honduras') echo 'selected';?>>Honduras</option> 
					<option value="Hong Kong" <?if($_POST['country'] == 'Hong Kong') echo 'selected';?>>Hong Kong</option> 
					<option value="Hungary" <?if($_POST['country'] == 'Hungary') echo 'selected';?>>Hungary</option> 
					<option value="Iceland" <?if($_POST['country'] == 'Iceland') echo 'selected';?>>Iceland</option> 
					<option value="India" <?if($_POST['country'] == 'India') echo 'selected';?>>India</option> 
					<option value="Indonesia" <?if($_POST['country'] == 'Indonesia') echo 'selected';?>>Indonesia</option> 
					<option value="Iran, Islamic Republic of" <?if($_POST['country'] == 'Iran, Islamic Republic of') echo 'selected';?>>Iran, Islamic Republic of</option> 
					<option value="Iraq" <?if($_POST['country'] == 'Iraq') echo 'selected';?>>Iraq</option> 
					<option value="Ireland" <?if($_POST['country'] == 'Ireland') echo 'selected';?>>Ireland</option> 
					<option value="Israel" <?if($_POST['country'] == 'Israel') echo 'selected';?>>Israel</option> 
					<option value="Italy" <?if($_POST['country'] == 'Italy') echo 'selected';?>>Italy</option> 
					<option value="Jamaica" <?if($_POST['country'] == 'Jamaica') echo 'selected';?>>Jamaica</option> 
					<option value="Japan" <?if($_POST['country'] == 'Japan') echo 'selected';?>>Japan</option> 
					<option value="Jordan" <?if($_POST['country'] == 'Jordan') echo 'selected';?>>Jordan</option> 
					<option value="Kazakhstan" <?if($_POST['country'] == 'Kazakhstan') echo 'selected';?>>Kazakhstan</option> 
					<option value="Kenya" <?if($_POST['country'] == 'Kenya') echo 'selected';?>>Kenya</option> 
					<option value="Kiribati" <?if($_POST['country'] == 'Kiribati') echo 'selected';?>>Kiribati</option> 
					<option value="Korea, Democratic Peoples Republic of" <?if($_POST['country'] == "Korea, Democratic Peoples Republic of") echo 'selected';?>>Korea, Democratic People's Republic of</option> 
					<option value="Korea, Republic of" <?if($_POST['country'] == 'Korea, Republic of') echo 'selected';?>>Korea, Republic of</option> 
					<option value="Kuwait" <?if($_POST['country'] == 'Kuwait') echo 'selected';?>>Kuwait</option> 
					<option value="Kyrgyzstan" <?if($_POST['country'] == 'Kyrgyzstan') echo 'selected';?>>Kyrgyzstan</option> 
					<option value="Lao Peoples Democratic Republic" <?if($_POST['country'] == 'Lao Peoples Democratic Republic') echo 'selected';?>>Lao People's Democratic Republic</option> 
					<option value="Latvia" <?if($_POST['country'] == 'Latvia') echo 'selected';?>>Latvia</option> 
					<option value="Lebanon" <?if($_POST['country'] == 'Lebanon') echo 'selected';?>>Lebanon</option> 
					<option value="Lesotho" <?if($_POST['country'] == 'Lesotho') echo 'selected';?>>Lesotho</option> 
					<option value="Liberia" <?if($_POST['country'] == 'Liberia') echo 'selected';?>>Liberia</option> 
					<option value="Libyan Arab Jamahiriya" <?if($_POST['country'] == 'Libyan Arab Jamahiriya') echo 'selected';?>>Libyan Arab Jamahiriya</option> 
					<option value="Liechtenstein" <?if($_POST['country'] == 'Liechtenstein') echo 'selected';?>>Liechtenstein</option> 
					<option value="Lithuania" <?if($_POST['country'] == 'Lithuania') echo 'selected';?>>Lithuania</option> 
					<option value="Luxembourg" <?if($_POST['country'] == 'Luxembourg') echo 'selected';?>>Luxembourg</option> 
					<option value="Macao" <?if($_POST['country'] == 'Macao') echo 'selected';?>>Macao</option> 
					<option value="Macedonia, The Former Yugoslav Republic of" <?if($_POST['country'] == 'Macedonia, The Former Yugoslav Republic of') echo 'selected';?>>Macedonia, The Former Yugoslav Republic of</option> 
					<option value="Madagascar" <?if($_POST['country'] == 'Madagascar') echo 'selected';?>>Madagascar</option> 
					<option value="Malawi" <?if($_POST['country'] == 'Malawi') echo 'selected';?>>Malawi</option> 
					<option value="Malaysia" <?if($_POST['country'] == 'Malaysia') echo 'selected';?>>Malaysia</option> 
					<option value="Maldives" <?if($_POST['country'] == 'Maldives') echo 'selected';?>>Maldives</option> 
					<option value="Mali" <?if($_POST['country'] == 'Mali') echo 'selected';?>>Mali</option> 
					<option value="Malta" <?if($_POST['country'] == 'Malta') echo 'selected';?>>Malta</option> 
					<option value="Marshall Islands" <?if($_POST['country'] == 'Marshall Islands') echo 'selected';?>>Marshall Islands</option> 
					<option value="Martinique" <?if($_POST['country'] == 'Martinique') echo 'selected';?>>Martinique</option> 
					<option value="Mauritania" <?if($_POST['country'] == 'Mauritania') echo 'selected';?>>Mauritania</option> 
					<option value="Mauritius" <?if($_POST['country'] == 'Mauritius') echo 'selected';?>>Mauritius</option> 
					<option value="Mayotte" <?if($_POST['country'] == 'Mayotte') echo 'selected';?>>Mayotte</option> 
					<option value="Mexico" <?if($_POST['country'] == 'Mexico') echo 'selected';?>>Mexico</option> 
					<option value="Micronesia, Federated States of" <?if($_POST['country'] == 'Micronesia, Federated States of') echo 'selected';?>>Micronesia, Federated States of</option> 
					<option value="Moldova, Republic of" <?if($_POST['country'] == 'Moldova, Republic of') echo 'selected';?>>Moldova, Republic of</option> 
					<option value="Monaco" <?if($_POST['country'] == 'Monaco') echo 'selected';?>>Monaco</option> 
					<option value="Mongolia" <?if($_POST['country'] == 'Mongolia') echo 'selected';?>>Mongolia</option> 
					<option value="Montserrat" <?if($_POST['country'] == 'Montserrat') echo 'selected';?>>Montserrat</option> 
					<option value="Morocco" <?if($_POST['country'] == 'Morocco') echo 'selected';?>>Morocco</option> 
					<option value="Mozambique" <?if($_POST['country'] == 'Mozambique') echo 'selected';?>>Mozambique</option> 
					<option value="Myanmar" <?if($_POST['country'] == 'Myanmar') echo 'selected';?>>Myanmar</option> 
					<option value="Namibia" <?if($_POST['country'] == 'Namibia') echo 'selected';?>>Namibia</option> 
					<option value="Nauru" <?if($_POST['country'] == 'Nauru') echo 'selected';?>>Nauru</option> 
					<option value="Nepal" <?if($_POST['country'] == 'Nepal') echo 'selected';?>>Nepal</option> 
					<option value="Netherlands" <?if($_POST['country'] == 'Netherlands') echo 'selected';?>>Netherlands</option> 
					<option value="Netherlands Antilles" <?if($_POST['country'] == 'Netherlands Antilles') echo 'selected';?>>Netherlands Antilles</option> 
					<option value="New Caledonia" <?if($_POST['country'] == 'New Caledonia') echo 'selected';?>>New Caledonia</option> 
					<option value="New Zealand" <?if($_POST['country'] == 'New Zealand') echo 'selected';?>>New Zealand</option> 
					<option value="Nicaragua" <?if($_POST['country'] == 'Nicaragua') echo 'selected';?>>Nicaragua</option> 
					<option value="Niger" <?if($_POST['country'] == 'Niger') echo 'selected';?>>Niger</option> 
					<option value="Nigeria" <?if($_POST['country'] == 'Nigeria') echo 'selected';?>>Nigeria</option> 
					<option value="Niue" <?if($_POST['country'] == 'Niue') echo 'selected';?>>Niue</option> 
					<option value="Norfolk Island" <?if($_POST['country'] == 'Norfolk Island') echo 'selected';?>>Norfolk Island</option> 
					<option value="Northern Mariana Islands" <?if($_POST['country'] == 'Northern Mariana Islands') echo 'selected';?>>Northern Mariana Islands</option> 
					<option value="Norway" <?if($_POST['country'] == 'Norway') echo 'selected';?>>Norway</option> 
					<option value="Oman" <?if($_POST['country'] == 'Oman') echo 'selected';?>>Oman</option> 
					<option value="Pakistan" <?if($_POST['country'] == 'Pakistan') echo 'selected';?>>Pakistan</option> 
					<option value="Palau" <?if($_POST['country'] == 'Palau') echo 'selected';?>>Palau</option> 
					<option value="Palestinian Territory, Occupied" <?if($_POST['country'] == 'Palestinian Territory, Occupied') echo 'selected';?>>Palestinian Territory, Occupied</option> 
					<option value="Panama" <?if($_POST['country'] == 'Panama') echo 'selected';?>>Panama</option> 
					<option value="Papua New Guinea" <?if($_POST['country'] == 'Papua New Guinea') echo 'selected';?>>Papua New Guinea</option> 
					<option value="Paraguay" <?if($_POST['country'] == 'Paraguay') echo 'selected';?>>Paraguay</option> 
					<option value="Peru" <?if($_POST['country'] == 'Peru') echo 'selected';?>>Peru</option> 
					<option value="Philippines" <?if($_POST['country'] == 'Philippines') echo 'selected';?>>Philippines</option> 
					<option value="Pitcairn" <?if($_POST['country'] == 'Pitcairn') echo 'selected';?>>Pitcairn</option> 
					<option value="Poland" <?if($_POST['country'] == 'Poland') echo 'selected';?>>Poland</option> 
					<option value="Portugal" <?if($_POST['country'] == 'Portugal') echo 'selected';?>>Portugal</option> 
					<option value="Puerto Rico" <?if($_POST['country'] == 'Puerto Rico') echo 'selected';?>>Puerto Rico</option> 
					<option value="Qatar" <?if($_POST['country'] == 'Qatar') echo 'selected';?>>Qatar</option> 
					<option value="Reunion" <?if($_POST['country'] == 'Reunion') echo 'selected';?>>Reunion</option> 
					<option value="Romania" <?if($_POST['country'] == 'Romania') echo 'selected';?>>Romania</option> 
					<option value="Russian Federation" <?if($_POST['country'] == 'Russian Federation') echo 'selected';?>>Russian Federation</option> 
					<option value="Rwanda" <?if($_POST['country'] == 'Rwanda') echo 'selected';?>>Rwanda</option> 
					<option value="Saint Helena" <?if($_POST['country'] == 'Saint Helena') echo 'selected';?>>Saint Helena</option> 
					<option value="Saint Kitts and Nevis" <?if($_POST['country'] == 'Saint Kitts and Nevis') echo 'selected';?>>Saint Kitts and Nevis</option> 
					<option value="Saint Lucia" <?if($_POST['country'] == 'Saint Lucia') echo 'selected';?>>Saint Lucia</option> 
					<option value="Saint Pierre and Miquelon" <?if($_POST['country'] == 'Saint Pierre and Miquelon') echo 'selected';?>>Saint Pierre and Miquelon</option> 
					<option value="Saint Vincent and The Grenadines" <?if($_POST['country'] == 'Saint Vincent and The Grenadines') echo 'selected';?>>Saint Vincent and The Grenadines</option> 
					<option value="Samoa" <?if($_POST['country'] == 'Samoa') echo 'selected';?>>Samoa</option> 
					<option value="San Marino" <?if($_POST['country'] == 'San Marino"') echo 'selected';?>>San Marino</option> 
					<option value="Sao Tome and Principe" <?if($_POST['country'] == 'Sao Tome and Principe') echo 'selected';?>>Sao Tome and Principe</option> 
					<option value="Saudi Arabia" <?if($_POST['country'] == 'Saudi Arabia') echo 'selected';?>>Saudi Arabia</option> 
					<option value="Senegal" <?if($_POST['country'] == 'Senegal') echo 'selected';?>>Senegal</option> 
					<option value="Serbia and Montenegro" <?if($_POST['country'] == 'Serbia and Montenegro') echo 'selected';?>>Serbia and Montenegro</option> 
					<option value="Seychelles" <?if($_POST['country'] == 'Seychelles') echo 'selected';?>>Seychelles</option> 
					<option value="Sierra Leone" <?if($_POST['country'] == 'Sierra Leone') echo 'selected';?>>Sierra Leone</option> 
					<option value="Singapore" <?if($_POST['country'] == 'Singapore') echo 'selected';?>>Singapore</option> 
					<option value="Slovakia" <?if($_POST['country'] == 'Slovakia') echo 'selected';?>>Slovakia</option> 
					<option value="Slovenia" <?if($_POST['country'] == 'Slovenia') echo 'selected';?>>Slovenia</option> 
					<option value="Solomon Islands" <?if($_POST['country'] == 'Solomon Islands') echo 'selected';?>>Solomon Islands</option> 
					<option value="Somalia" <?if($_POST['country'] == 'Somalia') echo 'selected';?>>Somalia</option> 
					<option value="South Africa" <?if($_POST['country'] == 'South Africa') echo 'selected';?>>South Africa</option> 
					<option value="South Georgia and The South Sandwich Islands" <?if($_POST['country'] == 'South Georgia and The South Sandwich Islands') echo 'selected';?>>South Georgia and The South Sandwich Islands</option> 
					<option value="Spain" <?if($_POST['country'] == 'Spain') echo 'selected';?>>Spain</option> 
					<option value="Sri Lanka" <?if($_POST['country'] == 'Sri Lanka') echo 'selected';?>>Sri Lanka</option> 
					<option value="Sudan" <?if($_POST['country'] == 'Sudan') echo 'selected';?>>Sudan</option> 
					<option value="Suriname" <?if($_POST['country'] == 'Suriname') echo 'selected';?>>Suriname</option> 
					<option value="Svalbard and Jan Mayen" <?if($_POST['country'] == 'Svalbard and Jan Mayen') echo 'selected';?>>Svalbard and Jan Mayen</option> 
					<option value="Swaziland" <?if($_POST['country'] == 'Swaziland') echo 'selected';?>>Swaziland</option> 
					<option value="Sweden" <?if($_POST['country'] == 'Sweden') echo 'selected';?>>Sweden</option> 
					<option value="Switzerland" <?if($_POST['country'] == 'Switzerland') echo 'selected';?>>Switzerland</option> 
					<option value="Syrian Arab Republic" <?if($_POST['country'] == 'Syrian Arab Republic') echo 'selected';?>>Syrian Arab Republic</option> 
					<option value="Taiwan, Province of China" <?if($_POST['country'] == 'Taiwan, Province of China') echo 'selected';?>>Taiwan, Province of China</option> 
					<option value="Tajikistan" <?if($_POST['country'] == 'Tajikistan') echo 'selected';?>>Tajikistan</option> 
					<option value="Tanzania, United Republic of" <?if($_POST['country'] == 'Tanzania, United Republic of') echo 'selected';?>>Tanzania, United Republic of</option> 
					<option value="Thailand" <?if($_POST['country'] == 'Thailand') echo 'selected';?>>Thailand</option> 
					<option value="Timor-leste" <?if($_POST['country'] == 'Timor-leste') echo 'selected';?>>Timor-leste</option> 
					<option value="Togo" <?if($_POST['country'] == 'Togo') echo 'selected';?>>Togo</option> 
					<option value="Tokelau" <?if($_POST['country'] == 'Tokelau') echo 'selected';?>>Tokelau</option> 
					<option value="Tonga" <?if($_POST['country'] == 'Tonga') echo 'selected';?>>Tonga</option> 
					<option value="Trinidad and Tobago" <?if($_POST['country'] == 'Trinidad and Tobago') echo 'selected';?>>Trinidad and Tobago</option> 
					<option value="Tunisia" <?if($_POST['country'] == 'Tunisia') echo 'selected';?>>Tunisia</option> 
					<option value="Turkey" <?if($_POST['country'] == 'Turkey') echo 'selected';?>>Turkey</option> 
					<option value="Turkmenistan" <?if($_POST['country'] == 'Turkmenistan') echo 'selected';?>>Turkmenistan</option> 
					<option value="Turks and Caicos Islands" <?if($_POST['country'] == 'Turks and Caicos Islands') echo 'selected';?>>Turks and Caicos Islands</option> 
					<option value="Tuvalu" <?if($_POST['country'] == 'Tuvalu') echo 'selected';?>>Tuvalu</option> 
					<option value="Uganda" <?if($_POST['country'] == 'Uganda') echo 'selected';?>>Uganda</option> 
					<option value="Ukraine" <?if($_POST['country'] == 'Ukraine') echo 'selected';?>>Ukraine</option> 
					<option value="United Arab Emirates" <?if($_POST['country'] == 'United Arab Emirates') echo 'selected';?>>United Arab Emirates</option> 
					<option value="United Kingdom" <?if($_POST['country'] == 'United Kingdom') echo 'selected';?>>United Kingdom</option> 
					<option value="United States" <?if($_POST['country'] == 'United States') echo 'selected';?>>United States</option> 
					<option value="United States Minor Outlying Islands" <?if($_POST['country'] == 'United States Minor Outlying Islands') echo 'selected';?>>United States Minor Outlying Islands</option> 
					<option value="Uruguay" <?if($_POST['country'] == 'Uruguay') echo 'selected';?>>Uruguay</option> 
					<option value="Uzbekistan" <?if($_POST['country'] == 'Uzbekistan') echo 'selected';?>>Uzbekistan</option> 
					<option value="Vanuatu" <?if($_POST['country'] == 'Vanuatu') echo 'selected';?>>Vanuatu</option> 
					<option value="Venezuela" <?if($_POST['country'] == 'Venezuela') echo 'selected';?>>Venezuela</option> 
					<option value="Viet Nam" <?if($_POST['country'] == 'Viet Nam') echo 'selected';?>>Viet Nam</option> 
					<option value="Virgin Islands, British" <?if($_POST['country'] == 'Virgin Islands, British') echo 'selected';?>>Virgin Islands, British</option> 
					<option value="Virgin Islands, U.S." <?if($_POST['country'] == 'Virgin Islands, U.S.') echo 'selected';?>>Virgin Islands, U.S.</option> 
					<option value="Wallis and Futuna" <?if($_POST['country'] == 'Wallis and Futuna') echo 'selected';?>>Wallis and Futuna</option> 
					<option value="Western Sahara" <?if($_POST['country'] == 'Western Sahara') echo 'selected';?>>Western Sahara</option> 
					<option value="Yemen" <?if($_POST['country'] == 'Yemen') echo 'selected';?>>Yemen</option> 
					<option value="Zambia" <?if($_POST['country'] == 'Zambia') echo 'selected';?>>Zambia</option> 
					<option value="Zimbabwe" <?if($_POST['country'] == 'Zimbabwe') echo 'selected';?>>Zimbabwe</option>
					</select>
				</p>
			</div>
		</form>
		<br/>
	
	
	<form id="form_25" autocomplete="off" name="userinfo_2" onsubmit="return validate_form_25(this)" action="/paypal/class/PayWithOptions2.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" >

		<input type="hidden" name="bn" value="Serif.WebPlus">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="<?echo $_POST['business'];?>">
		<input type="hidden" name="item_name" value="<?echo $_POST['item_name'];?>">
		<input type="hidden" name="item_number" value="<?echo $_POST['item_number'];?>">
		<input type="hidden" name="currency_code" value="GBP">
		<input type="hidden" name="amount" value="<?echo $_POST['amount'];?>">
		<input type="hidden" name="quantity" value="1">
		<input type="hidden" name="shipping" value="<?echo $_POST['shipping'];?>">
		<input type="hidden" name="no_shipping" value="2">
		<input type="hidden" name="no_note" value="1">
		<input type="hidden" name="commission" value="<?echo $_POST['commission'];?>">
		<input type="hidden" name="os0" value="<?echo $_POST['os0'];?>">
		<input type="hidden" name="ship" value="<?echo $shipprice;?>">
		<input type="hidden" name="country" value="<?echo $_POST['country'];?>">

		<div style="width:400px;height:40px;">
		<p class="Wp-Normal-P"><span class="Heading-3-C">*</span><label for="edit_1"><span class="Heading-3-Ca">Name:</span></label><input style="float:right;" value="<?echo $_POST['firstname'];?>" type="text" id="edit_1" name="firstname" value="" ></p>
		</div>
		
		<div style="width:400px;height:40px;">
		<p class="Wp-Normal-P"><span class="Heading-3-C">*</span><label for="edit_1"><span class="Heading-3-Ca">Address Line 1:</span></label><input style="float:right;" value="<?echo $_POST['line1'];?>" type="text" id="edit_1" name="line1" value="" ></p>
		</div>



		<div style="width:400px;height:40px;">
		<p class="Wp-Normal-P"><label for="edit_2"><span class="Heading-3-Ca">&nbsp;Address Line 2:</span></label><input style="float:right;" type="text" id="edit_2" value="<?echo $_POST['line2'];?>" name="line2" value="" ></p>
		</div>



		<div style="width:400px;height:40px;">
		<p class="Wp-Normal-P"><span class="Heading-3-C">*</span><label for="edit_2"><span class="Heading-3-Ca">Town / City:</span></label><input style="float:right;" type="text" value="<?echo $_POST['town'];?>" id="edit_2" name="town" value="" ></p>
		</div>


		<div style="width:400px;height:40px;">
		<p class="Wp-Normal-P"><span class="Heading-3-C">*</span><label for="edit_2"><span class="Heading-3-Ca">State / County / Region:</span></label><input style="float:right;" value="<?echo $_POST['state'];?>" type="text" id="edit_2" name="state" value="" ></p>
		</div>
		
		<div style="width:400px;height:40px;">
		<p class="Wp-Normal-P"><span class="Heading-3-C">*</span><label for="edit_2"><span class="Heading-3-Ca">Postcode / ZIP code:</span></label><input style="float:right;" value="<?echo $_POST['postcode'];?>" type="text" id="edit_2" name="postcode" value="" ></p>
		</div>
		
		<div>
			<div style="width:400px;height:40px;float:left;">
			<p class="Wp-Normal-P"><span class="Heading-3-C">*</span><label for="edit_2"><span class="Heading-3-Ca">Contact Email:</span></label><input style="float:right;" value="<?echo $_POST['email'];?>" type="text" id="edit_2" name="email" value="" ></p>
			</div>
			
			<div style="width:480px;height:40px;float:right;">
			<p><input style="color:white;width:75px;height:30px;float:right;" class="button large blue" type="submit" id="butn_1" name="Next" value="Next"><img src="/css/images/ajax-loader.gif" style="display: none;float:right;" id="loading_image"></p>
			</div>
			
		</div>

		<br/>

	</form>
	<script type="text/javascript" src="js/jsValidation.js"></script>

</div>

<div style="position:absolute;top:230px;left:550px;">
	
	<div style="position:absolute;left:-25px;top:-80px;width:300px;" id="txt_2">
	<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Payment Summary</span></h1>
	</div>
	
	<div>
	
		<div style="width:370px;height:40px;">
		<p class="Wp-Normal-P"><span class="Heading-3-Ca">Item: </span><span style="float:right;" class="Heading-3-Ca"><?echo stripslashes($_POST['item_name']);?></span></p>
		</div>
		
		<div style="width:370px;height:40px;">
		<p class="Wp-Normal-P"><span class="Heading-3-Ca">Size: </span><span style="float:right;" class="Heading-3-Ca"><?echo $_POST['os0'];?></span></p>
		</div>
		
		<div style="width:370px;height:40px;">
		<p class="Wp-Normal-P"><span class="Heading-3-Ca">Price: </span><span style="float:right;" class="Heading-3-Ca">&pound;<?echo $_POST['amount'];?></span></p>
		</div>
		
		
		<div style="width:370px;height:40px;">
		<p class="Wp-Normal-P"><span class="Heading-3-Ca">Shipping: </span><span style="float:right;" class="Heading-3-Ca">(<?echo $geo;?>)&nbsp;&nbsp;&nbsp;&nbsp; &pound;<?echo $shipprice;?></span></p>
		</div>
		
		<img src="images/line.png" border="0" width="370" height="1" id="pcrv_3" alt="" onload="OnLoadPngFix()" >
		
		<?$total = $_POST['amount'] + $shipprice;?>
		<?$total = number_format($total, 2, '.', '');?>
		<div style="width:370px;height:40px;">
		<p style="margin-top:10px" class="Wp-Normal-P"><span class="Heading-3-Ca">Total: </span><span style="float:right;" class="Heading-3-C">&pound;<?echo $total;?></span></p>
		</div>
		
		<br/>
		
		
	</div>
		
</div>



<!-- HTML Frame - Please Note: txt_486 -->


<div id="txt_486" style="position:absolute;left:90px;top:595px;width:250px;height:169px;overflow:hidden; " >

<h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Please Note:</span></h2>

<ul class="Body-P">
	<h3 class="Wp-Heading-2-P"><span class="Heading-3-C">One At A Time Please</span></h3>
    <li class="Body-P-P0"><span class="Body-C">Due to the nature of Zooqie selling products across many different brands, it is
        only possible to purchase items one at a time.</span></li></ul>
</div>



<!-- HTML Frame - Paypal txt_487 -->


<div id="txt_487" style="position:absolute;left:340px;top:595px;width:250px;height:169px;overflow:hidden; " >

<p class="Wp-Body-P"><span class="Body-C"><br></span></p>

<ul class="Body-P">
	<h3 class="Wp-Heading-2-P"><span class="Heading-3-C">Paypal</span></h3>
    <li class="Body-P-P0"><span class="Body-C">All Payments are made securely through PayPal. Payments are made directly to the
        independent clothing brand.</span></li></ul>
</div>



<!-- HTML Frame - Delivery txt_488 -->


<div id="txt_488" style="position:absolute;left:590px;top:595px;width:250px;height:199px;overflow:hidden; " >

<h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C"><br></span></h2>

<ul class="Body-P">
	<h3 class="Wp-Heading-2-P"><span class="Heading-3-C">Delivery</span></h3>
    <li class="Body-P-P0"><span class="Body-C">Many of our brands are relatively small and/or new and their delivery times may be
        slightly longer than may be expected from other more commercial brands/websites.</span></li></ul>
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

<!--Fullsize Background Image-->
<script src="js/jquery.backstretch.js"></script>
<script>
    jQuery.backstretch("images/backgrounds/sbackground3.jpg");
</script>
</body>
</html>

