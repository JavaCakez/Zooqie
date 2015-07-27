<?php
	if(!session_id()) session_start();
	session_unset();
	header("location:login.php");
?>