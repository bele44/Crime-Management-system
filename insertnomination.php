	<?php
session_start();
include("connection.php");
?>
	<?php
	if(isset($_POST['send']))
	{	
	$zone=$_POST["zone"];
	$woreda=$_POST["woreda"];
	$kebele=$_POST["kebele"];
	$village=$_POST["village"];
	$date=date("d/m/Y");
	$description=$_POST["description"];
	$query1 = mysqli_query($con,"select * from misssingperson ");
	$row2=mysqli_fetch_assoc($query1);
	$mp_id=$row2["MP_Id"];
	if($con)
	{
	$query="insert into nominationmissingperson values(' ','$mp_id','$zone','$woreda','$kebele','$village','$date','unseen',' ','$description')";
	$insert=mysqli_query($con,$query)or die(mysqli_error());
	if($insert)
	{
	$x='<script type="text/javascript">alert("Thanks for your Nomination!");
	window.location=\'ViewMissingPerson.php\';</script>';
	echo "<script>alert('you insered successfully ')</script>";
	$_SESSION['ff'] = "YOU Inerted";

    header("location:ViewMissingPerson.php");
	}
	else
	{
	$x='<script type="text/javascript">alert("Faild to send the nomination!");
	window.location=\'ViewMissingPerson.php\';</script>';
	//echo $x.mysqli_error();
	}

	}
	else
	die("Connection Failed:");	
	}
	?>