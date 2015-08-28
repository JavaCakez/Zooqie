<?

$folderString = createFolderString($folderLevel);
if (isDev()) {
    $url = 'http://www.zooqie.com/development/';
} else {
    $url = 'http://www.zooqie.com/';
}
//NOTE: AJAX SEARCH SUGGESTION CURRENTLY DISABLED
echo '
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, "script", "facebook-jssdk"));</script>

                <div class="header-background">
                    <div class="header-content">
                        <a href="'.$folderString.'index.php">
                            <img class="header-logo" src="'.$folderString.'images/zooqie_white.png" onmouseover="this.src=\''.$folderString.'images/zooqie_red.png\';" onmouseout="this.src=\''.$folderString.'images/zooqie_white.png\';"  alt="Home">
                        </a>

                        <script type="text/javascript">
                            $(function(){
                                $("#searchid DISABLE").keyup(function()
                                {
                                    var searchid = $(this).val();
                                    var dataString = "search="+ searchid;
                                    if(searchid!="")
                                    {
                                        $.ajax({
                                            type: "POST",
                                            url: "'.$folderString.'search.php",
                                            data: dataString,
                                            cache: false,
                                            success: function(html)
                                            {
                                                $("#result").html(html).show();
                                            }
                                        });
                                    }return false;
                                });

                            jQuery(document).live("click", function(e) {
                                var $clicked = $(e.target);
                                if (! $clicked.hasClass("search")){
                                    jQuery("#result").fadeOut();
                                }
                            });
                            $("#searchid").click(function(){
                                jQuery("#result").fadeIn();
                            });
                        });
                        </script>

                        <div class="header-search">
                            <form action="'.$url.'search-results/" method="post">
                                <input type="text" name="search" class="header-search-input" id="searchid" placeholder="Search brands or products" autocomplete="off" style="width:185px; height:15px; padding-right:30px; "/>
                                <input type="hidden" name="headerSearch" value="true">

                                <button type="submit" class="header-search-button">
                                    <i class="fa fa-search" style="font-size:12px"></i>
                                </button>
                            </form>

                            <div id="result" style="margin-top: 6px;"></div>
                        </div>

                        <div class="header-navigationMenu">
                            <nav class="header-navigationMenu-nav">
                                <ul>
                                    <li><a href="'.$folderString.'index.php">Home</a></li>
                                    <li class="dropdown_mmenu">
                                        <a class="parent" href="'.$folderString.'men/index.php">Men</a>
                                        <div class="megamenu">
                                            <div class="megamenu1">
                                                <span>
                                                    <em>Categories</em>
                                                    <a href="'.$folderString.'men/all.php">All Men\'s</a>
                                                    <a href="'.$folderString.'men/all.php?na=on">New Arrivals</a>
                                                    <a href="'.$folderString.'men/all.php?mp=on">Most Popular</a>
                                                </span>

                                                <span>
                                                    <em>By Product</em>
                                                    <a href="'.$folderString.'men/accessories.php">Accessories</a>
                                                    <a href="'.$folderString.'men/bags.php">Bags</a>
                                                    <a href="'.$folderString.'men/caps.php">Caps</a>
                                                    <a href="'.$folderString.'men/coats.php">Jackets</a>
                                                    <a href="'.$folderString.'men/hats.php">Hats</a>
                                                </span>

                                                <span>
                                                    <a style="margin-top: 46px;" href="'.$folderString.'men/jumpers.php">Jumpers</a>
                                                    <a href="'.$folderString.'men/onesies.php">Onesies</a>
                                                    <a href="'.$folderString.'men/shirts.php">Shirts</a>
                                                    <a href="'.$folderString.'men/shorts.php">Shorts</a>
                                                    <a href="'.$folderString.'men/swimwear.php">Swimwear</a>
                                                </span>

                                                <span>
                                                    <a style="margin-top: 46px;" href="'.$folderString.'men/tees.php">Tees</a>
                                                    <a href="'.$folderString.'men/vests.php">Vests</a>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown_mmenu">
                                        <a class="parent" href="'.$folderString.'women/index.php">Women</a>
                                        <div class="megamenu">
                                            <div class="megamenu1">
                                                <span>
                                                    <em>Categories</em>
                                                    <a href="'.$folderString.'women/all.php">All Women\'s</a>
                                                    <a href="'.$folderString.'women/all.php?na=on">New Arrivals</a>
                                                    <a href="'.$folderString.'women/all.php?mp=on">Most Popular</a>
                                                </span>

                                                <span>
                                                    <em>By Product</em>
                                                    <a href="'.$folderString.'women/accessories.php">Accessories</a>
                                                    <a href="'.$folderString.'women/bags.php">Bags</a>
                                                    <a href="'.$folderString.'women/caps.php">Caps</a>
                                                    <a href="'.$folderString.'women/coats.php">Coats</a>
                                                    <a href="'.$folderString.'women/dresses.php">Dresses</a>
                                                </span>

                                                <span>
                                                    <a style="margin-top: 46px;" href="'.$folderString.'women/tops.php">Girls Tops</a>
                                                    <a href="'.$folderString.'women/hats.php">Hats</a>
                                                    <a href="'.$folderString.'women/jumpers.php">Jumpers</a>
                                                    <a href="'.$folderString.'women/jewellery.php">Jewellery</a>
                                                    <a href="'.$folderString.'women/onesies.php">Onesies</a>
                                                </span>

                                                <span>
                                                    <a style="margin-top: 46px;" href="'.$folderString.'women/shorts.php">Shorts</a>
                                                    <a href="'.$folderString.'women/skirts.php">Skirts</a>
                                                    <a href="'.$folderString.'women/tees.php">Tees</a>
                                                    <a href="'.$folderString.'women/vests.php">Vests</a>
                                                </span>
                                            </div>
                                        </div>
                                    </li>';

echo '
                                    <li class="dropdown_mmenu">
                                        <a class="parent" href="'.$folderString.'brands">Brands</a>
                                        <div class="megamenu">
                                            <div class="megamenu1">
                                                <span>
                                                    <em>Work With Us</em>
                                                    <a href="'.$folderString.'newbrands.php">Joining Zooqie</a>
                                                    <a href="'.$folderString.'contact.php">Contact Us</a>
                                                </span>

                                                <span style="width: 75%;">
                                                    <em>Featured Brands</em>
                                                </span>
                                                <span style="width: 75%">
                                            ';

// Create connection
if(file_exists("db_settings.php")) {include("db_settings.php");}
if(file_exists("../db_settings.php")) {include("../db_settings.php");}
if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
if(file_exists("db_settings.php")) {include("db_settings.php");}

$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

//Brand query
$sql_res=mysqli_query($con, "select * from brands where Live = '1' AND (Brand_name = 'HazelleDoll' || Brand_name = 'Thunder Apparel')");

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
    echo '
                                                <div style="display:inline-block;width:49%;text-align:center;">
                                                    <a href="'.$foldername.'">
                                                        <img src="'.$img.'" class="img-responsive" width=172 height=104 alt="'.$username.'" style="border: solid 1px;">
                                                        <p>'.$username.'</p>
                                                    </a>
                                                </div>
                                        ';
}

echo '
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="'.$folderString.'blog/">Blog</a></li>
                                <li><a href="'.$folderString.'about.php">About</a></li>
                                <li><a href="'.$folderString.'contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        ';
?>