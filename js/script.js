"use strict"

function mathx(){
 //var val = document.getElementById('comment').value;
 var text = $("#comment").val();
  document.getElementById('eqn').innerHTML="<h3>"+"$$"+text+"$$"+"</h3>";
  MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
  //alert(text);
}

function appends(){
  console.log("working");
  var text = document.getElementById('comment');
  var select = document.getElementsByClassName('selectpicker');
  text.innerHTML=text.innerHTML+" "+select[0].value;
  mathx();
}
function preRender(){
	
	var text =$(".selectpicker").val();
	alert(text);
	//var text = "$$ f()x $$";
	//$("#preText").innerHTML= text;
	document.getElementById('preText').innerHTML ="<h4> $$"+text+"$$ </h4>";
	//document.getElementById('preTextHidden').innerHTML =text;
	$("#preTextHidden").val(text);
	MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
	//alert(text);
}
function addToBox(){
	var prev = $('#comment');
	//var next= prev.val();
	//prev.val('');
	var text = $("#preTextHidden").val();
	//alert(text);
	//prev.text(" "+text);
	 var r = document.getElementById('comment').innerHTML += " sjkka";
	 alert(r);
	mathx();
}
