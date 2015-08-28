<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en-gb">
	<head>
		<title>Men | Shop men&#39;s clothes, tees, hoodies, jackets &amp; more | ZOOQIE</title>
		<meta name="Description" content="Discover the latest men's clothing and accessories from independent brands across the UK with Zooqie. Shop for men's tees, hoodies, jackets and more." />
		<?
			//Variable declarations
			$folderLevel = 1;
			$folderString = '../';
			$names = array('Home', 'Men');
			$links = array('../index.php', '../men');
			$pageHeight = 690;

			include($folderString . 'php/head.php');
		?>

		<style type="text/css">
			body{margin:0;padding:0;}
			.Heading-2-P
			{
				margin:20px 0px 4px 0px; text-align:center; font-weight:400;
			}
			.Body-C
			{
				font-family:"Lato", sans-serif; color:#2c2c2c; font-size:14px; line-height:1.29em;
			}
			.Heading-2-C-C1
			{
				font-family:"Harabara", serif; color:#161616; font-size:32px; line-height:1.47em;
			}
			.Heading-1-P-P0
			{
				margin:0px 0px 4px 0px; text-align:left; font-weight:400;
			}
			.Body-C
			{
				font-family:"Lato", sans-serif; color:#2c2c2c; font-size:14px; line-height:1.29em;
			}
			.Heading-1-C-C1
			{
				font-family:"Harabara", serif; color:#cdcfd2; font-size:15px; line-height:1.47em;
			}

			a.hlink_5:link {color:#000000;}
			a.hlink_5:visited {color:#000000;}
			a.hlink_5:hover {color:#e52b50;}
			a.hlink_5:active {color:#cdcfd2;}
		</style>

	</head>


	<body>

		<div class="pageWrapper">
			<? include($folderString . 'php/header.php'); ?>
			<div class="pageContent" style="height:<?echo $pageHeight;?>px;">
				<? include($folderString . 'php/navBar.php'); ?>

				<img src="../images/menvests.png" border="0" width="407" height="299" id="pic_315" alt="" style="position:absolute;left:173px;top:140px;">
				<a href="vests.php"><img src="../images/QS.png" border="0" width="406" height="298" id="qs_314" alt="" style="position:absolute;left:173px;top:140px;" class="fader_img"></a>
				<img src="../images/menshorts.png" border="0" width="407" height="300" id="pic_314" alt="" style="position:absolute;left:173px;top:447px;">
				<img src="../images/mentees.png" border="0" width="406" height="607" id="pic_317" alt="" style="position:absolute;left:586px;top:140px;">
				<img src="../images/grey_box.png" border="0" width="159" height="46" id="qs_287" alt="" style="position:absolute;left:8px;top:140px;">
				<a href="tees.php"><img src="../images/QS.png" border="0" width="413" height="606" id="qs_317" alt="" style="position:absolute;left:587px;top:140px;" class="fader_img"></a>
				<div id="txt_264" style="position:absolute;left:8px;top:140px;width:159px;height:46px;overflow:hidden;">
					<h2 class="Heading-2-P" style="margin-top:0px"><span class="Heading-2-C-C1">Men</span></h2>
				</div>
				<img src="../images/line.png" border="0" width="94" height="1" id="pcrv_5" alt="" style="position:absolute;left:20px;top:240px;">
				<img src="../images/line.png" border="0" width="94" height="1" id="pcrv_15" alt="" style="position:absolute;left:20px;top:350px;">

				<a href="shorts.php"><img src="../images/QS.png" border="0" width="406" height="298" id="qs_434" alt="" style="position:absolute;left:173px;top:448px;" class="fader_img"></a>

				<div id="frag_58" style="position:absolute;left:20px;top:203px;width:139px;height:262px;">
					<!--Body-->
						<h1 class="Heading-1-P-P0"><span class="Heading-1-C-C1"><a class="hlink_5" href="../brands" style="text-decoration:none;">Shop By Brand</a></span></h1>
						<p class="Wp-Body-P"><span class="Body-C"><br></span></p>

						<h1 class="Heading-1-P-P0"><span class="Heading-1-C-C1"><a class="hlink_5" href="all.php" style="text-decoration:none;">All &nbsp;Men's</a></span></h1>
						<h1 class="Heading-1-P-P0"><span class="Heading-1-C-C1"><a class="hlink_5" href="all.php?na=on" style="text-decoration:none;">New Arrivals</a></span></h1>
						<h1 class="Heading-1-P-P0"><span class="Heading-1-C-C1"><a class="hlink_5" href="all.php?mp=on" style="text-decoration:none;">Most Popular</a></span></h1>
						<p class="Wp-Body-P"><span class="Body-C"><br></span></p>

						<?
							$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

							$result = mysqli_query($con,"SELECT * FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = 1) AND (Gender = 'M' OR Gender = 'U')");

							$categoryCounter = 0;
							while($row = mysqli_fetch_array($result))
							{
								$temp = 'true';
								for ($j = 0; $j < $categoryCounter; $j++)
								{
								   if(ucwords(strtolower($categoryStrings[$j])) == ucwords(strtolower($row['Category']))) $temp = 'false';
								}

								if($temp == 'true')
								{
									$categoryStrings[$categoryCounter] = $row['Category'];
									$categoryCounter++;
								}
							}


							$res = mysqli_query($con,"SELECT * FROM categories ORDER BY Name");
							while($r = mysqli_fetch_array($res))
							{
								for ($j = 0; $j < $categoryCounter; $j++)
								{
									if($categoryStrings[$j] == $r['Name'])
									{
										$ID = strtolower($r['ID']);
										$name = $r['Name'];
										echo '<h1 class="Heading-1-P-P0"><span class="Heading-1-C-C1"><a class="hlink_5" href="'.$ID.'.php" style="text-decoration:none;">'.$name.'</a></span></h1>';
									}
								}
							}
						?>
				</div>
			</div>
			<? include($folderString . 'php/footer.php'); ?>
		</div>
	</body>
</html>

