<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Brands Log In | ZOOQIE</title>
        <meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. Zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
        <?
            //Variable declarations
            $folderLevel = 0;
            $folderString = '';
            $names = array('Home', 'Log In');
            $links = array('index.php', 'login.php');
            $pageHeight = 300;

            include($folderString . 'php/head.php');
        ?>

        <script type="text/javascript">
        function validate_form_25( form )
            {
                if( ltrim(rtrim(form.elements['USERNAME'].value,' '),' ')=="" ) { alert("Please give your username"); form.elements['USERNAME'].focus(); return false; }
                if( ltrim(rtrim(form.elements['PASSWORD'].value,' '),' ')=="" ) { alert("Please give your password"); form.elements['PASSWORD'].focus(); return false; }
                return true;
            }
        </script>
        <style type="text/css">
            .Heading-1-C
            {
                font-family:"Harabara", serif; color:#656565; font-size:24px; line-height:1.50em;
            }
            .Normal-C
            {
                font-family:"Lato", sans-serif; font-size:13px; line-height:1.23em;
            }
        </style>
    </head>


    <body>
        <div class="pageWrapper">
            <? include($folderString . 'php/header.php'); ?>
            <div class="pageContent" style="height:<?echo $pageHeight;?>px;">
                <? include($folderString . 'php/navBar.php'); ?>

                <div id="txt_2" style="position:absolute;left:36px;top:141px;width:220px;height:52px;overflow:hidden;">
                    <h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Brands Log In</span></h1>
                </div>
                <form id="form_25" name="userinfo_2" onsubmit="return validate_form_25(this)" action="loginScript.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" style="margin:0;position:absolute;left:36px;top:194px;width:453px;height:106px;">
                    <div id="txt_4" style="position:absolute;left:8px;top:8px;width:165px;height:16px;overflow:hidden;">
                        <p class="Wp-Normal-P"><label for="edit_1"><span class="Normal-C">Username or Brand Name</span></label></p>
                    </div>
                    <input type="text" id="edit_1" name="USERNAME" maxlength="50" value="" style="position:absolute; left:215px; top:8px; width:186px;">
                    <div id="txt_5" style="position:absolute;left:8px;top:38px;width:67px;height:16px;overflow:hidden;">
                        <p class="Wp-Normal-P"><label for="edit_2"><span class="Normal-C">Password</span></label></p>
                    </div>
                    <input type="password" id="edit_2" name="PASSWORD" maxlength="25" value="" style="position:absolute; left:215px; top:38px; width:186px;">
                    <input type="submit" style="position:absolute; left:243px; top:68px; width:76px; height:22px;" id="butn_1" name="Login" value="Log In">
                    <input type="reset" style="position:absolute; left:327px; top:68px; width:72px; height:22px;" id="butn_2" name="Reset" value="Clear">
                </form>
                <script type="text/javascript" src="js/jsValidation.js"></script>

            </div>
            <? include($folderString . 'php/footer.php'); ?>
        </div>
    </body>
</html>
