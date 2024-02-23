
<?php
	include('connection.php');
$id=$_GET['id'];
$query3=mysqli_query($con,"select * from comment where status='unseen' and Comment_id='$id'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con,"UPDATE comment SET  status='seen' where Comment_id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("comment Saved !!!");
window.location=\'PoliceHeadViewComment.php\';</script>';
echo $x;
}
?>