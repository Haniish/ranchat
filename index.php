<?php
?>

<html>
<head>
<title></title>

<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script>
src="https://ajax.aspnetcdn.com/ajax/globalize/1.0.0/globalize.js"
</script>
<script>

function submitChat() {
	if(form1.uname.value == '' || form1.msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
       form1.uname.readonly = true;
form1.uname.style.border= 'none';
	var uname = form1.uname.value;
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

</script>
<link rel="stylesheet" type-"text/css" href="style.css">


</head>
<body>
<div id="chatbox" style="width:500px;
	min-width:390px;
	height:530px;
background: #fff;
padding: 25px;
margin:20px auto;">
<form name="form1">
Enter Your Chatname: <input type="text" name="uname" /> <br />
<div id="chatlogs" style="padding: 10px;
	width:95%;
	height: 450px;
	background: #eee;
	overflow-x: hidden;
	overflow-y: scroll;">
LOADING CHATLOG...
</div>
<div style="margin-top:20px;
	display: flex;
	align-items: flex-start;
">
<textarea style="background:fbfbfb;
width:75%;
height:30px;
border: 2px solid #eee;
border-radius: 3px;
resize: none;
" name="msg"></textarea>
<button class="button" onclick="document.getElementById('myInput').value = ''"
style="background: #1ddced;
	padding: 5px 15 px;
	height: 28px;
	width: 70px;
	font-size: 22px;
	color: #fff;
	border: none;
	margin:0 10px;
	border-radius:3px;
	box-shadow: 0 3px 0 #0eb21;
	">
<a href="#" onclick="submitChat()">Send</a></button><br /><br />
</div>
</form>
</div>

</body>
</html>