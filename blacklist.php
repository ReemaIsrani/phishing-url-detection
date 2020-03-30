<?php
$db = mysqli_connect('localhost', 'id13088822_root', 'Reema@123456', 'id13088822_phishing')or die("Not connecting");
$url =$_POST['url'];
$q="INSERT INTO `websites` (websitename) VALUES ('$url')";
$r=mysqli_query($db,$q);
if($r){	
		echo "<script>window.location='admindash.php?message=Added successfully';</script>";
	  }
else{
	 echo mysqli_error($connect)."<br>query:".$q;
    }

?>
