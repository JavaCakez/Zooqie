<?php
if(file_exists("utils.php")) {include("utils.php");}
else if(file_exists("../utils.php")) {include("../utils.php");}
else if(file_exists("../../utils.php")) {include("../../utils.php");}

$path = "images/productimages/";

if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ((strpos($file,'large') == false) && file_exists($path . str_replace('.', '_large.', $file)) == false) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            list($width, $height) = getimagesize($path . $file);
            $extension = end(explode('.', $file));
            $extension = strtolower($extension);
            if ($extension == "gif") {
                continue;
            }

            $extension = str_replace("jpeg", "jpg", strtolower($extension));
            if ($extension == "jpeg" || $extension == "jpg") {
                $imgcreatefrom = "imagecreatefromjpeg";
                $imagecreateto = "imagejpeg";
                $quality = 90;
            }
            if ($extension == "png") {
                $imgcreatefrom = "imagecreatefrompng";
                $imagecreateto = "imagepng";
                $quality = 5;
            }
            $image = $imgcreatefrom($path . $file);


            $resizedImage 			= imagecreatetruecolor(704, 904);
            imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, 704, 904, $width, $height);
            $imagecreateto($resizedImage, $path . str_replace('.', '_large.', $file), $quality);

            imagedestroy($image);
            imagedestroy($resizedImage);
        }
    }
    closedir($handle);
}
		

//Automatic Redirect
$URL = "masterpage.php";
header ("Location: $URL");
	
?>