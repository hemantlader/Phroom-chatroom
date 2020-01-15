<?php 
	include 'dbcn.php';
	$name = $link->real_escape_string($_POST['name']);
	$name = ucwords($name);
	$username = $link->real_escape_string($_POST['username']);
	$username = strtolower($username);
	$password = $link->real_escape_string($_POST["upass"]);
	
	$password = md5($password);
	$status = 0;
	$time = time();
	$query = "INSERT INTO users (name,username,password,time_created) VALUES('$name','$username','$password','$time_created')";
	if($link->query($query))
		$status = 1 ;
	echo "$status";
 ?>