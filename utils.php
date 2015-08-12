<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 05/05/14
 * Time: 11:24
 */

    function curPageName()
    {
        return strtoupper(preg_replace('/\..*$/','',substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)));
    }

    function curFolderName()
    {
        $folders = explode('/', getcwd());
        return trim(end($folders));
    }

    function createFolderString($folderLevel) {
        $folderString = '';
        for($j = 0; $j < $folderLevel; $j++)
        {
            $folderString .= '../';
        }
        return $folderString;
    }

    function getBrandIDFromSessionUsername($username) {
        // Create connection
        if(file_exists("db_settings.php")) {include("db_settings.php");}
        if(file_exists("../db_settings.php")) {include("../db_settings.php");}
        if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
        if(file_exists("db_settings.php")) {include("db_settings.php");}
        $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

        //Get username session variable, can be the brand ID, username or brandname
        $userID = $username;

        //Check if the session variable is the ID, if it is we're good to go
        $result = mysqli_query($con,"SELECT COUNT(*) FROM brands WHERE ID = '$userID'");
        $count = mysqli_fetch_array($result);
        $count = $count[0];
        if( $count != 1 ) {
            //Check if the session variable is the username, if so get corresponding ID
            $result = mysqli_query($con,"SELECT COUNT(*) FROM brands WHERE username = '$userID'");
            $count = mysqli_fetch_array($result);
            $count = $count[0];
            if( $count == 1 ) {
                $result = mysqli_query($con,"SELECT * FROM brands WHERE username = '$userID'");
                $row = mysqli_fetch_array($result);
                $userID = $row['ID'];
            } else {
                //Check if the session variable is the Brand_name, if so get corresponding ID
                $result = mysqli_query($con,"SELECT COUNT(*) FROM brands WHERE Brand_name = '$userID'");
                $count = mysqli_fetch_array($result);
                $count = $count[0];
                if( $count == 1 ) {
                    $result = mysqli_query($con,"SELECT * FROM brands WHERE Brand_name = '$userID'");
                    $row = mysqli_fetch_array($result);
                    $userID = $row['ID'];
                }
            }
        }

        return $userID;
    }

    function echoSortByComboBox($type, $sort) {
        if($type == 1) {
            echo '
                <select onChange="submit();" name="Sort" size="1" style="position:absolute; left:297px; top:342px; " >
                    <option value="Brandasc" '; if($sort == 'Brandasc'){echo 'selected';} echo '>Brand A-Z</option>
                    <option value="Branddesc" '; if($sort == 'Branddesc'){echo 'selected';} echo '>Brand Z-A</option>
                    <option value="Asc" '; if($sort == 'Asc'){echo 'selected';} echo '>Item name A-Z</option>
                    <option value="desc" '; if($sort == 'desc'){echo 'selected';} echo '>Item name Z-A</option>
                    <option value="Price asc" '; if($sort == 'Price asc'){echo 'selected';} echo '>Price:&nbsp;Low&nbsp;to&nbsp;High</option>
                    <option value="Price desc" '; if($sort == 'Price desc'){echo 'selected';} echo '>Price:&nbsp;High&nbsp;to&nbsp;Low</option>
                    <option value="Newest" '; if($sort == 'Newest'){echo 'selected';} echo '>Newest</option>
                    <option value="Popularity" '; if($sort == 'Popularity'){echo 'selected';} echo '>Popularity</option>
                </select>
            ';
        } elseif($type == 2) {
            echo '
                <select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:297px; top:342px; " >
                    <option value="Asc" '; if($sort == 'Asc'){echo 'selected';} echo '>Item name A-Z</option>
                    <option value="desc" '; if($sort == 'desc'){echo 'selected';} echo '>Item name Z-A</option>
                    <option value="Price asc" '; if($sort == 'Price asc'){echo 'selected';} echo '>Price:&nbsp;Low&nbsp;to&nbsp;High</option>
                    <option value="Price desc" '; if($sort == 'Price desc'){echo 'selected';} echo '>Price:&nbsp;High&nbsp;to&nbsp;Low</option>
                    <option value="Newest" '; if($sort == 'Newest'){echo 'selected';} echo '>Newest</option>
                    <option value="Popularity" '; if($sort == 'Popularity'){echo 'selected';} echo '>Popularity</option>
                </select>
            ';
        } elseif($type == 3) {
            echo '
                <select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:297px; top:142px; " >
                    <option value="Asc" '; if($sort == 'Asc'){echo 'selected';} echo '>A-Z</option>
                    <option value="desc" '; if($sort == 'desc'){echo 'selected';} echo '>Z-A</option>
                    <option value="Newest" '; if($sort == 'Newest'){echo 'selected';} echo '>Newest</option>
                </select>
            ';
        } elseif($type == 4) {
            echo '
                <select onChange="submit();" id="combo_28" name="Sort" size="1" style="position:absolute; left:290px; top:0px; " >
                    <option value="Default" '; if($sort == 'Default'){echo 'selected';} echo '>Default</option>
                    <option value="Asc" '; if($sort == 'Asc'){echo 'selected';} echo '>Item name A-Z</option>
                    <option value="desc" '; if($sort == 'desc'){echo 'selected';} echo '>Item name Z-A</option>
                    <option value="Price asc" '; if($sort == 'Price asc'){echo 'selected';} echo '>Price:&nbsp;Low&nbsp;to&nbsp;High</option>
                    <option value="Price desc" '; if($sort == 'Price desc'){echo 'selected';} echo '>Price:&nbsp;High&nbsp;to&nbsp;Low</option>
                    <option value="Newest" '; if($sort == 'Newest'){echo 'selected';} echo '>Newest</option>
                    <option value="Popularity" '; if($sort == 'Popularity'){echo 'selected';} echo '>Popularity</option>
                </select>
            ';
        }
    }

    function echoCookieFunctions() {
        echo '
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
        ';
    }

    //Echoes all jquery/javascript for a collapsible sliding div
    function echoSlidingDiv($number) {
        echo '
            if(getC("divState' . $number . '") == "hidden")
            {
                $(".slidingDiv' . $number . '").hide();
                document.getElementById("arrow' . $number . '").src  = "http://www.zooqie.com/images/rightarrow.png";
            }
            else
            {
                $(".slidingDiv' . $number . '").show();
                document.getElementById("arrow' . $number . '").src  = "http://www.zooqie.com/images/downarrow.png";
            }

            $(".show_hide' . $number . '").click(function(event)
            {
                event.preventDefault();
                $(".slidingDiv' . $number . '").slideToggle();

                var img = document.getElementById("arrow' . $number . '").src;
                if (img.indexOf("downarrow.png")!=-1)
                {
                    document.getElementById("arrow' . $number . '").src  = "http://www.zooqie.com/images/rightarrow.png";
                    setC("divState' . $number . '","hidden",1);
                }
                else
                {
                    document.getElementById("arrow' . $number . '").src = "http://www.zooqie.com/images/downarrow.png";
                    setC("divState' . $number . '","visible",1);
                }
            });
        ';
    }

    function echoRefineByHeader($slidingDivNumber, $text) {
        echo '
			<div id="js-slidingHeader-'.$slidingDivNumber.'" style="border-bottom: 1px solid #000000;overflow:hidden; " >
				<a href="#" class="show_hide'.$slidingDivNumber.'" style="text-decoration: none">
					<p>
						<img id="arrow'.$slidingDivNumber.'" src="../images/downarrow.png" width="24" height="24" style="float:left;"/>
						<h1 class="Heading-1-P" style="margin-top:0px;float:left;">
							<span class="Heading-1-C-C0">
								'.$text.'
							</span>
						</h1>
					</p>
				</a>
			</div>
		';
    }

    function echoRefineByCheckboxes($slidingDivNumber, $refineAttributes, $limit) {
        echo '
			<div id="js-slidingDiv-'.$slidingDivNumber.'" class="slidingDiv'.$slidingDivNumber.'" '; if(count($refineAttributes) > 8 && $limit == 'true') echo 'style="height:270px;overflow-y: scroll;'; echo '">
		';

        foreach ($refineAttributes as $refineAttribute)
        {
            $strreplace = removeSpaces($refineAttribute);
            $strreplace2 = $strreplace;
            if (strtolower($strreplace) == 'female') $strreplace2 = 'f';
            if (strtolower($strreplace) == 'male') $strreplace2 = 'm';
            if (strtolower($strreplace) == 'unisex') $strreplace2 = 'u';
            echo '
                    <p id="js2-' . strtolower($strreplace2) . '" class="Heading-1-C-C12">
                        <input id="js-' . strtolower($strreplace2) . '" type="checkbox" name="' . $refineAttribute . '" style="float:left;margin-bottom:8px;cursor:pointer;" onClick="submit();"'; if($_POST[$strreplace] == 'on') echo 'checked'; echo '>
                        ' . $refineAttribute . '
                        <br/>
                    </p>';
        }

        echo '</div>';
    }

    function constructGenderSqlString() {
        $str = '';
        if($_POST['Male'] == 'on' && $_POST['Female'] != 'on')
        {
            $str .= " AND (Gender ='M' OR Gender ='U')";
        }
        else if ($_POST['Male'] != 'on' && $_POST['Female'] == 'on')
        {
            $str .= " AND (Gender ='F' OR Gender ='U')";
        }
        return $str;
    }

    function constructGenericSqlString($counter, $strings, $columnName) {
        $str = '';
        $and = 'false';
        for ($j = 0; $j < $counter; $j++)
        {
            $strreplace = removeSpaces($strings[$j]);
            if($_POST[$strreplace] == 'on')
            {
                if($and == 'false')
                {
                    $str .= " AND (".$columnName." ='" . strtoupper($strings[$j]) . "'";
                    $and = 'true';
                }
                else
                {
                    $str .= " OR ".$columnName." ='" . strtoupper($strings[$j]) . "'";
                }
            }
        }
        if($and == 'true')
        {
            $str .= ")";
        }

        return $str;
    }

    function constructPriceSqlString() {
        $str = '';
        if($_POST['LowerBoundPrice'] != '' && $_POST['UpperBoundPrice'] != '')
        {
            $str .= " AND (Price <= " . $_POST['UpperBoundPrice'] . ") AND (Price >= " . $_POST['LowerBoundPrice'] . ")";
        }
        return $str;
    }

    function disableCheckboxes($column, $sqlStr, $con, $slidingDivNo) {
        echo '
                <script type="text/javascript">
                    $(document).ready(function() {

            ';

        $cresult = mysqli_query($con,"SELECT DISTINCT ".$column." FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = 1)");
        while($crow = mysqli_fetch_array($cresult))
        {
            echo '
                        $("#js-'.str_replace('&', '\\\&', strtolower(removeSpaces($crow[$column]))).'").attr("disabled", true);
                        $("#js-'.str_replace('&', '\\\&', strtolower(removeSpaces($crow[$column]))).'").css("cursor", "default");
                        $("#js2-'.str_replace('&', '\\\&', strtolower(removeSpaces($crow[$column]))).'").css("opacity", "0.5");
                ';
        }

        $cresult = mysqli_query($con,"SELECT DISTINCT ".$column." FROM products WHERE Brand IN (SELECT ID FROM brands Where Live = 1)". $sqlStr);
        /* Attempted improvement to hide refine box if none are available
        if (mysqli_num_rows($cresult) < 1) {
            echo '
                        $("#js-slidingHeader-'.$slidingDivNo.'").css("display", "none");
                        $("#js-slidingDiv-'.$slidingDivNo.'").css("display", "none");
                ';
        } else {

        }*/
        while($crow = mysqli_fetch_array($cresult))
        {
            echo '
                        $("#js-'.str_replace('&', '\\\&', strtolower(removeSpaces($crow[$column]))).'").attr("disabled", false);
                        $("#js-'.str_replace('&', '\\\&', strtolower(removeSpaces($crow[$column]))).'").css("cursor", "pointer");
                        $("#js2-'.str_replace('&', '\\\&', strtolower(removeSpaces($crow[$column]))).'").css("opacity", "1.0");
                ';
        }

        echo '
                    });
                </script>
            ';
    }

    function echoRefineByPrice($slidingDivNumber) {
        echo '
                <div class="slidingDiv'.$slidingDivNumber.'">
                    <div>
                        <h1 class="Wp-Heading-1-P""><span id="amount" class="Heading-1-C-C1"></span></h1>
                    </div>

                    <input type="hidden" name="LowerBoundPrice" id="amount1" value=""/>
                    <input type="hidden" name="UpperBoundPrice" id="amount2" value=""/>

                    <div id="slider-range" style="margin: 0 10px 0 10px;"></div>
                    <br/>
                </div>
            ';
    }

    function echoRefineByPriceScript($topPrice) {
        echo '
                <script>
                    $(function() {
                        $( "#slider-range" ).slider(
                            {
                                range: true,
                                min: 0,
                                max: '.$topPrice.',';

                                if($_POST["LowerBoundPrice"] == "" && $_POST["UpperBoundPrice"] == "")
                                {
                                  echo "values: [ 0, " . $topPrice . " ],";
                                }
                                else
                                {
                                  echo "values: [ " . $_POST["LowerBoundPrice"] . ", " . $_POST["UpperBoundPrice"] . " ],";
                                }

                        echo '
                                stop: function( event, ui )
                                {
                                    document.getElementById("refineForm").submit();
                                },

                                slide: function( event, ui )
                                {
                                    $( "#amount" ).html( "&pound;" + ui.values[ 0 ] + " - " + "&pound;" + ui.values[ 1 ] );

                                    $( "#amount1" ).val(ui.values[ 0 ]);
                                    $( "#amount2" ).val(ui.values[ 1 ]);
                                }
                            });

                        $( "#amount" ).html( "&pound;" + $( "#slider-range" ).slider( "values", 0 ) +
                            " - " + "&pound;" + $( "#slider-range" ).slider( "values", 1 ) );

                        $( "#amount1" ).val($( "#slider-range" ).slider( "values", 0 ));
                        $( "#amount2" ).val($( "#slider-range" ).slider( "values", 1 ));
                    });
                </script>
        ';
    }

    function removeSpaces($str) {
        if (is_array($str)) {
            foreach ($str as &$s) {
                $s = str_replace(' ', '_', $s);
            }
            return $str;
        }
        $str = str_replace(' ', '_', $str);
        return $str;
    }

    function getUniqueColumnValues($sql, $column) {
        // Create connection
        if(file_exists("db_settings.php")) {include("db_settings.php");}
        else if(file_exists("../db_settings.php")) {include("../db_settings.php");}
        else if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
        else if(file_exists("db_settings.php")) {include("db_settings.php");}
        $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

        // Check connection
        if (mysqli_connect_errno($con))
        {
        }
        else
        {
            $result = mysqli_query($con,$sql);
            $counter = 0;
            $values = array();

            while($row = mysqli_fetch_array($result))
            {
                //Check if next column value is unique
                $unqiue = 'true';
                for ($j = 0; $j < $counter; $j++)
                {
                    if(ucwords(strtolower($values[$j])) == ucwords(strtolower($row[$column]))) $unqiue = 'false';
                }

                //If it is, add it to the list
                if($unqiue == 'true')
                {
                    $values[$counter] = ucwords(strtolower($row[$column]));
                    $counter++;
                }
            }
            usort($values, 'strnatcasecmp');
        }

        return $values;
    }

    function echoFacebookScript() {
        echo '
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, "script", "facebook-jssdk"));</script>


            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        ';
        /*TODO: font awesome shouldn't be here */
    }

    function echoHeader($folderLevel, $pageWidth, $pageHeight) {
        $folderString = createFolderString($folderLevel);
        if (isDev()) {
            $url = 'http://www.zooqie.com/development/';
        } else {
            $url = 'http://www.zooqie.com/';
        }
        echo '
            <div style="background-color:#ffffff;margin-left:auto;margin-right:auto;position:relative;width:'.$pageWidth.'px;height:'.$pageHeight.'px;">
                <div id="nav-panel" class="wpfixed" style="left:50%;margin-left:-500px;top:0px;width:1000px;height:80px; z-index: 199; margin-top:5px;">

                <script type="text/javascript">
                    $(function(){
                        $(".search").keyup(function()
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

                <div class="content" style="position: absolute; top:30px; left:170px; width:540px; height:22px;margin: 0; padding: 0; background:#ffffff">
                    <form id="searchForm" action="'.$url.'search-results/" method="post">
                        <input type="text" name="search" class="search" id="searchid" placeholder="Search brands or products" autocomplete="off" style="width:250px; height:15px; "/>
                        <input type="hidden" name="headerSearch" value="true">

                        <style>
                            .searchFormButton {
                                margin-left:-30px;
                                background-color:#fff;
                                border:none;
                            }
                            .searchFormButton:focus {
                                outline: none;
                            }
                            .searchFormButton:hover {
                                cursor: pointer;
                            }
                            .searchFormButton:hover .fa {
                                color: #cf4647;
                            }

                        </style>
                        <button type="submit" class="searchFormButton">
                            <i class="fa fa-search" style="font-size:12px"></i>
                        </button>
                    </form>

                    <div id="result" style="margin-top: 6px;"></div>
                </div>

                <div style="position:absolute;left:450px;top:0px;width:550px;height:80px;">
<link href="http://fonts.googleapis.com/css?family=Cousine" rel="stylesheet" type="text/css">
<style>
.home4 .nav-menu {
	margin-right: -15px !important;
}

nav ul {
	padding: 0px;
	margin: 0px;
	display: table;
	float: right;
	padding-top: 38px;
}

nav ul li {
	float: left;
	margin: 0;
	text-transform: uppercase;
	list-style: none;
	font-size: 15px;
	font-weight: bold;
}

nav ul li a {
	color: #565656;
	font-family: Cousine;
	text-decoration: none;
	font-weight: bold;
	padding: 15px 16px 35px;
	position: relative;
	z-index: 999;
}

.home2 nav ul li a {
	padding: 30px 0 30px;
}

nav ul li a:hover {
	color: #cf4647;
}

.megamenu {
	position: absolute;
	width: 1140px;
	top: 75px;
	right: 0px;
	left: 0px;
	background: #fff;
	margin: 0 auto;
	padding: 10px 10px 0px 50px;
	opacity: 0;
	visibility: hidden;
	-webkit-transition: top 0.3s ease-in-out;
	-moz-transition: top 0.3s ease-in-out;
	-o-transition: top 0.3s ease-in-out;
	transition: top 0.3s ease-in-out;
	border: 1px solid #bbbbbb;
}

.megamenu1 span {
	width: 25%;
	float: left;
}

.megamenu1 span a {
	width: 100%;
	text-transform: none;
	color: #555555;
	font-family: Arial;
	margin-bottom: 13px;
	font-weight: normal;
	font-size: 14px;
	display: table;
	padding: 0px !important;
}

.megamenu1 em {
	font-size: 15px;
	font-style: normal;
	font-weight: 700;
	line-height: 1.1;
	font-family: Cousine;
	color: #666666;
	margin: 10px 0 20px;
	display: table;
}

.megamenu1 {
	display: table;
	width: 100%;
}

.megamenu1 span:nth-child(5) img {
	display: table;
	float: right;
	margin: 12px 0 0;
}

.megamenu2 {
	display: table;
	width: 100%;
	margin: 40px 0 5px;
}

.megamenu2 span {
	width: 31%;
	margin-right: 3.5%;
	float: left;
}

.megamenu2 span:nth-child(3) {
	margin-right: 0%;
}

.dropdown_menu {
	position: relative;
}

.d_menu {
	width: 220px;
	display: table;
	background: #fff;
	position: absolute;
	top: 0px;
	left: 0px;
	right: 0px;
	opacity: 0;
	visibility: hidden;
	border-top: 1px solid #bbb;
}

.d_menu span a {
	font-family: Arial;
	color: #555;
	font-size: 13px;
	padding: 10px 25px !important;
	border-bottom: 1px solid #e5e5e5;
	float: none;
	font-weight: normal;
	text-transform: none;
	width: 100%;
	display: table;
}

.megamenu1 span a:hover,
.d_menu span a:hover {
	color: #cf4647;
}

.dropdown_mmenu:hover .parent {
    color: #cf4647;
}

.dropdown_mmenu:hover .megamenu {
	position: absolute;
	margin-left: -11px;
	top: 75px;
	width: 499px;
	height: 200px;
	opacity: 1;
	visibility: visible;
	-webkit-transition: top 0.3s ease-in-out;
	-moz-transition: top 0.3s ease-in-out;
	-o-transition: top 0.3s ease-in-out;
	transition: top 0.3s ease-in-out;
}

.dropdown_menu:hover .d_menu {
	position: absolute;
	top: 36px;
	margin-top: 16px;
	opacity: 1;
	visibility: visible;
	-webkit-transition: top 0.3s ease-in-out;
	-moz-transition: top 0.3s ease-in-out;
	-o-transition: top 0.3s ease-in-out;
	transition: top 0.3s ease-in-out;
}
</style>
<nav class="no320">
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
                <a href="'.$folderString.'index.php"><img src="'.$folderString.'images/zooqie.png" border="0" width="150" id="pic_255" title="" alt="Home" style="position:absolute;top:27px;"></a>
            </div>
        ';
    }

    function isDev() {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($url,'development') !== false) {
            return true;
        }
        return false;
    }

    function echoFooter($folderLevel, $pageHeight) {
        $folderString = createFolderString($folderLevel);

        $pageHeightVal0 = is_numeric($pageHeight) ? $pageHeight : '<!--PAGEHEIGHT-->';
        $pageHeightVal1 = is_numeric($pageHeight) ? $pageHeight  + 222 : '<!--PAGEHEIGHTVAL1-->';
        $pageHeightVal2 = is_numeric($pageHeight) ? $pageHeight  + 14 : '<!--PAGEHEIGHTVAL2-->';
        $pageHeightVal3 = is_numeric($pageHeight) ? $pageHeight  + 65 : '<!--PAGEHEIGHTVAL3-->';
        $pageHeightVal4 = is_numeric($pageHeight) ? $pageHeight  + 162 : '<!--PAGEHEIGHTVAL4-->';
        $pageHeightVal5 = is_numeric($pageHeight) ? $pageHeight  + 183 : '<!--PAGEHEIGHTVAL5-->';
        $pageHeightVal6 = is_numeric($pageHeight) ? $pageHeight  + 115 : '<!--PAGEHEIGHTVAL6-->';


        echo '
            <div id="txt_15" style="position:absolute;left:760px;top:'.$pageHeightVal2.'px;width:220px;height:40px;overflow:hidden; " >

            <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Follow Us</span></h2>
            </div>
            <div id="txt_24" style="position:absolute;left:520px;top:'.$pageHeightVal3.'px;width:220px;height:85px;overflow:hidden; " >
            <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="'.$folderString.'contact.php" style="text-decoration:none;">Contact Us</a></span></p>
            <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="'.$folderString.'returns.php" style="text-decoration:none;">Returns and Disputes</a></span></p>
            <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="'.$folderString.'login.php" style="text-decoration:none;">Brand Login</a> / <a class="hlink_1" href="'.$folderString.'logout.php" style="text-decoration:none;">Logout</a></span></p>
            <p class="Wp-Body-P"><span class="Body-C"><br></span></p>
            </div>
            <div id="txt_27" style="position:absolute;left:520px;top:'.$pageHeightVal2.'px;width:220px;height:40px;overflow:hidden; " >
            <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Customer Services</span></h2>
            </div>
            <img src="'.$folderString.'images/line.png" border="0" width="960" height="1" id="pcrv_3" alt="" onload="OnLoadPngFix()" style="position:absolute;left:20px;top:'.$pageHeightVal0.'px; " >
            <img src="'.$folderString.'images/line.png" border="0" width="960" height="1" id="pcrv_4" alt="" onload="OnLoadPngFix()" style="position:absolute;left:20px;top:'.$pageHeightVal4.'px; " >
            <!-- facebook.png - Emb. Bitmap pic_30 -->
            <map id="map0" name="map0">
                <area shape="poly" coords="23,34,31,29,35,23,35,12,30,4,23,0,12,0,4,5,0,12,0,23,5,31,12,35,23,35" href="https://www.facebook.com/zooqie" target="_blank" alt="" >
            </map>
            <img src="'.$folderString.'images/grey_facebook.png" border="0" width="35" height="35" id="pic_30" alt="" onload="OnLoadPngFix()" usemap="#map0" style="position:absolute;left:760px;top:'.$pageHeightVal3.'px; " >
            <!-- twitter.png - Emb. Bitmap pic_33 -->
            <map id="map1" name="map1">
                <area shape="poly" coords="23,34,31,29,35,23,35,12,30,4,23,0,12,0,4,5,0,12,0,23,5,31,12,35,23,35" href="https://twitter.com/zooqie_uk" target="_blank" alt="" >
            </map>
            <img src="'.$folderString.'images/grey_twitter.png" border="0" width="35" height="35" id="pic_33" alt="" onload="OnLoadPngFix()" usemap="#map1" style="position:absolute;left:814px;top:'.$pageHeightVal3.'px; " >

            <a href="http://instagram.com/zooqieuk" target="_blank"><img src="'.$folderString.'images/instagram.png" border="0" width="40" height="40" id="pic_30" alt="" onload="OnLoadPngFix()"  style="position:absolute;left:868px;top:'.$pageHeightVal3.'px; margin-top: -3px; " ></a>


            <div id="txt_23" style="position:absolute;left:20px;top:'.$pageHeightVal3.'px;width:220px;height:85px;overflow:hidden; " >
            <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="'.$folderString.'about.php" style="text-decoration:none;">About Us</a></span></p>
            <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="'.$folderString.'newbrands.php" style="text-decoration:none;">New Brands</a></span></p>
            <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="'.$folderString.'faqs.php" style="text-decoration:none;">Frequently Asked Questions</a></span></p>
            </div>
            <div id="txt_26" style="position:absolute;left:20px;top:'.$pageHeightVal2.'px;width:220px;height:40px;overflow:hidden; " >
            <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Information</span></h2>
            </div>
            <img src="'.$folderString.'images/american_express.png" border="0" width="45" height="45" id="pic_60" alt="" onload="OnLoadPngFix()" style="position:absolute;left:141px;top:'.$pageHeightVal5.'px; " >
            <img src="'.$folderString.'images/delta.png" border="0" width="45" height="45" id="pic_61" alt="" onload="OnLoadPngFix()" style="position:absolute;left:81px;top:'.$pageHeightVal5.'px; " >
            <img src="'.$folderString.'images/mastercard.png" border="0" width="45" height="45" id="pic_62" alt="" onload="OnLoadPngFix()" style="position:absolute;left:202px;top:'.$pageHeightVal5.'px; " >
            <img src="'.$folderString.'images/visa.png" border="0" width="45" height="45" id="pic_64" alt="" onload="OnLoadPngFix()" style="position:absolute;left:262px;top:'.$pageHeightVal5.'px; " >
            <img src="'.$folderString.'images/paypal.png" border="0" width="45" height="45" id="pic_63" alt="" onload="OnLoadPngFix()" style="position:absolute;left:20px;top:'.$pageHeightVal5.'px; " >
            <div id="txt_163" style="position:absolute;left:760px;top:'.$pageHeightVal6.'px;width:220px;height:35px;overflow:hidden; " >
            <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C-C0">GET SOCIAL</span></h2>
            </div>
            <div id="txt_164" style="position:absolute;left:269px;top:'.$pageHeightVal3.'px;width:220px;height:85px;overflow:hidden; " >
            <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="'.$folderString.'privacy.php" style="text-decoration:none;">Privacy Policy &amp; Cookies</a></span></p>
            <p class="Wp-Body-P"><span class="Body-C"><a class="hlink_1" href="'.$folderString.'terms.php" style="text-decoration:none;">Terms and Conditions</a></span></p>
            </div>
            <div id="txt_166" style="position:absolute;left:269px;top:'.$pageHeightVal2.'px;width:220px;height:40px;overflow:hidden; " >
            <h2 class="Wp-Heading-2-P" style="margin-top:0px"><span class="Heading-2-C">Policies</span></h2>
            </div>
        ';
    }

    function echoSocialMediaFollowButtons() {
        echo '
            <script>(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src="http://instagramfollowbutton.com/components/instagram/v2/js/ig-follow.js";s.parentNode.insertBefore(g,s);}(document,"script"));</script>
            <div style="position:absolute;left:875px;top:90px;height:20px;z-index:2; " >
                <span class="ig-follow" data-id="54a009d105" data-count="false" data-size="small" data-username="true"></span>
            </div>

            <div id="frag_56" style="position:absolute;left:788px;top:90px;width:80px;height:20px;z-index:2; " >
                <div class="fb-like" data-href="https://www.facebook.com/zooqie" data-width="50" data-layout="button_count" data-show-faces="false" data-send="false"></div>
            </div>

            <div id="frag_57" style="position:absolute;left:650px;top:90px;width:127px;height:20px;z-index:2; " >
                <a href="https://twitter.com/zooqie_uk" class="twitter-follow-button" data-show-count="false">Follow @zooqie_uk</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>
            </div>
        ';
    }

    function echoGoogleAnalyticsScript() {
        echo '
            <script>
                (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

                ga(\'create\', \'UA-52539537-1\', \'auto\');
				ga(\'require\', \'displayfeatures\');
                ga(\'send\', \'pageview\');

            </script>
        ';
    }

    /* TODO: this doesn't seem to be used everywhere? */
    function echoNavBar($folderLevel, $names, $links) {
        $folderString = createFolderString($folderLevel);
        echo '
            <img src="'.$folderString.'images/navbar.png" border="0" width="1000" height="40" id="qs_1" title="" alt="Navigation Bar" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:80px;">
            <div class="nav_348style" style="left: 20px; top: 91px;; width: 960px; height: 26px; position: absolute;">

        ';

        $count = count($names);
        for ($i = 0; $i < $count; $i++) {

            echo '
                <a href="'.$links[$i].'" target="_self"> '.$names[$i].' </a>
            ';
            if ($i != ($count - 1)) {echo '&gt;';}
        }

        echo '
            </div>
        ';
    }

    function alert($var) {
        echo "<script type='text/javascript'>alert('{$var}');</script>";
    }

    function echoAddEditProductForm($id, $brandName, $con) {
        echo'
        			<script type="text/javascript">

        function validate_form_29( form )
        {
            if( ltrim(rtrim(form.elements["name"].value," ")," ")=="e.g. Zero Graphic Tee" ) form.elements["name"].value = "";
            if( ltrim(rtrim(form.elements["name"].value," ")," ")=="" ) { alert("Clothing Item Name is required"); form.elements["name"].focus(); return false; }

            if( ltrim(rtrim(form.elements["gender"].value," ")," ")=="" ) { alert("You Must Select a Gender"); form.elements["gender"].focus(); return false; }

            if( ltrim(rtrim(form.elements["category"].value," ")," ")=="" ) { alert("The Category is required"); form.elements["category"].focus(); return false; }

            if( ltrim(rtrim(form.elements["colour"].value," ")," ")=="" ) { alert("You Must Select a Colour"); form.elements["colour"].focus(); return false; }

            if( ltrim(rtrim(form.elements["price"].value," ")," ")=="e.g. 14.99" ) form.elements["price"].value = "";
            if( ltrim(rtrim(form.elements["price"].value," ")," ")=="" ) { alert("The Price is required"); form.elements["price"].focus(); return false; }

            n = parseFloat(ltrim(ltrim(rtrim(form.elements["price"].value," ")," "),"£"));
            if(isNaN(n) || n < 0){ alert("The Price must be a positive number"); form.elements["price"].focus(); return false; }

            if( ltrim(rtrim(form.elements["shipping"].value," ")," ")=="" ) { alert("The Shipping Prices are required. If you have not created any Shipping Price Sets please do so first and try again."); form.elements["shipping"].focus(); return false; }

            if( ltrim(rtrim(form.elements["size1"].value," ")," ")=="e.g. Red Small" ) form.elements["size1"].value = "";
            if( ltrim(rtrim(form.elements["size1"].value," ")," ")=="" ) { alert("You must input at least one Size"); form.elements["size1"].focus(); return false; }

            if( ltrim(rtrim(form.elements["desc"].value," ")," ")=="e.g. \nStripped Chino shorts\nZip and Button closure\n\n100% cotton\nColour: Grey\n\nModel in image wears size: 32R" ) form.elements["desc"].value = "";

            if ($("#js-dropzone1 .tools").length && $("#js-dropzone1 .tools").css("display")!= "none") {
                alert("Please finish editing Image 1. Press green tick to finish editing.");
                return false;
            }

            if ($("#js-dropzone2 .tools").length && $("#js-dropzone2 .tools").css("display")!= "none") {
                alert("Please finish editing Image 2. Press green tick to finish editing.");
                return false;
            }

            if ($("#js-dropzone3 .tools").length && $("#js-dropzone3 .tools").css("display")!= "none") {
                alert("Please finish editing Image 3. Press green tick to finish editing.");
                return false;
            }

            if ($("#js-dropzone4 .tools").length && $("#js-dropzone4 .tools").css("display")!= "none") {
                alert("Please finish editing Image 4. Press green tick to finish editing.");
                return false;
            }

            if ($("#js-dropzone5 .tools").length && $("#js-dropzone5 .tools").css("display")!= "none") {
                alert("Please finish editing Image 5. Press green tick to finish editing.");
                return false;
            }

            if (!$("#js-dropzone1 .tools").length) {
                alert("Please add a primary image");
                return false;
            }

            $("#butn_95").hide();
            $("#loading_image4").show();



            return true;
        }
    </script>

        			<div style="display:none;">
        			<div id="inline_content" style="padding:10px; background:#fff;">
        			<form id="form_29" onsubmit="return validate_form_29(this)" action="add_product.php" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data">
        				<input type="hidden" name="username" value="' . $_SESSION['username'] . '">
        				<input type="hidden" name="ID" value="' . $id . '">
        				<input type="hidden" name="Item_number" value="">
        				<input type="hidden" name="brandname" value="' . $brandName . '">

                        <style>
@font-face {
  font-family: "Glyphicons Halflings";
  src: url("image-upload-tool/bootstrap/fonts/glyphicons-halflings-regular.eot");
  src: url("image-upload-tool/bootstrap/fonts/glyphicons-halflings-regular.eot?#iefix") format("embedded-opentype"), url("image-upload-tool/bootstrap/fonts/glyphicons-halflings-regular.woff2") format("woff2"), url("image-upload-tool/bootstrap/fonts/glyphicons-halflings-regular.woff") format("woff"), url("image-upload-tool/bootstrap/fonts/glyphicons-halflings-regular.ttf") format("truetype"), url("image-upload-tool/bootstrap/fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular") format("svg");
}

.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: "Glyphicons Halflings";
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.glyphicon-resize-full:before {
    content: "\e096";
}

.glyphicon-pencil:before {
  content: "\270f";
}

.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}

.btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .open>.dropdown-toggle.btn-info {
    color: #fff;
    background-color: #31b0d5;
    border-color: #269abc;
}

.glyphicon-trash:before {
  content: "\e020";
}

.glyphicon-fullscreen:before {
    content: "\e140";
}

.glyphicon-resize-small:before {
    content: "\e097";
}

.glyphicon-remove:before {
    content: "\e014";
}

.glyphicon-ok:before {
    content: "\e013";
}

.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}

.btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
}

.btn:hover, .btn:focus {
    color: #333;
    text-decoration: none;
}

.btn-danger:hover, .btn-danger:focus, .btn-danger:active, .btn-danger.active, .open>.dropdown-toggle.btn-danger {
    color: #fff;
    background-color: #c9302c;
    border-color: #ac2925;
}

.btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open>.dropdown-toggle.btn-success {
    color: #fff;
    background-color: #449d44;
    border-color: #398439;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}

.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}

.btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
                        </style>
                        <div id="js-addProduct-images1" style="display:none;" >
                            <div style="position: relative;display:inline-block;left: 28px;top: 16px;font-family: Lato;float:left;width:250px;">
                                <p style="font-size:20px;font-weight:bold;">Upload a primary image</p>
                                <p style="font-size:18px;">This will be the main image used for this product throughout the site.</p>
                            </div>
                            <div style="width:352px; height:452px;margin:auto;padding-top:20px;">
                                <div id="js-dropzone1" class="dropzone" data-width="352" data-height="452" data-ghost="false" data-ajax="false" data-resize="false" data-originalsize="false" style="width: 352px; height: 452px;">
                                    <input type="file" name="file1" />
                                </div>
                            </div>
                            <input class="button large blue" type="submit" style="color:white;width:100px;height:30px;float:right;margin:0;margin-bottom:-30px;top:-30px;" id="butn_95" value="Finish" ><img src="/css/images/ajax-loader.gif" style="display: none;float:right;" id="loading_image4">
                            <input class="button large blue" type="button" style="color:white;width:100px;height:30px;float:left;margin:0;margin-left:20px;margin-bottom:-30px;top:-30px;" id="js-addProduct-backButton1" value="Back" >
                            <input class="button large blue" type="button" style="color:white;width:130px;height:30px;float:right;margin:0;margin-right:110px;margin-bottom:-30px;top:-30px;" id="js-addProduct-addAnother1" value="Add another Image" >
                        </div>

                        <div id="js-addProduct-images2" style="display:none;" >
                            <div style="position: relative;display:inline-block;left: 28px;top: 16px;font-family: Lato;float:left;width:250px;">
                                <p style="font-size:20px;font-weight:bold;">Upload optional secondary image(s)</p>
                                <p style="font-size:18px; font-weight:bold; color: #E52B50;">Image 2</p>
                                <p style="font-size:18px;">Secondary images will only be shown on the page of this product. You can have up to 4 secondary images.</p>
                            </div>
                            <div style="width:352px; height:452px;margin:auto;padding-top:20px;">
                                <div id="js-dropzone2" class="dropzone" data-width="352" data-height="452" data-ghost="false" data-ajax="false" data-resize="false" data-originalsize="false" style="width: 352px; height: 452px;">
                                    <input type="file" name="file2" />
                                </div>
                            </div>
                            <input class="button large blue" type="submit" style="color:white;width:100px;height:30px;float:right;margin:0;margin-bottom:-30px;top:-30px;" id="butn_95" value="Finish" ><img src="/css/images/ajax-loader.gif" style="display: none;float:right;" id="loading_image4">
                            <input class="button large blue" type="button" style="color:white;width:100px;height:30px;float:left;margin:0;margin-left:20px;margin-bottom:-30px;top:-30px;" id="js-addProduct-backButton2" value="Back" >
                            <input class="button large blue" type="button" style="color:white;width:130px;height:30px;float:right;margin:0;margin-right:110px;margin-bottom:-30px;top:-30px;" id="js-addProduct-addAnother2" value="Add another Image" >
                        </div>

                        <div id="js-addProduct-images3" style="display:none;" >
                            <div style="position: relative;display:inline-block;left: 28px;top: 16px;font-family: Lato;float:left;width:250px;">
                                <p style="font-size:20px;font-weight:bold;">Upload optional secondary image(s)</p>
                                <p style="font-size:18px; font-weight:bold; color: #E52B50;">Image 3</p>
                                <p style="font-size:18px;">Secondary images will only be shown on the page of this product. You can have up to 4 secondary images.</p>
                            </div>
                            <div style="width:352px; height:452px;margin:auto;padding-top:20px;">
                                <div id="js-dropzone3" class="dropzone" data-width="352" data-height="452" data-ghost="false" data-ajax="false" data-resize="false" data-originalsize="false" style="width: 352px; height: 452px;">
                                    <input type="file" name="file3" />
                                </div>
                            </div>
                            <input class="button large blue" type="submit" style="color:white;width:100px;height:30px;float:right;margin:0;margin-bottom:-30px;top:-30px;" id="butn_95" value="Finish" ><img src="/css/images/ajax-loader.gif" style="display: none;float:right;" id="loading_image4">
                            <input class="button large blue" type="button" style="color:white;width:100px;height:30px;float:left;margin:0;margin-left:20px;margin-bottom:-30px;top:-30px;" id="js-addProduct-backButton3" value="Back" >
                            <input class="button large blue" type="button" style="color:white;width:130px;height:30px;float:right;margin:0;margin-right:110px;margin-bottom:-30px;top:-30px;" id="js-addProduct-addAnother3" value="Add another Image" >
                        </div>

                        <div id="js-addProduct-images4" style="display:none;" >
                            <div style="position: relative;display:inline-block;left: 28px;top: 16px;font-family: Lato;float:left;width:250px;">
                                <p style="font-size:20px;font-weight:bold;">Upload optional secondary image(s)</p>
                                <p style="font-size:18px; font-weight:bold; color: #E52B50;">Image 4</p>
                                <p style="font-size:18px;">Secondary images will only be shown on the page of this product. You can have up to 4 secondary images.</p>
                            </div>
                            <div style="width:352px; height:452px;margin:auto;padding-top:20px;">
                                <div id="js-dropzone4" class="dropzone" data-width="352" data-height="452" data-ghost="false" data-ajax="false" data-resize="false" data-originalsize="false" style="width: 352px; height: 452px;">
                                    <input type="file" name="file4" />
                                </div>
                            </div>
                            <input class="button large blue" type="submit" style="color:white;width:100px;height:30px;float:right;margin:0;margin-bottom:-30px;top:-30px;" id="butn_95" value="Finish" ><img src="/css/images/ajax-loader.gif" style="display: none;float:right;" id="loading_image4">
                            <input class="button large blue" type="button" style="color:white;width:100px;height:30px;float:left;margin:0;margin-left:20px;margin-bottom:-30px;top:-30px;" id="js-addProduct-backButton4" value="Back" >
                            <input class="button large blue" type="button" style="color:white;width:130px;height:30px;float:right;margin:0;margin-right:110px;margin-bottom:-30px;top:-30px;" id="js-addProduct-addAnother4" value="Add another Image" >
                        </div>

                        <div id="js-addProduct-images5" style="display:none;" >
                            <div style="position: relative;display:inline-block;left: 28px;top: 16px;font-family: Lato;float:left;width:250px;">
                                <p style="font-size:20px;font-weight:bold;">Upload optional secondary image(s)</p>
                                <p style="font-size:18px; font-weight:bold; color: #E52B50;">Image 5</p>
                                <p style="font-size:18px;">Secondary images will only be shown on the page of this product. You can have up to 4 secondary images.</p>
                            </div>
                            <div style="width:352px; height:452px;margin:auto;padding-top:20px;">
                                <div id="js-dropzone5" class="dropzone" data-width="352" data-height="452" data-ghost="false" data-ajax="false" data-resize="false" data-originalsize="false" style="width: 352px; height: 452px;">
                                    <input type="file" name="file5" />
                                </div>
                            </div>
                            <input class="button large blue" type="submit" style="color:white;width:100px;height:30px;float:right;margin:0;margin-bottom:-30px;top:-30px;" id="butn_95" value="Finish" ><img src="/css/images/ajax-loader.gif" style="display: none;float:right;" id="loading_image4">
                            <input class="button large blue" type="button" style="color:white;width:100px;height:30px;float:left;margin:0;margin-left:20px;margin-bottom:-30px;top:-30px;" id="js-addProduct-backButton5" value="Back" >
                        </div>


        				<div id="js-addProduct-details">

        					<div style="float:left;">
        						<div id="txt_417">
        							<p class="Wp-Body-P"><label for="text_5">
        								<span class="Body-C-C4">Clothing Item Name: </span></label>
        							</p>
        						</div>
        						<textarea placeholder="e.g. Zero Graphic Tee" style="height:20px;width:200px" id="text_name" name="name" rows="2" cols="41" ></textarea>
        						<br/><br/>


        						<div id="txt_461" >
        							<p class="Wp-Body-P">
        								<label for="combo_29"><span class="Body-C-C4">Category:</span></label>
        							</p>
        						</div>
        						<select style="width:212px" id="combo_29" name="category" size="1"  >
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
        						<select style="width:212px" id="combo_29" name="gender" size="1"  >
        							<option value="" selected>Please Select One</option>
        						    <option value="Male" >Male</option>
        						    <option value="Female" >Female</option>
        						    <option value="Unisex" >Unisex</option>
        						</select>
        						<br/><br/>

        						<div>
        							<p class="Wp-Body-P"><label for="text_5">
        								<span class="Body-C-C4">Colour:</span></label>
        								<img src="images/info.png" border="0" width="17" height="17" title="Please select the dominant colour of the product. If the product is not clearly one colour please select Multi." alt="Information Badge" >
        							</p>
        						</div>
        						<select style="width:212px" id="combo_29" name="colour" size="1"  >
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
        									<img src="images/info.png" border="0" width="17" height="17" title="It is optional to add a sizing guide. If you want to add a sizing guide, click the Sizing Guides tab." alt="Information Badge" >
        								</p>
        							</div>

        							<select style="width:212px" name="guide" size="1">
        							<option value="" selected>Optionally Select One</option>
        						';



        $result = mysqli_query($con,"SELECT * FROM sizingguides WHERE Brand = '". $id . "'");

        while($row = mysqli_fetch_array($result))
        {
            $guidename = $row['Name'];

            echo '
                                        <option value="'.$guidename.'">'.$guidename.'</option>
                                    ';
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
        								<textarea placeholder="e.g. 14.99" style="height:20px;width:200px" id="text_price" name="price" rows="2" cols="10" ></textarea>
        								<br/><br/>
        								';

        echo '
        							<div>
        								<p class="Wp-Body-P"><label for="text_5">
        									<span class="Body-C-C4">Shipping Prices: </span></label>
        									<img src="images/info.png" border="0" width="17" height="17" title="If you want to add a Shipping Price Set, click the Shipping Prices tab." alt="Information Badge" >
        								</p>
        							</div>

        							<select style="width:212px" name="shipping" size="1">
        							<option value="" selected>Please Select One</option>
        						';




        $result = mysqli_query($con,"SELECT * FROM shippingprices WHERE Brand = '". $id . "'");

        while($row = mysqli_fetch_array($result))
        {
            $shippingname = $row['Name'];

            echo '
                                        <option value="'.$shippingname.'">'.$shippingname.'</option>
                                    ';
        }


        echo '
        							</select>
        							<br/><br/>

        						<div id="txt_419" >
        							<p class="Wp-Body-P">
        								<label for="combo_29"><span class="Body-C-C4">Available Sizes:</span></label>
        							</p>
        						</div>

        						<div>
        							<p>
        								<textarea placeholder="e.g. Small / One Size" style="width: 200px;height:20px;" id="text_size" name="size1" rows="2" cols="10"></textarea>
        							</p>
        						</div>
        						<div>
        							<p>
        								<textarea style="width: 200px;height:20px;" name="size2" rows="2" cols="10"></textarea>
        							</p>
        						</div>
        						<div>
        							<p>
        								<textarea style="width: 200px;height:20px;" name="size3" rows="2" cols="10"></textarea>
        							</p>
        						</div>
        						<div>
        							<p>
        								<textarea style="width: 200px;height:20px;" name="size4" rows="2" cols="10"></textarea>
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
        						<textarea placeholder="e.g.
Stripped Chino shorts
Zip and Button closure

100% cotton
Colour: Grey

Model in image wears size: 32R" style="height:170px;width:300px" id="text_description" name="desc" ></textarea>
        						<br/><br/>


        					<!--
        						<div>
        							<p class="Wp-Body-P">
        								<label for="combo_29"><span class="Body-C-C4">Product Images:</span></label>
        								<img src="images/info.png" border="0" width="17" height="17" title="Item Image 1 will be the primary image used for the product and will be used in listings." alt="Information Badge" >
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
        						-->
        						<!--<input class="button large blue" type="submit" style="color:white;width:100px;height:30px;float:right;" id="butn_95" value="Submit" ><img src="/css/images/ajax-loader.gif" style="display: none;float:right;" id="loading_image4">-->
        					    <input class="button large blue" type="button" style="color:white;width:100px;height:30px;float:right;" id="js-addProduct-nextButton" value="Next" >
        					</div>
        				</div>

                        <script>
                            $(document).ready(function(){
                                $("#js-addProduct-nextButton").click(function(){
                                    $("#js-addProduct-details").css("display", "none");
                                    $("#js-addProduct-images1").css("display", "block");
                                });

                                $("#js-addProduct-backButton1").click(function(){
                                    $("#js-addProduct-details").css("display", "block");
                                    $("#js-addProduct-images1").css("display", "none");
                                });

                                $("#js-addProduct-backButton2").click(function(){
                                    $("#js-addProduct-images1").css("display", "block");
                                    $("#js-addProduct-images2").css("display", "none");
                                });

                                $("#js-addProduct-backButton3").click(function(){
                                    $("#js-addProduct-images2").css("display", "block");
                                    $("#js-addProduct-images3").css("display", "none");
                                });

                                $("#js-addProduct-backButton4").click(function(){
                                    $("#js-addProduct-images3").css("display", "block");
                                    $("#js-addProduct-images4").css("display", "none");
                                });

                                $("#js-addProduct-backButton5").click(function(){
                                    $("#js-addProduct-images4").css("display", "block");
                                    $("#js-addProduct-images5").css("display", "none");
                                });

                                $("#js-addProduct-addAnother1").click(function(){
                                    if ($(".tools").length) {
                                        $("#js-addProduct-images2").css("display", "block");
                                        $("#js-addProduct-images1").css("display", "none");
                                        $("#js-dropzone1 .btn.btn-success").click();
                                    } else {
                                        alert("Please add a primary image before adding more.");
                                    }
                                });

                                $("#js-addProduct-addAnother2").click(function(){
                                    $("#js-addProduct-images3").css("display", "block");
                                    $("#js-addProduct-images2").css("display", "none");
                                    $("#js-dropzone2 .btn.btn-success").click();
                                });

                                $("#js-addProduct-addAnother3").click(function(){
                                    $("#js-addProduct-images4").css("display", "block");
                                    $("#js-addProduct-images3").css("display", "none");
                                    $("#js-dropzone3 .btn.btn-success").click();
                                });

                                $("#js-addProduct-addAnother4").click(function(){
                                    $("#js-addProduct-images5").css("display", "block");
                                    $("#js-addProduct-images4").css("display", "none");
                                    $("#js-dropzone4 .btn.btn-success").click();
                                });

                            });
                        </script>

        				</form>

        				<script type="text/javascript" src="js/jsValidation.js"></script>
        			</div>
        			</div>
        		';
    }

//TODO: methods for colourstrings, categorystrings, colourcount (not done on all pages yet)
//TODO: Clean up all scripts, put them nicely in folders (e.g. userMade, 3rd party etc)
//TODO: merge nav348 to styles.css
//TODO: remove all old unused html files (inc uploadmenu2 and alert.txt)

//TODO: New header categories dynamically
//TODO: Change search so it will find brands, products or categories. Only in 1 column, stacked on top of eachother

//TODO: MASSIVELY clean up all css!! No more inline styles
//TODO: clean up all code, no more id="txt_123" bullshit etc

//TODO: clean up database calls. Make sure only 1 call to database is done per page and everything needed is collected once. Then close connection.

//TODO: clear button for refine bys

//TODO: do audit of Harabara font, overused sometimes

//TODO: refinement forms no longer need to reload page (ajax)

//TODO: don't allow brand to add a product if they dont have any shipping price sets
//TODO: make upload tool step by step.
//TODO: get rid of all alerts (e.g. mainly on upload tool), find alternative
//TODO: make buttons on upload tool flat style.
//TODO: make brand upload notifications better.

//TODO: Brand sale notification. Email either automatically after paypal, or after manual force sale. Paypal IPN

//TODO: users can log in / CRM database

//TODO: SEO audit. I.e. alt tags for all images etc.

//TODO set up google analytics event pushing

//TODO promo code functionality
//TODO: friend referral?

//TODO: big restyle??

//TODO: checkout overhaul
//TODO: embed paypal in site??

//TODO: basket & multiple item checkout

//TODO: reword returns page

//TODO: image load times overhaul

//TODO: nav bar change to brands drop down

//TODO: 'no search results found' message

//TODO: PUT XAV ON ABOUT PAGAE. SET UP XAV A 1P product

//TODO: weekly email to brands on masterpage

//TODO: remove STOCKS. add functionality to make a product live or not. Make colour non required?

//TODO: redesign home,men,women. Play around with blue wood backdrop

//TODO: make contact form able to contact brands directly

//TODO: make 404 page