var MSG_MENGTH = 0;
var MSG = "";
$("#sendButton").click(function(event) {
	var message = $(".emoji-wysiwyg-editor").text();
	message = message.trim(); 
	if(message.length){
		$(".emoji-wysiwyg-editor").empty();
				sendMessage(message);
	}
});
$(".shortMsg").click(function(event) {
	var msg = $(this).text();
	msg=msg.trim();
	// console.log(msg);
	sendMessage(msg);
});

function retrieveMessage(){
	// var mainChat =$(".xpln-body").html('<div class="chat-view"></div>');
	var chatView = $(".chat-view");
	var final_Messages ="";
	var message_len = 0 ;

	//Scroll height before the request
	var oldscrollHeight = chatView.prop("scrollHeight") - 20; 
	$.getJSON('getChat.php', function(result) {
		message_len = result.length;
		$.each(result, function(i, field)
	    {
	    	var name = field['name'];
	    	name = name.split(" ");
	    	name= name[0];
	    	var message = field['message'];
	    	var vote = field['vote'];	    	
	        var List = ''
	        +'<div class="row xpln-box"><div class="col-sm-12 col-8 xpln-box-top">'
	            +'<div class="row align-items-center">'
	            		+'<div class="col xplnr-pic">'
	                		+'<div class="user-pic">'
	                  				+'<img src="./img/avatar.png">'
	                		+'</div>'
	              		+'</div>'
	              		+'<div class="col xplnr-name">'
	               				+ name
	                			+'&nbsp;:'
	              		+'</div>'
	            +'</div>'
	        +'</div>'
	        +'<div class="col-4 col-sm-1 xpln-box-vote">'
	        	+'<div class="voter">'
	              	+'<span class="up-sym fas fa-heart"></span>'
	              	+'<div class="like-counter">'
	              		+ vote
	            	+'</div>'
	        	+'</div>'
	        +'</div>'
	        +'<div class="col xpln-box-right">'
	            +'<div class="row">'
	              	+'<div class="col-12 xpln-content">'
	                	+'<span class="xpln-text message-text">'
	                  		+ message
	                	+'</span>'
	              	+'</div>'
	            +'</div>'
	        +'</div></div>';
	        chatView.append(List);
	        final_Messages = final_Messages + List;
	    });

	    chatView.html(final_Messages);
	    MSG_MENGTH = message_len;
	    MSG = final_Messages;

	    //Scroll height after the request
	    
	    var newscrollHeight = chatView.prop("scrollHeight") - 20; 
	    
	    if(oldscrollHeight < newscrollHeight)
	    {
	    	//Autoscroll to bottom of div
	    	chatView.animate({ scrollTop: newscrollHeight }, 200); 
	    }	   
	});	
}

function sendMessage(message){
	$.post( "sendMessage.php",{ msg: message }, function(data) {
		var status = parseInt(data);
	  // console.log( "success :" +  status);
	  if (status)
	  	// console.log("True");
	  	retrieveMessage();
	  // else
	  // 	console.log( "False");
	})
	  .fail(function() {
	    console.log( "error" );
	  });
}
function clearChat(){
	$.post('clearChat.php', function(data) {
		var clear_status = parseInt(data);
		// console.log(clear_status);
		if(clear_status)
			retrieveMessage();
	});
}
