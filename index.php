<!DOCTYPE html>
<html>
<?php
    if(isset($_GET['message']))
	{
		$message=$_GET['message'];
		echo("<script type='text/javascript'>alert('".$message."');</script>");
    }
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

function apicall(){ 

  xmlObj = new XMLHttpRequest(); //suddenly global scope
  xmlObj.open("POST","https://phishingurl.pythonanywhere.com/phishing",false);
  xmlObj.setRequestHeader("Content-Type", "application/json");
  var website=document.getElementById("url").value;
  var data = JSON.stringify({"url": website});
  xmlObj.send(data);
  xmlObj.onreadystatechange = handleRequestStateChange();
  function handleRequestStateChange(){  
  
  if(xmlObj.readyState == 4){
	  
	  if(xmlObj.status==200){
	var json = JSON.parse(xmlObj.responseText);
	document.getElementById("response").innerHTML =json.prediction;
  }}
  else
  {
	  alert(xmlObj.status);
  }
  }
}
</script>
</head>
<body bgcolor="#DCDCDC">
<table>
<tr>
<td><img src="security.jpg" style="width:100px;height:100px;margin-right:70px;"></td>
<th><h2>Detect Phishing Websites</h2></th>
</tr>
</table>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Check URL</a>
  <a href="feedback.php">Feedback</a>
  <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;height:auto;float:right;margin-right:5px">Admin Login</button>
</div>
<center><h3 id="message"></h3></center>
<div id="check">
 
  <form method="post" onsubmit="return false;">
	<h3 align="center">Check URL</h3>
    <div class="container">
      <label for="uname"><b>URL</b></label>
	  <br>
      <input type="text" placeholder="Enter URL" name="url" id="url" required>
	  <br><br><br>
      
	  <button type="submit" name = "submit" id = "submit" onclick="apicall()">Check Website for Phishing</button>
	  <br><br><br>
      <center><h3><label id="response"></label></h3></center>
    </div>

  </form>
</div>


<div id="id01" class="modal">
  
  <form class="modal-content animate" action="login.php" method="post">

    <div class="container">
      <label for="uname"><b>Alloted ID</b></label>
      <input type="text" placeholder="Enter Alloted ID" name="uname" required>

      <label for="psw"><b>Password</b></label>
	  
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
