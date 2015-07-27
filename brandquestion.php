<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Ask Brand a Question | ZOOQIE</title>
<meta name="viewport" content="width=590">
<meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. Zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/styles.css" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.jigowatt.review.js"></script>
<style type="text/css">
body{margin:0;padding:0;}
.Heading-1-C
{
    font-family:"Harabara", serif; color:#656565; font-size:24px; line-height:1.50em;
}
</style>
<link rel="stylesheet" href="css/wpstyles.css" type="text/css">
</head>
<body text="#000000" style="background:#ffffff; height:450px;">
<div style="background-color:transparent;margin-left:auto;margin-right:auto;position:relative;width:590px;height:450px;">
<div id="txt_2" style="position:absolute;left:20px;top:20px;width:550px;height:52px;overflow:hidden;">
<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Ask Brand a Question</span></h1>
</div>
<div id="frag_38" style="position:absolute;left:20px;top:72px;width:550px;height:280px;">
    <div id="contact">
    
    			<div id="message"></div>
    			<?$str = "contact-question.php?selleremail=" . $_GET['selleremail'];?>
    			<form method="post" action=<?echo $str;?> name="contactform" id="contactform">
                <input name="address" type="hidden" id="address" size="30" value="<?echo $_GET['selleremail'];?>" />
    			<fieldset>
    
    			<label for="name" accesskey="U"><span class="required">*</span> Your Name</label>
    			<input name="name" type="text" id="name" size="30" value="" />
    
    			<br />
    			<label for="email" accesskey="E"><span class="required">*</span> Email</label>
    			<input name="email" type="text" id="email" size="30" value="" />
    
    			<br />
    			<label for="comments" accesskey="C"><span class="required">*</span> Your Question</label>
    			<textarea name="comments" cols="40" rows="3" id="comments" style="width: 350px;"></textarea>
    
    
    			<br />
    			<p><span class="required">*</span> Are you human?</p>
    
    			<label for="verify" accesskey="V">&nbsp;&nbsp;&nbsp;3 + 1 =</label>
    			<input name="verify" type="text" id="verify" size="4" value="" style="width: 30px;" /><br /><br />
    
    			<input type="submit" class="submit" id="submit" value="Submit" />
    
    			</fieldset>
    
    			</form>
    
    	</div>
</div>
</div>
</body>
</html>