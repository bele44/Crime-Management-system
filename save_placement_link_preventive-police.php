<?php
	include('connection.php');
$id=$_GET['id'];
$query3=mysqli_query($con,"select * from placement where status='unseen' and placement_No='$id'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con,"UPDATE placement SET  status='Accepted' where placement_No='$id'");
if ($query1)
{
$x='<script type="text/javascript">alert("thanks to accept!!!");
window.location=\'ViewPlacement.php\';</script>';
echo $x;
}
?>