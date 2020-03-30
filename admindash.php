<!DOCTYPE html>
<html>
<head>
<?php
	session_start();
    if(isset($_GET['message']))
	{
		$message=$_GET['message'];
		echo("<script type='text/javascript'>alert('".$message."');</script>");
    }
	if(isset($_POST['logout']))
	{
		unset($_SESSION['username']);
		session_destroy();
		echo "<script>window.location='index.php';</script>";
		
    }
	if(!isset($_SESSION['username']))
	{
	    echo $lol;
		echo "<script>window.location='index.php';</script>";
    }
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body bgcolor="#DCDCDC">
<table>
<tr>
<td><img src="security.jpg" style="width:100px;height:100px;margin-right:70px;"></td>
<th><h2>Detect Phishing Websites</h2></th>
</tr>
</table>

<div class="topnav" id="myTopnav">
  <a href="admindash.php" class="active">Add URL to Blacklist</a>
  <a href="view_blacklist.php" class="active">View Blasklisted sites</a>
  <a href="view_feedback.php">View Feedbacks</a>
  <form action="" method="post">
  <button type="submit" name="logout" style="width:auto;height:auto;float:right;margin-right:5px">Logout</button>
  </form>
</div>

<div id="check">
 
  <form method="post" action="blacklist.php">
	<h3 align="center">Add URL to Blacklist</h3>
    <div class="container">
      <label for="uname"><b>URL</b></label>
	  <br>
      <input type="text" placeholder="Enter URL" name="url" id="url" required>
	  <br><br><br>
	  <button type="submit">Add to blacklist</button>
	</div>

  </form>
</div>
</body>
</html>
