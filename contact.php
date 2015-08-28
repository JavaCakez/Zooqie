<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<title>Contact | Get in contact with us | Zooqie</title>
		<meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. Zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
		<?
			//Variable declarations
			$folderLevel = 0;
			$folderString = '';
			$names = array('Home', 'Contact Us');
			$links = array('index.php', 'contact.php');
			$pageHeight = 640;

			include($folderString . 'php/head.php');
		?>

		<!-- TODO: check this jigowatt thing -->
		<script type="text/javascript" src="js/jquery.jigowatt.js"></script>
		<style type="text/css">
		.Heading-2-C
		{
			font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
		}
		.Body-C
		{
			font-family:"Lato", sans-serif; color:#2c2c2c; font-size:14px; line-height:1.29em;
		}
		.Heading-1-C
		{
			font-family:"Harabara", serif; color:#656565; font-size:24px; line-height:1.50em;
		}
		</style>
	</head>


	<body>
		<div class="pageWrapper">
			<? include($folderString . 'php/header.php'); ?>
			<div class="pageContent" style="height:<?echo $pageHeight;?>px;">
				<? include($folderString . 'php/navBar.php'); ?>

				<div style="position:absolute;left:20px;top:275px;width:550px;height:449px;">
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
				<img src="images/line.png" border="0" width="330" height="1" id="pcrv_5" alt="" style="position:absolute;left:633px;top:284px;">
				<img src="images/line.png" border="0" width="330" height="1" id="pcrv_6" alt="" style="position:absolute;left:633px;top:347px;">
				<img src="images/line.png" border="0" width="330" height="1" id="pcrv_9" alt="" style="position:absolute;left:633px;top:495px;">
			</div>
			<? include($folderString . 'php/footer.php'); ?>
		</div>
	</body>
</html>

