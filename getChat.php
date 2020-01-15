<?php 
	session_start();
  	include 'dbcn.php';
  	if(isset($_SESSION['phuserid']) && isset($_SESSION['phuserName']))
  	{
  		include_once "phroom.php";
  		$chat =new PhRoom($link);
  		// $result = 
  		$chat->retrieveMessage();
  		// echo json_encode($result);
  	}
 ?>