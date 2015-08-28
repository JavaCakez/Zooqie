<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Failed Payment | ZOOQIE</title>
        <meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. Zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
        <?
            //Variable declarations
            $folderLevel = 0;
            $folderString = '';
            $names = array('Home', 'Payment Failed');
            $links = array('index.php', 'paymentfail.php');
            $pageHeight = 700;

            include($folderString . 'php/head.php');
        ?>

        <style type="text/css">
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

                <div id="txt_2" style="position:absolute;left:20px;top:155px;width:960px;height:52px;overflow:hidden;">
                <h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Payment Failed</span></h1>
                </div>
                <div id="txt_12" style="position:absolute;left:20px;top:219px;width:960px;height:105px;overflow:hidden;">
                <p class="Wp-Body-P"><span class="Body-C">Your payment was unsuccessful. Please ensure you entered all your information correctly
                    and try again.</span></p>
                <p class="Wp-Body-P"><span class="Body-C">If problems persist, please feel free to <a href="contact.php" style="text-decoration:underline;">contact us</a>.</span></p>
                </div>

            </div>
            <? include($folderString . 'php/footer.php'); ?>
        </div>
    </body>
</html>