<?php
if(!session_id()) session_start();
if(!isset($_SESSION['username'])){
    header("location:login.html");
}
else
{



    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Brand Upload Tool | ZOOKIE</title>
    <meta name="viewport" content="width=1000">
    <link rel="icon" href="http://www.zooqie.com/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="http://www.zooqie.com/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="http://www.zooqie.com/css/styles.css">
    <script type="text/javascript" src="http://www.zooqie.com/js/jquery.js"></script>
    <script type="text/javascript" src="http://www.zooqie.com/js/superfish.js"></script>
    <script type="text/javascript" src="http://www.zooqie.com/js/jquery.prettyphoto.js" charset="utf-8"></script>
    <!--[if lt IE 9]><script src="http://www.zooqie.com/js/html5.js"></script><![endif]-->

    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">


    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-44115180-1', 'zooqie.com');
        ga('send', 'pageview');

    </script>
    <link rel="stylesheet" href="http://www.zooqie.com/wpscripts/nav_348style.css" type="text/css">
    <script type="text/javascript" src="http://www.zooqie.com/wpscripts/jsNavBarFuncs.js"></script>
    <script type="text/javascript" src="http://www.zooqie.com/wpscripts/global_navtree.js"></script>
    <script type="text/javascript" src="http://www.zooqie.com/wpscripts/wp_navbar_textmenu.js"></script>
    <!--Header code for HTML frag_56 -->
    <script type="text/javascript">(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

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
    <script src="http://www.zooqie.com/js/jquery.watermarkinput.js" type="text/javascript"></script>
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



    <link rel="stylesheet" href="/css/colorbox.css" />
    <script src="/js/jquery.colorbox.js"></script>
    <script>

        $(document).ready(function()
        {
            $(".inline").colorbox({inline:true, width:"50%"});
        });
    </script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script>
        <?
                  // Create connection
                  include("db_settings.php");
                  $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

                  // Check connection
                  if (mysqli_connect_errno($con))
                  {
                    echo '<div style="position:absolute;left:508px;top:0px;"> Failed to connect to products database, please try again later.  </div>';
                  }
                  else
                  {
                      $result = mysqli_query($con,"SELECT * FROM brands WHERE Username = '". $_SESSION['username'] . "'");

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

        function setC(c_name,value,exdays)
        {
            var exdate=new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
            document.cookie=c_name + "=" + c_value;
        }

        function getC(c_name)
        {
            var c_value = document.cookie;
            var c_start = c_value.indexOf(" " + c_name + "=");
            if (c_start == -1)
            {
                c_start = c_value.indexOf(c_name + "=");
            }
            if (c_start == -1)
            {
                c_value = null;
            }
            else
            {
                c_start = c_value.indexOf("=", c_start) + 1;
                var c_end = c_value.indexOf(";", c_start);
                if (c_end == -1)
                {
                    c_end = c_value.length;
                }
                c_value = unescape(c_value.substring(c_start,c_end));
            }
            return c_value;
        }




        $(document).ready(function(){

            if(getC("divState1") == 'hidden')
            {
                $(".slidingDiv1").hide();
                document.getElementById('arrow1').src  = 'images/rightarrow.png';
            }
            else
            {
                $(".slidingDiv1").show();
                document.getElementById('arrow1').src  = 'images/downarrow.png';
            }

            if(getC("divState2") == 'hidden')
            {
                $(".slidingDiv2").hide();
                document.getElementById('arrow2').src  = 'images/rightarrow.png';
            }
            else
            {
                $(".slidingDiv2").show();
                document.getElementById('arrow2').src  = 'images/downarrow.png';
            }


            $('.show_hide1').click(function(event)
            {
                event.preventDefault();
                $(".slidingDiv1").slideToggle();

                var img = document.getElementById('arrow1').src;
                if (img.indexOf('downarrow.png')!=-1)
                {
                    document.getElementById('arrow1').src  = 'images/rightarrow.png';
                    setC("divState1","hidden",1);
                }
                else
                {
                    document.getElementById('arrow1').src = 'images/downarrow.png';
                    setC("divState1","visible",1);
                }
            });


            $('.show_hide2').click(function(event)
            {
                event.preventDefault();
                $(".slidingDiv2").slideToggle();

                var img = document.getElementById('arrow2').src;
                if (img.indexOf('downarrow.png')!=-1)
                {
                    document.getElementById('arrow2').src  = 'images/rightarrow.png';
                    setC("divState2","hidden",1);
                }
                else
                {
                    document.getElementById('arrow2').src = 'images/downarrow.png';
                    setC("divState2","visible",1);
                }
            });


        });

    </script>


    <script type="text/javascript">

        function validate_form_29( form )
        {

            if( ltrim(rtrim(form.elements['name'].value,' '),' ')=="e.g. Zero Graphic Tee" ) form.elements['name'].value = "";
            if( ltrim(rtrim(form.elements['name'].value,' '),' ')=="" ) { alert("Clothing Item Name is required"); form.elements['name'].focus(); return false; }

            if( ltrim(rtrim(form.elements['gender'].value,' '),' ')=="" ) { alert("You Must Select a Gender"); form.elements['gender'].focus(); return false; }

            if( ltrim(rtrim(form.elements['category'].value,' '),' ')=="" ) { alert("The Category is required"); form.elements['category'].focus(); return false; }

            if( ltrim(rtrim(form.elements['colour'].value,' '),' ')=="" ) { alert("You Must Select a Colour"); form.elements['colour'].focus(); return false; }

            if( ltrim(rtrim(form.elements['price'].value,' '),' ')=="e.g. 14.99" ) form.elements['price'].value = "";
            if( ltrim(rtrim(form.elements['price'].value,' '),' ')=="" ) { alert("The Price is required"); form.elements['price'].focus(); return false; }

            n = parseFloat(ltrim(ltrim(rtrim(form.elements['price'].value,' '),' '),'£'));
            if(isNaN(n) || n < 0){ alert("The Price must be a positive number"); form.elements['price'].focus(); return false; }

            if( ltrim(rtrim(form.elements['shipping'].value,' '),' ')=="" ) { alert("The Shipping Prices are required. If you have not created any Shipping Price Sets please do so first and try again."); form.elements['shipping'].focus(); return false; }

            if( ltrim(rtrim(form.elements['size1'].value,' '),' ')=="e.g. Red Small" ) form.elements['size1'].value = "";
            if( ltrim(rtrim(form.elements['size1'].value,' '),' ')=="" ) { alert("You must input at least one Size"); form.elements['size1'].focus(); return false; }

            n = parseInt(ltrim(ltrim(rtrim(form.elements['stock1'].value,' '),' '),'£'));
            if(isNaN(n) || n < 0){ alert("The stock must be a positive number"); form.elements['stock1'].focus(); return false; }




            if( (ltrim(rtrim(form.elements['stock2'].value,' '),' ')!="") ||  ltrim(rtrim(form.elements['size2'].value,' '),' ')!="" )
            {
                if( ltrim(rtrim(form.elements['size2'].value,' '),' ')=="" ) { alert("You must input a corresponding Size for that stock"); form.elements['size2'].focus(); return false; }

                if( ltrim(rtrim(form.elements['stock2'].value,' '),' ')=="" ) { alert("You must input a corresponding Stock for that Size"); form.elements['stock2'].focus(); return false; }
                n = parseInt(ltrim(ltrim(rtrim(form.elements['stock2'].value,' '),' '),'£'));
                if(form.elements['stock2'].value != ''){if(isNaN(n) || n < 0){ alert("The stock must be a positive number"); form.elements['stock2'].focus(); return false; }}
            }

            if( (ltrim(rtrim(form.elements['stock3'].value,' '),' ')!="") ||  ltrim(rtrim(form.elements['size3'].value,' '),' ')!="" )
            {
                if( ltrim(rtrim(form.elements['size3'].value,' '),' ')=="" ) { alert("You must input a corresponding Size for that stock"); form.elements['size3'].focus(); return false; }

                if( ltrim(rtrim(form.elements['stock3'].value,' '),' ')=="" ) { alert("You must input a corresponding Stock for that Size"); form.elements['stock3'].focus(); return false; }
                n = parseInt(ltrim(ltrim(rtrim(form.elements['stock3'].value,' '),' '),'£'));
                if(form.elements['stock3'].value != ''){if(isNaN(n) || n < 0){ alert("The stock must be a positive number"); form.elements['stock3'].focus(); return false; }}
            }

            if( (ltrim(rtrim(form.elements['stock4'].value,' '),' ')!="") ||  ltrim(rtrim(form.elements['size4'].value,' '),' ')!="" )
            {
                if( ltrim(rtrim(form.elements['size4'].value,' '),' ')=="" ) { alert("You must input a corresponding Size for that stock"); form.elements['size4'].focus(); return false; }

                if( ltrim(rtrim(form.elements['stock4'].value,' '),' ')=="" ) { alert("You must input a corresponding Stock for that Size"); form.elements['stock4'].focus(); return false; }
                n = parseInt(ltrim(ltrim(rtrim(form.elements['stock4'].value,' '),' '),'£'));
                if(form.elements['stock4'].value != ''){if(isNaN(n) || n < 0){ alert("The stock must be a positive number"); form.elements['stock4'].focus(); return false; }}
            }

            if( (ltrim(rtrim(form.elements['stock5'].value,' '),' ')!="") ||  ltrim(rtrim(form.elements['size5'].value,' '),' ')!="" )
            {
                if( ltrim(rtrim(form.elements['size5'].value,' '),' ')=="" ) { alert("You must input a corresponding Size for that stock"); form.elements['size5'].focus(); return false; }

                if( ltrim(rtrim(form.elements['stock5'].value,' '),' ')=="" ) { alert("You must input a corresponding Stock for that Size"); form.elements['stock5'].focus(); return false; }
                n = parseInt(ltrim(ltrim(rtrim(form.elements['stock5'].value,' '),' '),'£'));
                if(form.elements['stock5'].value != ''){if(isNaN(n) || n < 0){ alert("The stock must be a positive number"); form.elements['stock5'].focus(); return false; }}
            }

            if( ltrim(rtrim(form.elements['file1'].value,' '),' ')=="" ) { alert("Item Image 1 is required"); form.elements['file1'].focus(); return false; }

            if( ltrim(rtrim(form.elements['desc'].value,' '),' ')=="e.g. \nStripped Chino shorts\nZip and Button closure\n\n100% cotton\nColour: Grey\n\nModel in image wears size: 32R" ) form.elements['desc'].value = "";

            $('#butn_95').hide();
            $('#loading_image4').show();



            return true;
        }
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
            margin:32.0px 0.0px 4.0px 0.0px; text-align:center; font-weight:400;
        }
        .Heading-2-C
        {
            font-family:"Oswald", serif; color:#656565; font-size:19.0px; line-height:1.47em;
        }
        .Body-C
        {
            font-family:"Trebuchet MS", sans-serif; color:#2c2c2c; font-size:14.0px; line-height:1.29em;
        }
        .Heading-2-C-C0
        {
            font-family:"Oswald", serif; color:#656565; font-size:21.0px; line-height:1.48em;
        }
        .Heading-3-C
        {
            font-family:"Oswald", serif; color:#e52b50; font-size:14.0px; line-height:1.50em;
        }
        .Heading-3-Ca
        {
            font-family:"Oswald", serif; color:#2c2c2c; font-size:14.0px; line-height:1.50em;
        }
        .Heading-1-C-C0
        {
            font-family:"Oswald", serif; color:#656565; font-size:19.0px; line-height:1.47em;
        }
        .Heading-1-C-C1
        {
            font-family:"Oswald", serif; color:#656565; font-size:13.0px; line-height:1.54em;
        }
        .Heading-3-C-C0
        {
            font-family:"Oswald", serif; font-weight:700; color:#656565; font-size:16.0px; line-height:1.50em;
        }
        .Heading-3-C-C1
        {
            font-family:"Oswald", serif; color:#656565; font-size:13.0px; line-height:1.54em;
        }
        .Heading-3-C-C10
        {
            font-family:"Oswald", serif; color:#656565; font-size:13.0px; line-height:1.54em; text-align: center;
        }
        .Heading-1-C-C9
        {
            font-family:"Oswald", serif; color:#656565; font-size:27.0px; line-height:1.47em;
        }
        .Body-C-C3
        {
            font-family:"Trebuchet MS", sans-serif; color:#2c2c2c; font-size:16.0px; line-height:1.38em;
        }
        .Body-C-C4
        {
            font-family:"Trebuchet MS", sans-serif; color:#ff0000; font-size:16.0px; line-height:1.38em;
        }
        .Heading-3-C-C12
        {
            font-family:"Oswald", serif; font-size:15.0px; line-height:1.47em;
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
            margin:32.0px 0.0px 4.0px 0.0px; text-align:center; font-weight:400;
        }
        .Heading-2-C
        {
            font-family:"Oswald", serif; color:#656565; font-size:19.0px; line-height:1.47em;
        }
        .Body-C
        {
            font-family:"Trebuchet MS", sans-serif; color:#2c2c2c; font-size:14.0px; line-height:1.29em;
        }
        .Heading-2-C-C0
        {
            font-family:"Oswald", serif; color:#656565; font-size:21.0px; line-height:1.48em;
        }
        .Heading-3-C
        {
            font-family:"Oswald", serif; color:#e52b50; font-size:14.0px; line-height:1.50em;
        }
        .Heading-1-C-C0
        {
            font-family:"Oswald", serif; color:#656565; font-size:19.0px; line-height:1.47em;
        }
        .Heading-1-C-C1
        {
            font-family:"Oswald", serif; color:#656565; font-size:13.0px; line-height:1.54em;
        }
        .Heading-3-C-C0
        {
            font-family:"Oswald", serif; font-weight:700; color:#656565; font-size:16.0px; line-height:1.50em;
        }
        .Heading-3-C-C1
        {
            font-family:"Oswald", serif; color:#656565; font-size:13.0px; line-height:1.54em;
        }
        .Heading-3-C-C10
        {
            font-family:"Oswald", serif; color:#656565; font-size:13.0px; line-height:1.54em; text-align: center;
        }
        .Heading-1-C-C9
        {
            font-family:"Oswald", serif; color:#656565; font-size:27.0px; line-height:1.47em;
        }
        .Body-C-C3
        {
            font-family:"Trebuchet MS", sans-serif; color:#2c2c2c; font-size:16.0px; line-height:1.38em;
        }
        .Body-C-C4
        {
            font-family:"Trebuchet MS", sans-serif; color:#ff0000; font-size:16.0px; line-height:1.38em;
        }
        .Heading-3-C-C12
        {
            font-family:"Oswald", serif; font-size:15.0px; line-height:1.47em;
        }
        .Body-C-C1a
        {
            font-family:"Trebuchet MS", sans-serif; color:#2c2c2c; font-size:13.0px; line-height:1.38em;
        }
    </style>

    <style type ="text/css">
        .Heading-1-P
        {
            margin:32.0px 0.0px 4.0px 0.0px; text-align:center; font-weight:400;
        }
        .Heading-2-C
        {
            font-family:"Oswald", serif; color:#656565; font-size:19.0px; line-height:1.47em;
        }
        .Body-C
        {
            font-family:"Trebuchet MS", sans-serif; color:#2c2c2c; font-size:14.0px; line-height:1.29em;
        }
        .Heading-2-C-C0
        {
            font-family:"Oswald", serif; color:#656565; font-size:21.0px; line-height:1.48em;
        }
        .Heading-3-C
        {
            font-family:"Oswald", serif; color:#e52b50; font-size:14.0px; line-height:1.50em;
        }
        .Heading-1-C-C0
        {
            font-family:"Oswald", serif; color:#656565; font-size:19.0px; line-height:1.47em;
        }
        .Heading-1-C-C1
        {
            font-family:"Oswald", serif; color:#656565; font-size:13.0px; line-height:1.54em;
        }
        .Heading-3-C-C0
        {
            font-family:"Oswald", serif; font-weight:700; color:#656565; font-size:16.0px; line-height:1.50em;
        }
        .Heading-3-C-C1
        {
            font-family:"Oswald", serif; color:#656565; font-size:13.0px; line-height:1.54em;
        }
        .Heading-3-C-C10
        {
            font-family:"Oswald", serif; color:#656565; font-size:13.0px; line-height:1.54em; text-align: center;
        }
        .Heading-1-C-C9
        {
            font-family:"Oswald", serif; color:#656565; font-size:27.0px; line-height:1.47em;
        }
        .Body-C-C3
        {
            font-family:"Trebuchet MS", sans-serif; color:#2c2c2c; font-size:16.0px; line-height:1.38em;
        }
        .Body-C-C4
        {
            font-family:"Trebuchet MS", sans-serif; color:#ff0000; font-size:16.0px; line-height:1.38em;
        }
        .Heading-3-C-C12
        {
            font-family:"Oswald", serif; font-size:15.0px; line-height:1.47em;
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
            font-family:"Oswald", serif; color:#656565; font-size:19.0px; line-height:1.47em;
        }
        .Body-C
        {
            font-family:"Trebuchet MS", sans-serif; color:#2c2c2c; font-size:14.0px; line-height:1.29em;
        }
        .Heading-2-C-C0
        {
            font-family:"Oswald", serif; color:#656565; font-size:21.0px; line-height:1.48em;
        }
        .Body-C-C0
        {
            font-family:"Oswald", serif; color:#2c2c2c; font-size:19.0px; line-height:1.47em;
        }
        .Body-C-C1
        {
            font-family:"Oswald", serif; color:#2c2c2c; font-size:14.0px; line-height:1.50em;
        }

        #nav-bar {  min-height: 80px; background: #fff; }        /* Top bar height and colour */
        #nav > li:hover > a { border-top: 3px solid #E52B50; }    /* Navigation bar top border hover state colour */
        .button.amaranth { background-color: #E52B50; }           /* Button colour throughout site */


    </style>
    <script type="text/javascript" src="http://www.zooqie.com/wpscripts/jspngfix.js"></script>
    <link rel="stylesheet" href="http://www.zooqie.com/wpscripts/wpstyles.css" type="text/css">
    <script type="text/javascript">var blankSrc = "http://www.zooqie.com/wpscripts/blank.gif";
    </script>
    <script type="text/javascript" src="http://www.zooqie.com/wpscripts/jsRollover.js"></script>
    <script type="text/javascript">
        PPImgInit('roll_5','http://www.zooqie.com/wpimages/search.jpg','http://www.zooqie.com/wpimages/search-over.jpg','http://www.zooqie.com/','http://www.zooqie.com/',0,0);

    </script>
    </head>

    <body text="#000000" style="background:#ffffff url('http://www.zooqie.com/wpimages/wp27651732_06.png') repeat fixed top center; height:2894px;  /*Master Page Body Style*/ -webkit-box-shadow:1 1px 15px rgba(0,0,0,0.3); box-shadow:0 1px 15px rgba(0,0,0,0.3);">
    <!--Master Page Body Start-->

    <div id="fb-root"></div>
    <script type="text/javascript">(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <div style="background-color:#ffffff;margin-left:auto;margin-right:auto;position:relative;width:1000px;height:2894px;">
    <div id="nav-panel" class="wpfixed" style="left:50%;margin-left:-500px;top:0px;width:1000px;height:90px; z-index: 199;">
        <img src="http://www.zooqie.com/wpimages/wp0a3dfc87_06.png" border="0" width="187" height="34" id="qs_3" title="" alt="Search Bar" onload="OnLoadPngFix()" style="position:absolute;left:151px;top:27px;">
        <form id="site_search_1" action="" onSubmit="return false;" style="position: absolute; top:30px; left:153px; width:273px; height:22px;margin: 0; padding: 0;">
            <input id="site_search_1_input" name="site_search_1_input" onkeypress="if (event.keyCode==13) window.location.href='search-results.html?site_search_results_1='+document.getElementById('site_search_1_input').value+'&amp;depth=0';" style="width: 180px;" type="text"><div style="display: inline"><button onclick="window.location.href='search-results.html?site_search_results_1='+document.getElementById('site_search_1_input').value+'&amp;depth=0';" style="width: 83px; visibility:hidden;">Search</button></div>
        </form>
        <a href="javascript: window.location.href='search-results.html?site_search_results_1='+document.getElementById('site_search_1_input').value+'&amp;depth=0'" onmouseover="PPImgAction('over','roll_5')" onmouseout="PPImgAction('out','roll_5')"><img src="http://www.zooqie.com/wpimages/search.jpg" border="0" width="30" height="30" id="roll_5" name="roll_5" title="" alt="Search icon" style="position:absolute;left:340px;top:29px;"></a>
        <div id="frag_35" style="position:absolute;left:350px;top:0px;width:639px;height:73px;">
            <!-- nav -->
            <ul id="nav" class="sf-menu">

                <li><a href="http://www.zooqie.com/index.html">Home</a>
                </li>

                <li><a href="http://www.zooqie.com/men.php">Men</a>
                    <ul>
                        <li><a href="http://www.zooqie.com/menall.php">All &nbsp;Men's</a></li>
                        <li><a href="http://www.zooqie.com/menall.php?na=on">New Arrivals</a></li>
                        <li><a href="http://www.zooqie.com/menall.php?mp=on">Most Popular</a></li>
                    </ul>
                </li>

                <li><a href="http://www.zooqie.com/women.php">Women</a>
                    <ul>
                        <li><a href="http://www.zooqie.com/womenall.php">All &nbsp;Women's</a></li>
                        <li><a href="http://www.zooqie.com/womenall.php?na=on">New Arrivals</a></li>
                        <li><a href="http://www.zooqie.com/womenall.php?mp=on">Most Popular</a></li>
                    </ul>
                </li>

                <li><a href="http://www.zooqie.com/brands.php">Brands</a>
                </li>

                <li><a href="http://www.zooqie.com/blog/">Blog</a>
                </li>

                <li><a href="http://www.zooqie.com/about.html">About</a>
                    <ul>
                        <li><a href="http://www.zooqie.com/about.html">About Us</a></li>
                        <li><a href="http://www.zooqie.com/faqs.html">FAQS</a></li>
                    </ul>
                </li>

                <li><a href="http://www.zooqie.com/contact.html">Contact</a>
                    <ul>
                        <li><a href="http://www.zooqie.com/contact.html">Contact Us</a></li>
                        <li><a href="http://www.zooqie.com/newbrands.html">Set up your brand on Zookie</a></li>
                        <li><a href="http://www.zooqie.com/returns.php">Returns and Disputes</a></li>
                    </ul>
                </li>

            </ul>
            <!-- ends nav -->
        </div>
        <a href="http://www.zooqie.com/index.html"><img src="http://www.zooqie.com/wpimages/wpde5c8324_05_06.jpg" border="0" width="125" height="41" id="pic_255" title="" alt="Home" style="position:absolute;left:6px;top:24px;"></a>
    </div>
    <img src="http://www.zooqie.com/wpimages/wpbbcbff94_06.png" border="0" width="1000" height="40" id="qs_1" title="" alt="Navigation Bar" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:80px;">
    <script type="text/javascript" id="nav_348_script">
        try {
            var navtree_nav_348 = WpNavBar.getNavTreeBreadcrumb( global_navtree, {'m_sThisPageUrl':'http://www.zooqie.com/uploadmenu.php',
                'm_bAbsoluteLinks':true,
                'm_sNavBarTarget':'_self',
                'm_bIncludeHome':false,
                'm_bIncludeAnchors':false,
                'm_bFlash':false,
                'm_bIncludeChildren':false,
                'm_bHideCurrent':false} );
            if( !navtree_nav_348 ) throw WpNavBar.getErrorObj( 'Link tree could not be read' );
            var nav_348 = new wp_navbar_textmenu("nav_348", navtree_nav_348, {'m_bPopupBelow':1,'m_bPopupRight':1,'m_iTimeOut':100,'m_iPopupAlignmentH':0,'m_sId':'nav_348',
                'm_sScriptId':'nav_348_script',
                'm_iLeft':20,
                'm_iTop':101,
                'm_sCssClass':'nav_348style',
                'm_iWidth':960,
                'm_iHeight':26}, {'m_iMaxCssLevel':1,
                top:{'m_sPrefix':'','m_sSpacerText':' > ','m_sPostfix':'','m_bNumbersOnly':false,
                    link:{'m_sPrefix':' ','m_sPostfix':' '}},
                level1:{'m_bFirstPopupSameSize':true,'m_iMinWidth':100,'m_iFirstPopupOffset':1,'m_iInterPopupOffset':1,'m_iOpacity':100,'m_bFade':true,'m_iFadeSpeed':5,
                    separator:{'m_bAllowSeparators':true}}});
        } catch(e){
            document.write( '<div style="position:absolute;left:20;top:101;width:960;height:26">There was an error generating the navbar:<br>' + e.message + '</div>' );
        }
    </script>
    <noscript>
        <div class="nav_348style" id="nav_348" style="left: 20px; top: 91px;; width: 960px; height: 26px; position: absolute;"><a id="nav_348_I0" href="http://www.zooqie.com/index.html" target="_self"> Home </a> &gt; <a class=" currentpage" id="nav_348_I1" href="http://www.zooqie.com/uploadmenu.php" target="_self"> Brand Upload Tool </a></div>
    </noscript>
    <div id="txt_15" style="position:absolute;left:760px;top:2672px;width:220px;height:40px;overflow:hidden;">
        <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Follow Us</span></h2>
    </div>
    <div id="txt_24" style="position:absolute;left:520px;top:2723px;width:220px;height:85px;overflow:hidden;">
        <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="http://www.zooqie.com/contact.html" style="text-decoration:none;">Contact Us</a></span></p>
        <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="http://www.zooqie.com/returns.php" style="text-decoration:none;">Returns and Disputes</a></span></p>
        <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="http://www.zooqie.com/login.html" style="text-decoration:none;">Brand Login</a> / <a class="hlink_1" href="http://www.zooqie.com/logout.php" style="text-decoration:none;">Logout</a></span></p>
    </div>
    <div id="txt_27" style="position:absolute;left:520px;top:2672px;width:220px;height:40px;overflow:hidden;">
        <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Customer Services</span></h2>
    </div>
    <img src="http://www.zooqie.com/wpimages/wp5f65e1d9_06.png" border="0" width="960" height="1" id="pcrv_3" title="" alt="Footer Line" onload="OnLoadPngFix()" style="position:absolute;left:20px;top:2658px;">
    <img src="http://www.zooqie.com/wpimages/wp5f65e1d9_06.png" border="0" width="960" height="1" id="pcrv_4" title="" alt="Footer Line" onload="OnLoadPngFix()" style="position:absolute;left:20px;top:2820px;">
    <map id="map0" name="map0">
        <area shape="poly" coords="23,34,31,29,35,23,35,12,30,4,23,0,12,0,4,5,0,12,0,23,5,31,12,35,23,35" href="https://www.facebook.com/zookieuk" target="_blank" alt="">
    </map>
    <img src="http://www.zooqie.com/wpimages/wp68bae2bd_06.png" border="0" width="35" height="35" id="pic_30" title="" alt="Facebook Follow Us Badge" onload="OnLoadPngFix()" usemap="#map0" style="position:absolute;left:760px;top:2723px;">
    <map id="map1" name="map1">
        <area shape="poly" coords="23,34,31,29,35,23,35,12,30,4,23,0,12,0,4,5,0,12,0,23,5,31,12,35,23,35" href="https://twitter.com/zookieuk" target="_blank" alt="">
    </map>
    <img src="http://www.zooqie.com/wpimages/wp737a85bd_06.png" border="0" width="35" height="35" id="pic_33" title="" alt="Twitter Follow Us Badge" onload="OnLoadPngFix()" usemap="#map1" style="position:absolute;left:814px;top:2723px;">
    <div id="txt_23" style="position:absolute;left:20px;top:2723px;width:220px;height:85px;overflow:hidden;">
        <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="http://www.zooqie.com/about.html" style="text-decoration:none;">About Us</a></span></p>
        <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="http://www.zooqie.com/newbrands.html" style="text-decoration:none;">New Brands</a></span></p>
        <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="http://www.zooqie.com/faqs.html" style="text-decoration:none;">Frequently Asked Questions</a></span></p>
    </div>
    <div id="txt_26" style="position:absolute;left:20px;top:2672px;width:220px;height:40px;overflow:hidden;">
        <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Information</span></h2>
    </div>
    <img src="http://www.zooqie.com/wpimages/wp6e5a025e_06.png" border="0" width="45" height="45" id="pic_60" alt="" onload="OnLoadPngFix()" style="position:absolute;left:141px;top:2841px;">
    <img src="http://www.zooqie.com/wpimages/wpe85ce6a2_06.png" border="0" width="45" height="45" id="pic_61" alt="" onload="OnLoadPngFix()" style="position:absolute;left:81px;top:2841px;">
    <img src="http://www.zooqie.com/wpimages/wp26d480b6_06.png" border="0" width="45" height="45" id="pic_62" alt="" onload="OnLoadPngFix()" style="position:absolute;left:202px;top:2841px;">
    <img src="http://www.zooqie.com/wpimages/wp8ee6fd42_06.png" border="0" width="45" height="45" id="pic_64" alt="" onload="OnLoadPngFix()" style="position:absolute;left:262px;top:2841px;">
    <img src="http://www.zooqie.com/wpimages/wp1fd841c5_06.png" border="0" width="45" height="45" id="pic_63" alt="" onload="OnLoadPngFix()" style="position:absolute;left:20px;top:2841px;">
    <div id="txt_163" style="position:absolute;left:760px;top:2773px;width:220px;height:35px;overflow:hidden;">
        <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C-C0">GET SOCIAL</span></h2>
    </div>
    <div id="txt_164" style="position:absolute;left:269px;top:2723px;width:220px;height:85px;overflow:hidden;">
        <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="http://www.zooqie.com/privacy.html" style="text-decoration:none;">Privacy Policy &amp; Cookies</a></span></p>
        <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="http://www.zooqie.com/terms.html" style="text-decoration:none;">Terms and Conditions</a></span></p>
    </div>
    <div id="txt_166" style="position:absolute;left:269px;top:2672px;width:220px;height:40px;overflow:hidden;">
        <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Policies</span></h2>
    </div>
    <div id="frag_56" style="position:absolute;left:785px;top:100px;width:80px;height:20px;">
        <div class="fb-like" data-href="https://www.facebook.com/zookieuk" data-width="50" data-layout="button_count" data-show-faces="false" data-send="false"></div>
    </div>
    <div id="frag_57" style="position:absolute;left:865px;top:100px;width:127px;height:20px;">
        <a href="https://twitter.com/zookieuk" class="twitter-follow-button" data-show-count="false">Follow @zookieuk</a>
        <script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </div>
    <div id="sizing_guides_panel" style="position:absolute;left:171px;top:130px;width:828px;height:255px; <?if($tab != '4')
    {
        echo 'visibility:hidden;';
    }?>">
    <div id="txt_470" style="position:absolute;left:16px;top:27px;width:227px;height:33px;overflow:hidden;">
        <p class="Wp-Body-P"><span class="Body-C-C0">Create Sizing Guides</span></p>
    </div>
    <img src="http://www.zooqie.com/wpimages/wp7e4cb21c_06.png" border="0" width="793" height="1" id="pcrv_17" alt="" onload="OnLoadPngFix()" style="position:absolute;left:16px;top:69px;">
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
    <form id="form_98" onsubmit="return validate_form_98(this)"  action="http://www.zooqie.com/uploadmenu.php?Tab=4" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
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
    <script type="text/javascript" src="wpscripts/jsValidation.js"></script>




    <form id="form_99" onsubmit="return validate_form_99(this)" action="http://www.zooqie.com/sizing_guide.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
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
    <script type="text/javascript" src="wpscripts/jsValidation.js"></script>
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
    <form id="form_41" name="refineForm" action="http://www.zooqie.com/uploadmenu.php?Tab=3" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" >
    <?php

    echo '
        		<img src="wpimages/wp112b8d69_06.png" border="0" width="592" height="43" id="qs_288" alt="" onload="OnLoadPngFix()" style="position:absolute;left:200px;top:0px; " >
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


    echoRefineByHeader(1, "Refine by Gender");


    echo '
        		<div class="slidingDiv1">	
        	';

    if($male == 'true')
    {
        if($_POST['Male'] == 'on')
        {
            echo '<p><input style="float:left;" type="checkbox" id="check_34" name="Male" onClick="submit();" checked>';
        }
        else
        {
            echo '<p><input style="float:left;" type="checkbox" id="check_34" name="Male" onClick="submit();">';
        }

        echo '
        		
        			<!-- HTML Frame - Male txt_361 -->
        			<div id="txt_361" style="float:left;">
        				<h1 class="Wp-Heading-1-P" style="margin-top:0px">
        					<span class="Heading-3-C-C1">
        						Male
        					</span>
        				</h1>
        			</div>
        			<br/>
        			</p>
        			
        		
        		';


    }

    if($female == 'true')
    {
        if($_POST['Female'] == 'on')
        {
            echo '<p><input style="float:left;" type="checkbox" id="check_35" name="Female" onClick="submit();" checked>';
        }
        else
        {
            echo '<p><input style="float:left;" type="checkbox" id="check_35" name="Female" onClick="submit();">';
        }

        echo '
        			<!-- HTML Frame - Female txt_362 -->
        			<div id="txt_362" style="float:left;">
        				<h1 class="Wp-Heading-1-P" style="margin-top:0px">
        					<span class="Heading-3-C-C1">
        						Female
        					</span>
        				</h1>
        			</div>
        			<br/>
        			</p>
        		';

    }

    echo '
        		</div>	
        	';


    echoRefineByHeader(2, "Refine by Type");


    echo '
        		<div class="slidingDiv2">	
        	';

    for ($j = 0; $j < $categoryCounter; $j++)
    {
        $strreplace = str_replace(' ', '_', $categoryStrings[$j]);
        if($_POST[$strreplace] == 'on')
        {
            echo '<p><input type="checkbox" name="' . $categoryStrings[$j] . '" style="float:left;" onClick="submit();" checked>';
        }
        else
        {
            echo '<p><input type="checkbox" name="' . $categoryStrings[$j] . '" style="float:left;" onClick="submit();">';
        }

        echo '
        			<div style="float:left;" >
        			<h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-3-C-C1">' . $categoryStrings[$j] . '</span></h1>			
        			</div>
        			<br/>
        			</p>
        			
        		';

    }

    echo '
        		</div>	
        	';



    echo '
        		</div>	
        	';


    ?>
    </form>
    <script type="text/javascript" src="wpscripts/jsValidation.js"></script>


    <?

    // Check connection
    if (mysqli_connect_errno($con))
    {
        echo '<div style="position:absolute;left:508px;top:265px;"> Failed to connect to products database, please try again later.  </div>';
    }
    else
    {


        $str = '';
        if($_POST['Male'] == 'on' && $_POST['Female'] != 'on')
        {
            $str .= " AND (Gender ='M' OR Gender ='U')";
        }
        else if ($_POST['Male'] != 'on' && $_POST['Female'] == 'on')
        {
            $str .= " AND (Gender ='F' OR Gender ='U')";
        }
        else
        {
            $str .= " AND (Gender ='M' OR Gender ='F' OR Gender ='U')";
        }





        $and = 'false';
        for ($j = 0; $j < $categoryCounter; $j++)
        {
            $strreplace = str_replace(' ', '_', $categoryStrings[$j]);
            if($_POST[$strreplace] == 'on')
            {
                if($and == 'false')
                {
                    $str .= " AND (Category ='" . strtoupper($categoryStrings[$j]) . "'";
                    $and = 'true';
                }
                else
                {
                    $str .= " OR Category ='" . strtoupper($categoryStrings[$j]) . "'";
                }
            }
        }
        if($and == 'true')
        {
            $str .= ")";
        }







        if($_POST['LowerBoundPrice'] != '' && $_POST['UpperBoundPrice'] != '')
        {
            $str .= " AND (Price <= " . $_POST['UpperBoundPrice'] . ") AND (Price >= " . $_POST['LowerBoundPrice'] . ")";
        }







        $and = 'false';
        for ($j = 0; $j < $colourCounter; $j++)
        {
            if($_POST[$colourStrings[$j]] == 'on')
            {
                if($and == 'false')
                {
                    $str .= " AND (Colour ='" . strtoupper($colourStrings[$j]) . "'";
                    $and = 'true';
                }
                else
                {
                    $str .= " OR Colour ='" . strtoupper($colourStrings[$j]) . "'";
                }
            }
        }
        if($and == 'true')
        {
            $str .= ")";
        }








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


        echo '<a class="inline" href="#inline_content">
        			  <img src="images/QS.png" border="0" width="' . $width . '" height="' . $height . '" title="" alt="' . $itemname . '" onload="OnLoadPngFix()" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px; " class="fader_img"></a>';

        echo'
        			<script type="text/javascript">
        			  $(document).ready(function(){    
        				   $("#text_name").Watermark("e.g. Zero Graphic Tee");
        				   $("#text_price").Watermark("e.g. 14.99");
        				   $("#text_size").Watermark("e.g. Red Small");
        				   $("#text_stock").Watermark("e.g. 14");
        				   $("#text_description").Watermark("e.g. \nStripped Chino shorts\nZip and Button closure\n\n100% cotton\nColour: Grey\n\nModel in image wears size: 32R");
        				});
        			</script>
        			<div style="display:none;">
        			<div id="inline_content" style="padding:10px; background:#fff;">
        			<form id="form_29" onsubmit="return validate_form_29(this)" action="http://www.zooqie.com/add_product.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
        				<input type="hidden" name="username" value="' . $_SESSION['username'] . '">
        				<input type="hidden" name="ID" value="' . $id . '">
        				<input type="hidden" name="brandname" value="' . $brandName . '">
        				
        				
        				<div>
        				
        					<div style="float:left;">
        						<div id="txt_417">
        							<p class="Wp-Body-P"><label for="text_5">
        								<span class="Body-C-C4">Clothing Item Name: </span></label>
        							</p>
        						</div>
        						<textarea style="height:20px;width:200px" id="text_name" name="name" rows="2" cols="41" ></textarea>
        						<br/><br/>
        						
        						
        						<div id="txt_461" >
        							<p class="Wp-Body-P">
        								<label for="combo_29"><span class="Body-C-C4">Category:</span></label>
        							</p>
        						</div>
        						<select style="width:200px" id="combo_29" name="category" size="1"  >
        							<option value="" selected>Please Select One</option>
        						    <option value="Accessories" >Accessories</option>
        						    <option value="Bags" >Bags</option>
        						    <option value="Caps" >Caps</option>
        						    <option value="Cardigans" >Cardigans</option>
        						    <option value="Coats and Jackets" >Coats and Jackets</option>
        						    <option value="Dresses" >Dresses</option>
        						    <option value="Girls Tops" >Girls Tops</option>
        						    <option value="Hats and Beanies" >Hats and Beanies</option>
        						    <option value="Hoodies and Jumpers" >Hoodies and Jumpers</option>
        						    <option value="Jeans" >Jeans</option>
        						    <option value="Jewellery and Watches" >Jewellery and Watches</option>
        						    <option value="Jumpsuits and Playsuits" >Jumpsuits and Playsuits</option>
        						    <option value="Leggings" >Leggings</option>
        						    <option value="Onesies" >Onesies</option>
        						    <option value="Polo Shirts" >Polo Shirts</option>
        						    <option value="Shirts" >Shirts</option>
        						    <option value="Shoes" >Shoes</option>
        						    <option value="Shorts" >Shorts</option>
        						    <option value="Skirts" >Skirts</option>
        						    <option value="Socks" >Socks</option>
        						    <option value="Swimwear and Beachwear" >Swimwear and Beachwear</option>
        						    <option value="Tees" >Tees</option>
        						    <option value="Tights" >Tights</option>
        						    <option value="Trousers" >Trousers</option>
        						    <option value="Underwear" >Underwear</option>
        						    <option value="Vests" >Vests</option>
        						</select>
        						<br/><br/>
        						
        						
        						<div id="txt_461" >
        							<p class="Wp-Body-P">
        								<label for="combo_29"><span class="Body-C-C4">Gender:</span></label>
        							</p>
        						</div>
        						<select style="width:200px" id="combo_29" name="gender" size="1"  >
        							<option value="" selected>Please Select One</option>
        						    <option value="Male" >Male</option>
        						    <option value="Female" >Female</option>
        						    <option value="Unisex" >Unisex</option>
        						</select>
        						<br/><br/>
        						
        						<div>
        							<p class="Wp-Body-P"><label for="text_5">
        								<span class="Body-C-C4">Colour:</span></label>
        								<img src="images/info.jpg" border="0" width="17" height="17" title="Please select the dominant colour of the product. If the product is not clearly one colour, or you are adding a product which comes in a variety of colours, please select Multi." alt="Information Badge" >
        							</p>
        						</div>
        						<select style="width:200px" id="combo_29" name="colour" size="1"  >
        							<option value="" selected>Please Select One</option>
        						    <option value="Beige" >Beige</option>
        						    <option value="Black" >Black</option>
        						    <option value="Blue" >Blue</option>
        						    <option value="Brown" >Brown</option>
        						    <option value="Copper" >Copper</option>
        						    <option value="Cream" >Cream</option>
        						    <option value="Gold" >Gold</option>
        						    <option value="Green" >Green</option>
        						    <option value="Grey" >Grey</option>
        						    <option value="Maroon" >Maroon</option>
        						    <option value="Multi" >Multi</option>
        						    <option value="Navy" >Navy</option>
        						    <option value="Orange" >Orange</option>
        						    <option value="Pink" >Pink</option>
        						    <option value="Purple" >Purple</option>
        						    <option value="Red" >Red</option>
        						    <option value="Silver" >Silver</option>
        						    <option value="Tan" >Tan</option>
        						    <option value="White" >White</option>
        						    <option value="Yellow" >Yellow</option>
        						</select>
        						<br/><br/>
        						
        						
        							<div>
        								<p class="Wp-Body-P"><label for="text_5">
        									<span class="Body-C-C4">Sizing Guide: </span></label>
        									<img src="images/info.jpg" border="0" width="17" height="17" title="It is optional to add a sizing guide. If you want to add a sizing guide, click the Sizing Guides tab." alt="Information Badge" >
        								</p>
        							</div>
        						
        							<select style="width:200px" name="guide" size="1">
        							<option value="" selected>Optionally Select One</option>
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
        							    	<option value="'.$guidename.'">'.$guidename.'</option>
        								';
            }
        }

        echo '
        							</select>
        							<br/><br/>
        						
        
        						
        						
        					</div>
        					
        					
        					
        					
        					<div style="float:left;margin-left:55px">
        						
        						
        								<div id="txt_418"  >
        									<p class="Wp-Body-P">
        										<label for="combo_29"><span class="Body-C-C4">Price:</span></label>
        									</p>
        								</div>
        								<textarea style="height:20px;width:200px" id="text_price" name="price" rows="2" cols="10" ></textarea>
        								<br/><br/>
        								';

        echo '
        							<div>
        								<p class="Wp-Body-P"><label for="text_5">
        									<span class="Body-C-C4">Shipping Prices: </span></label>
        									<img src="images/info.jpg" border="0" width="17" height="17" title="If you want to add a Shipping Price Set, click the Shipping Prices tab." alt="Information Badge" >
        								</p>
        							</div>
        						
        							<select style="width:200px" name="shipping" size="1">
        							<option value="" selected>Please Select One</option>
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
                $shippingname = $row['Name'];

                echo '
        							    	<option value="'.$shippingname.'">'.$shippingname.'</option>
        								';
            }
        }

        echo '
        							</select>
        							<br/><br/>
        						
        						<div id="txt_419" >
        							<p class="Wp-Body-P">
        								<label for="combo_29"><span class="Body-C-C4">Sizes and Stocks:</span></label>
        								<img src="images/info.jpg" border="0" width="17" height="17" title="The available sizes with available stocks per size. For example:
        								Small: 14
        								One Size: 3
        								Size 8: 34
        								If you are adding a product which has multiple colour variations of the same product, make it clear in the stock names. For example:
        								Red Small: 5
        								Blue Small: 8
        								Note: If you need more than 4 stocks, you can edit the product later to add more." alt="Information Badge" >
        							</p>
        						</div>
        						
        						<div>
        							<p>
        								<textarea style="width: 140px;height:20px;" id="text_size" name="size1" rows="2" cols="10"></textarea>
        								<textarea style="width: 50px;height:20px;" id="text_stock" name="stock1" rows="2" cols="10"></textarea>
        							</p>
        						</div>
        						<div>
        							<p>
        								<textarea style="width: 140px;height:20px;" name="size2" rows="2" cols="10"></textarea>
        								<textarea style="width: 50px;height:20px;" name="stock2" rows="2" cols="10"></textarea>
        							</p>
        						</div>
        						<div>
        							<p>
        								<textarea style="width: 140px;height:20px;" name="size3" rows="2" cols="10"></textarea>
        								<textarea style="width: 50px;height:20px;" name="stock3" rows="2" cols="10"></textarea>
        							</p>
        						</div>
        						<div>
        							<p>
        								<textarea style="width: 140px;height:20px;" name="size4" rows="2" cols="10"></textarea>
        								<textarea style="width: 50px;height:20px;" name="stock4" rows="2" cols="10"></textarea>
        							</p>
        						</div>
        						<br/><br/>
        						
        					</div>
        				
        				
        				
        				
        					<div style="float:left;margin-left:55px">
        					
        						
        						<div id="txt_419" >
        							<p class="Wp-Body-P">
        								<label for="combo_29"><span class="Body-C-C4">Description:</span></label>
        							</p>
        						</div>
        						<textarea style="height:170px;width:300px" id="text_description" name="desc" ></textarea>
        						<br/><br/>
        						
        						
        						<div>
        							<p class="Wp-Body-P">
        								<label for="combo_29"><span class="Body-C-C4">Product Images:</span></label>
        								<img src="images/info.jpg" border="0" width="17" height="17" title="Item Image 1 will be the primary image used for the product and will be used in listings." alt="Information Badge" >
        							</p>
        						</div>
        						<div id="txt_423">
        						<p class="Wp-Body-P"><label for="file_5"><span class="Body-C-C3">Item Image 1: </span></label><input type="file" id="file_5" name="file1" size="32"></p>
        						</div>
        						
        						<div id="txt_424" >
        						<p class="Wp-Body-P"><label for="file_6"><span class="Body-C-C3">Item Image 2: </span></label><input type="file" id="file_6" name="file2" size="32"></p>
        						</div>
        						
        						<div id="txt_425">
        						<p class="Wp-Body-P"><label for="file_7"><span class="Body-C-C3">Item Image 3: </span></label><input type="file" id="file_7" name="file3" size="32" ></p>
        						</div>
        						
        						<div id="txt_426" >
        						<p class="Wp-Body-P"><label for="file_8"><span class="Body-C-C3">Item Image 4: </span></label><input type="file" id="file_8" name="file4" size="32" ></p>
        						</div>
        						
        						<div id="txt_427" >
        						<p class="Wp-Body-P"><label for="file_9"><span class="Body-C-C3">Item Image 5: </span></label><input type="file" id="file_9" name="file5" size="32" ></p>
        						</div>
        						
        						<br/>
        						<input class="button large blue" type="submit" style="color:white;width:100px;height:30px;float:right;" id="butn_95" value="Submit" ><img src="/css/images/ajax-loader.gif" style="display: none;float:right;" id="loading_image4">
        					
        					</div>
        				</div>
        				
        
        				
        				</form>
        				
        				<script type="text/javascript" src="wpscripts/jsValidation.js"></script>
        			</div>
        			</div>
        		';

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
            while($row = mysqli_fetch_array($res))
            {
                $prevno[$i] = $itemno;
                $i++;

                $img1 = $row['Image_URL1'];
                $img2 = $row['Image_URL2'];
                $img3 = $row['Image_URL3'];
                $img4 = $row['Image_URL4'];
                $img5 = $row['Image_URL5'];
                $gender = $row['Gender'];
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


                    echo '<img src="' . $img1 . '" border="0" width="' . $width . '" height="' . $height . '" alt="" style="border-style:solid;border-width:1px;position:absolute;left:' . $a . 'px;top:' . $b . 'px; " >';

                    echo '<a class="inline" href="#'. $itemno . '">
        						  <img src="images/QS.png" border="0" width="' . $width . '" height="' . $height . '" title="" alt="' . $itemname . '" onload="OnLoadPngFix()" style="position:absolute;left:' . $a . 'px;top:' . $b . 'px; " class="fader_img"></a>';


                    $buttona = $a + $w - $padding - 18;
                    echo '
        					<form onsubmit="'; echo 'return confirm('; echo "'"; echo 'Are you sure?'; echo "'"; echo ');'; echo'" action="http://www.zooqie.com/uploadmenu.php?Tab=3" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
        						<input type="hidden" name="delete" value="'. $itemno . '">
        						<input class="button large red" type="submit" style="position:absolute;left:' . $buttona . 'px;top:' . $b . 'px;color:white;width:20px;height:20px;" value="X" >
        					</form>
        					';

                    $sizeCounter = 0;
                    $res = mysqli_query($con,"SELECT * FROM products WHERE Brand = '". $id . "' AND Item_number ='". $itemno . "'");
                    while($row = mysqli_fetch_array($res))
                    {
                        $sizeString[$sizeCounter] = $row['Size'];
                        $stock[$sizeCounter] = $row['stock'];
                        $sizeCounter++;
                    }

                    echo '
        						<div style="display:none;">
        						<div id="'. $itemno . '" style="padding:10px; background:#fff;height:500px;">
        							<form id="form_52" onsubmit="return validate_form_52(this)" action="http://www.zooqie.com/edit_product.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
        								<input type="hidden" name="username" value="' . $_SESSION['username'] . '">
        								<input type="hidden" name="ID" value="' . $id . '">
        								<input type="hidden" name="itemno" value="' . $itemno . '">
        								<input type="hidden" name="nosizes" value="' . $sizeCounter . '">
        								<input type="hidden" name="brandname" value="' . $brandName . '">
        								
        								<div id="tabs'.$itemcounter.'">
        								  <ul style="font-size:0.9em;">
        								    <li style="font-size:0.9em;"><a href="#tabs-1">Details</a></li>
        								    <li style="font-size:0.9em;"><a href="#tabs-2">Stocks and Sizes</a></li>
        								    <li style="font-size:0.9em;"><a href="#tabs-3">Images</a></li>
        								  </ul>
        								  
        								  <div id="tabs-1">
        								    
        								    <div>
        
        								    	<div style="width:45%;float:left">
        								    		<div id="txt_417">
        												<span class="Body-C-C4">Clothing Item Name: </span>
        												<textarea style="width:100%;height:45px;" id="text_5" name="name" >'. $itemname . '</textarea>
        											</div>
        											<br/>
        											
        											<div id="txt_461" >
        												<span class="Body-C-C4">Gender:</span>
        
        												<select style="width:100%" id="combo_29" name="gender" size="1"  >';
                    if($gender == 'M')
                    {
                        echo '
        														<option value="Male" selected>Male</option>
        											    		<option value="Female">Female</option>
        											    		<option value="Unisex">Unisex</option>
        													';
                    }
                    else if($gender == 'F')
                    {
                        echo '
        														<option value="Male">Male</option>
        											    		<option value="Female" selected>Female</option>
        											    		<option value="Unisex">Unisex</option>
        													';
                    }
                    else if($gender == 'U')
                    {
                        echo '
        														<option value="Male">Male</option>
        											    		<option value="Female">Female</option>
        											    		<option value="Unisex" selected>Unisex</option>
        													';
                    }


                    echo '
        												</select>
        											</div>
        											<br/>
        											
        											<div>
        												<span class="Body-C-C4">Category: </span>
        
        												<select style="width:100%" name="category" size="1"  >';

                    echo '
        													<option value="Accessories" ';if($category == 'Accessories') echo'selected'; echo'>Accessories</option>
        												    <option value="Bags" ';if($category == 'Bags') echo'selected'; echo'>Bags</option>
        												    <option value="Caps" ';if($category == 'Caps') echo'selected'; echo'>Caps</option>
        												    <option value="Cardigans" ';if($category == 'Cardigans') echo'selected'; echo'>Cardigans</option>
        												    <option value="Coats and Jackets" ';if($category == 'Coats and Jackets') echo'selected'; echo'>Coats and Jackets</option>
        												    <option value="Dresses" ';if($category == 'Dresses') echo'selected'; echo'>Dresses</option>
        												    <option value="Girls Tops" ';if($category == 'Girls Tops') echo'selected'; echo'>Girls Tops</option>
        												    <option value="Hats and Beanies" ';if($category == 'Hats and Beanies') echo'selected'; echo'>Hats and Beanies</option>
        												    <option value="Hoodies and Jumpers" ';if($category == 'Hoodies and Jumpers') echo'selected'; echo'>Hoodies and Jumpers</option>
        												    <option value="Jeans" ';if($category == 'Jeans') echo'selected'; echo'>Jeans</option>
        												    <option value="Jewellery and Watches" ';if($category == 'Jewellery and Watches') echo'selected'; echo'>Jewellery and Watches</option>
        												    <option value="Jumpsuits and Playsuits" ';if($category == 'Jumpsuits and Playsuits') echo'selected'; echo'>Jumpsuits and Playsuits</option>
        												    <option value="Leggings" ';if($category == 'Leggings') echo'selected'; echo'>Leggings</option>
        												    <option value="Onesies" ';if($category == 'Onesies') echo'selected'; echo'>Onesies</option>
        												    <option value="Polo Shirts" ';if($category == 'Polo Shirts') echo'selected'; echo'>Polo Shirts</option>
        												    <option value="Shirts" ';if($category == 'Shirts') echo'selected'; echo'>Shirts</option>
        												    <option value="Shoes" ';if($category == 'Shoes') echo'selected'; echo'>Shoes</option>
        												    <option value="Shorts" ';if($category == 'Shorts') echo'selected'; echo'>Shorts</option>
        												    <option value="Skirts" ';if($category == 'Skirts') echo'selected'; echo'>Skirts</option>
        												    <option value="Socks" ';if($category == 'Socks') echo'selected'; echo'>Socks</option>
        												    <option value="Swimwear and Beachwear" ';if($category == 'Swimwear and Beachwear') echo'selected'; echo'>Swimwear and Beachwear</option>
        												    <option value="Tees" ';if($category == 'Tees') echo'selected'; echo'>Tees</option>
        												    <option value="Tights" ';if($category == 'Tights') echo'selected'; echo'>Tights</option>
        												    <option value="Trousers" ';if($category == 'Trousers') echo'selected'; echo'>Trousers</option>
        												    <option value="Underwear" ';if($category == 'Underwear') echo'selected'; echo'>Underwear</option>
        												    <option value="Vests" ';if($category == 'Vests') echo'selected'; echo'>Vests</option>
        												';


                    echo '
        												</select>
        											</div>
        											<br/>
        											
        											<div>
        												<span class="Body-C-C4">Colour: </span><img src="images/info.jpg" border="0" width="17" height="17" title="Please select the dominant colour of the product. If the product is not clearly one colour, or you are adding a product which comes in a variety of colours, please select Multi." alt="Information Badge" >
        								
        												<select style="width:100%" name="colour" size="1"  >';

                    echo '
        													<option value="Beige" ';if($colour == 'Beige') echo'selected'; echo'>Beige</option>
        													<option value="Black" ';if($colour == 'Black') echo'selected'; echo'>Black</option>
        													<option value="Blue" ';if($colour == 'Blue') echo'selected'; echo'>Blue</option>
        													<option value="Brown" ';if($colour == 'Brown') echo'selected'; echo'>Brown</option>
        													<option value="Copper" ';if($colour == 'Copper') echo'selected'; echo'>Copper</option>
        													<option value="Cream" ';if($colour == 'Cream') echo'selected'; echo'>Cream</option>
        													<option value="Gold" ';if($colour == 'Gold') echo'selected'; echo'>Gold</option>
        													<option value="Green" ';if($colour == 'Green') echo'selected'; echo'>Green</option>
        													<option value="Grey" ';if($colour == 'Grey') echo'selected'; echo'>Grey</option>
        													<option value="Maroon" ';if($colour == 'Maroon') echo'selected'; echo'>Maroon</option>
        													<option value="Multi" ';if($colour == 'Multi') echo'selected'; echo'>Multi</option>
        													<option value="Navy" ';if($colour == 'Navy') echo'selected'; echo'>Navy</option>
        													<option value="Orange" ';if($colour == 'Orange') echo'selected'; echo'>Orange</option>
        													<option value="Pink" ';if($colour == 'Pink') echo'selected'; echo'>Pink</option>
        													<option value="Purple" ';if($colour == 'Purple') echo'selected'; echo'>Purple</option>
        													<option value="Red" ';if($colour == 'Red') echo'selected'; echo'>Red</option>
        													<option value="Silver" ';if($colour == 'Silver') echo'selected'; echo'>Silver</option>
        													<option value="Tan" ';if($colour == 'Tan') echo'selected'; echo'>Tan</option>
        													<option value="White" ';if($colour == 'White') echo'selected'; echo'>White</option>
        													<option value="Yellow" ';if($colour == 'Yellow') echo'selected'; echo'>Yellow</option>
        												';


                    echo '
        												</select>
        											</div>
        											<br/>
        											
        												
        											<div>
        												<span class="Body-C-C4">Sizing Guide: </span><img src="images/info.jpg" border="0" width="17" height="17" title="It is optional to add a sizing guide. If you want to add a sizing guide, click the Sizing Guides tab." alt="Information Badge" >
        											
        												<select style="width:100%" name="guide" size="1">
        												<option value="">None</option>
        												';

                    $result2 = mysqli_query($con,"SELECT * FROM sizingguides WHERE Brand = '". $id . "'");

                    while($row2 = mysqli_fetch_array($result2))
                    {
                        $guidename = $row2['Name'];

                        echo '
        												    	<option value="'.$guidename.'"';
                        if($guidename == $guide) echo 'selected';
                        echo '>'.$guidename.'</option>
        													';
                    }


                    echo '
        													</select>
        											</div>
        								    	</div>
        								    	
        								    	
        								    	
        								    	<div style="width:45%;float:right">
        								    		<div id="txt_418"  >
        												<span class="Body-C-C4">Price:</span>
        											
        												<textarea style="width:100%;height:25px;" id="text_6" name="price" >&#163;'. $price .'</textarea>
        											</div>
        											<br/>
        											';


                    echo '
        											
        												
        											<div>
        												<span class="Body-C-C4">Shipping Prices: </span><img src="images/info.jpg" border="0" width="17" height="17" title="If you want to add a Shipping Price Set, click the Shipping Prices tab." alt="Information Badge" >
        											
        												<select style="width:100%" name="shipping" size="1">
        												<option value="">None Selected</option>
        												';

                    $result2 = mysqli_query($con,"SELECT * FROM shippingprices WHERE Brand = '". $id . "'");

                    while($row2 = mysqli_fetch_array($result2))
                    {
                        $shippingname = $row2['Name'];

                        echo '
        												    	<option value="'.$shippingname.'"';
                        if($shippingname == $shipping) echo 'selected';
                        echo '>'.$shippingname.'</option>
        													';
                    }


                    echo '
        												</select>
        											</div>
        											<br/>
        											
        											<div id="txt_419" >
        												<span class="Body-C-C4">Description:</span>
        												<textarea style="width:100%;height:165px;" id="text_7" name="desc" >'. $description . '</textarea>
        											</div>
        											<br/>
        											<input class="button large blue" type="submit" style="float:right;color:white;width:100px;height:30px;" id="butn_55" value="Submit" ><img src="/css/images/ajax-loader.gif" style="display: none;float:right" id="loading_image10">
        								    	</div>
        
        								    </div>
        								    
        								    
        									
        									
        
        								  </div>
        								  
        								  <div id="tabs-2">
        									<div style="float:left;">
        										<span class="Body-C-C4">Size&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Stock </span>
        										<br/>
        										';

                    for ($i = 0; $i < $sizeCounter; $i++)
                    {
                        echo '
        										    	<textarea style="width: 150px;" name="size'.$i.'" rows="1" cols="10">'.$sizeString[$i].'</textarea>
        										    	<input type="hidden" name="oldsize'.$i.'" value="' . $sizeString[$i] . '">
        												<textarea style="width: 50px;" name="stock'.$i.'" rows="1" cols="3">'.$stock[$i].'</textarea>
        												<input type="hidden" name="oldstock'.$i.'" value="'.$stock[$i].'">
        												<br/>
        										    ';
                    }
                    echo '
        											
        								  	</div>
        								  	
        								  	<div style="float:right;">';
                    echo '
        										    	<span class="Body-C-C4">Add new Size </span><img src="images/info.jpg" border="0" width="17" height="17" title="The available sizes with available stocks per size. For example:
        								Small: 14
        								One Size: 3
        								Size 8: 34
        								If you are adding a product which has multiple colour variations of the same product, make it clear in the stock names. For example:
        								Red Small: 5
        								Blue Small: 8
        								Note: If you need more than 4 stocks, you can edit the product later to add more." alt="Information Badge" >
        												<br/>
        										    	<textarea style="width: 150px;" name="newsize0" rows="1" cols="10"></textarea>
        												<textarea style="width: 50px;" name="newstock0" rows="1" cols="3"></textarea>
        												<br/>
        										    ';

                    echo '
        										    	<textarea style="width: 150px;" name="newsize1" rows="1" cols="10"></textarea>
        												<textarea style="width: 50px;" name="newstock1" rows="1" cols="3"></textarea>
        												<br/>
        										    ';

                    echo '
        										    	<textarea style="width: 150px;" name="newsize2" rows="1" cols="10"></textarea>
        												<textarea style="width: 50px;" name="newstock2" rows="1" cols="3"></textarea>
        												<br/>
        										    ';

                    echo '
        										<br/>
        										<br/>
        										<input class="button large blue" type="submit" style="float:right;color:white;width:100px;height:30px;" id="butn_56" value="Submit" ><img src="/css/images/ajax-loader.gif" style="display: none;float:right;" id="loading_image11">
        								  	</div>
        								  </div>
        								  
        								  <div id="tabs-3">
        									<div class="Body-C-C1">
        									<img src="images/info.jpg" border="0" width="17" height="17" title="Item Image 1 will be the primary image used for the product and will be used in listings." alt="Information Badge" >
        									
        									<p class="Wp-Body-P"><span class="Body-C-C4">Image 1: </span><input type="file" name="file1"></p>
        									</div>
        									
        									<div class="Body-C-C1">
        									<p class="Wp-Body-P"><span class="Body-C-C4">Image 2: </span><input type="file" name="file2"></p>
        									</div>
        									
        									<div class="Body-C-C1">
        									<p class="Wp-Body-P"><span class="Body-C-C4">Image 3: </span><input type="file" name="file3"></p>
        									</div>
        									
        									<div class="Body-C-C1">
        									<p class="Wp-Body-P"><span class="Body-C-C4">Image 4: </span><input type="file" name="file4"></p>
        									</div>
        									
        									<div class="Body-C-C1">
        									<p class="Wp-Body-P"><span class="Body-C-C4">Image 5: </span><input type="file" name="file5"></p>
        									</div>
        								    <br/>
        								    <div style="position:absolute;left:550px;top:30px; ">
        										<img src="' . $img1 . '" border="0" width="189" height="244" id="pic_258" alt="" style="position:absolute;left:49px;top:0px; " >
        										<img src="' . $img2 . '" border="0" width="45" height="58" id="pic_259" alt="" style="position:absolute;left:0px;top:0px; " >
        										<img src="' . $img3 . '" border="0" width="45" height="58" id="pic_260" alt="" style="position:absolute;left:0px;top:62px; " >
        										<img src="' . $img4 . '" border="0" width="45" height="58" id="pic_261" alt="" style="position:absolute;left:0px;top:124px; " >
        										<img src="' . $img5 . '" border="0" width="45" height="58" id="pic_262" alt="" style="position:absolute;left:0px;top:186px; " >
        									</div>
        									<input class="button large blue" type="submit" style="color:white;width:100px;height:30px;" id="butn_57" value="Submit" ><img src="/css/images/ajax-loader.gif" style="display: none;" id="loading_image12">
        							</form>
        							<script type="text/javascript" src="wpscripts/jsValidation.js"></script>
        								  	';

                    if($_POST['resetimgs'] == $itemno)
                    {
                        $_POST['resetimgs'] = '';
                        $updatesql = "UPDATE products SET Image_URL1=NULL,Image_URL2=NULL,Image_URL3=NULL,Image_URL4=NULL,Image_URL5=NULL WHERE Item_number='" . $itemno . "'";
                        $updateres = mysqli_query($con,$updatesql);
                    }

                    echo '
        									<form onsubmit="'; echo 'return confirm('; echo "'"; echo 'Are you sure?'; echo "'"; echo ');'; echo'" action="http://www.zooqie.com/uploadmenu.php?Tab=3" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
        										<input type="hidden" name="resetimgs" value="'.$itemno.'">
        										<input class="button large red" type="submit" style="color:white;width:100px;height:30px;" value="Reset" >
        									</form>
        								  </div>
        							</div>
        							
        							
        						</div>
        					</div>
        					
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
    <img src="http://www.zooqie.com/wpimages/wp7e4cb21c_06.png" border="0" width="793" height="1" id="pcrv_6" alt="" onload="OnLoadPngFix()" style="position:absolute;left:17px;top:69px;">
    </div>
    <div id="Shipping" style="position:absolute;left:170px;top:130px;width:827px;height:629px; <?if($tab != '5')
    {
        echo 'visibility:hidden;';
    }?>">
        <div id="txt_471" style="position:absolute;left:17px;top:27px;width:227px;height:33px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C0">Set Custom Shipping Prices</span></p>
        </div>
        <img src="http://www.zooqie.com/wpimages/wp7e4cb21c_06.png" border="0" width="793" height="1" id="pcrv_18" alt="" onload="OnLoadPngFix()" style="position:absolute;left:17px;top:69px;">
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

            <form id="form_95" action="http://www.zooqie.com/uploadmenu.php?Tab=5" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
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
            <script type="text/javascript" src="wpscripts/jsValidation.js"></script>

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
            <form id="form_93" name="userinfo_2" onsubmit="return validate_form_93(this)" action="http://www.zooqie.com/shipping_prices.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" >
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
            <script type="text/javascript" src="wpscripts/jsValidation.js"></script>

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

            <form id="form_30" onsubmit="return validate_form_30(this)" action="http://www.zooqie.com/upload_store_imgs.php?Tab=2" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" style="margin:0;position:relative;left:0px;top:0px;width:360px;height:136px; " >
                <input type="hidden" name="username" value="<?echo $_SESSION['username'];?>">
                <input type="hidden" name="ID" value="<?echo $id;?>">


                <div id="txt_434" style="position:absolute;left:8px;top:8px;width:46px;height:25px;overflow:hidden; " >
                    <p class="Wp-Body-P"><label for="file_10"><span class="Body-C-C1">Logo:</span></label></p>
                </div>
                <input type="file" id="file_10" name="file1" size="17" style="position:absolute; left:112px; top:8px; width:208px;  " >


                <div id="txt_435" style="position:absolute;left:8px;top:38px;width:60px;height:25px;overflow:hidden; " >
                    <p class="Wp-Body-P"><label for="file_11"><span class="Body-C-C1">Banner:</span></label></p>
                </div>
                <input type="file" id="file_11" name="file2" size="17" style="position:absolute; left:112px; top:38px; width:208px;  " >



                <div id="txt_436" style="position:absolute;left:8px;top:68px;width:93px;height:25px;overflow:hidden; " >
                    <p class="Wp-Body-P"><label for="file_12"><span class="Body-C-C1">Background:</span></label></p>
                </div>
                <input type="file" id="file_12" name="file3" size="17" style="position:absolute; left:112px; top:68px; width:208px;  " >


                <div style="position:absolute;left:8px;top:98px;width:93px;height:25px;overflow:hidden; " >
                    <p class="Wp-Body-P"><span class="Body-C-C1">Storefront:</span></p>
                </div>
                <input type="file" id="file_12" name="file4" size="17" style="position:absolute; left:112px; top:98px; width:208px;  " >



                <input type="submit" class="button large blue" style="position:absolute; left:8px; top:135px; width:81px; height:22px; color:white" id="butn_7" value="Submit" ><img style="position:absolute; left:8px; top:135px; display: none; color:white" src="/css/images/ajax-loader.gif" id="loading_image2">

            </form>
            <script type="text/javascript" src="wpscripts/jsValidation.js"></script>


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
                $result = mysqli_query($con,"SELECT * FROM brands WHERE Username = '". $_SESSION['username'] . "'");

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
        		<p class="Wp-Body-P"><span class="Body-C-C1">Storefront Image Preview</span></p>
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

            /*
            $tmp = $x + 64;
            echo '
            <img src="wpimages/wp07281070_05_06.jpg" border="0" width="474" height="25" id="pic_259" alt="" style="position:absolute;left:317px;top:'.$tmp.'px; " >
            ';
            */

            $tmp = $x + 30;
            echo '
        		<div style="position:absolute;left:317px;top:'.$tmp.'px; >
        		<p class="Wp-Body-P"><span class="Body-C-C1">Store (Logo, Banner, Background) Preview</span></p>
        		</div>
        		
        		</div>
        
        	';

            ?>
        </div>
        <div id="txt_453" style="position:absolute;left:16px;top:27px;width:232px;height:33px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C0">Upload Store Images</span></p>
        </div>
        <img src="http://www.zooqie.com/wpimages/wp9bdce3b1_06.png" border="0" width="792" height="1" id="pcrv_13" alt="" onload="OnLoadPngFix()" style="position:absolute;left:16px;top:69px;">
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
                $result = mysqli_query($con,"SELECT * FROM brands WHERE Username = '". $_SESSION['username'] . "'");

                while($row = mysqli_fetch_array($result))
                {
                    $name = $row['Brand_name'];
                    $desc = stripslashes($row['Description']);
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

            <form id="form_31" onsubmit="return validate_form_31(this)" action="http://www.zooqie.com/upload_brand_information.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" >

                <input type="hidden" name="username" value="<?echo $_SESSION['username'];?>">
                <input type="hidden" name="ID" value="<?echo $id;?>">


                <div style="width:600px;height:60px;">
                    <span class="Heading-3-C">*</span><span class="Heading-3-Ca">Brand Name:</span><textarea style="float:right;width:350px;height:20px;top:-10px;position:relative;" name="Brand_name" ><?echo $name;?></textarea>
                </div>

                <div style="width:600px;height:190px;">
                    <span class="Heading-3-C">*</span><span class="Heading-3-Ca">Brand Description:</span><textarea style="float:right;width:350px;height:150px;top:-10px;position:relative;" name="Desc" ><?echo $desc;?></textarea>
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
            <script type="text/javascript" src="wpscripts/jsValidation.js"></script>

            <form id="form_321" onsubmit="return validate_form_321(this)" action="http://www.zooqie.com/upload_brand_information.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" >
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
            <script type="text/javascript" src="wpscripts/jsValidation.js"></script>


        </div>
        <div id="txt_454" style="position:absolute;left:16px;top:26px;width:227px;height:33px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C0">Update Brand Information</span></p>
        </div>
        <img src="http://www.zooqie.com/wpimages/wp7e4cb21c_06.png" border="0" width="793" height="1" id="pcrv_14" alt="" onload="OnLoadPngFix()" style="position:absolute;left:16px;top:68px;">
    </div>
    <div id="panel_8" style="position:absolute;left:0px;top:405px;width:170px;height:68px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2;/*MainDivStyle*/">
        <div id="txt_449" style="position:absolute;left:20px;top:23px;width:129px;height:21px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C1">Products</span></p>
        </div>
    </div>
    <div id="panel_7" style="position:absolute;left:0px;top:199px;width:170px;height:69px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2;/*MainDivStyle*/">
        <div id="txt_450" style="position:absolute;left:20px;top:23px;width:129px;height:22px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C1">Store Images</span></p>
        </div>
    </div>
    <div id="panel_6" style="position:absolute;left:0px;top:130px;width:170px;height:68px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2;/*MainDivStyle*/">
        <div id="txt_451" style="position:absolute;left:20px;top:26px;width:129px;height:22px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C1">Brand Info</span></p>
        </div>
    </div>
    <img src="http://www.zooqie.com/wpimages/wp80632d84_06.png" border="0" width="1" height="2528" id="pcrv_5" alt="" style="position:absolute;left:171px;top:130px;">
    <a name="panel_9" style="position:absolute; left:0px; top:337px"></a>
    <div id="panel_9" style="position:absolute;left:0px;top:337px;width:170px;height:67px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2;/*MainDivStyle*/">
        <div id="txt_469" style="position:absolute;left:20px;top:23px;width:129px;height:21px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C1">Sizing Guides</span></p>
        </div>
    </div>
    <div id="panel_10" style="position:absolute;left:0px;top:269px;width:170px;height:67px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2; /*MainDivStyle*/">
        <div id="txt_478" style="position:absolute;left:20px;top:23px;width:129px;height:22px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C1">Shipping Prices</span></p>
        </div>
    </div>
    <div id="panel_11" style="position:absolute;left:0px;top:474px;width:170px;height:70px; cursor:pointer; cursor:hand; border-style:solid;border:1px solid#CDCFD2; /*MainDivStyle*/">
        <div id="txt_479" style="position:absolute;left:20px;top:23px;width:129px;height:21px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C1">FAQs</span></p>
        </div>
    </div>
    <div id="FAQs" style="position:absolute;left:170px;top:130px;width:810px;height:628px; visibility:hidden; /*MainDivStyle*/">
        <div id="txt_480" style="position:absolute;left:17px;top:27px;width:229px;height:33px;overflow:hidden;">
            <p class="Wp-Body-P"><span class="Body-C-C0">Frequently Asked Questions</span></p>
        </div>
        <img src="http://www.zooqie.com/wpimages/wp7e4cb21c_06.png" border="0" width="793" height="1" id="pcrv_19" alt="" onload="OnLoadPngFix()" style="position:absolute;left:17px;top:69px;">
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
                            If a customer wishes to return or swap an item, they will get in contact directly with you and will liase with you about the matter. Zookie does not take any part in returns.
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
    <script type="text/javascript" src="http://www.zooqie.com/wpscripts/jsMenu.js"></script>
    <script type="text/javascript">
        wpmenustack.setRollovers([['panel_8','add_edit_products_panel',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_8','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_8','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_8','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_8','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_8','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','sotre_images_panel',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_7','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_7','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','brand_info_panel',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_6','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_6','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','sizing_guides_panel',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_9','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_9','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','Shipping',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_10','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_10','FAQs',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','FAQs',{"m_ispanel":true,"m_event":2,"m_fade":false}],['panel_11','add_edit_products_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','brand_info_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','Shipping',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','sizing_guides_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}],['panel_11','sotre_images_panel',{"m_ispanel":true,"m_event":5,"m_fade":false}]]);
    </script>
    <!--Master Page End-->
    <div id="nav-bar"></div>
    </div>
    <script type="text/javascript" src="http://www.zooqie.com/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="http://www.zooqie.com/js/totop.min.js"></script>
    <script type="text/javascript" src="http://www.zooqie.com/js/custom.js"></script>
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
    </body>
    </html>


<?}?>