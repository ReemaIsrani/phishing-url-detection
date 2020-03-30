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
		header('Location: index.php');
    }
	if(!isset($_SESSION['username']))
	{
		header('Location: index.php');
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
<br><br><br>
<div>
<?php 
$db = mysqli_connect('localhost', 'id13088822_root', 'Reema@123456', 'id13088822_phishing')or die("Not connecting");
$q="SELECT * FROM feedback";
$r=mysqli_query($db,$q);
if(mysqli_num_rows($r) > 0){

   echo "<div id='table'><center><table border=1 bgcolor='white' cellpadding='10'><tr><th>User's Name</th><th>Email</th><th>Feedback</th></tr></center>";
   while($row = mysqli_fetch_assoc($r))
	{ 
	echo "<tr>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['email'] . "</td>";
	echo "<td>" . $row['feedback'] . "</td>";
	echo "</tr>";	
	} 
}
else{
	echo "<center><h2>No Feedbacks to Display</h2></center>";
}
?>
</div>
</body>
</html>