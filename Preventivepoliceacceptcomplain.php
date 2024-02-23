<?php
	include('connection.php');
$complaint_id=$_GET['complaint_id'];
$query3=mysqli_query($con,"select * from complainrequest where complaint_id='$complaint_id'");
if($row=mysqli_fetch_assoc($query3))
$query=mysqli_query($con,"UPDATE complainrequest SET status='seen' where complaint_id='$complaint_id'");	
if($query)
{
$x='<script type="text/javascript">alert("complain is accepted !!!");
window.location=\'ViewComplain.php\';</script>';
echo $x;
}
?>