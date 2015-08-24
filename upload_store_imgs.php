<?php

$uploadedString = "";

if(file_exists("utils.php")) {include("utils.php");}
else if(file_exists("../utils.php")) {include("../utils.php");}
else if(file_exists("../../utils.php")) {include("../../utils.php");}

// Create connection
if(file_exists("db_settings.php")) {include("db_settings.php");}
if(file_exists("../db_settings.php")) {include("../db_settings.php");}
if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
if(file_exists("db_settings.php")) {include("db_settings.php");}
$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);


$error					= false;
$absolutedir			= dirname(__FILE__);
$dir					= '/images/storeimages/';
$serverdir				= $absolutedir.$dir;
$filename				= array();
$i = 1;



foreach($_FILES as $name => $value) {

    $jsonData = stripslashes(html_entity_decode($_POST[$name.'_values']));
    $jsonData = rtrim($jsonData, "\0");
    $json					= json_decode($jsonData);
    $tmp					= explode(',',$json->data);
    $imgdata 				= base64_decode($tmp[1]);

    if ($json->name != '') {
        $extension[$i]				= strtolower(end(explode('.',$json->name)));
        $str = '';
        if ($i == 1) $str = 'sbb';
        if ($i == 2) $str = 'banner';
        if ($i == 3) $str = 'logo';
        if ($i == 4) $str = 'background';
        $fname					= $_POST["username"] . "_".$str."." . $extension[$i];


        $handle					= fopen($serverdir.$fname,'w');
        fwrite($handle, $imgdata);
        fclose($handle);

        $filename[]				= $fname;
    }

    $i++;
}

for ($i = 1; $i <= 5; $i++)
{
    $fileString = "file" . $i;

    if($i == 3)
    {
        if($_POST[$fileString.'_values'] != "") {
            copy("images/storeimages/" . $_POST["username"] . "_logo." . $extension[$i], "images/storeimagesbackup/" . $_POST["username"] . "_logo." . $extension[$i]);
            $uploadedString = $uploadedString . "Logo: ";
            $updatesql = "UPDATE brands SET logo_URL= 'images/storeimages/" . $_POST["username"] . "_logo." . $extension[$i] . "' WHERE Username='" . $_POST["username"] . "'";
        } else {
            $updatesql = "UPDATE brands SET logo_URL= 'NULL' WHERE Username='" . $_POST["username"] . "'";
        }
    }
    else if($i == 2)
    {
        if($_POST[$fileString.'_values'] != "") {
            copy("images/storeimages/" . $_POST["username"] . "_banner." . $extension[$i], "images/storeimagesbackup/" . $_POST["username"] . "_banner." . $extension[$i]);
            $uploadedString = $uploadedString . "Banner: ";
            $updatesql = "UPDATE brands SET banner_URL= 'images/storeimages/" . $_POST["username"] . "_banner." . $extension[$i] . "' WHERE Username='" . $_POST["username"] . "'";
        } else {
            $updatesql = "UPDATE brands SET banner_URL= 'NULL' WHERE Username='" . $_POST["username"] . "'";
        }
    }
    else if($i == 4)
    {
        if($_POST[$fileString.'_values'] != "") {
            copy("images/storeimages/" . $_POST["username"] . "_background." . $extension[$i], "images/storeimagesbackup/" . $_POST["username"] . "_background." . $extension[$i]);
            $uploadedString = $uploadedString . "Background: ";
            $updatesql = "UPDATE brands SET background_URL= 'images/storeimages/" . $_POST["username"] . "_background." . $extension[$i] . "' WHERE Username='" . $_POST["username"] . "'";
        } else {
            $updatesql = "UPDATE brands SET background_URL= 'NULL' WHERE Username='" . $_POST["username"] . "'";
        }
    }
    else if($i == 1)
    {
        if($_POST[$fileString.'_values'] != "") {
            copy("images/storeimages/" . $_POST["username"] . "_sbb." . $extension[$i], "images/storeimagesbackup/" . $_POST["username"] . "_sbb." . $extension[$i]);
            $uploadedString = $uploadedString . "Background: ";
            $updatesql = "UPDATE brands SET shopbybrand_URL= 'images/storeimages/" . $_POST["username"] . "_sbb." . $extension[$i] . "' WHERE Username='" . $_POST["username"] . "'";
        } else {
            $updatesql = "UPDATE brands SET shopbybrand_URL= 'NULL' WHERE Username='" . $_POST["username"] . "'";
        }
    }

    $result = mysqli_query($con,$updatesql);
    $uploadedString = $uploadedString . $_FILES[$fileString]["name"] . " uploaded\n";
}



//Automatic Redirect
$Message = "Upload Successful";

$URL = "uploadmenu.php?Message=" . urlencode($Message) . "&Tab=2";
//Reload without cache (for new images)
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header ("Location: $URL");







//Notify success
$address = "zooqieuk@gmail.com";
$e_subject = 'Brand upload notification';


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.


$e_body = 'Brand: ' . $_POST["username"] . ' have uploaded store images with files: ' . $uploadedString;
$e_content = "";
$e_reply = "";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: " . $_POST["username"] . PHP_EOL;
$headers .= "Reply-To: " . $_POST["username"] . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if(mail($address, $e_subject, $msg, $headers)) {

    // Email has sent successfully, echo a success page.

    //echo "<fieldset>";
    //echo "<div id='success_page'>";
    //echo "<h1>Email Sent Successfully.</h1>";
    //echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
    //echo "</div>";
    //echo "</fieldset>";

} else {

    //echo 'ERROR!';

}



?>