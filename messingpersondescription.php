
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>home  page</title>
<link  href="css/mystylesheethome.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
$id=$_GET['id'];
$query3=mysqli_query($con,"select * from MisssingPerson where MP_Id='$id'");
$row = mysqli_fetch_array($query3)
?>
	<h2 style="color: #5f7ada;"><u> Detail Descrpition about a Person</u></h2>
	<p><?php echo $row["description"]; ?><p>
				 
</body>
</html>
