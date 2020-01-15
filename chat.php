<?php 
	session_start();
  include 'dbcn.php';
  if(isset($_SESSION['phuserid']) && isset($_SESSION['phuserName']))
  { 
    $name = $_SESSION['phuserName'];
    $id = $_SESSION['phuserid'];
      ?>
	<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta name="theme-color" content="#333333" />
  <meta name="viewport" content="width=device-width , initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">	
	<title>PhRoom : <?php echo $name ; ?> </title>
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <script src="js/jquery/jquery.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet"> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> -->
  
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
	<link href="./css/styles.css" rel="stylesheet">
  <link href="./css/fontawesome/css/fontawesome-all.css" rel="stylesheet">
  <link href="./css/fontawesome/css/fontawesome.min.css" rel="stylesheet">
  
    <link href="./emoji/css/emoji.css" rel="stylesheet">
  <style>
    * {
    /* font-family: 'Jura', sans-serif; */
     font-family: 'Montserrat', sans-serif; 
         font-size: 0.99em;
      }
  </style>
</head>
<body id="myBody" ng-controller="myCtrl">


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
        <a class="nav-link" style="color:red; " href="logout.php">Log Out</a>
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
          <small id="signInMsg" class="formMsg">
            Form message.
          </small>
	   	  </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="fas fa-times" aria-hidden="true">
            </span>
        </button>
      </div>
      <div class="modal-body">
        <div class="myFormBox font">
    			<form id="signInForm" autocomplete="off" onsubmit="onSubmitForm(this);">
    				<div>
    					<input id="email" type="email" name="email" required="" onkeyup="checkSignInEmail(this);" class="">
    					<label>Email</label>
    					<p id="emailMsg" class="msg"></p>
    					<span id="emailMsgIco" class="msgIcon fas "></span>
    				</div>
    				<div>
    					<input id="password" type="password" name="password" required="" onkeyup="checkSignInPassword(this);">
    					<label>Password</label>
    					<p id="passMsg" class="msg"></p>
    					<span id="passwordIco" class="msgIcon fas fa-eye" onclick="showSignInPassword(this)"></span>
    				</div>
    				<div class="chkDiv">
    					<label class="container">Remember me
    					  <input type="checkbox" name="remember">
    					  <span class="checkmark"></span>
    					</label>
    				</div>
    				<div>
      				<input class="btn btn-primary  btn-default btn-block btn-round" type="submit" name="submit" value="Sign In" /> 
              <span class="signInIco fas fa-arrow-right">
              </span>
    				</div>
    			</form>
    			<div class="text-center">
    				<small style="margin: 0; ">
              <a class="forgetLink faded" href="#">
                Forget Password ?
              </a>
            </small>
    			</div>
    			<div style="display: flex;position: relative;">
							<hr width="45%" style="margin-left: 0;border-color: #343a40;"/>
							<span style="    position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">OR</span>
							<hr width="45%" style="margin-right: 0;border-color: #343a40;"/>
    			</div>
    			<div class="socialLinks" style="margin: 10px auto; ">
			    	<div style="position:  relative; margin: 0 auto 20px auto; ">
			    		<button class="btn btn-social btn-fb btn-round" style="position: inherit; top: 0%; left: 0%; ">
			    			<span>
                </span>
              </button>
			    		<button class="btn btn-social btn-g btn-round" style="position: absolute; top: 0%; right: 0%; ">
			    			<span>         
                </span>Google
			    		</button>   						    		
			    	</div>
    			</div>
        </div>
	    </div>
      <div class="modal-footer">
      	<div style="margin: auto; font-size: 0.75em; text-align: center; color: white; ">
          Don't have an account ?
          <a class="createLink" href="#" onclick="upSwitch();">
            Create an account
          </a>
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
          <small id="signUpMsg" class="formMsg">
            Form message.
          </small>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fas fa-times" aria-hidden="true">
          </span>
        </button>
      </div>
      <div class="modal-body">
        <div class="myFormBox font">
          <form id="signUpForm" autocomplete="off" onsubmit="onSignUpSubmitForm(this);">
            <div>
              <input id="name" type="name" name="signUpName" required="" onkeyup="checkName(this);" class="" autocomplete="off">
              <label>Name</label>
              <p id="nameMsg" class="msg"></p>
              <span id="nameMsgIco" class="msgIcon fas "></span>
            </div>
            <div>
              <input id="signUpemail" type="email" name="registerEmail" required="" onkeyup="checkSignUpEmail(this);" class="" autocomplete="off">
              <label>Email</label>
              <p id="signUpemailMsg" class="msg"></p>
              <span id="signUpemailMsgIco" class="msgIcon fas "></span>
            </div>
            <div>
              <input id="signUppassword" type="password" name="registerPassword" required="" onkeyup="checkSignUpPassword(this);">
              <label>Password</label>
              <p id="passMsg" class="msg"></p>
              <span id="signUpPasswordIco" class="msgIcon fas fa-eye" onclick="showSignUpPassword(this)"></span>
            </div>
            <div>
              <input class="btn btn-primary  btn-default btn-block btn-round" type="submit" name="submit" value="REGISTRATION">
              <span class="signInIco fas fa-arrow-right"></span>
            </div>
          </form>
          <div style="display: flex;position: relative;">
            <hr width="45%" style="margin-left: 0;border-color: #343a40;"/>
            <span style="    position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">OR</span>
            <hr width="45%" style="margin-right: 0;border-color: #343a40;"/>
          </div>
          <div class="socialLinks" style="margin: 10px auto; ">
            <div style="position:  relative; margin: 0 auto 20px auto; ">
              <button class="btn btn-social btn-fb btn-round" style="position: inherit; top: 0%; left: 0%; ">
                <span>
                </span>
              </button>
              <button class="btn btn-social btn-g btn-round" style="position: absolute; top: 0%; right: 0%; ">
                <span></span>
                Google
              </button>      
            </div>      
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div style="margin: auto; font-size: 0.75em; text-align: center; color: white; ">
          Already registered ?
          <a class="createLink" href="#" onclick="inSwitch();">
            Sign in here
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!--%%%%%%%%%%%%%  What I call it? a Name BAr ? %%%%%%%%-->

<div class="nameBar container-fluid">
  <div class="row header font" style="position:  relative;/* display: -webkit-box; */">
    <div class="col-3 col-sm-1" style="padding: 5px;">
      <div class="image " style="margin-right: 0;">
        <img src="./img/avatar.png">
      </div>
    </div>
    <div class="col-12 col-sm-5  name" style="padding-left:10px;">
      <div> 
        <p class="" style="    margin:0 auto;">HELLO</p> 
        <p style="text-transform:uppercase;font-weight:bold;margin: 0; "><?php echo $name ; ?> </p>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid"">
  <div class="row">
    <div class="col-sm-12 col-md-8 offset-md-2" style="margin-top: 15px;" >
      <div class="ques-container">
        <div id="" class="question">
          <div class="qus-header ">
            <span>Chat Room &nbsp;</span>
              <input id="resetBtn" class="form-control btn btn-danger" onclick="clearChat()" type="button" value="Clear">
          </div>
          <div class="ques-xpln">
            <div class="xpln-body">
              <!-- main view -->
              <div class="chat-view">
                <!-- <div class="row xpln-box">
                  <div class="col-sm-12 col-8 xpln-box-top">
                    <div class="row align-items-center">
                      <div class="col xplnr-pic">
                        <div class="user-pic">
                          <img src="./img/avatar.png"/>
                        </div>
                      </div>
                      <div class="col xplnr-name" >
                        Name:
                      </div>
                    </div>
                  </div>
                  <div class="col-4 col-sm-1 xpln-box-vote">
                    <div class="voter">
                      <span class="up-sym fas fa-heart"></span>
                      <div class="like-counter">7
                      </div>
                    </div>
                  </div>
                  <div class="col xpln-box-right">
                    <div class="row">
                      <div class="col-12 xpln-content">
                        <span class="xpln-text message-text">
                          message:
                        </span>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
              <hr style="margin-top: 0; margin-bottom: 3px; background: #e1e1e1; ">
              <div class="xpln-diff">
                <div class="row diff-bar ">
                  <div class="col-sm-2 col-4 diffsection">
                    <button class="btn btn-block btn-diff easy shortMsg">
                      Yo man!
                    </button>
                  </div>
                  <div class="col-sm-2 col-4 diffsection">
                    <button class="btn btn-block btn-diff med shortMsg">
                      Great
                    </button>
                  </div>
                  <div class="col-sm-2 col-4 diffsection">
                    <button class="btn btn-block btn-diff diff shortMsg">
                      Oh yeah!
                    </button>
                  </div>
                  <div class="col-sm-2 col-4 diffsection">
                    <button class="btn btn-block btn-diff og shortMsg">
                      Oh God
                    </button>
                  </div>
                  <div class="col-sm-2 col-4 diffsection">
                    <button class="btn btn-block btn-diff thank shortMsg">
                      Thanks
                    </button>
                  </div>
                  <div class="col-sm-2 col-4 diffsection">
                    <button class="btn btn-block btn-diff symbol shortMsg">
                      Go to hell
                    </button>
                  </div>
                </div>
              </div>
              <div>
                <div><!-- 
                  <textarea class="post-textArea" rows="3" placeholder="Write a more relevant answer..."></textarea> 
                </div> -->
                <div class="row" style="padding: 0 12px; ">
                    <div class="col-10" style="/* margin-right: 5px; */ padding: 0; ">
                      <!-- <textarea class="form-control" ng-model="textArea" id="comment" onkeyup="updateEqn();" rows="1"
                      placeholder="Type a message" data-emojiable="true">
                      </textarea>  -->
                      <p class="lead emoji-picker-container">
                        <input id="comment" type="text" class="form-control" data-emojiable="true"  
                        data-emoji-input="unicode" placeholder="Type a message" style="display: none;">
                      </p>
                    </div>
                    <div class="col-2" style="padding-left: 5px; padding-right: 5px; ">
                      <button id="sendButton" class="btn btn-main btn-send"  style="position: relative;">
                        <div class="btn-send-div" >
                          <div style="position: relative;">
                            <span class="fas fa-paper-plane upper-icon" style="position: absolute;transform: translate(-50%,-50%);"> </span>
                            <span class="far fa-paper-plane lower-icon" style="position: absolute;transform: translate(-172%,120%);"> </span> 
                          </div>
                        </div>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <span class="credit">Dev&Design - Hemant Lader</span>
      </div>
    </div>
  </div>
</div>
<div class="create-ques">
  <div class="edit">
    <button class="btn btn-create">
      <span class="fas fa-pencil-alt">
      </span>
    </button>
    <div class="edit-tooltip">
      <small>Create new question</small>
    </div>
  </div>
</div>
<script> 
	
  var app = angular.module('myApp', []);

	app.controller('myCtrl',function($scope,$http)
	{

  });
</script>
<script type="text/javascript" src="validater.js"></script>
<script type="text/javascript" src="./js/chat.js"></script>


<!-- Begin emoji-picker JavaScript -->
<script src="./emoji/js/config.js"></script>
<script src="./emoji/js/util.js"></script>
<script src="./emoji/js/jquery.emojiarea.js"></script>
<script src="./emoji/js/emoji-picker.js"></script>
<!-- End emoji-picker JavaScript -->

<script>
  $(function() {
      // $(".emoji-wysiwyg-editor").focus();
      
      retrieveMessage();
      setInterval(retrieveMessage,500);
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
      assetsPath: './emoji/img/',
      popupButtonClasses: 'fa fa-smile-o'
    });
    // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
    // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
    // It can be called as many times as necessary; previously converted input fields will not be converted again
    window.emojiPicker.discover();
    $(".emoji-picker-icon").removeClass('fa fa-smile-o').addClass('far fa-smile');
  });
</script>
</body>
</html>
<?php
  }
  else
	  header("Location: /phroom/");
  
?>
