<?php 
	session_start();
  	include 'dbcn.php';
  	if(isset($_SESSION['phuserid']) && isset($_SESSION['phuserName']))
  	{
  		include_once "phroom.php";
  		$userId = $_SESSION['phuserid'];
  		$message = $link->real_escape_string($_POST['msg']);
      // $message = htmlentities($message);
  		$chat = new PhRoom($link);
  		$send_status = $chat->sendMessage($userId,$message);
  		if($send_status == true)
  			echo "1";
  		else
  			echo "0";
  	}

 ?>