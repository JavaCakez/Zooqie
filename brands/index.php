<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<title>Brands | New up and coming independent brands from around the UK | ZOOQIE</title>
		<meta name="description" content="Discover all the varied and unique independent clothing brands on Zooqie.">
		<?
			//Variable declarations
			$folderLevel = 1;
			$folderString = '../';
			$names = array('Home', 'Brands');
			$links = array('../index.php', '../brands');
			$pageHeight = 1524;

			include($folderString . 'php/head.php');
		?>

		<style type ="text/css">
			.Heading-1-P
			{
				margin:32px 0px 4px 0px; text-align:center; font-weight:400;
			}
			.Heading-1-C-C0
			{
				font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
			}
			.Heading-1-C
			{
				font-family:"Harabara", serif; color:#656565; font-size:26px; line-height:1.47em;
			}
			.Heading-3-C-C10
			{
				font-family:"Harabara", serif; color:#656565; font-size:13px; line-height:1.54em; text-align: center;
			}
			.Heading-1-C-C12
			{
				font-family:"Lato"; color:#656565; font-size:13px; line-height:1.54em;
			}
		</style>

		<script type="text/javascript">
			<?php
				echoCookieFunctions();
			?>

			$(document).ready(function(){
				<?php
					//Echo all sliding Div jquery code
					echoSlidingDiv(1);
					echoSlidingDiv(2);
				?>
			});
		</script>
	</head>



	<body>
		<div class="pageWrapper">
			<? include($folderString . 'php/header.php'); ?>
			<div class="pageContent" style="height:<?echo $pageHeight;?>px;">
				<? include($folderString . 'php/navBar.php'); ?>

				<div style="position:absolute;left:0px;top:136px;width:211px;height:70px;overflow:hidden;">
				<h1 class="Heading-1-P" style="margin-top:0px; text-align:left;padding-left:20px;padding-top:5px;"><span class="Heading-1-C">Refine by:</span></h1>
				</div>
				<img src="../images/grey_bar.png" border="0" width="779" height="43" id="qs_288" alt="" style="position:absolute;left:211px;top:142px;">
				<div style="position:absolute;left:228px;top:149px;width:82px;height:36px;overflow:hidden;">
				<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C-C0">Sort by:</span></h1>
				</div>

				<form id="refineForm" name="refineForm"  accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:0px;top:0px;width:1035px;" >
					<?php

						if($_POST['Sort'] == '') $_POST['Sort'] = 'Newest';
						echoSortByComboBox(3, $_POST['Sort']);

						echo '
							<div style="position:absolute;left:20px;top:187px;width:169px; overflow:hidden; ">
						';

						// Create connection
						$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

						$result = mysqli_query($con,"SELECT * FROM brands WHERE Live=1");

						$locationCounter = 0;

						while($row = mysqli_fetch_array($result))
						{
							$temp = 'true';
							for ($j = 0; $j < $locationCounter; $j++)
							{
								if(ucwords(strtolower($locationStrings[$j])) == ucwords(strtolower($row['Location']))) $temp = 'false';
							}

							if($temp == 'true')
							{

								if(trim($row['Location']) != '') {
									$locationStrings[$locationCounter] = ucwords(strtolower($row['Location']));
									$locationCounter++;
								}
							}
						}
						if($locationStrings) {usort($locationStrings, 'strnatcasecmp');}

						echoRefineByHeader(1, "Gender");
						echoRefineByCheckboxes(1, array("Male", "Female"), "true");

						echoRefineByHeader(2, "Brand Location");
						echoRefineByCheckboxes(2, $locationStrings, "false");

						echo '
							</div>
						';

						$str = "WHERE Live = 1";
						$str .= constructGenderSqlString();
						$str .= constructGenericSqlString($locationCounter, $locationStrings, "Location");

						if($_POST['Sort'] == 'Default' || $_POST['Sort'] == '')
						{
						}
						else if($_POST['Sort'] == 'Asc')
						{
							$str .= " ORDER BY Brand_name";
						}
						else if($_POST['Sort'] == 'desc')
						{
							$str .= " ORDER BY Brand_name DESC";
						}
						else if($_POST['Sort'] == 'Newest')
						{
							$str .= " ORDER BY Date_added DESC";
						}

						$r = 0;
						$c = 0;

						$maxColumns = 3;
						$maxRows = 10;
						$maxItems = $maxColumns * $maxRows;

						$totalItems = 0;
						$result = mysqli_query($con,"SELECT * FROM brands " . $str . " ;");
						while($row = mysqli_fetch_array($result)) {
							if($row['Paypal_email'] != '')	$totalItems++;
						}

						$totalPages = ceil($totalItems/$maxItems);
						$w = 262;
						$h = 173;

						$x = 211;
						$y = 200;
						$y2 = 351;

						if($_POST['page'] == '') {
							$page = 1;
						}
						else {
							$page = intval($_POST['page']);
						}

						$offset = ($page-1)*$maxItems;
						$limit = $maxItems;

						$result = mysqli_query($con,"SELECT * FROM brands " . $str . " LIMIT ".$offset.", " . $limit);
						while($row = mysqli_fetch_array($result)) {

							$img = $row['shopbybrand_URL'];
							$name = $row['Brand_name'];
							$ID = $row['ID'];

							if($c == $maxColumns) {
								$c = 0;
								$r++;
							}
							$a = $x + ($c * $w);
							$b = $y + ($r * $h);
							echo '<img src="../' . $img . '" border="0" width="252" height="152" alt="" style="border-style:solid;border-width:1px;position:absolute;left:' . $a . 'px;top:' . $b . 'px; " >';

							$result3 = mysqli_query($con,"SELECT * FROM brandfolders WHERE ID = '" . $ID ."'");
							while($row3 = mysqli_fetch_array($result3)) {
								$foldername = $row3['Folder_name'];
							}
							echo '<a href="' . $foldername . '" >
								  <img src="../images/QS.png" border="0" width="252" height="152" title="" alt="' . $name . '" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px; " class="fader_img"></a>';

							$b = $y2 + ($r * $h);
							echo '<div style="position:absolute;left:' . $a . 'px;top:' . $b . 'px;width:252px;height:24px;overflow:hidden; " >
								  <h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C-C10">' . $name . '</span></h3>
								  </div>
								';

							$c++;

						}
						$b = $y2 + ($r * $h);
						$b = $b + 40;

						$leftval = 940 - ($totalPages*24);
						echo '
						<div style="position:absolute;left:'.$leftval.'px;top:' . $b . 'px;overflow:hidden; " >
						<h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C-C1">Page:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						';

						for ($j = 1; $j <= $totalPages; $j++) {
							if($page == $j) {
								echo '<button class="button large blue" style="color:white" name="page" type="submit" value="'.$j.'">'.$j.'</button>';
							}
							else {
								echo '<button class="button large" name="page" type="submit" value="'.$j.'">'.$j.'</button>';
							}
						}

						echo '</span></h3> 	</div>
						';
					mysqli_close($con);
					?>
				</form>
			</div>
			<? include($folderString . 'php/footer.php'); ?>
		</div>
	</body>
</html>