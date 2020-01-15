<?php 
	session_start();
	include 'dbcn.php';
	if(isset($_SESSION['phuserid']))
	{
	    // echo '<script>history.go(-1);</script>';
	    // exit();
	    $status="-1";
	}
	else
	{
		$username = $link->real_escape_string($_POST['username']);
		$password = $link->real_escape_string($_POST["upass"]);
		$password = md5($password);
		$status=0;   
		// 0 = username not exist
		// 1 = success
		// 2 = pass not match                                  
		$query=$link->query("SELECT * FROM users");
		while($row = $query->fetch_assoc())
		{
	    	$uname=$row["username"];
	    	$uname = strtolower($uname);
	    	$upass=$row["password"];
	    	$userSname = $row["name"];
	    	$uid = $row["id"];
	    	if($uname==$username)
	    	{
	    		$status = 2;
	    		if($upass==$password)
		    	{
		      	  $status=1;
		      	  $_SESSION['phuserid'] = $uid;
		      	  $_SESSION['phuserName'] = $userSname;
		      	  break;
		   		}
		   		break;
		   	}
		}
	}
	echo "$status";
// } trigger_error("Idonot Want");
 ?>