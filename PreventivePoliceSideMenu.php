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
 <li><a href="RegisterCrime.php">Register Criminal</a></li>
 <li><a href="CriminalCase.php">Register Crime</a></li>
 <li><a href="RegisterComplain.php">Register complaint</a></li>
 <li><a href="PreventivePoliceSendRequest.php">Send account Request</a></li>
 	<?php
		$sql="select * from nominationmissingperson where status='send' && status2='$eid'";
		$querys = mysqli_query($con,$sql);
		$count = mysqli_num_rows($querys); 
		?>
   <li><a href="Preventivepoliceviewmisperson.php">View Mis_person<font size="3px" color="yellow">(<?php echo $count?>)</font></a></li>	
   		
 <li><a href="ViewRegisteredComplaint.php">View complaint</a></li>
 		<?php
 		$sql="select * from placement where status='unseen' && Police_id='$eid' ";
		$query = mysqli_query($con,$sql);
		$coun = mysqli_num_rows($query);
		?>		 
 <li><a href="ViewPlacement.php">View Placement<font size="3px" color="yellow">(<?php echo $coun?>)</font></a></li>
   		<?php
 		$sql="select * from orders where status='unseen' && userid='$eid' ";
		$query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($query);
		?>
  <li><a href="ViewOrder.php">View Order<font size="3px" color="yellow">(<?php echo $count?>)</font></a></li>
  <?php
$currentdate=date('Y-m-d');
	$sql=mysqli_query($con,"SELECT * from notice where Exp_date>='$currentdate' order by post_date DESC") ;
		$count3 = mysqli_num_rows($sql);
		?>
  <li><a href="PreventivepoliceViewNotice.php">View Notice<font size="3px" color="yellow">(<?php echo $count3?>)</font></a></li>
  <li><a href="ViewCriminal.php">View Criminal</a></li>
 <li><a href="PreventivePoliceGenerateReport.php">View Report</a></li>	  
 </ul> 
 <?php
}
?>
</body>
</html>