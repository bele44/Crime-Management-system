<html>
<head>

</head>
<body>
	<ul>
		<li><a href="PoliceHeadViewEmployee.php">View Employee</a></li>
		<li><a href="PoliceHeadpostnotice.php">Post Notice</a></li>
		<li><a href="AssignPolice.php">Assign Placement</a></li>
		<li><a href="ViewPolicePlacement.php">View Placement</a></li>
		<li><a href="ViewmessingPerson.php">View missing Person</a></li>
		<?php
		$sql="select * from nominationmissingperson where status='unseen'";
		$querys = mysqli_query($con,$sql);
		$count1 = mysqli_num_rows($querys); 
		?>
		<li><a href="viewnominationmisingcriminal.php">Mis_person_Nomination<font size="3px" color="yellow">(<?php echo $count1?>)</font></a></li>
		<?php
		$sql="select * from nominationmissingperson where status='responced' ";
		$query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($query);
		?>
		<li><a href="policedheadviewresponse.php">View Response<font size="3px" color="yellow">(<?php echo $count?>)</font></a></li>
		<li><a href="PoliceHeadViewCriminalreport.php">View Criminal report</a></li>
		
	</ul>
</body>
</html>