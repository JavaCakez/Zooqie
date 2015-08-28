<?
    //Include utilities
    if(file_exists("utils.php")) {include_once("utils.php");}
    else if(file_exists("../utils.php")) {include_once("../utils.php");}
    else if(file_exists("../../utils.php")) {include_once("../../utils.php");}

    //Include database settings
    if(file_exists("db_settings.php")) {include_once("db_settings.php");}
    if(file_exists("../db_settings.php")) {include_once("../db_settings.php");}
    if(file_exists("../../db_settings.php")) {include_once("../../db_settings.php");}
    if(file_exists("db_settings.php")) {include_once("db_settings.php");}

    $folderString = createFolderString($folderLevel);

    echo '
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <meta name="viewport" content="width=1000">
        <meta http-equiv="Content-Language" content="en-gb">
        <meta name="keywords" content="brands,independent,clothing">
        <meta name="robots" content="index,follow">

        <link rel="icon" href="'.$folderString.'favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="'.$folderString.'favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="'.$folderString.'css/styles.css">
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->

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
?>