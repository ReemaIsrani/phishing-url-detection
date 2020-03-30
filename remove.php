<?php
$db = mysqli_connect('localhost', 'id13088822_root','Reema@123456', 'id13088822_phishing')or die("Not connecting");
$url =$_GET['url'];

$q="DELETE FROM websites where websitename ='$url'";
$r=mysqli_query($db,$q);
if($r){	
		
		echo "<script>window.location='view_blacklist.php';</script>";
	  }
else{
	 echo "error";
    }

?>