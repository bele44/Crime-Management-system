
<?php
	include('connection.php');
$id=$_GET['id'];
$query=mysql_query("select * from responsecomplaintaccount where status='unseen' and Response_id='$id'");
if($row=mysql_fetch_assoc($query))
$query1=mysql_query("UPDATE responsecomplaintaccount SET  status='acceptresponse' where Response_id='$id'");
$query1=mysql_query("UPDATE accountrequest SET  status2='AcceptResponse'");	
if ($query1)
{
$x='<script type="text/javascript">alert("thanks you accept the response !!!");
window.location=\'PreventivePoliceNotification.php\';</script>';
echo $x;
}
?>