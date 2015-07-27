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
    $e_body = 'Brand: ' . $username . ' attempted to edit a product, but it failed';
}
else
{
    //Get all POST variables
    $name 			= mysqli_real_escape_string($con, $_POST['name']);
    $itemno			= strtoupper(mysqli_real_escape_string($con, $_POST['itemno']));
    $brandName		= mysqli_real_escape_string($con, $_POST["brandname"]);
    $colour			= mysqli_real_escape_string($con, $_POST["colour"]);
    $category		= mysqli_real_escape_string($con, $_POST["category"]);
    $gender 		= mysqli_real_escape_string($con, $_POST['gender']);
    $price 			= str_replace('£','',mysqli_real_escape_string($con, $_POST['price']));
    $shipping 		= mysqli_real_escape_string($con, $_POST['shipping']);
    $description 	= mysqli_real_escape_string($con, $_POST['desc']);
    $guide 			= mysqli_real_escape_string($con, $_POST['guide']);

    $nosizes 		= mysqli_real_escape_string($con, $_POST['nosizes']);
    for ($i = 0; $i < $nosizes; $i++)
    {
        $tmpsize 	= 'size'.$i;
        $tmpoldsize = 'oldsize'.$i;
        $tmpstock 	= 'stock'.$i;
        $tmpoldstock 	= 'oldstock'.$i;
        $size[$i] 	= mysqli_real_escape_string($con, $_POST[$tmpsize]);
        $oldsize[$i]= mysqli_real_escape_string($con, $_POST[$tmpoldsize]);
        $stock[$i] 	= mysqli_real_escape_string($con, $_POST[$tmpstock]);
        $oldstock[$i]= mysqli_real_escape_string($con, $_POST[$tmpoldstock]);
    }

    for ($i = 0; $i < 3; $i++)
    {
        $tmpsize 	= 'newsize'.$i;
        $tmpstock 	= 'newstock'.$i;
        $newsize[$i]		= mysqli_real_escape_string($con, $_POST[$tmpsize]);
        $newstock[$i] 		= mysqli_real_escape_string($con, $_POST[$tmpstock]);
    }


    $file1 			= mysqli_real_escape_string($con, $_POST['file1']);
    $file2 			= mysqli_real_escape_string($con, $_POST['file2']);
    $file3 			= mysqli_real_escape_string($con, $_POST['file3']);
    $file4 			= mysqli_real_escape_string($con, $_POST['file4']);
    $file5 			= mysqli_real_escape_string($con, $_POST['file5']);
    $username 		= mysqli_real_escape_string($con, $_POST["username"]);
    $ID 			= mysqli_real_escape_string($con, $_POST["ID"]);





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
                                "images/productimages/" . $itemno . "_".$i."." . $extension);
                            copy("images/productimages/" . $itemno . "_".$i."." . $extension,
                                "images/productimagesbackup/" . $itemno . "_".$i."." . $extension);
                            $uploadedString = $uploadedString . $itemno . "_".$i."." . $extension;

                            $imgSql[$i] = "'images/productimages/". $itemno . "_".$i."." . $extension . "'";

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
                $imgSql[$i] = "''";
            }
        }


        if($name != '')
        {
            $updatesql = "UPDATE products SET Item_name= '" . $name . "' WHERE Item_number='" . $itemno . "'";
            $result = mysqli_query($con,$updatesql);
        }
        if($gender != '')
        {
            if($gender == 'Male') $updatesql = "UPDATE products SET Gender= 'M' WHERE Item_number='" . $itemno . "'";
            if($gender == 'Female') $updatesql = "UPDATE products SET Gender= 'F' WHERE Item_number='" . $itemno . "'";
            if($gender == 'Unisex') $updatesql = "UPDATE products SET Gender= 'U' WHERE Item_number='" . $itemno . "'";
            $result = mysqli_query($con,$updatesql);
        }
        if($category != '')
        {
            $updatesql = "UPDATE products SET Category= '" . $category . "' WHERE Item_number='" . $itemno . "'";
            $result = mysqli_query($con,$updatesql);
        }
        if($colour != '')
        {
            $updatesql = "UPDATE products SET Colour= '" . $colour . "' WHERE Item_number='" . $itemno . "'";
            $result = mysqli_query($con,$updatesql);
        }
        if($price != '')
        {
            $updatesql = "UPDATE products SET Price= " . $price . " WHERE Item_number='" . $itemno . "'";
            $result = mysqli_query($con,$updatesql);
        }
        if($shipping != '')
        {
            $result3 = mysqli_query($con,"SELECT * FROM shippingprices WHERE Brand = '". $ID . "' AND Name = '" . $shipping . "'");
            while($row3 = mysqli_fetch_array($result3))
            {
                $uks = $row3['Shipping_charge'];
                $uke = $row3['Shipping_charge2'];
                $europe = $row3['Shipping_charge3'];
                $international = $row3['Shipping_charge4'];
            }

            $updatesql = "UPDATE products SET Shipping_set= '" . $shipping . "', Shipping_charge = ".$uks.", Shipping_charge2 = ".$uke.", Shipping_charge3 = ".$europe.", Shipping_charge4 = ".$international." WHERE Item_number='" . $itemno . "'";
            $result = mysqli_query($con,$updatesql);
        }
        if($description != '')
        {
            $updatesql = "UPDATE products SET Details= '" . $description . "' WHERE Item_number='" . $itemno . "'";
            $result = mysqli_query($con,$updatesql);
        }
        if($guide != '')
        {
            $updatesql = "UPDATE products SET Sizing_guide= '" . $guide . "' WHERE Item_number='" . $itemno . "'";
            $result = mysqli_query($con,$updatesql);
        }


        //Upload image files
        for ($i = 1; $i <= 5; $i++)
        {
            if($imgSql[$i] != "''")
            {
                $updatesql = "UPDATE products SET Image_URL".$i."= " . $imgSql[$i] . " WHERE Item_number='" . $itemno . "'";
                $result = mysqli_query($con,$updatesql);
            }
        }

        for ($j = 0; $j < $nosizes; $j++)
        {
            $result2 = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $itemno . "' AND Size ='" . $oldsize[$j] . "'");

            while($row2 = mysqli_fetch_array($result2))
            {
                if($oldstock[$j] == $row2['stock'])
                {
                    if($stock[$j] != '' && $size[$j] != '')
                    {
                        $updatesql = "UPDATE products SET Size = '" . $size[$j] . "', stock = ".$stock[$j]." WHERE Item_number='" . $itemno . "' AND Size ='" . $oldsize[$j] . "'";
                        $result = mysqli_query($con,$updatesql);
                    }
                }
                else
                {
                    $errorMessage = "Edit unsuccessful: The item stock has changed during the edit, please try again.";
                }
            }
        }

        for ($j = 0; $j < 3; $j++)
        {
            if($newsize[$j] != '' && $newstock[$j] != '')
            {
                $result = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '". $itemno . "'");

                while($row = mysqli_fetch_array($result))
                {
                    $brandname = $row['Brand_name'];
                    $category = $row['Category'];
                    $colour = $row['Colour'];
                    $img[1] = $row['Image_URL1'];
                    $img[2] = $row['Image_URL2'];
                    $img[3] = $row['Image_URL3'];
                    $img[4] = $row['Image_URL4'];
                    $img[5] = $row['Image_URL5'];
                }

                $sql = "INSERT INTO products VALUES ('" . $itemno . "', '" . $newsize[$j] . "', '" . $name . "', '" . $ID . "', '".$brandname."', ";
                if($gender == 'Male') $sql = $sql . "'M',";
                if($gender == 'Female') $sql = $sql . "'F',";
                if($gender == 'Unisex') $sql = $sql . "'U',";
                $sql = $sql . " " . $price . ", '".$category."', '".$colour."', '".date('Y-m-d')."', 0, ";

                for ($x = 1; $x <= 5; $x++)
                {
                    if($img[$x] != '')
                    {
                        $sql = $sql . "'".$img[$x]."', ";
                    }
                    else
                    {
                        $sql = $sql . "NULL, ";
                    }
                }

                $result3 = mysqli_query($con,"SELECT * FROM shippingprices WHERE Brand = '". $ID . "' AND Name = '" . $shipping . "'");
                while($row3 = mysqli_fetch_array($result3))
                {
                    $uks = $row3['Shipping_charge'];
                    $uke = $row3['Shipping_charge2'];
                    $europe = $row3['Shipping_charge3'];
                    $international = $row3['Shipping_charge4'];
                }
                if($uks == '') $uks = -1.00;
                if($uke == '') $uke = -1.00;
                if($europe == '') $europe = -1.00;
                if($international == '') $international = -1.00;

                $sql = $sql . "" . $newstock[$j] . ", '" . $shipping . "',".$uks.",".$uke.",".$europe.",".$international.", '".$guide."', '" . $description . "')";
                $result = mysqli_query($con,$sql);
            }
        }
    }



    $e_body = 'Brand: ' . $username . ' have edited a product:' . $itemno;
}

//Notify success
$address = "zookie.org.uk@gmail.com";
$e_subject = 'Brand product edit';


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
if($errorMessage == "NULL") $Message = 'Edit successful' . $warningMessage;
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