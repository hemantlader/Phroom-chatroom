<?php 
session_start();
if(isset($_SESSION['phuserid'])) {

    session_destroy();
    // if(isset($_COOKIE['userid']))
    //  {
    //      $user = $_COOKIE['user'];
    //      $pass = $_COOKIE['pass'];
    //      $userid = $_COOKIE['userid'];
    //      setcookie('user',$user,time()-1);
    //      setcookie('pass',$pass,time()-1);
    //      setcookie('userid',$userid,time()-1);
    //  }
}
// echo '<script>history.go(-1);</script>';
header('Location: /phroom/');
?>