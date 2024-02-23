<html>
<title>
</title>
<header>
<link  href="css/menubar.css" rel="stylesheet" type="text/css"/>
</header>
<body>
		<div id="menubar">
			<ul>
				<li><a href="adminstrator.php">Home</a></li>
					<li><a href="CreateAccount.php">Create Account</a></li>
						<?php
				 		$sql="select * from accountrequest where status='unseen' ";
						$query= mysqli_query($con,$sql);
					
						$count= mysqli_num_rows($query);
						?>	
				<li><a href="AdminstratorNotification.php">Notification<font size="3px" color="yellow"><?php echo $coun?>)</font></a>

				</li>
				<li><a href="AdminViewEmployee.php">View Employee</a>

				</li>
				<li><a href="Logout.php">Logout</a>    
				</li>
			</ul>
		</div>
</body>
</html>