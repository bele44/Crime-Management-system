<?php
	include('connection.php');
$id=$_GET['id'];
$query3=mysqli_query($con,"select * from nomination where status2='new' and No_Id='$id'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con,"UPDATE nomination SET  status2='accepted' where No_Id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("you acept the nomination successfully!!");
window.location=\'PoliceHeadViewsavedNomination.php\';</script>';
echo $x;
}
?>