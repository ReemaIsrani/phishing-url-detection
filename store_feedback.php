<?php
$db = mysqli_connect('localhost', 'id13088822_root', 'Reema@123456', 'id13088822_phishing')or die("Not connecting");
$username =$_POST['uname'];
$email =$_POST['email'];
$comments =$_POST['comments'];
$q="INSERT INTO `feedback` (name,email,feedback) VALUES ('$username','$email','$comments')";
$r=mysqli_query($db,$q);
if($r){
		echo "<alert alert-success><center><h3>Feedback recorded</h3></center></alert>";
		echo "<script>window.location='feedback.php?message=Feedback Recorded successfully';</script>";
	  }
else{
	 echo mysqli_error($connect)."<br>query:".$q;
    }

?>
