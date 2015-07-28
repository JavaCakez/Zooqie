<?php
if($_POST && trim($_POST['search']) != '')
{
    $q=trim($_POST['search']);
    $q = strtolower($q);

    // Create connection
    if(file_exists("db_settings.php")) {include("db_settings.php");}
    if(file_exists("../db_settings.php")) {include("../db_settings.php");}
    if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
    if(file_exists("db_settings.php")) {include("db_settings.php");}

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //Remove 'search.php' from end
    $url = substr($url, 0, -10);

    $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

    //Brand query
    $sql_res=mysqli_query($con, "select * from brands where Live = '1' AND (Brand_name like '$q%' or ID like '$q%') order by Brand_name LIMIT 5");

    $colourQuery = '';
    if (strpos($q,'beige') !== false) {
        $colourQuery = " AND products.Colour = 'Beige' ";
        $q = str_replace("beige", "", $q);
        $q = trim($q);
    } else if (strpos($q,'black') !== false) {
        $colourQuery = " AND products.Colour = 'Black' ";
        $q = str_replace("black", "", $q);
        $q = trim($q);
    } else if (strpos($q,'blue') !== false) {
        $colourQuery = " AND products.Colour = 'Blue' ";
        $q = str_replace("blue", "", $q);
        $q = trim($q);
    } else if (strpos($q,'brown') !== false) {
        $colourQuery = " AND products.Colour = 'Brown' ";
        $q = str_replace("brown", "", $q);
        $q = trim($q);
    } else if (strpos($q,'copper') !== false) {
        $colourQuery = " AND products.Colour = 'Copper' ";
        $q = str_replace("copper", "", $q);
        $q = trim($q);
    } else if (strpos($q,'cream') !== false) {
        $colourQuery = " AND products.Colour = 'Cream' ";
        $q = str_replace("cream", "", $q);
        $q = trim($q);
    } else if (strpos($q,'gold') !== false) {
        $colourQuery = " AND products.Colour = 'Gold' ";
        $q = str_replace("gold", "", $q);
        $q = trim($q);
    } else if (strpos($q,'green') !== false) {
        $colourQuery = " AND products.Colour = 'Green' ";
        $q = str_replace("green", "", $q);
        $q = trim($q);
    } else if (strpos($q,'grey') !== false) {
        $colourQuery = " AND products.Colour = 'Grey' ";
        $q = str_replace("grey", "", $q);
        $q = trim($q);
    } else if (strpos($q,'maroon') !== false) {
        $colourQuery = " AND products.Colour = 'Maroon' ";
        $q = str_replace("maroon", "", $q);
        $q = trim($q);
    } else if (strpos($q,'multi') !== false) {
        $colourQuery = " AND products.Colour = 'Multi' ";
        $q = str_replace("multi", "", $q);
        $q = trim($q);
    } else if (strpos($q,'navy') !== false) {
        $colourQuery = " AND products.Colour = 'Navy' ";
        $q = str_replace("navy", "", $q);
        $q = trim($q);
    } else if (strpos($q,'orange') !== false) {
        $colourQuery = " AND products.Colour = 'Orange' ";
        $q = str_replace("orange", "", $q);
        $q = trim($q);
    } else if (strpos($q,'pink') !== false) {
        $colourQuery = " AND products.Colour = 'Pink' ";
        $q = str_replace("pink", "", $q);
        $q = trim($q);
    } else if (strpos($q,'purple') !== false) {
        $colourQuery = " AND products.Colour = 'Purple' ";
        $q = str_replace("purple", "", $q);
        $q = trim($q);
    } else if (strpos($q,'red') !== false) {
        $colourQuery = " AND products.Colour = 'Red' ";
        $q = str_replace("red", "", $q);
        $q = trim($q);
    } else if (strpos($q,'silver') !== false) {
        $colourQuery = " AND products.Colour = 'Silver' ";
        $q = str_replace("silver", "", $q);
        $q = trim($q);
    } else if (strpos($q,'tan') !== false) {
        $colourQuery = " AND products.Colour = 'Tan' ";
        $q = str_replace("tan", "", $q);
        $q = trim($q);
    } else if (strpos($q,'white') !== false) {
        $colourQuery = " AND products.Colour = 'White' ";
        $q = str_replace("white", "", $q);
        $q = trim($q);
    } else if (strpos($q,'yellow') !== false) {
        $colourQuery = " AND products.Colour = 'Yellow' ";
        $q = str_replace("yellow", "", $q);
        $q = trim($q);
    }

    // HACK: quick hack to ensure if there is a brand result, then no second column (to force only one column)
    // TODO clean up hack
    $numResults = mysqli_num_rows($sql_res);
    if ($numResults == 0) {
        // Category search
        $sql_res2=mysqli_query($con, "select distinct Item_name, Item_number, Brand, Image_URL1 from products, brands, categories where products.Brand = brands.ID AND products.category = categories.ID AND (categories.keywords like '%$q%') $colourQuery AND brands.Live = '1' order by Item_name LIMIT 5");
        // Product name search
        $sql_res3=mysqli_query($con, "select distinct Item_name, Item_number, Brand, Image_URL1 from products, brands where products.Brand = brands.ID AND (Item_name like '%$q%') $colourQuery AND brands.Live = '1' order by Item_name LIMIT 5");
    } else {
        $sql_res2=mysqli_query($con, "select distinct Item_name, Item_number, Brand, Image_URL1 from products, brands, categories where products.Brand = brands.ID AND products.category = categories.ID AND (categories.keywords like 'qweqwdqwdef') $colourQuery AND brands.Live = '1' order by Item_name LIMIT 5");
        // Product name search
        $sql_res3=mysqli_query($con, "select distinct Item_name, Item_number, Brand, Image_URL1 from products, brands where products.Brand = brands.ID AND (Item_name like 'qwdwqdqdqwd') $colourQuery AND brands.Live = '1' order by Item_name LIMIT 5");
    }

    // If category search yields no results use product name search instead
    $numResults2 = mysqli_num_rows($sql_res2);
    if ($numResults2 == 0) {
        $sql_res2 = $sql_res3;
    }

    $maxResults = 50*max(mysqli_num_rows($sql_res), mysqli_num_rows($sql_res2));
    $borderSize = 0;
    if($maxResults != 0) {$borderSize = 1;}
    $borderRadius = 0;

    ?>
        <div   <?php if($numResults == 0) {echo 'style="display:none; ';} else {echo 'style= '; } ?><?php echo ' "float:left; width:268px; height:'.$maxResults.'px; margin-top:12px; background-color: #f2f2f2;
        border-bottom: '.$borderSize.'px solid #ccc;
    border-left: '.$borderSize.'px solid #ccc;
    border-top: '.$borderSize.'px solid #ccc; '?>
            <?php
            if($numResults2 == 0) {
                echo ' border-right: '.$borderSize.'px solid #ccc;
                -moz-border-top-right-radius: '.$borderRadius.'px;
                -moz-border-bottom-right-radius: '.$borderRadius.'px;
                -webkit-border-top-right-radius: '.$borderRadius.'px;
                -webkit-border-bottom-right-radius: '.$borderRadius.'px;
                border-top-right-radius: '.$borderRadius.'px;
                border-bottom-right-radius: '.$borderRadius.'px;';
            }
            if($numResults2 > $numResults1) {
                echo '
                -moz-border-bottom-left-radius: '.$borderRadius.'px;
                -webkit-border-bottom-left-radius: '.$borderRadius.'px;
                border-bottom-left-radius: '.$borderRadius.'px;';
            }
            echo '"';
            ?>>
        <?php

    $counter = 0;
    while($row=mysqli_fetch_array($sql_res))
    {
        $username=stripslashes($row['Brand_name']);
        $s = $row['ID'];
        $img = $url . $row['shopbybrand_URL'];

        $result2 = mysqli_query($con,"SELECT * FROM brandfolders WHERE ID = '" . $s . "'");
        while($row2 = mysqli_fetch_array($result2))
        {
            $foldername = $url . 'brands/' . $row2['Folder_name'];
        }

        $counter++;
        ?>

        <a class="search" href="<?php echo $foldername; ?>" style="text-decoration: none;  "  >
            <div id="show" class="show" align="left" style="text-align:center; height:50px; width:100%
            <?php if ($counter == $numResults && $numResults2 == 0) { echo "border-bottom: 0px solid #ccc;
                border-right: 0px solid #ccc;
                border-left: 0px solid #ccc;
                -moz-border-bottom-left-radius: '.$borderRadius.'px;
                -moz-border-bottom-right-radius: '.$borderRadius.'px;
                -webkit-border-bottom-left-radius: '.$borderRadius.'px;
                -webkit-border-bottom-right-radius: '.$borderRadius.'px;
                border-bottom-right-radius: '.$borderRadius.'px;
                border-bottom-left-radius: '.$borderRadius.'px;"; } ?>

            <?php if ($counter == 1 && $numResults2 == 0) { echo "border-bottom: 0px solid #ccc;
                border-right: 0px solid #ccc;
                border-left: 0px solid #ccc;
                -moz-border-top-right-radius: '.$borderRadius.'px;
                -webkit-border-top-right-radius: '.$borderRadius.'px;
                border-top-right-radius: '.$borderRadius.'px;"; } ?>

                ">
                <img src="<?php echo $img; ?>" style="width:83px; height:50px; float:left; margin-right:6px;" />
                <span class="name" >
                    <br/><?php echo $username; ?>
                </span>
                <br/>

            </div>
        </a>


    <?php
    }

        $counter = 0;
    ?>
    </div>
    <div align="left" <?php if($numResults2 == 0) {echo 'style="display:none; ';} else {echo 'style= '; } ?> <?php if($numResults == 0) {echo ' "float:left; border-left: '.$borderSize.'px solid #ccc;';} else {echo ' "float:right; '; } ?><?php echo ' width:268px; height:'.$maxResults.'px;margin-top:12px; background-color: #f2f2f2;
    border-bottom: '.$borderSize.'px solid #ccc;
    border-right: '.$borderSize.'px solid #ccc;
    border-top: '.$borderSize.'px solid #ccc;
    -moz-border-top-right-radius: '.$borderRadius.'px;
    -moz-border-bottom-right-radius: '.$borderRadius.'px;
    -webkit-border-top-right-radius: '.$borderRadius.'px;
    -webkit-border-bottom-right-radius: '.$borderRadius.'px;
    border-top-right-radius: '.$borderRadius.'px;
    border-bottom-right-radius: '.$borderRadius.'px;
    "'?>>
    <?php


    while($row=mysqli_fetch_array($sql_res2))
    {
        $username=stripslashes($row['Item_name']);
        $itemno=strtolower($row['Item_number']);
        $s = strtolower($row['Brand']);
        $img = $url . $row['Image_URL1'];

        $result2 = mysqli_query($con,"SELECT * FROM brandfolders WHERE ID = '" . $s . "'");
        while($row2 = mysqli_fetch_array($result2))
        {
            $foldername = $url . 'brands/' . $row2['Folder_name'];
        }
        $counter++;
        ?>

            <a class="search" href="<?php echo $foldername . '/' . $itemno . '.php' ; ?>" style="text-decoration: none; "  >
                <div id="show" class="show" align="left" style="text-align:center; height:50px; width:100%;
                <?php if ($counter == $numResults2) { echo "border-bottom: 0px solid #ccc;
                border-right: 0px solid #ccc;
                border-left: 0px solid #ccc;
                -moz-border-bottom-left-radius: '.$borderRadius.'px;
                -moz-border-bottom-right-radius: '.$borderRadius.'px;
                -webkit-border-bottom-left-radius: '.$borderRadius.'px;
                -webkit-border-bottom-right-radius: '.$borderRadius.'px;
                border-bottom-right-radius: '.$borderRadius.'px;
                border-bottom-left-radius: '.$borderRadius.'px;"; } ?>

                <?php if ($counter == 1) { echo "border-bottom: 0px solid #ccc;
                border-right: 0px solid #ccc;
                border-left: 0px solid #ccc;
                -moz-border-top-right-radius: '.$borderRadius.'px;
                -webkit-border-top-right-radius: '.$borderRadius.'px;
                border-top-right-radius: '.$borderRadius.'px;"; } ?>

                ">
                    <img src="<?php echo $img; ?>" style="width:39px; height:50px; float:left; margin-right:6px;" />
                    <span class="name">
                        <br/><?php echo $username; ?>
                    </span>
                    <br/>

                </div>
            </a>



    <?php
    }
    ?>
    </div>


    <?php
}
?>