<?
ob_start (); // Buffer output
?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html lang="en">
    <head>
        <title><!--TITLE--></title>
        <meta content="<!--DESCRIPTION-->" name="description" property="og:description" />
        <?
            //Variable declarations
            $folderLevel = 1;
            $folderString = '../';
            $names = array('Home');
            $links = array('index.php');
            $pageHeight = 300;

            include($folderString . 'php/head.php');
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
                font-family:"Lato", serif; color:#656565; font-size:13px; line-height:1.54em;
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
            .Wp-Heading-3-P {
                text-align: center;
            }
        </style>

        <?
            echo '
            <script type="text/javascript">';
            echoCookieFunctions();
            echo '
            $(document).ready(function(){ ';

            echoSlidingDiv(1);
            echoSlidingDiv(2);
            echoSlidingDiv(3);
            echoSlidingDiv(4);
            echoSlidingDiv(5);

            echo '});
            </script>';
        ?>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

        <?php
            $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

            $result = mysqli_query($con,"SELECT MAX(Price) as total FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = 1) AND " . $categorySql . " (Gender = 'M' OR Gender = 'U' OR Gender = 'F') ORDER BY Brand_name");
            $data=mysqli_fetch_array($result);
            $topPrice = $data['total'];

            echoRefineByPriceScript($topPrice)
        ?>

    </head>




    <body>
        <div class="pageWrapper">
            <? include($folderString . 'php/header.php'); ?>
            <div class="pageContent" style="height:<!--PAGEHEIGHTVAL1-->px;">
                <? include($folderString . 'php/navBar.php'); ?>

    <img src="../images/grey_bar.png" border="0" width="784" height="43" id="qs_288" alt="" style="position:absolute;left:208px;top:142px; " >

    <div style="position:absolute;left:229px;top:149px;width:82px;height:36px;overflow:hidden; " >
        <h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Sort by:</span></h1>
    </div>



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
            $result = mysqli_query($con,"SELECT * FROM products WHERE Brand = '".$brow['ID']."'  ORDER BY Brand_name");


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




    $q = strtolower(trim($_POST['search']));
    if ($q != '') {
        $searchWords = explode(" ", $q);

        $searchSuccess = 'false';
        //Search for gender in query string
        foreach ($searchWords as $word) {
            if (strtolower($word) == 'male' || strtolower($word) == 'men' || strtolower($word) == 'mens' || strtolower($word) == "men's" || strtolower($word) == 'guy' || strtolower($word) == 'guys' || strtolower($word) == 'boy' || strtolower($word) == 'boys') {
                if ($_POST['Male'] == '') $_POST['Male'] = 'on';
                $searchSuccess = 'true';
            }
            if (strpos(strtolower($word),'female') !== false || strpos(strtolower($word),'girls') !== false || strpos(strtolower($word),'girl') !== false || strpos(strtolower($word),"female's") !== false || strpos(strtolower($word),"girl's") !== false || strpos(strtolower($word),"females") !== false || strpos(strtolower($word),"women") !== false || strpos(strtolower($word),"womens") !== false || strpos(strtolower($word),"woman") !== false || strpos(strtolower($word),"womans") !== false) {
                if ($_POST['Female'] == '') $_POST['Female'] = 'on';
                $searchSuccess = 'true';
            }
            if (strpos(strtolower($word),'unisex') !== false) {
                if ($_POST['Female'] == '') $_POST['Female'] = 'on';
                if ($_POST['Male'] == '') $_POST['Male'] = 'on';
                $searchSuccess = 'true';
            }
        }


        //Search for brands in query string
        $sql_res=mysqli_query($con, "select * from brands where Live = '1'");
        while($row = mysqli_fetch_array($sql_res)) {
            foreach ($searchWords as $word) {
                if (strpos(strtolower($row['Brand_name']),$word) !== false || strpos($word,strtolower($row['Brand_name'])) !== false) {
                    if ($_POST[$row['ID']] == '') $_POST[$row['ID']] = 'on';
                    $searchSuccess = 'true';
                }
            }
        }

        //Search for colours in query string
        foreach ($colourStrings as $colour) {
            if (strpos($q,strtolower($colour)) !== false) {
                if ($_POST[$colour] == '') $_POST[$colour] = 'on';
                $searchSuccess = 'true';
            }
        }

        //Search for categories in query string
        foreach ($categoryStrings as $categoryString) {
            $result = mysqli_query($con, "SELECT * FROM categories WHERE Name = '" . $categoryString . "'");
            while ($row = mysqli_fetch_array($result)) {
                $keywords = $row['Keywords'];
            }
            $keywordz = explode(",", $keywords);
            foreach ($keywordz as $keyword) {
                if (strpos($q, strtolower($keyword)) !== false) {
                    $categoryString = removeSpaces($categoryString);
                    if ($_POST[$categoryString] == '') $_POST[$categoryString] = 'on';
                    $searchSuccess = 'true';
                }
            }
        }
    }














    echo '
		<div style="position:absolute;left:20px;top:340px;width:169px; overflow:hidden; ">
	';

    echo '
		<div>
		<h1 class="Heading-1-P" style="margin-top:0px"><span class="Heading-1-C-C10">';
    echo 'Search Results';
    echo '</span></h1>
		<br/>
		</div>
		
		<div>
		<p class="Wp-Body-P"><span class="Body-C">Browse all ';

    echo 'items';

    echo ' across all the independent brands on our store.</span></p>
		</div>
	';


    echoRefineByHeader(5, "Refine by Gender");
    echoRefineByCheckboxes(5, array("Male", "Female"), "true");

    echoRefineByHeader(2, "Refine by Type");
    echoRefineByCheckboxes(2, $categoryStrings, "true");

    echoRefineByHeader(1, "Refine by Brand");
    echoRefineByCheckboxes(1, $brandStrings, "true");

    echoRefineByHeader(3, "Refine by Price");
    echoRefineByPrice(3);


    echoRefineByHeader(4, "Refine by Colour");
    echoRefineByCheckboxes(4, $colourStrings, "true");


    echo '
		</div>	
	';


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
        $genderSqlStr   = constructGenderSqlString();
        $brandSqlStr    = constructGenericSqlString($brandCounter, $brandStrings, "Brand_name");
        $categorySqlStr = constructGenericSqlString($categoryCounter, $categoryStrings, "Category");
        $priceSqlStr    = constructPriceSqlString();
        $colourSqlStr   = constructGenericSqlString($colourCounter, $colourStrings, "Colour");
        $sqlStr .= $genderSqlStr . $brandSqlStr . $categorySqlStr . $priceSqlStr . $colourSqlStr;

        if ($brandSqlStr == '') {
            disableCheckboxes('Brand_name', $sqlStr, $con, 1);
        }
        if ($categorySqlStr == '') {
            disableCheckboxes('Category', $sqlStr, $con, 2);
        }
        if ($colourSqlStr == '') {
            disableCheckboxes('Colour', $sqlStr, $con, 4);
        }
        if ($genderSqlStr == '') {
            disableCheckboxes('Gender', $sqlStr, $con, 5);
        }


        //TODO: utils these
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


        //TODO: utils pagination
        $r = 0;
        $c = 0;

        $maxColumns = 4;
        $maxRows = 10;
        $maxItems = $maxColumns * $maxRows;

        $totalItems = 0;

        $bresult = mysqli_query($con,"SELECT * FROM brands WHERE Live = 1 ORDER BY Brand_name");
        while($brow = mysqli_fetch_array($bresult))
        {
            if ($searchSuccess == 'false') {
                $productNameStr .= " AND Item_name like '%$q%' ";
            }

            $result = mysqli_query($con,"SELECT DISTINCT Item_number FROM products WHERE Brand = '".$brow['ID']."' ". $productNameStr . $sqlStr );
            while($row = mysqli_fetch_array($result))
            {
                $totalItems++;
            }
        }

        if ($totalItems == 0) {
            $bresult = mysqli_query($con,"SELECT * FROM brands WHERE Live = 1 ORDER BY Brand_name");
            while($brow = mysqli_fetch_array($bresult))
            {
                if ($searchSuccess == 'false') {
                    $productNameStr .= " AND Item_name like '%$q%' ";
                }

                $result = mysqli_query($con,"SELECT DISTINCT Item_number FROM products WHERE Brand = '".$brow['ID']."' " . $sqlStr );
                while($row = mysqli_fetch_array($result))
                {
                    $totalItems++;
                }
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

        if ($searchSuccess == 'false') {
            $productNameStr .= " AND Item_name like '%$q%' ";
        }
        $result = mysqli_query($con,"SELECT * FROM (SELECT DISTINCT Item_number FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = 1) ". $productNameStr . $sqlStr  .") AS tmp_table  LIMIT ".$offset.", " .$limit);
        if (mysqli_num_rows($result) == 0) {
            $result = mysqli_query($con,"SELECT * FROM (SELECT DISTINCT Item_number FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = 1) ". $sqlStr .") AS tmp_table  LIMIT ".$offset.", " .$limit);
        }
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



            </div>
            <? include($folderString . 'php/footer.php'); ?>
        </div>
    </body>
    </html>








<?
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer


$pageTitle = 'Search Results | ZOOQIE';

$minHeight = 1650;
$ph = $b + 40;
if($ph < $minHeight) $ph = $minHeight;
$pageHeight = $ph ;
$pageHeightVal1 = $ph  + 222;
$pageHeightVal2 = $ph  + 14;
$pageHeightVal3 = $ph  + 65;
$pageHeightVal4 = $ph  + 162;
$pageHeightVal5 = $ph  + 183;
$pageHeightVal6 = $ph  + 115;


$d = 'Zooqie Search Results';

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
$array1 = array("<!--TITLE-->", '<!--NAVBAR-->', '<!--PAGEHEIGHT-->', '<!--PAGEHEIGHTVAL1-->', '<!--PAGEHEIGHTVAL2-->', '<!--PAGEHEIGHTVAL3-->', '<!--PAGEHEIGHTVAL4-->', '<!--PAGEHEIGHTVAL5-->', '<!--PAGEHEIGHTVAL6-->', '<!--DESCRIPTION-->');//Values to replace 
$array2 = array($pageTitle, $navBar, $pageHeight, $pageHeightVal1, $pageHeightVal2, $pageHeightVal3, $pageHeightVal4, $pageHeightVal5, $pageHeightVal6, $d);  //Replacements. 

$str = str_replace($array1, $array2, $pageContents);
echo $str;
?>