<?php

$errorMessage = "NULL";
$uploadedString = "";

// Create connection
if(file_exists("db_settings.php")) {include("db_settings.php");}
if(file_exists("../db_settings.php")) {include("../db_settings.php");}
if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
if(file_exists("db_settings.php")) {include("db_settings.php");}
$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

// Check connection
if (mysqli_connect_errno($con))
{
    $e_body = 'Brand: ' . $username . ' attempted to add a product, but it failed';
}
else
{
    //Get all POST variables
    $name 			= mysqli_real_escape_string($con, $_POST['name']);
    $gender 		= mysqli_real_escape_string($con, $_POST['gender']);
    $price 			= str_replace('£','',mysqli_real_escape_string($con, $_POST['price']));
    $shipping 		= mysqli_real_escape_string($con, $_POST['shipping']);
    $description 	= mysqli_real_escape_string($con, $_POST['desc']);
    $size1 			= mysqli_real_escape_string($con, $_POST['size1']);
    $stock1 		= mysqli_real_escape_string($con, $_POST['stock1']);
    $size2 			= mysqli_real_escape_string($con, $_POST['size2']);
    $stock2 		= mysqli_real_escape_string($con, $_POST['stock2']);
    $size3 			= mysqli_real_escape_string($con, $_POST['size3']);
    $stock3 		= mysqli_real_escape_string($con, $_POST['stock3']);
    $size4 			= mysqli_real_escape_string($con, $_POST['size4']);
    $stock4 		= mysqli_real_escape_string($con, $_POST['stock4']);
    $size5 			= mysqli_real_escape_string($con, $_POST['size5']);
    $stock5 		= mysqli_real_escape_string($con, $_POST['stock5']);
    $file1 			= mysqli_real_escape_string($con, $_POST['file1']);
    $file2 			= mysqli_real_escape_string($con, $_POST['file2']);
    $file3 			= mysqli_real_escape_string($con, $_POST['file3']);
    $file4 			= mysqli_real_escape_string($con, $_POST['file4']);
    $file5 			= mysqli_real_escape_string($con, $_POST['file5']);
    $username 		= mysqli_real_escape_string($con, $_POST["username"]);
    $ID 			= mysqli_real_escape_string($con, $_POST["ID"]);
    $brandName		= mysqli_real_escape_string($con, $_POST["brandname"]);
    $colour			= mysqli_real_escape_string($con, $_POST["colour"]);
    $category		= mysqli_real_escape_string($con, $_POST["category"]);
    $guide			= mysqli_real_escape_string($con, $_POST["guide"]);

    //Find next available ID
    for ($i = 1; $i <= 999; $i++)
    {
        $s = $ID . str_pad(strval($i), 3, "0", STR_PAD_LEFT);
        $result = mysqli_query($con,"SELECT * FROM products WHERE Brand = '". $ID . "' AND Item_number = '" . $s . "'");
        $counter = 0;
        while($row = mysqli_fetch_array($result))
        {
            $counter++;
        }
        if($counter == 0) break;
    }





    //Upload image files
    for ($i = 1; $i <= 5; $i++)
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
        for ($i = 1; $i <= 5; $i++)
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
                        $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

                        // Check connection
                        if (mysqli_connect_errno($con))
                        {
                        }
                        else
                        {
                            $imagedetails = getimagesize($_FILES[$fileString]["tmp_name"]);
                            $width = $imagedetails[0];
                            $height = $imagedetails[1];

                            $ratio = $width / $height;
                            if($ratio < 0.6 || $ratio > 1.0) $warningMessage = " but with the following WARNING: Product image may be squashed/stretched";


                            move_uploaded_file($_FILES[$fileString]["tmp_name"],
                                "images/productimages/" . $s . "_".$i."." . $extension);
                            copy("images/productimages/" . $s . "_".$i."." . $extension,
                                "images/productimagesbackup/" . $s . "_".$i."." . $extension);
                            $uploadedString = $uploadedString . $s . "_".$i."." . $extension;

                            $imgsql[$i] = "'images/productimages/". $s . "_".$i."." . $extension . "', ";


                            $uploadedString = $uploadedString . $_FILES[$fileString]["name"] . " uploaded\n";
                        }
                    }
                }
                else
                {
                    $errorMessage = "Invalid file - Must be a jpg or png and be less than 6MB in size";
                }
            }
            else
            {
                $imgsql[$i] = "NULL, ";
            }
        }








        for ($j = 1; $j <= 5; $j++)
        {
            $stock			= '';
            $size			= '';
            if($j==1)
            {
                $stock = $stock1;
                $size = $size1;
            }
            else if ($j==2)
            {
                $stock = $stock2;
                $size = $size2;
            }
            else if ($j==3)
            {
                $stock = $stock3;
                $size = $size3;
            }
            else if ($j==4)
            {
                $stock = $stock4;
                $size = $size4;
            }
            else if ($j==5)
            {
                $stock = $stock5;
                $size = $size5;
            }

            if($stock == '') $stock = 0;
            if($size != '')
            {
                $sql = "INSERT INTO products VALUES ('" . $s . "', '" . $size . "', '" . $name . "', '" . $ID . "', '" . $brandName . "', ";
                if($gender == 'Male') $sql = $sql . "'M',";
                if($gender == 'Female') $sql = $sql . "'F',";
                if($gender == 'Unisex') $sql = $sql . "'U',";
                $sql = $sql . " " . $price . ", '" . $category . "', '" . $colour . "', '".date('Y-m-d')."', 0, ";

                $sql = $sql . $imgsql[1];
                $sql = $sql . $imgsql[2];
                $sql = $sql . $imgsql[3];
                $sql = $sql . $imgsql[4];
                $sql = $sql . $imgsql[5];

                $result = mysqli_query($con,"SELECT * FROM shippingprices WHERE Brand = '". $ID . "' AND Name = '" . $shipping . "'");
                while($row = mysqli_fetch_array($result))
                {
                    $uks = $row['Shipping_charge'];
                    $uke = $row['Shipping_charge2'];
                    $europe = $row['Shipping_charge3'];
                    $international = $row['Shipping_charge4'];
                }
                if($uks == '') $uks = -1.00;
                if($uke == '') $uke = -1.00;
                if($europe == '') $europe = -1.00;
                if($international == '') $international = -1.00;

                $sql = $sql . "" . $stock . ", '" . $shipping . "',".$uks.",".$uke.",".$europe.",".$international.", '".$guide."', '" . $description . "')";
                $result = mysqli_query($con,$sql);
            }
        }

        $result2 = mysqli_query($con,"SELECT * FROM brandfolders WHERE ID = '" . $ID . "'");
        while($row2 = mysqli_fetch_array($result2))
        {
            $foldername = 'brands/' . $row2['Folder_name'];
        }

        if (!file_exists($foldername . '/')) {
            mkdir( $foldername . '/', 0755, true);
        }

        if (!copy('producttemplate.php', $foldername . '/' . strtolower($s) . '.php'))
        {

        }
        else
        {

        }

    }

    //TODO: Finish this
    $e_body = 'Brand: ' . $username . ' have added a product:' . $s . '\n With the following information: \n\n

    Name = '.$name.'\n
    Gender = '.gender.'\n
    Price = '.$price.'\n
    Shipping = '.$shipping.'\n
    Description = '.$description.'\n
    Size1 = '.$size1.'\n
    $stock1
    $size2
    $stock2
    $size3
    $stock3
    $size4
    $stock4
    $size5
    $stock5
    $file1
    $file2
    $file3
    $file4
    $file5
    $username
    $ID
    $brandName
    $colour
    $category
    $guide
    ';
}

//Notify success
$address = "zookie.org.uk@gmail.com";
$e_subject = 'Brand product upload';


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.
$e_content = "";
$e_reply = "";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: " . $username . PHP_EOL;
$headers .= "Reply-To: " . $username . PHP_EOL;
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


//Automatic Redirect
if($errorMessage == "NULL") $Message = 'Upload successful' . $warningMessage;;
if($errorMessage != "NULL") $Message = $errorMessage;
$URL = "uploadmenu.php?Message=" . urlencode($Message) . "&Tab=3";
//Reload without cache (for new images)
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header ("Location: $URL");

?>