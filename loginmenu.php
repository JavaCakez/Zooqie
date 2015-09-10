<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Brand Log In Menu | ZOOQIE</title>
        <?
            //Variable declarations
            $folderLevel = 0;
            $folderString = '';
            $names = array('Home', 'Log In Menu');
            $links = array('index.php', 'loginmenu.php');
            $pageHeight = 617;

            include($folderString . 'php/head.php');
        ?>


        <style type ="text/css">
            .Heading-2-CC
            {
                font-family:"Harabara", serif; color:#3A3A3A; font-size:22px; line-height:1.47em;
            }
            .Heading-2-CD
            {
                font-family:"Harabara", serif; color:#3A3A3A; font-size:15px; line-height:1.47em;
            }
            .Body-C-C0
            {
                font-family:"Harabara", serif; color:#2c2c2c; font-size:32px; line-height:1.47em;
            }
        </style>
    </head>


    <body >
        <div class="pageWrapper">
            <? include($folderString . 'php/header.php'); ?>
            <div class="pageContent" style="height:<?echo $pageHeight;?>px;">
                <? include($folderString . 'php/navBar.php'); ?>

                <div style="position:relative; width:100%;">
                    <img src="images\storeimages\THC_background2.jpg" alt="" width="1000" height="577" />

                    <div style = "position:absolute; top: 80px; left: 370px; width: 270px; text-align: center;background-color:#ececec; opacity:.85">
                        <span class="Body-C-C0">Brand Login Menu</span>
                    </div>

                    <div style ="position:absolute; top:250px; width:500px; float: left; text-align: center; background-color:#ececec; opacity:.85">
                    <br><span class="Heading-2-CC"><a class = "hlink_1" style = "text-decoration:none;" href = "uploadmenu.php"> Upload Tool</a></span>
                    <br><span class="Heading-2-CD">Upload and edit products and store appearance</span></br><br>
                    </div>

                    <div style ="position:absolute; top:250px; left:500px; width:500px; text-align: center; background-color:#ececec; opacity:.85">
                    <br><span class="Heading-2-CC"><a class = "hlink_1" style = "text-decoration:none;" href = "dashboard.php"> Dashboard</span> </a>
                    <br><span class="Heading-2-CD">View sales and views performance </span></br><br>
                    </div>
                </div>

            </div>
            <? include($folderString . 'php/footer.php'); ?>
        </div>
    </body>
</html>

