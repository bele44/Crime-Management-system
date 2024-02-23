<?php
	include('connection.php');
$id=$_GET['id'];
$query3=mysql_query("select * from trafficnomination where status='unseen' and TrNo_Id='$id'");
if($row=mysql_fetch_assoc($query3))
$query1=mysql_query("UPDATE trafficnomination SET  status='seen' where TrNo_Id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("Nomination Saved !!!");
window.location=\'TrafficPoliceViewNomination.php\';</script>';
echo $x;
}
?>