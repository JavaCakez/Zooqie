<?php

$errorMessage = "NULL";
$warningMessage = "";
$uploadedString = "";



//Upload image files
for ($i = 1; $i <= 4; $i++)
{
    $fileString = "file" . $i;
    if($_FILES[$fileString]["name"] == "") break;

    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES[$fileString]["name"]);
    $extension = end($temp);
    if ($_FILES[$fileString]["size"] < 6144000)
    {
        if ($_FILES[$fileString]["error"] > 0)
        {
            $errorMessage = "Return Code: " . $_FILES[$fileString]["error"] . "<br>";
        }
    }
    else
    {
        $errorMessage = "Invalid file - Must be a jpg or png and be less than 6MB in size";
    }
}



if($errorMessage == "NULL")
{
    //Upload image files
    for ($i = 1; $i <= 4; $i++)
    {
        $fileString = "file" . $i;
        if($_FILES[$fileString]["name"] != "")
        {
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES[$fileString]["name"]);
            $extension = end($temp);
            if ($_FILES[$fileString]["size"] < 6144000)
            {
                if ($_FILES[$fileString]["error"] > 0)
                {
                    $errorMessage = "Return Code: " . $_FILES[$fileString]["error"] . "<br>";
                }
                else
                {

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
                        if($i == 1)
                        {
                            $imagedetails = getimagesize($_FILES[$fileString]["tmp_name"]);
                            $width = $imagedetails[0];
                            $height = $imagedetails[1];

                            $ratio = $width / $height;
                            if($ratio < 0.8 || $ratio > 1.2) $warningMessage .= "Warning: Logo may be squashed/stretched";

                            move_uploaded_file($_FILES[$fileString]["tmp_name"],
                            "images/storeimages/" . $_POST["username"]."_logo.". $extension);
                            copy("images/storeimages/" . $_POST["username"]."_logo.". $extension,
                                "images/storeimagesbackup/" . $_POST["username"]."_logo.". $extension);
                            $uploadedString = $uploadedString . "Logo: ";
                            $updatesql = "UPDATE brands SET logo_URL= 'images/storeimages/" . $_POST["username"]."_logo." . $extension . "' WHERE Username='" . $_POST["username"] . "'";
                        }
                        else if($i == 2)
                        {
                            $imagedetails = getimagesize($_FILES[$fileString]["tmp_name"]);
                            $width = $imagedetails[0];
                            $height = $imagedetails[1];

                            $ratio = $width / $height;
                            if($ratio < 3.0 || $ratio > 8.0) $warningMessage .= " Warning: Banner may be squashed/stretched";

                            move_uploaded_file($_FILES[$fileString]["tmp_name"],
                            "images/storeimages/" . $_POST["username"]."_banner.". $extension);
                            copy("images/storeimages/" . $_POST["username"]."_banner.". $extension,
                                "images/storeimagesbackup/" . $_POST["username"]."_banner.". $extension);
                            $uploadedString = $uploadedString . "Banner: ";
                            $updatesql = "UPDATE brands SET banner_URL= 'images/storeimages/" . $_POST["username"]."_banner." . $extension . "' WHERE Username='" . $_POST["username"] . "'";
                        }
                        else if($i == 3)
                        {
                            move_uploaded_file($_FILES[$fileString]["tmp_name"],
                                "images/storeimages/" . $_POST["username"]."_background.". $extension);
                            copy("images/storeimages/" . $_POST["username"]."_background.". $extension,
                                "images/storeimagesbackup/" . $_POST["username"]."_background.". $extension);
                            $uploadedString = $uploadedString . "Background: ";
                            $updatesql = "UPDATE brands SET background_URL= 'images/storeimages/" . $_POST["username"]."_background." . $extension . "' WHERE Username='" . $_POST["username"] . "'";
                        }
                        else if($i == 4)
                        {
                            $imagedetails = getimagesize($_FILES[$fileString]["tmp_name"]);
                            $width = $imagedetails[0];
                            $height = $imagedetails[1];

                            $ratio = $width / $height;
                            if($ratio < 1.2 || $ratio > 1.8) $warningMessage .= " Warning: Storefront may be squashed/stretched";

                            move_uploaded_file($_FILES[$fileString]["tmp_name"],
                                "images/storeimages/" . $_POST["username"]."_sbb.". $extension);
                            copy("images/storeimages/" . $_POST["username"]."_sbb.". $extension,
                                "images/storeimagesbackup/" . $_POST["username"]."_sbb.". $extension);
                            $uploadedString = $uploadedString . "Background: ";
                            $updatesql = "UPDATE brands SET shopbybrand_URL= 'images/storeimages/" . $_POST["username"]."_sbb." . $extension . "' WHERE Username='" . $_POST["username"] . "'";
                        }

                        $result = mysqli_query($con,$updatesql);
                        $uploadedString = $uploadedString . $_FILES[$fileString]["name"] . " uploaded\n";
                    }
                }
            }
            else
            {
                $errorMessage = "Invalid file - Must be a jpg or png and be less than 6MB in size";
            }
        }
    }
}


//Automatic Redirect
if($errorMessage != "NULL")
{
    $Message = $errorMessage;
}
else if($warningMessage != "")
{
    $Message = $warningMessage;
}
else
{
    $Message = "Upload Successful";
}
$URL = "uploadmenu.php?Message=" . urlencode($Message) . "&Tab=2";
//Reload without cache (for new images)
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header ("Location: $URL");







//Notify success
$address = "zookie.org.uk@gmail.com";
$e_subject = 'Brand upload notification';


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

if($errorMessage != "NULL")
{
    $e_body = 'Brand: ' . $_POST["username"] . ' attempted to uploaded store images but it failed. Error message: ' . $errorMessage;
}
else if($warningMessage != "")
{
    $e_body = 'Brand: ' . $_POST["username"] . ' have uploaded store images with warnings: ' . $warningMessage;
}
else
{
    $e_body = 'Brand: ' . $_POST["username"] . ' have uploaded store images with files: ' . $uploadedString;
}
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