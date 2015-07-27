<?php

// Create connection
if(file_exists("db_settings.php")) {include("db_settings.php");}
if(file_exists("../db_settings.php")) {include("../db_settings.php");}
if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
if(file_exists("db_settings.php")) {include("db_settings.php");}
$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);


$Date = $_POST['Date'];
$timestamp = strtotime($Date);
$Date = date('Y-m-d', $timestamp);

$Price = $_POST['Price'];
$Shipping = $_POST['Shipping'];
$Brand_username = $_POST['Brand_username'];
$Item_number = $_POST['Item_number'];
$Item_name = $_POST['Item_name'];
$Description = $_POST['Description'];
$Name = $_POST['Name'];
$Address1 = $_POST['Address1'];
$Address2 = $_POST['Address2'];
$Town = $_POST['Town'];
$Region = $_POST['Region'];
$Postcode = $_POST['Postcode'];
$Contact = $_POST['Contact'];



$string = "SELECT * FROM products WHERE Item_number='" . $_POST['Item_number'] . "' AND Size='" . $_POST['Description'] . "'";
$result2 = mysqli_query($con,$string);

while($row = mysqli_fetch_array($result2))
{
    $stock = $row['stock'] - 1;
    $sold = $row['Quantity_sold'] + 1;


    //Update Stock
    $updatesql = "UPDATE products SET stock=" . $stock . " WHERE Item_number='" . $_POST['Item_number'] . "' AND Size='" . $_POST['Description'] . "'";
    $result = mysqli_query($con,$updatesql);

    //Update Quantity Sold
    $updatesql = "UPDATE products SET Quantity_sold=" .  $sold. " WHERE Item_number='" . $_POST['Item_number'] . "'";
    $result = mysqli_query($con,$updatesql);

    //Update Sales Table
    $sql = "INSERT INTO sales (Date, Price, Shipping, BrandUsername, Item_Number, Item_name, Description, Name, Address1, Address2, Postcode, Contact)
    VALUES ('" .
        $Date . "', " .
        $Price . ", " .
        $Shipping . ", '" .
        $Brand_username . "', '" .
        $Item_number . "', '" .
        $Item_name . "', '" .
        $Description . "', '" .
        $Name . "', '" .
        $Address1 . "," . $Address2 . "', '" .
        $Town . "," . $Region . "', '" .
        $Postcode . "', '" .
        $Contact . "');";
    $result = mysqli_query($con,$sql);

    //Delete unhandled transaction
    $sql = "DELETE FROM unhandledtransactions WHERE
         Price=" . $Price .
        " AND Shipping=" . $Shipping .
        " AND Brand_username='" . $Brand_username .
        "' AND Item_number='" . $Item_number .
        "' AND Item_name='" . $Item_name .
        "' AND Description='" . $Description .
        "' AND Name='" . $Name .
        "' AND Address1='" . $Address1 .
        "' AND Address2='" . $Address2 .
        "' AND Town='" . $Town .
        "' AND Region='" . $Region .
        "' AND Postcode='" . $Postcode .
        "' AND Contact='" . $Contact .
        "';";
    $result = mysqli_query($con,$sql);
}





//Automatic Redirect
$URL = "masterpage.php";
//Reload without cache (for new images)
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header ("Location: $URL");

?>