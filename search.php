<?php
if($_POST && trim($_POST['search']) != '')
{
    $q=trim($_POST['search']);
    // Create connection
    if(file_exists("db_settings.php")) {include("db_settings.php");}
    if(file_exists("../db_settings.php")) {include("../db_settings.php");}
    if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
    if(file_exists("db_settings.php")) {include("db_settings.php");}

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //Remove 'search.php' from end
    $url = substr($url, 0, -10);

    $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

    $sql_res=mysqli_query($con, "select * from brands where Live = '1' AND (Brand_name like '$q%' or ID like '$q%') order by Brand_name LIMIT 5");
    $sql_res2=mysqli_query($con, "select distinct Item_name, Item_number, Brand, Image_URL1 from products, brands where products.Brand = brands.ID AND (Item_name like '$q%') AND brands.Live = '1' order by Item_name LIMIT 5");
    $maxResults = 50*max(mysqli_num_rows($sql_res), mysqli_num_rows($sql_res2));
    $borderSize = 0;
    if($maxResults != 0) {$borderSize = 2;}
    $numResults = mysqli_num_rows($sql_res);
    $numResults2 = mysqli_num_rows($sql_res2);
    ?>
        <div   <?php if($numResults == 0) {echo 'style="display:none; ';} else {echo 'style= '; } ?><?php echo ' "float:left; width:268px; height:'.$maxResults.'px; background-color: #f2f2f2;
        border-bottom: '.$borderSize.'px solid #ccc;
    border-left: '.$borderSize.'px solid #ccc;
    border-top: '.$borderSize.'px solid #ccc; '?>
            <?php
            if($numResults2 == 0) {
                echo ' border-right: '.$borderSize.'px solid #ccc;
                -moz-border-top-right-radius: 13px;
                -moz-border-bottom-right-radius: 13px;
                -webkit-border-top-right-radius: 13px;
                -webkit-border-bottom-right-radius: 13px;
                border-top-right-radius: 13px;
                border-bottom-right-radius: 13px;';
            }
            if($numResults2 > $numResults1) {
                echo '
                -moz-border-bottom-left-radius: 13px;
                -webkit-border-bottom-left-radius: 13px;
                border-bottom-left-radius: 13px;';
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
                -moz-border-bottom-left-radius: 10px;
                -moz-border-bottom-right-radius: 10px;
                -webkit-border-bottom-left-radius: 10px;
                -webkit-border-bottom-right-radius: 10px;
                border-bottom-right-radius: 10px;
                border-bottom-left-radius: 10px;"; } ?>

            <?php if ($counter == 1 && $numResults2 == 0) { echo "border-bottom: 0px solid #ccc;
                border-right: 0px solid #ccc;
                border-left: 0px solid #ccc;
                -moz-border-top-right-radius: 10px;
                -webkit-border-top-right-radius: 10px;
                border-top-right-radius: 10px;"; } ?>

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
    <div align="left" <?php if($numResults2 == 0) {echo 'style="display:none; ';} else {echo 'style= '; } ?> <?php if($numResults == 0) {echo ' "float:left; border-left: '.$borderSize.'px solid #ccc;';} else {echo ' "float:right; '; } ?><?php echo ' width:268px; height:'.$maxResults.'px; background-color: #f2f2f2;
    border-bottom: '.$borderSize.'px solid #ccc;
    border-right: '.$borderSize.'px solid #ccc;
    border-top: '.$borderSize.'px solid #ccc;
    -moz-border-top-right-radius: 13px;
    -moz-border-bottom-right-radius: 13px;
    -webkit-border-top-right-radius: 13px;
    -webkit-border-bottom-right-radius: 13px;
    border-top-right-radius: 13px;
    border-bottom-right-radius: 13px;
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
                -moz-border-bottom-left-radius: 10px;
                -moz-border-bottom-right-radius: 10px;
                -webkit-border-bottom-left-radius: 10px;
                -webkit-border-bottom-right-radius: 10px;
                border-bottom-right-radius: 10px;
                border-bottom-left-radius: 10px;"; } ?>

                <?php if ($counter == 1) { echo "border-bottom: 0px solid #ccc;
                border-right: 0px solid #ccc;
                border-left: 0px solid #ccc;
                -moz-border-top-right-radius: 10px;
                -webkit-border-top-right-radius: 10px;
                border-top-right-radius: 10px;"; } ?>

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