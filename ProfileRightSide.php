<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<link  href="css/trafficofficermystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
		<?php
		if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
		{
		$fullname=$_SESSION['fullname'];
		$photo=$_SESSION['sphoto'];
		echo"<img src=$photo width=210px height=200px> <br>";
		echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px> $fullname </font>";
			
		}
		?>
			          
</body>
</html>
