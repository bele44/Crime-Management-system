

<?php
include("connection.php");
?>
<html>
<title>
</title>
<header>
<link  href="css/menubar.css" rel="stylesheet" type="text/css"/>
</header>
<body>

<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
	$eid=$_SESSION['seid'];
?>
		<div id="menubar">
			<ul>
				
				<li><a href="PreventivePolice.php">Home</a></li>
		<?php
		$sql="select * from complainrequest where status='unseen' ";
		$query = mysqli_query($con,$sql);
		$count= mysqli_num_rows($query);
		?>
		<li><a href="ViewComplain.php">Complain<font size="3px" color="yellow">(<?php echo $count?>)</font></a></li>
		<?php
		$sql="select * from nomination where status='unseen' ";
		$query = mysqli_query($con,$sql);
		$coun = mysqli_num_rows($query);
		?>
		<li><a href="ViewNomination.php">Assigned police<font size="3px" color="yellow">(<?php echo $coun?>)</font></a></li>
		<?php
		$sql="select * from accountrequest where status2='Responsed' && police_id='$eid'";
		$query = mysqli_query($con,$sql);
		$coun = mysqli_num_rows($query); 
		?>
                <li><a href="PreventivePoliceNotification.php">Notification<font size="3px" color="yellow">(<?php echo $coun?>)</font></a></li>
				<li><a href="Logout.php">Logout</a>    
				</li>
			</ul>
		</div>
<?php
}
?>
</body>
</html>