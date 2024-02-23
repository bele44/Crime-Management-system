<?php
include("connection.php");
?>
<html>
<head>
</head>
<body>
<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
	$eid=$_SESSION['seid'];
?>
 <ul>
 <li><a href="complaintviewmissingperson.php">View missing person</a></li>

 <li><a href="complaintSendRequest.php">Send Request</a>
  <?php
$sql="select * from complainrequest where status='Responsed' && complaint_id='$eid' ";
	$query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($query);
	?>
  <li><a href="Viewpoliceresponse.php">view Response<font size="3px" color="yellow">(<?php echo $count?>)</font></a>
  <li><a href="complaintNomination.php">Give Nomination</a>
	  
 </ul>
 <?php
}
?> 
</body>
</html>