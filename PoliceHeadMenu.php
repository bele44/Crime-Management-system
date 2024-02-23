<html>
<title>
</title>
<header>
<link  href="css/menubar.css" rel="stylesheet" type="text/css"/>
</header>
<body>
		<div id="menubar">
			<ul>
				<li><a href="PoliceHead.php">Home</a></li>
		<?php
		$sql="select * from comment where status='unseen' ";
		$query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($query);
		?>
		<li><a href="PoliceHeadViewComment.php">Comment<font size="3px" color="yellow">(<?php echo $count?>)</font></a></li>
		<?php
		$sql="select * from nomination where status2='new' ";
		$query = mysqli_query($con,$sql);
		$coun = mysqli_num_rows($query);
		?>
				<li><a href="PoliceHeadViewNomination.php">Nomination<font size="3px" color="yellow">(<?php echo $coun?>)</font></a></li>
				<li><a href="PostMissingCriminal.php">Post Missing Person</a></li>
				<li><a href="Logout.php">Logout</a></li>
			</ul>
		</div>
</body>
</html>