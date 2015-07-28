<?
if(!session_id()) session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Successful Payment | ZOOQIE</title>
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
$pageHeight = 466;
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
echoNavBar(0, array('Home', 'Payment Successful'), array('index.php', 'paymentsuccess.php'));
?>






<div id="txt_2" style="position:absolute;left:20px;top:155px;width:960px;height:52px;overflow:hidden;">
<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Payment Successful!</span></h1>
</div>
<?php
//if(isset($_SESSION['item_number']) && isset($_SESSION['size']))
//{
//	// Create connection
//    if(file_exists("db_settings.php")) {include("db_settings.php");}
//    if(file_exists("../db_settings.php")) {include("../db_settings.php");}
//    if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
//    if(file_exists("db_settings.php")) {include("db_settings.php");}
//	$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
//
//	// Check connection
//	if (mysqli_connect_errno($con))
//	{
//	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//	}
//
//	$string = "SELECT * FROM products WHERE Item_number='" . $_SESSION['item_number'] . "' AND Size='" . $_SESSION['size'] . "'";
//	$result = mysqli_query($con,$string);
//
//	while($row = mysqli_fetch_array($result))
//	{
//		$brand = $row['Brand'];
//		$brandName = $row['Brand_name'];
//		$itemname = $row['Item_name'];
//		$stock = $row['stock'] - 1;
//		$sold = $row['Quantity_sold'] + 1;
//		$updatesql = "UPDATE products SET stock=" . $stock . " WHERE Item_number='" . $_SESSION['item_number'] . "' AND Size='" . $_SESSION['size'] . "'";
//		$result = mysqli_query($con,$updatesql);
//		$updatesql = "UPDATE products SET Quantity_sold=" .  $sold. " WHERE Item_number='" . $_SESSION['item_number'] . "'";
//		$result = mysqli_query($con,$updatesql);
//
//
//        $Price = $_SESSION['price'];
//        $Shipping = $_SESSION['shipping'];
//        $Brand_username = $_SESSION['brand'];
//        $Item_number = $_SESSION['itemnumber'];
//        $Item_name = $_SESSION['itemname'];
//        $Description = $_SESSION['description'];
//        $Name = $_SESSION['name'];
//        $Address1 = $_SESSION['address1'];
//        $Address2 = $_SESSION['address2'];
//        $Town = $_SESSION['town'];
//        $Region = $_SESSION['region'];
//        $Postcode = $_SESSION['postcode'];
//        $Contact = $_SESSION['contact'];
//
//        //Update Sales Table
//        $sql = "INSERT INTO sales (Date, Price, Shipping, BrandUsername, Item_Number, Item_name, Description, Name, Address1, Address2, Postcode, Contact)
//    VALUES (" .
//            "now(), " .
//            $Price . ", " .
//            $Shipping . ", '" .
//            $Brand_username . "', '" .
//            $Item_number . "', '" .
//            $Item_name . "', '" .
//            $Description . "', '" .
//            $Name . "', '" .
//            $Address1 . "," . $Address2 . "', '" .
//            $Town . "," . $Region . "', '" .
//            $Postcode . "', '" .
//            $Contact . "');";
//        $result = mysqli_query($con,$sql);
//
//
//        $sql = "DELETE FROM unhandledtransactions WHERE
//        Price=" . $Price .
//        " AND Shipping=" . $Shipping .
//        " AND Brand_username='" . $Brand_username .
//        "' AND Item_number='" . $Item_number .
//        "' AND Item_name='" . $Item_name .
//        "' AND Description='" . $Description .
//        "' AND Name='" . $Name .
//        "' AND Address1='" . $Address1 .
//        "' AND Address2='" . $Address2 .
//        "' AND Town='" . $Town .
//        "' AND Region='" . $Region .
//        "' AND Postcode='" . $Postcode .
//        "' AND Contact='" . $Contact .
//        "';";
//
//
//
//        $result = mysqli_query($con,$sql);
//	}
//
//	$string = "SELECT * FROM brands WHERE ID='" . $brand . "'";
//	$result = mysqli_query($con,$string);
//	while($row = mysqli_fetch_array($result))
//	{
//		$email = $row['Paypal_email'];
//	}
//
//
//	//Notify success
//	$address = "zooqie.com@gmail.com";
//	$e_subject = 'Item sold!';
//
//	$e_body = 'Item: ' . $_SESSION['item_number'] . ' Size: ' . $_SESSION['size'] . ' has been purchased!';
//	$e_content = "";
//	$e_reply = "";
//
//	$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );
//
//	$headers = "From: Zooqie" . PHP_EOL;
//	$headers .= "Reply-To: Zooqie" . PHP_EOL;
//	$headers .= "MIME-Version: 1.0" . PHP_EOL;
//	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
//	$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
//
//	if(mail($address, $e_subject, $msg, $headers)) {
//		// Email has sent successfully, echo a success page.
//	} else {
//	}
//
//	if($stock == 0)
//	{
//		//Notify out of stock
//		$address = "zooqie.com@gmail.com";
//		$e_subject = 'Item out of stock';
//
//		$e_body = 'Item: ' . $_SESSION['item_number'] . ' Size: ' . $_SESSION['size'] . ' is out of stock!';
//		$e_content = "";
//		$e_reply = "";
//
//		$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );
//
//		$headers = "From: Zooqie" . PHP_EOL;
//		$headers .= "Reply-To: Zooqie" . PHP_EOL;
//		$headers .= "MIME-Version: 1.0" . PHP_EOL;
//		$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
//		$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
//
//		if(mail($address, $e_subject, $msg, $headers)) {
//			// Email has sent successfully, echo a success page.
//		} else {
//		}
//	}
//
//
//	//Notify success to brand
//	$address = $email;
//	$e_subject = 'Item sold!';
//
//	$e_body = '<b>The following item has been sold on Zooqie:</b> '."<br/>"."<br/>".'<b>Item:</b> ' . $itemname ."<br/>". ' <b>Size:</b> ' . $_SESSION['size'] ."<br/>".'Please check your PayPal account for shipping and transaction details'."<br/>"."<br/>".'<b>Remaining stock:</b> You have ' .$stock. ' stock remaining for this item in this size.'."<br/>"."<br/>".'This is an automated email, please do not respond to it. If you have any queries, please email info@zooqie.com'."<br/>"."<br/>".'Zooqie';$e_content = "";
//	$e_reply = "";
//
//	$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );
//
//	$headers = "From: Zooqie" . PHP_EOL;
//	$headers .= "Reply-To: Zooqie" . PHP_EOL;
//	$headers .= "MIME-Version: 1.0" . PHP_EOL;
//	$headers .= "Content-type: text/html; charset=ISO-8859-1" . PHP_EOL;
//
//	if(mail($address, $e_subject, $msg, $headers)) {
//		// Email has sent successfully, echo a success page.
//	} else {
//	}
//
//	mysqli_close($con);
//
//	session_unset ( );
//}
//?>
<div id="txt_12" style="position:absolute;left:20px;top:219px;width:960px;height:105px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C">Your payment has been successful. You will receive and email from Paypal shortly
    confirming the payment.</span></p>
<p class="Wp-Body-P"><span class="Body-C">Please check the individual brand for delivery times.</span></p>
<p class="Wp-Body-P"><span class="Body-C">If there are any problems, please feel free to <a href="contact.php" style="text-decoration:underline;">contact us</a>.</span></p>
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

