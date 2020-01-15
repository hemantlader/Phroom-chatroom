<?php 
	session_start();
  	include 'dbcn.php';
  	if(isset($_SESSION['phuserid']) && isset($_SESSION['phuserName']))
  	{

  		include_once "phroom.php";
  		$userId = $_SESSION['phuserid'];
  		$chat = new PhRoom($link);
  		$clear_status = $chat->clearChat($userId);
  		if($clear_status)
  			echo "1";
  		else
  			echo "0";
  	}
 ?>