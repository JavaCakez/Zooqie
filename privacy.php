<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<title>Privacy Policy &amp; Cookies | Privacy information for Zooqie customers | ZOOQIE</title>
		<meta name="description" content="Zooqie is totally committed to protecting the privacy of our site visitors and customers.">
		<?
			//Variable declarations
			$folderLevel = 0;
			$folderString = '';
			$names = array('Home', 'Privacy');
			$links = array('index.php', 'privacy.php');
			$pageHeight = 800;

			include($folderString . 'php/head.php');
		?>

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

				<div style="position:absolute;left:20px;top:155px;width:960px;height:52px;overflow:hidden;">
				<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Privacy Policy &amp; Cookies</span></h1>
				</div>
				<div id="frag_15" style="position:absolute;left:20px;top:220px;width:960px;height:407px;">
					<div class="accordion">
						<section id="one">
							<h2><a href="#one">1. Your Privacy</a></h2>
							<div>
								<p>
									Zooqie is totally committed to protecting the privacy of our site visitors and customers. The Zooqie team members are customers themselves of other Internet sites and fully appreciate and respect the importance of privacy on the Internet. We will not disclose information about our customers to third parties except where it is part of providing a service to you - e.g. arranging for a product to be sent to you, carrying out credit and other security checks and for the purposes of customer research and profiling or where we have your express permission to do so.
								</p></div>
						</section>

						<section id="two">
							<h2><a href="#two">2. Your Consent</a></h2>
							<div>
								<p>
									We will not sell your name, address, e-mail address, credit card information or personal information to any third party without your permission, but we cannot be responsible or held liable for the actions of third party sites from which you may have linked or been directed to the Zooqie website.
								</p>
							</div>
						</section>

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

						<section id="four">
							<h2><a href="#four">4. Third party sites</a></h2>
							<div>
								<p>
									Our site may contain links to and from the websites of our partner networks, advertisers and other third parties. If you follow a link to any of these websites, please note that they have their own privacy policies and that we do not accept any responsibility or liability for these policies. Please check these policies before you submit any personal data to these websites.
								</p>
							</div>
						</section>
					</div>
				</div>

			</div>
			<? include($folderString . 'php/footer.php'); ?>
		</div>
	</body>
</html>

