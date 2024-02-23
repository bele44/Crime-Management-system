<?php
include('connection.php');
$No_Id=$_GET['No_Id'];
$query3=mysql_query("select * from nomination where NMP='$NMP'");
if($row=mysql_fetch_assoc(($query3))
$query2=mysql_query("UPDATE nomination SET status='seen' where No_Id='$No_Id'");	

if ($query3)
{
$x='<script type="text/javascript">alert("nomination accepted !!!");
window.location=\'Preventivepoliceacceptnominations.php\';</script>';
echo $x;
}
?>