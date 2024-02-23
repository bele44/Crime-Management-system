<?php
include('connection.php');
$NMP=$_GET['NMP'];
$query3=mysqli_query($con,"select * from nominationmissingperson where NMP='$NMP'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con,"UPDATE nominationmissingperson SET status='accepted' where NMP='$NMP'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("nomination accepted !!!");
window.location=\'Preventivepoliceacceptnomination.php\';</script>';
echo $x;
}
?>