<?php
	include('connection.php');
$id=$_GET['id'];
$query3=mysql_query("select * from nominationmissingperson where status='responced' and NMP='$id'");
if($row=mysql_fetch_assoc($query3))
$query1=mysql_query("UPDATE nominationmissingperson SET  status='acceptresponced' where NMP='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("you accepted the response succussfully  !!!");
window.location=\'policedheadviewresponse.php\';</script>';
echo $x;
}
?>