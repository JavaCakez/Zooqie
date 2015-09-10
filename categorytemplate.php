<?
ob_start (); // Buffer output
?>






    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><!--TITLE--></title>
        <meta name="viewport" content="width=1000">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script type="text/javascript" src="../js/jquery.js"></script>

        <!--[if lt IE 9]><script src="../js/html5.js"></script><![endif]-->


        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <meta content="<!--DESCRIPTION-->" name="description" property="og:description" />

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


























        <?


        $pageName = strtolower(curPageName());
        $category = $pageName;
        if(curFolderName() == 'men')
        {
            $gender = 'M';
        }
        else
        {
            $gender = 'F';
        }


        // Create connection
        $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

        // Check connection
        if (mysqli_connect_errno($con))
        {
//        echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
        }
        else
        {
            if($category != 'all')
            {
                $result = mysqli_query($con,"SELECT * FROM categories WHERE ID = '".ucwords($category)."'");
                while($row = mysqli_fetch_array($result))
                {
                    $categoryName = $row['Name'];
                }
            }
            else
            {
                $categoryName = 'All';
            }
        }
        ?>

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
            .Heading-1-C-C0
            {
                font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
            }
            .Heading-1-C-C10
            {
                font-family:"Harabara", serif; color:#656565; font-size:24px; line-height:1.47em;
            }
            .Heading-1-C-C1
            {
                font-family:"Harabara", serif; color:#656565; font-size:13px; line-height:1.54em;
            }
            .Heading-1-C-C12
            {
                font-family:"Lato"; color:#656565; font-size:13px; line-height:1.54em;
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

        <?
        echo '
        <script type="text/javascript">';
        echoCookieFunctions();
        echo '
        $(document).ready(function(){ ';
        if($category == 'all') {
            echoSlidingDiv(1);
            echoSlidingDiv(2);
            echoSlidingDiv(3);
            echoSlidingDiv(4);
        } else {
            echoSlidingDiv(1);
            echoSlidingDiv(3);
            echoSlidingDiv(4);
        }
        echo '});
        </script>';
        ?>









        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

        <?php
            $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

            $result = mysqli_query($con,"SELECT MAX(Price) as total FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = 1) AND " . $categorySql . " (Gender = '".$gender."' OR Gender = 'U') ORDER BY Brand_name");
            $data=mysqli_fetch_array($result);
            $topPrice = $data['total'];
            echoRefineByPriceScript($topPrice);
        ?>




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
                font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
            }
            .Body-C-C0
            {
                font-family:"Harabara", serif; color:#2c2c2c; font-size:32px; line-height:1.47em;
            }


        </style>



        <script type="text/javascript">


        </script>
    </head>


    <body text="#000000" style="background:#ffffff url('../images/backgroundpattern.png') repeat fixed top center; height:<!--PAGEHEIGHTVAL1-->px; /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3); "  >

    <!--Master Page Body Start-->


    <?php
    echoFooter(1, '<!--PAGEHEIGHTVAL-->');
    echoFacebookScript();
    echoHeader(1, '<!--PAGEHEIGHTVAL1-->');
    echoSocialMediaFollowButtons();
    echoGoogleAnalyticsScript();
    ?>



    <img src="../images/navbar.png" border="0" width="1000" height="40" id="qs_1" alt="Navigation Bar" style="position:absolute;left:0px;top:80px;" >
    <!--NAVBAR-->





































    <!-- shopbybrand.jpg - Emb. Bitmap pic_57 -->



    <!--    <img src="../images/shopbybrand.jpg" border="1" width="984" height="186" id="pic_57" alt="" style="position:absolute;left:8px;top:144px; " >-->



    <!-- Quick Rectangle qs_288 -->



    <img src="../images/grey_bar.png" border="0" width="784" height="43" id="qs_288" alt="" style="position:absolute;left:208px;top:142px; " >



    <!-- HTML Frame - Sort by: txt_225 -->


    <div id="txt_225" style="position:absolute;left:229px;top:149px;width:82px;height:36px;overflow:hidden; " >

        <h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Sort by:</span></h1>
    </div>






    <!--    <img src="../images/white_bar.png" border="1" width="243" height="60" title="" alt="" style="position:absolute;left:30px;top:185px; ">-->
    <!-- HTML Frame - Shop by Brand txt_295 -->


    <!--    <div id="txt_295" style="position:absolute;left:39px;top:193px;width:288px;height:54px; " >-->
    <!---->
    <!--        <p class="Wp-Body-P"><span class="Body-C-C0">Visit Brand Shops</span></p>-->
    <!--    </div>-->
    <!---->
    <!---->
    <!---->
    <!---->
    <!--    <div id="frag_42" style="position:absolute;left:95px;top:253px;width:144px;height:32px; " >-->
    <!--        <a class="button medium black" href="../brands"><span >CLICK HERE</span></a>-->
    <!--    </div>-->


    <form id="refineForm" name="refineForm"  accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0;position:absolute;left:0px;top:-200px;width:1035px;" >
        <?php


        if ($_GET['na'] == 'on' && ($_POST['Sort'] == ''))
        {
            $_POST['Sort'] = 'Newest';
        }
        if ($_GET['mp'] == 'on' && ($_POST['Sort'] == ''))
        {
            $_POST['Sort'] = 'Popularity';
        }

        if($_POST['Sort'] == '' && $_GET['mp'] == '' && $_GET['na'] == '') $_POST['Sort'] = 'Asc';
        echoSortByComboBox(1, $_POST['Sort']);



        // Create connection
        $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

        // Check connection
        if (mysqli_connect_errno($con))
        {
            echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
        }
        else
        {
            $bresult = mysqli_query($con,"SELECT * FROM brands WHERE Live = 1 ORDER BY Brand_name");
            $brandCounter = 0;
            $categoryCounter = 0;
            $colourCounter = 0;
            while($brow = mysqli_fetch_array($bresult))
            {
                if($category != 'all') $result = mysqli_query($con,"SELECT * FROM products WHERE Brand = '".$brow['ID']."' AND Category = '".$categoryName."' AND (Gender = '".$gender."' OR Gender = 'U') ORDER BY Brand_name");
                if($category == 'all') $result = mysqli_query($con,"SELECT * FROM products WHERE Brand = '".$brow['ID']."' AND (Gender = '".$gender."' OR Gender = 'U') ORDER BY Brand_name");


                while($row = mysqli_fetch_array($result))
                {
                    $temp = 'true';
                    for ($j = 0; $j < $brandCounter; $j++)
                    {
                        if(ucwords(strtolower($brandStrings[$j])) == ucwords(strtolower($row['Brand_name']))) $temp = 'false';
                    }

                    if($temp == 'true')
                    {
                        $brandStrings[$brandCounter] = $row['Brand_name'];
                        $brandCounter++;
                    }

                    $temp = 'true';
                    for ($j = 0; $j < $categoryCounter; $j++)
                    {
                        if(ucwords(strtolower($categoryStrings[$j])) == ucwords(strtolower($row['Category']))) $temp = 'false';
                    }

                    if($temp == 'true')
                    {
                        $categoryStrings[$categoryCounter] = ucwords(strtolower($row['Category']));
                        $categoryCounter++;
                    }

                    $temp = 'true';
                    for ($j = 0; $j < $colourCounter; $j++)
                    {
                        if(ucwords(strtolower($colourStrings[$j])) == ucwords(strtolower($row['Colour']))) $temp = 'false';
                    }

                    if($temp == 'true')
                    {
                        $colourStrings[$colourCounter] = ucwords(strtolower($row['Colour']));
                        $colourCounter++;
                    }
                }
            }

            usort($categoryStrings, 'strnatcasecmp');
            usort($colourStrings, 'strnatcasecmp');
        }



        echo '
		<div style="position:absolute;left:20px;top:340px;width:169px; overflow:hidden; ">
	';

        echo '
		<div>
		<h1 class="Heading-1-P" style="margin-top:0px"><span class="Heading-1-C-C10">';
        if($categoryName == 'All') echo $categoryName . ' ';
        if($gender == 'M') echo 'Men';
        if($gender == 'F') echo 'Women';
        echo '&#39;s ';
        if($categoryName != 'All') echo $categoryName;
        echo '</span></h1>
		<br/>
		</div>
		
		<div>
		<p class="Wp-Body-P"><span class="Body-C">Browse all ';
        if($gender == 'M') echo 'men';
        if($gender == 'F') echo 'women';
        echo '&#39;s ';
        if($categoryName == 'All') echo 'items';
        if($categoryName != 'All') echo strtolower($categoryName);
        echo ' across all the independent brands on our store.</span></p>
		</div>
	';

        if($categoryName == 'All')
        {
            echoRefineByHeader(2, "Refine by Type");
            echoRefineByCheckboxes(2, $categoryStrings, "true");
        }

        echoRefineByHeader(1, "Refine by Brand");
        echoRefineByCheckboxes(1, $brandStrings, "true");

        echoRefineByHeader(3, "Refine by Price");
        echoRefineByPrice(3);

        echoRefineByHeader(4, "Refine by Colour");
        echoRefineByCheckboxes(4, $colourStrings, "true");

        echo '
		</div>	
	';


        ?>



        <?

        // Create connection
        $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

        // Check connection
        if (mysqli_connect_errno($con))
        {
            echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
        }
        else
        {
            $sqlStr = '';
            $brandSqlStr    = constructGenericSqlString($brandCounter, $brandStrings, "Brand_name");
            $categorySqlStr = constructGenericSqlString($categoryCounter, $categoryStrings, "Category");
            $priceSqlStr    = constructPriceSqlString();
            $colourSqlStr   = constructGenericSqlString($colourCounter, $colourStrings, "Colour");
            $sqlStr .= $brandSqlStr . $categorySqlStr . $priceSqlStr . $colourSqlStr;

            if ($brandSqlStr == '') {
                disableCheckboxes('Brand_name', $sqlStr, $con, 1);
            }
            if ($categorySqlStr == '') {
                disableCheckboxes('Category', $sqlStr, $con, 2);
            }
            if ($colourSqlStr == '') {
                disableCheckboxes('Colour', $sqlStr, $con, 4);
            }

            if($_POST['Sort'] == 'Default' || $_POST['Sort'] == '')
            {
            }
            else if($_POST['Sort'] == 'Brandasc')
            {
                $sqlStr .= " ORDER BY Brand_name";
            }
            else if($_POST['Sort'] == 'Branddesc')
            {
                $sqlStr .= " ORDER BY Brand_name DESC";
            }
            else if($_POST['Sort'] == 'Asc')
            {
                $sqlStr .= " ORDER BY Item_name";
            }
            else if($_POST['Sort'] == 'desc')
            {
                $sqlStr .= " ORDER BY Item_name DESC";
            }
            else if($_POST['Sort'] == 'Price asc')
            {
                $sqlStr .= " ORDER BY Price";
            }
            else if($_POST['Sort'] == 'Price desc')
            {
                $sqlStr .= " ORDER BY Price DESC";
            }
            else if($_POST['Sort'] == 'Newest')
            {
                $sqlStr .= " ORDER BY Date_added DESC";
            }
            else if($_POST['Sort'] == 'Popularity')
            {
                $sqlStr .= " ORDER BY Quantity_sold DESC";
            }



            $r = 0;
            $c = 0;

            $maxColumns = 4;
            $maxRows = 10;
            $maxItems = $maxColumns * $maxRows;

            $totalItems = 0;

            $bresult = mysqli_query($con,"SELECT * FROM brands WHERE Live = 1 ORDER BY Brand_name");
            while($brow = mysqli_fetch_array($bresult))
            {
                if($category != 'all') $result = mysqli_query($con,"SELECT DISTINCT Item_number FROM products WHERE Brand = '".$brow['ID']."' AND Category = '".$categoryName."' AND (Gender = '".$gender."' OR Gender = 'U')" . $sqlStr);
                if($category == 'all') $result = mysqli_query($con,"SELECT DISTINCT Item_number FROM products WHERE Brand = '".$brow['ID']."' AND (Gender = '".$gender."' OR Gender = 'U')". $sqlStr);
                while($row = mysqli_fetch_array($result))
                {
                    $totalItems++;
                }
            }
            $totalPages = ceil($totalItems/$maxItems);


            $w = 198;
            $h = 331;

            $x = 208;
            $y = 397;
            $y2 = 640;
            $y3 = 664;
            $y4 = 688;


            $i = 0;

            if($_POST['page'] == '')
            {
                $page = 1;
            }
            else
            {
                $page = intval($_POST['page']);
            }

            $offset = ($page-1)*$maxItems;
            $limit = $maxItems;


            if($category != 'all') $result = mysqli_query($con,"SELECT * FROM (SELECT DISTINCT Item_number FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = 1) AND Category = '".$categoryName."' AND (Gender = '".$gender."' OR Gender = 'U')". $sqlStr .") AS tmp_table  LIMIT ".$offset.", " .$limit);
            if($category == 'all') $result = mysqli_query($con,"SELECT * FROM (SELECT DISTINCT Item_number FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = 1) AND(Gender = '".$gender."' OR Gender = 'U')". $sqlStr .") AS tmp_table  LIMIT ".$offset.", " .$limit);
            while($row = mysqli_fetch_array($result))
            {
                $itemno = $row['Item_number'];
                $res = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $itemno . "'");
                while($row = mysqli_fetch_array($res))
                {

                    $prevno[$i] = $itemno;
                    $i++;

                    $img = $row['Image_URL1'];
                    $brandName = $row['Brand_name'];
                    $brandID = strtolower($row['Brand']);

                    $bresult = mysqli_query($con,"SELECT * FROM brands WHERE Live = 1 AND ID = '".strtoupper($brandID)."'");
                    while($brow = mysqli_fetch_array($bresult))
                    {
                        if($brow['Live'] == 1)
                        {
                            $Live = 'yes';
                        }
                        else
                        {
                            $Live = 'no';
                        }
                    }

                    $fresult = mysqli_query($con,"SELECT * FROM brandfolders WHERE ID = '".strtoupper($brandID)."'");
                    while($frow = mysqli_fetch_array($fresult))
                    {
                        $brandfolder = $frow['Folder_name'];
                    }

                    $itemno = strtolower($row['Item_number']);
                    $itemname = stripslashes((($row['Item_name'])));
                    $price = $row['Price'];

                    $go = 'yes';
                    for($j = 0; $j < $i; $j++)
                    {
                        if($prevno[$j] == $itemno) $go = 'no';
                    }

                    if($go == 'yes')
                    {
                        if($c == $maxColumns)
                        {
                            $c = 0;
                            $r++;
                        }
                        $a = $x + ($c * $w);
                        $b = $y + ($r * $h);
                        echo '<img src="../' . $img . '" border="0" width="189" height="233" alt="" style="border-style:solid;border-width:1px;position:absolute;left:' . $a . 'px;top:' . $b . 'px; " >';


                        echo '<a href="../brands/'.$brandfolder.'/' . $itemno . '.php" >
						  <img src="../images/QS.png" border="0" width="189" height="235" title="" alt="' . $itemname . '" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px; " class="fader_img"></a>';



                        if($Live != 'yes')
                        {
                            echo '<img src="../images/comingsoon.png" border="0" width="189" height="235" title="" alt="' . $itemname . '" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px; " class="fader_img">';
                        }

                        $b = $y2 + ($r * $h);
                        echo '<div id="txt_28" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px;width:189px;height:24px;overflow:hidden; " >
						  <h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C-C0">';
                        if($Live == 'yes')
                        {
                            echo '<a href="../brands/'.$brandfolder.'/">' . $brandName . '</a></span></h3>';
                        }
                        else
                        {
                            echo '' . $brandName . '</span></h3>';
                        }
                        echo'
						  </div>';

                        $b = $y3 + ($r * $h);
                        echo '<div id="txt_320" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px;width:189px;height:24px;overflow:hidden; " >
							<h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C-C1">' . $itemname . '</span></h3>
							</div>';

                        $b = $y4 + ($r * $h);
                        echo '<div id="txt_29" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px;width:189px;height:24px;overflow:hidden; " >
							<h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C">' . '&pound' . $price . '</span></h3>
							</div>';
                        $c++;
                    }
                }
            }



            $b = $y4 + ($r * $h);
            $b = $b + 40;

            $leftval = 940 - ($totalPages*24);
            echo '
		<div style="position:absolute;left:'.$leftval.'px;top:' . $b . 'px;overflow:hidden; " >
		<h3 class="Wp-Heading-3-P" style="margin-top:0px"><span class="Heading-3-C-C1">Page:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		';

            for ($j = 1; $j <= $totalPages; $j++)
            {
                if($page == $j)
                {
                    echo '<button class="button large blue" style="color:white" name="page" type="submit" value="'.$j.'">'.$j.'</button>';
                }
                else
                {
                    echo '<button class="button large" name="page" type="submit" value="'.$j.'">'.$j.'</button>';
                }
            }

            echo '</span></h3> 	</div></form>
		';
        }

        mysqli_close($con);

        ?>



        <!--Master Page End-->
        <div id="nav-bar"></div>

        </div>
        <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="../js/totop.min.js"></script>
        <script type="text/javascript" src="../js/custom.js"></script>
        <!--Page Body End-->

    </body>
    </html>








<?
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

if($gender == 'M') $navBar = '<div class="nav_348style" id="nav_348" style="left: 20px; top: 91px; width: 960px; height: 26px; position: absolute;"><a id="nav_348_I0" href="../index.php" target="_self"> Home </a> &gt; <a id="nav_348_I2" href="../men/" target="_self"> Men </a> &gt; <a class=" currentpage" id="nav_348_I3" href="" target="_self"> '.$categoryName.' </a></div>';
if($gender == 'F') $navBar = '<div class="nav_348style" id="nav_348" style="left: 20px; top: 91px; width: 960px; height: 26px; position: absolute;"><a id="nav_348_I0" href="../index.php" target="_self"> Home </a> &gt; <a id="nav_348_I2" href="../women/" target="_self"> Women </a> &gt; <a class=" currentpage" id="nav_348_I3" href="" target="_self"> '.$categoryName.' </a></div>';

$pageTitle = '';
if($gender == 'M') $pageTitle = $pageTitle . "Men | ";
if($gender == 'F') $pageTitle = $pageTitle . "Women | ";
if($categoryName == 'All') $pageTitle = $pageTitle . 'All';
if($categoryName != 'All') $pageTitle = $pageTitle . $categoryName;
$pageTitle = $pageTitle . ' | ZOOQIE';

$minHeight = 1650;
$ph = $b + 40;
if($ph < $minHeight) $ph = $minHeight;
$pageHeight = $ph ;
$pageHeightVal1 = $ph  + 222;
$pageHeightVal2 = $ph  + 14;
$pageHeightVal3 = $ph  + 50;
$pageHeightVal4 = $ph  + 162;
$pageHeightVal5 = $ph  + 183;
$pageHeightVal6 = $ph  + 115;


if($gender == 'M') $d = $d . "Men's ";
if($gender == 'F') $d = $d . "Women's ";
if($categoryName == 'All') $d = 'All ' . $d . 'clothing across all independent brands on Zooqie';
if($categoryName != 'All') $d = $d . $categoryName . ' across all independent brands on Zooqie';

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
$array1 = array("<!--TITLE-->", '<!--NAVBAR-->', '<!--PAGEHEIGHT-->', '<!--PAGEHEIGHTVAL1-->', '<!--PAGEHEIGHTVAL2-->', '<!--PAGEHEIGHTVAL3-->', '<!--PAGEHEIGHTVAL4-->', '<!--PAGEHEIGHTVAL5-->', '<!--PAGEHEIGHTVAL6-->', '<!--DESCRIPTION-->');//Values to replace 
$array2 = array($pageTitle, $navBar, $pageHeight, $pageHeightVal1, $pageHeightVal2, $pageHeightVal3, $pageHeightVal4, $pageHeightVal5, $pageHeightVal6, $d);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>