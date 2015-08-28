<?php

$folderString = createFolderString($folderLevel);

$pageHeight = 0;

$pageHeightVal0 = is_numeric($pageHeight) ? $pageHeight : '<!--PAGEHEIGHT-->';
$pageHeightVal1 = is_numeric($pageHeight) ? $pageHeight  + 228 : '<!--PAGEHEIGHTVAL1-->';
$pageHeightVal2 = is_numeric($pageHeight) ? $pageHeight  + 14 : '<!--PAGEHEIGHTVAL2-->';
$pageHeightVal3 = is_numeric($pageHeight) ? $pageHeight  + 50 : '<!--PAGEHEIGHTVAL3-->';
$pageHeightVal4 = is_numeric($pageHeight) ? $pageHeight  + 162 : '<!--PAGEHEIGHTVAL4-->';
$pageHeightVal5 = is_numeric($pageHeight) ? $pageHeight  + 183 : '<!--PAGEHEIGHTVAL5-->';
$pageHeightVal6 = is_numeric($pageHeight) ? $pageHeight  + 115 : '<!--PAGEHEIGHTVAL6-->';


echo '
            <script type="text/javascript" src="'.$folderString.'js/jquery.easing.1.3.js"></script>
            <script type="text/javascript" src="'.$folderString.'js/totop.min.js"></script>
            <script type="text/javascript" src="'.$folderString.'js/custom.js"></script>
            <div style="
                background: #1f1f1f;
                width: 100%;
                height: 228;
                position: absolute;
                bottom: 0;
                z-index:2;
            ">

                <style>
                    .footerHeading
                    {
                        font-family:"Harabara", serif; color:#eeeeee; font-size:19px; line-height:1.47em;
                    }
                    .footerText
                    {
                        font-family:"Lato", sans-serif; color:#eeeeee; font-size:14px; line-height:1.29em;
                    }

                    a.footerLink:link {color:#eeeeee;}
                    a.footerLink:visited {color:#eeeeee;}
                    a.footerLink:hover {color:#e52b50;}
                    a.footerLink:active {color:#eeeeee;}
                </style>
                <div style="position:relative; width:1000px; margin:auto; bottom: 0; height: 228px; z-index:3;">
                    <div style="position:absolute;left:760px;top:'.$pageHeightVal2.'px;width:220px;height:40px;overflow:hidden; " >

                    <h2 style="margin-top:0px"><span class="footerHeading">Follow Us</span></h2>
                    </div>
                    <div style="position:absolute;left:520px;top:'.$pageHeightVal3.'px;width:220px;height:85px;" >
                        <p><span class="footerText"><a class="footerLink" href="'.$folderString.'contact.php" style="text-decoration:none;">Contact Us</a></span></p>
                        <p><span class="footerText"><a class="footerLink" href="'.$folderString.'returns.php" style="text-decoration:none;">Returns and Disputes</a></span></p>
                        <p><span class="footerText"><a class="footerLink" href="'.$folderString.'login.php" style="text-decoration:none;">Brand Login</a> <span class="footerText">/</span> <a class="footerLink" href="'.$folderString.'logout.php" style="text-decoration:none;">Logout</a></span></p>
                        <p><span class="footerText"><br></span></p>
                    </div>
                    <div style="position:absolute;left:520px;top:'.$pageHeightVal2.'px;width:220px;height:40px;overflow:hidden; " >
                        <h2 style="margin-top:0px">
                            <span class="footerHeading">Customer Services</span>
                        </h2>
                    </div>
                    <img src="'.$folderString.'images/line.png" border="0" width="960" height="1" alt=""  style="position:absolute;left:20px;top:'.$pageHeightVal4.'px; " >

                    <style>
                        .footer-social {
                            padding: 0px;
                            display: table;
                            float: right;
                            margin: 16px 0;

                        }

                        .footer-social li {
                            float: left;
                            list-style: none;
                            margin-right: 10px;
                        }

                        .footer-social li a {
                            width: 40px;
                            height: 40px;
                            border: solid 2px #eee;
                            display: table;
                            line-height: 36px;
                            text-align: center;
                            color: #eee;
                            font-size: 18px;
                            -webkit-transition: all .3s ease-in-out;
                            -moz-transition: all .3s ease-in-out;
                            -o-transition: all .3s ease-in-out;
                            transition: all .3s ease-in-out;
                            text-decoration: none;
                        }

                        .footer-social li a.fa-facebook:hover {
                            background: #3b5a9a;
                            border-color: #3b5a9a;
                            color: #fff;
                        }

                        .footer-social li a.fa-twitter:hover {
                            background: #67b5d3;
                            border-color: #67b5d3;
                            color: #fff;
                        }

                        .footer-social li a.fa-instagram:hover {
                            background: #957d60;
                            border-color: #957d60;
                            color: #fff;
                        }
                    </style>
                    <ul class="footer-social" style="position:absolute;left:760px;top:'.$pageHeightVal3.'px; ">
                        <li><a href="https://www.facebook.com/Zooqie" target="_blank" class="fa fa-facebook"></a></li>
                        <li><a href="https://twitter.com/zooqie_uk" target="_blank" class="fa fa-twitter"></a></li>
                        <li><a href="https://instagram.com/zooqieuk/" target="_blank" class="fa fa-instagram"></a></li>
                    </ul>

                    <div style="position:absolute;left:20px;top:'.$pageHeightVal3.'px;width:220px;height:85px;" >
                        <p><span class="footerText"><a class="footerLink" href="'.$folderString.'about.php" style="text-decoration:none;">About Us</a></span></p>
                        <p><span class="footerText"><a class="footerLink" href="'.$folderString.'newbrands.php" style="text-decoration:none;">New Brands</a></span></p>
                        <p><span class="footerText"><a class="footerLink" href="'.$folderString.'faqs.php" style="text-decoration:none;">Frequently Asked Questions</a></span></p>
                    </div>
                    <div style="position:absolute;left:20px;top:'.$pageHeightVal2.'px;width:220px;height:40px;" >
                        <h2 style="margin-top:0px"><span class="footerHeading">Information</span></h2>
                    </div>
                    <img src="'.$folderString.'images/american_express.png" border="0" width="45" height="45" id="pic_60" alt=""  style="position:absolute;left:141px;top:'.$pageHeightVal5.'px; " >
                    <img src="'.$folderString.'images/delta.png" border="0" width="45" height="45" id="pic_61" alt=""  style="position:absolute;left:81px;top:'.$pageHeightVal5.'px; " >
                    <img src="'.$folderString.'images/mastercard.png" border="0" width="45" height="45" id="pic_62" alt=""  style="position:absolute;left:202px;top:'.$pageHeightVal5.'px; " >
                    <img src="'.$folderString.'images/visa.png" border="0" width="45" height="45" id="pic_64" alt=""  style="position:absolute;left:262px;top:'.$pageHeightVal5.'px; " >
                    <img src="'.$folderString.'images/paypal.png" border="0" width="45" height="45" id="pic_63" alt=""  style="position:absolute;left:20px;top:'.$pageHeightVal5.'px; " >

                    <div style="position:absolute;left:269px;top:'.$pageHeightVal3.'px;width:220px;height:85px;" >
                        <p><span class="footerText"><a class="footerLink" href="'.$folderString.'privacy.php" style="text-decoration:none;">Privacy Policy &amp; Cookies</a></span></p>
                        <p><span class="footerText"><a class="footerLink" href="'.$folderString.'terms.php" style="text-decoration:none;">Terms and Conditions</a></span></p>
                    </div>
                    <div style="position:absolute;left:269px;top:'.$pageHeightVal2.'px;width:220px;height:40px;" >
                        <h2 style="margin-top:0px"><span class="footerHeading">Policies</span></h2>
                    </div>
                </div>


            </div>

        ';

?>