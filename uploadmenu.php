<?php
    if(!session_id()) session_start();
    if(!isset($_SESSION['username'])){
    header("location:login.php");
}
else
{



    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Brand Upload Tool | Zooqie</title>
    <meta name="viewport" content="width=1000">
    <meta http-equiv="Expires" content="Tue, 01 Jan 1995 12:12:12 GMT">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="css/styles.css">
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.prettyphoto.js" charset="utf-8"></script>
    <!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->

    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">

    <!-------------------------------- Image upload tool ------------------------------------------------->
    <link href="image-upload-tool/assets/css/demo.html5imageupload.css?v1.3" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <!-------------------------------- Image upload tool ------------------------------------------------->


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

    if (isset($_GET['Tab']))
    {
        $tab = $_GET['Tab'];
    }
    else
    {
        $tab = '1';
    }

    ?>
    <script src="js/jquery.watermarkinput.js" type="text/javascript"></script>
    <!--Header code for HTML frag_66 -->
    <script type="text/javascript">

        function validate_form_99( form )
        {

            if ($("#action").val() == "delete") {
                return confirm("Are you sure you want to delete this shipping set?");
            }

            form.elements['GuideName'].value = form.elements['GuideName'].value.replace("'", "");
            if( ltrim(rtrim(form.elements['GuideName'].value,' '),' ')=="e.g. Tees/Vests Sizing" ) form.elements['GuideName'].value = "";
            if( ltrim(rtrim(form.elements['GuideName'].value,' '),' ')=="" ) { alert("Please Enter a name for the Sizing Guide"); form.elements['GuideName'].focus(); return false; }

            $('#butn_97').hide();
            $('#butn_98').hide();
            $('#loading_image3').show();

            return true;
        }
    </script>

    <!--Header code for HTML frag_51 -->



    <link rel="stylesheet" href="/css/colorbox.css">
    <script src="/js/jquery.colorbox.js"></script>
    <script>

        $(document).ready(function()
        {
            $(".inline").colorbox({inline:true, width:"1000px"});
        });
    </script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script>
        <?
                  // Create connection
                  if(file_exists("db_settings.php")) {include("db_settings.php");}
                    if(file_exists("../db_settings.php")) {include("../db_settings.php");}
                    if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
                  if(file_exists("db_settings.php")) {include("db_settings.php");}
                  $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
                  // Check connection
                  if (mysqli_connect_errno($con))
                  {
                  }
                  else
                  {
                      $result = mysqli_query($con,"SELECT * FROM brands WHERE Username = '". $_SESSION['username'] . "' OR ID = '". $_SESSION['username'] . "' OR Brand_name = '". $_SESSION['username'] . "'");
                      while($row = mysqli_fetch_array($result))
                      {
                          $id = $row['ID'];
                      }

                      $result = mysqli_query($con,"SELECT DISTINCT Item_number FROM products WHERE Brand = '". $id . "'");

                      $itemcounter = 0;
                      while($row = mysqli_fetch_array($result))
                      {
                          $itemcounter++;
                      }
                  }

              ?>
        $(function() {
            <?
                for ($i = 0; $i <= $itemcounter; $i++)
                {
                  echo '
                      $( "#tabs'.$i.'" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
                      $( "#tabs'.$i.' li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
                  ';
              }
            ?>
        });
    </script>
    <style>
        .ui-tabs-vertical { width: 45em; }
        .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 10em; }
        .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
        .ui-tabs-vertical .ui-tabs-nav li a { display:block;}
        .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
        .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 32em;}
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




    <script type="text/javascript">

        function validate_form_52( form )
        {
            if( (ltrim(rtrim(form.elements['newstock1'].value,' '),' ')!="") ||  ltrim(rtrim(form.elements['newsize1'].value,' '),' ')!="" )
            {
                if( ltrim(rtrim(form.elements['newsize1'].value,' '),' ')=="" ) { alert("You must input a corresponding Size for that stock"); form.elements['newsize1'].focus(); return false; }

                if( ltrim(rtrim(form.elements['newstock1'].value,' '),' ')=="" ) { alert("You must input a corresponding Stock for that Size"); form.elements['newstock1'].focus(); return false; }
                n = parseInt(ltrim(ltrim(rtrim(form.elements['newstock1'].value,' '),' '),'£'));
                if(form.elements['newstock1'].value != ''){if(isNaN(n) || n < 0){ alert("The stock must be a positive number"); form.elements['newstock1'].focus(); return false; }}
            }

            if( (ltrim(rtrim(form.elements['newstock2'].value,' '),' ')!="") ||  ltrim(rtrim(form.elements['newsize2'].value,' '),' ')!="" )
            {
                if( ltrim(rtrim(form.elements['newsize2'].value,' '),' ')=="" ) { alert("You must input a corresponding Size for that stock"); form.elements['newsize2'].focus(); return false; }

                if( ltrim(rtrim(form.elements['newstock2'].value,' '),' ')=="" ) { alert("You must input a corresponding Stock for that Size"); form.elements['newstock2'].focus(); return false; }
                n = parseInt(ltrim(ltrim(rtrim(form.elements['newstock2'].value,' '),' '),'£'));
                if(form.elements['newstock2'].value != ''){if(isNaN(n) || n < 0){ alert("The stock must be a positive number"); form.elements['newstock2'].focus(); return false; }}
            }

            if( (ltrim(rtrim(form.elements['newstock0'].value,' '),' ')!="") ||  ltrim(rtrim(form.elements['newsize0'].value,' '),' ')!="" )
            {
                if( ltrim(rtrim(form.elements['newsize0'].value,' '),' ')=="" ) { alert("You must input a corresponding Size for that stock"); form.elements['newsize0'].focus(); return false; }

                if( ltrim(rtrim(form.elements['newstock0'].value,' '),' ')=="" ) { alert("You must input a corresponding Stock for that Size"); form.elements['newstock0'].focus(); return false; }
                n = parseInt(ltrim(ltrim(rtrim(form.elements['newstock0'].value,' '),' '),'£'));
                if(form.elements['newstock0'].value != ''){if(isNaN(n) || n < 0){ alert("The stock must be a positive number"); form.elements['newstock0'].focus(); return false; }}
            }

            return true;
        }
    </script>
    <!--Header code for HTML frag_60 -->
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
        .Heading-3-Ca
        {
            font-family:"Lato", serif; color:#2c2c2c; font-size:14px; line-height:1.50em; font-weight:bold;
        }
        .Heading-1-C-C0
        {
            font-family:"Harabara", serif; color:#656565; font-size:19px; line-height:1.47em;
        }
        .Heading-1-C-C1
        {
            font-family:"Harabara", serif; color:#656565; font-size:13px; line-height:1.54em;
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

    <script type="text/javascript">

        function validate_form_93( form )
        {

            if ($("#action").val() == "delete") {
                return confirm("Are you sure you want to delete this shipping set?");
            }

            form.elements['Setname'].value = form.elements['Setname'].value.replace("'", "");
            if( ltrim(rtrim(form.elements['Setname'].value,' '),' ')=="e.g. Tees/Vests Shipping" ) form.elements['Setname'].value = "";
            if( ltrim(rtrim(form.elements['Setname'].value,' '),' ')=="" ) { alert("Shipping Set Name is required"); form.elements['Setname'].focus(); return false; }



            if( ltrim(rtrim(form.elements['UKS'].value,' '),' ')=="e.g. 0" ) form.elements['UKS'].value = "";
            if( ltrim(rtrim(form.elements['UKS'].value,' '),' ')=="" ) { alert("UK Standard Shipping Price is required"); form.elements['UKS'].focus(); return false; }

            n = parseInt(ltrim(ltrim(rtrim(form.elements['UKS'].value,' '),' '),'£'));
            if(isNaN(n) || n < 0){ alert("The shipping price must be a positive number"); form.elements['UKS'].focus(); return false; }

            if( ltrim(rtrim(form.elements['UKE'].value,' '),' ')=="e.g. 2.50" ) form.elements['UKE'].value = "";
            if( ltrim(rtrim(form.elements['UKE'].value,' '),' ')!="" )
            {
                n = parseInt(ltrim(ltrim(rtrim(form.elements['UKE'].value,' '),' '),'£'));
                if(isNaN(n) || n < 0){ alert("The shipping price must be a positive number"); form.elements['UKE'].focus(); return false; }
            }

            if( ltrim(rtrim(form.elements['Europe'].value,' '),' ')=="e.g. 4" ) form.elements['Europe'].value = "";
            if( ltrim(rtrim(form.elements['Europe'].value,' '),' ')!="" )
            {
                n = parseInt(ltrim(ltrim(rtrim(form.elements['Europe'].value,' '),' '),'£'));
                if(isNaN(n) || n < 0){ alert("The shipping price must be a positive number"); form.elements['Europe'].focus(); return false; }
            }

            if( ltrim(rtrim(form.elements['International'].value,' '),' ')=="e.g. 6" ) form.elements['International'].value = "";
            if( ltrim(rtrim(form.elements['International'].value,' '),' ')!="" )
            {
                n = parseInt(ltrim(ltrim(rtrim(form.elements['International'].value,' '),' '),'£'));
                if(isNaN(n) || n < 0){ alert("The shipping price must be a positive number"); form.elements['International'].focus(); return false; }
            }

            $('#butn_1').hide();
            $('#butn_2').hide();
            $('#loading_image').show();

            return true;
        }
    </script>





    <script type="text/javascript">

        function validate_form_30( form )
        {
            $('#butn_7').hide();
            $('#loading_image2').show();

            return true;
        }
    </script>
    <!--Header code for HTML frag_53 -->
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
        .Heading-1-C-C1
        {
            font-family:"Harabara", serif; color:#656565; font-size:13px; line-height:1.54em;
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
        .Body-C-C1a
        {
            font-family:"Lato", sans-serif; color:#2c2c2c; font-size:13px; line-height:1.38em;
        }
    </style>

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
        .Heading-1-C-C1
        {
            font-family:"Harabara", serif; color:#656565; font-size:13px; line-height:1.54em;
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('.accordion h2').click(function(){
                if( $(this).next().is(':hidden') )
                {
                    $('.accordion h2').removeClass('active').next().slideUp();
                    $(this).addClass('active').next().slideDown();
                }
                else
                {
                    $('.accordion h2').removeClass('active').next().slideUp();
                }
                return false;
            });
        });
    </script>

    <style type="text/css">
        .accordion { width: 793px;}       /* Accordion Width */
        .accordion div { height:auto; }  /* Section Height - Change this if you want to add more text to a section */
    </style>


    <script type="text/javascript">
        function validate_form_31( form )
        {
            if( ltrim(rtrim(form.elements['Brand_name'].value,' '),' ')=="" ) { alert("Please Enter a Brand Name"); form.elements['Brand_name'].focus(); return false; }
            if( ltrim(rtrim(form.elements['Desc'].value,' '),' ')=="" ) { alert("Please Enter a Brand Description"); form.elements['Desc'].focus(); return false; }
            if( ltrim(rtrim(form.elements['Desc'].value,' '),' ').length > 300 ) { alert("Brand Description must be less than 300 characters long."); form.elements['Desc'].focus(); return false; }
            if( ltrim(rtrim(form.elements['Location'].value,' '),' ')=="" ) { alert("Please Enter the location of where your brand is based"); form.elements['Location'].focus(); return false; }
            if( ltrim(rtrim(form.elements['Gender'].value,' '),' ')=="" ) { alert("Please Select a Gender"); form.elements['Gender'].focus(); return false; }
            if( ltrim(rtrim(form.elements['Email'].value,' '),' ')=="" ) { alert("Please Enter an Email Address"); form.elements['Email'].focus(); return false; }
            if( ltrim(rtrim(form.elements['Paypal_email'].value,' '),' ')=="" ) { alert("Please Enter a PayPal Email Address"); form.elements['Paypal_email'].focus(); return false; }
            if( ltrim(rtrim(form.elements['Facebook_URL'].value,' '),' ')!="" )
            {
                if(form.elements['Facebook_URL'].value.indexOf("https://") == -1)
                {
                    alert("Facebook URL must start with 'https://'"); form.elements['Facebook_URL'].focus(); return false;
                }
            }
            if( ltrim(rtrim(form.elements['Twitter_URL'].value,' '),' ')!="" )
            {
                if(form.elements['Twitter_URL'].value.indexOf("https://") == -1)
                {
                    alert("Twitter URL must start with 'https://'"); form.elements['Twitter_URL'].focus(); return false;
                }
            }

            $('#butn_33').hide();
            $('#loading_image33').show();

            return true;
        }
    </script>

    <script type="text/javascript">
        function validate_form_321( form )
        {
            if( ltrim(rtrim(form.elements['new_password'].value,' '),' ') != ltrim(rtrim(form.elements['new_password2'].value,' '),' ' ) ) { alert("New Password was re-typed incorrectly"); form.elements['new_password'].focus(); return false; }

            $('#butn_34').hide();
            $('#loading_image34').show();

            return true;
        }
    </script>
    <meta http-equiv="refresh" content="1200">
    <style type="text/css">
        body{margin:0;padding:0;}
        .wpfixed{position:absolute;}
        div > .wpfixed{position:fixed;}
        *{filter:inherit;}
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
        .Heading-1-C-C12
        {
            font-family:"Lato"; color:#656565; font-size:13px; line-height:1.54em;
        }
        .Body-C-C0
        {
            font-family:"Harabara", serif; color:#2c2c2c; font-size:19px; line-height:1.47em;
        }
        .Body-C-C1
        {
            font-family:"Harabara", serif; color:#2c2c2c; font-size:14px; line-height:1.50em;
        }

        #nav-bar {  min-height: 80px; background: #fff; }        /* Top bar height and colour */
        #nav > li:hover > a { border-top: 3px solid #E52B50; }    /* Navigation bar top border hover state colour */
        .button.amaranth { background-color: #E52B50; }           /* Button colour throughout site */


    </style>
    <script type="text/javascript" src="js/jspngfix.js"></script>
    <link rel="stylesheet" href="css/wpstyles.css" type="text/css">
    <script type="text/javascript">var blankSrc = "js/blank.gif";
    </script>
    <script type="text/javascript" src="js/jsRollover.js"></script>
    <script type="text/javascript">
        PPImgInit('roll_5','images/search.jpg','images/search-over.jpg','','',0,0);

    </script>
    </head>

    <?
    //height of page excluding footer
    $pageHeight = 2672;
    // 222 is footer height
    $tmpHeight = $pageHeight + 222;
    ?>

    <body text="#000000" style="background:#ffffff url('images/backgrounds/grey.png') repeat fixed top center; height:<?echo $tmpHeight;?>px;  /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3);">
    <!--Master Page Body Start-->


    <?php
    echoFacebookScript();
    echoHeader(0, 1000, $tmpHeight);
    echoFooter(0, $pageHeight);
    echoSocialMediaFollowButtons();
    echoNavBar(0, array('Home', 'Upload Tool'), array('index.php', 'uploadmenu.php'));
    ?>






    <div style = "position:absolute; top: 160px; left: 845px; width:140px; height: 50px; text-align: center; z-index: 100">
        <a class="Body-C-C1" href = "dashboard.php" style = "text-decoration:none;color:#E52B50; font-size:16px; "><< Dashboard Home</a>
    </div>


    <div id="sizing_guides_panel" style="position:absolute;left:171px;top:130px;width:828px;height:255px; <?if($tab != '4')
    {
        echo 'visibility:hidden;';
    }?>">
    <div id="txt_470" style="position:absolute;left:16px;top:27px;width:227px;height:33px;overflow:hidden;">
        <p class="Wp-Body-P"><span class="Body-C-C0">Create Sizing Guides</span></p>
    </div>
    <img src="images/line.png" border="0" width="793" height="1" id="pcrv_17" alt="" onload="OnLoadPngFix()" style="position:absolute;left:17px;top:69px;">
    <script type="text/javascript">
        $(document).ready(function(){
            $("#text_guidename").Watermark("e.g. Tees/Vests Sizing");
            $("#text_measurement0").Watermark("Measurement");
            $("#text_measurement1").Watermark("Measurement");
            $("#text_measurement2").Watermark("Measurement");
            $("#text_measurement3").Watermark("Measurement");
            $("#text_measurement4").Watermark("Measurement");
            $("#text_measurement5").Watermark("Measurement");
            $("#text_measurement6").Watermark("Measurement");
            $("#text_measurement7").Watermark("Measurement");
            $("#text_measurement8").Watermark("Measurement");
            $("#text_measurement9").Watermark("Measurement");
            $("#text_size0").Watermark("Size");
            $("#text_size1").Watermark("Size");
            $("#text_size2").Watermark("Size");
            $("#text_size3").Watermark("Size");
            $("#text_size4").Watermark("Size");
            $("#text_size5").Watermark("Size");
            $("#text_size6").Watermark("Size");
            $("#text_size7").Watermark("Size");
            $("#text_size8").Watermark("Size");
            $("#text_size9").Watermark("Size");

        });
    </script>

    <div id="frag_66" style="position:absolute;left:17px;top:92px;width:793px;height:49px;">
    <!--Body-->
    <div class="accordion">

        <section id="one">

            <h2><a href="#one"><img src="images/whatisthis.jpg" border="0"  title="" alt="Information image"  ></a></h2>
            <div>
                <p class="Wp-Body-P"><span class="Body-C">Sizing guides are displayed on product pages to give customers specific measurements
        					    of different sizes of a product. This tool allows you to create, edit and save your
        					    own custom sizing guides. For example, you may want to have a t-<wbr>shirts &amp; vests sizing
        					    guide since they have the same sizes but a separate trousers size guide since the
        					    measurements will be completely different. Sizing Guides are then saved and you can
        					    quickly choose which sizing guide you wish to use when you add or edit a product.</span></p>
                <p class="Wp-Body-P"><span class="Body-C">Please note: sizing guides are optional, but are recommended in order to improve
        					    user experience.</span></p>
            </div>
        </section>

    </div>
    <br/>

    <!--Preamble-->
    <div id="frag_59" >
    <!--Body-->

    <!--  Sizing Guide drop down  -->
    <form id="form_98" onsubmit="return validate_form_98(this)"  action="uploadmenu.php?Tab=4" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
        <?
        if($_POST['Guide'] == '') $_POST['Guide'] = 'New Sizing Guide';

        echo '
        							<select style="width:340px;" onChange="submit();" name="Guide" size="1">
        						    <option value="New Sizing Guide" 
        					';

        if($_POST['Guide'] == 'New Sizing Guide' || $_POST['Guide'] == '') echo 'selected';

        echo '
        						>New Sizing Guide</option>
        					';

        // Create connection
        include("db_settings.php");
        $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

        // Check connection
        if (mysqli_connect_errno($con))
        {
            echo '<div> Failed to connect to products database, please try again later.  </div>';
        }
        else
        {
            $result = mysqli_query($con,"SELECT * FROM sizingguides WHERE Brand = '". $id . "'");

            while($row = mysqli_fetch_array($result))
            {
                $guidename = $row['Name'];

                echo '
        						    	<option value="'.$guidename.'" 
        							';

                if($_POST['Guide'] == $guidename) echo 'selected';
                if($_POST['Guide'] == $guidename) $guiderows = $row['Rows'];
                if($_POST['Guide'] == $guidename) $guidecolumns = $row['Columns'];

                echo '
        								>'.$guidename.'</option>
        							';
            }
        }

        echo '
        						</select>
        					';
        if($_POST['Guide'] == 'New Sizing Guide') echo '<span class="Heading-3-Ca" style="margin-left:66px;">Example:</span>';
        if($_POST['Guide'] == 'New Sizing Guide' || $_POST['Guide'] == '') echo '<img src="images/Sizing_example.jpg" border="1" width="297" height="197" id="pic_318" alt="Sizing Guide Example" style="position:absolute;margin-left:35px;" >';

        echo '
        						<div style="width:340px;">
        					';



        if($_POST['rows'] == '') $_POST['rows'] = 1;
        if($_POST['columns'] == '') $_POST['columns'] = 3;

        if($_POST['Guide'] == 'New Sizing Guide' || $_POST['Guide'] == '')
        {
            echo '
        							<br/>
        							
        							<p class="Wp-Body-P"><span class="Heading-3-Ca">Measurements (Rows):</span>
        						';

            echo '
        							<select style="float:right; width:50px;position:relative;top:-10px;" onChange="submit();" name="rows" size="1"  >
        								<option value="1" ';if($_POST['rows'] == '1') echo'selected'; echo'>1</option>
        								<option value="2" ';if($_POST['rows'] == '2') echo'selected'; echo'>2</option>
        								<option value="3" ';if($_POST['rows'] == '3') echo'selected'; echo'>3</option>
        								<option value="4" ';if($_POST['rows'] == '4') echo'selected'; echo'>4</option>
        								<option value="5" ';if($_POST['rows'] == '5') echo'selected'; echo'>5</option>
        								<option value="6" ';if($_POST['rows'] == '6') echo'selected'; echo'>6</option>
        								<option value="7" ';if($_POST['rows'] == '7') echo'selected'; echo'>7</option>
        								<option value="8" ';if($_POST['rows'] == '8') echo'selected'; echo'>8</option>
        								<option value="9" ';if($_POST['rows'] == '9') echo'selected'; echo'>9</option>
        							</select></p>
        						';

            echo '
        							<br/>
        							<p class="Wp-Body-P"><span class="Heading-3-Ca">Sizes (Columns):</span>
        						';

            echo '
        						
        							<select style="float:right; width:50px;position:relative;top:-10px;" onChange="submit();" name="columns" size="1"  >
        								<option value="1" ';if($_POST['columns'] == '1') echo'selected'; echo'>1</option>
        								<option value="2" ';if($_POST['columns'] == '2') echo'selected'; echo'>2</option>
        								<option value="3" ';if($_POST['columns'] == '3') echo'selected'; echo'>3</option>
        								<option value="4" ';if($_POST['columns'] == '4') echo'selected'; echo'>4</option>
        								<option value="5" ';if($_POST['columns'] == '5') echo'selected'; echo'>5</option>
        								<option value="6" ';if($_POST['columns'] == '6') echo'selected'; echo'>6</option>
        								<option value="7" ';if($_POST['columns'] == '7') echo'selected'; echo'>7</option>
        								<option value="8" ';if($_POST['columns'] == '8') echo'selected'; echo'>8</option>
        								<option value="9" ';if($_POST['columns'] == '9') echo'selected'; echo'>9</option>
        							</select></p>
        						';
        }
        else
        {
            $_POST['rows'] = $guiderows;
            $_POST['columns'] = $guidecolumns;
        }
        ?>
    </form>
    <script type="text/javascript" src="js/jsValidation.js"></script>




    <form id="form_99" onsubmit="return validate_form_99(this)" action="sizing_guide.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?echo $id;?>">
        <input type="hidden" name="username" value="<?echo $_SESSION['username'];?>">
        <input type="hidden" name="Guide" value="<?echo $_POST['Guide'];?>">
        <input type="hidden" name="rows" value="<?echo $_POST['rows'];?>">
        <input type="hidden" name="columns" value="<?echo $_POST['columns'];?>">

        <!--  Size Name (for new guides)  -->
        <?

        echo '
        			
        						<br/><p class="Wp-Body-P"><span class="Heading-3-Ca">Sizing Guide Name: </span>
        					';

        if($_POST['Guide'] != 'New Sizing Guide')
        {
            echo '<textarea id="text_guidename" style="width: 170px;height:40px;float:right;position:relative;top:-10px;" rows="2" name="GuideName">'.$_POST['Guide'].'</textarea></p>';
        }
        else
        {
            echo '<textarea id="text_guidename" style="width: 170px;height:40px;float:right;position:relative;top:-10px;" rows="2" name="GuideName"></textarea></p>';
        }

        echo '</div><br/><br/>';
        ?>

        <!--  Table  -->
        <?

        if($_POST['Guide'] == 'New Sizing Guide' || $_POST['Guide'] == '')
        {
            echo '<table border="1" bordercolor="#000000" style="background-color:#FFFFFF" width="100%" cellpadding="0" cellspacing="0">';
            for($i = 0; $i <= intval($_POST['rows']); $i++)
            {
                echo '<tr align="center">';
                for($j = 0; $j <= intval($_POST['columns']); $j++)
                {
                    if($i == 0 && $j == 0)
                    {
                        echo '<td></td>';
                    }
                    else if($i == 0)
                    {
                        echo '<td align="center"><textarea id="text_size'.$j.'" style="width: 85%;" rows="1" name="r'.$i.'c'.$j.'"></textarea></td>';
                    }
                    else if($j == 0)
                    {
                        echo '<td align="center"><textarea id="text_measurement'.$i.'" style="width: 85%;" rows="1" name="r'.$i.'c'.$j.'"></textarea></td>';
                    }
                    else
                    {
                        echo '<td align="center"><textarea style="width: 85%;" rows="1" name="r'.$i.'c'.$j.'"></textarea></td>';
                    }
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        else
        {
            // Create connection
            include("db_settings.php");
            $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

            // Check connection
            if (mysqli_connect_errno($con))
            {
                echo '<div> Failed to connect to products database, please try again later.  </div>';
            }
            else
            {
                $result = mysqli_query($con,"SELECT * FROM sizingguides WHERE Brand = '". $id . "' AND Name = '".$_POST['Guide']."'");

                while($row = mysqli_fetch_array($result))
                {
                    $Column_headers = $row['Column_headers'];
                    $Row_headers = $row['Row_headers'];
                    $Row_values[1] = $row['Row_values1'];
                    $Row_values[2] = $row['Row_values2'];
                    $Row_values[3] = $row['Row_values3'];
                    $Row_values[4] = $row['Row_values4'];
                    $Row_values[5] = $row['Row_values5'];
                    $Row_values[6] = $row['Row_values6'];
                    $Row_values[7] = $row['Row_values7'];
                    $Row_values[8] = $row['Row_values8'];
                    $Row_values[9] = $row['Row_values9'];
                    $Row_values[10] = $row['Row_values10'];
                }

                $Column_names = explode(",", $Column_headers);
                $Row_names = explode(",", $Row_headers);

                echo '<table border="1" bordercolor="#000000" style="background-color:#FFFFFF" width="100%" cellpadding="0" cellspacing="0">';
                for($i = 0; $i <= intval($_POST['rows']); $i++)
                {
                    $tmpRow_values = explode(",", $Row_values[$i]);

                    echo '<tr align="center">';
                    for($j = 0; $j <= intval($_POST['columns']); $j++)
                    {
                        if($i == 0 && $j == 0)
                        {
                            echo '<td></td>';
                        }
                        else if($i == 0)
                        {
                            $x = $j - 1;
                            echo '<td align="center"><textarea style="width: 85%;" rows="1" name="r'.$i.'c'.$j.'">'.$Column_names[$x].'</textarea></td>';
                        }
                        else if($j == 0)
                        {
                            $x = $i - 1;
                            echo '<td align="center"><textarea style="width: 85%;" rows="1" name="r'.$i.'c'.$j.'">'.$Row_names[$x].'</textarea></td>';
                        }
                        else
                        {
                            $x = $j - 1;
                            echo '<td align="center"><textarea style="width: 85%;" rows="1" name="r'.$i.'c'.$j.'">'.$tmpRow_values[$x].'</textarea></td>';
                        }

                    }
                    echo '</tr>';
                }
                echo '</table>';
            }
        }
        ?>

        <p><input style="color:white;width:100px;height:30px;" class="button large blue" type="submit" id="butn_98" name="submit" value="Submit"><?if($_POST['Guide'] != 'New Sizing Guide'){echo '&nbsp;&nbsp;<input class="button large red" id="butn_97" name="delete" type="submit" style="color:white;width:100px;height:30px;" value="Delete" >';}?><img src="/css/images/ajax-loader.gif" style="display: none;" id="loading_image3"></p>
    </form>
    <script type="text/javascript" src="js/jsValidation.js"></script>
    </div>
    <!--Postamble-->
    </div>
    <!--Postamble-->

    </div>
    <div id="add_edit_products_panel" style="position:absolute;left:170px;top:130px;width:828px;height:511px; <?if($tab != '3')
    {
        echo 'visibility:hidden;';
    }?>">
    <div id="frag_51" style="position:absolute;left:18px;top:92px;width:760px;height:397px;">

    <div class="accordion">

        <section id="one">

            <h2><a href="#one"><img src="images/whatisthis.jpg" border="0"  title="" alt="Information image"  ></a></h2>
            <div>
                <p class="Wp-Body-P"><span class="Body-C">This tool allows you to add products to your store, edit or delete existing ones.</span></p>
                <p class="Wp-Body-P"><span class="Body-C">If you wish to add a product, click on the plus symbol image and fill out the form.</span><br/><span class="Body-C">Similarly, if you wish to edit a product, click on the image of the desired product and fill out the form.</span></p>
            </div>
        </section>

    </div>
    <br/>

    <div style="position:relative;">

    <!-- Form form_41 -->
    <form id="form_41" name="refineForm" action="uploadmenu.php?Tab=3" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" >
    <?php

    echo '
        		<img src="images/grey_bar.png" border="0" width="592" height="43" id="qs_288" alt="" onload="OnLoadPngFix()" style="position:absolute;left:200px;top:0px; " >
        		<div id="txt_225" style="position:absolute;left:223px;top:0px;width:82px;height:36px;overflow:hidden; " >
        			<h1 class="Wp-Heading-1-P" style="margin-top:10px"><span class="Heading-1-C-C0">Sort by:</span></h1>
        		</div>
        
        	';

    if($_POST['Sort'] == 'Default' || $_POST['Sort'] == '')
    {
        echo '
        				<select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:290px; top:0px; /*Tag Style*/" __AddCode="here">
        			    <option value="Default" selected>Default</option>
        			    <option value="Asc" >A-Z</option>
        			    <option value="desc">Z-A</option>
        			    <option value="Price asc" >Price:&nbsp;Low&nbsp;to&nbsp;High</option>
        			    <option value="Price desc" >Price:&nbsp;High&nbsp;to&nbsp;Low</option>
        			    <option value="Newest" >Newest</option>
        			    <option value="Popularity" >Popularity</option>
        			</select>
        		';
    }
    else if($_POST['Sort'] == 'Asc')
    {
        echo '
        				<select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:290px; top:0px; /*Tag Style*/" __AddCode="here">
        			    <option value="Default">Default</option>
        			    <option value="Asc" selected>A-Z</option>
        			    <option value="desc">Z-A</option>
        			    <option value="Price asc" >Price:&nbsp;Low&nbsp;to&nbsp;High</option>
        			    <option value="Price desc" >Price:&nbsp;High&nbsp;to&nbsp;Low</option>
        			    <option value="Newest" >Newest</option>
        			    <option value="Popularity" >Popularity</option>
        			</select>
        		';
    }
    else if($_POST['Sort'] == 'desc')
    {
        echo '
        				<select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:290px; top:0px; /*Tag Style*/" __AddCode="here">
        			    <option value="Default">Default</option>
        			    <option value="Asc">A-Z</option>
        			    <option value="desc" selected>Z-A</option>
        			    <option value="Price asc" >Price:&nbsp;Low&nbsp;to&nbsp;High</option>
        			    <option value="Price desc" >Price:&nbsp;High&nbsp;to&nbsp;Low</option>
        			    <option value="Newest" >Newest</option>
        			    <option value="Popularity" >Popularity</option>
        			</select>
        		';
    }
    else if($_POST['Sort'] == 'Price asc')
    {
        echo '
        				<select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:290px; top:0px; /*Tag Style*/" __AddCode="here">
        			    <option value="Default">Default</option>
        			    <option value="Asc">A-Z</option>
        			    <option value="desc">Z-A</option>
        			    <option value="Price asc" selected>Price:&nbsp;Low&nbsp;to&nbsp;High</option>
        			    <option value="Price desc" >Price:&nbsp;High&nbsp;to&nbsp;Low</option>
        			    <option value="Newest" >Newest</option>
        			    <option value="Popularity" >Popularity</option>
        			</select>
        		';
    }
    else if($_POST['Sort'] == 'Price desc')
    {
        echo '
        				<select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:290px; top:0px; /*Tag Style*/" __AddCode="here">
        			    <option value="Default">Default</option>
        			    <option value="Asc">A-Z</option>
        			    <option value="desc">Z-A</option>
        			    <option value="Price asc" >Price:&nbsp;Low&nbsp;to&nbsp;High</option>
        			    <option value="Price desc" selected>Price:&nbsp;High&nbsp;to&nbsp;Low</option>
        			    <option value="Newest" >Newest</option>
        			    <option value="Popularity" >Popularity</option>
        			</select>
        		';
    }
    else if($_POST['Sort'] == 'Newest')
    {
        echo '
        				<select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:290px; top:0px; /*Tag Style*/" __AddCode="here">
        			    <option value="Default">Default</option>
        			    <option value="Asc">A-Z</option>
        			    <option value="desc">Z-A</option>
        			    <option value="Price asc" >Price:&nbsp;Low&nbsp;to&nbsp;High</option>
        			    <option value="Price desc" >Price:&nbsp;High&nbsp;to&nbsp;Low</option>
        			    <option value="Newest" selected>Newest</option>
        			    <option value="Popularity" >Popularity</option>
        			</select>
        		';
    }
    else if($_POST['Sort'] == 'Popularity')
    {
        echo '
        				<select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:290px; top:0px; /*Tag Style*/" __AddCode="here">
        			    <option value="Default">Default</option>
        			    <option value="Asc">A-Z</option>
        			    <option value="desc">Z-A</option>
        			    <option value="Price asc" >Price:&nbsp;Low&nbsp;to&nbsp;High</option>
        			    <option value="Price desc" >Price:&nbsp;High&nbsp;to&nbsp;Low</option>
        			    <option value="Newest" >Newest</option>
        			    <option value="Popularity" selected>Popularity</option>
        			</select>
        		';
    }




    // Check connection
    if (mysqli_connect_errno($con))
    {
        echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
    }
    else
    {
        $result = mysqli_query($con,"SELECT * FROM products WHERE Brand = '". $id . "'");

        $male = 'false';
        $female = 'false';

        $categoryCounter = 0;
        $colourCounter = 0;
        while($row = mysqli_fetch_array($result))
        {
            if($row['Gender'] == 'M') $male = 'true';
            if($row['Gender'] == 'F') $female = 'true';
            if($row['Gender'] == 'U')
            {
                $male = 'true';
                $female = 'true';
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



    echo '
        		<div style="position:absolute;left:0px;top:0px;width:169px; overflow:hidden; ">
        	';


    if ($male == 'true' && $female == 'true') {
        echoRefineByHeader(1, "Refine by Gender");
        echoRefineByCheckboxes(1, array("Male", "Female"), "true");
    }

    echoRefineByHeader(2, "Refine by Type");
    echoRefineByCheckboxes(2, $categoryStrings, "true");


    echo '
        		</div>	
        	';


    ?>
    </form>
    <script type="text/javascript" src="js/jsValidation.js"></script>


    <?

    // Check connection
    if (mysqli_connect_errno($con))
    {
        echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
    }
    else
    {
        //Greying out unavailable refinement options not done here. TODO: do it?
        $str = '';
        $str .= constructGenderSqlString();
        $str .= constructGenericSqlString($categoryCounter, $categoryStrings, "Category");
        $str .= constructPriceSqlString();
        $str .= constructGenericSqlString($colourCounter, $colourStrings, "Colour");


        if($_POST['Sort'] == 'Default' || $_POST['Sort'] == '')
        {
        }
        else if($_POST['Sort'] == 'Asc')
        {
            $str .= " ORDER BY Item_name";
        }
        else if($_POST['Sort'] == 'desc')
        {
            $str .= " ORDER BY Item_name DESC";
        }
        else if($_POST['Sort'] == 'Price asc')
        {
            $str .= " ORDER BY Price";
        }
        else if($_POST['Sort'] == 'Price desc')
        {
            $str .= " ORDER BY Price DESC";
        }
        else if($_POST['Sort'] == 'Newest')
        {
            $str .= " ORDER BY Date_added DESC";
        }
        else if($_POST['Sort'] == 'Popularity')
        {
            $str .= " ORDER BY Quantity_sold DESC";
        }




        $r = 0;
        $c = 0;

        $maxColumns = 4;
        $maxRows = 100;
        $maxItems = $maxColumns * $maxRows;

        $totalItems = 0;
        $result = mysqli_query($con,"SELECT DISTINCT Item_number FROM products WHERE Brand = '". $id . "'");
        while($row = mysqli_fetch_array($result))
        {
            $totalItems++;
        }

        $result = mysqli_query($con,"SELECT Brand_name FROM brands WHERE ID = '". $id . "'");
        while($row = mysqli_fetch_array($result))
        {
            $brandName = $row['Brand_name'];
        }

        $totalPages = ceil($totalItems/$maxItems);

        //Start positions
        $x = 200;
        $y = 53;

        $width = 140;
        $height = 158;

        $padding = 10;
        $w = $width + $padding;
        $h = $height + $padding;


        $a = $x + ($c * $w);
        $b = $y + ($r * $h);
        echo '<img src="images/Plus.jpg" border="0" width="' . $width . '" height="' . $height . '" alt="" style="border-style:solid;border-width:1px;position:absolute;left:' . $a . 'px;top:' . $b . 'px; " >';

        echo '
                    <script>
                        function clearForm() {
                            $("#form_29 input[name=Item_number]").val("");
                            $("#form_29 textarea[name=name]").val("");
                            $("#form_29 select[name=category]").val("");
                            $("#form_29 select[name=gender]").val("");
                            $("#form_29 select[name=colour]").val("");
                            $("#form_29 select[name=guide]").val("");
                            $("#form_29 textarea[name=price]").val("");
                            $("#form_29 select[name=shipping]").val("");
                            $("#form_29 textarea[name=desc]").val("");
                            $("#js-dropzone1 .btn.btn-danger").click();
                            $("#js-dropzone2 .btn.btn-danger").click();
                            $("#js-dropzone3 .btn.btn-danger").click();
                            $("#js-dropzone4 .btn.btn-danger").click();
                            $("#js-dropzone5 .btn.btn-danger").click();
                            $("#form_29 #js-dropzone1").data("image", "");
                            $("#form_29 #js-dropzone2").data("image", "");
                            $("#form_29 #js-dropzone3").data("image", "");
                            $("#form_29 #js-dropzone4").data("image", "");
                            $("#form_29 #js-dropzone5").data("image", "");
                            $("#form_29 #js-dropzone1").data("editstart", "false");
                            $("#form_29 #js-dropzone2").data("editstart", "false");
                            $("#form_29 #js-dropzone3").data("editstart", "false");
                            $("#form_29 #js-dropzone4").data("editstart", "false");
                            $("#form_29 #js-dropzone5").data("editstart", "false");
                            $("#form_29 #js-addProduct-addAnother1").val("Add Another Image");
                            $("#form_29 #js-addProduct-addAnother2").val("Add Another Image");
                            $("#form_29 #js-addProduct-addAnother3").val("Add Another Image");
                            $("#form_29 #js-addProduct-addAnother4").val("Add Another Image");
                            $("#form_29 #js-addProduct-images1").css("display", "none");
                            $("#form_29 #js-addProduct-images2").css("display", "none");
                            $("#form_29 #js-addProduct-images3").css("display", "none");
                            $("#form_29 #js-addProduct-images4").css("display", "none");
                            $("#form_29 #js-addProduct-images5").css("display", "none");
                            $("#form_29 #js-addProduct-details").css("display", "block");
                            $("#form_29 textarea[name=size1]").val("");
                            $("#form_29 textarea[name=size2]").val("");
                            $("#form_29 textarea[name=size3]").val("");
                            $("#form_29 textarea[name=size4]").val("");
                            $(".dropzone").html5imageupload();
                        }

                        $(document).ready(function() {
        				   $( "#js-add" ).click(function() {
                              clearForm();
                           });
        				});
                    </script>
                    ';

        echo '<a class="inline" href="#inline_content">
        			  <img id="js-add" src="images/QS.png" border="0" width="' . $width . '" height="' . $height . '" title="" alt="' . $itemname . '" onload="OnLoadPngFix()" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px; " class="fader_img"></a>';

        // Create connection
        if(file_exists("db_settings.php")) {include("db_settings.php");}
        if(file_exists("../db_settings.php")) {include("../db_settings.php");}
        if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
        if(file_exists("db_settings.php")) {include("db_settings.php");}

        $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);
        echoAddEditProductForm($id, $brandName, $con);
        //TODO: Check what happens if a brand has LOTS of products (i.e. does pagination work?)

        $c++;

        $i = 0;
        $itemcounter = 0;

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

        $result = mysqli_query($con,"SELECT * FROM products WHERE Brand = '". $id . "'" . $str);
        while($row = mysqli_fetch_array($result))
        {
            $itemno = $row['Item_number'];
            if($_POST['delete'] == strtolower($itemno))
            {
                $_POST['delete'] = '';
                $deletesql = "DELETE FROM products WHERE Item_number='" . $itemno . "'";
                $deleteres = mysqli_query($con,$deletesql);

            }
        }

        $result = mysqli_query($con,"SELECT * FROM (SELECT DISTINCT Item_number FROM products WHERE Brand = '". $id . "'" . $str.") AS tmp_table  LIMIT ".$offset.", " .$limit);
        while($row = mysqli_fetch_array($result))
        {
            $itemno = $row['Item_number'];


            $res = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $itemno . "'");
            $sizeCounter = 0;
            while($row = mysqli_fetch_array($res))
            {
                $sizeCounter = 0;
                $res5 = mysqli_query($con,"SELECT * FROM products WHERE Brand = '". $id . "' AND Item_number ='". $itemno . "'");
                $size[0] = "";
                $size[1] = "";
                $size[2] = "";
                $size[3] = "";
                $size[4] = "";
                while($row5 = mysqli_fetch_array($res5))
                {
                    $size[$sizeCounter] = $row5['Size'];
                    $sizeCounter++;
                }

                $prevno[$i] = $itemno;
                $i++;

                $img1 = $row['Image_URL1'];
                $img2 = $row['Image_URL2'];
                $img3 = $row['Image_URL3'];
                $img4 = $row['Image_URL4'];
                $img5 = $row['Image_URL5'];
                $gender = $row['Gender'];
                $gender2 = '';
                if (strtolower($gender) == 'm') $gender2 = 'Male';
                if (strtolower($gender) == 'f') $gender2 = 'Female';
                if (strtolower($gender) == 'u') $gender2 = 'Unisex';
                $shipping = $row['Shipping_charge'];
                $description = stripslashes($row['Details']);
                $itemno = strtolower($row['Item_number']);
                $itemname = stripslashes($row['Item_name']);
                $price = $row['Price'];
                $category = $row['Category'];
                $colour = $row['Colour'];
                $brandName = $row['Brand_name'];
                $guide = $row['Sizing_guide'];
                $shipping = $row['Shipping_set'];

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


                    echo '<img src="' . $img1 . '" border="0" width="' . $width . '" height="' . $height . '" alt="" style="border-style:solid;border-width:1px;position:absolute;left:' . $a . 'px;top:' . $b . 'px; border-top-right-radius: 5px;" >';
                    echo '
                    <script>
                        $(document).ready(function(){
                            $( "#js-' . $itemno . '" ).click(function() {
                                clearForm();

                                $("#form_29 input[name=Item_number]").val("' . strtoupper($itemno) . '");
                                $("#form_29 textarea[name=name]").val("' . $itemname . '");
                                $("#form_29 textarea[name=name]").focus();
                                $("#form_29 select[name=category]").val("' . $category . '");
                                $("#form_29 select[name=gender]").val("' . $gender2 . '");
                                $("#form_29 select[name=colour]").val("' . $colour . '");
                                $("#form_29 select[name=guide]").val("' . $guide . '");
                                $("#form_29 textarea[name=price]").val("' . $price . '");
                                $("#form_29 textarea[name=price]").focus();
                                $("#form_29 select[name=shipping]").val("' . $shipping . '");
                                $("#form_29 textarea[name=desc]").val(' . json_encode($description) . ');
                                $("#form_29 textarea[name=desc]").focus();
                                $("#form_29 #js-dropzone1").data("image", "'.$img1.'");
                                $("#form_29 #js-dropzone1").data("editstart", "true");
                                $("#form_29 #js-dropzone2").data("image", "'.$img2.'");
                                $("#form_29 #js-dropzone2").data("editstart", "true");
                                $("#form_29 #js-dropzone3").data("image", "'.$img3.'");
                                $("#form_29 #js-dropzone3").data("editstart", "true");
                                $("#form_29 #js-dropzone4").data("image", "'.$img4.'");
                                $("#form_29 #js-dropzone4").data("editstart", "true");
                                $("#form_29 #js-dropzone5").data("image", "'.$img5.'");
                                $("#form_29 #js-dropzone5").data("editstart", "true");
                                $("#form_29 #js-addProduct-addAnother1").val("Next Image");
                                $("#form_29 #js-addProduct-addAnother2").val("Next Image");
                                $("#form_29 #js-addProduct-addAnother3").val("Next Image");
                                $("#form_29 #js-addProduct-addAnother4").val("Next Image");
                                $("#form_29 textarea[name=size1]").val("' . $size[0] . '");
                                $("#form_29 textarea[name=size2]").val("' . $size[1] . '");
                                $("#form_29 textarea[name=size3]").val("' . $size[2] . '");
                                $("#form_29 textarea[name=size4]").val("' . $size[3] . '");

                                $(".dropzone").html5imageupload();
                            });
        				});
                    </script>
                    ';
                    echo '<a class="inline" href="#inline_content">
        						  <img id="js-' . $itemno . '" src="images/QS.png" border="0" width="' . $width . '" height="' . $height . '" title="" alt="' . $itemname . '" onload="OnLoadPngFix()" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px; " class="fader_img">
        				    </a>';

                    $buttona = $a + $w - $padding - 24;
                    echo '
                        <script>
                            $(document).ready(function(){
                                $( "#js-delete'. $itemno . 'Button" ).click(function() {
                                    $( "#js-delete'. $itemno . 'Form" ).submit();
                                });
                            });
                        </script>

                        <form id="js-delete'. $itemno . 'Form" onsubmit="'; echo 'return confirm('; echo "'"; echo 'Are you sure?'; echo "'"; echo ');'; echo'" action="uploadmenu.php?Tab=3" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
                            <input type="hidden" name="delete" value="'. $itemno . '">
                            <div id="js-delete'. $itemno . 'Button" class="btn btn-danger btn-cancel" style="position:absolute;left:' . $buttona . 'px;top:' . $b . 'px;color:white;width:20px;height:20px;padding:4px 2px 0px 2px;border-bottom-right-radius:0;""><i class="glyphicon glyphicon-remove"></i></div>
                        </form>
                    ';
                    $itemcounter++;
                    $c++;
                }
            }
        }
    }

    mysqli_close($con);

    ?>
    </div>
    </div>
    <div id="txt_452" style="position:absolute;left:17px;top:27px;width:229px;height:33px;overflow:hidden;">
        <p class="Wp-Body-P"><span class="Body-C-C0">Add or Edit Products</span></p>
    </div>
    <img src="images/line.png" border="0" width="793" height="1" id="pcrv_6" alt="" onload="OnLoadPngFix()" style="position:absolute;left:17px;top:69px;">
    </div>
    <div id="Shipping" style="position:absolute;left:170px;top:130px;width:827px;height:629px; <?if($tab != '5')
    {
        echo 'visibility:hidden;';
    }?>">
        <div id="txt_471" style="position:absolute;left:17px;top:27px;width:227px;height:33px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C0">Set Custom Shipping Prices</span></p>
        </div>
        <img src="images/line.png" border="0" width="793" height="1" id="pcrv_18" alt="" onload="OnLoadPngFix()" style="position:absolute;left:17px;top:69px;">
        <div id="frag_60" style="position:absolute;left:18px;top:92px;width:333px;height:327px;">




            <div class="accordion">
                <section id="wef">
                    <h2><a href="#wef"><img src="images/whatisthis.jpg" border="0"  title="" alt="Information image"  ></a></h2>
                    <div>
                        <p class="Wp-Body-P"><span class="Body-C">This tool allows you to create, edit and save your own custom shipping price sets.
        				    A shipping price set is the shipping charges applied to a set of items.
        				    For example you may want separate shipping price sets for jumpers and beanies, since
        				    jumpers are more expensive to ship than beanies.</span></p>
                        <p class="Wp-Body-P"><span class="Body-C">Shipping price sets are then saved and you can quickly choose shipping prices when
        				    you add or edit products.</span></p>
                        <p class="Wp-Body-P"><span class="Body-C">Please note:</span></p>
                        <ul class="Body-P">
                            <li class="Body-P-P0"><span class="Body-C">A UK Standard Price is Required</span></li><li class="Body-P-P0"><span class="Body-C">All prices are in pound sterling (&#163;)</span></li><li class="Body-P-P0"><span class="Body-C">If you wish to omit a shipping price, leave the box blank</span></li></ul>
                    </div>
                </section>
            </div>
            <br/>

            <form id="form_95" action="uploadmenu.php?Tab=5" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
                <?
                if($_POST['Set'] == '') $_POST['Set'] = 'New Shipping Price Set';

                echo '
        				<select style="width:400px;" onChange="submit();" name="Set" size="1">
        			    <option value="New Shipping Price Set" 
        		';

                if($_POST['Set'] == 'New Shipping Price Set' || $_POST['Set'] == '') echo 'selected';

                echo '
        			>New Shipping Price Set</option>
        		';

                // Create connection
                include("db_settings.php");
                $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

                // Check connection
                if (mysqli_connect_errno($con))
                {
                    echo '<div> Failed to connect to products database, please try again later.  </div>';
                }
                else
                {
                    $result = mysqli_query($con,"SELECT * FROM shippingprices WHERE Brand = '". $id . "'");

                    while($row = mysqli_fetch_array($result))
                    {
                        $setname = $row['Name'];

                        echo '
        			    	<option value="'.$setname.'" 
        				';

                        if($_POST['Set'] == $setname) echo 'selected';

                        echo '
        					>'.$setname.'</option>
        				';
                    }
                }

                echo '
        			</select>
        		';
                ?>
            </form>
            <script type="text/javascript" src="js/jsValidation.js"></script>

            <?
            $result = mysqli_query($con,"SELECT * FROM shippingprices WHERE Brand = '". $id . "' AND Name = '" . $_POST['Set'] . "'");

            $setname = '';
            while($row = mysqli_fetch_array($result))
            {
                $setname = $row['Name'];
                $uks = $row['Shipping_charge'];
                $uke = $row['Shipping_charge2'];
                $europe = $row['Shipping_charge3'];
                $international = $row['Shipping_charge4'];

                if($uks == -1.00) $uks = '';
                if($uke == -1.00) $uke = '';
                if($europe == -1.00) $europe = '';
                if($international == -1.00) $international = '';
            }
            ?>

            <?
            if($_POST['Set'] == 'New Shipping Price Set')
            {
                echo '
        			<script type="text/javascript">
        			  $(document).ready(function(){    
        				   $("#text_shippingname").Watermark("e.g. Tees/Vests Shipping");
        				   $("#text_uks").Watermark("e.g. 0");
        				   $("#text_uke").Watermark("e.g. 2.50");
        				   $("#text_europe").Watermark("e.g. 4");
        				   $("#text_international").Watermark("e.g. 6");
        				});
        			</script>
        			';
            }
            ?>

            <br/>
            <form id="form_93" name="userinfo_2" onsubmit="return validate_form_93(this)" action="shipping_prices.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" >
                <input type="hidden" name="action" id="action" />
                <script type="text/javascript">
                    $(document).ready(function () {
                        $(":submit").click(function () { $("#action").val(this.name); });
                    });
                </script>
                <input type="hidden" name="ID" value="<?echo $id;?>">
                <input type="hidden" name="username" value="<?echo $_SESSION['username'];?>">
                <input type="hidden" name="Set" value="<?echo $_POST['Set'];?>">



                <div style="width:400px;height:60px;">
                    <p class="Wp-Normal-P"><span class="Heading-3-C">*</span><label for="edit_2"><span class="Heading-3-Ca">Shipping Set Name:</span></label><textarea id="text_shippingname" style="float:right;width:250px;height:20px;position:relative;top:-10px;" value="<?echo $setname;?>" name="Setname" ><?echo $setname;?></textarea></p>
                    <img style="margin-top:10px;margin-left:10px;" src="images/line.png" border="0" width="380" height="1" id="pcrv_3" alt="" onload="OnLoadPngFix()" >
                </div>

                <br/>

                <div style="width:400px;height:60px;">
                    <p class="Wp-Normal-P"><span class="Heading-3-C">*</span><label for="edit_1"><span class="Heading-3-Ca">UK Standard Shipping Price:</span></label><textarea style="float:right;width:100px;height:20px;position:relative;top:-10px;" value="<?echo $uks;?>" id="text_uks" name="UKS" ><?echo $uks;?></textarea></p>
                </div>

                <div style="width:400px;height:60px;">
                    <p class="Wp-Normal-P"><label for="edit_3"><span class="Heading-3-Ca">&nbsp;UK Express Shipping Price:</span></label><textarea style="float:right;width:100px;height:20px;position:relative;top:-10px;" id="text_uke" value="<?echo $uke;?>" name="UKE" ><?echo $uke;?></textarea></p>
                </div>



                <div style="width:400px;height:60px;">
                    <p class="Wp-Normal-P"><label for="edit_4"><span class="Heading-3-Ca">&nbsp;Europe Shipping Price:</span></label><textarea style="float:right;width:100px;height:20px;position:relative;top:-10px;"value="<?echo $europe;?>" id="text_europe" name="Europe" ><?echo $europe;?></textarea></p>
                </div>


                <div style="width:400px;height:60px;">
                    <p class="Wp-Normal-P"><label for="edit_5"><span class="Heading-3-Ca">&nbsp;International Shipping Price:</span></label><textarea style="float:right;width:100px;height:20px;position:relative;top:-10px;" value="<?echo $international;?>" id="text_international" name="International" ><?echo $international;?></textarea></p>
                </div>

                <p><input style="color:white;width:100px;height:30px;" class="button large blue" type="submit" id="butn_1" name="submit" value="Submit">&nbsp;&nbsp;<input class="button large red" id="butn_2" name="delete" type="submit" style="color:white;width:100px;height:30px;" value="Delete" ><img src="/css/images/ajax-loader.gif" style="display: none;" id="loading_image"></p>
            </form>
            <script type="text/javascript" src="js/jsValidation.js"></script>

        </div>
    </div>
    <?

    if (isset($_GET['Tab']))
    {
        $tab = $_GET['Tab'];
    }
    else
    {
        $tab = '1';
    }

    ?>
    <div id="sotre_images_panel" style="position:absolute;left:171px;top:130px;width:827px;height:488px; <?if($tab != '2')
    {
        echo 'visibility:hidden;';
    }?>">
        <div id="frag_53" style="position:absolute;left:17px;top:92px;width:792px;height:217px;">
            <!--Body-->

            <!-- Form form_30 -->
            <div class="accordion">

                <section id="one">

                    <h2><a href="#one"><img src="images/whatisthis.jpg" border="0"  title="" alt="Information image"  ></a></h2>
                    <div>
                        <p style="margin-left:10px;" class="Wp-Body-P"><span class="Body-C-C1a">This tool allows you to upload the images you wish to use for your brand store. Previews of your store and storefont can be seen below.</span></p>
                        <p style="margin-left:10px;" class="Wp-Body-P"><span class="Body-C-C1a">The dimensions required for the images are approximately as follows (width:height): </span></p>
                        <ul class="Body-P">
                            <li class="Body-P-P0"><span class="Body-C">Logo 1:1</span></li>
                            <li class="Body-P-P0"><span class="Body-C">Banner 5:1</span></li>
                            <li class="Body-P-P0"><span class="Body-C">Background 1.7:1</span></li>
                            <li class="Body-P-P0"><span class="Body-C">Storefront 1.5:1</span></li>
                        </ul>
                        <p style="margin-left:10px;" class="Wp-Body-P"><span class="Body-C-C1a">Note: the storefront image is the image used to direct users to your brand page. Examples of this can be seen <a href="brands.php" target="_blank">here</a></span></p>
                    </div>
                </section>

            </div>
            <br/>

            <form id="form_30" onsubmit="return validate_form_30(this)" action="upload_store_imgs.php?Tab=2" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" style="margin:0;position:relative;left:0px;top:0px;width:360px;height:136px; " >
                <input type="hidden" name="username" value="<?echo $_SESSION['username'];?>">
                <input type="hidden" name="ID" value="<?echo $id;?>">


                <div id="txt_434" style="position:absolute;left:8px;top:8px;width:46px;height:25px;overflow:hidden; " >
                    <p class="Wp-Body-P"><label for="file_10"><span class="Heading-3-Ca">Logo:</span></label></p>
                </div>
                <input type="file" id="file_10" name="file1" size="17" style="position:absolute; left:112px; top:8px; width:208px;  " >


                <div id="txt_435" style="position:absolute;left:8px;top:38px;width:60px;height:25px;overflow:hidden; " >
                    <p class="Wp-Body-P"><label for="file_11"><span class="Heading-3-Ca">Banner:</span></label></p>
                </div>
                <input type="file" id="file_11" name="file2" size="17" style="position:absolute; left:112px; top:38px; width:208px;  " >



                <div id="txt_436" style="position:absolute;left:8px;top:68px;width:93px;height:25px;overflow:hidden; " >
                    <p class="Wp-Body-P"><label for="file_12"><span class="Heading-3-Ca">Background:</span></label></p>
                </div>
                <input type="file" id="file_12" name="file3" size="17" style="position:absolute; left:112px; top:68px; width:208px;  " >


                <div style="position:absolute;left:8px;top:98px;width:93px;height:25px;overflow:hidden; " >
                    <p class="Wp-Body-P"><span class="Heading-3-Ca">Storefront:</span></p>
                </div>
                <input type="file" id="file_12" name="file4" size="17" style="position:absolute; left:112px; top:98px; width:208px;  " >



                <input type="submit" class="button large blue" style="position:absolute; left:8px; top:135px; width:81px; height:22px; color:white" id="butn_7" value="Submit" ><img style="position:absolute; left:8px; top:135px; display: none; color:white" src="/css/images/ajax-loader.gif" id="loading_image2">

            </form>
            <script type="text/javascript" src="js/jsValidation.js"></script>


            <?
            // Create connection
            include("db_settings.php");
            $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

            // Check connection
            if (mysqli_connect_errno($con))
            {
                echo '<div style="position:absolute;left:458px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
            }
            else
            {
                $result = mysqli_query($con,"SELECT * FROM brands WHERE Username = '". $_SESSION['username'] . "' OR ID = '". $_SESSION['username'] . "' OR Brand_name = '". $_SESSION['username'] . "'");

                while($row = mysqli_fetch_array($result))
                {
                    $logo = $row['logo_URL'];
                    $background = $row['background_URL'];
                    $banner = $row['banner_URL'];
                    $sbb = $row['shopbybrand_URL'];
                }
            }

            if($logo == '') $logo = 'images/white.jpg';
            if($background == '') $background = 'images/white.jpg';
            if($banner == '') $banner = 'images/white.jpg';
            $white = 'images/white.jpg';

            echo '
        		<div style="position:relative;">
        		<img src="'. $sbb .'" border="1" width="252" height="152" style="position:absolute;left:8px;top:70px; " >
        
        		<div style="position:absolute;left:8px;top:40px; >
        		<p class="Wp-Body-P"><span class="Heading-3-Ca">Storefront Image Preview</span></p>
        		</div>
        		';

            $x = -98;
            echo '
        		<img src="'. $background .'" border="0" width="474" height="384" id="pic_258" alt="" style="position:absolute;left:317px;top:'.$x.'px; " >
        		';

            $tmp = $x + 322;
            echo '
        		<img src="'.$white.'" border="0" width="474" height="63" id="qs_393" alt="" style="position:absolute;left:317px;top:'.$tmp.'px; " >
        		<img src="'.$white.'" border="0" width="474" height="65" id="qs_394" alt="" style="position:absolute;left:317px;top:'.$x.'px; " >
        		';

            $tmp = $x + 137;
            echo '
        		<img src="'.$white.'" border="1" width="248" height="183" id="qs_355" alt="" style="position:absolute;left:437px;top:'.$tmp.'px; " >
        		';

            $tmp = $x + 89;
            echo '
        		<img src="'. $banner .'" border="1" width="249" height="51" id="pic_57" alt="" style="position:absolute;left:436px;top:'.$tmp.'px; " >
        		';

            $tmp = $x + 103;
            echo '
        		<img src="'. $logo .'" border="1" width="49" height="51" id="pic_69" alt="" style="position:absolute;left:440px;top:'.$tmp.'px; " >
        		';

            $tmp = $x + 30;
            echo '
        		<div style="position:absolute;left:317px;top:'.$tmp.'px; >
        		<p class="Wp-Body-P"><span class="Heading-3-Ca">Store (Logo, Banner, Background) Preview</span></p>
        		</div>
        		
        		</div>
        
        	';

            ?>
        </div>
        <div id="txt_453" style="position:absolute;left:16px;top:27px;width:232px;height:33px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C0">Upload Store Images</span></p>
        </div>
        <img src="images/line.png" border="0" width="792" height="1" id="pcrv_13" alt="" onload="OnLoadPngFix()" style="position:absolute;left:16px;top:69px;">
    </div>
    <div id="brand_info_panel" style="position:absolute;left:170px;top:130px;width:827px;height:643px; <?if($tab != '1')
    {
        echo 'visibility:hidden;';
    }?>border:1px solid #FFFFFF;border:1px solid #FFFFFF; /*MainDivStyle*/">
        <div id="frag_54" style="position:absolute;left:17px;top:91px;width:793px;height:386px;">
            <!--Body-->
            <?
            // Create connection
            include("db_settings.php");
            $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

            // Check connection
            if (mysqli_connect_errno($con))
            {
                echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
            }
            else
            {
                $result = mysqli_query($con,"SELECT * FROM brands WHERE Username = '". $_SESSION['username'] . "' OR ID = '". $_SESSION['username'] . "' OR Brand_name = '". $_SESSION['username'] . "'");

                while($row = mysqli_fetch_array($result))
                {
                    $name = $row['Brand_name'];
                    $desc = stripslashes($row['Description']);
                    $loc = $row['Location'];
                    $gender = $row['Gender'];
                    $email = $row['Email'];
                    $paypalemail = $row['Paypal_email'];
                    $facebook = $row['Facebook_URL'];
                    $twitter = $row['Twitter_URL'];
                    $shippinginfo = $row['Shipping_info'];
                }
            }
            ?>
            <div class="accordion">

                <section id="one">

                    <h2><a href="#one"><img src="images/whatisthis.jpg" border="0"  title="" alt="Information image"  ></a></h2>
                    <div>
                        <p class="Wp-Body-P"><span class="Body-C">This tool allows you to add and edit your brand's information including your password.</span></p>
                        <p class="Wp-Body-P"><span class="Body-C">Simply fill out the boxes below and press submit.</span></p>
                    </div>
                </section>

            </div>
            <br/>

            <form id="form_31" onsubmit="return validate_form_31(this)" action="upload_brand_information.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" >

                <input type="hidden" name="username" value="<?echo $_SESSION['username'];?>">
                <input type="hidden" name="ID" value="<?echo $id;?>">


                <div style="width:600px;height:60px;">
                    <span class="Heading-3-C">*</span><span class="Heading-3-Ca">Brand Name:</span><textarea style="float:right;width:350px;height:20px;top:-10px;position:relative;" name="Brand_name" ><?echo $name;?></textarea>
                </div>

                <div style="width:600px;height:190px;">
                    <span class="Heading-3-C">*</span><span class="Heading-3-Ca">Brand Description:</span><textarea style="float:right;width:350px;height:150px;top:-10px;position:relative;" name="Desc" ><?echo $desc;?></textarea>
                </div>

                <div style="width:600px;height:60px;">
                    <span class="Heading-3-C">*</span><span class="Heading-3-Ca">Location:</span><textarea style="float:right;width:350px;height:20px;top:-10px;position:relative;" name="Location" ><?echo $loc;?></textarea>
                </div>

                <div style="width:600px;height:60px;">
                    <span class="Heading-3-C">*</span><span class="Heading-3-Ca">Gender:</span><select style="float:right;width:362px;top:-10px;position:relative;" name="Gender" size="1" >
                        <option value="Male" <?if($gender == 'M') echo 'selected';?>>Male</option>
                        <option value="Female" <?if($gender == 'F') echo 'selected';?>>Female</option>
                        <option value="Both" <?if($gender == 'U') echo 'selected';?>>Both</option>
                    </select>
                </div>

                <div style="width:600px;height:60px;">
                    <span class="Heading-3-C">*</span><span class="Heading-3-Ca">Customer Contact Email:</span><textarea style="float:right;width:350px;height:20px;top:-10px;position:relative;" name="Email" ><?echo $email;?></textarea>
                </div>

                <div style="width:600px;height:60px;">
                    <span class="Heading-3-C">*</span><span class="Heading-3-Ca">PayPal Email:</span><textarea style="float:right;width:350px;height:20px;top:-10px;position:relative;" name="Paypal_email" ><?echo $paypalemail;?></textarea>
                </div>

                <div style="width:600px;height:80px;">
                    <span class="Heading-3-Ca">&nbsp;Facebook URL:</span><textarea style="float:right;width:350px;height:40px;top:-10px;position:relative;" name="Facebook_URL" ><?echo $facebook;?></textarea>
                </div>

                <div style="width:600px;height:80px;">
                    <span class="Heading-3-Ca">&nbsp;Twitter URL:</span><textarea style="float:right;width:350px;height:40px;top:-10px;position:relative;" name="Twitter_URL" ><?echo $twitter;?></textarea>
                </div>

                <div style="width:600px;height:190px;">
                    <span class="Heading-3-C">*</span><span class="Heading-3-Ca">Shipping Times Information:</span><textarea style="float:right;width:350px;height:150px;top:-10px;position:relative;" name="Shipping_info" ><?echo $shippinginfo;?></textarea>
                </div>

                <input class="button large blue" type="submit" style="color:white;width:100px;height:30px;float:left;" id="butn_33" value="Submit" ><img src="/css/images/ajax-loader.gif" style="display: none;float:left;" id="loading_image33">

                <br/>
                <br/>
                <br/>
                <br/>
            </form>
            <script type="text/javascript" src="js/jsValidation.js"></script>

            <form id="form_321" onsubmit="return validate_form_321(this)" action="upload_brand_information.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" >
                <input type="hidden" name="username" value="<?echo $_SESSION['username'];?>">
                <input type="hidden" name="ID" value="<?echo $id;?>">

                <p class="Wp-Body-P"><span class="Body-C-C0">Change Password</span></p>

                <br/>

                <div style="width:350px;height:40px;">
                    <h3 class="Wp-Heading-3-P" style="margin-top:0px; float:left;"><span stlye="float:left;" class="Heading-3-C">Current: </span></h3><input type="password"  name="current_password" value="" style="height:20px;width:200px;float:right">
                </div>


                <div style="width:350px;height:40px;">
                    <h3 class="Wp-Heading-3-P" style="margin-top:0px; float:left;"><span stlye="float:left;" class="Heading-3-C">New: </span></h3><input type="password"  name="new_password" value="" style="height:20px;width:200px;float:right">
                </div>

                <div style="width:350px;height:40px;">
                    <h3 class="Wp-Heading-3-P" style="margin-top:0px; float:left;"><span stlye="float:left;" class="Heading-3-C">Re-type New: </span></h3><input type="password"  name="new_password2" value="" style="height:20px;width:200px;float:right">
                </div>

                <br/>
                <input name="pword" class="button large blue" type="submit" style="color:white;width:100px;height:30px;float:left;" id="butn_34" value="Save Changes" ><img src="/css/images/ajax-loader.gif" style="display: none;float:left;" id="loading_image34">

            </form>
            <script type="text/javascript" src="js/jsValidation.js"></script>


        </div>
        <div id="txt_454" style="position:absolute;left:16px;top:26px;width:227px;height:33px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C0">Update Brand Information</span></p>
        </div>
        <img src="images/line.png" border="0" width="793" height="1" id="pcrv_14" alt="" onload="OnLoadPngFix()" style="position:absolute;left:16px;top:68px;">
    </div>
    <div id="panel_8" style="position:absolute;left:0px;top:405px;width:170px;height:68px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2;/*MainDivStyle*/">
        <div id="txt_449" style="position:absolute;left:20px;top:23px;width:129px;height:21px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Heading-3-Ca">Products</span></p>
        </div>
    </div>
    <div id="panel_7" style="position:absolute;left:0px;top:199px;width:170px;height:69px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2;/*MainDivStyle*/">
        <div id="txt_450" style="position:absolute;left:20px;top:23px;width:129px;height:22px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Heading-3-Ca">Store Images</span></p>
        </div>
    </div>
    <div id="panel_6" style="position:absolute;left:0px;top:130px;width:170px;height:68px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2;/*MainDivStyle*/">
        <div id="txt_451" style="position:absolute;left:20px;top:26px;width:129px;height:22px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Heading-3-Ca">Brand Info</span></p>
        </div>
    </div>
    <img src="images/vertical_grey_line.png" border="0" width="1" height="2528" id="pcrv_5" alt="" style="position:absolute;left:171px;top:130px;">
    <a name="panel_9" style="position:absolute; left:0px; top:337px"></a>
    <div id="panel_9" style="position:absolute;left:0px;top:337px;width:170px;height:67px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2;/*MainDivStyle*/">
        <div id="txt_469" style="position:absolute;left:20px;top:23px;width:129px;height:21px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Heading-3-Ca">Sizing Guides</span></p>
        </div>
    </div>
    <div id="panel_10" style="position:absolute;left:0px;top:269px;width:170px;height:67px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2; /*MainDivStyle*/">
        <div id="txt_478" style="position:absolute;left:20px;top:23px;width:129px;height:22px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Heading-3-Ca">Shipping Prices</span></p>
        </div>
    </div>
    <div id="panel_11" style="position:absolute;left:0px;top:474px;width:170px;height:70px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2; /*MainDivStyle*/">
        <div id="txt_479" style="position:absolute;left:20px;top:23px;width:129px;height:21px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Heading-3-Ca">FAQs</span></p>
        </div>
    </div>
    <div id="FAQs" style="position:absolute;left:170px;top:130px;width:810px;height:628px; visibility:hidden; /*MainDivStyle*/">
        <div id="txt_480" style="position:absolute;left:17px;top:27px;width:229px;height:33px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C0">Frequently Asked Questions</span></p>
        </div>
        <img src="images/line.png" border="0" width="793" height="1" id="pcrv_19" alt="" onload="OnLoadPngFix()" style="position:absolute;left:17px;top:69px;">
        <div id="frag_15" style="position:absolute;left:18px;top:92px;width:793px;height:339px;">
            <div class="accordion">

                <section id="one">
                    <h2><a href="#one">How do i add more than 4 stocks when uploading a new product?</a></h2>
                    <div>
                        <p>
                            If you want to add more than 4 stocks, simply upload the product with 4 stocks, then after, edit the product and you can add more.
                        </p>
                    </div>
                </section>

                <section id="two">
                    <h2><a href="#two">How do I change my password? Is my password secure?</a></h2>
                    <div>
                        <p>
                            You can change your password at the bottom of the 'Brand Info' tab.
                        </p>
                        <p>
                            Your passwords are completely secure. We will never be able to see or access your password.
                        </p>
                    </div>
                </section>



                <section id="four">
                    <h2><a href="#four">Can I add different colours/variations to the same product?</a></h2>
                    <div>
                        <p>
                            You can! To do this, simply upload a single product, but add the different variations/colours as different stocks.
                        </p>
                        <p>
                            For example, if you had a t-shirt which came in red and blue, the stocks might look as follows:
                        </p>
                        <ul class="Body-P">
                            <li class="Body-P-P0"><span class="Body-C">Red Small - 5</span></li>
                            <li class="Body-P-P0"><span class="Body-C">Blue Medium - 3</span></li>
                            <li class="Body-P-P0"><span class="Body-C">etc</span></li>
                        </ul>
                    </div>
                </section>

                <section id="five">
                    <h2><a href="#five">I'm unsure of the colour of the product I'm uploading, what colour do I set for it?</a></h2>
                    <div>
                        <p>
                            When choosing the colour of a product, try to choose the dominant colour. If the product doesn't have a clear dominant colour, in the product comes in a variety of colours, please select Multi.
                        </p>
                    </div>
                </section>

                <section id="six">
                    <h2><a href="#six">Sizing Guides: How To?</a></h2>
                    <div>
                        <p>
                            You can add Sizing Guides to products. This is an optional feature, yet highly recommended since it helps the customer greatly.
                        </p>
                        <p>
                            To do so, go to the Sizing Guides tab and fill out the table following the example given and name the Sizing Guide whatever you wish. Then, whenever you add or edit a product, you can choose a Sizing Guide to apply to that item.
                        </p>
                    </div>
                </section>

                <section id="seven">
                    <h2><a href="#seven">Shipping Price Sets: How To?</a></h2>
                    <div>
                        <p>
                            A Shipping Price Set is the set of charges you wish to apply for shipping on a set of items. For example, you may wish to have more expensive shipping charges for T-shirts than you do for Beanies, so you would have seperate Shipping Price Sets for each.
                        </p>
                        <p>
                            To add a Shipping Price Set, go to the Shipping Prices tab and fill out the form provided and name the Shipping Price Set whatever you wish. Then, whenever you add or edit a product, you can choose which Shipping Price Set to apply to that item.
                        </p>
                    </div>
                </section>

                <section id="eight">
                    <h2><a href="#eight">My images look squashed/stretched, what do I do?</a></h2>
                    <div>
                        <p>
                            If your images look squashed/stretched, this will because the dimensions of the image you uploaded are wrong. You will need to edit the image by cropping/resizing/rescaling as required. If you are unsure how to do this, please get in touch with us and we can help you or do it for you.
                        </p>
                        <p>
                            The image dimensions (width:height) required are approximately as follows:
                        </p>
                        <ul class="Body-P">
                            <li class="Body-P-P0"><span class="Body-C">Logo 1:1</span></li>
                            <li class="Body-P-P0"><span class="Body-C">Banner 5:1</span></li>
                            <li class="Body-P-P0"><span class="Body-C">Background 1.7:1</span></li>
                            <li class="Body-P-P0"><span class="Body-C">Storefront 1.5:1</span></li>
                            <li class="Body-P-P0"><span class="Body-C">Product 0.8:1</span></li>
                        </ul>
                    </div>
                </section>

                <section id="nine">
                    <h2><a href="#nine">How do I know if I've received an order? Where are the shipping details?</a></h2>
                    <div>
                        <p>
                            When you receieve an order you will be notified by email, both by us and by PayPal. The email from us is mainly to inform you of the new stock level of the ordered item. However, the PayPal email is more important and this email will contain all the information you need to ship the product.
                        </p>
                        <p>
                            Additionally, you will be able to see an orders in your transaction history on your PayPal account where you can find the shipping details at the bottom under 'Note:'
                        </p>
                    </div>
                </section>

                <section id="ten">
                    <h2><a href="#ten">How do returns work?</a></h2>
                    <div>
                        <p>
                            If a customer wishes to return or swap an item, they will get in contact directly with you and will liase with you about the matter. Zooqie does not take any part in returns.
                        </p>
                    </div>
                </section>

                <section id="eleven">
                    <h2><a href="#eleven">How do I add more stock to a product?</a></h2>
                    <div>
                        <p>
                            If you wish to add more stock to a product, go to the Products tab and then find and edit the desired product. This can be done by clicking on that product, and then opening the Stocks and Sizes tab and changing to stock value.
                        </p>
                    </div>
                </section>

                <section id="twelve">
                    <h2><a href="#twelve">How do I remove an item or make an item out of stock?</a></h2>
                    <div>
                        <p>
                            You can delete any product within the Products tab, simply pressing the red cross on the corner of the desired product. However, if you wish to keep the item on the site, but make it unavaiable to purchase, you could instead set all the stock for that item to 0. This can be done by editing the product within the Products tab.
                        </p>
                    </div>
                </section>











            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jsMenu.js"></script>
    <script type="text/javascript">
        wpmenustack.setRollovers([['panel_8','add_edit_products_panel',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_8','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_8','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_8','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_8','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_8','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','sotre_images_panel',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_7','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','brand_info_panel',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_6','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','sizing_guides_panel',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_9','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','Shipping',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_10','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','FAQs',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_11','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}]]);
    </script>
    <!--Master Page End-->
    <div id="nav-bar"></div>
    </div>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/totop.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto({ theme:'facebook', allow_resize: false });
        });
    </script>
    <!--Page Body End-->

    <?

    if (isset($_GET['Message']))
    {
        $message = $_GET['Message'];
        echo "<script>
		  
		    alert('$message');

		</script>";
    }

    ?>




    <!--Fullsize Background Image End-->
    <script src="js/jquery.backstretch.js"></script>
    <script>
        jQuery.backstretch("images/backgrounds/sbackground3.jpg");
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins)
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="image-upload-tool/assets/js/html5imageupload.js?v1.4.3"></script>

    <script>

        $('#retrievingfilename').html5imageupload({
            onAfterProcessImage: function() {
                $('#filename').val($(this.element).data('name'));
            },
            onAfterCancel: function() {
                $('#filename').val('');
            }

        });

        $('#save').html5imageupload({
            onSave: function(data) {
                console.log(data);
            },

        });

        $('.dropzone').html5imageupload();

        $( "#myModal" ).on('shown.bs.modal', function(){
            $('#modaldialog').html5imageupload();
        });
        /*
         $('#form').html5imageupload({
         onAfterProcessImage: function() {
         $(this.element).closest('form').submit();
         }
         });

         $('form button.btn').unbind('click').click(function(e) {
         e.preventDefault()
         $(this).closest('form').find('#form').data('html5imageupload').imageCrop()
         });*/


    </script>
    </body>
    </html>


<?}
?>