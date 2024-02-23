
<?php
	include('connection.php');
$id=$_GET['id'];
$query3=mysqli_query($con,"select * from accountrequest where status='unseen' and Request_id='$id'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con,"UPDATE accountrequest SET  status='seen' where Request_id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("you accept the request !!!");
window.location=\'AdminstratorNotification.php\';</script>';
echo $x;
}
?>
