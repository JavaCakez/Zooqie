<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en-gb">
    <head>
        <title>ZOOQIE | Shop men &amp; women&#39;s clothing from independent brands</title>
        <meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
        <? include('php/head.php');?>
    </head>

    <?
        //Variable declarations
        $folderLevel = 0;
        $names = array('Home');
        $links = array('index.php');
        //height of page (222 footer)
        $pageHeight = 1140 + 222;
    ?>

    <body>

        <div class="pageWrapper">
            <? include('php/header.php'); ?>
            <div class="pageContent">
                <? include('php/navBar.php'); ?>

                <div class="homePage-heroBanner">
                    <img class="homePage-heroBanner-image" src="images/hero4.png" alt="About Us | Who we are and what we're about | ZOOQIE">
                    <div class="homePage-heroBanner-overlay"></div>
                </div>

                <div class="homePage-navImages">
                    <a href="men/" class="homePage-navImage">
                        <img src="images/shop_men.png" alt="Shop men&#39;s clothes | Zooqie" >
                        <img src="images/QS.png" alt="Shop men&#39;s clothes | Zooqie" class="fader_img">
                    </a>

                    <a href="women/" class="homePage-navImage middle">
                        <img src="images/shop_women_2.png" alt="Shop women&#39;s clothes | Zooqie">
                        <img src="images/QS.png" alt="Shop women&#39;s clothes | Zooqie"  class="fader_img">
                    </a>

                    <a href="brands/" class="homePage-navImage">
                        <img src="images/mainbanner10.png" alt="Shop by brand | Zooqie" >
                        <img src="images/QS.png" alt="Shop by brand | Zooqie" class="fader_img">
                    </a>
                </div>

                <?
                // Create connection
                $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

                $sql_res=mysqli_query($con, "SELECT * FROM pageviews WHERE BrandUsername IN (SELECT ID FROM brands Where Live = 1) AND Date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND Date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY ORDER BY Count DESC LIMIT 10");

                $i = 0;
                while($row=mysqli_fetch_array($sql_res)) {
                    if ($i < 2) {

                        $PageName = $row['PageName'];
                        $BrandID = $row['BrandUsername'];
                        $Date = $row['Date'];
                        $Count = $row['Count'];

                        if (strlen($PageName) == 6) {

                            $sql_res2=mysqli_query($con, "SELECT * FROM products WHERE Item_number = '" . $PageName . "'");
                            while($row2=mysqli_fetch_array($sql_res2)) {
                                $Itemname[$i] = $row2['Item_name'];
                                $Itemnumber[$i] = $row2['Item_number'];
                                $Brandname[$i] = $row2['Brand_name'];
                                $image[$i] = $row2['Image_URL1'];

                            }

                            $sql_res2=mysqli_query($con, "SELECT * FROM brandfolders WHERE ID = '" . $BrandID . "'");
                            while($row2=mysqli_fetch_array($sql_res2)) {
                                $Foldername[$i] = $row2['Folder_name'];
                            }
                            $i++;
                        }
                    }
                }
                ?>

                <div style="width: 1000px; height: 355px; padding-bottom: 20px">
                    <div style="float: left; width: 500px;">
                        <h2 class="homePage-heading">Most Popular This Week</h2>

                        <div style="width:250px;float:left;">
                            <img src="<?echo $image[0]?>" width="208" height="259" style="border: solid 1px #E8E8E8;">
                            <a href="brands/<?echo $Foldername[0]?>/<?echo strtolower($Itemnumber[0])?>.php"><img src="images/QS.png" width="208" height="259" alt="<?echo $Itemname[0];?>" style="position:absolute;left:0;" class="fader_img"></a>
                            <h3 class="homePage-popularItems-heading" style="margin:0; float:left; width: 208px; text-align:center;">
                                <a href="brands/<?echo $Foldername[0]?>/"><?echo $Brandname[0]?></a>
                            </h3>
                            <h3 class="homePage-popularItems-subHeading" style="margin:0; float:left; width: 208px; text-align:center;">
                                <?echo $Itemname[0]?>
                            </h3>
                        </div>
                        <div style="width:250px;float:left;">
                            <img src="<?echo $image[1]?>" width="208" height="259" style="border: solid 1px #E8E8E8;">
                            <a href="brands/<?echo $Foldername[1]?>/<?echo strtolower($Itemnumber[1])?>.php"><img src="images/QS.png" width="208" height="259" alt="<?echo $Itemname[1];?>" style="position:absolute;left:250px;" class="fader_img"></a>
                            <h3 class="homePage-popularItems-heading" style="margin:0; float:left; width: 208px; text-align:center;">
                                <a href="brands/<?echo $Foldername[1]?>/"><?echo $Brandname[1]?></a>
                            </h3>
                            <h3 class="homePage-popularItems-subHeading" style="margin:0; float:left; width: 208px; text-align:center;">
                                <?echo $Itemname[1]?>
                            </h3>
                        </div>
                    </div>

                    <div style="float: left; width: 500px; height:89px;">
                        <h2 class="homePage-heading">Social</h2>

                        <a class="twitter-timeline" href="https://twitter.com/zooqie_uk" data-widget-id="389399212783177730">Tweets by @zooqie_uk</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
            <script type="text/javascript" src="js/totop.min.js"></script>
            <script type="text/javascript" src="js/custom.js"></script>

            <? include('php/footer.php'); ?>
        </div>
    </body>
</html>