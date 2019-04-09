<?php

?>
<html>
<head>
<title>Chat</title>
<link rel ="stylesheet" type="text/css" href="chat.css"> 
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>

<script>

function submitChat() {
    if(form1.uname.value == '' || form1.msg.value == ''){
        alert('Alle feltene må være fylt ut');
        return;
    }
    form1.uname.readOnly = true;
    form1.uname.style.border = 'none';
    var uname = form1.uname.value;
    var msg = form1.msg.value;
    //Lager en xml http request 
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState==4&&xmlhttp.status==200) {
            document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg, true);
    xmlhttp.send(); 
}

$(document).ready(function(e){
    $.ajaxSetup({cache:false});
    setInterval (function() {$('#chatlogs').load('logs.php');}, 2000);
});

</script>

</head>
<body>

<div id="chatlogs">
LOADING CHATALOGS PLEASE WAIT...
</div>

<div class="brukernavn">
<form name="form1">
Skriv inn navn: <input type="text" name ="uname" /><br />
</div>

<div class="tekstfelt">
Din melding: <br />
<textarea name="msg"></textarea><br />
</div>

<!-- Knappen send -->
<a href="#" onclick="submitChat()"> Send</a><br /><br />

</body>