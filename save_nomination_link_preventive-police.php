
<?php
	include('connection.php');
$id=$_GET['id'];
$query3=mysqli_query($con,"select * from nomination where status='unseen' and No_Id='$id'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con,"UPDATE nomination SET  status='seen' where No_Id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("assignment Saved !!!");
window.location=\'saved_nominationpreventivepolice.php\';</script>';
echo $x;
}
?>