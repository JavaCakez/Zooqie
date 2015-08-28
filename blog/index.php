<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Blog | Zooqie </title>
        <meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
        <?
            //Variable declarations
            $folderLevel = 1;
            $folderString = '../';
            $names = array('Home', 'Blog');
            $links = array('../index.php', '../blog');
            $pageHeight = 1646;

            include($folderString . 'php/head.php');
        ?>

        <style type="text/css">
            .Heading-3-P
            {
                margin:12px 0px 0px 144px; text-align:left; font-weight:400;
            }
            .Body-P
            {
                margin:0px 0px 12px 144px; text-align:left; font-weight:400;
            }
            .Body-C
            {
                font-family:"Lato", sans-serif; color:#2c2c2c; font-size:14px; line-height:1.29em;
            }
            .Heading-3-C
            {
                font-family:"Harabara", serif; color:#656565; font-size:16px; line-height:1.50em;
            }
            .Body-C-C0
            {
                font-family:"Lato", sans-serif; color:#e52b50; font-size:14px; line-height:1.29em;
            }
            .Body-C-C1
            {
                font-family:"Lato", sans-serif; color:#e52b50; font-size:14px; line-height:1.07em; vertical-align:40%;
            }
            .Heading-2-C-C1
            {
                font-family:"Harabara", serif; color:#ffffff; font-size:19px; line-height:1.47em;
            }
            .Heading-2-C-C2
            {
                font-family:"Harabara", serif; color:#e6e7e8; font-size:16px; line-height:1.50em;
            }
        </style>
    </head>


    <body>
        <div class="pageWrapper">
            <? include($folderString . 'php/header.php'); ?>
            <div class="pageContent" style="height:<?echo $pageHeight;?>px;">
                <? include($folderString . 'php/navBar.php'); ?>

                <div id="txt_482" style="position:absolute;left:20px;top:152px;width:662px;height:35px;overflow:hidden; background:#333333; border-radius:5px 5px 0 0; /*BorderDivStyle*/">
                    <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C-C1"><br></span></h2>
                </div>
                <div id="txt_483" style="position:absolute;left:21px;top:159px;width:661px;height:26px;overflow:hidden;">
                <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C-C2"> &nbsp;&nbsp;Zooqie Blog -<wbr> Latest Posts</span></h2>
                </div>
                <div id="frag_67" style="position:absolute;left:692px;top:152px;width:288px;height:89px;">
                    <a class="twitter-timeline" href="https://twitter.com/zooqie_uk" data-widget-id="389399212783177730">Tweets by @zooqie_uk</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                    <div class="fb-activity" data-app-id="Display all actions associated with this app ID" data-site="zooqie.com" data-action="likes, recommends, comments,posts" data-width="The pixel width of the plugin. Defaults to 300px" data-height="400px" data-colorscheme="light" data-header="true"></div>
                </div>

                <div style="position:absolute;left:692px;top:588px;width:288px;height:89px;">
                    <iframe src="http://snapwidget.com/bd/?u=em9vcWlldWt8aW58MTQwfDJ8M3x8eWVzfDV8ZmFkZU91dHxvblN0YXJ0fHllcw==&v=5714" title="Instagram Widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:294px; height:816px"></iframe>
                </div>


                <!-- Distances between posts: 185, 193, 193, 184, 191, 194, 194 -->
                <!-- avg = 190.5 -->
                <?php
                    $start = 211;
                    $offset = 190;
                    $i = 0;
                ?>



                <?php
                $tmpHeight = $start + ($offset * $i);
                $header = 'Zooqie.com: The Rise From The Ashes';
                $subHeader = 'Zooqie\'s back!';
                $day = '4';
                $daySuffix = 'th';
                $date = 'July 2014';
                $content = 'Officially trade-marked and backed by funding from the University of Exeter - Zooqie.com is bigger and badder than ever.';
                $link = 'rise-from-the-ashes.php';
                $linkText = '<br/>';
                $imgLoc = '../images/fb_logo.png';
                $imgDesc = 'Rise From The Ashes';
                ?>
                <div style="position:absolute;left:20px;top:<?php echo $tmpHeight;?>px;width:659px;height:161px; border-bottom: 1px solid #000000;overflow:hidden;">
                    <h3 class="Heading-3-P" style="margin-top:0px"><span class="Heading-3-C"><a href="<?php echo $link;?>" style="text-decoration:underline;"><?php echo $header;?></a></span></h3>
                    <p class="Body-P"><span class="Body-C-C0"><?php echo $day;?></span><span class="Body-C-C1"><?php echo $daySuffix;?></span><span class="Body-C-C0"><?php echo $date;?></span></p>
                    <p class="Body-P"><span class="Body-C"><?php echo $subHeader;?></span></p>
                    <p class="Body-P"><span class="Body-C"><?php echo $content;?></span></p>
                    <p class="Body-P"><span class="Body-C"><a href="<?php echo $link;?>"  target="_blank" style="text-decoration:underline;"><?php echo $linkText;?></a></span></p>
                </div>
                <a href="<?php echo $link;?>"><img src="<?php echo $imgLoc;?>" border="0" width="133" height="133" id="pic_327" title="" alt="<?php echo $imgDesc;?>" style="position:absolute;left:21px;top:<?php echo $tmpHeight;?>px; border-radius:5px 5px 5px 5px; "></a>
                <?php
                $i++;
                ?>



                <?php
                    $tmpHeight = $start + ($offset * $i);
                    $header = 'Zookie’s First Steps';
                    $subHeader = 'Zookie\'s first very own blog post!';
                    $day = '7';
                    $daySuffix = 'th';
                    $date = 'November 2013';
                    $content = 'Zookie launched on September 18th, nearly 2 months ago - it’s been a hell of a journey so far, but this is only the beginning!';
                    $link = 'first-steps.php';
                    $linkText = '<br/>';
                    $imgLoc = '../images/logo_black.png';
                    $imgDesc = 'First Steps';
                ?>
                <div style="position:absolute;left:20px;top:<?php echo $tmpHeight;?>px;width:659px;height:161px; border-bottom: 1px solid #000000;overflow:hidden;">
                    <h3 class="Heading-3-P" style="margin-top:0px"><span class="Heading-3-C"><a href="<?php echo $link;?>" style="text-decoration:underline;"><?php echo $header;?></a></span></h3>
                    <p class="Body-P"><span class="Body-C-C0"><?php echo $day;?></span><span class="Body-C-C1"><?php echo $daySuffix;?></span><span class="Body-C-C0"><?php echo $date;?></span></p>
                    <p class="Body-P"><span class="Body-C"><?php echo $subHeader;?></span></p>
                    <p class="Body-P"><span class="Body-C"><?php echo $content;?></span></p>
                    <p class="Body-P"><span class="Body-C"><a href="<?php echo $link;?>"  target="_blank" style="text-decoration:underline;"><?php echo $linkText;?></a></span></p>
                </div>
                <a href="<?php echo $link;?>"><img src="<?php echo $imgLoc;?>" border="0" width="133" height="133" id="pic_327" title="" alt="<?php echo $imgDesc;?>" style="position:absolute;left:21px;top:<?php echo $tmpHeight;?>px; border-radius:5px 5px 5px 5px; "></a>
                <?php
                    $i++;
                ?>
            </div>
            <? include($folderString . 'php/footer.php'); ?>
        </div>
    </body>
</html>

