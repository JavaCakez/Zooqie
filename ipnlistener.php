<?php
    if(file_exists("db_settings.php")) {include("db_settings.php");}
    if(file_exists("../db_settings.php")) {include("../db_settings.php");}
    if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
    if(file_exists("db_settings.php")) {include("db_settings.php");}
    // Paypal Posts HTML Form variables to this page - we will post them back with an extra parameter cmd with value _notify-validate
    //DEBUGGING - set this to true to write debug files
    $debug = true;
    // set up variables for our own local settings
    $account_owner = "zookie.org.uk@gmail.com"; //Initialise Paypal account holder
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
    $headers .= "From: zooqieuk@gmail.com"; //Initialise email from which emails will be sent
    $mail_To = "tom.hargrave19@gmail.com"; //Enter the email for alerts and confirmations
    //Build the data to post back to Paypal
    $postback = 'cmd=_notify-validate';
    // go through each of the posted vars and add them to the postback variable
    foreach ($_POST as $key => $value) {
        $value2 = $value;
        $value = urlencode(stripslashes($value));
        if ($key == 'memo') {
            $memo = $value2;
        }
        $postback .= "&$key=$value";
    }
    //DEBUGGING - export a text file with all the post data on it
//    if ($debug)
//    {
//        $ourFileName = "ipn_listener_debug.txt";
//        $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
//        fwrite($ourFileHandle, $memo);
//        fclose($ourFileHandle);
//    }
    // build the header string to post back to PayPal system to validate
    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    $header .= "Host: www.paypal.com\r\n";//or www.sandbox.paypal.com
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($postback) . "\r\n\r\n";
    // Send to paypal or the sandbox depending on whether you're live or developing
    // comment out one of the following lines
    //$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);//open the connection
    $fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);
    // or use port 443 for an SSL connection
    //$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
    if (!$fp)
    {
        // HTTP ERROR Failed to connect
        //error handling or email here
        if ($debug)
        {
    //            $ourFileName = "ipn_listener_debug.txt";
    //            $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
    //            fwrite($ourFileHandle, 'HTTP ERROR. Failed to connect to PayPal.');
    //            fclose($ourFileHandle);
        }
    }
    else // if we've connected OK
    {
        //DEBUGGING - export a text file to show we've connected OK
        if ($debug)
        {
    //            $ourFileName = "ipn_listener_debug.txt";
    //            $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
    //            fwrite($ourFileHandle, 'Successfully connected to PayPal.');
    //            fclose($ourFileHandle);
        }
        fputs ($fp, $header . $postback);//post the data back
        while (!feof($fp))
        {
            $response = fgets ($fp, 1024);
            //DEBUGGING - export a text file containing the response
            if ($debug)
            {
    //                $ourFileName = "ipn_listener_debug.txt";
    //                $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
    //                fwrite($ourFileHandle, $response);
    //                fclose($ourFileHandle);
            }
            if (strcmp ($response, "VERIFIED") == 0)
            {//It's verified
                //DEBUGGING - export a text file to confirm verification
                if ($debug)
                {
    //                    $ourFileName = "ipn_listener_debug.txt";
    //                    $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
    //                    fwrite($ourFileHandle, 'VERIFIED');
    //                    fclose($ourFileHandle);
                }
                // assign posted variables to local variables, apply urldecode to them all at this point as well, makes things simpler later
                $txn_type = $_POST['txn_type'];//read the type of payment
                $purchase_type = $_POST['custom'];//this is a custom variable as we're using this for two different sorts of payments
                $i=1;
                while (isset($_POST['item_number'.$i]))//read the item details
                {
                    $item_ID[$i]=$_POST['item_number'.$i];
                    $item_name[$i]=urldecode($_POST['item_name'.$i]);
                    $item_cost[$i]=$_POST['mc_gross_'.$i];
                    $i++;
                }
                $item_count = $i-1;
                $workshop_name = urldecode($_POST['item_name']);//only one item means no cart so workshop
                $workshopid = urldecode($_POST['item_number']);//ditto, for id
                $quantity = $_POST['quantity'];
                $payment_status = $_POST['payment_status'];//read the payment details and the account holder
                $payment_currency = $_POST['mc_currency'];
                $payment_total = $_POST['mc_gross'];
                $posted_account_owner = urldecode($_POST['receiver_email']);
                $buyer_email = urldecode($_POST['payer_email']);//read the buyer details
                $first_name = urldecode($_POST['first_name']);
                $last_name = urldecode($_POST['last_name']);
                $address_street = urldecode($_POST['address_street']);
                $address_posttown = urldecode($_POST['address_city']);
                $address_county = urldecode($_POST['address_state']);
                $address_postcode = urldecode($_POST['address_zip']);
                // further checks
                if(($payment_status == 'Completed') && //payment_status = Completed
                    ($posted_account_owner == $account_owner) && //comes from the right account
                    ($payment_currency == "GBP")) // and in the right currency
                {
                    // if we've reached this point all is well, now we can send emails and update databases with confidence
                    //DEBUGGING - export a text file to check the payment status
                    if ($debug)
                    {
    //                        $ourFileName = "ipn_listener_debug.txt";
    //                        $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
    //                        fwrite($ourFileHandle, 'All is well. Can now send emails & update database');
    //                        fclose($ourFileHandle);
                    }
                    //Build an email to the shop owner
                    if (true)
                    {
                        $pieces = explode("|", $memo);

                        // Create connection
                        $con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

                        $result = mysqli_query($con,"SELECT * FROM products WHERE Item_number = '" . $pieces[0] . "' AND Size = '".$pieces[2]."'");
                        while($row = mysqli_fetch_array($result))
                        {
                            $BrandID = $row['Brand'];
                            $BrandName = $row['Brand_name'];
                            $Price = $row['Price'];
                            $imageUrl = $row['Image_URL1'];
                            $quantity = $row['Quantity_sold'];
                            $stock = $row['stock'];

                        }

                        $result = mysqli_query($con,"SELECT * FROM brandfolders WHERE ID = '" . $BrandID . "'");
                        while($row = mysqli_fetch_array($result))
                        {
                            $brandFolder = $row['Folder_name'];
                        }

                        $result = mysqli_query($con,"SELECT * FROM brands WHERE ID = '" . $BrandID . "'");
                        while($row = mysqli_fetch_array($result))
                        {
                            $brandEmail = $row['Email'];
                        }

                        $stock = $stock - 1;
                        $quantity = $quantity + 1;

                        //Update Stock
                        $updatesql = "UPDATE products SET stock=" . $stock . " WHERE Item_number='" . $pieces[0] . "' AND Size='" . $pieces[2] . "'";
                        $result = mysqli_query($con,$updatesql);

                        //Update Quantity Sold
                        $updatesql = "UPDATE products SET Quantity_sold=" .  $quantity. " WHERE Item_number='" . $pieces[0] . "'";
                        $result = mysqli_query($con,$updatesql);

                        //Update Sales Table
                        $sql = "INSERT INTO sales (Date, Price, Shipping, BrandUsername, Item_Number, Item_name, Description, Name, Address1, Address2, Postcode, Contact)
                        VALUES (now(), " .
                            $Price . ", " .
                            $pieces[11] . ", '" .
                            $BrandID . "', '" .
                            $pieces[0] . "', '" .
                            $pieces[1] . "', '" .
                            $pieces[2] . "', '" .
                            $pieces[3] . "', '" .
                            $pieces[5] . "," . $pieces[6] . "', '" .
                            $pieces[7] . "," . $pieces[8] . "', '" .
                            $pieces[9] . "', '" .
                            $pieces[4] . "');";
                        $result = mysqli_query($con,$sql);

                        $mail_Subject = "Zooqie Sale";

//                        $mail_message = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">";
//                        $mail_message .= "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"><title></title></head>";
//                        $mail_message .= "<body style=\"font-family:Arial,Helvetica,sans-serif;font-size:12pt;width:500px;\">";
//                        $mail_message .= "<p>Hi guys,<br><br>";
//                        $mail_message .= "You've sold an item on Zooqie. See details below or log in to your ";
//                        $mail_message .= "<a href='http://www.zooqie.com/login.php' target='_blank'>dashboard</a> ";
//                        $mail_message .= "to see further details of the sale.<br><br>Please send the item to the ";
//                        $mail_message .= "customer as soon as you can. If you can't for any reason, please contact ";
//                        $mail_message .= "the customer on the email below and reply to contact us if you need to organise a refund.</p>";
//                        $mail_message .= "<div style='float:left; margin-right:40px;max-width:210px;'>";
//                        $mail_message .= "<p>Item:<br><br> " . $pieces[1] . " - " . $pieces[2] . " (" . $pieces[0] . ")</p>";
//                        $mail_message .= "<a href='http://www.zooqie.com/brands/".$brandFolder."/".strtolower($pieces[0]).".php' target='_blank'>";
//                        $mail_message .= "<img alt='Product image' style='width: 176px; height: 226px;' src='http://www.zooqie.com/".$imageUrl."'></a><br><br></div>";
//                        $mail_message .= "<div style='float:left;max-width:250px;'>";
//                        $mail_message .= "<p>Buyer:<br><br>";
//                        $mail_message .= $pieces[3]."<br>";
//                        $mail_message .= $pieces[5]."<br>";
//                        $mail_message .= $pieces[6]."<br>";
//                        $mail_message .= $pieces[7]."<br>";
//                        $mail_message .= $pieces[8]."<br>";
//                        $mail_message .= $pieces[9]."<br>";
//                        $mail_message .= $pieces[10]."<br>";
//                        $mail_message .= $pieces[4]."<br></p></div>";
//                        $mail_message .= "<div style=\"width: 100%; float:left;\"><p style=\"margin-bottom:0;\">";
//                        $mail_message .= "Cheers,<br>Team Zooqie</p>";
//                        $mail_message .= "<img alt=\"Zooqie Logo\" style=\"width: 300px;\" ";
//                        $mail_message .= "src=\"http://www.zooqie.com/images/zooqie_email.png\"><br></div>";
//                        $mail_message .= "</body></html>";

//                        $mail_message = "<html><head></head><body>";
//                        $mail_message .= "Hi guys,<br><br>";
//                        $mail_message .= "You've sold an item on Zooqie.<br><br>";
//                        $mail_message .= $pieces[1] . " - " . $pieces[2] . " (" . $pieces[0] . ")<br><br>";
//                        $mail_message .= $pieces[3]."<br>";
//                        $mail_message .= $pieces[5]."<br>";
//                        $mail_message .= $pieces[6]."<br>";
//                        $mail_message .= $pieces[7]."<br>";
//                        $mail_message .= $pieces[8]."<br>";
//                        $mail_message .= $pieces[9]."<br>";
//                        $mail_message .= $pieces[10]."<br>";
//                        $mail_message .= $pieces[4]."<br><br>";
//                        $mail_message .= "Cheers,<br>Team Zooqie<br>";
//                        $mail_message .= "<img src=\"http://www.zooqie.com/images/zooqie_email3.png\">";
//                        $mail_message .= "</body></html>";

                        $mail_message .= "Hi guys," . "\r\n\r\n";
                        $mail_message .= "You've sold an item on Zooqie." . "\r\n\r\n";
                        $mail_message .= $pieces[1] . " - " . $pieces[2] . " (" . $pieces[0] . ")" . "\r\n\r\n";
                        $mail_message .= "Buyer:\r\n\r\n";
                        $mail_message .= $pieces[3]."\r\n";
                        $mail_message .= $pieces[5]."\r\n";
                        $mail_message .= $pieces[6]."\r\n";
                        $mail_message .= $pieces[7]."\r\n";
                        $mail_message .= $pieces[8]."\r\n";
                        $mail_message .= $pieces[9]."\r\n";
                        $mail_message .= $pieces[10]."\r\n";
                        $mail_message .= $pieces[4] . "\r\n\r\n";
                        $mail_message .= "Cheers,\rTeam Zooqie";

                        //TODO: try use a Php mail library (PHPMailer perhaps, couldnt get Swift to work)
                        //TODO: then, use that to send nice html emails, or default back to plain text if it didnt work.

                        //$buyer_email -> this is the brand email
                        mail($mail_To, $mail_Subject, $mail_message, $headers);

                        //Build an email to the buyer
                        $mail_Subject2 = "Thank you for your Zooqie purchase";

                        $mail_message2 = "Dear ".$pieces[3].",\r\n"."\r\n";
                        $mail_message2 .= "Thank you for your order - the details are confirmed below." ."\r\n";
                        $mail_message2 .= "Please allow up for 10 working days for delivery."."\r\n";
                        $mail_message2 .= "If you have any questions about the order or the product please contact ".$BrandName." directly (".$brandEmail.")" ."\r\n"."\r\n";
                        $mail_message2 .= $pieces[1] . " - " . $pieces[2] ."\r\n"."\r\n";
                        $mail_message2 .= "Item: £" . $Price ."\r\n";
                        $mail_message2 .= "Shipping: £" . $pieces[11] ."\r\n" ."\r\n";
                        $total = $Price + $pieces[11];
                        $mail_message2 .= "Total: £" . $total ."\r\n"."\r\n";
                        $mail_message2 .= "Regards,\rTeam Zooqie";

                        mail($mail_To, $mail_Subject2, $mail_message2, $headers);


                    }
                    mysql_close($con);
                }
                else //the Paypal response is VERIFIED but something else has failed - maybe it's a refund, or a different payment type
                {
                    // optionally send an email
                    //error handling or email here
                    if ($debug)
                    {
    //                        $ourFileName = "ipn_listener_debug.txt";
    //                        $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
    //                        fwrite($ourFileHandle, 'PayPal response is verified. But may be a refund or different payment type etc.');
    //                        fclose($ourFileHandle);
                    }
                }
            }
            else if (strcmp ($response, "INVALID") == 0)
            {
                //the Paypal response is INVALID, not VERIFIED
                // This implies something is wrong
                // If this happens, enable debugging and start by look at the contents of debug1_postdata.txt
    //                $ourFileName = "ipn_listener_debug.txt";
    //                $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
    //                fwrite($ourFileHandle, 'Invalid PayPal response.');
    //                fclose($ourFileHandle);
                if ($txn_type != "")
                {
                    //error handling or email here
                }
            }
        } //end of while
        fclose ($fp);
    }
?>