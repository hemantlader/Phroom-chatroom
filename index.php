<?php 
  session_start();
  include 'dbcn.php';
  if(isset($_SESSION['phuserid']))
  {
      //header("Location : /phroom/chat.php");
	  ?> <script>location.href = "chat.php";</script> <?php
	  //echo "logged in ";
  }
  else{
	  ?>
	  <!DOCTYPE html>
<!-- <html lang="en" ng-app="myApp"> -->
<html lang="en">
<head>
    <meta name="theme-color" content="#333333" />
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">	
	<title>PhRoom - Our PyChat Room</title>
	<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"><!-- 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet"> -->
  <!--
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	
	<script src="js/jquery/jquery.min.js"></script><!-- 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
	<script src="js/bootstrap/bootstrap.min.js"></script>
	
	<!-- 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>  -->

	<!-- <link href="https://fonts.googleapis.com/css?family=Jura:500,700|Montserrat:400,500" rel="stylesheet"> --><!-- 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
 -->
  <link href="css/fontawesome/css/fontawesome.min.css" rel="stylesheet">
  <link href="css/fontawesome/css/fontawesome-all.css" rel="stylesheet">
	<link href="./css/styles.css" rel="stylesheet">
</head>
<body id="myBody">
  <!-- <body id="myBody" ng-controller="myCtrl"> -->


<nav class="navbar navbar-expand-sm bg-dark navbar-dark font">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <strong>PhRoom</strong>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link"  data-toggle="modal" data-target="#exampleModalCenter">Sign In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"   data-toggle="modal" data-target="#signUpModalCenter">Sign Up</a>
      </li> 
    </ul>
  </div> 
</nav>

<!--Sign In  Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content font">
      <div class="modal-header font">
              <h5 class="modal-title font" id="exampleModalLongTitle">Sign In</h5>
			      <div style="position: absolute; display: flex; top: 73px; left: 5%; text-align:  center; width: 90%; padding: 0; ">
			      	<small id="signInMsg" class="formMsg">Form message.</small>
			   	</div>

             <button id="signinCloser" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="fas fa-times" aria-hidden="true"></span>
              </button>
            </div>
      <div class="modal-body">
        <div class="myFormBox font">
        			<form id="signInForm" name="signInForm" autocomplete="off" onsubmit="onSubmitForm(this);">
        				<!-- <div>
        					<input id="email" type="email" name="email" required="" onkeyup="checkSignInEmail(this);" class="">
        					<label>Email</label>
        					<p id="emailMsg" class="msg"></p>
        					<span id="emailMsgIco" class="msgIcon fas "></span>
        				</div> -->
                <div>
                  <input id="InUsername" type="name" name="signInUsername" required="" onkeyup="checkUsername(this);" class="" autocomplete="off">
                  <label>Username</label>
                  <p id="usernameMsg" class="msg"></p>
                  <span id="usernameMsgIco" class="msgIcon fas "></span>
                </div>
        				<div>
        					<input id="password" type="password" name="password" required="" onkeyup="checkSignInPassword(this);">
        					<label>Password</label>
        					<p id="passMsg" class="msg"></p>
        					<span id="passwordIco" class="msgIcon fas fa-eye" onclick="showSignInPassword(this)"></span>
        				</div><!-- 
        				<div class="chkDiv">
        					<label class="container">Remember me
        					  <input type="checkbox" name="remember">
        					  <span class="checkmark"></span>
        					</label>
        				</div> -->
        				<div>
        				<input id="inSubmit" class="btn btn-primary  btn-default btn-block btn-round" type="submit" name="submit" value="Sign In">
        				<span class="signInIco fas fa-arrow-right"></span>
        				</div>
        			</form>
        			<div class="text-center">
        				<small style="margin: 0; "><a class="forgetLink faded" href="#">Forget Password ?</a></small>
        			</div>
        			<!-- <div style="display: flex;position: relative;">
        							<hr width="45%" style="margin-left: 0;border-color: #343a40;">
        							<span style="    position: absolute;
        			    top: 50%;
        			    left: 50%;
        			    transform: translate(-50%,-50%);">OR</span>
        							<hr width="45%" style="margin-right: 0;border-color: #343a40;">
        						</div>
        						<div class="socialLinks" style="
            margin: 10px auto;
        ">
        						    	<div style="
        						    position:  relative;
        						    margin: 0 auto 20px auto;
        						">
        						    		<button class="btn btn-social btn-fb btn-round" style="
        						    position: inherit;
        						    top: 0%;
        						    left: 0%;
        						">
        						    			<span></span>
        						    		</button>
        						    		<button class="btn btn-social btn-g btn-round" style="
        						    position: absolute;
        						    top: 0%;
        						    right: 0%;
        						">
        						    			<span></span>Google
        						    		</button>
        						    		
        						    	</div>
        						    	
        						    </div> -->
        		</div>
	  </div>
      <div class="modal-footer">
      	<div style="
    margin: auto;
    font-size: 0.75em;
    text-align: center;
    color: white;
">Don't have an account ? <a class="createLink" href="#" onclick="upSwitch();">Create an account</a>
     </div>
    </div>
  </div>
</div>
</div>



<!--Sign Up  Modal -->
<div class="modal fade" id="signUpModalCenter" tabindex="-1" role="dialog" aria-labelledby="signUpModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content font">
      <div class="modal-header font">
              <h5 class="modal-title font" id="signUpModalLongTitle">Sign Up</h5>
            <div style="position: absolute; display: flex; top: 73px; left: 5%; text-align:  center; width: 90%; padding: 0; ">
              <small id="signUpMsg" class="formMsg">Form message.</small>
          </div>

             <button type="button" id="signupCloser" class="close" data-dismiss="modal" aria-label="Close">
                <span class="fas fa-times" aria-hidden="true"></span>
              </button>
            </div>
      <div class="modal-body">
        <div class="myFormBox font">
              <form id="signUpForm" autocomplete="off" >
                <div>
                  <input id="name" type="name" name="signUpName" required="" onkeyup="checkName(this);" class="" autocomplete="off">
                  <label>Name</label>
                  <p id="nameMsg" class="msg"></p>
                  <span id="nameMsgIco" class="msgIcon fas "></span>
                </div>
                <!-- <div>
                  <input id="signUpemail" type="email" name="registerEmail" required="" onkeyup="checkSignUpEmail(this);" class="" autocomplete="off">
                  <label>Email</label>
                  <p id="signUpemailMsg" class="msg"></p>
                  <span id="signUpemailMsgIco" class="msgIcon fas "></span>
                </div> -->
                <div>
                  <input id="UpUsername" type="text" name="registerUsername" required="" onkeyup="checkUpUsername(this);" class="" autocomplete="false">
                  <label>Username</label>
                  <p id="signUpUsernameMsg" class="msg"></p>
                  <span id="signUpUsernameMsgIco" class="msgIcon fas "></span>
                </div>
                <div>
                  <input id="signUppassword" type="password" name="registerPassword" required="" onkeyup="checkSignUpPassword(this);">
                  <label>Password</label>
                  <p id="passMsg" class="msg"></p>
                  <span id="signUpPasswordIco" class="msgIcon fas fa-eye" onclick="showSignUpPassword(this)"></span>
                </div>
                <div>
                <input id="upSubmit" class="btn btn-primary  btn-default btn-block btn-round" type="submit" name="submit" value="REGISTRATION">
                <span class="signInIco fas fa-arrow-right"></span>
                </div>
              </form>
              
            </div>
      </div>
        <div class="modal-footer">
          <div style="margin: auto; font-size: 0.75em; text-align: center; color: white; ">Already registered ? <a class="createLink" href="#" onclick="inSwitch();">Sign in here</a> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 
  <script> ////// ANGULAR
		var app = angular.module('myApp', []);
			app.controller('myCtrl',function($scope,$http)
			{
				
			});
  </script> -->
  <script type="text/javascript" src="validater.js"></script>
</body>
</html>
	  <?php
  }
?>
