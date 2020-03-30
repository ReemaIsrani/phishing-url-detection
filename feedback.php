<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<?php
    if(isset($_GET['message']))
	{
		$message=$_GET['message'];
		echo("<script type='text/javascript'>alert('".$message."');</script>");
    }
?>
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
  
  <form action="store_feedback.php" method="post">
	<h3 align="center">Provide Feedback</h3>
    <div class="container">
	  <label for="uname"><b>Full Name</b></label>
      <input type="text" placeholder="Enter Name" name="uname" required>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
      <label for="comments"><b>Write to us</b></label><br><br>
	  <textarea style="width:100%;height:100px" name="comments" required></textarea>
        
      <button type="submit">Submit</button>
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
